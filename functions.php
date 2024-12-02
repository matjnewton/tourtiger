<?php

define( 'DISALLOW_FILE_EDIT', true );
define ('THEME_PATH', get_stylesheet_directory());
define ('THEME_URL', get_stylesheet_directory_uri());

add_filter( 'gu_override_dot_org', function( $overrides ) {
    return array_merge( $overrides, [
        'tourtiger'
    ] );
});


 add_filter('acf/settings/path', function() {
     return THEME_PATH . '/includes/plugins/acf-6.0.4/';
 });

 add_filter('acf/settings/dir', function () {
     return get_stylesheet_directory_uri() . '/includes/plugins/acf-6.0.4/';
 });

include_once THEME_PATH . '/includes/plugins/acf-6.0.4/acf.php';

add_filter('acf/settings/show_admin', '__return_false');

if ( is_plugin_active('gravityforms/gravityforms.php') ) {
    deactivate_plugins('gravityforms/gravityforms.php');
} else {
    include_once THEME_PATH . '/includes/plugins/gravityforms/gravityforms.php';
}


if ( ! class_exists( 'acf' ) )
    return;

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

include_once( THEME_PATH . '/includes/acf_fields_primary-content.php' );

include_once( THEME_PATH . '/includes/plugins/additional-fonts-includer/additional-fonts-includer.php' );

include_once( THEME_PATH . '/includes/hawaiifun-api.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'tourtiger' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.2' );

define('TT_THEME_VERSION', wp_get_theme()->get( 'Version' ));


// Include theme assets
include THEME_PATH . '/inc/class-enqueue-assets.php';

include THEME_PATH . '/inc/actions-and-filters.php';

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

/** Unregister default sidebars */
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
    'name' => 'Above Sidebar',
    'id' => 'above-sidebar',
    'before_widget' => '<div class="widget-item book-tour-wrapper_product_row">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));

    register_sidebar(array(
    'name' => 'Below Sidebar',
    'id' => 'below-sidebar',
    'before_widget' => '<div class="widget-item book-tour-wrapper_product_row">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));
}

//* Remove sidebar/content layout
genesis_unregister_layout( 'sidebar-content' );

//* Remove content/sidebar/sidebar layout
genesis_unregister_layout( 'content-sidebar-sidebar' );

//* Remove sidebar/sidebar/content layout
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Remove sidebar/content/sidebar layout
genesis_unregister_layout( 'sidebar-content-sidebar' );


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('Blog Hero');
    acf_add_options_sub_page('Blog Posts and Blog Archive');
	acf_add_options_sub_page('Sidebar');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Company details');
	acf_add_options_sub_page('Code snippets');
    acf_add_options_sub_page('Password Protected Page');
    acf_add_options_sub_page('Spritesheets');
}


/*acf export*/
include_once(dirname(__FILE__).'/includes/acf_fields.php');

/* multiple menus export */
include_once(dirname(__FILE__).'/includes/acf/pc-acf-menu-template.php');

include_once(dirname(__FILE__).'/includes/shortcode-generator.php');
include_once(dirname(__FILE__).'/includes/menus_gpm.php');
include_once(dirname(__FILE__).'/includes/mobile-menus_gpm.php');
require_once(dirname(__FILE__).'/includes/aq_resizer.php');


include THEME_PATH . '/inc/colorpicker.php';


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


include THEME_PATH . '/inc/class-menu-walker.php';


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


/* update dgamoni */
include_once 'inc/load.php';

if ( class_exists( 'WooCommerce' ) ) :
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


// Add template post type
include THEME_PATH . '/inc/class-template-post-type.php';

/**
 * @param $endpoint
 * @return mixed
 */
function get( $endpoint ) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  return $output;
}

/**
 * Generate classlist from array
 */
function generate_classlist( $array ) {
  if ( !is_array( $array ) || empty( $array ) )
    return '';

  // That will be returned
  $list = '';
  $counter   = 0;

  foreach ( $array as $item ) :
    if ( $item !== '' ) :
      if ( $counter !== 0 )
        $list .= ' ';

      $list .= "{$item}";
    endif;

    $counter++;
  endforeach;

  return $list;
}

/**
 * @param array  $array
 * @param string $type - false, class, style
 * @return string
 */
function convert_html_attributes( $array = array(), $type = '') {
  $values = generate_classlist($array);

  if (!$values)
    return '';

  if ($type)
    return "{$type}='{$values}'";
  else
    return $values;
}

/**
 * @param array $btn
 * [type] => (str) url | popup-frame | page | anchor | permalink
 * @param array $classes
 * @param array $attrs
 * @return null|string
 */
