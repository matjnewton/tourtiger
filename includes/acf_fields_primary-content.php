<?php 
/* =======================
 * Primary Content Area
 * ==================== */



define( "PCA_DIR", get_stylesheet_directory() . '/includes/primary-content' );
define( "STYLING_MANAGER_DIR", PCA_DIR . '/styling/acf-styling-manager-field' );

/**
 * Include ACF Plugins
 */
include_once( get_stylesheet_directory() . '/includes/plugins/acf-accordion/acf-accordion.php' );
include_once( get_stylesheet_directory() . '/includes/plugins/acf-rgba-color/acf-rgba-color.php' );
include_once( get_stylesheet_directory() . '/includes/plugins/acf-typography/acf-typography.php' );
include_once( STYLING_MANAGER_DIR . '/acf-styling-manager.php' );

add_filter( 'acf/accordion/dir', 'acf_accordion_dir' );
function acf_accordion_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/plugins/acf-accordion/';

    return $dir;
}
add_filter( 'acf/rgba_color/dir', 'acf_rgba_color_dir' );
function acf_rgba_color_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/plugins/acf-rgba-color/';

    return $dir;
}

add_filter( 'acf/typography/dir', 'acf_typography_dir' );
function acf_typography_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/plugins/acf-typography/';

    return $dir;
}

/**
 * Turn On Chaching
 */
if ( !is_admin() ) {
	include( get_stylesheet_directory() . '/includes/primary-content/pc-cache.php' );
}

/**
 * Add custom image sizes
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'pc-medium', 700, 700, true ); 
	add_image_size( 'pc-small', 500, 500, true ); 
}

/**
 * Enqueue Styles
 */
add_action( 'wp_enqueue_scripts', 'tourtiger_styles_pca');
function tourtiger_styles_pca() {
  	wp_enqueue_style('pc-constructor', get_stylesheet_directory_uri() . '/includes/primary-content/dependences/pc.css', array(), null, false );
  	wp_enqueue_style( 'pc-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700' );
}

/**
 * Enqueue Google Maps API
 */
function google_api_acf_init() {
	
	acf_update_setting( 'google_api_key', 'AIzaSyBPKkzpIMMXwxRMfArXDyzKZiRqdBVsfu0' );
}

add_action('acf/init', 'google_api_acf_init');

/**
 * ACF Global Options
 */
if(function_exists('acf_add_options_sub_page')) { 

	$primary_content = acf_add_options_page(array(
		'page_title'   => 'Primary Styles',
		'menu_title'   => 'Primary Styles',
		'menu_slug'    => 'acf-options-primary-area-styles',
		'icon_url'     => 'dashicons-align-left',
	));

/**
 * ACF Fielad PHP
 */
if( function_exists('acf_add_local_field_group') ):
	include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-styling-cards.php' );
	include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-constructor.php' );
	include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-hero-area.php' );
endif;


}

/**
 * Get css via ACF Font
 * @param  string $font - ACF Field
 * @return array        - [0] - Link to Google font; [1] - css styles  
 */
function pc_init_font_css( $font = '' ) {
	if ( $font ) {
		$css = array( false, '' );

		if ( $font['font-family'] ) {
			$css[0] = $font['font-family'] ? "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $font['font-family'] . "');" : false;
			$css[1] .= "font-family:'" . $font['font-family'] . "';";
		}

		$css[1] .= $font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
		$css[1] .= $font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
		$css[1] .= $font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
		$css[1] .= $font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
		$css[1] .= $font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';

		return $css;

	} else {
		return false;
	}
}

/**
 * This function builds css styles for forms
 * @param  string $font       Font ACF Fiels 
 * @param  string $color      Color value
 * @param  string $background Color value
 * @param  string $border     Color value
 * @return string             return string with styles
 */
function pc_content_init_form( $font='', $color='', $background='', $border='' ) {
	if ( $font['font-family'] ) {
		$css[0] = "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $font['font-family'] . "');";
	 	$css[1] .= "font-family:'" . $font['font-family'] . "';";
	}

	$css[1] .= $font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
	$css[1] .= $font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
	$css[1] .= $font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
	$css[1] .= $font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
	$css[1] .= $font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';

	$css[1] .= $color ? 'color:' . $color . ';' : '';
	$css[1] .= $background ? 'background-color:' . $background . ';' : '';
	$css[1] .= $border ? 'border-color:' . $border . ';' : '';

	return $css;
}



function create_style_prefix( $i = '' ) {
	switch ( $i ) {
		case 1:
			$prefix = 'one';
			break;
		case 2:
			$prefix = 'two';
			break;
		case 3:
			$prefix = 'three';
			break;
		case 4:
			$prefix = 'four';
			break;
		case 5:
			$prefix = 'five';
			break;
		case 6:
			$prefix = 'six';
			break;
		case 7:
			$prefix = 'seven';
			break;
		case 8:
			$prefix = 'eight';
			break;
		case 9:
			$prefix = 'nine';
			break;
		case 10:
			$prefix = 'ten';
			break;
		default:
			$prefix = 'zero';
			break;
	}

	return $prefix;
}

/**
 * Transform name for using in strings
 * @return string
 */
function transform_name( $name = '', $type = '' ) {
	$word = array( ' ' => $type, '&' => '' );
	$new = strtr( $name, $word );
    $new = strtolower( $new );
    return $new;
}


function pc_image( $id=0, $width=0, $height=0, $link=false, $attr=null, $circle=false ) {

	if ( $circle ) {
		if ( $width > $height ) { 
			$width = $height;
		} else { 
			$height = $width;
		}

		echo '<div class="pc_circle-image--wrapper">';
	}

	echo $link ? "<a href='{$link}'>":'';
	echo wp_get_attachment_image( $id, array( $width, $height ), true, $attr );
	echo $link ? '</a>':'';

	if ( $circle ) '</div>'; 
}

?>
