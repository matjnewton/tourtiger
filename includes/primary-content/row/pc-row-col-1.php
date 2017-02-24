<?php

	$tour_column_classes .= ' pc--r__col-1 pc--r__col-1_' . get_sub_field( 'tour_pc-colums--align' ) . ' pc--r__col-1_element-' . get_sub_field( 'tour_pc-colums--align-element' );

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 1}\'';
	}

	if ( get_sub_field( 'tour_pc-colums--width' ) == 'full' ) {
		$tour_column_classes .= ' pc--r__col-1_full';
		$thumb_width = 1500;
		$thumb_height = 900; 
		$thumb_height_normal = 900; 
		$thumb_upload = 'full';
	} else {
		$tour_column_classes .= ' pc--r__col-1_part';
		$thumb_width = 1100;
		$thumb_height = 700;
		$thumb_height_normal = 700;
		$thumb_upload = 'large';
	} 

?>