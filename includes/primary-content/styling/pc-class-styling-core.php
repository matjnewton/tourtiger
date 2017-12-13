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
			'layout' => 'row',
			'button_label' => 'Add Row',
			'sub_fields' => array(

        array (
          'key' => 'fc_' . $i . '_iI_67403',
          'label' => 'Base Wrapper Box-shadow',
          'name' => 'base-wrapper-bs',
          'type' => 'true_false',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_58312',
          'label' => 'Base Wrapper',
          'name' => 'base-wrapper-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_49214',
          'label' => 'Above Header Area',
          'name' => 'above-header-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_48305',
          'label' => 'Header',
          'name' => 'header-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_3z396',
          'label' => 'Secondary menu',
          'name' => 'secondary-menu-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_3z396',
          'label' => 'Submenu item',
          'name' => 'sub-menu-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_2x487',
          'label' => 'CTA Button',
          'name' => 'cta-button-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_3c578',
          'label' => 'Secondary Bar',
          'name' => 'se-bar-wrapper-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_5v669',
          'label' => 'Secondary Submenu',
          'name' => 'se-sub-menu-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_5v669',
          'label' => 'Mobile Toggle button',
          'name' => 'mob-tog-btn-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_6b750',
          'label' => 'Mobile Toggle button hover',
          'name' => 'mob-tog-btn-bg-h',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_7n851',
          'label' => 'Hero CTA Button',
          'name' => 'hero-cta-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_8m942',
          'label' => 'Hero CTA Button fill',
          'name' => 'hero-cta-fill',
          'type' => 'true_false',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_7n851',
          'label' => 'Content CTA Button',
          'name' => 'hero-cta-content-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_8a033',
          'label' => 'Hero Image Tint',
          'name' => 'hero-image-tint',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_9s124',
          'label' => 'Hero Title',
          'name' => 'hero-title-bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_0d215',
          'label' => 'Hero Content',
          'name'  => 'hero-content-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_0d215',
          'label' => 'Point of Difference Background on Front page',
          'name'  => 'point-of-diff-bg-fe',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_1f306',
          'label' => 'Secondary Menu Background on Tour pages',
          'name'  => 'se-menu-bg-tp',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_2g497',
          'label' => 'Button background',
          'name'  => 'btn-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_3h588',
          'label' => 'Button background fill',
          'name'  => 'btn-fill',
          'type'  => 'true_false',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_3h579',
          'label' => 'Elements accent',
          'name'  => 'el-accent-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_3h150',
          'label' => 'Content Area',
          'name'  => 'content-area-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_4j241',
          'label' => 'Content Containers',
          'name'  => 'content-containers-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_5k132',
          'label' => 'Featured Area Container Background',
          'name'  => 'featured-area-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_6l223',
          'label' => 'Featured Area Container Box-shadow',
          'name'  => 'featured-area-bs',
          'type'  => 'true_false',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6l214',
          'label' => 'Tile image tint',
          'name'  => 'tile-image-tint',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6l215',
          'label' => 'CTA Container',
          'name'  => 'cta-container-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_6q306',
          'label' => 'Subscribe Container',
          'name'  => 'subscribe-container-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6q397',
          'label' => 'Trip list item',
          'name'  => 'trip-list-item-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_7w488',
          'label' => 'Fluid Box Background-Color Variation-1',
          'name'  => 'fl-box-bg-1',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_7w579',
          'label' => 'Fluid Box Background-Color Variation-2',
          'name'  => 'fl-box-bg-2',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_7w560',
          'label' => 'Trip Link Button',
          'name'  => 'trip-link-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_7w551',
          'label' => 'Footer background',
          'name'  => 'footer-bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        /**
         * @todo: check that group and proceed typography implementation
         */
        array(
          'key'   => 'fc_' . $i . '_fI_7w579',
          'label' => 'Default text',
          'name'  => 'default-text',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_fI_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_fI_7w501',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_fI_7w660',
          'label' => 'Default link text',
          'name'  => 'default-link-text',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_11_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f1_7w501',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f4_7w661',
          'label' => 'Hero area title',
          'name'  => 'ha-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_14_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f4_7w501',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f5_7w661',
          'label' => 'Hero area content',
          'name'  => 'ha-content',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_15_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f5_7w501',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f5_7w660',
          'label' => 'Hero area CTA button',
          'name'  => 'ha-cta',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_15_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f5_7w501',
              'label' => 'Color hover',
              'name'  => 'color-hover',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f5_7w502',
              'label' => 'Color hover',
              'name'  => 'color-border',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f6_7w660',
          'label' => 'Featured title',
          'name'  => 'featured-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_16_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f6_7w502',
              'label' => 'Color bg',
              'name'  => 'color-bg',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f6_7w503',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f7_7w660',
          'label' => 'Featured tile title',
          'name'  => 'featured-tile-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_17_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f7_7w502',
              'label' => 'Color active',
              'name'  => 'color-active',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f7_7w503',
              'label' => 'Color hover',
              'name'  => 'color-hover',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f8_7w660',
          'label' => 'Featured front-3 title',
          'name'  => 'featured-front-3-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_18_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_f8_7w502',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_f9_7w660',
          'label' => 'Featured content',
          'name'  => 'featured-front-3-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'   => 'fc_' . $i . '_f9_7w502',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_z0_7w660',
          'label' => 'Featured button',
          'name'  => 'featured-button',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_z0_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_z0_7w502',
              'label' => 'Color hover',
              'name'  => 'color-hover',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_z1_7w660',
          'label' => 'Featured Front-3 button',
          'name'  => 'featured-front-3-button',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_z1_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_z2_7w660',
          'label' => 'Featured tour links heading',
          'name'  => 'featured-tour-links-heading',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_z2_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_z2_7w502',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_z3_7w660',
          'label' => 'Featured tour link title',
          'name'  => 'featured-tour-link-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_z3_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_z3_7w502',
              'label' => 'Color',
              'name'  => 'color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_t1_7w660',
          'label' => 'Testimonials title',
          'name'  => 'test-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_t1_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_t1_7w502',
              'label' => 'Line Color',
              'name'  => 'line-color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_t2_7w660',
          'label' => 'Testimonials tile title',
          'name'  => 'test-tile-title',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_t2_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_t2_7w502',
              'label' => 'Line Color',
              'name'  => 'line-color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
          )
        ),

        array(
          'key'   => 'fc_' . $i . '_t3_7w660',
          'label' => 'Testimonials content',
          'name'  => 'test-content',
          'type'  => 'group',
          'required'  => 0,
          'layout'    => 'block',
          'sub_fields' => array(
            array (
              'key'      => 'fc_' . $i . '_t3_7w510',
              'label'    => 'Font',
              'name'     => 'font',
              'type'     => 'typography',
              'required' => 0,
              'font_size'           => 16,
              'show_font_weight'    => 0,
              'show_backup_font'    => 0,
              'show_text_align'     => 0,
              'show_text_direction' => 0,
              'show_line_height'    => 0,
              'show_letter_spacing' => 0,
              'show_color_picker'   => 0,
              'show_font_style'     => 0,
              'show_preview_text'   => 0,
            ),
            array (
              'key'   => 'fc_' . $i . '_t3_7w502',
              'label' => 'Line Color',
              'name'  => 'line-color',
              'type'  => 'rgba_color',
              'required' => 0,
            ),
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
