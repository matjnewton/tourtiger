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

add_action('acf/init', 'google_api_acf_init', 999);

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
					'width' => '50',
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
      array (
        'key' => 'field_49bd321c84642',
        'label' => 'Instagram Token',
        'name' => 'insta_token',
        'type' => 'text',
        'instructions' => 'get_field(\'insta_token\',\'apikey\');',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '50',
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
			array (
				'key' => 'field_58bd243c84682',
				'label' => 'reCaptcha/noCaptcha',
				'name' => 're_captcha',
				'type' => 'text',
				'instructions' => 'get_field(\'re_captcha\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
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
			array (
				'key' => 'field_58bd243c84684',
				'label' => 'GravityForms Public API Key',
				'name' => 'gf_public_key',
				'type' => 'text',
				'instructions' => 'get_field(\'gf_public_key\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
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
			array (
				'key' => 'field_58bd243a84685',
				'label' => 'GravityForms Private API Key',
				'name' => 'gf_private_key',
				'type' => 'text',
				'instructions' => 'get_field(\'gf_private_key\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
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
			array (
				'key' => 'field_58bd243a93776',
				'label' => 'Booking Hound API Hash',
				'name' => 'booking_hound_hash',
				'type' => 'text',
				'instructions' => 'get_field(\'booking_hound_hash\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'e.g. 90520c81-fb74-4cba-9abd-475413eff10a',
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


	acf_add_local_field_group(array (
		'key' => 'Grloca3bd24st1proddzvone',
		'title' => 'Testimonial style',
		'fields' => array(
			array (
				'key' => 'is_dzv_teti_style',
				'label' => 'Styles',
				'name' => 'is_dzv_teti_style',
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
				'key' => 'dzv_teti_style',
				'label' => 'Product page style',
				'name' => 'dzv_teti_style',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'is_dzv_teti_style',
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
				'choices' => get_pc_styles_list( 'testimonial' ),
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
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/testimonials.php',
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

			if ( ! is_font_loaded( $font['font-family'] ) ) :
				if ( !$is_custom_font ) {
					$css[0] = $font['font-family'] ? "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $font['font-family'] . "');" : false;
				} else {
					$css[0] = "</style>{$is_custom_font}<style>";
				}
			endif;

			$css[1] .= "font-family:'" . $font['font-family'] . "';";
		}

		$css[1] .= $font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
		$css[1] .= $font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
		$css[1] .= $font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
		$css[1] .= $font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
		$css[1] .= $font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';
		$css[1] .= $font['letter_spacing'] ? "letter-spacing:" .$font['letter_spacing'] . "px;" : '';

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

		if ( ! is_font_loaded( $font['font-family'] ) ) :
			if ( !$is_custom_font ) {
				$css[0] = "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $font['font-family'] . "');";
			} else {
				$css[0] = "</style>{$is_custom_font}<style>";
			}
		endif;

	 	$css[1] .= "font-family:'" . $font['font-family'] . "';";
	}

	$css[1] .= $font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
	$css[1] .= $font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
	$css[1] .= $font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
	$css[1] .= $font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
	$css[1] .= $font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';
	$css[1] .= $font['letter_spacing'] ? "letter-spacing:" . $font['letter_spacing'] . "px;" : '';

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
function pc_image( $id=0, $width=0, $height=0, $link=false, $attr=null, $circle=false, $blank=false ) {

	if ( $circle !== false ) {
		if ( $width > $height ) { 
			$width = $height;
		} else { 
			$height = $width;
		}

		echo '<div class="pc_circle-image--wrapper js-new-circle">';
	}

	$link_attrs  = "href='{$link}'";
	$link_attrs .= $blank ? " target='_blank'" : '';

	echo $link ? "<a {$link_attrs}>":'';
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

  $theme = wp_get_theme();

	if ( is_page_template( 'page-templates/test-pc.php' ) ) :

		wp_enqueue_style('pc-constructor', get_stylesheet_directory_uri() . '/includes/primary-content/dependences/pc.min.css', false, $theme->get( 'Version' ) );
		wp_enqueue_style('pc-bootstrap-select', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css' );
		wp_enqueue_script('hmac-sha1-js', 'https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/hmac-sha1.js', false, null, true );
		wp_enqueue_script('enc-base64-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/enc-base64-min.js', false, null, true );
		wp_enqueue_script('pc-bootstrap-select', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js', false, null, true );

		wp_enqueue_script('mask', get_stylesheet_directory_uri() . '/includes/primary-content/assets/js/jquery.mask.js', false, null, true );
		wp_enqueue_script('pc-main-scripts', get_stylesheet_directory_uri() . '/includes/primary-content/assets/js/primary-content.min.js', false, $theme->get( 'Version' ), true );

		//wp_dequeue_script('bootstrapjs');
		wp_dequeue_script('colorbox');
		wp_dequeue_script('application1');
		//wp_dequeue_script('trekksoft');
		//wp_dequeue_script('rezdy_modal');
		//wp_dequeue_script('xola_checkout');
		//wp_dequeue_script('xola_crossdomain');
		//wp_dequeue_script('regiondo_btn');
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
		wp_dequeue_script('recaptcha');

		// wp_dequeue_script('product_scripts');//dgamoni
		// wp_dequeue_script('jquerystickyjs');//dgamoni
		// wp_dequeue_script('bxslider_min_js');//dgamoni
		// wp_dequeue_script('rezdy_scripts');//dgamoni
		
		//wp_dequeue_script('wqs_functions_xola');//dgamoni
		// wp_dequeue_script('wqs_functions_for_search_box_xola');//dgamoni
		// wp_dequeue_script('wqs_functions_for_check_available_xola');//dgamoni
		
		// wp_dequeue_script('wqs_functions_rezdyapi');//dgamoni
		// wp_dequeue_script('wqs_functions_for_search_box_rezdyapi');//dgamoni
		// wp_dequeue_script('wqs_functions_for_check_available_rezdyapi');//dgamoni
		
		// wp_dequeue_script('wqs_functions_rezdyapi');//dgamoni
		// wp_dequeue_script('wqs_functions_for_search_box_rezdyapi');//dgamoni
		// wp_dequeue_script('wqs_functions_for_check_available_rezdyapi');//dgamoni
		
		// wp_dequeue_script('wqs_angular');//dgamoni
		// wp_dequeue_script('wqs_angular_animate');//dgamoni
		// wp_dequeue_script('wqs_angular_filter');//dgamoni
		// wp_dequeue_script('wqs_ng_infinite_scroll');//dgamoni
		
		// wp_dequeue_script('wqs_moment');//dgamoni
		// wp_dequeue_script('wqs_daterangepicker');//dgamoni
		// wp_dequeue_script('wqs_multipledatepicker');//dgamoni
		
		// wp_dequeue_script('wqs_functions_atlas');//dgamoni
		// wp_dequeue_script('wqs_functions_for_check_available_atlas');//dgamoni

		// wp_dequeue_style('bootstrap_select');
		wp_dequeue_style('magnific_popup_css');
		// wp_dequeue_style('product_css');
		// wp_dequeue_style('bxslider_css');
		// wp_dequeue_style('product_css_adaptive');

		// wp_dequeue_style('wqs_style');//dgamoni
		// wp_dequeue_style('wqs_style_daterangepicker');//dgamoni
		// wp_dequeue_style('wqs_style_multipledatepicker');//dgamoni

        wp_register_script('wqs_moment', get_stylesheet_directory_uri() . '/inc/init_api/js/moment.min.js');
        wp_enqueue_script('wqs_moment');

        wp_register_script('wqs_daterangepicker', get_stylesheet_directory_uri() . '/inc/init_api/js/daterangepicker.js');
        wp_enqueue_script('wqs_daterangepicker');

        wp_register_style('wqs_style', get_stylesheet_directory_uri() . '/inc/init_api/css/style.css');
        wp_register_style('wqs_style_daterangepicker', get_stylesheet_directory_uri() . '/inc/init_api/css/daterangepicker.css');
        wp_enqueue_style('wqs_style');
        wp_enqueue_style('wqs_style_daterangepicker');

	endif;

}


add_action( 'wp_print_footer_scripts', 'print_pc_scripts_after_footer' );
function print_pc_scripts_after_footer() {

	if ( is_page_template( 'page-templates/test-pc.php' ) ) :
		global $post;

		include_once( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-footer-inc.php' );

	endif;

}


/**
 * Buttons functions
 */

/**
 * Get font corner
 * 
 * @param  string $field sub field value
 * @return string
 */
function get_font_corner_style( $field = '' ) {
	$css = '';

	if ( $field == 'square' ) {
		$css .= 'padding: 15px 20px; border-radius: 0;';
	} elseif ( $field == 'round' ) {
		$css .= 'padding: 15px 20px; border-radius: 50%;';
	} elseif ( $field == 'corner' ) {
		$css .= 'padding: 15px 20px; border-radius: 4px;';
	} else {
		$css .= 'padding: .7em 1.1em;';
	}

	return $css;
}

/**
 * Get mouseover styles
 * @param  string $field sub field value
 * @return array - 0 - defaul; 1 - hover 
 */
function get_font_mouseover_effect_styles( $field = '', $font_color = '', $bg_color = '' ) {
	$css = false;

	if ( $$field  ) {

		$css = array();

		if ( in_array( 'invert', $field  ) ) {
			$css[1] .= 'background-color:' . $font_color . ';';
			$css[1] .= 'color:' . $bg_color . ';';
		}

		if ( in_array( 'decor', $field  ) ) $css[0] .= 'text-decoration: underline;';
	} 

	return $css;
}


/**
 * Get font border styles
 * @param  string $field sub field value
 * @return array - 0 - defaul; 1 - hover 
 */
function get_font_border_styles( $style = '', $color = '', $width = '' ) {

	$css = false;

	if ( $style == 'yes' || $style == 'hover' ) {

		$css[1] .= 'border:' . $width . 'px solid ' . $color . ';';
		$css[0] .= 'box-sizing: border-box;';

		if ( $style == 'yes' ) {
	 		$css[0] .= 'border:' . $width . 'px solid ' . $color . ';';
		} elseif ( $style == 'hover' ) {
			$css[0] .= 'border:' . $width . 'px solid transparent;';
		}

	} else {
		$css[1] .= 'border-color: transparent;';
		$css[0] .= 'border-color: transparent;';
	}

	return $css;
}

/**
 * Random string
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} 


/**
 * Insert reCaptch html
 *
 * 1. Generate HTML if key is exist
 * 2. Enqueue recaptcha script
 * 
 * @return string
 */
function insert_recaptcha_html() {

	$html = get_field('re_captcha', 'apikey') ? '<div class="g-recaptcha" data-sitekey="'.get_field('re_captcha', 'apikey').'"></div>' : '';

	return $html;
}

?>
