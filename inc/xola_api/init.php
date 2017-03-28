<?php

define('WQS_XOLA_URL', get_stylesheet_directory_uri() . '/inc/xola_api');
define('WQS_XOLA_PATH', get_stylesheet_directory() . '/inc/xola_api');

/// Register Script
function wqs_load_scripts_xola()
{   
    wp_register_script('wqs_functions_xola', WQS_XOLA_URL . '/js/functions.js');
    wp_register_script('wqs_functions_for_search_box_xola', WQS_XOLA_URL . '/js/functions_for_search_box.js');
    wp_register_script('wqs_functions_for_check_available_xola', WQS_XOLA_URL . '/js/functions_for_check_available.js');

    wp_enqueue_script('wqs_functions_xola');
    wp_enqueue_script('wqs_functions_for_search_box_xola');
    wp_enqueue_script('wqs_functions_for_check_available_xola');

    wp_localize_script( 'wqs_functions_xola', 'js_var_xola', 
        array( 
            'apikey' => get_field('field_n1993k2903', 'option'),
            'userid_key' => get_field('field_n1993k2903_xola', 'option'),
            'integrate_rezdy' => get_field('rezdy', 'option'),
            'integrate_xola' => get_field('integrate_xola_with_this_website', 'option'),
            'wqs_api_url' => get_home_url( null, 'wp-json/wqs-api/tour_product_api'),
            'xola_group_tours' => get_field('xola_group_tours', 'option') 
             )
    );
    wp_localize_script( 'wqs_functions_for_check_available_xola', 'js_var', 
        array( 
            'userid_key' => get_field('field_n1993k2903_xola', 'option'),
             )
    );
}

add_action('wp_enqueue_scripts', 'wqs_load_scripts_xola');

