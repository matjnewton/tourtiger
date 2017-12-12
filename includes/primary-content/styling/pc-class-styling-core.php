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
          'key'      => 'fc_' . $i . '_iI_58311',
          'label'    => 'Base',
          'name'     => 'base-msg',
          'type'     => 'message',
          'required' => 0,
          'message'  => 'Base styles'
        ),
        array (
          'key' => 'fc_' . $i . '_iI_58312',
          'label' => 'Wrapper Background',
          'name' => 'base-wrapper-bg',
          'type' => 'rgba_color',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
          )
        ),
        array (
          'key' => 'fc_' . $i . '_iI_67403',
          'label' => 'Wrapper Box-shadow',
          'name' => 'base-wrapper-bs',
          'type' => 'true_false',
          'required' => 0,
          'wrapper' => array(
            'width' => 50,
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
