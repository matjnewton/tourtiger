<?php

define('WQS_REZDYAPI_URL', get_stylesheet_directory_uri() . '/inc/rezdy_api');
define('WQS_REZDYAPI_PATH', get_stylesheet_directory() . '/inc/rezdy_api');

/// Register Script
function wqs_load_scripts_rezdyapi()
{   

    wp_register_script('wqs_functions_rezdyapi', WQS_REZDYAPI_URL . '/js/functions.js');
    wp_register_script('wqs_functions_for_search_box_rezdyapi', WQS_REZDYAPI_URL . '/js/functions_for_search_box.js');
    wp_register_script('wqs_functions_for_check_available_rezdyapi', WQS_REZDYAPI_URL . '/js/functions_for_check_available.js');

    wp_enqueue_script('wqs_functions_rezdyapi');
    wp_enqueue_script('wqs_functions_for_search_box_rezdyapi');
    wp_enqueue_script('wqs_functions_for_check_available_rezdyapi');

    wp_localize_script( 'wqs_functions_rezdyapi', 'js_var', 
        array( 
            'apikey' => get_field('field_n1993k2903', 'option'),
            // 'userid_key' => get_field('field_n1993k2903_xola', 'option'),
            // 'integrate_rezdy' => get_field('rezdy', 'option'),
            // 'integrate_xola' => get_field('integrate_xola_with_this_website', 'option'),
             )
    );
}

add_action('wp_enqueue_scripts', 'wqs_load_scripts_rezdyapi');


