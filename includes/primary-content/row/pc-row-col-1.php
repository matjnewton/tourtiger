<?php

	$tour_column_classes .= get_sub_field( 'tour_pc-arrow-type' ) ? ' ' . get_sub_field( 'tour_pc-arrow-type' ) : '';
	$tour_column_classes .= get_sub_field( 'tour_pc-arrows-weight' ) ? ' ' . get_sub_field( 'tour_pc-arrows-weight' ) : ''; 
	$tour_column_classes .= get_sub_field( 'tour_pc-arrows-position' ) ? ' ' . get_sub_field( 'tour_pc-arrows-position' ) : ''; 
	$tour_column_classes .= get_sub_field( 'tour_pc-arrows-size' ) ? ' ' . get_sub_field( 'tour_pc-arrows-size' ) : '';
	$pc_arrow_color = get_sub_field( 'tour_pc-arrows-color' ) ? get_sub_field( 'tour_pc-arrows-color' ) : '#fff'; 
	$tour_row_styles .= "color: {$pc_arrow_color};";

	$tour_column_classes .= ' pc--r__col-1 pc--r__col-1_' . get_sub_field( 'tour_pc-colums--align' ) . ' pc--r__col-1_element-' . get_sub_field( 'tour_pc-colums--align-element' );

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 1}\'';
	}

	if ( $row_width == 'full' ) {
		$thumb_width = 1500;
		$thumb_width_normal = 1500;
		$thumb_height = 900; 
		$thumb_height_normal = 900; 
		$thumb_upload = 'full';
	} else {
		$thumb_width = 1100;
		$thumb_width_normal = 1100;
		$thumb_height = 700;
		$thumb_height_normal = 700;
		$thumb_upload = 'large';
	} 



?>