<?php
/* ===========================
 * Product Page Class Extend
 * ======================== */
 
class ProductPage extends StylingCard {

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
			'layout' => 'row',
			'button_label' => 'Add Row',
			'sub_fields' => array(
				array (
					'key' => $this->slug . '_prpa15bgge50_' . $i,
					'label' => 'Background',
					'name' => 'background',
					'type' => 'tab',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => $this->slug . '_prpa56bgcge50_' . $i,
					'label' => 'Background Color',
					'name' => 'background-color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => '',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . '_prpaurebtextge50_' . $i,
					'label' => 'Background Texture',
					'name' => 'background-texture',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'preview_size' => 'thumbnail',
					'library' => 'uploadedTo',
					'return_format' => 'object',
					'min_width' => 0,
					'min_height' => 0,
					'min_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'max_size' => 0,
					'mime_types' => '',
				),
				array (
					'key' => $this->slug . '_prparepeattetfe50_' . $i,
					'label' => 'Repeat?',
					'name' => 'background-repeat',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Sure, repeat image',
					'default_value' => 1,
				),

				array (
					'key' => 'pp_' . $i . '_prpa15coge51',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'tab',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => $this->slug . '_c1o6b0g5c2o1_' . $i,
					'label' => 'Background Color',
					'name' => 'content_bg-color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => '',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . '_1c3o0b5g1c9o96_' . $i,
					'label' => 'Background Texture',
					'name' => 'content_bg-texture',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'preview_size' => 'thumbnail',
					'library' => 'uploadedTo',
					'return_format' => 'object',
					'min_width' => 0,
					'min_height' => 0,
					'min_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'max_size' => 0,
					'mime_types' => '',
				),
				array (
					'key' => $this->slug . '_hckoebki23itigo96_' . $i,
					'label' => 'Repeat?',
					'name' => 'content_bg-repeat',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Tes, repeat image above',
					'default_value' => 1,
				),
				array (
					'key' => $this->slug . '_hclehi345oood96_' . $i,
					'label' => 'Border Radius',
					'name' => 'content_border-radius',
					'type' => 'number',
					'instructions' => '',
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
					'min' => '0',
					'max' => '50',
					'step' => 1,
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => $this->slug . '_hcsgoodkewlnc96_' . $i,
					'label' => 'Dropshadow',
					'name' => 'content_dropshadow',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'none' => 'None',
						'1' => 'Very light',
						'3' => 'Light',
						'5' => 'Medium',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'embed on the Side',
					'layout' => 'vertical',
					'allow_null' => 0,
				),
				array (
					'key' => $this->slug . '_hchellodevlnc96_' . $i,
					'label' => 'Border?',
					'name' => 'content_border',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Great idea',
					'default_value' => 0,
				),

				array (
					'key' => 'pp_' . $i . '_prpelemtnedkjge51',
					'label' => 'Content elements',
					'name' => 'content-elements',
					'type' => 'tab',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),

				array (
					'key' => 'pp_' . $i . '_prpa15foge52',
					'label' => 'Font style',
					'name' => 'font-style',
					'type' => 'tab',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),
			),
		);	

		return $fc_options_array;

	}
	
}

new ProductPage( 'Product Page', 1 );

?>