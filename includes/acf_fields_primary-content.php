<?php
/* =======================
 * Primary Content Area
 * ==================== */



define( "PCA_DIR", get_stylesheet_directory() . '/includes/primary-content' );
define( "STYLING_MANAGER_DIR", PCA_DIR . '/styling/acf-styling-manager-field' );

/**
 * Include ACF Plugins
 */
// include_once( get_stylesheet_directory() . '/includes/plugins/acf-accordion/acf-accordion.php' );
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
 * @param $url
 * @return string
 */
function get_instagram_image_temp($url) {
  return "<img 
    src='{$url}' 
    class='instagram--thumb' alt='' />";
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
			array (
				'key' => 'field_58bd2s3a93sd2',
				'label' => 'The Fly Book Account ID',
				'name' => 'the_fly_book_account_id',
				'type' => 'text',
				'instructions' => 'get_field(\'the_fly_book_account_id\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'e.g. 243',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_p8be2sea9kdsd2',
				'label' => 'Peek API Key',
				'name' => 'peek_key',
				'type' => 'text',
				'instructions' => 'get_field(\'peek_key\',\'apikey\');',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
				),
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
        include( PCA_DIR . '/dependences/pc-multiple-menu.php' );
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
        'key' => 'grloca3bd24st1piu8763e',
        'title' => 'Sidebar options',
        'fields' => array(
            array (
                'key' => 'sticky-sidebar_12345678',
                'label' => '',
                'name' => 'sticky-sidebar',
                'type' => 'select',
                'required' => 0,
                'choices' => array(
                    'sticky' => 'Sticky',
                    'non-sticky' => 'Non sticky'
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'sticky',
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
        'menu_order' => 10,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1,
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
function pc_init_font_css( $font = [] ) {
    $css = ['', ''];

	if ( is_array($font) && count($font) ) {
		if ( isset($font['font-family'])&&$font['font-family'] ) {
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

		$css[1] .= isset($font['font-weight'])&&$font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
		$css[1] .= isset($font['font_size'])&&$font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
		$css[1] .= isset($font['line_height'])&&$font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
		$css[1] .= isset($font['font_style'])&&$font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
		$css[1] .= isset($font['text_align'])&&$font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';
		$css[1] .= isset($font['letter_spacing'])&&$font['letter_spacing'] ? "letter-spacing:" .$font['letter_spacing'] . "px;" : '';
	}

    return $css;
}

/**
 * This function builds css styles for forms
 * @param  string $font       Font ACF Fiels
 * @param  string $color      Color value
 * @param  string $background Color value
 * @param  string $border     Color value
 * @return array             return string with styles
 */

function pc_content_init_form( $font=[], $color='', $background='', $border='' ) {

    $css = ['', ''];

	if ( isset($font['font-family']) && $font['font-family'] ) {
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

	$css[1] .= isset($font['font-weight'])&&$font['font-weight'] ? "font-weight:" . $font['font-weight'] . ";" : '';
	$css[1] .= isset($font['font_size'])&&$font['font_size'] ? "font-size:" . $font['font_size'] . "px;" : '';
	$css[1] .= isset($font['line_height'])&&$font['line_height'] ? "line-height:" . $font['line_height'] . "px;" : '';
	$css[1] .= isset($font['font_style'])&&$font['font_style'] ? "font-style:" . $font['font_style'] . ";" : '';
	$css[1] .= isset($font['text_align'])&&$font['text_align'] ? "text-align:" . $font['text_align'] . ";" : '';
	$css[1] .= isset($font['letter_spacing'])&&$font['letter_spacing'] ? "letter-spacing:" . $font['letter_spacing'] . "px;" : '';

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


// add_filter( 'wp_get_attachment_image_attributes', 'attachment_image_attributes_aload' );

function attachment_image_attributes_aload($attr) {

    if ( isset($attr['data-aload-on']) ) :

        $attr['data-aload'] = $attr['src'];
        $attr['src'] = 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';

        if ( $attr['srcset'] ) :
            $attr['data-aload-set'] = $attr['srcset'];
            $attr['srcset'] = 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
        endif;
    endif;
    return $attr;
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

    echo '<!-- Open img tag -->';

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

		wp_dequeue_script('colorbox');
		wp_dequeue_script('application1');
		wp_dequeue_script('respond');
		wp_dequeue_script('respond_matchmedia');
		wp_dequeue_script('raty');
		wp_dequeue_script('magnific_popup');
		wp_dequeue_script('flexslider_js');
		wp_dequeue_script('match_height');
		wp_dequeue_script('modernizr');
		wp_dequeue_script('bootstrap_selectjs');
		wp_dequeue_script('modernizr');
		wp_dequeue_script('jquery-ui');
		wp_dequeue_script('spectrum_js');
		wp_dequeue_script('sticky');
		wp_dequeue_script('bxslider');
		wp_dequeue_script('scrollit');
		wp_dequeue_script('recaptcha');

		wp_dequeue_style('magnific_popup_css');

        wp_register_script('wqs_moment', get_stylesheet_directory_uri() . '/inc/init_api/js/moment.min.js');
        wp_enqueue_script('wqs_moment');

        wp_register_script('wqs_daterangepicker', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
        wp_enqueue_script('wqs_daterangepicker');

        wp_register_style('wqs_style', get_stylesheet_directory_uri() . '/inc/init_api/css/style.css');
        wp_enqueue_style('wqs_style');

        wp_register_style('wqs_style_daterangepicker', '//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css');
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
function get_font_mouseover_effect_styles( $field = [], $font_color = '', $bg_color = '' ) {
	$css = ['', ''];

	if ( $field  ) {

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

	$css = ['', ''];

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

/**
* @param $atts
* @return null|string
*/
function instagram_shortcode( $d ){

	$d = shortcode_atts( array(
		'type'           => 'recent-media',
		'count'          => '25',
		'columns'        => '5',
		'rest'           => '',
		'onclick'        => '',
		'user-details'   => '',
		'img-resolution' => 'thumbnail',
		'token'          => get_field('insta_token','apikey'),
        'text_before_logo' => 'Visit us',
        'text_before_logo_size' => '3',
        'logo_size' => '2',
	), $d );

  $root = 'https://api.instagram.com/v1';
  $endpoint = '';
  $params = [];

// set endpoint
  switch ($d['type']) :
    default:
      $endpoint = 'users/self/media/recent';

      // pass params
      if ($d['count'])
        $params['count'] = $d['count'];

      if ($d['token'])
        $params['access_token'] = $d['token'];

      $params = http_build_query($params);

      // requesting
      $response = json_decode(get( "$root/$endpoint/?$params" ), true);
      break;
  endswitch;

  if ($d['rest']) :
    switch ($d['rest']) :
      case 'instagram':
        $d['rest-button'] = get_button(
          ['type' => 'url', 'url' => '#.', 'label' => __('See more')],
          ['button', 'instagram--see-more']
        );
        break;
    endswitch;
  endif;

        $logo_size = $d['logo_size']*0.3;
        $text_before_logo_size = $d['text_before_logo_size'];

  if ( $d['token'] && isset($response['data']) ) :

    $attrs = convert_html_attributes([
      convert_html_attributes([
        'instagram',
        "instagram_{$d['type']}",
        $d['columns'] ? "columns_{$d['columns']}" : '',
        $d['rest'] ? "rest_{$d['rest']}" : '',
      ], 'class')
    ]);
    ?>

		<div <?=$attrs;?>>

      <?php if ($d['user-details']) : ?>

				<div class="instagram--user">
                    <div class="instagram--user__name">
                        <a href="<?="https://instagram.com/{$response['data'][0]['user']['username']}";?>"
                           target='_blank'>
                            <h2 style="display: inline-block; font-size: <?=$text_before_logo_size?>rem"><?=$d['text_before_logo']?></h2>
                        </a>
                    </div>

                    <a
                        href='<?="https://instagram.com/{$response['data'][0]['user']['username']}";?>'
                        class='instagram--user__picture'
                        target='_blank' style="transform: scale(<?=$logo_size?>);"
                    >
                        <img src='<?=$response['data'][0]['user']['profile_picture'];?>'
                                 alt='Instagram | Username: <?=$response['data'][0]['user']['username'];?>' />
                    </a>
				</div>

      <?php endif; ?>

			<div class="instagram--items">
        <?php
        if ( $d['onclick'] === 'instagram' ) :
          foreach ($response['data'] as $item) :
            ?>

						<a href="<?=$item['link'];?>" target="_blank" class="instagram--item instagram--item_link">
              <?=get_instagram_image_temp($item['images'][$d['img-resolution']]['url']);?>
							<span class="instagram--item__meta">
            <span class="instagram--item__meta-item">
              <i class="fa fa-heart"></i> <?=$item['likes']['count'];?>
            </span>

            <span class="instagram--item__meta-item">
              <i class="fa fa-comment"></i> <?=$item['comments']['count'];?>
            </span>
          </span>
						</a>

          <?php
          endforeach;
        else :
          foreach ($response['data'] as $item) :
            ?>

						<div class="instagram--item">
              <?=get_instagram_image_temp($item['images'][$d['img-resolution']]['url']);?>
						</div>

          <?php
          endforeach;
        endif;
        ?>
			</div>

            <?=isset($d['rest-button']) ? str_replace( '#.' , "https://instagram.com/{$response['data'][0]['user']['username']}"
        , $d['rest-button']) : '';?>

		</div>

  <?php
  endif;

	return null;
}
add_shortcode( 'instagram', 'instagram_shortcode' );

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_5af1bf6f61325',
    'title' => 'Home page instagram widget',
    'fields' => array(
      array(
        'key' => 'field_5af1bfaa689f7',
        'label' => 'Instagram',
        'name' => 'instagram',
        'type' => 'group',
        'instructions' => 'Will be appeared right above the footer',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5af1c00f689f8',
            'label' => 'Type',
            'name' => 'type',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'recent-media' => 'Recent media',
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5af1c05f689f9',
            'label' => 'Media count',
            'name' => 'count',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 25,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => 1,
            'max' => '',
            'step' => '',
          ),
          array(
            'key' => 'field_5af1c084689fa',
            'label' => 'Columns',
            'name' => 'columns',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 5,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => 0,
            'max' => '',
            'step' => '',
          ),
          array(
            'key' => 'field_5af1c0cc689fb',
            'label' => 'Rest images',
            'name' => 'rest',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'instagram' => 'Lead to Instagram',
            ),
            'default_value' => array(
            ),
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5af1c111689fc',
            'label' => 'Onclick image',
            'name' => 'onclick',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'instagram' => 'Open in Instagram',
            ),
            'default_value' => array(
            ),
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5af1c152689fd',
            'label' => 'User details',
            'name' => 'user-details',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'ava-and-username' => 'Ava & Username',
            ),
            'default_value' => array(
            ),
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5af1c19e689fe',
            'label' => 'Image resolution',
            'name' => 'img-resolution',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '33',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'thumbnail' => '150px',
              'low_resolution' => '320px',
              'standard_resolution' => '640px',
            ),
            'default_value' => array(
              0 => 'thumbnail',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
            array (
                'key' => 'field_539b474e4150f',
                'label' => 'Text before logo',
                'name' => 'text_before_logo',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Visit us on Instagram',
                'placeholder' => 'Visit us on Instagram',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_537d36e0910f3',
                'label' => 'Text size',
                'name' => 'text_before_logo_size',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '17',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 3,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 1,
                'max' => 6,
                'step' => '1',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_537d36e09dde5a',
                'label' => 'Logo size',
                'name' => 'logo_size',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '16',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 2,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 0.5,
                'max' => 5,
                'step' => '0.5',
                'readonly' => 0,
                'disabled' => 0,
            ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
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

endif;
