<?php

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

include_once( get_stylesheet_directory() . '/includes/acf_fields_primary-content.php' );

include_once( get_stylesheet_directory() . '/includes/plugins/additional-fonts-includer/additional-fonts-includer.php' );

include_once( get_stylesheet_directory() . '/includes/hawaiifun-api.php' );


// include_once( get_stylesheet_directory() . '/includes/acf/acf_fields_product.php' );
// include_once( get_stylesheet_directory() . '/includes/functions/product_functions.php' );
// include_once( get_stylesheet_directory() . '/includes/post_types/cpt_product.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'tourtiger' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.2' );


add_action( 'wp_enqueue_scripts', 'tourtiger_scripts_method', 999 );
function tourtiger_scripts_method() {
    if(!is_admin()) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ("https://code.jquery.com/jquery-2.2.4.min.js"), false, null, true);
        wp_deregister_script('jquery-ui');
        wp_register_script('jquery-ui',("https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"), false, null, true);
        wp_register_script( 'jquery', ("https://code.jquery.com/jquery-2.2.4.min.js"), false, null, true);
        wp_deregister_script('jquery-ui');
        wp_register_script('jquery-ui',("https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"), false, null, true);

        wp_register_script('bootstrapjs', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
        wp_register_style('bootstrap', get_stylesheet_directory_uri() .'/css/main.css', array(),null, 'all');
		$uploads_dir = wp_upload_dir(); 
        wp_register_style('theme_prdctn', $uploads_dir['baseurl'] . '/wp-sass-cache/theme.css', array(),'all');
        wp_register_style('compass', get_stylesheet_directory_uri() .'/css/screen.css', array(),null, 'all');
        wp_register_style('bootstrap_select', get_stylesheet_directory_uri() .'/css/bootstrap-select.css', array(),null, 'all');
        wp_register_style('magnific_popup_css', get_stylesheet_directory_uri() .'/css/magnific-popup.css', array(),null, 'all');
        wp_register_style('flexslider_css', get_stylesheet_directory_uri() .'/css/flexslider.css', array(),null, 'all');
        //wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(),'20120285', 'all' );
		//wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 'v3.1.1', true );
		//wp_register_script('ie_row_fix', get_stylesheet_directory_uri() . '/js/ie-row-fix.js', array('jquery'), '1.0', true);
		
		wp_register_script('respond', get_stylesheet_directory_uri() . '/js/respond.min.js', array('jquery'), null, true);
		wp_register_script('respond_matchmedia', get_stylesheet_directory_uri() . '/js/respond.matchmedia.addListener.min.js', array('jquery'), null, true);
		
		wp_register_script('raty', get_stylesheet_directory_uri() . '/js/jquery.raty.min.js', array('jquery'), null, true);
		wp_register_script('scrollit', get_stylesheet_directory_uri() . '/js/scrollIt.min.js', array('jquery'), null, true);
		wp_register_script('magnific_popup', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
		wp_register_script('flexslider_js', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), null, true);
		
		wp_register_script('slick-slider', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), null, true);

		wp_register_script('match_height', get_stylesheet_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), null, true);
		wp_register_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', array('jquery'), null, false);
		wp_register_script('browser_selector', get_stylesheet_directory_uri() . '/js/css_browser_selector.js', array('jquery'), null, false);
		//wp_register_script('vendor', get_stylesheet_directory_uri() . '/js/vendor.js', array('jquery'), '2.8.3', false);
		//wp_register_script('plugins', get_stylesheet_directory_uri() . '/js/plugins.js', array('jquery'), '2.8.3', false);
		
		wp_register_script('bootstrap_selectjs', get_stylesheet_directory_uri() . '/js/bootstrap-select.js', array('jquery'), null, true);
		//wp_register_script('customjs', get_stylesheet_directory_uri() . '/js/server-custom.js', array('jquery'), '1.2.8', true);
		wp_register_script('custom_two', get_stylesheet_directory_uri() . '/js/custom2.js', array('jquery'), null, true);
		wp_register_script('colorbox', ("https://d3v829qmdl4tvv.cloudfront.net/lightbox/jquery.colorbox-min.js"), array('jquery'), null, true);
		wp_register_script('application1', ("https://d3v829qmdl4tvv.cloudfront.net/lightbox/application1.js"), array('jquery'), null, true);
		//wp_register_script('rezdy_modal', ("https://tilbatours.rezdy.com/pluginJs?script=modal"), array('jquery'), null, true);
		wp_register_script('rezdy_modal', get_stylesheet_directory_uri() . '/incinit_api/js/rezdy.min.js', array('jquery'), null, true);
		
		$integrate_orioly = get_field('orioly','option');
		$integrate_trekksoft = get_field('trekksoft','option');
		$trekksoft_account = get_field('trekksoft_account','option');
		$integrate_xola = get_field('integrate_xola_with_this_website','option');
		$integrate_rezdy = get_field('rezdy','option');
		$integrate_regiondo = get_field('regiondo','option');
		$integrate_zozi = get_field('zozi','option');
		
		if($integrate_orioly):
        wp_register_script('orioly', ("https://book-now.orioly.com/scripts/book.js"), array(), null, true);
        endif;
        
		if($integrate_trekksoft && $trekksoft_account):
		wp_register_script('trekksoft', ("//$trekksoft_account.trekksoft.com/en/api/public"), array('jquery'), null, false);
		endif;
		
		if($integrate_xola):
		wp_register_script('xola_checkout', ("https://xola.com/checkout.js"), array(), null, false);
		wp_register_script('xola_crossdomain', get_stylesheet_directory_uri() . '/js/crossdomainfix.js', array(), null, false);
		endif;
		
		wp_register_script('mainjs', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), null, true);


		if ( get_field('google_maps','apikey') ) :
		  wp_register_script( "api-key-maps", "https://maps.googleapis.com/maps/api/js?key=" . get_field('google_maps','apikey'), array(), null, true);
		endif;
		
		
		if($integrate_regiondo):
		wp_register_script('regiondo_btn', ("https://cdn.regiondo.net/js/integration/regiondo-button.js"), array(), null, true);
		endif;
		
		if($integrate_zozi):
		wp_register_script('zozi_btn', ("https://a.zozi.com/assets/widgets/bookit.js"), array(), null, true);
		wp_register_script('zozi_lightbox_btn_launcher', ("https://a.zozi.com/assets/widgets/lightbox-button-launcher.js"), array(), null, true);
		endif;
		
		wp_enqueue_script( 'jquery' );
		/*wp_register_script('ie8js', get_stylesheet_directory_uri() .'/js/ie8.js', array('jquery'), '1.0', false);
		wp_enqueue_script( 'ie8js' );
        wp_script_add_data( 'ie8js', 'conditional', 'IE 8' );*/
		wp_enqueue_script( 'bootstrapjs' );
		//wp_enqueue_script( 'ie_row_fix' );
		$integrate_getinsellout = get_field('getinsellout','option');
		if($integrate_getinsellout):
		wp_enqueue_script('colorbox');
		wp_enqueue_script('application1');
		endif;
		
		if($integrate_orioly):
		wp_enqueue_script('orioly');
		endif;
		
		if($integrate_trekksoft && $trekksoft_account):
		wp_enqueue_script('trekksoft');
		endif;
		
		if($integrate_rezdy):
		wp_enqueue_script('rezdy_modal');
		endif;
		
		//if($integrate_xola):
		wp_enqueue_script('xola_checkout');
		wp_enqueue_script('xola_crossdomain');
		//endif;
		
		if($integrate_regiondo):
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
		if (!empty($spctrmdev) || !$spctrmdev == '0'):
		wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/theme.scss.php' );
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
		//wp_enqueue_script('browser_selector');
		//wp_enqueue_script( 'vendor' );
		//wp_enqueue_script( 'plugins' );
		
		wp_enqueue_script('bootstrap_selectjs');
		//wp_enqueue_script( 'customjs' );
		//wp_enqueue_script( 'custom_two' );
		wp_enqueue_script('slick-slider');
		wp_enqueue_script( 'mainjs' );

		wp_localize_script( 'mainjs', 'global_vars', array( 
			'postid'  => get_the_ID(),
			'nonce'   => wp_create_nonce( 'nonce' ),
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'hawaiifun' => get_field('is-hawaiifun', 'option'),
			'permalink' => get_permalink(get_the_ID()),
			'themeurl' => get_stylesheet_directory_uri(),
			'googlemaps' => get_field('google_maps','apikey'),
			'gf_public' => get_field('gf_public_key','apikey'),
			'gf_private' => get_field('gf_private_key','apikey'),
			'siteurl' => get_bloginfo('url'),
			'is_admin' => current_user_can('edit_posts')
		) );
		
		wp_enqueue_script( 'api-key-maps' );
	}
}

