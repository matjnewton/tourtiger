<?php

define( 'DISALLOW_FILE_EDIT', true );
define ('THEME_PATH', get_stylesheet_directory());
define ('THEME_URL', get_stylesheet_directory_uri());


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

function bgmpShortcodeCalled()
{
    global $post;

    $shortcodePageSlugs = array(
        'contact-us',
        'about-us'
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

add_action('genesis_after_footer', function(){
    include THEME_PATH . '/includes/class-side-buttons.php';
});

//* Remove sidebar/content layout
genesis_unregister_layout( 'sidebar-content' );

//* Remove content/sidebar/sidebar layout
genesis_unregister_layout( 'content-sidebar-sidebar' );

//* Remove sidebar/sidebar/content layout
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Remove sidebar/content/sidebar layout
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Add Read More Link to Excerpts
add_filter('excerpt_more', 'get_read_more_link');
add_filter( 'the_content_more_link', 'get_read_more_link' );
function get_read_more_link() {
   return '<div class="clear"><a href="' . get_permalink() . '" class="blog-continue-reading" target="_blank">Continue Reading</a></div>';
}

if(function_exists('acf_add_options_page')) {
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
    $choices = explode("\n", $choices??'');

    // remove any unwanted white space
    $choices = array_map('trim', $choices);

    // loop through array and add to field 'choices'
    if( is_array( $choices ) ) {
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

/* multiple menus export */
include_once(dirname(__FILE__).'/includes/acf/pc-acf-menu-template.php');

include_once(dirname(__FILE__).'/includes/shortcode-generator.php');
include_once(dirname(__FILE__).'/includes/menus_gpm.php');
include_once(dirname(__FILE__).'/includes/mobile-menus_gpm.php');
require_once(dirname(__FILE__).'/includes/aq_resizer.php');


include THEME_PATH . '/inc/colorpicker.php';


add_action( 'customize_register', 'tourtiger_customize_register' );
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

add_filter('acf/compatibility/field_wrapper_class', '__return_true');

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
        $the_fly_book_account_id = get_field('the_fly_book_account_id','apikey');

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

        if ( $integrate_rezdy == true && $depth == 0 && ($classes[0] == 'rezdy-book-btn')) {
            $attributes .= ' class="button-booking rezdy rezdy-modal"';
        }

        if ( $the_fly_book_account_id && $depth == 0 ) {

            if ( $classes[0] == 'flybook-button' ) {
                $entity_id = '';

                foreach ($classes as $class) {
                    if ( preg_match('/(fb-entity-config-id-)([0-9].*)/', $class, $matches ) && $matches[2] ) {
                        $entity_id = $matches[2];
                    }
                }

                $attributes .= ' class="flybook-book-now-button
                fb-widget-type-frontend
                fb-default-category-id-0
                fb-account-id-'. $the_fly_book_account_id . '
                fb-entity-config-id-'. $entity_id .'
                fb-domain-go.theflybook.com
                fb-protocol-https
                pc_hero-area__action-btn"';

                $attributes .= ' style="padding:0;"';
            }

        }

        if ( $integrate_peek == true && $depth == 0 && ($classes[0] == 'peek-book-btn')) {
          $t_gid = $atts['href'];
          $gid = preg_replace('#^https?://#', '', $t_gid);
          $attributes = '';
          if($classes[1] == 'gift'):
            $h_attribute = ' href="http://www.peek.com/purchase/gift_card/'.$gid.'"';
            $h_attribute .= ' class="peek-book-button-flat"';
            $h_attribute .= ' itemprop="url"';
            $h_attribute .= ' data-purchase-type="gift-card"';
            $h_attribute .= ' data-button-text="'.$item->title.'"';
            $h_attribute .= ' data-partner-gid="'.$gid.'"';
          else:
            $h_attribute = ' href="https://www.peek.com/s/'.$gid.'"';
            $h_attribute .= ' class="peek-book-button-flat"';
            $h_attribute .= ' itemprop="url"';
            $h_attribute .= ' data-purchase-type="activity"';
            $h_attribute .= ' data-button-text="'.$item->title.'"';
            //$attributes .= ' data-activity-gid="'.$gid.'"';
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

            $class_attribute = '';
            $id_attribute ='';

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
        } elseif ($integrate_fareharbor == true && $depth == 0 && ($classes[0] == 'fareharbor-book-btn')){
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

        $output .= apply_filters( 'walker_nav_menu_end_el', null, $item, $depth, $args );
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

add_action('admin_enqueue_scripts', function(){
    wp_register_script( 'image-shortcode', THEME_URL . '/js/image-shortcode.js?v=' . wp_get_theme()->get( 'Version' ) , array('jquery'), null, true);
    wp_enqueue_script('image-shortcode');
});

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

function add_noindex_metatag(){
	global $post;
	$single_testimonial = get_field( 'is_single_testimonial', 'option' );

	if ( is_page_template( 'page-templates/testimonials.php' ) && $single_testimonial ) :
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



/**
 * Example post type
 *
 * Change Template to post type name and template to Slugname
 *
 * @package TourismTiger_Theme
 * @author  tourismtiger
 */

add_action('init', 'init_template_post_type');

function init_template_post_type(){

    register_taxonomy('template-type', array('template'), array(
        'label'                 => 'Template type',
        'labels'                => array(
            'name'              => 'Template types',
            'singular_name'     => 'Template type',
            'search_items'      => 'Search Template types',
            'all_items'         => 'All Types'
        ),
        'public'                => true,
        'show_in_nav_menus'     => false,
        'show_ui'               => true,
        'show_tagcloud'         => false,
        'hierarchical'          => true,
        'show_admin_column'     => false,
        'has_archive'           => true,
    ) );

    /**
     * Setup default categories
     */
    wp_insert_term( 'Sidebar widget', 'template-type', array( 'slug' => 'sidebar-widget' ) );

    register_post_type('template', array(
        'labels'                 => array(
            'name'               => 'Templates',
            'singular_name'      => 'Template',
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new Template',
            'edit_item'          => 'Edit Template',
            'new_item'           => 'New Template',
            'view_item'          => 'View Template',
            'search_items'       => 'Find Template',
            'not_found'          => 'There are not any Template',
            'not_found_in_trash' => 'There are not any Template in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Templates'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title'),
        'menu_icon'          => 'dashicons-welcome-widgets-menus'
    ) );

    wp_insert_term( 'Menu template', 'template-type', array( 'slug' => 'menu-template' ) );

    register_post_type('template', array(
        'labels'                 => array(
            'name'               => 'Templates',
            'singular_name'      => 'Template',
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new Template',
            'edit_item'          => 'Edit Template',
            'new_item'           => 'New Template',
            'view_item'          => 'View Template',
            'search_items'       => 'Find Template',
            'not_found'          => 'There are not any Template',
            'not_found_in_trash' => 'There are not any Template in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Templates'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title'),
        'menu_icon'          => 'dashicons-welcome-widgets-menus'
    ) );

}


/**
 * A pulsing directive
 */
function inject_pulsing_directive() {
  $elements  = get_field('pulsing_elements', 'option');
  $selectors = array();

  if ($elements) :
    foreach ($elements as $el) :
      if (isset($el['element'])) :
        switch ($el['element']) :
          case 'product-booking-btn':
            $selectors[] = '.single-tour .book-btn2';
            $selectors[] = '.single-product .book-btn2-product';
            break;

          case 'heroarea-booking-btn':
            $selectors[] = '.pc_hero-area__action';
            $selectors[] = '.banner .book-btn-wrapper';
            break;
        endswitch;
      endif;
    endforeach;

    $selector = implode(",", $selectors);

    if ($selector) :
      ?>

      <script>
        !(function(){
          var elems = document.querySelectorAll('<?=$selector;?>');
          elems.forEach(function(el){
            el.classList.add('js-pulsing');
          });
        })();
      </script>

      <?php
    endif;
  endif;
}
add_action( 'wp_footer', 'inject_pulsing_directive' );

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

function set_third_party_assets() {
  $the_fly_book_account_id = get_field('the_fly_book_account_id','apikey');

  if ($the_fly_book_account_id) :
    echo "<link rel='stylesheet' href='https://go.theflybook.com/content/bootstrapper/flybookbootstrap.css' />";
    echo "<script src='https://go.theflybook.com/custom/bootstrapper/flybookbootstrap.js' defer></script>";
  endif;
}

add_action('wp_head', 'set_third_party_assets', 49);


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

// Different Fixes
function different_fixes() {
    $theme = wp_get_theme();
    wp_enqueue_script('hero-position-fix', THEME_URL. '/js/hero-position-fix.js', NULL, $theme->get( 'Version' ), true);
}
 add_action('wp_enqueue_scripts', 'different_fixes');


// Checking if Address is Email Address
function checkIfEmail($email) {
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1 ? true : false);
}

// -------------------------  EXTRA INPUT FOR CAPTCHA FIELD --------------
function add_for_test_something($a, $b) {

    if ($a == 250)
    echo "<i>Add class name \"homepage-captcha-fix\" for fixing CAPTCHA form at Home Page bellow.</i>";
}
// add_action('gform_field_appearance_settings', 'add_for_test_something', 1, 2);




// Hide protected posts

function exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Where to display protected posts
function exclude_protected_action($query) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'exclude_protected' );
    }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');


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
 * Peek integration
 */
function add_peek_integration() {

    $key = get_field( 'peek_key', 'apikey' );

    if ( $key ) :
            ?>

            <script type="text/javascript">
                var _peekConfigFunction = function () {(function(config) {
                    window._peekConfig = config || {};
                    var idPrefix = 'peek-book-button';
                    var id = idPrefix+'-js'; if (document.getElementById(id)) return;
                    var head = document.getElementsByTagName('head')[0];
                    var el = document.createElement('script'); el.id = id;
                    var date = new Date; var stamp = date.getMonth()+"-"+date.getDate();
                    var basePath = "https://js.peek.com";
                    el.src = basePath + "/widget_button.js?ts="+stamp;
                    el.setAttribute('defer', 'defer');
                    head.appendChild(el); id = idPrefix+'-css'; el = document.createElement('link'); el.id = id;
                    el.href = basePath + "/widget_button.css?ts="+stamp;
                    el.rel="stylesheet"; el.type="text/css"; head.appendChild(el);

                    window._peekConfigFunction = false;
                })({key:'<?=$key?>'})};
            </script>

        <?php
    endif;

}

add_action('wp_head', 'add_peek_integration');


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

// Remove Yoast SEO plugin columns from posts table

add_filter ( 'manage_edit-post_columns', function ( $columns ) {

    // remove the Yoast SEO columns
    unset( $columns['wpseo-score'] );
    unset( $columns['wpseo-title'] );
    unset( $columns['wpseo-metadesc'] );
    unset( $columns['wpseo-focuskw'] );

    return $columns;

} );


function tt1_get_first_value_if_array( $value ){

    if ( is_array($value) && isset($value[0]) ) :
        return $value[0];
    else :
        return $value;
    endif;
}


// Rest API routes

include THEME_PATH . '/inc/class-routes.php';
