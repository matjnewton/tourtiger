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

		$file_path = explode('.eot', $handle_fonts['eot']['url']);
		$file_path = $file_path[0];
		$file_path = preg_split('/http:|https:/', $file_path);
		$file_path = $file_path[1];
		$file_path = explode($this->name, $file_path);
		$file_path = $file_path[0];

		$context = "/* Font Family: {$this->name} ~{$file_path}~ */ \r\n";
		$context .= "@font-face { \r\n";
		$context .= "font-family: '{$this->name}'; \r\n";
		$context .= "font-weight: normal; \r\n";
		$context .= "font-style: normal; \r\n";

		foreach ( $handle_fonts as $font => $path ) : 
			$url_split = preg_split('/http:|https:/', $path['url']);
			$url       = $url_split[1];

			if ( $font == 'eot' ) {
				$context   .= "src: url('{$url}'); \r\n";
				$context   .= "src: url('{$url}?#iefix') format('embedded-opentype')";
				$file_split = explode($this->name, $url);
				$file_path  = $file_split[0];
			} elseif ( $font == 'svg' ) {
				$context .= ", \r\nurl('{$url}#{$this->name}') format('{$font}')";
			} elseif ( $font == 'ttf' ) {
				$context .= ", \r\nurl('{$url}') format('truetype')";
			} else {
				$context .= ", \r\nurl('{$url}') format('{$font}')";
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