function bgmpShortcodeCalled()
{
    global $post;
    
    $shortcodePageSlugs = array(
        'contact-us'
    );
    
    $queried_post_type = get_query_var('post_type');
    if ( (is_single() && 'tour' ==  $queried_post_type) || is_page_template('page-templates/front-page.php') || is_page_template('page-templates/front-page3.php') ) {
      add_filter( 'bgmp_map-shortcode-called', '__return_true' );
    }
    
    if( $post )
        if( in_array( $post->post_name, $shortcodePageSlugs ) )
            add_filter( 'bgmp_map-shortcode-called', '__return_true' );
}
add_action( 'wp', 'bgmpShortcodeCalled' );

function regiondo_script_loader_tag( $tag, $handle ){
    if ( $handle == 'regiondo_btn' ) {
        return str_replace( '<script', '<script id="regiondo-button-js" async defer', $tag );
    }
    return $tag;    
}
add_filter( 'script_loader_tag', 'regiondo_script_loader_tag', 10 ,2 );

function orioly_script_loader_tag( $tag, $handle ){
    if ( $handle == 'orioly' ) {
        return str_replace( '<script', '<script async', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'orioly_script_loader_tag', 10 ,2 );

//* Enqueue Lato Google font
/*add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}*/

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
//add_theme_support( 'genesis-footer-widgets', 3 );

add_post_type_support('tour','genesis-seo');
add_post_type_support('tour','genesis-layouts');
add_post_type_support('tour','genesis-scripts' );
add_post_type_support('section','genesis-layouts');
add_post_type_support('testimonial','genesis-layouts');

//* Remove site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_loop', 'genesis_do_subnav' );

add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ), 'secondary' => __( 'Secondary Navigation Menu', 'genesis' ), 'mobile' => __('Mobile Navigation Menu', 'genesis'), 'language_switcher' => __('Languages Menu', 'genesis') ) );

//* Wrap .nav-secondary in a custom div
add_filter( 'genesis_do_subnav', 'genesis_child_subnav', 10, 3 );
function genesis_child_subnav($subnav_output, $subnav, $args) {
 
return '<section class="secondary-nav-wrapper"><div class="hidden-xs container"><div class="row"><div class="col col-sm-12">' . $subnav_output . '</div></div></div></section>';
 
}

add_action( 'wp_footer', 'mycustom_post_info', 9 );
function mycustom_post_info(){
    
}

/*add_theme_support( 'custom-header', array(
	'default-text-color'     => 'ffffff',
	'height'                 => 164,
	'width'                  => 320,
) );*/



//* Register widget areas
/*genesis_register_sidebar( array(
	'id'          => 'home-top',
	'name'        => __( 'Home - Top', 'tourtiger' ),
	'description' => __( 'This is the top section of the homepage.', 'tourtiger' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-middle-left',
	'name'        => __( 'Home - Middle Left', 'tourtiger' ),
	'description' => __( 'This is the middle left section of the homepage.', 'tourtiger' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-middle-right',
	'name'        => __( 'Home - Middle Right', 'tourtiger' ),
	'description' => __( 'This is the middle right section of the homepage.', 'tourtiger' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom',
	'name'        => __( 'Home - Bottom', 'tourtiger' ),
	'description' => __( 'This is the bottom section of the homepage.', 'tourtiger' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-entry',
	'name'        => __( 'After Entry', 'tourtiger' ),
	'description' => __( 'This is the after entry section.', 'tourtiger' ),
) );*/

/** Unregister default sidebars */
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Above Sidebar',
'id' => 'above-sidebar',
'before_widget' => '<div class="widget-item">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Below Sidebar',
'id' => 'below-sidebar',
'before_widget' => '<div class="widget-item">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));


}

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'jptweak_remove_share' );

/*hooks*/

//adding snippets
add_action('wp_head', 'head_snippets');
function head_snippets(){
    require(CHILD_DIR.'/head-snippets.php');
}

//adding snippets and bg element
add_action('genesis_before', 'base_background');
function base_background(){
    require(CHILD_DIR.'/body-snippets.php');
    //echo '<div class="base-background"></div>';
}

//adding snippets
add_action('genesis_after', 'footer_snippets');
function footer_snippets(){
    require(CHILD_DIR.'/footer-snippets.php');
}

add_action('genesis_before_header', 'above_header');
function above_header(){
    require(CHILD_DIR.'/above-header.php');
}

