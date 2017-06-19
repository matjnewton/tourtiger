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
					'message' => 'Of course! Repeat image above',
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
					'layout' => 'horizontal',
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
					'key' => $this->slug . '_hc919odborcolvpl136_' . $i,
					'label' => 'Border Color',
					'name' => 'content_border-color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => $this->slug . '_hchellodevlnc96_' . $i,
								'operator' => '==',
								'value' => '1',
							),
						),
					),
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
					'key' => $this->slug . '_hqlt3icn1s2s136_' . $i,
					'label' => 'Border Thickness',
					'name' => 'content_border-thikness',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => $this->slug . '_hchellodevlnc96_' . $i,
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => 1,
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => $this->slug . '_i123on-lo32r96_' . $i,
					'label' => 'Icon Color',
					'name' => 'content_icon-color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#abc545',
				),
				array (
					'key' => $this->slug . '_i12h-rlo32r96_' . $i,
					'label' => 'HR line Color',
					'name' => 'content_hr-color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#abc545',
				),
				array (
					'key' => $this->slug . '_i12h-rlo32r96_' . $i,
					'label' => 'HR line Thickness',
					'name' => 'content_hr-thickness',
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
					'max' => '',
					'step' => 1,
					'readonly' => 0,
					'disabled' => 0,
				),

				array (
					'key' => 'pp_' . $i . '_prpamhdeeeeele52',
					'label' => 'Fonts',
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

				array (
					'key' => $this->slug . $i . '_5836cbhead-line',
					'label' => 'Headline',
					'name' => 'font-style_headline',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_5836subhede',
					'label' => 'Sub-headline',
					'name' => 'font-style_h-sub',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_5hexco432tle_e',
					'label' => 'Expandable content',
					'name' => 'font-style_exco-title',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_5836cbhedetline',
					'label' => 'Headline details',
					'name' => 'font-style_h-details',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),
				array (
					'key' => $this->slug . $i . '_58d6s4spd3ont1tine',
					'label' => 'Spesial content',
					'name' => 'font-style_special-content',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),
				array (
					'key' => $this->slug . $i . '_5h1tl1ts-ine',
					'label' => 'Hightlights',
					'name' => 'font-style_hightlights',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 0,
					'font-family' => '',
					'show_font_weight' => 0,
					'font-weight' => 400,
					'show_backup_font' => 0,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 0,
					'font_size' => 20,
					'show_line_height' => 0,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 0,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),
				array (
					'key' => $this->slug . $i . '_5htrip-ts-ine',
					'label' => 'Trip details',
					'name' => 'font-style_trip-details',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),
				array (
					'key' => $this->slug . $i . '_5hconten12-ine',
					'label' => 'Trip details content',
					'name' => 'font-style_td-content',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_5helabel432tle_e',
					'label' => 'Expandable content label',
					'name' => 'font-style_exco-label',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),
				array (
					'key' => $this->slug . $i . '_5helpa-co322tle_1',
					'label' => 'Paragraph content',
					'name' => 'font-style_pa-content',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_fea6toursd--font',
					'label' => 'Featured products title',
					'name' => 'font-style_featprod',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 1,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_fea6toursd--link',
					'label' => 'Featured products link',
					'name' => 'font-style_featprod--link',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 1,
					'text_align' => 'inherit',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 22,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),

				array (
					'key' => $this->slug . $i . '_58l1n2c4l5r',
					'label' => 'Link Color',
					'name' => 'link_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(171, 197, 69, 1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_58h4v0r2c4l5r',
					'label' => 'Link Hover Color',
					'name' => 'link_hover_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(171, 197, 69, 1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_58h4v1_s1t0-t_r',
					'label' => 'Visited Link Color',
					'name' => 'link_visited_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(171, 197, 69, 1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),

				array (
					'key' => 'pp_' . $i . '_prsidebaroge52',
					'label' => 'Sidebar',
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
				array (
					'key' => $this->slug . '_prpabordsidebarerttetfe50_' . $i,
					'label' => 'Enable border in sidebar?',
					'name' => 'is-sidebar-border',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Yes, include please',
					'default_value' => 1,
				),
				array (
					'key' => $this->slug . '_dcpabtn50_' . $i,
					'label' => 'Book now color',
					'name' => 'bkn_background-color',
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
					'key' => $this->slug . '_dhovertn50_' . $i,
					'label' => 'Book now hover color',
					'name' => 'bkn_background-color_h',
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
					'key' => $this->slug . $i . '_5helds3223____le_1',
					'label' => 'Sidebar Headline',
					'name' => 'sidebar_headline',
					'type' => 'typography',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_font_familys' => 1,
					'font-family' => '',
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 1,
					'text_color' => '#000000',
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
					'default_value' => '',
					'new_lines' => '',
					'maxlength' => '',
					'placeholder' => '',
					'readonly' => 0,
					'disabled' => 0,
					'rows' => '',
					'font_familys' => self::get_available_fonts(),
					'stylefont' => array (
						100 => 100,
						300 => 300,
						400 => 400,
						600 => 600,
						700 => 700,
						800 => 800,
					),
					'backupfont' => self::BACK_FONTS,
				),
				array (
					'key' => $this->slug . $i . '_1side4t1xt21-si2ze',
					'label' => 'Phone title font size',
					'name' => 'sidebar_phone_title_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'append' => 'px',
					'min' => '5',
					'max' => '50'
				),
				array (
					'key' => $this->slug . $i . '_1sinum213bert21-si2ze',
					'label' => 'Phone number font size',
					'name' => 'sidebar_phone_number_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'append' => 'px',
					'min' => '5',
					'max' => '50'
				)
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

				/**
				 * Background
				 */

				$background_color = get_sub_field( 'background-color' );

				if ( $background_color ) {
					$css .= "html.{$style} .single-product .site-inner .content, html.{$style} .single-product, .site-container .site-header .header-bar-wrapper {background:{$background_color}!important;}";
					$css .= "html.{$style} body.custom-background.single-product {background-color:{$background_color}!important;}";
				}

				$background_texture = get_sub_field( 'background-texture' );
				$background_repeat = get_sub_field( 'background-repeat' ) ? 'repeat' : 'no-repeat';

				if ( $background_texture ) {
					$css .= "html.{$style} .single-product .site-inner .content {";
						$css .= "background-image: url({$background_texture['url']});";
						$css .= "background-repeat: {$background_repeat};";
					$css .= '}';
				}

				/**
				 * Content
				 */

				$css .= "html.{$style} .product_content_wrapper{";

					$content_bg_color = get_sub_field( 'content_bg-color' );

					$css .= $content_bg_color ? "background-color:{$content_bg_color};" : '';

					$content_bg_texture = get_sub_field( 'content_bg-texture' );

					if ( $content_bg_texture ) {
						$content_bg_repeat = get_sub_field( 'content_bg-repeat' ) ? 'repeat' : 'no-repeat';

						$css .= "background-image: url({$content_bg_texture['url']});";
						$css .= "background-repeat: {$content_bg_repeat};";
					}

					$content_bo_radius = get_sub_field( 'content_border-radius' );

					$css .= $content_bo_radius ? "border-radius:{$content_bo_radius}px;" : '';

					$content_dropshadow = get_sub_field( 'content_dropshadow' );

					$css .= $content_dropshadow == 'none' ? 'box-shadow: none;' : 'box-shadow: 0 0 {$content_dropshadow}px rgba(0,0,0,0.1);';

					$content_bo = get_sub_field( 'content_border' );
					$content_bo_color = get_sub_field( 'content_border-color' );
					$content_bo_thikness = get_sub_field( 'content_border-thikness' );

					if ( $content_bo ) {
						$css .= "border-left: {$content_bo_thikness}xp solid {$content_bo_color};";
						$css .= "border-right: {$content_bo_thikness}xp solid {$content_bo_color};";
					}

				$css .= '}';

				$css .= "html.{$style} .product_content_wrapper.product_content_wrapper_first,html.{$style} .product_content_wrapper.product_content_wrapper_header {";
					$css .= $content_bo ? "border-top: {$content_bo_thikness}xp solid {$content_bo_color};":'';
				$css .= '}';

				$css .= "html.{$style} .product_content_wrapper.product_content_wrapper_end,html.{$style} .product_content_wrapper.product_content_wrapper_footer {";
					$css .= $content_bo ? "border-bottom: {$content_bo_thikness}px solid {$content_bo_color};" : '';
				$css .= '}';

				$content_icon_color = get_sub_field( 'content_icon-color' );

				$css .= "html.{$style} .product_content_wrapper .fa-certificate {";
					$css .= $content_icon_color ? "color:{$content_icon_color};":'';
				$css .= '}';

				$content_hr_color = get_sub_field( 'content_hr-color' ) || 1;
				$content_hr_thickness = get_sub_field( 'content_hr-thickness' ) || '#abc545';

				$css .= "html.{$style} .primary_content_content_card_hr_line,html.{$style} .product_content_wrapper hr{";
					$css .= "border-top: {$content_hr_color} solid {$content_hr_thickness};";
				$css .= '}';

				$font_style_pa_content = get_sub_field( 'font-style_pa-content' );
				$font = pc_init_font_css($font_style_pa_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_pa_content ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper p, html.{$style} .site-inner .content .product_content_wrapper p, html.{$style} .product_content_wrapper ul li{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_pa_content['text-color']};";

					$css .= '}';
				}

				$font_style_headline = get_sub_field( 'font-style_headline' );
				$font = pc_init_font_css($font_style_headline);
				$css .= $font[0] ? $font[0]:'';

				for ( $i = 1; $i < 7; $i++ ) {

					if ( $font_style_headline ) {
						$css .= "html.{$style} .styles .content .product_title_area.customstyle h{$i}, html.{$style} .content .product_title_area.customstyle h{$i}{";

							$css .= $font[1] ? $font[1] : '';
							$css .= "color: {$font_style_headline['text-color']};";

						$css .= '}';
					}
				}

				$font_style_h_details = get_sub_field( 'font-style_h-details' );
				$font = pc_init_font_css($font_style_h_details);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_h_details ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper ul.primary_content_headline_details_options.customstyle span, html.{$style} .site-inner .content .product_content_wrapper ul.primary_content_headline_details_options.customstyle span{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_h_details['text-color']};";

					$css .= '}';
				}

				$font_style_h_sub = get_sub_field( 'font-style_h-sub' );
				$font = pc_init_font_css($font_style_h_sub);
				$css .= $font[0] ? $font[0]:'';

				for ( $i = 1; $i < 7; $i++ ) {

					if ( $font_style_h_sub ) {
						$css .= "html.{$style} .styles .content h{$i}.primary_content_subhead.customstyle, html.{$style} .content h{$i}.primary_content_subhead.customstyle{";

							$css .= $font[1] ? $font[1]:'';
							$css .= "color: {$font_style_h_sub['text-color']};";

						$css .= '}';
					}

				}

				$font_style_special_content = get_sub_field( 'font-style_special-content' );
				$font = pc_init_font_css($font_style_special_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_special_content ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle p, html.{$style} .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle p{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_special_content['text-color']};";

					$css .= '}';
				}

				$font_style_hightlights = get_sub_field( 'font-style_hightlights' );
				$font_style_pa_content = get_sub_field( 'font-style_pa-content' );
				$font = pc_init_font_css($font_style_pa_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_hightlights || $font ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle span, html.{$style} .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle span, html.{$style} body.single.single-product .site-container .site-inner .primary_content_highlights .highlights_options span, html.{$style} .reason_to_book_label span, html.{$style} .site-inner .content .sidebar_links_options a, html.{$style} .reason_to_book_label span {";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_pa_content['text-color']};";

					$css .= '}';
				}

				$font_style_trip_details = get_sub_field( 'font-style_trip-details' );
				$font = pc_init_font_css($font_style_trip_details);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_trip_details ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper span.primary_trip_details_label.customstyle, html.{$style} .site-inner .content .product_content_wrapper span.primary_trip_details_label.customstyle{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_trip_details['text-color']};";

					$css .= '}';
				}

				$font_style_td_content = get_sub_field( 'font-style_td-content' );
				$font = pc_init_font_css($font_style_td_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_td_content ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle, html.{$style} .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle, html.{$style} .styles .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle p, html.{$style} .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle p, html.{$style} .site-inner .content .product_content_wrapper .primary_trip_details_detail_collapse_full_width p, html.{$style} .styles .site-inner .content .product_content_wrapper .primary_trip_details_detail_collapse_full_width p{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_td_content['text-color']};";

					$css .= '}';

					$css .= "html.{$style} .sidebar_phone_row .phone_number span{";

						$font_size = get_sub_field('sidebar_phone_number_size');

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_td_content['text-color']};";
						$css .= $font_size ? "font-size: {$font_size}px" : '';

					$css .= "}";

					$css .= "html.{$style} .sidebar_phone_row .phone_label {";

						$font_size = get_sub_field('sidebar_phone_title_size');

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_td_content['text-color']};";
						$css .= $font_size ? "font-size: {$font_size}px" : '';

					$css .= "}";

					$css .= "html.{$style} .sidebar_phone_row .phone_number .fa-phone {";

						$css .= "font-size: {$font_style_td_content['font_size']}px;";
						$css .= "line-height: {$font_style_td_content['line_height']}px;";
						$css .= "color: {$font_style_td_content['text-color']};";

					$css .= "}";
				}

				$font_style_exco_title = get_sub_field( 'font-style_exco-title' );
				$font = pc_init_font_css($font_style_exco_title);
				$css .= $font[0] ? $font[0]:'';

				for ( $i = 1; $i < 7; $i++ ) {

					if ( $font_style_exco_title ) {
						$css .= "html.{$style} .styles .content .primary_content_expandable_content_options_li h{$i}.primary_content_subhead.customstyle, html.{$style} .content .primary_content_expandable_content_options_li h{$i}.primary_content_subhead.customstyle {";

							$css .= $font[1] ? $font[1]:'';
							$css .= "color: {$font_style_exco_title['text-color']};";

						$css .= '}';

						$css .= "html.{$style} .styles .site-inner .content a.primary_content_expandable_content_toggle.collapsed::after, html.{$style} .styles .site-inner .content a.primary_content_expandable_content_toggle::after, html.{$style} .site-inner .content a.primary_content_expandable_content_toggle.collapsed::after, html.{$style} .site-inner .content a.primary_content_expandable_content_toggle::after {";
							$css .= "color: {$font_style_exco_title['text-color']};";
						$css .= '}';
						
						$css .= "html.{$style} .styles .content h{$i}.primary_content_subhead{";

							$css .= $font[1] ? $font[1]:'';
							$css .= "color: {$font_style_exco_title['text-color']};";

						$css .= '}';
					}

				}

				$font_style_exco_label = get_sub_field( 'font-style_exco-label' );
				$font = pc_init_font_css($font_style_exco_label);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_exco_label ) {
					$css .= "html.{$style} .styles .site-inner .content a.primary_content_expandable_content_toggle.customstyle, html.{$style} .site-inner .content a.primary_content_expandable_content_toggle.customstyle, html.{$style} .styles .site-inner .content .product_content_wrapper .primary_content_expandable_content_toggle span, html.{$style} .site-inner .content .product_content_wrapper .primary_content_expandable_content_toggle span{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_exco_label['text-color']};";

					$css .= '}';
				}

				/**
				 * Featured Products 
				 */
				$font_style_fepr_title = get_sub_field( 'font-style_featprod' );
				$font = pc_init_font_css( $font_style_fepr_title );
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_fepr_title ) {
					
					$css .= "html.{$style} .pc_featured-products__body .pc_featured-products__title {";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_fepr_title['text-color']};";

					$css .= '}';

					// Common for text section css 
					$css .= "html.{$style} .pc_featured-products__body {";

						$css .= "text-align: {$font_style_fepr_title['text_align']};";

					$css .= '}';
				}

				/**
				 * Featured Products Link styles
				 */
				$font_style_fepr_link = get_sub_field( 'font-style_featprod--link' );
				$font = pc_init_font_css( $font_style_fepr_link );
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_fepr_link ) {
					
					$css .= "html.{$style} .pc_featured-products__body-link {";

						$css .= $font[1] ? $font[1]:'';

					$css .= '}';
				}

				/**
				 * Link color
				 */
				$link_color = get_sub_field( 'link_color' );
				$link_hover_color = get_sub_field( 'link_hover_color' );
				$link_visited_color = get_sub_field( 'link_visited_color' );

				$css .= $link_color ? "html.{$style} .styles .site-inner .content .product_content_wrapper a,html.{$style} .site-inner .content .product_content_wrapper a {color: {$link_color};}" : '';

				if ( $link_hover_color ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper a:hover, html.{$style} .styles .site-inner .content .product_content_wrapper a:focus, html.{$style} .styles .site-inner .content .product_content_wrapper a:active, html.{$style} .site-inner .content .product_content_wrapper a:hover, html.{$style} .site-inner .content .product_content_wrapper a:focus, html.{$style} .site-inner .content .product_content_wrapper a:active{";
						$css .= "color:{$link_hover_color};";
					$css .= '}';
				} 

				$css .= "html.{$style} .primary_content_headline_details_options li i {";

					$css .= "color: {$link_color};";

				$css .= "}";

				$css .= "html.{$style} .pc_featured-products-carousel li.slick-active {";

					$css .= "background-color: {$link_color};";

				$css .= "}";

				if ( $link_visited_color ) {
					$css .= "html.{$style} .styles .site-inner .content .product_content_wrapper a:visited, html.{$style} .site-inner .content .product_content_wrapper a:visited{";
						$css .= "color:{$link_visited_color};";
					$css .= '}';
				} 

				$book_now_bg = get_sub_field( 'bkn_background-color' );
				$book_now_bg_h = get_sub_field( 'bkn_background-color_h' );

				if ( $book_now_bg ) {
					$css .= "html.{$style} .book-btn2-product-title{";
						$css .= "background-color:{$book_now_bg};";
					$css .= '}';
				}

				if ( $book_now_bg_h ) {
					$css .= "html.{$style} .book-btn2-product-title:hover{";
						$css .= "background-color:{$book_now_bg_h};";
					$css .= '}';
				}

				$sidebar_headline = get_sub_field( 'sidebar_headline' );
				$font = pc_init_font_css($sidebar_headline);
				$css .= $font[0] ? $font[0]:'';

				if ( $sidebar_headline ) {
					$css .= "html.{$style} .book-tour-title_product{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$sidebar_headline['text-color']};";

					$css .= '}';
				}

				$siidb_icon_color  = get_sub_field( 'content_icon-color' );
				$is_sidebar_border = get_sub_field( 'is-sidebar-border' );

				if ( $siidb_icon_color ) {
					$css .= "html.{$style} .reason_to_book_label .fa-certificate{";

						$css .= "color:{$siidb_icon_color};";

					$css .= '}';

					if ( $is_sidebar_border ) :
						$css .= "html.{$style} .book-tour-wrapper_product_row {";

							$css .= "border-color: {$siidb_icon_color};";

						$css .= "}";
					elseif ( ! $is_sidebar_border ) :
						$css .= "html.{$style} .book-tour-wrapper_product_row {";

							$css .= "border: none;";

						$css .= "}";
					endif;

					$css .= "html.{$style} .sidebar_phone_row .phone_number span {";

						$css .= "color: {$siidb_icon_color};";

					$css .= "}";

					$css .= "html.{$style} .sidebar_phone_row .phone_number .fa-phone {";

						$css .= "color: {$siidb_icon_color};";

					$css .= "}";
				}

				$css .= '.book-tour-wrapper_product .sidebar_phone_row { margin-top: 25px!important; }';

				$css .= '</style>';

			}
		} else {
			$css .= "<!-- There are not styles for this style group. -->";
		}

		return $css;
	}
	
}

new ProductPage( 'Product Page', 1 );

?>