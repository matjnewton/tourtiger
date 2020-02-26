<?php
namespace TourismTiger;

class Redirect410
{

    function __construct()
    {
        add_action('wp', __CLASS__.'::run_on_wp');
    }


    public static function run_on_wp() {
        global $wp_query;

        if (is_404() && isset($_SERVER['REQUEST_URI'])) :
            $slug = self::get_slug_from_request($_SERVER['REQUEST_URI']);

            $query = new \WP_Query([
                'post_type' => 'any',
                'post_status' => 'trash',
                'pagename' => $slug.'__trashed',
            ]);

            if (isset($query->posts) && $query->posts && isset($query->posts[0])) :
                header( "HTTP/1.1 410 Gone" );

                // is_410();
                $wp_query->set( 'is_410', 1 );
            endif;
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

    private static function get_slug_from_request($url  = '') {
        $request_array = explode('/', $url);
        $strings_array = [];

        if (is_array($request_array)) :
            foreach ($request_array as $string) :
                if ($string)
                    $strings_array[] = $string;
            endforeach;

            $count = count($strings_array);
            $position  = $count - 1;

            if (array_key_exists($position, $strings_array) && $strings_array[$position]) :
                return $strings_array[$position];
            endif;
        endif;

        return '';
    }

}

Redirect410::instance();