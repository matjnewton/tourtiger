<?php

define('WQS_ATLAS_URL', get_stylesheet_directory_uri() . '/inc/atlasx_api');
define('WQS_ATLAS_PATH', get_stylesheet_directory() . '/inc/atlasx_api');

/// Register Script
function wqs_load_scripts_atlas()
{   
    $template = array('page-templates/rezdy_search.php');

    if( is_page_template( $template ) || is_singular('product')) :
        wp_register_script('wqs_functions_atlas', WQS_ATLAS_URL . '/js/functions.js');
        wp_register_script('wqs_functions_for_check_available_atlas', WQS_ATLAS_URL . '/js/functions_for_check_available.js');
        wp_register_script('wqs_functions_toarray', WQS_ATLAS_URL . '/js/toArrayFilter.js');
        wp_register_script('wqs_functions_underscore-min', WQS_ATLAS_URL . '/js/underscore-min.js');
     
        wp_enqueue_script('wqs_functions_atlas');
        wp_enqueue_script('wqs_functions_for_check_available_atlas');
        wp_enqueue_script('wqs_functions_toarray');
        wp_enqueue_script('wqs_functions_underscore-min');

        wp_localize_script( 'wqs_functions_atlas', 'js_var_atlas', 
            array( 
                'userid_key' => get_field('field_n1993k2903_xola', 'option'),
                'wqs_api_url' => get_home_url( null, 'wp-json/wqs-api/tour_product_api'),
                )
        );
        wp_localize_script( 'wqs_functions_for_check_available_atlas', 'js_var_atlas', 
            array( 
                'userid_key' => get_field('field_n1993k2903_xola', 'option'),
                'wqs_api_url' => get_home_url( null, 'wp-json/wqs-api/tour_product_api'),
                )
        );
    endif;

}

add_action('wp_enqueue_scripts', 'wqs_load_scripts_atlas');

add_action( 'wp_footer', 'add_booking_iframe', 33 );
function add_booking_iframe(){
    echo '<div id="booknowmodal" style="display:none;position:fixed;left:0;right:0;top:0;bottom:0;z-index: 9999;">
            <iframe id="booknowframe"  frameborder="0" scrolling="yes" style="height:100%; width:100%; border:0;"></iframe>
          </div>';
}