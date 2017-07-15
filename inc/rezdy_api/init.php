<?php

define('WQS_REZDYAPI_URL', get_stylesheet_directory_uri() . '/inc/rezdy_api');
define('WQS_REZDYAPI_PATH', get_stylesheet_directory() . '/inc/rezdy_api');

/// Register Script
function wqs_load_scripts_rezdyapi()
{   

    $template = array('page-templates/rezdy_search.php');

    if( is_page_template( $template ) || is_singular('product')) :

        wp_register_script('wqs_functions_rezdyapi', WQS_REZDYAPI_URL . '/js/functions.js');
        wp_register_script('wqs_functions_for_search_box_rezdyapi', WQS_REZDYAPI_URL . '/js/functions_for_search_box.js');
        wp_register_script('wqs_functions_for_check_available_rezdyapi', WQS_REZDYAPI_URL . '/js/functions_for_check_available.js');

        wp_enqueue_script('wqs_functions_rezdyapi');
        wp_enqueue_script('wqs_functions_for_search_box_rezdyapi');
        wp_enqueue_script('wqs_functions_for_check_available_rezdyapi');

        $rezdy_cat = get_field('rezdy_cat', 'option');
        $rezdy_cat_id = '';
        if ($rezdy_cat) {
            $rezdy_cat_id = get_field('rezdy_cat_id', 'option');
        } else {
            $rezdy_cat_id = '';
        }

        wp_localize_script( 'wqs_functions_rezdyapi', 'js_var', 
            array( 
                'apikey' => get_field('field_n1993k2903', 'option'),
                'rezdy_cat_id' => $rezdy_cat_id,
                'wqs_api_url' => get_home_url( null, 'wp-json/wqs-api/tour_product_api'),
                'rezdy_group_tours' => get_field('rezdy_group_tours', 'option'), 
                 )
        );
    endif;

}

add_action('wp_enqueue_scripts', 'wqs_load_scripts_rezdyapi');


