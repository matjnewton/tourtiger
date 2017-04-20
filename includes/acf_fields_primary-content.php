<?php 
/* =======================
 * Primary Content Area
 * ==================== */



define( "PCA_DIR", get_stylesheet_directory() . '/includes/primary-content' );
define( "STYLING_MANAGER_DIR", PCA_DIR . '/styling/acf-styling-manager-field' );

/**
 * Include ACF Plugins
 */
include_once( get_stylesheet_directory() . '/includes/plugins/acf-accordion/acf-accordion.php' );
include_once( get_stylesheet_directory() . '/includes/plugins/acf-rgba-color/acf-rgba-color.php' );
include_once( get_stylesheet_directory() . '/includes/plugins/acf-typography/acf-typography.php' );

include_once( STYLING_MANAGER_DIR . '/acf-styling-manager.php' );
include_once( PCA_DIR . '/dependences/ajax-loading.php' );

add_filter( 'acf/accordion/dir', 'acf_accordion_dir' );
function acf_accordion_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/plugins/acf-accordion/';

    return $dir;
}
add_filter( 'acf/rgba_color/dir', 'acf_rgba_color_dir' );
function acf_rgba_color_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/plugins/acf-rgba-color/';

    return $dir;
}

add_filter( 'acf/typography/dir', 'acf_typography_dir' );
function acf_typography_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/plugins/acf-typography/';

    return $dir;
}

/**
 * Turn On Chaching
 */
if ( !is_admin() && 1 === 3 ) {
	include( PCA_DIR . '/pc-cache.php' );
}

/**
 * Add custom image sizes
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'pc-large', 1100, 1100, false ); 
	add_image_size( 'pc-middle', 900, 900, false ); 
	add_image_size( 'pc-medium', 700, 700, false ); 
	add_image_size( 'pc-small', 500, 500, false ); 
	add_image_size( 'pc-fit-iphone', 320, 320, false ); 
}

/**
 * Enqueue Google Maps API
 */
function google_api_acf_init() {
	
	acf_update_setting( 'google_api_key', get_field('google_maps','apikey') );
}

add_action('acf/init', 'google_api_acf_init');

/**
 * ACF Global Options
 */
