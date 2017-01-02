<?php


define('WQS_INITAPI_URL', get_stylesheet_directory_uri() . '/inc/init_api');
define('WQS_INITAPI_PATH', get_stylesheet_directory() . '/inc/init_api');

/// Register Script
function wqs_load_scripts_init()
{   

    //css
    wp_register_style('wqs_style', WQS_INITAPI_URL . '/css/style.css');
    wp_register_style('wqs_style_daterangepicker', WQS_INITAPI_URL . '/css/daterangepicker.css');

    wp_register_style('wqs_style_multipledatepicker', WQS_INITAPI_URL . '/css/multipleDatePicker.css');

    // js
    wp_register_script('wqs_angular',  WQS_INITAPI_URL . '/js/angular.min.js');
    wp_register_script('wqs_angular_animate', WQS_INITAPI_URL . '/js/angular-animate.min.js');
    wp_register_script('wqs_angular_filter', WQS_INITAPI_URL . '/js/angular-filter.min.js');
    wp_register_script('wqs_ng_infinite_scroll', WQS_INITAPI_URL . '/js/ng-infinite-scroll.min.js');
    //wp_register_script('wqs_angular_moment', WQS_INITAPI_URL . '/js/moment.js');

    wp_register_script('wqs_moment', WQS_INITAPI_URL . '/js/moment.min.js');
    wp_register_script('wqs_daterangepicker', WQS_INITAPI_URL . '/js/daterangepicker.js');

    wp_register_script('wqs_multipledatepicker', WQS_INITAPI_URL . '/js/multipleDatePicker.min.js');

    wp_enqueue_style('wqs_style');
    wp_enqueue_style('wqs_style_daterangepicker');
    wp_enqueue_style('wqs_style_multipledatepicker');

    wp_enqueue_script('wqs_angular');
    wp_enqueue_script('wqs_angular_animate');
    wp_enqueue_script('wqs_angular_filter');
    wp_enqueue_script('wqs_ng_infinite_scroll');
    //wp_enqueue_script('wqs_angular_moment');

    wp_enqueue_script('wqs_moment');
    wp_enqueue_script('wqs_daterangepicker');

    wp_enqueue_script('wqs_multipledatepicker');


}

add_action('wp_enqueue_scripts', 'wqs_load_scripts_init'); 