//remove_action('genesis_site_title','tourtiger_header');
remove_action('genesis_header', 'genesis_do_header');
add_action('genesis_header', 'tourtiger_header');
function tourtiger_header(){
    	require(CHILD_DIR.'/tourtiger-header_gpm.php');
}

remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_header', 'genesis_do_nav' );

remove_action('genesis_footer', 'genesis_do_footer');
add_action('genesis_footer', 'tourtiger_footer');
function tourtiger_footer(){
    require(CHILD_DIR.'/tourtiger-footer_gpm.php');
}

/*layout settings*/
//* Force content-sidebar layout setting
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );

//* Force sidebar-content layout setting
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

//* Force content-sidebar-sidebar layout setting
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar_sidebar' );

//* Force sidebar-sidebar-content layout setting
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_sidebar_content' );

//* Force sidebar-content-sidebar layout setting
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content_sidebar' );

//* Force full-width-content layout setting
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


//* Remove content/sidebar layout
//genesis_unregister_layout( 'content-sidebar' );
 
//* Remove sidebar/content layout
genesis_unregister_layout( 'sidebar-content' );
 
//* Remove content/sidebar/sidebar layout
genesis_unregister_layout( 'content-sidebar-sidebar' );
 
//* Remove sidebar/sidebar/content layout
genesis_unregister_layout( 'sidebar-sidebar-content' );
 
//* Remove sidebar/content/sidebar layout
genesis_unregister_layout( 'sidebar-content-sidebar' );
 
//* Remove full-width content layout
//genesis_unregister_layout( 'full-width-content' );

// Add Read More Link to Excerpts
add_filter('excerpt_more', 'get_read_more_link');
add_filter( 'the_content_more_link', 'get_read_more_link' );
function get_read_more_link() {
   return '<div class="clear"><a href="' . get_permalink() . '" class="blog-continue-reading">Continue Reading</a></div>';
}

/*acf functions*/

/*function my_acf_options_page_settings( $settings )
{
	$settings['title'] = 'Global';
	$settings['pages'] = array('Sidebar', 'Footer', 'Company details', 'Code snippets');
 
	return $settings;
}
 
add_filter('acf/options_page/settings', 'my_acf_options_page_settings');*/
if(function_exists('acf_add_options_page')) { 

	acf_add_options_page();
	acf_add_options_sub_page('Blog Hero');
	acf_add_options_sub_page('Sidebar');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Company details');
	acf_add_options_sub_page('Code snippets');

}

function acf_load_third_party_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();
    
    
    // get the textarea value from options page without any formatting
    
    $integrate_xola = get_field('integrate_xola_with_this_website','option');
    $integrate_peek = get_field('integrate_peek_with_this_website','option');
    $integrate_fareharbor = get_field('fareharbor','option');
    $integrate_getinsellout = get_field('getinsellout','option');
    $integrate_trekksoft = get_field('trekksoft','option');
    $integrate_rezdy = get_field('rezdy','option');
    $integrate_regiondo = get_field('regiondo','option');
    $integrate_orioly = get_field('orioly','option');
    $integrate_zozi = get_field('zozi','option');
    
    if($integrate_xola):
    $choices = get_field('xola_values', 'option', false);
    elseif($integrate_peek):
    $choices = get_field('peek_values', 'option', false);
    elseif($integrate_fareharbor):
    $choices = get_field('fareharbor_values', 'option', false);
    elseif($integrate_getinsellout):
    $choices = get_field('getinsellout_values', 'option', false);
    elseif($integrate_trekksoft):
    $choices = get_field('trekksoft_values', 'option', false);
    elseif($integrate_rezdy):
    $choices = get_field('rezdy_values', 'option', false);
    elseif($integrate_regiondo):
    $choices = get_field('regiondo_values', 'option', false);
    elseif($integrate_orioly):
    $choices = get_field('orioly_values', 'option', false);
    elseif($integrate_zozi):
    $choices = get_field('zozi_values', 'option', false);
    endif;
    // explode the value so that each line is a new array piece
    $choices = explode("\n", $choices);

    
    // remove any unwanted white space
    $choices = array_map('trim', $choices);

    
    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            
            $field['choices'][ $choice ] = $choice;
            
        }
        
    }
    

    // return the field
    return $field;
    
}

add_filter('acf/load_field/name=third_party', 'acf_load_third_party_field_choices');

/*acf export*/
include_once(dirname(__FILE__).'/includes/acf_fields.php');

//include_once(dirname(__FILE__).'/includes/shortcode-generator.php');
include_once(dirname(__FILE__).'/includes/menus_gpm.php');
include_once(dirname(__FILE__).'/includes/mobile-menus_gpm.php');
require_once(dirname(__FILE__).'/includes/aq_resizer.php');

function tourtiger_background_inline_css() {

		echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css">' . "\n";
        require(CHILD_DIR.'/background_gpm.php');
        echo '</style>' . "\n";
		echo '<!-- End Custom CSS -->' . "\n";
		echo "\n"; }

add_action('wp_head', 'tourtiger_background_inline_css', 49);

