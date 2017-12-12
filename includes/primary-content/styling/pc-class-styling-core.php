<?php
/* ===========================
 * Testimonial Page Class Extend
 * ======================== */
 
class Core extends StylingCard {

	/**
	 * Return Fields 
	 * @return array
	 */
	function return_acf_group( $i = '', $c = '' ) {

		$fc_options_array = array (
			'key' => $this->slug . '_style-' . $c,
			'label' => 'Styles group',
			'name' => $this->slug . '_style-' . $c,
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 1,
			'layout' => 'block',
			'button_label' => 'Add Row',
			'sub_fields' => array(

        array (
          'key' => 'fc_' . $i . '_iI_58312',
          'label' => 'Base Wrapper',
          'name' => 'base-wrapper-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_67403',
          'label' => 'Base Wrapper Box-shadow',
          'name' => 'base-wrapper-bs',
          'type' => 'true_false',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key' => 'fc_' . $i . '_iI_49214',
          'label' => 'Above Header Area',
          'name' => 'above-header-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_48305',
          'label' => 'Header',
          'name' => 'header-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_3z396',
          'label' => 'Secondary menu',
          'name' => 'secondary-menu-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),

        array (
          'key' => 'fc_' . $i . '_iI_3z396',
          'label' => 'Submenu item',
          'name' => 'sub-menu-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_2x487',
          'label' => 'CTA Button',
          'name' => 'cta-button-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key' => 'fc_' . $i . '_iI_3c578',
          'label' => 'Secondary Bar',
          'name' => 'se-bar-wrapper-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_5v669',
          'label' => 'Secondary Submenu',
          'name' => 'se-sub-menu-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key' => 'fc_' . $i . '_iI_5v669',
          'label' => 'Mobile Toggle button',
          'name' => 'mob-tog-btn-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_6b750',
          'label' => 'Mobile Toggle button hover',
          'name' => 'mob-tog-btn-bg-h',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key' => 'fc_' . $i . '_iI_7n851',
          'label' => 'Hero CTA Button',
          'name' => 'hero-cta-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_8m942',
          'label' => 'Hero CTA Button fill',
          'name' => 'hero-cta-fill',
          'type' => 'true_false',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_7n851',
          'label' => 'Content CTA Button',
          'name' => 'hero-cta-content-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),

        array (
          'key' => 'fc_' . $i . '_iI_8a033',
          'label' => 'Hero Image Tint',
          'name' => 'hero-image-tint',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_9s124',
          'label' => 'Hero Title',
          'name' => 'hero-title-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_0d215',
          'label' => 'Hero Content',
          'name'  => 'hero-content-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_0d215',
          'label' => 'Point of Difference Background on Front page',
          'name'  => 'point-of-diff-bg-fe',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_1f306',
          'label' => 'Secondary Menu Background on Tour pages',
          'name'  => 'se-menu-bg-tp',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_2g497',
          'label' => 'Button background',
          'name'  => 'btn-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_3h588',
          'label' => 'Button background fill',
          'name'  => 'btn-fill',
          'type'  => 'true_false',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_3h579',
          'label' => 'Elements accent',
          'name'  => 'el-accent-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 100,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_3h150',
          'label' => 'Content Area',
          'name'  => 'content-area-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_4j241',
          'label' => 'Content Containers',
          'name'  => 'content-containers-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_5k132',
          'label' => 'Featured Area Container Background',
          'name'  => 'featured-area-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_6l223',
          'label' => 'Featured Area Container Box-shadow',
          'name'  => 'featured-area-bs',
          'type'  => 'true_false',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6l214',
          'label' => 'Tile image tint',
          'name'  => 'tile-image-tint',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6l215',
          'label' => 'CTA Container',
          'name'  => 'cta-container-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_6q306',
          'label' => 'Subscribe Container',
          'name'  => 'subscribe-container-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6q397',
          'label' => 'Trip list item',
          'name'  => 'trip-list-item-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_7w488',
          'label' => 'Fluid Box Background-Color Variation-1',
          'name'  => 'fl-box-bg-1',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_7w579',
          'label' => 'Fluid Box Background-Color Variation-2',
          'name'  => 'fl-box-bg-2',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_7w560',
          'label' => 'Trip Link Button',
          'name'  => 'trip-link-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 33,
          )
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_7w551',
          'label' => 'Footer background',
          'name'  => 'footer-bg',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 100,
          )
        ),
      ),
		);	

		return $fc_options_array;

	}

	/**
	 * Get styles
	 * 
	 * @var    string   $style       style number
	 * @var    string   $component   name of component   
	 * @return string  
	 */
	public static function get_styles( $style = '' ) {
		$css = '';

		if ( have_rows( $style, 'option' ) ) {
			while ( have_rows( $style, 'option' ) ) {
				the_row();

				$css .= '<style>';


				$css .= '</style>';

			}
		} else {
			$css .= "<!-- There are not styles for this style group. -->";
		}

		return $css;
	}
	
}

new Core( 'Core', 1, true );
