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

	$arrow_type = get_sub_field( 'tour_pc-arrow-type' );

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