//if(!function_exists('kirki_autoload_classes')){
function tourtiger_inline_css() {

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

//add_action('wp_head', 'tourtiger_inline_css', 50); 

add_action('admin_menu', 'themeoptions_admin_menu'); //action to display the menu
function themeoptions_admin_menu() 
{
	add_theme_page('spectrum styles', 'Spectrum styles', 'read', 'color_picker_option', 'color_picker_option_page');
}


add_action('init', 'load_theme_scripts');
function load_theme_scripts() {

	wp_register_script('spectrum_js', get_stylesheet_directory_uri() . '/js/spectrum.js', array('jquery'), '1.3.4', true);
	wp_register_style('spectrum_style', get_stylesheet_directory_uri() .'/css/spectrum.css', array(),'20120285', 'all');
	wp_enqueue_style( 'spectrum_style' );
	wp_enqueue_script( 'spectrum_js' );
}

function color_picker_option_page() 
{
	/*This should normally go into a seperate function to provide default values for when the theme is just activated*/
	
	$wbgc = get_option('wbgc');
	if (empty($wbgc) || $wbgc == '') {
		add_option('wbgc', 'rgba(255,255,255,1)');
	}
	
	$ahabgc = get_option('ahabgc');
	if (empty($ahabgc) || $ahabgc == '') {
		add_option('ahabgc', 'rgba(255,255,255,1)');
	}
		
	$hbgc = get_option('hbgc');
	if (empty($hbgc) || $hbgc == '') {
		add_option('hbgc', 'rgba(24,68,104,1)');
	}
	
	$smbg = get_option('smbg');
	if (empty($smbg) || $smbg == '') {
		add_option('smbg', 'rgba(187,173,154,1)');
	}
	
	$pmsbgc = get_option('pmsbgc');
	if (empty($pmsbgc) || $pmsbgc == '') {
		add_option('pmsbgc', 'rgba(24,68,104,1)');
	}
	
	$mnhctabgc = get_option('mnhctabgc');
	if (empty($mnhctabgc) || $mnhctabgc == '') {
		add_option('mnhctabgc', 'rgba(24,68,104,1)');
	}
	
	$bwsmbgc = get_option('bwsmbgc');
	if (empty($bwsmbgc) || $bwsmbgc == '') {
		add_option('bwsmbgc', 'rgba(24,68,104,1)');
	}
	
	
	
	$smsbgc = get_option('smsbgc');
	if (empty($smsbgc) || $smsbgc == '') {
		add_option('smsbgc', 'rgba(24,68,104,1)');
	}
	
	$mtbbgc = get_option('mtbbgc');
	if (empty($mtbbgc) || $mtbbgc == '') {
		add_option('mtbbgc', 'rgba(116,172,223,.8)');
	}
	
	
	$mtbhbgc = get_option('mtbhbgc');
	if (empty($mtbhbgc) || $mtbhbgc == '') {
		add_option('mtbhbgc', 'rgba(116,172,223,.3)');
	}
	
	$himgt = get_option('himgt');
	if (empty($himgt) || $himgt == '') {
		add_option('himgt', 'rgba(116,172,223,.8)');
	}
	
	$timgt = get_option('timgt');
	if (empty($timgt) || $timgt == '') {
		add_option('timgt', 'rgba(116,172,223,.8)');
	}
	
	$htbgc = get_option('htbgc');
	if (empty($htbgc) || $htbgc == '') {
		add_option('htbgc', 'rgba(12,50,79,.8)');
	}
	
	$hcbgc = get_option('hcbgc');
	if (empty($hcbgc) || $hcbgc == '') {
		add_option('hcbgc', 'rgba(116,172,223,.8)');
	}
	
	$hctabgc = get_option('hctabgc');
	if (empty($hctabgc) || $hctabgc == '') {
		add_option('hctabgc', 'rgba(194,39,47,1)');
	}
	
	$sctabgc = get_option('sctabgc');
	if (empty($sctabgc) || $sctabgc == '') {
		add_option('sctabgc', 'rgba(194,39,47,1)');
	}
	
	$podfbgc = get_option('podfbgc');
	if (empty($podfbgc) || $podfbgc == '') {
		add_option('podfbgc', 'rgba(116,172,223,1)');
	}
	
	$podtbgc = get_option('podtbgc');
	if (empty($podtbgc) || $podtbgc == '') {
		add_option('podtbgc', 'rgba(243,245,246,1)');
	}
	
	$ftabgc = get_option('ftabgc');
	if (empty($ftabgc) || $ftabgc == '') {
		add_option('ftabgc', 'rgba(194,39,47,1)');
	}
	$fbsbbgc = get_option('fbsbbgc');
	if (empty($fbsbbgc) || $fbsbbgc == '') {
		add_option('fbsbbgc', 'rgba(194,39,47,1)');
	}
	$eabgc = get_option('eabgc');
	if (empty($eabgc) || $eabgc == '') {
		add_option('eabgc', 'rgba(51,137,215,1)');
	}
	$cabgc = get_option('cabgc');
	if (empty($cabgc) || $cabgc == '') {
		add_option('cabgc', 'rgba(255,255,255,1)');
	}
	
	$facbgc = get_option('facbgc');
	if (empty($facbgc) || $facbgc == '') {
		add_option('facbgc', 'rgba(243,245,246,1)');
	}
	
	$ccbgc = get_option('ccbgc');
	if (empty($ccbgc) || $ccbgc == '') {
		add_option('ccbgc', 'rgba(255,255,255,1)');
	}
	
	$cctabgc = get_option('cctabgc');
	if (empty($cctabgc) || $cctabgc == '') {
		add_option('cctabgc', 'rgba(238,240,242,1)');
	}
	
	$scbgc = get_option('scbgc');
	if (empty($scbgc) || $scbgc == '') {
		add_option('scbgc', 'rgba(234,243,250,1)');
	}
	
	$tlbb = get_option('tlbb');
	if (empty($tlbb) || $tlbb == '') {
		add_option('tlbb', 'rgba(70,117,206,1)');
	}
	
	$fbgc = get_option('fbgc');
	if (empty($fbgc) || $fbgc == '') {
		add_option('fbgc', 'rgba(116,172,223,1)');
	}
	
	/*The admin page*/
	if ( isset($_POST['update_options'])) { color_picker_option_update(); }
	?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>Spectrum Color picker Options</h2>
	
		<form method="POST" action="">	
			<table class="widefat color_picker_options">
				<thead><tr><th colspan="2">&nbsp;</th></tr></thead>
				<tbody>
				<tr>
    				<td colspan="2"><h3>Dev Mode</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">On</th>
					<td>
    					<input name="spctrmdev" type="checkbox" id="spctrmdev" value="dvn" <?php checked( 'dvn', get_option( 'spctrmdev' ) ); ?> />
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Base</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Wrapper Background</th>
					<td>	
						<input type="text" id="wbgc" value="<?php if((get_option('wbgc')) != ''): echo get_option('wbgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_wbgc" />
						<div id="color_picker_wbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Wrapper Box-shadow</th>
					<td>
    					<input name="scbxshdw" type="checkbox" id="scbxshdw" value="wbxshdw" <?php checked( 'wbxshdw', get_option( 'scbxshdw' ) ); ?> />
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Search Form</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Above Header Area Background</th>
					<td>	
						<input type="text" id="ahabgc" value="<?php if((get_option('ahabgc')) != ''): echo get_option('ahabgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_ahabgc" />
						<div id="color_picker_ahabgc"></div>
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Header</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Header Background</th>
					<td>	
						<input type="text" id="hbgc" value="<?php if((get_option('hbgc')) != ''): echo get_option('hbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_hbgc" />
						<div id="color_picker_hbgc"></div>
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Secondary Menu</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Secondary Menu Background</th>
					<td>	
						<input type="text" id="smbg" value="<?php if((get_option('smbg')) != ''): echo get_option('smbg'); else: echo 'rgba(187,173,154,1)'; endif; ?>" name="color_picker_smbg" />
						<div id="color_picker_smbg"></div>
					</td>
				</tr>
				
				<tr>
    				<td colspan="2"><h3>Main nav</h3></td>
				</tr>
				
				<tr valign="top">
					<th width="200px" scope="row">Submenu item Background</th>
					<td>	
						<input type="text" id="pmsbgc" value="<?php if((get_option('pmsbgc')) != ''): echo get_option('pmsbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_pmsbgc" />
						<div id="color_picker_pmsbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">CTA Button Background</th>
					<td>	
						<input type="text" id="mnhctabgc" value="<?php if((get_option('mnhctabgc')) != ''): echo get_option('mnhctabgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_mnhctabgc" />
						<div id="color_picker_mnhctabgc"></div>
					</td>
				</tr>
				
				<tr>
    				<td colspan="2"><h3>Secondary nav</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Bar wrapper Background</th>
					<td>	
						<input type="text" id="bwsmbgc" value="<?php if((get_option('bwsmbgc')) != ''): echo get_option('bwsmbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_bwsmbgc" />
						<div id="color_picker_bwsmbgc"></div>
					</td>
				</tr>
				
				<tr valign="top">
					<th width="200px" scope="row">Submenu item Background</th>
					<td>	
						<input type="text" id="smsbgc" value="<?php if((get_option('smsbgc')) != ''): echo get_option('smsbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_smsbgc" />
						<div id="color_picker_smsbgc"></div>
					</td>
				</tr>
				
				<tr>
    				<td colspan="2"><h3>Mobile nav</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Toggle button Background</th>
					<td>	
						<input type="text" id="mtbbgc" value="<?php if((get_option('mtbbgc')) != ''): echo get_option('mtbbgc'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_mtbbgc" />
						<div id="color_picker_mtbbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Toggle button hover Background</th>
					<td>	
						<input type="text" id="mtbhbgc" value="<?php if((get_option('mtbhbgc')) != ''): echo get_option('mtbhbgc'); else: echo 'rgba(116,172,223,.3)'; endif; ?>" name="color_picker_mtbhbgc" />
						<div id="color_picker_mtbhbgc"></div>
					</td>
				</tr>
				
				<tr>
    				<td colspan="2"><h3>CTA</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Hero CTA Button Background</th>
					<td>	
						<input type="text" id="hctabgc" value="<?php if((get_option('hctabgc')) != ''): echo get_option('hctabgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_hctabgc" />
						<div id="color_picker_hctabgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Hero CTA Button background fill</th>
					<td>
    					<input name="hctabgcfill" type="checkbox" id="hctabgcfill" value="foobar" <?php checked( 'foobar', get_option( 'hctabgcfill' ) ); ?> />
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Content CTA Button Background</th>
					<td>	
						<input type="text" id="sctabgc" value="<?php if((get_option('sctabgc')) != ''): echo get_option('sctabgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_sctabgc" />
						<div id="color_picker_sctabgc"></div>
					</td>
				</tr>
				
				<tr>
    				<td colspan="2"><h3>Hero Area</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Hero Image Tint</th>
					<td>	
						<input type="text" id="himgt" value="<?php if((get_option('himgt')) != ''): echo get_option('himgt'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_himgt" />
						<div id="color_picker_himgt"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Hero Title Background</th>
					<td>	
						<input type="text" id="htbgc" value="<?php if((get_option('htbgc')) != ''): echo get_option('htbgc'); else: echo 'rgba(12,50,79,.8)'; endif; ?>" name="color_picker_htbgc" />
						<div id="color_picker_htbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Hero Content Background</th>
					<td>	
						<input type="text" id="hcbgc" value="<?php if((get_option('hcbgc')) != ''): echo get_option('hcbgc'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_hcbgc" />
						<div id="color_picker_hcbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Point of Difference Background on Front page</th>
					<td>	
						<input type="text" id="podfbgc" value="<?php if((get_option('podfbgc')) != ''): echo get_option('podfbgc'); else: echo 'rgba(116,172,223,1)'; endif; ?>" name="color_picker_podfbgc" />
						<div id="color_picker_podfbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Secondary Menu Background on Tour pages</th>
					<td>	
						<input type="text" id="podtbgc" value="<?php if((get_option('podtbgc')) != ''): echo get_option('podtbgc'); else: echo 'rgba(243,245,246,1)'; endif; ?>" name="color_picker_podtbgc" />
						<div id="color_picker_podtbgc"></div>
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Button Style (Tiles + Forms)</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Button background</th>
					<td>	
						<input type="text" id="ftabgc" value="<?php if((get_option('ftabgc')) != ''): echo get_option('ftabgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_ftabgc" />
						<div id="color_picker_ftabgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Button background fill</th>
					<td>
    					<input name="ftabgcfill" type="checkbox" id="ftabgcfill" value="foobar" <?php checked( 'foobar', get_option( 'ftabgcfill' ) ); ?> />
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Button Style (Fluid Boxes)</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Button background</th>
					<td>	
						<input type="text" id="fbsbbgc" value="<?php if((get_option('fbsbbgc')) != ''): echo get_option('fbsbbgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_fbsbbgc" />
						<div id="color_picker_fbsbbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Button background fill</th>
					<td>
    					<input name="fbsbbgcfill" type="checkbox" id="fbsbbgcfill" value="fbsfoobar" <?php checked( 'fbsfoobar', get_option( 'fbsbbgcfill' ) ); ?> />
					</td>
				</tr>
				<tr>
    				    <td colspan="2"><h3>Elements Accent</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Background color</th>
					<td>	
						<input type="text" id="eabgc" value="<?php if((get_option('eabgc')) != ''): echo get_option('eabgc'); else: echo 'rgba(51,137,215,1)'; endif; ?>" name="color_picker_eabgc" />
						<div id="color_picker_eabgc"></div>
					</td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Content</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Content Area Background</th>
					<td>	
						<input type="text" id="cabgc" value="<?php if((get_option('cabgc')) != ''): echo get_option('cabgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_cabgc" />
						<div id="color_picker_cabgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Content Containers Background</th>
					<td>	
						<input type="text" id="ccbgc" value="<?php if((get_option('ccbgc')) != ''): echo get_option('ccbgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_ccbgc" />
						<div id="color_picker_ccbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Featured Area Container Background</th>
					<td>	
						<input type="text" id="facbgc" value="<?php if((get_option('facbgc')) != ''): echo get_option('facbgc'); else: echo 'rgba(243,245,246,1)'; endif; ?>" name="color_picker_facbgc" />
						<div id="color_picker_facbgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Featured Area Container Box-shadow</th>
					<td>
    					<input name="facbgcbs" type="checkbox" id="facbgcbs" value="bxshdw" <?php checked( 'bxshdw', get_option( 'facbgcbs' ) ); ?> />
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Tile Image Tint</th>
					<td>	
						<input type="text" id="timgt" value="<?php if((get_option('timgt')) != ''): echo get_option('timgt'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_timgt" />
						<div id="color_picker_timgt"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">CTA Container Background</th>
					<td>	
						<input type="text" id="cctabgc" value="<?php if((get_option('cctabgc')) != ''): echo get_option('cctabgc'); else: echo 'rgba(238,240,242,1)'; endif; ?>" name="color_picker_cctabgc" />
						<div id="color_picker_cctabgc"></div>
					</td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Subscribe Container Background</th>
					<td>	
						<input type="text" id="scbgc" value="<?php if((get_option('scbgc')) != ''): echo get_option('scbgc'); else: echo 'rgba(234,243,250,1)'; endif; ?>" name="color_picker_scbgc" />
						<div id="color_picker_scbgc"></div>
					</td>
				</tr>
				<tr valign="top">
				    <th width="200px" scope="row">Trip List Item Background</th>
				    <td>
				        <input type="text" id="tlib" value="<?php if((get_option('tlib')) != ''): echo get_option('tlib'); else: echo 'rgba(245,245,245,1)'; endif; ?>" name="color_picker_tlib" />
				        <div id="color_picker_tlib"></div>
				    </td>
				</tr>
				<tr valign="top">
				    <th width="200px" scope="row">Fluid Box Background-Color Variation-1</th>
				    <td>
				        <input type="text" id="fbbcv1" value="<?php if((get_option('fbbcv1')) != ''): echo get_option('fbbcv1'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_fbbcv1" />
				        <div id="color_picker_fbbcv1"></div>
				    </td>
				</tr>
				<tr valign="top">
				    <th width="200px" scope="row">Fluid Box Background-Color Variation-2</th>
				    <td>
				        <input type="text" id="fbbcv2" value="<?php if((get_option('fbbcv2')) != ''): echo get_option('fbbcv2'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_fbbcv2" />
				        <div id="color_picker_fbbcv2"></div>
				    </td>
				</tr>
				<tr valign="top">
				    <th width="200px" scope="row">Trip Link Button Background</th>
				    <td>
				        <input type="text" id="tlbb" value="<?php if((get_option('tlbb')) != ''): echo get_option('tlbb'); else: echo 'rgba(70,117,206,1)'; endif; ?>" name="color_picker_tlbb" />
				        <div id="color_picker_tlbb"></div>
				    </td>
				</tr>
				<tr>
    				<td colspan="2"><h3>Footer</h3></td>
				</tr>
				<tr valign="top">
					<th width="200px" scope="row">Footer Background</th>
					<td>	
						<input type="text" id="fbgc" value="<?php if((get_option('fbgc')) != ''): echo get_option('fbgc'); else: echo 'rgba(116,172,223,1)'; endif; ?>" name="color_picker_fbgc" />
						<div id="color_picker_fbgc"></div>
					</td>
				</tr>
				
				</tbody>
	
				<tfoot><tr><th>&nbsp;</th><th>&nbsp;</th></tr></tfoot>
			</table>
			<p><input type="submit" name="update_options" value="Update Options" class="button-primary" /></p>
		</form>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
		
			$("#ahabgc, #wbgc, #hbgc, #smbg, #pmsbgc, #mnhctabgc, #bwsmbgc, #smsbgc, #mtbbgc, #mtbhbgc, #himgt, #timgt, #htbgc, #hcbgc, #hctabgc, #sctabgc, #podfbgc, #podtbgc, #ftabgc, #fbsbbgc, #eabgc, #cabgc, #facbgc, #ccbgc, #cctabgc, #scbgc, #tlib, #fbbcv1, #fbbcv2, #tlbb, #fbgc").spectrum({
                showInput: true,
                showPalette: true,
                palette:[["transparent"]],
                showInitial: true,
                allowEmpty: true,
                showAlpha: true,
                preferredFormat: "rgb"
            });
            
            			
		});
	</script>
