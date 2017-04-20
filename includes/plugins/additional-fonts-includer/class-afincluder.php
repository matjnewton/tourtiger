<?php  
/**
 * Additional Font Includer
 *
 * This Class allows you upload new fonts 
 * and use them with ACF Typography
 */

class AFIncluder {

	public  $name       = 'Additionals Font Includer'; 
	public  $short_name = 'Fonts Includer'; 
	public  $slug       = 'additionals-font-includer'; 
	public  $version    = 1.0; 
	private $fonts      = array( 'eot', 'svg', 'ttf', 'woff', 'woff2' );

	function __construct() {
		
		/**
		 * Load hooks
		 */
		$this->load_hooks();
	}	

	/**
	 * Load relevant action/filter hooks.
	 */
	public function load_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'afi_enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'init_option_page' ) );
	}


	/**
	 * Enququ scripts
	 */
	public function afi_enqueue_scripts() {
	    wp_register_script( 'afi-upload-script', ADI_PATH_URI . '/assets/js/upload.js', array('jquery'), '3.1' );  
	    wp_enqueue_script( 'afi-upload-script' );  
	}  


	/**
	 * Init Option page
	 * @return null 
	 */
	public function init_option_page() {

		add_submenu_page( 
			'tools.php', 
			$this->name, 
			$this->short_name, 
			'manage_options', 
			$this->slug, 
			array(  $this, 'render_option_page' ) 
		);

	}


	/**
	 * Render option page content
	 * @return null 
	 */
	public function render_option_page() {
		$action  = 'tools.php?page=' . $this->slug;
		$tab     = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->slug . '_loadnew';
		$fonts   = $this->font_types();
		$refresh = 'tools.php?page=' . $this->slug . '&tab=' . $this->slug . '_list&refresh=' . $this->slug . '-true';
		$is_refresh    = isset( $_GET['refresh'] ) ? $_GET['refresh'] : false;
		$is_delete     = isset( $_GET['aif-delete'] ) ? $_GET['aif-delete'] : false;
		$is_delete_all   = isset( $_GET['delete-all'] ) ? $_GET['delete-all'] : false;
		?>

		<div class="wrap">
			<h1><?php echo $this->name; ?></h1>
			<?php 
			/**
			 * Load tabs
			 */
			$this->options_tabs(); 

			if ( $this->slug . '_loadnew' === $tab ) :
				?>
					<form id="afi-upload-fonts-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
						<h3>Upload font's sources</h3>

						<table>
							<?php 
							/**
							 * Print file inputs
							 */
							foreach ( $fonts as $font ) :
								?>

								<tr>
									<td>.<?=$font;?> file</td>
									<td><input name="font-<?=$font;?>" data-type="<?=$font;?>" class="font-<?=$font;?> font-input" type="file" /></td>
									<td><span class="error" style="color: red;display: none;">File is not correct.</span></td>
								</tr>

								<?php
							endforeach;
							?>
						</table>

						<p id="afi-response" style="display: none;"></p>

						<p><i>HINT: You can generate .eot, .svg, .ttf, .woff, .woff2 files <a href="https://everythingfonts.com/font-face" target="_blank">here</a></i></p>

						<?php 
						/**
						 * Submit button
						 */
						submit_button( 'Save font' ); 

						$font = $this->receive_fonts();

						?>
					</form>
				<?php

			elseif ( $this->slug . '_list' === $tab ) :

				if ( $is_delete != false ) : 
					$delete_font = aif_delete_font($is_delete);
				endif;

				if ( $is_refresh == $this->slug . '-true' || $is_refresh ) : 
					$originalJson = update_fonts_in_json();
				endif;

				$fonts = get_aifonts_from_dir();
				$fonts_counter = 0;

				foreach ( $fonts as $font ) :
					?>
						<p>
							<form action="<?php echo $refresh . '&aif-delete=' . $font; ?>" method="post">
								<span style="line-height: 28px;font-size:15px;"><?=$font;?> </span>
								<?php submit_button( 'Delete', 'delete', 'submit', false );?>
							</form>
						</p>
					<?php
					$fonts_counter++;
				endforeach;

				if ( $fonts_counter === 0 ) :
					echo "<p style='color:red;'>It seems like there are not any fonts.. Let's add new fonts!</p>";
				endif;
				?>

				<form action="<?php echo $refresh; ?>" method="post">
					<p>
						<?php
						/**
						 * Button panel
						 */
						submit_button( 'Refresh fonts', 'delete', 'submit', false );
						?>
					</p>
				</form>

				<?php
			endif;
			?>

		</div>

		<?php
	}

	/**
	 * Renders setting tabs.
	 */
	private function options_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->slug . '_loadnew';

		echo '<h2 class="nav-tab-wrapper">';

		foreach ( $this->settings_tabs() as $key => $name ) {
			$active = ( $current_tab == $key ) ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page='.$this->slug.'&tab=' . $key . '">' . $name . '</a>';
		}

		echo '</h2>';
	}


	/**
	 * Define tabs for Settings page.
	 * By defining in a method, strings can be translated.
	 *
	 * @access private
	 * @return array
	 */
	private function settings_tabs() {
		return array(
			$this->slug . '_loadnew' => 'Load Font',
			$this->slug . '_list'    => 'List of included fonts'
		);
	}

	/**
	 * Font types.
	 *
	 * @access public
	 * @return array
	 */
	public function font_types() {
		return $this->fonts;
	}

	/**
	 * Check isset font sources if ok, create font
	 */
	public function receive_fonts() {
		$font = array (
			'eot'   => isset($_FILES['font-eot']) ? $_FILES['font-eot'] : false,
			'svg'   => isset($_FILES['font-svg']) ? $_FILES['font-svg'] : false,
			'ttf'   => isset($_FILES['font-ttf']) ? $_FILES['font-ttf'] : false,
			'woff'  => isset($_FILES['font-woff']) ? $_FILES['font-woff'] : false,
			'woff2' => isset($_FILES['font-woff2']) ? $_FILES['font-woff2'] : false
		);

		foreach ( $font as $type => $file ) :
			if (!$file) return false;
		endforeach;

		new AIFontClass($font);

		return $font;
	}

}

new AFIncluder();

?>