if(function_exists('acf_add_options_sub_page')) { 

	$primary_content = acf_add_options_page(array(
		'page_title'   => 'Primary Styles',
		'menu_title'   => 'Primary Styles',
		'menu_slug'    => 'acf-options-primary-area-styles',
		'icon_url'     => 'dashicons-align-left',
	));

	acf_add_options_sub_page(array(
		'page_title' => 'API Keys',
		'menu_title' => 'API Keys',
		'post_id' => 'apikey'
	));

	acf_add_local_field_group(array (
		'key' => 'group_58bd2428c1dee',
		'title' => 'API Keys',
		'fields' => array (
			array (
				'key' => 'field_58bd243c84681',
				'label' => 'Google Maps',
				'name' => 'google_maps',
				'type' => 'text',
				'instructions' => 'get_field(\'google_maps\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-api-keys',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	/**
	 * ACF Fielad PHP
	 */
	if( function_exists('acf_add_local_field_group') ):
		include( PCA_DIR . '/styling/pc-styling-cards.php' );
		include( PCA_DIR . '/dependences/pc-constructor.php' );
		include( PCA_DIR . '/dependences/pc-hero-area.php' );
	endif;

	acf_add_local_field_group(array (
		'key' => 'grloca3bd24st1proddzvone',
		'title' => 'Product style',
		'fields' => array(
			array (
				'key' => 'is_dzv_prodpage_style',
				'label' => 'Styles',
				'name' => 'is_dzv_prodpage_style',
				'type' => 'true_false',
				'instructions' => '',
				'required' => '',
				'conditional_logic' => '',
				'message' => 'Enable',
				'wrapper' => array (
					'width' => '40',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
			array (
				'key' => 'dzv_prodpage_style',
				'label' => 'Product page style',
				'name' => 'dzv_prodpage_style',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'is_dzv_prodpage_style',
							'operator' => '==',
							'value' => 1
						)
					)
				),
				'wrapper' => array (
					'width' => '60',
					'class' => '',
					'id' => '',
				),
				'choices' => get_pc_styles_list( 'product_page' ),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'style-one',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));


}

/**
 * Get css via ACF Font
 * @param  string $font - ACF Field
 * @return array        - [0] - Link to Google font; [1] - css styles  
 */
function pc_init_font_css( $font = '' ) {
	if ( $font ) {
		$css = array( false, '' );

		if ( $font['font-family'] ) {
			$is_custom_font = get_aifonts_from_dir( $font['font-family'], true );

			if ( !$is_custom_font ) {
				$css[0] = $font['font-family'] ? "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $font['font-family'] . "');" : false;
			} else {
				$css[0] = "</style>{$is_custom_font}<style>";
			}

			$css[1] .= "font-family:'" . $font['font-family'] . "';";
		}

		$css[1] .= $font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
		$css[1] .= $font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
		$css[1] .= $font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
		$css[1] .= $font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
		$css[1] .= $font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';

		return $css;

	} else {
		return false;
	}
}

/**
 * This function builds css styles for forms
 * @param  string $font       Font ACF Fiels 
 * @param  string $color      Color value
 * @param  string $background Color value
 * @param  string $border     Color value
 * @return string             return string with styles
 */
function pc_content_init_form( $font='', $color='', $background='', $border='' ) {

	if ( $font['font-family'] ) {
		$is_custom_font = get_aifonts_from_dir( $font['font-family'], true );

		if ( !$is_custom_font ) {
			$css[0] = "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $font['font-family'] . "');";
		} else {
			$css[0] = "</style>{$is_custom_font}<style>";
		}

	 	$css[1] .= "font-family:'" . $font['font-family'] . "';";
	}

	$css[1] .= $font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
	$css[1] .= $font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
	$css[1] .= $font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
	$css[1] .= $font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
	$css[1] .= $font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';

	$css[1] .= $color ? 'color:' . $color . ';' : '';
	$css[1] .= $background ? 'background-color:' . $background . ';' : '';
	$css[1] .= $border ? 'border-color:' . $border . ';' : '';

	return $css;
}



function create_style_prefix( $i = '' ) {
	switch ( $i ) {
		case 1:
			$prefix = 'one';
			break;
		case 2:
			$prefix = 'two';
			break;
		case 3:
			$prefix = 'three';
			break;
		case 4:
			$prefix = 'four';
			break;
		case 5:
			$prefix = 'five';
			break;
		case 6:
			$prefix = 'six';
			break;
		case 7:
			$prefix = 'seven';
			break;
		case 8:
			$prefix = 'eight';
			break;
		case 9:
			$prefix = 'nine';
			break;
		case 10:
			$prefix = 'ten';
			break;
		default:
			$prefix = 'zero';
			break;
	}

	return $prefix;
}

/**
 * Transform name for using in strings
 * @return string
 */
function transform_name( $name = '', $type = '' ) {
	$word = array( ' ' => $type, '&' => '' );
	$new = strtr( $name, $word );
    $new = strtolower( $new );
    return $new;
}

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
function pc_image( $id=0, $width=0, $height=0, $link=false, $attr=null, $circle=false ) {

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
 * Column borders
 * @param  array  $border 
 * @return boolean
 */
function get_pc_content_card_border( $border = array() ) {

	if ( $border['is'] == 'pc--c__border-left' ) {

		$attr = "border-left: {$border['width']} {$border['style']} {$border['color']};left: 0;height: {$border['size']};";
		echo "<div class='pc--c__border pc--c__border-side_left' style='{$attr}'></div>";
		return true;

	} elseif ( $border['is'] == 'pc--c__border-right' ) {

		$attr = "border-right: {$border['width']} {$border['style']} {$border['color']};right: 0;height: {$border['size']};";
		echo "<div class='pc--c__border pc--c__border-side_right' style='{$attr}'></div>";
		return true;

	} elseif ( $border['is'] == 'pc--c__border-both' ) {

		$attr = "border-right: {$border['width']} {$border['style']} {$border['color']};height: {$border['size']};";
		echo "<div class='pc--c__border pc--c__border-side_left' style='{$attr} left: 0;'></div>";
		echo "<div class='pc--c__border pc--c__border-side_right' style='{$attr} right: 0;'></div>";
		return true;

	} else {
		return false;
	}

}

// Hook up the AJAX actions
add_action( 'wp_ajax_nopriv_gf_button_get_form', 'gf_button_get_form' );
add_action( 'wp_ajax_gf_button_get_form', 'gf_button_get_form' );

// Add the "button" action to the gravityforms shortcode
// e.g. [gravityforms action="button" id=1 text="button text"]
add_filter( 'gform_shortcode_ajax', 'gf_button_shortcode', 10, 3 );

function gf_button_shortcode( $shortcode_string, $attributes, $content ){
	$a = shortcode_atts( array(
		'id' => 0,
		'title' => '',
		'desc' => '',
	), $attributes );

	$form_id = absint( $a['id'] );
	$form_title = absint( $a['title'] );
	$form_desc = absint( $a['desc'] );

	if ( $form_id < 1 ) {
		return 'Missing the ID attribute.';
	}

	// Enqueue the scripts and styles
	gravity_form_enqueue_scripts( $form_id, true );

	$ajax_url = admin_url( 'admin-ajax.php' );

	$html = "<script>
				(function (SHFormLoader, $) {
				$.get('{$ajax_url}?action=gf_button_get_form&form_id={$form_id}',function(response){
					$('#pca_form_id-{$form_id}').html(response).fadeIn();
					$('#pca_form_id-{$form_id}').closest('.pc--r__scroll').slick('setOption', 'height', null, true);
					$('#pca_form_id-{$form_id}').closest('.slick-list').height('auto');
					if(window['gformInitDatepicker']) {gformInitDatepicker();}
				});
			}(window.SHFormLoader = window.SHFormLoader || {}, jQuery));
			</script>";
	return $html;
}

function gf_button_get_form(){
	$form_id = isset( $_GET['form_id'] ) ? absint( $_GET['form_id'] ) : 0;

	echo '<div id="gform_confirmation_wrapper_' . $form_id . '"><div id="gforms_confirmation_message_' . $form_id . '"></div></div>';
	gravity_form( $form_id, true, true, false, false, true );
	die();
}


/**
 * Deregister unnessesarily scripts and styles 
 */

add_action( 'wp_enqueue_scripts', 'primary_area_deregister_unnesesarily_scripts', 9999 );

function primary_area_deregister_unnesesarily_scripts() {

	if ( is_page_template( 'page-templates/test-pc.php' ) ) :

		wp_enqueue_style('pc-constructor', get_stylesheet_directory_uri() . '/includes/primary-content/dependences/pc.min.css' );

		//wp_dequeue_script('bootstrapjs');
		wp_dequeue_script('colorbox');
		wp_dequeue_script('application1');
		wp_dequeue_script('trekksoft');
		wp_dequeue_script('rezdy_modal');
		wp_dequeue_script('xola_crossdomain');
		wp_dequeue_script('regiondo_btn');
		wp_dequeue_script('respond');
		wp_dequeue_script('respond_matchmedia');
		wp_dequeue_script('raty');
		wp_dequeue_script('magnific_popup');
		wp_dequeue_script('flexslider_js');
		wp_dequeue_script('match_height');
		wp_dequeue_script('modernizr');
		wp_dequeue_script('bootstrap_selectjs');
		wp_dequeue_script('modernizr');
		//wp_dequeue_script('mainjs');
		wp_dequeue_script('jquery-ui');
		wp_dequeue_script('spectrum_js');
		wp_dequeue_script('sticky');
		wp_dequeue_script('bxslider');
		wp_dequeue_script('scrollit');

		wp_dequeue_script('product_scripts');
		wp_dequeue_script('jquerystickyjs');
		wp_dequeue_script('bxslider_min_js');
		wp_dequeue_script('rezdy_scripts');
		
		wp_dequeue_script('wqs_functions_xola');
		wp_dequeue_script('wqs_functions_for_search_box_xola');
		wp_dequeue_script('wqs_functions_for_check_available_xola');
		
		wp_dequeue_script('wqs_functions_rezdyapi');
		wp_dequeue_script('wqs_functions_for_search_box_rezdyapi');
		wp_dequeue_script('wqs_functions_for_check_available_rezdyapi');
		
		wp_dequeue_script('wqs_functions_rezdyapi');
		wp_dequeue_script('wqs_functions_for_search_box_rezdyapi');
		wp_dequeue_script('wqs_functions_for_check_available_rezdyapi');
		
		wp_dequeue_script('wqs_angular');
		wp_dequeue_script('wqs_angular_animate');
		wp_dequeue_script('wqs_angular_filter');
		wp_dequeue_script('wqs_ng_infinite_scroll');
		
		wp_dequeue_script('wqs_moment');
		wp_dequeue_script('wqs_daterangepicker');
		wp_dequeue_script('wqs_multipledatepicker');
		
		wp_dequeue_script('wqs_functions_atlas');
		wp_dequeue_script('wqs_functions_for_check_available_atlas');

		wp_dequeue_script('jquery');
		wp_deregister_script('jquery');
	 	wp_register_script( 'jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"), false, null, false);
	 	wp_enqueue_script( 'jquery' );


		// wp_dequeue_style('bootstrap_select');
		wp_dequeue_style('magnific_popup_css');
		wp_dequeue_style('product_css');
		wp_dequeue_style('bxslider_css');
		wp_dequeue_style('product_css_adaptive');

		wp_dequeue_style('wqs_style');
		wp_dequeue_style('wqs_style_daterangepicker');
		wp_dequeue_style('wqs_style_multipledatepicker');

	endif;

}


add_action( 'wp_print_footer_scripts', 'print_pc_scripts_after_footer' );
function print_pc_scripts_after_footer() {

	if ( is_page_template( 'page-templates/test-pc.php' ) ) :
		global $post;

		include_once( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-footer-inc.php' );

	endif;

}

?>