<?php 
}


function color_picker_option_update()
{
	if(current_user_can('edit_themes')){
	update_option('ahabgc', esc_html($_POST['color_picker_ahabgc']));
	update_option('wbgc', esc_html($_POST['color_picker_wbgc']));
	update_option('hbgc', esc_html($_POST['color_picker_hbgc']));
	update_option('smbg', esc_html($_POST['color_picker_smbg']));
	
	update_option('pmsbgc', esc_html($_POST['color_picker_pmsbgc']));
	update_option('mnhctabgc', esc_html($_POST['color_picker_mnhctabgc']));
	update_option('bwsmbgc', esc_html($_POST['color_picker_bwsmbgc']));
	update_option('smsbgc', esc_html($_POST['color_picker_smsbgc']));
	
	update_option('mtbbgc', esc_html($_POST['color_picker_mtbbgc']));
	update_option('mtbhbgc', esc_html($_POST['color_picker_mtbhbgc']));
	
	update_option('himgt', esc_html($_POST['color_picker_himgt']));
	update_option('timgt', esc_html($_POST['color_picker_timgt']));
	update_option('htbgc', esc_html($_POST['color_picker_htbgc']));
	update_option('hcbgc', esc_html($_POST['color_picker_hcbgc']));
	
	update_option('hctabgc', esc_html($_POST['color_picker_hctabgc']));
	
	$hcta_tweak = $_POST['hctabgcfill'] ? $_POST['hctabgcfill'] : '';
	update_option('hctabgcfill', esc_html($hcta_tweak));
	
	update_option('sctabgc', esc_html($_POST['color_picker_sctabgc']));
	
	update_option('podfbgc', esc_html($_POST['color_picker_podfbgc']));
	update_option('podtbgc', esc_html($_POST['color_picker_podtbgc']));
	
	update_option('ftabgc', esc_html($_POST['color_picker_ftabgc']));
	update_option('fbsbbgc', esc_html($_POST['color_picker_fbsbbgc']));
	update_option('eabgc', esc_html($_POST['color_picker_eabgc']));
	
	$shdw = $_POST['facbgcbs'] ? $_POST['facbgcbs'] : '';
	update_option('facbgcbs', esc_html($shdw));
	
	$scshdw = $_POST['scbxshdw'] ? $_POST['scbxshdw'] : '';
	update_option('scbxshdw', esc_html($scshdw));
	
	$devmode = $_POST['spctrmdev'] ? $_POST['spctrmdev'] : '';
	update_option('spctrmdev', esc_html($devmode));
	
	$tweak = $_POST['ftabgcfill'] ? $_POST['ftabgcfill'] : '';
	update_option('ftabgcfill', esc_html($tweak));
	
	$fbstweak = $_POST['fbsbbgcfill'] ? $_POST['fbsbbgcfill'] : '';
	update_option('fbsbbgcfill', esc_html($fbstweak));
	
	update_option('cabgc', esc_html($_POST['color_picker_cabgc']));
	update_option('facbgc', esc_html($_POST['color_picker_facbgc']));
	update_option('ccbgc', esc_html($_POST['color_picker_ccbgc']));
	update_option('cctabgc', esc_html($_POST['color_picker_cctabgc']));
	
	update_option('scbgc', esc_html($_POST['color_picker_scbgc']));
	update_option('tlib', esc_html($_POST['color_picker_tlib']));
	update_option('fbbcv1', esc_html($_POST['color_picker_fbbcv1']));
	update_option('fbbcv2', esc_html($_POST['color_picker_fbbcv2']));
	update_option('tlbb', esc_html($_POST['color_picker_tlbb']));
	update_option('fbgc', esc_html($_POST['color_picker_fbgc']));
	}
}

