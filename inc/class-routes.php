<?php

namespace TourismTiger;

use WP_REST_Request;

class WP_Routes
{

    function __construct() {
        add_action( 'rest_api_init', __CLASS__ . '::register_routes' );
    }

    public static function register_routes()
    {
        register_rest_route('ttv1', 'get_media_id', array(
            'methods' => 'GET',
            'callback' => __CLASS__ . '::ttv1_get_media_id',
            'args' => [
                'url'
            ]
        ));
    }

    public static function ttv1_get_media_id( WP_REST_Request $request ){
        $parameters = $request->get_query_params();

        if ( is_array($parameters) && isset($parameters['url']) ) :
            $parameters['id'] = attachment_url_to_postid($parameters['url']);
            wp_send_json_success(["Route has been connected!", '$parameters'=>$parameters]);
        else :
            wp_send_json_error("Url is missing!");
        endif;
    }

    /**
     * @var null
     */
    protected static $instance = null;


    /**
     * Return an instance of this class.
     * @return    object    A single instance of this class.
     */
    public static function instance() {

        // If the single instance hasn't been set, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}

WP_Routes::instance();
