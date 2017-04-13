<?php 
/**
 * AIFont Class
 *
 * Creates new font
 */


class AIFontClass {


	public $name    = '';
	public $font    = array();


	function __construct($font) {
		$this->font = $font;
		$this->name = $this->get_name();
		$this->create_file();
	}


	/**
	 * Get name from font array
	 * @return string 
	 */
	private function get_name() {
		$eot  = $this->font['eot']['name'];
		$name = explode(".eot", $eot);
		return $name[0];
	}


	/**
	 * Get folder path.
	 * If folder isn't exist, create him
	 */
	public function get_folder() {
		$uploads_dir  = wp_upload_dir(); 
		$folder       = $uploads_dir['basedir'] . '/aif';

		if ( !file_exists( $folder ) ) :
		    mkdir($folder, 0777, true);
		endif;

		return $folder;
	}


	/**
	 * Create file
	 */
	private function create_file() {
		$file     = "{$this->get_folder()}/{$this->name}.css";
		$context  = $this->write_context();
		$is_exist = is_aifont_exist($this->name);

		if ( $is_exist  ) {
			echo "<p style='color:greet;'>Well, we noticed that {$this->name} is exist on current site!</p";
			return false;
		}

		$file_open = fopen($file, "w+");

		if (!$file_open) {
			echo "<p style='color:red;'>Unfortunatly something wrong! Font {$this->name} was not successful added!</p";
			return false;
		}

		fwrite($file_open, $context);
		fclose($file_open);

		echo "<p style='color:green;'>Super! Font {$this->name} was successful added!:D</p>";

		return true;
	}


	/**
	 * Write context in .css file
	 */
	private function write_context() {
		$handle_fonts = $this->handle_fonts();
		$context = "/* Font Family: {$this->name} */ \r\n";
		$context .= "@font-face { \r\n";
		$context .= "font-family: '{$this->name}'; \r\n";
		$context .= "font-weight: normal; \r\n";
		$context .= "font-style: normal; \r\n";

		foreach ( $handle_fonts as $font => $path ) : 

			if ( $font == 'eot' ) {
				$context .= "src: url('{$path['url']}'); \r\n";
				$context .= "src: url('{$path['url']}?#iefix') format('embedded-opentype')";
			} elseif ( $font == 'svg' ) {
				$context .= ",url('{$path['url']}#{$this->name}') format('{$font}')";
			} elseif ( $font == 'ttf' ) {
				$context .= ",url('{$path['url']}') format('truetype')";
			} else {
				$context .= ",url('{$path['url']}') format('{$font}')";
			}

		endforeach;

		$context .= "; \r\n";
		$context .= "}";

		return $context;
	}


	/**
	 * Upload sources to server
	 */
	private function handle_fonts() {
		$handle_fonts = array();

		foreach ( $this->font as $type => $data ) :

			$movefile = wp_handle_upload( $_FILES['font-'.$type], array( 'test_form' => false ) );

			$handle_fonts[$type] = $movefile;

		endforeach;

		return $handle_fonts;
	}
}

?>