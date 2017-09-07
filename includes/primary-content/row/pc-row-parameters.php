<?php
	$tour_row_styles = '';
	$tour_column_classes = 'pc--r ';

	$tour_row_type = get_sub_field( 'tour_pc-rowtype' ) ;
	$scroll_data = '';

	$row_width = get_sub_field( 'tour_pc-colums--width' );

	if ( $row_width == 'four-five' ) : 
		$tour_column_classes .= ' pc--r__four-five';
	elseif ( $row_width == 'three-four' ) : 
		$tour_column_classes .= ' pc--r__three-four';
	elseif ( $row_width == 'one-two' ) : 
		$tour_column_classes .= ' pc--r__one-two';
	elseif ( $row_width == 'full' ) :
		$tour_column_classes .= ' pc--r__full';
	endif;
				
	$tour_column_wrap      = get_sub_field( 'tour_pc-colums--wrap' );
	$tour_column_alignment = get_sub_field( 'tour_pc-colums--alignment' );

	if ( get_sub_field( 'tour_pc-rowtype--bg' ) == 'texture' ) {
		include( PCA_DIR . '/row/pc-row-bg-texture.php' );
	} elseif ( get_sub_field( 'tour_pc-rowtype--bg' ) == 'color' ) {
		include( PCA_DIR . '/row/pc-row-bg-color.php' );
	}

	/**
	 * Arrow settings
	 */
	$arrow_type     = get_sub_field( 'tour_pc-arrow-type' );
	$arrow_settings = '';
	$arrow_prev     = '<div class="pc__c--arrow-p"><img width="20" src="'.get_stylesheet_directory_uri().'/includes/primary-content/assets/img/slider/arrow-left.png" /></div>';
	$arrow_next     = '<div class="pc__c--arrow-n"><img width="20" src="'.get_stylesheet_directory_uri().'/includes/primary-content/assets/img/slider/arrow-right.png" /></div>';

	if ( $arrow_type == 'pc-custom-arrow' ) :
		$tour_column_classes  = $arrow_type;

		$d                    = array();
		$d['arrows_size']     = get_sub_field( 'tour_pc-arrows-size' ); 
		$d['arrows_weight']   = get_sub_field( 'tour_pc-arrows-weight' ); 
		$d['arrows_position'] = get_sub_field( 'tour_pc-arrows-position' ); 
		$d['arrows_color']    = get_sub_field( 'tour_pc-arrows-color' ); 

		$arrow_classes        = '';
		$arrow_classes       .= 'arrows_size_' . $d['arrows_size'];
		$arrow_classes       .= 'arrows_weight_' . $d['arrows_weight'];
		$arrow_classes       .= 'arrows_position_' . $d['arrows_position'];
		$arrow_settings       = "style='color:{$d['arrows_color']};'";

		$arrow_prev           = "<div class='pc__c--arrow-p'><a href='javascript:' {$arrow_settings} class='{$arrow_classes}'></a></div>";      
		$arrow_next           = "<div class='pc__c--arrow-n'><a href='javascript:' {$arrow_settings} class='{$arrow_classes}'></a></div>";
	endif;


	include( PCA_DIR . '/row/pc-row-col-' . get_sub_field( 'tour_pc-colums--count' ) . '.php' );

	if ( $tour_column_wrap == 'wrap' ) {
		$tour_column_classes .= ' pc--r__wrap';
	} elseif ( $tour_column_wrap == 'scroll' ) {
		$tour_column_classes .= ' pc--r__scroll js-new-slider';
	}

	if ( $tour_column_wrap == 'wrap' ) 
		$tour_column_classes .= ' pc--r__alignment--' . $tour_column_alignment;

	if ( get_sub_field( 'tour_pc-colums--margin' ) == 'none' ) {
		$tour_column_classes .= ' pc--r__mar-none';
		$include_margins = false;
	} elseif ( get_sub_field( 'tour_pc-colums--margin' ) == 'normal' ) {
		$tour_column_classes .= ' pc--r__mar-normal';
		$include_margins = true;
	}

	if ( get_sub_field( 'tour_pc-colums--position' ) == 'top' ) {
		$tour_column_classes .= ' pc--r_pos-top';
	} elseif ( get_sub_field( 'tour_pc-colums--position' ) == 'middle' ) {
		$tour_column_classes .= ' pc--r_pos-middle';
	} elseif ( get_sub_field( 'tour_pc-colums--position' ) == 'bottom' ) {
		$tour_column_classes .= ' pc--r_pos-bottom';
	} else {
		$tour_column_classes .= ' pc--r_pos-stretch';
	}
?>