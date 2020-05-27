<?php
/* ===========================
 * Testimonial Page Class Extend
 * ======================== */

class Typography extends StylingCard {

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

        /**
         * Default text
         */
        array (
          'key'   => $this->slug . '1l2z2q7',
          'label' => 'Default',
          'name'  => 'message-1',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Text styles'
        ),
        array (
          'key'   => $this->slug . '9l4z0q8',
          'label' => 'Font',
          'name'  => 'def-tex-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '9l4z0q9',
          'label' => 'Color',
          'name'  => 'def-tex-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Default link text
         */
        array (
          'key'   => $this->slug . '2k2z2q7',
          'label' => 'Default',
          'name'  => 'message-2',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Link text styles'
        ),
        array (
          'key'   => $this->slug . '2k4z0q8',
          'label' => 'Font',
          'name'  => 'def-lix-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '2k4z0q9',
          'label' => 'Color',
          'name'  => 'def-lix-col',
          'type'  => 'rgba_color',
          'required' => 0,
          'wrapper'  => array(
            'width' => 50
          )
        ),
        array (
          'key'   => $this->slug . '2k4z9q0',
          'label' => 'Hover color',
          'name'  => 'def-lix-cho',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Hero area title
         */
        array (
          'key'   => $this->slug . '2k2Z2q7',
          'label' => 'Hero area',
          'name'  => 'message-3',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Title text styles'
        ),
        array (
          'key'   => $this->slug . '2k4Z0q8',
          'label' => 'Font',
          'name'  => 'hea-tit-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '2k4Z0q9',
          'label' => 'Font for Mobiles',
          'name'  => 'hea-tit-fmo',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '2k4Z9q0',
          'label' => 'Color',
          'name'  => 'hea-tit-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Hero area content
         */
        array (
          'key'   => $this->slug . '3j2z2q7',
          'label' => 'Hero area',
          'name'  => 'message-4',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Content text styles'
        ),
        array (
          'key'   => $this->slug . '3j4z0q8',
          'label' => 'Font',
          'name'  => 'hea-con-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '3j4z0q9',
          'label' => 'Color',
          'name'  => 'hea-con-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Hero area CTA Button
         */
        array (
          'key'   => $this->slug . '4h2z2q7',
          'label' => 'Hero Area',
          'name'  => 'message-5',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'CTA Button'
        ),
        array (
          'key'   => $this->slug . '4h4z0q8',
          'label' => 'Font',
          'name'  => 'hea-ctb-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '4h4z0q9',
          'label' => 'Color',
          'name'  => 'hea-ctb-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '4h4z9q0',
          'label' => 'Hover color',
          'name'  => 'hea-ctb-cho',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured title
         */
        array (
          'key'   => $this->slug . '5g2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-6',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Title styles'
        ),
        array (
          'key'   => $this->slug . '5g4z0q8',
          'label' => 'Font',
          'name'  => 'fea-tit-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5g4z0q9',
          'label' => 'Line color',
          'name'  => 'fea-tit-lib',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '5g4z9q0',
          'label' => 'Color',
          'name'  => 'fea-tit-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured tile title
         */
        array (
          'key'   => $this->slug . '6g2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-7',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Tile title styles'
        ),
        array (
          'key'   => $this->slug . '6g4z0q8',
          'label' => 'Font',
          'name'  => 'fea-tlt-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '6g4z0q9',
          'label' => 'Active color',
          'name'  => 'fea-tlt-act',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '6g4z9q0',
          'label' => 'Hover color',
          'name'  => 'fea-tlt-hov',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured Front-3 tile title
         */
        array (
          'key'   => $this->slug . '7l2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-8',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Front-3 tile title'
        ),
        array (
          'key'   => $this->slug . '7l4z0q8',
          'label' => 'Font',
          'name'  => 'ff3-tlt-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '7l4z0q9',
          'label' => 'Color',
          'name'  => 'ff3-tlt-act',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured content
         */
        array (
          'key'   => $this->slug . '7k2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-9',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Content'
        ),
        array (
          'key'   => $this->slug . '7l4z0q9',
          'label' => 'Color',
          'name'  => 'fea-con-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured button
         */
        array (
          'key'   => $this->slug . '7j2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-10',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Button'
        ),
        array (
          'key'   => $this->slug . '7j4z0q8',
          'label' => 'Font',
          'name'  => 'fea-but-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),

        /**
         * Featured Front-3 button
         */
        array (
          'key'   => $this->slug . '8j2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-11',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Front-3 Button'
        ),
        array (
          'key'   => $this->slug . '8j4z0q8',
          'label' => 'Font',
          'name'  => 'ff3-but-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '8j4z0q9',
          'label' => 'Hover color',
          'name'  => 'ff3-but-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured Tour links Heading
         */
        array (
          'key'   => $this->slug . '9j2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-12',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Tour links Heading'
        ),
        array (
          'key'   => $this->slug . '9j4z0q8',
          'label' => 'Font',
          'name'  => 'tlh-hea-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '9j4z0q9',
          'label' => 'Color',
          'name'  => 'tlh-hea-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Featured Tour links Title
         */
        array (
          'key'   => $this->slug . '9h2z2q7',
          'label' => 'Featured area',
          'name'  => 'message-12',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Tour links Title'
        ),
        array (
          'key'   => $this->slug . '9h4z0q8',
          'label' => 'Font',
          'name'  => 'tlh-tit-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '9t4z0q9',
          'label' => 'Color',
          'name'  => 'tlh-tit-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Testimonials title
         */
        array (
          'key'   => $this->slug . '0q2z2q7',
          'label' => 'Testimonials',
          'name'  => 'message-13',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Title text'
        ),
        array (
          'key'   => $this->slug . '0q4z0q8',
          'label' => 'Font',
          'name'  => 'tes-tit-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '0q4z0q9',
          'label' => 'Line color',
          'name'  => 'tes-tit-lbc',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Testimonials tile title
         */
        array (
          'key'   => $this->slug . '9w2z2q1',
          'label' => 'Testimonials',
          'name'  => 'message-14',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Tile title text'
        ),
        array (
          'key'   => $this->slug . '9w4z0q2',
          'label' => 'Font',
          'name'  => 'tes-tlt-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '9w4z0q3',
          'label' => 'Color',
          'name'  => 'tes-tlt-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Testimonials content
         */
        array (
          'key'   => $this->slug . '9w2z2q1',
          'label' => 'Testimonials',
          'name'  => 'message-15',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Content text styles'
        ),
        array (
          'key'   => $this->slug . '9w4z0q2',
          'label' => 'Font',
          'name'  => 'tes-con-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '9w4z0q3',
          'label' => 'Color',
          'name'  => 'tes-con-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Multi-column area Heading
         */
        array (
          'key'   => $this->slug . '8e2z2q1',
          'label' => 'Multi-column area',
          'name'  => 'message-16',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Heading'
        ),
        array (
          'key'   => $this->slug . '8e4z0q2',
          'label' => 'Font',
          'name'  => 'mca-hea-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '8e4z0q3',
          'label' => 'Color',
          'name'  => 'mca-hea-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Multi-column area Sub-heading
         */
        array (
          'key'   => $this->slug . '7r2z2q1',
          'label' => 'Multi-column area',
          'name'  => 'message-17',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Subheading'
        ),
        array (
          'key'   => $this->slug . '7r4z0q2',
          'label' => 'Font',
          'name'  => 'mca-suh-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '7r4z0q3',
          'label' => 'Color',
          'name'  => 'mca-suh-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Fluid boxes
         */
        array (
          'key'   => $this->slug . '6t2z2q1',
          'label' => 'Fluid boxes',
          'name'  => 'message-18',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Fluid boxes'
        ),
        array (
          'key'   => $this->slug . '6t4z0q3',
          'label' => 'Heading color',
          'name'  => 'flb-hea-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '6t4z0q4',
          'label' => 'Paragraph',
          'name'  => 'flb-par-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '6t4z0q5',
          'label' => 'Button active',
          'name'  => 'flb-but-coa',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '6t4z0q6',
          'label' => 'Button hover',
          'name'  => 'flb-par-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Primary menu Secondary menu
         */
        array (
          'key'   => $this->slug . '5y2z2q1',
          'label' => 'Menu - Primary',
          'name'  => 'message-19',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Secondary menu item'
        ),
        array (
          'key'   => $this->slug . '5y4z0q3',
          'label' => 'Color',
          'name'  => 'prm-smi-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '5y4z0q4',
          'label' => 'Hover color',
          'name'  => 'prm-smi-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Primary menu top item
         */
        array (
          'key'   => $this->slug . '4u2z2q1',
          'label' => 'Menu - Primary',
          'name'  => 'message-20',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Top item'
        ),
        array (
          'key'   => $this->slug . '4u4z0q2',
          'label' => 'Font',
          'name'  => 'mca-toi-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '4u4z0q3',
          'label' => 'Color',
          'name'  => 'prm-toi-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '4u4z0q4',
          'label' => 'Hover color',
          'name'  => 'prm-toi-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Primary menu submenu
         */
        array (
          'key'   => $this->slug . '3i2z2q1',
          'label' => 'Menu - Primary',
          'name'  => 'message-20',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Sub menu'
        ),
        array (
          'key'   => $this->slug . '3i4z0q2',
          'label' => 'Font',
          'name'  => 'mca-sum-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '3i4z0q3',
          'label' => 'Color',
          'name'  => 'prm-sum-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '3i4z0q4',
          'label' => 'Hover color',
          'name'  => 'prm-sum-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Primary menu CTA button
         */
        array (
          'key'   => $this->slug . '2o2z2q1',
          'label' => 'Menu - Primary',
          'name'  => 'message-21',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'CTA Button'
        ),
        array (
          'key'   => $this->slug . '2o4z0q4',
          'label' => 'Border color',
          'name'  => 'prm-cta-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Secondary menu top item text
         */
        array (
          'key'   => $this->slug . '1y2z2q1',
          'label' => 'Menu - Secondary',
          'name'  => 'message-22',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Top item'
        ),
        array (
          'key'   => $this->slug . '1y4z0q2',
          'label' => 'Font',
          'name'  => 'sem-toi-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '1y4z0q3',
          'label' => 'Color',
          'name'  => 'sem-toi-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '1y4z0q4',
          'label' => 'Hover color',
          'name'  => 'sem-toi-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Secondary menu sub menu item text
         */
        array (
          'key'   => $this->slug . '0g2z2q1',
          'label' => 'Menu - Secondary',
          'name'  => 'message-23',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Sub menu item'
        ),
        array (
          'key'   => $this->slug . '0g4z0q2',
          'label' => 'Font',
          'name'  => 'sem-sei-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '0g4z0q3',
          'label' => 'Color',
          'name'  => 'sem-sei-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '0g4z0q4',
          'label' => 'Border color',
          'name'  => 'sem-sei-cob',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '0g4z0q5',
          'label' => 'Hover color',
          'name'  => 'sem-sei-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Mobile menu top item text
         */
        array (
          'key'   => $this->slug . '1M2z2q1',
          'label' => 'Menu - Mobile',
          'name'  => 'message-24',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Top item'
        ),
        array (
          'key'   => $this->slug . '1M4z0q2',
          'label' => 'Font',
          'name'  => 'mom-toi-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '1M4z0q3',
          'label' => 'Color',
          'name'  => 'mom-toi-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '1M4z0q4',
          'label' => 'Hover color',
          'name'  => 'mom-toi-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Mobile menu sub menu item text
         */
        array (
          'key'   => $this->slug . '0m2z2q1',
          'label' => 'Menu - Mobile',
          'name'  => 'message-25',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Sub menu item'
        ),
        array (
          'key'   => $this->slug . '0m4z0q2',
          'label' => 'Font',
          'name'  => 'mom-sei-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '0m4z0q3',
          'label' => 'Color',
          'name'  => 'mom-sei-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '0m4z0q5',
          'label' => 'Hover color',
          'name'  => 'mom-sei-coh',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Search form Above header text
         */
        array (
          'key'   => $this->slug . '0qWz2q1',
          'label' => 'Search form',
          'name'  => 'message-26',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Above header text'
        ),
        array (
          'key'   => $this->slug . '0qWz0q2',
          'label' => 'Font',
          'name'  => 'sef-aht-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '0mWz0q3',
          'label' => 'Color',
          'name'  => 'sef-aht-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Search form input field
         */
        array (
          'key'   => $this->slug . '1wWz2q1',
          'label' => 'Search form',
          'name'  => 'message-27',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Input field'
        ),
        array (
          'key'   => $this->slug . '1wWz0q2',
          'label' => 'Font',
          'name'  => 'sef-inf-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '3eWz0q3',
          'label' => 'Color',
          'name'  => 'sef-inf-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Search form footer area
         */
        array (
          'key'   => $this->slug . '2eWz2q1',
          'label' => 'Search form',
          'name'  => 'message-27',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Footer area form'
        ),
        array (
          'key'   => $this->slug . '2eWz0q2',
          'label' => 'Font',
          'name'  => 'sef-faf-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '2eWz0q3',
          'label' => 'Color',
          'name'  => 'sef-faf-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Search form input text
         */
        array (
          'key'   => $this->slug . '3rWz2q1',
          'label' => 'Search form',
          'name'  => 'message-28',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Input text'
        ),
        array (
          'key'   => $this->slug . '3rWz0q2',
          'label' => 'Font',
          'name'  => 'sef-int-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '3rWz0q3',
          'label' => 'Color',
          'name'  => 'sef-int-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '3rWz0q3',
          'label' => 'Footer search input color border',
          'name'  => 'sef-fsi-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Gravity form title
         */
        array (
          'key'   => $this->slug . '4tWz2q1',
          'label' => 'Gravity form',
          'name'  => 'message-29',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Title styles'
        ),
        array (
          'key'   => $this->slug . '4tWz0q2',
          'label' => 'Font',
          'name'  => 'gra-tit-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '4twz0q3',
          'label' => 'Color',
          'name'  => 'gra-tit-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Gravity form description
         */
        array (
          'key'   => $this->slug . '5yWz2q1',
          'label' => 'Gravity form',
          'name'  => 'message-30',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Description text styles'
        ),
        array (
          'key'   => $this->slug . '5yWz0q2',
          'label' => 'Font',
          'name'  => 'gra-des-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5yWz0q3',
          'label' => 'Color',
          'name'  => 'gra-des-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Gravity form label
         */
        array (
          'key'   => $this->slug . '6uWz2q1',
          'label' => 'Gravity form',
          'name'  => 'message-31',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Label text styles'
        ),
        array (
          'key'   => $this->slug . '6uWz0q2',
          'label' => 'Font',
          'name'  => 'gra-lab-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '6uWz0q3',
          'label' => 'Color',
          'name'  => 'gra-lab-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Gravity form text
         */
        array (
          'key'   => $this->slug . '7iWz2q1',
          'label' => 'Gravity form',
          'name'  => 'message-32',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Text'
        ),
        array (
          'key'   => $this->slug . '7iWz0q2',
          'label' => 'Font',
          'name'  => 'gra-tex-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '7iWz0q3',
          'label' => 'Color',
          'name'  => 'gra-tex-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '7iWz0q4',
          'label' => 'Background color',
          'name'  => 'gra-tex-cob',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '7iWz0q5',
          'label' => 'Focused background color',
          'name'  => 'gra-tex-fbc',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Gravity form submit
         */
        array (
          'key'   => $this->slug . '8oWz2q1',
          'label' => 'Gravity form',
          'name'  => 'message-33',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Submit'
        ),
        array (
          'key'   => $this->slug . '8oWz0q2',
          'label' => 'Font',
          'name'  => 'gra-sub-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),

        /**
         * Subscribe gravity form title
         */
        array (
          'key'   => $this->slug . '9zWz2q1',
          'label' => 'Subscribe gForm',
          'name'  => 'message-34',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Title'
        ),
        array (
          'key'   => $this->slug . '9zWz0q2',
          'label' => 'Font',
          'name'  => 'sgr-tit-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '9zWz0q3',
          'label' => 'Color',
          'name'  => 'sgr-tit-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Subscribe gravity form description
         */
        array (
          'key'   => $this->slug . '0xWz2q1',
          'label' => 'Subscribe gForm',
          'name'  => 'message-35',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Description'
        ),
        array (
          'key'   => $this->slug . '0xWz0q2',
          'label' => 'Font',
          'name'  => 'sgr-des-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '0xWz0q3',
          'label' => 'Color',
          'name'  => 'sgr-des-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * Subscribe gravity form text
         */
        array (
          'key'   => $this->slug . '1cWz2q1',
          'label' => 'Subscribe gForm',
          'name'  => 'message-36',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Text styles'
        ),
        array (
          'key'   => $this->slug . '1cWz0q2',
          'label' => 'Font',
          'name'  => 'sgr-tex-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),

        /**
         * Subscribe gravity form text
         */
        array (
          'key'   => $this->slug . '2vWz2q1',
          'label' => 'Subscribe gForm',
          'name'  => 'message-37',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Submit styles'
        ),
        array (
          'key'   => $this->slug . '2vWz0q2',
          'label' => 'Font',
          'name'  => 'sgr-sub-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),

        /**
         * Entry – Headings
         */
        array (
          'key'   => $this->slug . '5bWz2q1',
          'label' => 'Entry',
          'name'  => 'message-38',
          'type'  => 'message',
          'required' => 0,
          'message'  => 'Headings styles'
        ),
        // Heading 1
        array (
          'key'   => $this->slug . '5bWz0q2',
          'label' => 'Heading 1 Font',
          'name'  => 'ent-he1-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bWz0q3',
          'label' => 'Heading 1 Color',
          'name'  => 'ent-he1-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        // Heading 2
        array (
          'key'   => $this->slug . '5bW20q2',
          'label' => 'Heading 2 Font',
          'name'  => 'ent-he2-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bW20q3',
          'label' => 'Heading 2 Color',
          'name'  => 'ent-he2-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '5bb20q2',
          'label' => 'Blog Heading 2 Font',
          'name'  => 'ent-be2-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bb20q3',
          'label' => 'Blog Heading 2 Color',
          'name'  => 'ent-be2-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        // Heading 3
        array (
          'key'   => $this->slug . '5bW30q2',
          'label' => 'Heading 3 Font',
          'name'  => 'ent-he3-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bW30q3',
          'label' => 'Heading 3 Color',
          'name'  => 'ent-he3-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => $this->slug . '5bb30q2',
          'label' => 'Blog Heading 3 Font',
          'name'  => 'ent-be3-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bb30q3',
          'label' => 'Blog Heading 3 Color',
          'name'  => 'ent-be3-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        // Heading 4
        array (
          'key'   => $this->slug . '5bW40q2',
          'label' => 'Heading 4 Font',
          'name'  => 'ent-he4-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bW40q3',
          'label' => 'Heading 4 Color',
          'name'  => 'ent-he4-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        // Heading 5
        array (
          'key'   => $this->slug . '5bW50q2',
          'label' => 'Heading 5 Font',
          'name'  => 'ent-he5-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bW50q3',
          'label' => 'Heading 5 Color',
          'name'  => 'ent-he5-col',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        // Heading 6
        array (
          'key'   => $this->slug . '5bW60q2',
          'label' => 'Heading 6 Font',
          'name'  => 'ent-he6-fon',
          'type'     => 'typography',
          'required' => 0,
          'show_font_familys'   => 1,
          'show_font_size'      => 1,
          'font_size'           => 16,
          'show_line_height'    => 0,
          'show_font_weight'    => 0,
          'show_backup_font'    => 0,
          'show_text_align'     => 0,
          'show_text_direction' => 0,
          'show_letter_spacing' => 0,
          'show_color_picker'   => 0,
          'show_font_style'     => 0,
          'show_preview_text'   => 0,
        ),
        array (
          'key'   => $this->slug . '5bW60q3',
          'label' => 'Heading 6 Color',
          'name'  => 'ent-he6-col',
          'type'  => 'rgba_color',
          'required' => 0,
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

				$css .= '<style type="text/css">';


				$css .= '</style>';

			}
		} else {
			$css .= "<!-- There are not styles for this style group. -->";
		}

		return $css;
	}

}

new Typography( 'Typography', 1, true );
