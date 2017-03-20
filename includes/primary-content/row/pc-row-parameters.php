<?php
	$tour_row_styles = '';
	$tour_column_classes = 'pc--r ' . get_sub_field( 'tour_pc-arrow-type' );
	$tour_column_classes .= ' ' . get_sub_field( 'tour_pc-arrows-weight' ); 
	$tour_column_classes .= ' ' . get_sub_field( 'tour_pc-arrows-position' ); 
	$tour_column_classes .= ' ' . get_sub_field( 'tour_pc-arrows-size' );
	$pc_arrow_color = get_sub_field( 'tour_pc-arrows-color' ) ? get_sub_field( 'tour_pc-arrows-color' ) : '#fff'; 
	$tour_row_styles .= "color: {$pc_arrow_color};";

	$tour_row_type = get_sub_field( 'tour_pc-rowtype' ) ;
	$scroll_data = '';
				
	$tour_column_wrap = get_sub_field( 'tour_pc-colums--wrap' );

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

	if ( get_sub_field( 'tour_pc-colums--margin' ) == 'none' ) {
		$tour_column_classes .= ' pc--r__mar-none';
	} elseif ( get_sub_field( 'tour_pc-colums--margin' ) == 'normal' ) {
		$tour_column_classes .= ' pc--r__mar-normal';
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