function get_button( $btn = array(), $classes = array(), $attrs = array() ) {
  if ( ! is_array( $btn ) || ! is_array( $classes ) || ! is_array( $attrs ) )
    return null;

  // Converts classes array to string
  $classes[] = 'type_' . $btn['type'];
  $classes   = convert_html_attributes( apply_filters( 'get_button_classes', $classes, $btn ), 'class' );

  $btn['permalink'] = get_the_permalink();

  $default = "<a href='{$btn['permalink']}' {$classes}>{$btn['label']}</a>";

  switch ( $btn['type'] ) :
    case 'url':
      $html = $btn['url'] ? "<a href='{$btn['url']}' target='_blank' {$classes}>{$btn['label']}</a>" : $default;
      break;

    case 'popup-frame':
      $popup = '';
      $popup .= 'data-handle-click="initIframePopup"';
      $popup .= $btn['popup-style'] ? " data-popup-style='{$btn['popup-style']}'" : '';
      $popup .= $btn['popup-size'] ? " data-popup-size='{$btn['popup-size']}'" : '';

      $html = $btn['url'] ? "<a href='{$btn['url']}' {$popup} {$classes}>{$btn['label']}</a>" : $default;
      break;

    case 'page':
      $html = $btn['page'] ? "<a href='{$btn['page']}' {$classes}>{$btn['label']}</a>" : $default;
      break;

    case 'anchor':
      $html = $btn['anchor'] ? "<a href='{$btn['anchor']}' {$classes}>{$btn['label']}</a>" : $default;
      break;

    case 'permalink':
    default:
      $html = $default;
      break;
  endswitch;

  return $html;
}

function get_advanced_footer_column_acf() {
  the_row();

  switch (get_row_layout()) :
    case 'menu':
      echo wp_nav_menu([
        'menu'        => get_sub_field('menu_name'),
        'echo'        => false,
        'fallback_cb' => '__return_empty_string',
        'container'   => false,
        'menu_class'  => 'advanced-footer--menu',
      ]);
      break;

    case 'content':
      echo '<div class="wysiwyg">' . get_sub_field('content') . '</div>';
      break;
  endswitch;
}


/* ---------------------------------------------------------------------------
 * Set hreflang="x-default" with WPML
 * --------------------------------------------------------------------------- */
add_filter('wpml_alternate_hreflang', 'wps_head_hreflang_xdefault', 10, 2);
function wps_head_hreflang_xdefault($url, $lang_code) {

  if($lang_code == apply_filters('wpml_default_language', NULL )) {

    echo '<link rel="alternate" href="' . $url . '" hreflang="x-default" />'.PHP_EOL;
  }

  return $url;
}

/* ------------------------------------------------------------------*/
/* PAGINATION */
/* this function affects pagination appearance mostly for blog page*/
/* ------------------------------------------------------------------*/


function pagination_appear() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    echo paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages
) );
}



// Checking if Address is Email Address
function checkIfEmail($email) {
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1 ? true : false);
}



// Hide protected posts

function exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}


function get_the_password_form_custom( $post = 0 ) { // first version of a form for password protected pages
    $post   = get_post( $post );
    $label  = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<p>' . __( 'This content is password protected. To view it please enter your password below.' ) . '</p>
	<p><label for="' . $label . '">' . __( 'Your password:' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label> <input class="button js-pulsing" type="submit" name="Submit" value="' . esc_attr_x( 'Enter', 'post password form' ) . '" /></p></form>
	';

     return apply_filters( 'the_password_form', $output );
}

function print_r_html( $value, $is_prod = false ) {
    if ($is_prod)
        if (!current_user_can('edit_posts'))
            return null;

    echo '<pre class="pre-code">' . print_r( $value, 1 ) . '</pre>';
}


/**
 * Adding 410 redirects for the removed pages
 */
include THEME_PATH . '/inc/class-410-redirect.php';

function is_410() {
    global $wp_query;

    if ( ! isset( $wp_query ) ) {
        _doing_it_wrong( __FUNCTION__, __( 'Conditional query tags do not work before the query is run. Before then, they always return false.' ), '3.1.0' );
        return false;
    }

    return $wp_query->get('is_410');
}

include THEME_PATH . '/inc/blocking-links-in-gravity-forms.php';

function get_product_sidebar_button_options() {
    $the_fly_booking_api = get_field('the_fly_book_account_id','apikey');

    $array = [
        'Custom' => 'Custom',
        'iframe-popup' => 'iFrame popup',
        'Link to form' => 'Link to form',
        'Use as third party integration Link' => 'Use as third party integration Link'
    ];

    if ($the_fly_booking_api)
        $array['the_fly_booking'] = 'The Fly Booking Button';

    return $array;
}


function tt1_get_first_value_if_array( $value ){

    if ( is_array($value) && isset($value[0]) ) :
        return $value[0];
    else :
        return $value;
    endif;
}

// Disabling comments

 include THEME_PATH . '/inc/class-disabling-comments.php';


// Rest API routes - mute while not needed

// include THEME_PATH . '/inc/class-routes.php';
