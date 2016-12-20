<?php

	$tour_column_classes .= ' pc--r__col-1';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 1}\'';
	}

	if ( get_sub_field( 'tour_pc-colums--width' ) == 'full' ) {
		$tour_column_classes .= ' pc--r__col-1_full';
		$thumb_width = 1500;
		$thumb_height = 900; 
		$thumb_height_normal = 900; 
		$thumb_upload = 'full';
	} elseif ( get_sub_field( 'tour_pc-colums--width' ) == 'three-four' ) {
		$tour_column_classes .= ' pc--r__col-1_part';
		$thumb_width = 1100;
		$thumb_height = 700;
		$thumb_height_normal = 700;
		$thumb_upload = 'large';
	} elseif ( get_sub_field( 'tour_pc-colums--width' ) == 'one-two' ) {
		$tour_column_classes .= ' pc--r__col-1_half';
		$thumb_width = 800;
		$thumb_height = 600;
		$thumb_height_normal = 600;
		$thumb_upload = 'large';
	}

	if ( get_sub_field( 'tour_pc-colums--align' ) == 'left' ) {

		$tour_column_classes .= ' pc--r__col-1_left';

	} elseif ( get_sub_field( 'tour_pc-colums--align' ) == 'center' ) {

		$tour_column_classes .= ' pc--r__col-1_center';

	} elseif ( get_sub_field( 'tour_pc-colums--align' ) == 'right' ) {

		$tour_column_classes .= ' pc--r__col-1_right';

	}

?>