add_action( 'customize_register', 'tourtiger_customize_register' );

//}/*end of if function_exists kirki*/

function tourtiger_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
    
    
}

function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
            if(!$l['active']) echo '</a>';
        }
    }
}

//include_once(dirname(__FILE__).'/includes/kirki_fields.php');

add_filter('acf/compatibility/field_wrapper_class', '__return_true');
// Include the class (unless you are using the script as a plugin)
//require_once( 'wp-sass-master/wp-sass.php' );

// enqueue a .less style sheet
//if ( ! is_admin() )
    //wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/theme.scss' );
//else
	//wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/theme.scss.php' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' ) {
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
function wrap_gform_cdata_close( $content = '' ) {
	$content = ' }, false );';
	return $content;
}

class Wpse8170_Menu_Walker extends Walker_Nav_Menu {

    var $number = 1;

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $integrate_xola = get_field('integrate_xola_with_this_website','option');
        $integrate_peek = get_field('integrate_peek_with_this_website','option');
        $integrate_fareharbor = get_field('fareharbor','option');
        $fareharbor_shortname = get_field('fareharbor_shortname','option');
        $integrate_getinsellout = get_field('getinsellout','option');
        $getinsellout_data_pn = get_field('getinsellout_data_pn','option');
        $getinsellout_data_url = get_field('getinsellout_data_url','option');
        $getinsellout_data_evt = get_field('getinsellout_data_evt','option');
        $integrate_trekksoft = get_field('trekksoft','option');
        $integrate_rezdy = get_field('rezdy','option');
        $integrate_regiondo = get_field('regiondo','option');
        
