<?php

namespace TourismTiger;

class Theme_Assets
{

    function __construct() {
        add_action( 'wp_enqueue_scripts', __CLASS__ . '::tourtiger_scripts_method', 999 );
        add_action('wp_head', __CLASS__.'::tourtiger_background_inline_css', 49);
        //add_action('wp_head', __CLASS__.'::tourtiger_inline_css', 50);
        add_action('init', __CLASS__.'::load_theme_scripts', 999);
        add_filter('body_class', __CLASS__.'::set_styling_class', 10, 1);
        add_action('admin_enqueue_scripts', __CLASS__ . '::add_image_shortcode_script');
        add_action('wp_enqueue_scripts', __CLASS__.'::different_fixes');
        add_action( 'wp_footer', __CLASS__ . '::add_assets_in_footer' );
    }

    public static function add_assets_in_footer(){

        $font_styles = self::fetch_font_styles();

        if ( $font_styles ) :
            $text_color = $font_styles['text-color'];
            $hover_text_color = $font_styles['hover-text-color'];
        else :
            $text_color = 'white';
            $hover_text_color = '#0a84c7';
        endif;

        if ( isset($GLOBALS['sub-menu_inline']) && $GLOBALS['sub-menu_inline'] ) :

            $background_style = self::fetch_submenu_background() ?: 'background: white';

            ?>
                <style>
                    #menu-main-nav .sub-menu_inline:hover > .sub-menu {
                        display: flex;
                        justify-content: center;
                        width: calc( 100vw + 10px );
                        <?=$background_style?>
                    }
                    #menu-main-nav .sub-menu_inline > .sub-menu a {
                        height:100%;
                        border: none;
                        text-align: center;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                    }
                    #menu-main-nav .sub-menu_inline > .sub-menu a .image--shortcode .image--shortcode-background {
                        max-height: 50px;
                        margin: auto;
                    }
                    #menu-main-nav .sub-menu_inline > .sub-menu a .image--shortcode .image--shortcode-background.svg-image {
                        max-height: unset;
                        max-width: unset;
                        text-align: center;
                        margin: auto auto 10px;
                    }
                    #menu-main-nav .sub-menu_inline > .sub-menu a .image--shortcode .image--shortcode-background svg {
                        height: 50px;
                    }
                    #menu-main-nav .sub-menu_inline > .sub-menu > .menu-item {
                        border-top: none;
                    }
                    #menu-main-nav .sub-menu_inline > .sub-menu {
                        border-bottom: none;
                    }
                    .navbar-collapse .mobile-nav .sub-menu_inline .sub-menu.dropdown-menu a {
                        display: flex;
                        justify-content: space-between;
                    }
                    .navbar-collapse .mobile-nav .sub-menu_inline .sub-menu.dropdown-menu a .image--shortcode {
                        order: 2;
                    }
                    .navbar-collapse .mobile-nav .sub-menu_inline .sub-menu.dropdown-menu a .image--shortcode .image--shortcode-background.svg-image {
                        margin: 0 3rem 0 0;
                    }
                    .navbar-collapse .mobile-nav .sub-menu_inline .sub-menu.dropdown-menu a .image--shortcode .image--shortcode-background svg {
                        height: 3rem;
                        margin: -1rem 0;
                        width: 100%;
                    }
                </style>
            <?php

            wp_enqueue_script('sub-menu-inline', THEME_URL. '/js/sub-menu-inline.js', ['jquery'], TT_THEME_VERSION, true);

        endif;

        ?>
            <style>
                #menu-main-nav .menu-item > .sub-menu a .image--shortcode .image--shortcode-background svg {
                    fill: <?=$text_color?>;
                }
                #menu-main-nav .menu-item > .sub-menu a:hover .image--shortcode .image--shortcode-background svg {
                    fill: <?=$hover_text_color?>;
                }
                #menu-main-nav  .menu-item > .sub-menu a .image--shortcode .image--shortcode-background svg g {
                    stroke: <?=$text_color?>;
                }
                #menu-main-nav .menu-item > .sub-menu a:hover .image--shortcode .image--shortcode-background svg g {
                    stroke: <?=$hover_text_color?>;
                }
                #menu-main-nav .menu-item > .sub-menu a .image--shortcode .image--shortcode-background svg g path {
                    stroke: <?=$text_color?>;
                    fill: <?=$text_color?>;
                }
                #menu-main-nav .menu-item > .sub-menu a:hover .image--shortcode .image--shortcode-background svg g path {
                    stroke: <?=$hover_text_color?>;
                    fill: <?=$hover_text_color?>;
                }
            </style>
        <?php
    }

    private static function fetch_font_styles(): ?array
    {
        if ( class_exists('Styles_Plugin') ) :
            $styles = (new \Styles_Plugin)->get_css();

            if ( $styles ) :
                $result = [];
                $find_styles = [
                    'text-color'=>'.styles .main-nav-wrapper .genesis-nav-menu .sub-menu a',
                    'hover-text-color'=>'.styles .main-nav-wrapper .genesis-nav-menu .sub-menu a:hover'
                ];

                foreach ( $find_styles as $key => $style ) :
                    $pos = strpos($styles, $style);
                    $part = substr($styles, $pos + strlen($style));
                    $pos = strpos($part, '{');
                    $part = substr($part, $pos);
                    $pos = strpos($part, '}');
                    $part = substr($part, 1, $pos - 1);
                    $pos = strpos($part, 'color:');
                    $part = substr($part, $pos + 6);
                    $result[$key] = $part;
                endforeach;

                return $result;
            endif;
        endif;

        return null;
    }

    private static function fetch_submenu_background(){
        $upload_dir = wp_upload_dir();
        $dir = apply_filters( 'wp_sass_cache_path', trailingslashit( $upload_dir[ 'basedir' ] ) . 'wp-sass-cache' );
        $file = $dir . '/theme.css';

        if ( file_exists( $dir ) && file_exists( $file ) ) :
            $content = file_get_contents( $file );

            $pos = strpos($content, '.main-nav-wrapper .genesis-nav-menu .sub-menu a');
            $part = substr($content, $pos + 1 + strlen('.main-nav-wrapper .genesis-nav-menu .sub-menu a'));
            $pos = strpos($part, '{');
            $part = substr($part, $pos + 1);
            $pos = strpos($part, '}');
            $part = substr($part, 1, $pos - 1);

            return trim($part);
        endif;

        return null;
    }

    public static function different_fixes() {
        wp_enqueue_script('hero-position-fix', THEME_URL. '/js/hero-position-fix.js', NULL, TT_THEME_VERSION, true);
    }

    public static function add_image_shortcode_script(){
        wp_register_script( 'image-shortcode', THEME_URL . '/js/image-shortcode.js', array('jquery'), TT_THEME_VERSION, true);
        wp_enqueue_script('image-shortcode');
    }

    public static function set_styling_class($classes) {
        if ( is_singular( 'product' ) && get_field( 'is_dzv_prodpage_style' ) ) :
            $classes[] = get_field( 'dzv_prodpage_style' );
        endif;

        if ( is_singular( 'testimonial' ) && get_field('is-style') ) :
            $classes[] = get_field( 'testimonial-style' );
        endif;

        if ( is_page_template( 'page-templates/testimonials.php' ) && get_field('is_dzv_teti_style') ) :
            $classes[] = get_field( 'dzv_teti_style' );
        endif;

        return $classes;
    }

    public static function load_theme_scripts() {
        wp_register_script('spectrum_js', THEME_URL . '/js/spectrum.js', array('jquery'), TT_THEME_VERSION, true);
        wp_register_style('spectrum_style', THEME_URL .'/css/spectrum.css', array(),TT_THEME_VERSION);
        wp_enqueue_style( 'spectrum_style' );
        wp_enqueue_script( 'spectrum_js' );
        wp_deregister_style( 'tourtiger' );
    }

    public static function tourtiger_background_inline_css() {

        echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css">' . "\n";
        require(CHILD_DIR.'/background_gpm.php');
        echo '</style>' . "\n";
        echo '<!-- End Custom CSS -->' . "\n";
        echo "\n";
    }

    public static function tourtiger_scripts_method() {

        if( !is_admin() ) {
            wp_deregister_script( 'jquery' );
            wp_register_script( 'jquery', ("https://code.jquery.com/jquery-2.2.4.min.js"), false, null, true);
            wp_deregister_script('jquery-ui');
            wp_register_script('jquery-ui',("https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"), false, null, true);
            wp_register_script( 'jquery', ("https://code.jquery.com/jquery-2.2.4.min.js"), false, null, true);
            wp_deregister_script('jquery-ui');
            wp_register_script('jquery-ui',("https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"), false, null, true);

            wp_register_script('bootstrapjs', THEME_URL . '/js/bootstrap.min.js', array('jquery'), null, true);
            wp_register_style('bootstrap', THEME_URL .'/css/main.min.css', array(), TT_THEME_VERSION, 'all');
            $uploads_dir = wp_upload_dir();
            wp_register_style('theme_prdctn', $uploads_dir['baseurl'] . '/wp-sass-cache/theme.css', array(),'all');
            wp_register_style('compass', THEME_URL .'/css/screen.css', array(),null, 'all');
            wp_register_style('bootstrap_select', THEME_URL .'/css/bootstrap-select.css', array(),null, 'all');
            wp_register_style('magnific_popup_css', THEME_URL .'/css/magnific-popup.css', array(),null, 'all');
            wp_register_style('flexslider_css', THEME_URL .'/css/flexslider.css', array(),null, 'all');

            wp_register_script('respond', THEME_URL . '/js/respond.min.js', array('jquery'), null, true);
            wp_register_script('respond_matchmedia', THEME_URL . '/js/respond.matchmedia.addListener.min.js', array('jquery'), null, true);
            wp_register_script('booking_hound_api', THEME_URL . '/js/booking-hound-api.js', array(), false, true);

            wp_register_script('raty', THEME_URL . '/js/jquery.raty.min.js', array('jquery'), null, true);
            wp_register_script('scrollit', THEME_URL . '/js/scrollIt.min.js', array('jquery'), null, true);
            wp_register_script('magnific_popup', THEME_URL . '/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
            wp_register_script('flexslider_js', THEME_URL . '/js/jquery.flexslider-min.js', array('jquery'), null, true);

            wp_register_script('slick-slider', THEME_URL . '/js/slick.js', array('jquery'), null, true);

            wp_register_script('match_height', THEME_URL . '/js/jquery.matchHeight-min.js', array('jquery'), null, true);
            wp_register_script('modernizr', THEME_URL . '/js/modernizr.js', array('jquery'), null, false);
            wp_register_script('browser_selector', THEME_URL . '/js/css_browser_selector.js', array('jquery'), null, false);

            wp_register_script('bootstrap_selectjs', THEME_URL . '/js/bootstrap-select.js', array('jquery'), null, true);
            wp_register_script('custom_two', THEME_URL . '/js/custom2.js', array('jquery'), null, true);
            wp_register_script('colorbox', ("https://d3v829qmdl4tvv.cloudfront.net/lightbox/jquery.colorbox-min.js"), array('jquery'), null, true);
            wp_register_script('application1', ("https://d3v829qmdl4tvv.cloudfront.net/lightbox/application1.js"), array('jquery'), null, true);
            wp_register_script('rezdy_modal', THEME_URL . '/inc/init_api/js/rezdy.min.js', array('jquery'), null, true);

            $integrate_orioly = get_field('orioly','option');
            $integrate_trekksoft = get_field('trekksoft','option');
            $trekksoft_account = get_field('trekksoft_account','option');
            $integrate_xola = get_field('integrate_xola_with_this_website','option');
            $integrate_rezdy = get_field('rezdy','option');
            $integrate_regiondo = get_field('regiondo','option');
            $integrate_zozi = get_field('zozi','option');

            if ( $integrate_orioly ):
                wp_register_script('orioly', ("https://book-now.orioly.com/scripts/book.js"), array(), null, true);
            endif;

            if ( $integrate_trekksoft && $trekksoft_account ):
                wp_register_script('trekksoft', ("//$trekksoft_account.trekksoft.com/en/api/public"), array('jquery'), null, false);
            endif;

            if ($integrate_xola):
                wp_register_script('xola_checkout', ("https://xola.com/checkout.js"), array(), null, false);
                wp_register_script('xola_crossdomain', THEME_URL . '/js/crossdomainfix.js', array(), TT_THEME_VERSION, false);
            endif;

            wp_register_script('mainjs', THEME_URL . '/js/main.js', array('jquery'), TT_THEME_VERSION, true);


            if ( get_field('google_maps','apikey')  ) :
                wp_register_script( "api-key-maps", "https://maps.googleapis.com/maps/api/js?key=" . get_field('google_maps','apikey'), array(), null, true);
            endif;


            if ( $integrate_regiondo ):
                wp_register_script('regiondo_btn', ("https://cdn.regiondo.net/js/integration/regiondo-button.js"), array(), null, true);
            endif;

            if( $integrate_zozi ):
                wp_register_script('zozi_btn', ("https://a.zozi.com/assets/widgets/bookit.js"), array(), null, true);
                wp_register_script('zozi_lightbox_btn_launcher', ("https://a.zozi.com/assets/widgets/lightbox-button-launcher.js"), array(), null, true);
            endif;

            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'bootstrapjs' );

            $integrate_getinsellout = get_field('getinsellout','option');

            if ( $integrate_getinsellout ):
                wp_enqueue_script('colorbox');
                wp_enqueue_script('application1');
            endif;

            if( $integrate_orioly ):
                wp_enqueue_script('orioly');
            endif;

            if( $integrate_trekksoft && $trekksoft_account ):
                wp_enqueue_script('trekksoft');
            endif;

            if( $integrate_rezdy ):
                wp_enqueue_script('rezdy_modal');
            endif;

            //if($integrate_xola):
            wp_enqueue_script('xola_checkout');
            wp_enqueue_script('xola_crossdomain');
            //endif;

            if( $integrate_regiondo ) :
                wp_enqueue_script('regiondo_btn');
            endif;

            if($integrate_zozi):
                wp_enqueue_script('zozi_btn');
                wp_enqueue_script('zozi_lightbox_btn_launcher');
            endif;

            wp_enqueue_style('bootstrap');
            wp_enqueue_style('compass');
            wp_enqueue_style('bootstrap_select');
            wp_enqueue_style('magnific_popup_css');
            wp_enqueue_style('flexslider_css');
            $spctrmdev = get_option('spctrmdev', '0');

            if ( !empty($spctrmdev) || !$spctrmdev == '0' ) :
                wp_enqueue_style('theme_prdctn');
            else:
                wp_enqueue_style('theme_prdctn');
            endif;

            wp_enqueue_script( 'respond' );

            wp_enqueue_script( 'respond_matchmedia' );
            wp_enqueue_script( 'raty' );
            wp_enqueue_script( 'scrollit' );
            wp_enqueue_script( 'magnific_popup' );
            wp_enqueue_script( 'flexslider_js' );


            wp_enqueue_script( 'match_height' );
            wp_enqueue_script( 'modernizr' );

            wp_enqueue_script('bootstrap_selectjs');
            wp_enqueue_script('slick-slider');
            wp_enqueue_script( 'mainjs' );

            wp_localize_script( 'mainjs', 'global_vars', array(
                'postid'  => get_the_ID(),
                'nonce'   => wp_create_nonce( 'nonce' ),
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'hawaiifun' => get_field('is-hawaiifun', 'option'),
                'permalink' => get_permalink(get_the_ID()),
                'themeurl' => THEME_URL,
                'googlemaps' => get_field('google_maps','apikey'),
                'gf_public' => get_field('gf_public_key','apikey'),
                'gf_private' => get_field('gf_private_key','apikey'),
                'siteurl' => get_bloginfo('url'),
                'is_admin' => current_user_can('edit_posts')
            ) );

            if ( is_page_template( 'page-templates/test-pc.php' ) )
                wp_enqueue_script( 'api-key-maps' );
        }
    }


    // This function is commented
    public static function tourtiger_inline_css() {

        echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css">' . "\n";

        $wbgc = get_option('wbgc');
        if($wbgc != '' && $wbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-container {background: '.$wbgc.'; }' . "\n";
        elseif($wbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-container {background: none; }' . "\n";
        endif;

        $ahabgc = get_option('ahabgc');
        if($ahabgc != '' && $ahabgc != 'rgba(0, 0, 0, 0)'):
            echo '	.above-header {background: '.$ahabgc.'; }' . "\n";
        elseif($ahabgc == 'rgba(0, 0, 0, 0)'):
            echo '	.above-header {background: none; }' . "\n";
        endif;

        $hbgc = get_option('hbgc');
        if($hbgc != '' && $hbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .site-header .header-bar, .site-container .site-header .header-bar-wrapper{background: '.$hbgc.'; }' . "\n";
        elseif($hbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .site-header .header-bar, .site-container .site-header .header-bar-wrapper{background: none; }' . "\n";
        endif;



        $pmsbgc = get_option('pmsbgc');
        if($pmsbgc != '' && $pmsbgc != 'rgba(0, 0, 0, 0)'):
            echo ' .main-nav-wrapper .genesis-nav-menu .sub-menu a{background: '.$pmsbgc.';}' . "\n";
        elseif($pmsbgc == 'rgba(0, 0, 0, 0)'):
            echo '.main-nav-wrapper .genesis-nav-menu .sub-menu a{background: none;}' . "\n";
        endif;

        $mnhctabgc= get_option('mnhctabgc');
        if($mnhctabgc != '' && $mnhctabgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .genesis-nav-menu .book-btn  {background: '.$mnhctabgc.'; }' . "\n";
        elseif($mnhctabgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .genesis-nav-menu .book-btn {background: none;}' . "\n";
        endif;

        $bwsmbgc = get_option('bwsmbgc');
        if($bwsmbgc != '' && $bwsmbgc != 'rgba(0, 0, 0, 0)'):
            echo ' .secondary-nav-wrapper .container{background: '.$bwsmbgc.';}' . "\n";
        elseif($bwsmbgc == 'rgba(0, 0, 0, 0)'):
            echo '.secondary-nav-wrapper .container{background: none;}' . "\n";
        endif;


        $smsbgc = get_option('smsbgc');
        if($smsbgc != '' && $smsbgc != 'rgba(0, 0, 0, 0)'):
            echo ' .secondary-nav-wrapper .genesis-nav-menu .sub-menu a{background: '.$smsbgc.';}' . "\n";
        elseif($smsbgc == 'rgba(0, 0, 0, 0)'):
            echo '.secondary-nav-wrapper .genesis-nav-menu .sub-menu a{background: none;}' . "\n";
        endif;

        $mtbbgc = get_option('mtbbgc');
        if($mtbbgc != '' && $mtbbgc != 'rgba(0, 0, 0, 0)'):
            echo ' .navbar .navbar-toggle{background: '.$mtbbgc.';}' . "\n";
        elseif($mtbbgc == 'rgba(0, 0, 0, 0)'):
            echo '.navbar .navbar-toggle{background: none;}' . "\n";
        endif;

        $mtbhbgc = get_option('mtbhbgc');
        if($mtbhbgc != '' && $mtbhbgc != 'rgba(0, 0, 0, 0)'):
            echo ' .navbar .navbar-toggle:hover, .navbar .navbar-toggle:focus{background: '.$mtbhbgc.';}' . "\n";
        elseif($mtbhbgc == 'rgba(0, 0, 0, 0)'):
            echo '.navbar .navbar-toggle:hover, .navbar .navbar-toggle:focus{background: none;}' . "\n";
        endif;

        $himgt= get_option('himgt');
        if($himgt != '' && $himgt != 'rgba(0, 0, 0, 0)'):
            echo '	.tint{background: '.$himgt.'; }' . "\n";
        elseif($himgt == 'rgba(0, 0, 0, 0)'):
            echo '	.tint{background: none; }' . "\n";
        endif;

        $timgt= get_option('timgt');
        if($timgt != '' && $timgt != 'rgba(0, 0, 0, 0)'):
            echo '	.tile-tint{background: '.$timgt.'; }' . "\n";
        elseif($timgt == 'rgba(0, 0, 0, 0)'):
            echo '	.tile-tint{background: none; }' . "\n";
        endif;

        $htbgc= get_option('htbgc');
        if($htbgc != '' && $htbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.banner-top h1 span, .banner-top h2 span, .tour-2 .name {background: '.$htbgc.'; }' . "\n";
        elseif($htbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.banner-top h1 span, .banner-top h2 span, .tour-2 .name {background: none; }' . "\n";
        endif;

        $hcbgc= get_option('hcbgc');
        if($hcbgc != '' && $hcbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.banner-top li span, .banner-top p span {background: '.$hcbgc.' !important; }' . "\n";
        elseif($hcbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.banner-top li span, .banner-top p span {background: none !important; }' . "\n";
        endif;

        $hctabgc= get_option('hctabgc');
        if($hctabgc != '' && $hctabgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .book-btn-wrapper .dropdown-menu, .site-container .book-btn-wrapper .btn-default.book-btn, .site-container .book-btn  {background: '.$hctabgc.'; }' . "\n";
        elseif($hctabgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .book-btn-wrapper .dropdown-menu, .site-container .book-btn-wrapper .btn-default.book-btn, .site-container .book-btn {background: none;}' . "\n";
        endif;

        $podfbgc= get_option('podfbgc');
        if($podfbgc != '' && $podfbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.home .banner-bottom .container {background: '.$podfbgc.'; }' . "\n";
        elseif($podfbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.home .banner-bottom .container {background: none; }' . "\n";
        endif;

        $podtbgc= get_option('podtbgc');
        if($podtbgc != '' && $podtbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.banner-bottom .container {background: '.$podtbgc.'; }' . "\n";
        elseif($podtbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.banner-bottom .container {background: none; }' . "\n";
        endif;

        $ftabgc= get_option('ftabgc');
        if($ftabgc != '' && $ftabgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .featured-tours .view-tour-btn .xola-custom, .view-tour-btn a {background: '.$ftabgc.'; }' . "\n";
        elseif($ftabgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .featured-tours .view-tour-btn .xola-custom, .view-tour-btn a {background: none; }' . "\n";
        endif;

        $cabgc= get_option('cabgc');
        if($cabgc != '' && $cabgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-inner .content {background: '.$cabgc.'; }' . "\n";
        elseif($cabgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-inner .content {background: none; }' . "\n";
        endif;

        $facbgc= get_option('facbgc');
        if($facbgc != '' && $facbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.featured-tours .container, .featured-tours-2 .position-wrapper, .featured-section .container {background: '.$facbgc.'; }' . "\n";
        elseif($facbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.featured-tours .container, .featured-tours-2 .position-wrapper, .featured-section .container {background: none; }' . "\n";
        endif;

        $ccbgc= get_option('ccbgc');
        if($ccbgc != '' && $ccbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.testimonials .container, .reasons .container, .single-tour .left-col, .page-template-default .left-col, .page-template-page-templatestestimonials-php .left-col, .page-template-page-templatestours-php .left-col, .blog-left-col, .faq-page-content .container, .team-members .container, .single-tour .right-col>div, .page-template-default .right-col>div, .page-template-page-templatestestimonials-php .right-col>div, .page-template-page-templatestours-php .right-col>div, .single-tour .right-col .testimonials, .page-template-default .right-col .testimonials, .blog-right-col>div, .classic-itinerary-list .num-wrapper .itinery-num{background: '.$ccbgc.'; }' . "\n";
        elseif($ccbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.testimonials .container, .reasons .container, .single-tour .left-col, .page-template-default .left-col, .page-template-page-templatestestimonials-php .left-col, .page-template-page-templatestours-php .left-col, .blog-left-col, .faq-page-content .container, .team-members .container, .single-tour .right-col>div, .page-template-default .right-col>div, .page-template-page-templatestestimonials-php .right-col>div, .page-template-page-templatestours-php .right-col>div, .single-tour .right-col .testimonials, .page-template-default .right-col .testimonials, .blog-right-col>div, .classic-itinerary-list .num-wrapper .itinery-num{background: none; }' . "\n";
        endif;

        $cctabgc= get_option('cctabgc');
        if($cctabgc != '' && $cctabgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .book-tour-wrapper{background: '.$cctabgc.'; }' . "\n";
        elseif($cctabgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-container .book-tour-wrapper{background: none; }' . "\n";
        endif;

        $scbgc= get_option('scbgc');
        if($scbgc != '' && $scbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.subscribe .container{background: '.$scbgc.'; }' . "\n";
        elseif($scbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.subscribe .container{background: none; }' . "\n";
        endif;

        $tlib = get_option('tlib');
        if($tlib != '' && $tlib != 'rgba(0, 0, 0, 0)'):
            echo '	.trip-list .trip-item{background: '.$tlib.'; }' . "\n";
        elseif($tlib == 'rgba(0, 0, 0, 0)'):
            echo '	.trip-list .trip-item{background: none; }' . "\n";
        endif;

        $fbgc= get_option('fbgc');
        if($fbgc != '' && $fbgc != 'rgba(0, 0, 0, 0)'):
            echo '	.site-footer{background: '.$fbgc.'; }' . "\n";
        elseif($fbgc == 'rgba(0, 0, 0, 0)'):
            echo '	.site-footer{background: none; }' . "\n";
        endif;

        echo '</style>' . "\n";
        echo '<!-- End Custom CSS -->' . "\n";
        echo "\n"; }

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

Theme_Assets::instance();
