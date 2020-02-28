<?php
namespace TourismTiger;

class Redirect410
{

    function __construct()
    {
        add_action('wp', __CLASS__.'::run_on_wp');
        add_action('tt2/410/message', __CLASS__.'::render_410_message');
    }


    public static function render_410_message() {
        $phone = get_option('options_phone_number');
        $mail  = get_bloginfo('admin_email');
        ?>

        <div class="box wysiwyg primary-content padding_top padding_bottom" align="center">
            <h3>Hey!<br/>We’re <?php echo get_bloginfo('name'); ?></h3>
            <p><strong>Sorry to inform you, but the page you’re looking for has been permanently removed.</strong></p>
            <p>Use the menu to navigate through our experiences or visit our <a href="/">homepage</a>.<br/>
                You can also get in contact with us at <a href="tel:<?php echo preg_replace('/\D+/', '', $phone); ?>"><?=$phone;?></a> or by email at <?=$mail;?>.</p>
        </div>

        <?php
    }


    public static function run_on_wp() {
        global $wp_query;

        if (is_404() && isset($_SERVER['REQUEST_URI'])) :
            if (self::is_trashed_post_of_page( self::get_slug_from_request($_SERVER['REQUEST_URI']) )) :
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

    private static function is_trashed_post_of_page() {
        $query_post = new \WP_Query([
            'post_type' => 'any',
            'post_status' => 'trash',
            // 'pagename' => $slug.'__trashed',
            'post_name' => $slug.'__trashed',
        ]);

        if (isset($query_post->posts) && $query_post->posts && isset($query_post->posts[0])) :
            return $query_post->posts[0]->ID;
        else :
            $query_page = new \WP_Query([
                'post_type' => 'any',
                'post_status' => 'trash',
                'pagename' => $slug.'__trashed',
            ]);

            if (isset($query_page->posts) && $query_page->posts && isset($query_page->posts[0])) :
                return $query_page->posts[0]->ID;
            endif;
        endif;

        return false;
    }
}

Redirect410::instance();
