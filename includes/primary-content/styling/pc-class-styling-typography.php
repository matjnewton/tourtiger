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

new Typography( 'Typography', 1, true );