        // get thumbnail
        $thumbnail = '';
        if ( has_post_thumbnail( $item->object_id ) && $classes[0] == 'megamenu-item') {
            $thumb = get_post_thumbnail_id( $item->object_id );
            $img_url = wp_get_attachment_url( $thumb,'full' );
            $thumbnail = aq_resize( $img_url, 355, 207, true );
        }
        
        // add custom data attributes for giso
        if ( $integrate_getinsellout == true && $depth == 0 && ($classes[0] == 'giso-book-btn')) { // remove if statement if depth check is not required
            // These lines adds your custom class and attribute
            $attributes .= ' class="giso_cb giso_btn"';
            $attributes .= ' data-pn="'.$getinsellout_data_pn.'"';
            $attributes .= ' data-url="'.$getinsellout_data_url.'"';
            $attributes .= ' data-evt="'.$getinsellout_data_evt.'"';
        }
        
        // add custom data attributes for peek
        /*if ( $integrate_peek == true && $depth == 0 && ($classes[0] == 'peek-book-btn')) {
            $t_gid = $atts['href'];
            $gid = preg_replace('#^https?://#', '', $t_gid);
            $attributes .= ' href="'.$gid.'"';
            $attributes .= ' class="peek-book-button-flat"';
            $attributes .= ' data-purchase-type="activity"';
            $attributes .= ' data-button-text="'.$item->title.'"';
            $attributes .= ' data-activity-gid="'.$gid.'"';
        }*/
        
        if ( $integrate_rezdy == true && $depth == 0 && ($classes[0] == 'rezdy-book-btn')) {
            $attributes .= ' class="button-booking rezdy rezdy-modal"';
        }
        
