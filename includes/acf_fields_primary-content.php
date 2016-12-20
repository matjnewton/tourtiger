<?php 

include_once( get_stylesheet_directory() . '/includes/plugins/acf-accordion/acf-accordion.php' );
include_once( get_stylesheet_directory() . '/includes/plugins/acf-rgba-color/acf-rgba-color.php' );
include_once( get_stylesheet_directory() . '/includes/plugins/acf-typography/acf-typography.php' );

add_filter( 'acf/accordion/dir', 'acf_accordion_dir' );
function acf_accordion_dir( $dir ) {
    $dir = get_stylesheet_directory() . '/includes/plugins/acf-accordion/';

    return $dir;
}

add_filter( 'acf/rgba_color/dir', 'acf_rgba_color_dir' );
function acf_rgba_color_dir( $dir ) {
    $dir = get_stylesheet_directory() . '/includes/plugins/acf-rgba-color/';

    return $dir;
}

add_filter( 'acf/typography/dir', 'acf_typography_dir' );
function acf_typography_dir( $dir ) {
    $dir = get_stylesheet_directory() . '/includes/plugins/acf-typography/';

    return $dir;
}

if ( !is_admin() ) {
	include( get_stylesheet_directory() . '/includes/primary-content/pc-cache.php' );
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'pc-medium', 700, 700, true ); // Кадрирование изображения
	add_image_size( 'pc-small', 500, 500, true ); // Кадрирование изображения
}

add_action( 'wp_enqueue_scripts', 'tourtiger_styles_pca');
function tourtiger_styles_pca() {
  	wp_enqueue_style('pc-constructor', get_stylesheet_directory_uri() . '/includes/primary-content/dependences/pc.css', array(), '1.1', false );
  	wp_enqueue_style( 'pc-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700' );
}

if(function_exists('acf_add_options_sub_page')) { 
	acf_add_options_sub_page(array(
		'page_title'   => 'Primary Content Page',
		'menu_title'   => 'Primary Content Page',
		'menu_slug'    => 'acf-options-primary-area-styles'
	));
}

if( function_exists('acf_add_local_field_group') ):
	include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-constructor.php' );
	include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-styling-cards.php' );
endif;

?>
