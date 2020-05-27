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
					'key' => $this->slug . '_i12hgallerylo32r96_' . $i,
					'label' => 'Galleries panel background',
					'name' => 'gallery-panel-bg',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'default_value' => 'rgba(0,0,0,.4)',
				),
				array (
					'key' => $this->slug . '_i12hgallbtnylo32r96_' . $i,
					'label' => 'Galleries panel font color',
					'name' => 'gallery-panel-font',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'default_value' => 'rgba(255,255,255,1)',
				),
				array (
					'key' => $this->slug . '_i12hgaborbtnylo32r96_' . $i,
					'label' => 'Galleries panel font border',
					'name' => 'gallery-panel-border',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'default_value' => 'rgba(255,255,255,1)',
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
				),

				array (
					'key' => $this->slug . $i . '_sb1roge52',
					'label' => 'New Sidebar',
					'name' => 'tab-sdb',
					'type' => 'tab',
					'required' => '',
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb2roge43',
					'label' => 'Button color',
					'name' => 'button-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb3roge34',
					'label' => 'Button hover color',
					'name' => 'button-color-hover',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_s2broge80',
					'label' => 'Button radius',
					'name' => 'button-radius',
					'type' => 'text',
					'required' => 0,
					'placeholder' => '15px or 10%'
				),
				array (
					'key' => $this->slug . $i . '_sb7roge98',
					'label' => 'Button font',
					'name' => 'button-font',
					'type' => 'typography',
					'required' => 0,
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
					'show_color_picker' => 0,
					'text_color' => '#ffffff',
					'show_font_style' => 0,
					'font_style' => 'normal',
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb4roge25',
					'label' => 'Titles color',
					'name' => 'titles-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb6roge07',
					'label' => 'Titles font',
					'name' => 'titles-font',
					'type' => 'typography',
					'required' => 0,
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
					'show_font_size' => 0,
					'font_size' => 20,
					'show_line_height' => 0,
					'line_height' => 25,
					'show_letter_spacing' => 0,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#000000',
					'show_font_style' => 0,
					'font_style' => 'normal',
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb5roge16',
					'label' => 'Content color',
					'name' => 'content-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb4roline25',
					'label' => 'Line color',
					'name' => 'line-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_sb5roge97',
					'label' => 'Add border to widgets',
					'name' => 'is-widget-border',
					'type' => 'true_false',
					'required' => 0,
					'message' => 'Sure',
				),

				array (
					'key' => $this->slug . $i . '_sb1rogex2',
					'label' => 'Featured products',
					'name' => 'tab-fp',
					'type' => 'tab',
					'required' => '',
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => $this->slug . $i . '_z836cbfcf8sfi-23',
					'label' => 'Title',
					'name' => 'featured-products_title',
					'type' => 'typography',
					'required' => 0,
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
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_color_picker' => 0,
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . '_zs4roline21',
					'label' => 'Title color',
					'name' => 'featured-products_title-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_z836ccf8bfi-h9',
					'label' => 'Button',
					'name' => 'featured-products_button',
					'type' => 'typography',
					'required' => 0,
					'show_font_weight' => 1,
					'font-weight' => 400,
					'show_backup_font' => 1,
					'backup-font' => 'Arial, Helvetica, sans-serif',
					'show_text_align' => 0,
					'text_align' => 'left',
					'show_text_direction' => 0,
					'show_color_picker' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 20,
					'show_line_height' => 1,
					'line_height' => 25,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_font_style' => 1,
					'font_style' => 'normal',
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . '_xb4sline23',
					'label' => 'Button color',
					'name' => 'featured-products_button-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_xb4roline22',
					'label' => 'Button background color',
					'name' => 'featured-products_button-bg-color',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_xb4ro1ane21',
					'label' => 'Button background hover color',
					'name' => 'featured-products_button-bg-hover',
					'type' => 'rgba_color',
					'required' => 0,
				),
				array (
					'key' => $this->slug . $i . '_5forms192',
					'label' => 'Form',
					'name' => 'forms',
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
					'key' => $this->slug . $i . '_tit12for43ont098',
					'label' => 'Title font',
					'name' => 'cc_style__fo_tit_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_titlefor98792',
					'label' => 'Title color',
					'name' => 'cc_style__fo_tit_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0,0,0,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '123t4for43ont',
					'label' => 'Description font',
					'name' => 'cc_style__fo_titd_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_titl1234m92',
					'label' => 'Description color',
					'name' => 'cc_style__fo_titd_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0,0,0,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_ld_585dfb9',
					'label' => 'Buttons style',
					'name' => 'cc__fo_butts_style',
					'type' => 'radio',
					'instructions' => 'Square means non-rounded edges. Round means fully round edges. Rounded corner just means slightly rounded edges.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'text' => 'Text',
						'square' => 'Square',
						'round' => 'Round',
						'corner' => 'Rounded Corner',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'square',
					'layout' => 'horizontal',
				),
				array (
					'key' => $this->slug . $i . '_125_8-2_a1dxz44',
					'label' => 'Buttons Border',
					'name' => 'cc__fo_butts_border',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => $this->slug . $i . '_ld_585dfb9',
								'operator' => '!=',
								'value' => 'text'
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'no' => 'No',
						'yes' => 'Yes',
						'hover' => 'On Mouseover',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'no',
					'layout' => 'horizontal',
				),
				array (
					'key' => $this->slug . $i . '_rd_5121533145',
					'label' => 'Buttons Border Thickness',
					'name' => 'cc__fo_butts_border_thickness',
					'type' => 'number',
					'instructions' => 'The border color will be the same as the button font color.',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => $this->slug . $i . '_ld_585dfb9',
								'operator' => '!=',
								'value' => 'text'
							),
							array (
								'field' => $this->slug . $i . '_125_8-2_a1dxz44',
								'operator' => '!=',
								'value' => 'no',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 1,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => 1,
					'max' => 5,
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => $this->slug . $i . '_ld_dfba',
					'label' => 'Buttons Mouseover effect',
					'name' => 'cc__fo_butts_hover',
					'type' => 'checkbox',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'invert' => 'Color Invert',
						'decor' => 'Text Decoration',
					),
					'default_value' => array (
					),
					'layout' => 'horizontal',
					'toggle' => 1,
				),
				array (
					'key' => $this->slug . $i . '_fformstyler123432font',
					'label' => 'Submit font',
					'name' => 'cc_style__fo_su_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5foco2bcfjzf292',
					'label' => 'Submit Button color',
					'name' => 'cc_style__fo_su_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(255,183,51,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_ds233sub2s143',
					'label' => 'Submit Button Background',
					'name' => 'cc_style__fo_su_bg',
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
					'key' => $this->slug . $i . '_shnsubmsh1sh42',
					'label' => 'Submit Button Dropshadow',
					'name' => 'cc_style__fo_su_drop',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Enable Dropshadow',
					'default_value' => 0,
				),
				array (
					'key' => $this->slug . $i . '_fnefont123ont',
					'label' => 'Next button font',
					'name' => 'cc_style__fo_ne_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5fone123c92',
					'label' => 'Next Button color',
					'name' => 'cc_style__fo_ne_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(255,183,51,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_ldsds35ds43',
					'label' => 'Next Button Background',
					'name' => 'cc_style__fo_ne_bg',
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
					'key' => $this->slug . $i . '_shnextsh26ds1sh42',
					'label' => 'Next Button Dropshadow',
					'name' => 'cc_style__fo_ne_drop',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Enable Dropshadow',
					'default_value' => 0,
				),
				array (
					'key' => $this->slug . $i . '_fop1234lalant',
					'label' => 'Previous button font',
					'name' => 'cc_style__fo_pr_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5foppreverp292',
					'label' => 'Previous Button color',
					'name' => 'cc_style__fo_pr_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(175,175,175,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_ldsds23432s143',
					'label' => 'Previous Button Background',
					'name' => 'cc_style__fo_pr_bg',
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
					'key' => $this->slug . $i . '_sh58pre3126ds1sh42',
					'label' => 'Prevous Button Dropshadow',
					'name' => 'cc_style__fo_pr_drop',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Enable Dropshadow',
					'default_value' => 0,
				),
				array (
					'key' => $this->slug . $i . '_fofifont',
					'label' => 'Field font',
					'name' => 'cc_style__fo_fi_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5fobor292',
					'label' => 'Field border color',
					'name' => 'cc_style__fo_bo_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(228,228,228,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_5ffiebg122',
					'label' => 'Field background color',
					'name' => 'cc_style__fo_bg_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(225,225,225,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_5fotexwfcxzt292',
					'label' => 'Field text color',
					'name' => 'cc_style__fo_te_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0,0,0,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_5psholder292',
					'label' => 'Field placeholder color',
					'name' => 'cc_style__fo_pc_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0,0,0,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_fofd123fwqontt',
					'label' => 'Field label font',
					'name' => 'cc_style__fo_lab_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5f1234sew92',
					'label' => 'Field label color',
					'name' => 'cc_style__fo_lab_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0,0,0,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_fofieldlabeldes',
					'label' => 'Field label font',
					'name' => 'cc_style__fo_des_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5decolor92',
					'label' => 'Field label color',
					'name' => 'cc_style__fo_des_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(55,55,55,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_fos12232tle',
					'label' => 'Steps title font',
					'name' => 'cc_style__fo_stt_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '123_stecolor2ps92',
					'label' => 'Steps title color',
					'name' => 'cc_style__fo_stt_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(55,55,55,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),
				array (
					'key' => $this->slug . $i . '_fosfont_sa5tle',
					'label' => 'Steps progress font',
					'name' => 'cc_style__fo_stp_f',
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
					'text_align' => 'center',
					'show_text_direction' => 0,
					'direction' => 'ltr',
					'show_font_size' => 1,
					'font_size' => 16,
					'show_line_height' => 1,
					'line_height' => 24,
					'show_letter_spacing' => 1,
					'letter_spacing' => 0,
					'show_color_picker' => 0,
					'text_color' => '#fff',
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
					'key' => $this->slug . $i . '_5p2343alofonts92',
					'label' => 'Steps progress color',
					'name' => 'cc_style__fo_stp_c',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(55,55,55,1)',
					'return_value' => 0,
					'ext_value' => array (
					),
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

		if ( $style === '' )
			$style = 'product_page_style-one';

		if ( have_rows( $style, 'option' ) ) {
			while ( have_rows( $style, 'option' ) ) {
				the_row();

				$css .= "<style type="text/css">";

				/**
				 * Background
				 */

				$background_color = get_sub_field( 'background-color' );

				if ( $background_color ) {
					$css .= "body.{$style}.single-product .site-inner .content, body.{$style}.single-product, .site-container .site-header .header-bar-wrapper {background:{$background_color}!important;}";
					$css .= "body.{$style} body.custom-background.single-product {background-color:{$background_color}!important;}";
				}

				$background_texture = get_sub_field( 'background-texture' );
				$background_repeat = get_sub_field( 'background-repeat' ) ? 'repeat' : 'no-repeat';

				if ( $background_texture ) {
					$css .= "body.{$style}.single-product .site-inner .content {";
						$css .= "background-image: url({$background_texture['url']})!important;";
						$css .= "background-repeat: {$background_repeat};";
					$css .= '}';
				}

				/**
				 * Content
				 */

				$css .= "body.{$style} .product_content_wrapper{";

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

				$css .= "body.{$style} .product_content_wrapper.product_content_wrapper_first,body.{$style} .product_content_wrapper.product_content_wrapper_header {";
					$css .= $content_bo ? "border-top: {$content_bo_thikness}xp solid {$content_bo_color};":'';
				$css .= '}';

				$css .= "body.{$style} .product_content_wrapper.product_content_wrapper_end,body.{$style} .product_content_wrapper.product_content_wrapper_footer {";
					$css .= $content_bo ? "border-bottom: {$content_bo_thikness}px solid {$content_bo_color};" : '';
				$css .= '}';

				$content_icon_color = get_sub_field( 'content_icon-color' );

				$css .= "body.{$style} .product_content_wrapper .fa-certificate {";
					$css .= $content_icon_color ? "color:{$content_icon_color};":'';
				$css .= '}';

				$content_hr_color = get_sub_field( 'content_hr-color' ) || 1;
				$content_hr_thickness = get_sub_field( 'content_hr-thickness' ) || '#abc545';

				$css .= "body.{$style} .primary_content_content_card_hr_line,body.{$style} .product_content_wrapper hr{";
					$css .= "border-top: {$content_hr_color} solid {$content_hr_thickness};";
				$css .= '}';

				$font_style_pa_content = get_sub_field( 'font-style_pa-content' );
				$font = pc_init_font_css($font_style_pa_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_pa_content ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper p, body.{$style} .site-inner .content .product_content_wrapper p, body.{$style} .product_content_wrapper ul li, .content-404 p{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_pa_content['text-color']};";

					$css .= '}';
				}

				$font_style_headline = get_sub_field( 'font-style_headline' );
				$font = pc_init_font_css($font_style_headline);
				$css .= $font[0] ? $font[0]:'';

				for ( $i = 1; $i < 7; $i++ ) {

					if ( $font_style_headline ) {
						$css .= "body.{$style} .styles .content .product_title_area.customstyle h{$i}, body.{$style} .content .product_title_area.customstyle h{$i}, .content-404 h1{";

							$css .= $font[1] ? $font[1] : '';
							$css .= "color: {$font_style_headline['text-color']};";

						$css .= '}';
					}
				}

				$font_style_h_details = get_sub_field( 'font-style_h-details' );
				$font = pc_init_font_css($font_style_h_details);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_h_details ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper ul.primary_content_headline_details_options.customstyle span, body.{$style} .site-inner .content .product_content_wrapper ul.primary_content_headline_details_options.customstyle span{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_h_details['text-color']};";

					$css .= '}';
				}

				$font_style_h_sub = get_sub_field( 'font-style_h-sub' );
				$font = pc_init_font_css($font_style_h_sub);
				$css .= $font[0] ? $font[0]:'';

				for ( $i = 1; $i < 7; $i++ ) {

					if ( $font_style_h_sub ) {
						$css .= "body.{$style} .styles .content h{$i}.primary_content_subhead, body.{$style} .content h{$i}.primary_content_subhead{";

							$css .= $font[1] ? $font[1]:'';
							$css .= "color: {$font_style_h_sub['text-color']};";

						$css .= '}';
					}

				}

				$font_style_special_content = get_sub_field( 'font-style_special-content' );
				$font = pc_init_font_css($font_style_special_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_special_content ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle p, body.{$style} .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle p{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_special_content['text-color']};";

					$css .= '}';
				}

				$font_style_hightlights = get_sub_field( 'font-style_hightlights' );
				$font_style_pa_content = get_sub_field( 'font-style_pa-content' );
				$font = pc_init_font_css($font_style_pa_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_hightlights || $font ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle span, body.{$style} .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle span, body.{$style}.single-product .site-container .site-inner .primary_content_highlights .highlights_options span, body.{$style} .reason_to_book_label span, body.{$style} .site-inner .content .sidebar_links_options a, body.{$style} .reason_to_book_label span {";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_pa_content['text-color']};";

					$css .= '}';
				}

				$font_style_trip_details = get_sub_field( 'font-style_trip-details' );
				$font = pc_init_font_css($font_style_trip_details);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_trip_details ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper span.primary_trip_details_label.customstyle, body.{$style} .site-inner .content .product_content_wrapper span.primary_trip_details_label.customstyle{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_trip_details['text-color']};";

					$css .= '}';
				}

				$font_style_td_content = get_sub_field( 'font-style_td-content' );
				$font = pc_init_font_css($font_style_td_content);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_td_content ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle, body.{$style} .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle, body.{$style} .styles .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle p, body.{$style} .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle p, body.{$style} .site-inner .content .product_content_wrapper .primary_trip_details_detail_collapse_full_width p, body.{$style} .styles .site-inner .content .product_content_wrapper .primary_trip_details_detail_collapse_full_width p{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_td_content['text-color']};";

					$css .= '}';

					$css .= "body.{$style} .sidebar_phone_row .phone_number span{";

						$font_size = get_sub_field('sidebar_phone_number_size');

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_td_content['text-color']};";
						$css .= $font_size ? "font-size: {$font_size}px" : '';

					$css .= "}";

					$css .= "body.{$style} .sidebar_phone_row .phone_label {";

						$font_size = get_sub_field('sidebar_phone_title_size');

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_td_content['text-color']};";
						$css .= $font_size ? "font-size: {$font_size}px" : '';

					$css .= "}";

					$css .= "body.{$style} .sidebar_phone_row .phone_number .fa-phone {";

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
						$css .= "body.{$style} .styles .content .primary_content_expandable_content_options_li h{$i}.primary_content_subhead.customstyle, body.{$style} .content .primary_content_expandable_content_options_li h{$i}.primary_content_subhead.customstyle {";

							$css .= $font[1] ? $font[1]:'';
							$css .= "color: {$font_style_exco_title['text-color']};";

						$css .= '}';

						$css .= "body.{$style} .styles .site-inner .content a.primary_content_expandable_content_toggle.collapsed::after, body.{$style} .styles .site-inner .content a.primary_content_expandable_content_toggle::after, body.{$style} .site-inner .content a.primary_content_expandable_content_toggle.collapsed::after, body.{$style} .site-inner .content a.primary_content_expandable_content_toggle::after {";
							$css .= "color: {$font_style_exco_title['text-color']};";
						$css .= '}';

						$css .= "body.{$style} .styles .content h{$i}.primary_content_subhead{";

							$css .= $font[1] ? $font[1]:'';
							$css .= "color: {$font_style_exco_title['text-color']};";

						$css .= '}';
					}

				}

				$font_style_exco_label = get_sub_field( 'font-style_exco-label' );
				$font = pc_init_font_css($font_style_exco_label);
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_exco_label ) {
					$css .= "body.{$style} .styles .site-inner .content a.primary_content_expandable_content_toggle.customstyle, body.{$style} .site-inner .content a.primary_content_expandable_content_toggle.customstyle, body.{$style} .styles .site-inner .content .product_content_wrapper .primary_content_expandable_content_toggle span, body.{$style} .site-inner .content .product_content_wrapper .primary_content_expandable_content_toggle span{";

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

					$css .= "body.{$style} .pc_featured-products__body .pc_featured-products__title {";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$font_style_fepr_title['text-color']};";

					$css .= '}';

					// Common for text section css
					// $css .= "body.{$style} .pc_featured-products__body {";

					// 	$css .= "text-align: {$font_style_fepr_title['text_align']};";

					// $css .= '}';
				}

				/**
				 * Featured Products Link styles
				 */
				$font_style_fepr_link = get_sub_field( 'font-style_featprod--link' );
				$font = pc_init_font_css( $font_style_fepr_link );
				$css .= $font[0] ? $font[0]:'';

				if ( $font_style_fepr_link ) {

					$css .= "body.{$style} .pc_featured-products__body-link, .content-404 a {";

						$css .= $font[1] ? $font[1]:'';

					$css .= '}';
				}

				/**
				 * Link color
				 */
				$link_color = get_sub_field( 'link_color' );
				$link_hover_color = get_sub_field( 'link_hover_color' );
				$link_visited_color = get_sub_field( 'link_visited_color' );

				$css .= $link_color ? "body.{$style} .styles .site-inner .content .product_content_wrapper a,body.{$style} .site-inner .content .product_content_wrapper a {color: {$link_color};}" : '';

				if ( $link_hover_color ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper a:hover, body.{$style} .styles .site-inner .content .product_content_wrapper a:focus, body.{$style} .styles .site-inner .content .product_content_wrapper a:active, body.{$style} .site-inner .content .product_content_wrapper a:hover, body.{$style} .site-inner .content .product_content_wrapper a:focus, body.{$style} .site-inner .content .product_content_wrapper a:active{";
						$css .= "color:{$link_hover_color};";
					$css .= '}';
				}

				$css .= "body.{$style} .primary_content_headline_details_options li i {";

					$css .= "color: {$link_color};";

				$css .= "}";

				$css .= "body.{$style} .pc_featured-products-carousel li.slick-active {";

					$css .= "background-color: {$link_color};";

				$css .= "}";

				if ( $link_visited_color ) {
					$css .= "body.{$style} .styles .site-inner .content .product_content_wrapper a.active, body.{$style} .site-inner .content .product_content_wrapper a.active{";
						$css .= "background-color:{$link_visited_color};";
					$css .= '}';
				}

				$book_now_bg = get_sub_field( 'bkn_background-color' );
				$book_now_bg_h = get_sub_field( 'bkn_background-color_h' );

				if ( $book_now_bg ) {
					$css .= "body.{$style} .book-btn2-product-title{";
						$css .= "background-color:{$book_now_bg};";
					$css .= '}';
				}

				if ( $book_now_bg_h ) {
					$css .= "body.{$style} .book-btn2-product-title:hover{";
						$css .= "background-color:{$book_now_bg_h};";
					$css .= '}';
				}

				$sidebar_headline = get_sub_field( 'sidebar_headline' );
				$font = pc_init_font_css($sidebar_headline);
				$css .= $font[0] ? $font[0]:'';

				if ( $sidebar_headline ) {
					$css .= "body.{$style} .book-tour-title_product{";

						$css .= $font[1] ? $font[1]:'';
						$css .= "color: {$sidebar_headline['text-color']};";

					$css .= '}';
				}

				$siidb_icon_color  = get_sub_field( 'content_icon-color' );
				$is_sidebar_border = get_sub_field( 'is-sidebar-border' );

				if ( $siidb_icon_color ) {
					$css .= "body.{$style} .reason_to_book_label .fa-certificate{";

						$css .= "color:{$siidb_icon_color};";

					$css .= '}';

					if ( $is_sidebar_border ) :
						$css .= "body.{$style} .book-tour-wrapper_product_row {";

							$css .= "border-color: {$siidb_icon_color};";

						$css .= "}";
					elseif ( ! $is_sidebar_border ) :
						$css .= "body.{$style} .book-tour-wrapper_product_row {";

							$css .= "border: none;";

						$css .= "}";
					endif;

					$css .= "body.{$style} .sidebar_phone_row .phone_number span {";

						$css .= "color: {$siidb_icon_color};";

					$css .= "}";

					$css .= "body.{$style} .sidebar_phone_row .phone_number .fa-phone {";

						$css .= "color: {$siidb_icon_color};";

					$css .= "}";
				}

				$css .= '.book-tour-wrapper_product .sidebar_phone_row { margin-top: 25px!important; }';


                /**
                 * Gallery panel bg
                 */
                 $gallery_style = get_sub_field('gallery-panel-bg');
				if ( $gallery_style ) {
					$css .= "body.{$style} .slider-pro--panel {";

						$css .= "background-color: $gallery_style;";

					$css .= '}';
				}

                /**
                 * Gallery panel color
                 */
                 $gallery_style = get_sub_field('gallery-panel-font');
				if ( $gallery_style ) {
					$css .= "body.{$style} .slider-pro--panel__btn {";

						$css .= "color: $gallery_style!important;";

					$css .= '}';
				}

                /**
                 * Gallery panel border
                 */
                 $gallery_style = get_sub_field('gallery-panel-border');
				if ( $gallery_style ) {
					$css .= "body.{$style} .slider-pro--panel__btn {";

						$css .= "border: 1px solid $gallery_style;";
						$css .= "padding: 9px 18px;";
						$css .= "display:inline-block;";

					$css .= '}';
				}

				/**
				 * New sidebar
				 */

				// Button
				$button_color       = get_sub_field('button-color');
				$button_color_hover = get_sub_field('button-color-hover');
				$button_radius      = get_sub_field('button-radius');

				$font = pc_init_font_css( get_sub_field( 'button-font' ) );
				$css .= $font[0] ? $font[0]:'';

				$css .= "body.{$style} .product-sidebar--button {";

					$css .= $font[1] ? $font[1] : '';
					$css .= $button_color ? "background-color:{$button_color}!important;" : '';
					$css .= $button_radius ? "border-radius:{$button_radius};" : '';

				$css .= '}';

				if ( $button_color_hover ) :
					$css .= "body.{$style} .product-sidebar--button:hover {";

						$css .= "background-color:{$button_color_hover}!important;";

					$css .= '}';

					$css .= "body.{$style} .product-sidebar .wysiwyg a:hover,body.{$style} .product-sidebar a.product-sidebar--list:hover {";

						$css .= $button_color_hover ? "color:{$button_color_hover}!important;" : '';

					$css .= '}';
				endif;

				// Title
				$titles_color = get_sub_field('titles-color');

				$font = pc_init_font_css( get_sub_field( 'titles-font' ) );
				$css .= $font[0] ? $font[0]:'';

				$css .= "body.{$style} .product-sidebar .wysiwyg h1,body.{$style} .product-sidebar .wysiwyg h2,body.{$style} .product-sidebar .wysiwyg h3,body.{$style} .product-sidebar .wysiwyg h4,body.{$style} .product-sidebar .wysiwyg h5,body.{$style} .product-sidebar .wysiwyg h6 {";

					$css .= $font[1] ? $font[1] : '';
					$css .= $titles_color ? "color:{$titles_color};" : '';

				$css .= '}';

				// content
				$content_color = get_sub_field('content-color');

				$css .= "body.{$style} .product-sidebar .wysiwyg p,body.{$style} .product-sidebar .wysiwyg li,body.{$style} .product-sidebar .wysiwyg a,body.{$style} .product-sidebar .wysiwyg span,body.{$style} .product-sidebar .product-sidebar--list {";

					$css .= $content_color ? "color:{$content_color};" : '';

				$css .= '}';

				if ( get_sub_field( 'is-widget-border' ) ) :
					$css .= "body.{$style} .product-sidebar--block {";
						$css .= "border: 1px solid {$button_color};";
					$css .= '}';
				endif;

				// HR line
				$color = get_sub_field( 'line-color' ) ? get_sub_field( 'line-color' ) : $button_color;
				$css .= "body.{$style} .product-sidebar--line {";
					$css .= "border-color: {$color};";
				$css .= '}';

				// featured products
				$title_font  = get_sub_field('featured-products_title');
				$title_color = get_sub_field('featured-products_title-color');
				$btn_font    = get_sub_field('featured-products_button');
				$btn_color   = get_sub_field('featured-products_button-color');
				$btn_bg      = get_sub_field('featured-products_button-bg-color');
				$btn_hover   = get_sub_field('featured-products_button-bg-hover');

				$font = pc_init_font_css( $title_font );
				$css .= $font[0] ? $font[0]:'';

				$css .= "body.{$style} .site-inner .content .pc_featured-products .pc_featured-products__body h6 {";
					$css .= $font[1] ? $font[1] : '';
					$css .= $title_color ? "color: {$title_color};" : '';
				$css .= '}';

				$font = pc_init_font_css( $btn_font );
				$css .= $font[0] ? $font[0]:'';

				$css .= "body.{$style} .site-inner .content .pc_featured-products .pc_featured-products__body-link {";
					$css .= $font[1] ? $font[1] : '';
					$css .= $btn_color ? "color: {$btn_color};" : '';
					$css .= $btn_bg ? "background-color: {$btn_bg};" : '';
				$css .= '}';

				$css .= "body.{$style} .site-inner .content .pc_featured-products .pc_featured-products__body-link:hover {";
					$css .= $btn_hover ? "background-color: {$btn_hover};" : '';
					$css .= $btn_color ? "color: {$btn_color};" : '';
				$css .= '}';


				/**
				 * Title
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_tit_f' ),
					get_sub_field( 'cc_style__fo_tit_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_title {" . $cc_style__ccc_css[1] . '}' : '';

				/**
				 * Description
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_titd_f' ),
					get_sub_field( 'cc_style__fo_titd_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_description {" . $cc_style__ccc_css[1] . '}' : '';

				/**
				 * Field Label
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_lab_f' ),
					get_sub_field( 'cc_style__fo_lab_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_body .gfield_label {" . $cc_style__ccc_css[1] . '}' : '';

				/**
				 * Steps title
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_stt_f' ),
					get_sub_field( 'cc_style__fo_stt_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_body .gf_progressbar_title {" . $cc_style__ccc_css[1] . '}' : '';

				/**
				 * Steps progress
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_stp_f' ),
					get_sub_field( 'cc_style__fo_stp_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gf_progressbar span {" . $cc_style__ccc_css[1] . '}' : '';

				/**
				 * Field description
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_des_f' ),
					get_sub_field( 'cc_style__fo_des_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_wrapper .gfield_description  {" . $cc_style__ccc_css[1] . '}' : '';

				$cc_style_btn = '';

				$cc_style_btn .= get_font_corner_style( get_sub_field( 'cc__fo_butts_style' ) );

				// TODO: Border

				// TODO: Thickness

				/**
				 * Next Button
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_ne_f' ),
					get_sub_field( 'cc_style__fo_ne_c' )
				);

				$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_ne_bg' ) ? 'background-color:'.get_sub_field( 'cc_style__fo_ne_bg' ).';' : '';

				$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_ne_drop' ) ? 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);' : '';

				$cc_style__ccc_css[2] = '';

				$cc_style_btn_mouse_over = get_font_mouseover_effect_styles(
					get_sub_field( 'cc__fo_butts_hover' ),
					get_sub_field( 'cc_style__fo_ne_c' ),
					get_sub_field( 'cc_style__fo_ne_bg' )
				);
				$cc_style__ccc_css[1] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[0] : '';
				$cc_style__ccc_css[2] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[1] : '';

				$cc_style_btn_border = get_font_border_styles(
					get_sub_field( 'cc__fo_butts_border' ),
					get_sub_field( 'cc_style__fo_ne_c' ),
					get_sub_field( 'cc__fo_butts_border_thickness' )
				);
				$cc_style__ccc_css[1] .= $cc_style_btn_border ? $cc_style_btn_border[0] : '';
				$cc_style__ccc_css[2] .= $cc_style_btn_border ? $cc_style_btn_border[1] : '';

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_next_button {" . $cc_style__ccc_css[1] . '}' : '';
				$css .= $cc_style__ccc_css[2] ? "body.{$style} .product_content_wrapper .gform_wrapper .gform_next_button:hover{" . $cc_style__ccc_css[2] . '}' : '';

				/**
				 * Previous Button
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_pr_f' ),
					get_sub_field( 'cc_style__fo_pr_c' )
				);

				$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_pr_bg' ) ? 'background-color:'.get_sub_field( 'cc_style__fo_pr_bg' ).';' : '';

				$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_pr_drop' ) ? 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);' : '';

				$cc_style__ccc_css[2] = '';

				$cc_style_btn_mouse_over = get_font_mouseover_effect_styles(
					get_sub_field( 'cc__fo_butts_hover' ),
					get_sub_field( 'cc_style__fo_pr_c' ),
					get_sub_field( 'cc_style__fo_pr_bg' )
				);

				$cc_style__ccc_css[1] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[0] : '';
				$cc_style__ccc_css[2] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[1] : '';

				$cc_style_btn_border = get_font_border_styles(
					get_sub_field( 'cc__fo_butts_border' ),
					get_sub_field( 'cc_style__fo_pr_c' ),
					get_sub_field( 'cc__fo_butts_border_thickness' )
				);
				$cc_style__ccc_css[1] .= $cc_style_btn_border ? $cc_style_btn_border[0] : '';
				$cc_style__ccc_css[2] .= $cc_style_btn_border ? $cc_style_btn_border[1] : '';

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_wrapper .gform_previous_button {" . $cc_style__ccc_css[1] . '}' : '';
				$css .= $cc_style__ccc_css[2] ? "body.{$style} .product_content_wrapper .gform_wrapper .gform_previous_button:hover{" . $cc_style__ccc_css[2] . '}' : '';

				/**
				 * Submit Button
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_su_f' ),
					get_sub_field( 'cc_style__fo_su_c' )
				);

				$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_su_bg' ) ? 'background-color:'.get_sub_field( 'cc_style__fo_su_bg' ).';' : '';

				$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_su_drop' ) ? 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);' : '';

				$cc_style__ccc_css[2] = '';

				$cc_style_btn_mouse_over = get_font_mouseover_effect_styles(
					get_sub_field( 'cc__fo_butts_hover' ),
					get_sub_field( 'cc_style__fo_su_c' ),
					get_sub_field( 'cc_style__fo_su_bg' )
				);

				$cc_style__ccc_css[1] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[0] : '';
				$cc_style__ccc_css[2] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[1] : '';

				$cc_style_btn_border = get_font_border_styles(
					get_sub_field( 'cc__fo_butts_border' ),
					get_sub_field( 'cc_style__fo_su_c' ),
					get_sub_field( 'cc__fo_butts_border_thickness' )
				);
				$cc_style__ccc_css[1] .= $cc_style_btn_border ? $cc_style_btn_border[0] : '';
				$cc_style__ccc_css[2] .= $cc_style_btn_border ? $cc_style_btn_border[1] : '';

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_wrapper .gform_button{" . $cc_style__ccc_css[1] . '}' : '';
				$css .= $cc_style__ccc_css[2] ? "body.{$style} .product_content_wrapper .gform_wrapper .gform_button:hover{" . $cc_style__ccc_css[2] . '}' : '';

				/**
				 * Input/Textarea field
				 */
				$cc_style__ccc_css = pc_content_init_form(
					get_sub_field( 'cc_style__fo_fi_f' ),
					get_sub_field( 'cc_style__fo_te_c' ),
					get_sub_field( 'cc_style__fo_bg_c' )
				);

				$css .= $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_wrapper .dropdown-menu > li > a, body.{$style} .product_content_wrapper .bootstrap-select.btn-group .btn .filter-option {" . $cc_style__ccc_css[1] . '} ' : '';

				$cc_style__ccc_css[1] .= 'border-style: solid;border-color:' . get_sub_field( 'cc_style__fo_bo_c' ) . ';';

				$css .= $cc_style__ccc_css[1] ? "body.{$style} .product_content_wrapper .gform_wrapper .gfield .gfield_select, body.{$style} .product_content_wrapper .gform_wrapper .gfield .gfield_multiselect, body.{$style} .product_content_wrapper .gform_wrapper input, body.{$style} .product_content_wrapper .gform_wrapper .gfield dropdown-toggle, body.{$style} .product_content_wrapper .gform_wrapper .gfield textarea, body.{$style} .product_content_wrapper .gform_wrapper .gfield textarea:focus, body.{$style} .product_content_wrapper .gform_wrapper .gfield .gfield_radio label, body.{$style} .product_content_wrapper .ginput_common--label {" . $cc_style__ccc_css[1] . '}' : '';

				$css .= get_sub_field( 'cc_style__fo_bg_c' ) ? "body.{$style} .product_content_wrapper .gform_wrapper input:-webkit-autofill, body.{$style} .product_content_wrapper .gform_wrapper .gfield textarea:-webkit-autofill { -webkit-box-shadow: 0 0 0 30px " . get_sub_field( 'cc_style__fo_bg_c' ) . ' inset;}' : '';

				/**
				 * Input placeholder
				 */
				$cc_style__ccc_css = get_sub_field( 'cc_style__fo_pc_c' ) ? 'color:' . get_sub_field( 'cc_style__fo_pc_c' ) . ';' : '';

				$css .= $cc_style__ccc_css ? "body.{$style} .product_content_wrapper " . '::-webkit-input-placeholder {' . $cc_style__ccc_css . '}' : '';
				$css .= $cc_style__ccc_css ? "body.{$style} .product_content_wrapper " . '::-moz-placeholder {' . $cc_style__ccc_css . '}' : '';
				$css .= $cc_style__ccc_css ? "body.{$style} .product_content_wrapper " . ':-moz-placeholder {' . $cc_style__ccc_css . '}' : '';
				$css .= $cc_style__ccc_css ? "body.{$style} .product_content_wrapper " . ':-ms-input-placeholder {' . $cc_style__ccc_css . '}' : '';


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
