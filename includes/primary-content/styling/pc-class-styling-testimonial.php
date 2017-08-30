<?php
/* ===========================
 * Testimonial Page Class Extend
 * ======================== */
 
class Testimonial extends StylingCard {

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
					'key' => $this->slug . '_' . $i . '_pfntspam',
					'label' => 'Fonts',
					'name' => 'Quotetab',
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
					'key' => $this->slug . $i . '_Quote',
					'label' => 'Quote font',
					'name' => 'quote',
					'type' => 'typography',
					'show_font_familys' => 1,
					'font-family' => 'Roboto',
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
					'show_color_picker' => 0,
					'text_color' => '',

					'show_font_style' => 1,
					'show_preview_text' => 0,
					'font_style' => 'normal',
				),
				array (
					'key' => $this->slug . $i . '_Quotex',
					'label' => 'Quote Color',
					'name' => 'quote_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0, 0, 0, 1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),

				array (
					'key' => $this->slug . $i . '_Excerptde',
					'label' => 'Excerpt',
					'name' => 'excerpt',
					'type' => 'typography',
					'show_font_familys' => 1,
					'font-family' => 'Roboto',
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
					'show_color_picker' => 0,
					'text_color' => '',

					'show_font_style' => 1,
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . '_Excerptdec',
					'label' => 'Excerpt Color',
					'name' => 'excerpt_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0, 0, 0, 1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),

				array (
					'key' => $this->slug . $i . 'Fullrpe',
					'label' => 'Full testimonial',
					'name' => 'full',
					'type' => 'typography',
					'show_font_familys' => 1,
					'font-family' => 'Roboto',
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
					'show_color_picker' => 0,
					'text_color' => '',
					'show_font_style' => 1,
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . 'Fucllrpe',
					'label' => 'Full testimonial Color',
					'name' => 'full_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0, 0, 0, 1)',
					'return_value' => 0,
					'ext_value' => array (
					),
				),

				array (
					'key' => $this->slug . $i . 'aythorlrpe',
					'label' => 'Author',
					'name' => 'author',
					'type' => 'typography',
					'show_font_familys' => 1,
					'font-family' => 'Roboto',
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
					'show_color_picker' => 0,
					'text_color' => '',
					'show_font_style' => 1,
					'show_preview_text' => 0,
				),
				array (
					'key' => $this->slug . $i . 'authorc',
					'label' => 'Author Color',
					'name' => 'author_color',
					'type' => 'rgba_color',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'rgba' => 'rgba(0, 0, 0, 1)',
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

		if ( have_rows( $style, 'option' ) ) {
			while ( have_rows( $style, 'option' ) ) {
				the_row();

				$css .= '<style>';

				$font = pc_init_font_css( get_sub_field( 'quote' ) );
				$css .= $font[0] ? $font[0]:'';

				if ( $font ) {
					$css .= "body.{$style} .dz-testimonial__quote {";

						$css .= $font[1] ? $font[1]:'';
						$css .= get_sub_field( 'quote_color' ) ? 'color:' . get_sub_field( 'quote_color' ) . ';':'';

					$css .= '}';
				}

				$font = pc_init_font_css( get_sub_field( 'excerpt' ) );
				$css .= $font[0] ? $font[0]:'';

				if ( $font ) {
					$css .= "body.{$style} .dz-testimonial__excerpt {";

						$css .= $font[1] ? $font[1]:'';
						$css .= get_sub_field( 'excerpt_color' ) ? 'color:' . get_sub_field( 'excerpt_color' ) . ';':'';

					$css .= '}';
				}

				$font = pc_init_font_css( get_sub_field( 'full' ) );
				$css .= $font[0] ? $font[0]:'';

				if ( $font ) {
					$css .= "body.{$style} body .site-inner .content .dz-testimonial__full > *, body.{$style} body .site-inner .content .dz-testimonial__full > p, body.{$style} body .site-inner .content .dz-testimonial__full {";

						$css .= $font[1] ? $font[1]:'';
						$css .= get_sub_field( 'full_color' ) ? 'color:' . get_sub_field( 'full_color' ) . '!important;':'';

					$css .= '}';
				}

				$font = pc_init_font_css( get_sub_field( 'author' ) );
				$css .= $font[0] ? $font[0]:'';

				if ( $font ) {
					$css .= "body.{$style} .t-author .rate-about a.dz-testimonial__author, body.{$style} .site-inner .archive-pagination li.active a {";

						$css .= $font[1] ? $font[1]:'';
						$css .= get_sub_field( 'author_color' ) ? 'color:' . get_sub_field( 'author_color' ) . ';':'';

					$css .= '}';
				}

				$css .= '</style>';

			}
		} else {
			$css .= "<!-- There are not styles for this style group. -->";
		}

		return $css;
	}
	
}

new Testimonial( 'Testimonial', 1 );

?>