        if ( $integrate_peek == true && $depth == 0 && ($classes[0] == 'peek-book-btn')) {
            $t_gid = $atts['href'];
            $gid = preg_replace('#^https?://#', '', $t_gid);
            if($classes[1] == 'gift'):
            $h_attribute = ' href="http://www.peek.com/purchase/gift_card/'.$gid.'"';
            $attributes .= ' class="peek-book-button-flat"';
            $attributes .= ' data-purchase-type="gift-card"';
            $attributes .= ' data-button-text="'.$item->title.'"';
            $attributes .= ' data-partner-gid="'.$gid.'"';
            else:
            $h_attribute = ' href="https://www.peek.com/s/'.$gid.'"';
            $attributes .= ' class="peek-book-button-flat"';
            $attributes .= ' data-purchase-type="activity"';
            $attributes .= ' data-button-text="'.$item->title.'"';
            $attributes .= ' data-activity-gid="'.$gid.'"';
            endif;
            
            $item_output = $args->before;
                $item_output .= '<a'. $h_attribute .''.$attributes.'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
        }
        elseif ( $integrate_xola == true && $depth == 0 && ($classes[0] == 'xola-book-btn')) {
            $t_xid = $atts['href'];
            $xid = preg_replace('#^https?://#', '', $t_xid);
            if($classes[1] == 'checkout' || $classes[1] == 'checkout-all' || $classes[1] == 'timeline'):
            $def_class = 'xola-checkout'; 
            elseif($classes[1] == 'gift'):
            $def_class = 'xola-gift';
            endif;
            
            $class_attribute .= ' class="'.$def_class.' xola-custom"';
            if($classes[1] == 'checkout-all'):
                $id_attribute .= ' data-seller="'.$xid.'"';
            elseif($classes[1] == 'timeline'):
            	$id_attribute .= ' data-button-id="'.$xid.'"';
            else:
                $id_attribute .= ' data-button-id="'.$xid.'"';
            endif;
            
            $item_output = $args->before;
            $item_output .= '<div'. $class_attribute .' '.$id_attribute.'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</div>';
            $item_output .= $args->after;
        } elseif($integrate_fareharbor == true && $depth == 0 && ($classes[0] == 'fareharbor-book-btn')){
                $t_fid = $atts['href'];
                $fid = preg_replace('#^https?://#', '', $t_fid);
                
                if($classes[1] == 'grid'):
                $h_attribute = ' href="https://fareharbor.com/'.$fareharbor_shortname.'/items/"';
                $c_attribute = ' onclick="FH.open({ shortname:\''.$fareharbor_shortname.'\', fullItems: \'yes\' }); return false;"';
                elseif($classes[1] == 'all'):
                $h_attribute = ' href="https://fareharbor.com/'.$fareharbor_shortname.'/items/calendar/"';
                $c_attribute = ' onclick="FH.open({ shortname:\''.$fareharbor_shortname.'\', view: \'all-availability\', fullItems: \'yes\' }); return false;"';
                elseif($classes[1] == 'tour'):
                $h_attribute = ' href="https://fareharbor.com/'.$fareharbor_shortname.'/items/'.$fid.'/"';
                $c_attribute = ' onclick="FH.open({ shortname:\''.$fareharbor_shortname.'\', view: { item:'.$fid.'}, fullItems: \'yes\' }); return false;"';
                endif;
                
                $item_output = $args->before;
                $item_output .= '<a'. $h_attribute .''.$c_attribute.'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
        } elseif ( $integrate_trekksoft == true && $depth == 0 && ($classes[0] == 'trekksoft-book-btn')) {
            $trekk_id_temp = $atts['href'];
            $trekk_id = preg_replace('#^https?://#', '', $trekk_id_temp);
            $arr = explode(",",$trekk_id);
            $format1 = $arr[0];
            $format2 = $arr[1];
            if($classes[1] == 'tour_details'):
            $entryPoint = 'tour_details';
            elseif($classes[1] == 'tour_finder'):
            $entryPoint = 'tour_finder';
            endif;        
            
            $item_output = $args->before;
            $item_output .= '<a href="#" id="menubtn_trekksoft_'. $format1 .'">';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            if($entryPoint == 'tour_details'):
            $item_output .= '<script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") .setAttrib("entryPoint", "'.$entryPoint.'") .setAttrib("tourId", "'.$format2.'") .registerOnClick("#menubtn_trekksoft_' . $format1 .'"); })();
// ]]></script>';
            else:
            $item_output .= '<script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") .setAttrib("entryPoint", "'.$entryPoint.'") .registerOnClick("#menubtn_trekksoft_' . $format1 .'"); })();
// ]]></script>';
            endif;
            $item_output .= $args->after;
        } elseif($integrate_regiondo == true && $depth == 0 && ($classes[0] == 'regiondo-book-btn')) {
            $t_rid = $atts['href'];
            $url_attribute = ' data-url="'.$t_rid.'"';
            $item_output = $args->before;
            $item_output .= '<a class="regiondo-button"'.$url_attribute.'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        } elseif($classes[0] == 'megamenu') {
            $item_output = $args->before;
            $item_output .= '<div class="megalink-wrap"><a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a></div><div class="sm-container"><div class="sm-inner">';
            $item_output .= $args->after;
        } elseif(has_post_thumbnail( $item->object_id ) && $classes[0] == 'megamenu-item'){
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'><div><img src="'.$thumbnail.'" class="img-responsive" /></div><span>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</span></a>';
            $item_output .= $args->after;        
        } else {
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        }
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $output .= apply_filters( 'walker_nav_menu_end_el', $item_output, $item, $depth, $args );
        if($classes[0] == 'megamenu'){
            $output .= "</div></div></li>\n";
        } else {
            $output .= "</li>\n";
        }
    }
}

function my_acf_format_value( $value, $post_id, $field ) {
	
	// run do_shortcode on all textarea values
	$value = do_shortcode($value);
	
	
	// return
	return $value;
}

add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);

/*shortcodes*/

function a_func($atts, $content = null) {
shortcode_atts(array('href'=>'','text'=>''),$atts);
return '<a href="'.$atts['href'].'">'.$atts['text'].'</a>';
}
add_shortcode('a', 'a_func');

function b_func($atts, $content = null) {
shortcode_atts(array('text'=>''),$atts);
return '<strong>'.$atts['text'].'</strong>';
}
add_shortcode('b', 'b_func');

//Google Maps Shortcode
function do_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '600',
      "height" => '450',
      "src" => ''
   ), $atts));
   return '<div class="video-responsive"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" src="'.$src.'" style="border:0" allowfullscreen></iframe></div>';
}
add_shortcode("googlemap", "do_googleMaps");

// Удаление параметра ver из добавляемых скриптов и стилей
function rem_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'rem_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js', 9999 );


/**
 * Image insert
 * @param  integer $id     
 * @param  integer $width  
 * @param  integer $height 
 * @param  boolean $link   optional
 * @param  [type]  $attr   
 * @param  boolean $circle 
 * @return null         
 */
function tourtiger_image( $id=0, $width=0, $height=0, $link=false, $attr=null, $circle=false ) {

	if ( $circle !== false ) {
		if ( $width > $height ) { 
			$width = $height;
		} else { 
			$height = $width;
		}

		echo '<div class="pc_circle-image--wrapper js-new-circle">';
	}

	echo $link ? "<a href='{$link}'>":'';
	echo wp_get_attachment_image( $id, array( $width, $height ), true, $attr );
	echo $link ? '</a>':'';

	if ( $circle !== false ) echo '</div>'; 

}

/**
 * Add custom image size for product image
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'product-slider', 757, 484, false ); 
}

/**
 * Include google maps api key in end if all scripts in admin panel
 */

// add_action( 'admin_enqueue_scripts', 'google_maps_api_in_admin_panel', 999 );
// function google_maps_api_in_admin_panel() {

// 	if ( get_field('google_maps','apikey') ) :
// 		wp_register_script( "api-key-maps-admin", "https://maps.googleapis.com/maps/api/js?key=" . get_field('google_maps','apikey'), array(), null, true);
// 		wp_enqueue_script("api-key-maps-admin");
// 	endif;
// }

/* update dgamoni */
include_once 'inc/load.php';

if ( class_exists( 'WooCommerce' ) ):
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'tourtiger_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'tourtiger_theme_wrapper_end', 10);

function tourtiger_theme_wrapper_start() {
  echo '<section class="tour-page-content"><div class="container"><div class="row"><div class="col-sm-12">';
}

function tourtiger_theme_wrapper_end() {
  echo '</div></div></div></section>';
}
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
endif;

add_filter('body_class','add_motto_class_mobile');
function add_motto_class_mobile( $classes ) {
	
	if( get_field( 'motto_mobile', 'options' ) )
		$classes[] = 'show-motto-mobile';

	return $classes;
}

function add_noindex_metatag(){
	global $post;
	$single_testimonial = get_field( 'is_single_testimonial', 'option' );

	if ( is_singular( 'testimonial' ) && !$single_testimonial ) :
		echo '<meta name="robots" content="noindex">';
	endif;
}
add_action('wp_head', 'add_noindex_metatag');


function set_styling_class($classes) {
	global $post;

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
add_filter('body_class', 'set_styling_class');








