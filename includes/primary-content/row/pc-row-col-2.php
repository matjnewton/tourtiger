<?php

	$tour_column_classes .= ' pc--r__col-2 pc--r__col-2__ratio-' . get_sub_field( 'tour_pc-colums--ratio' );

	$thumb_width = 600;
	$thumb_height = 700;
	$thumb_height_normal = 500;
	$thumb_upload = 'pc-medium';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 2, "responsive" : [{
	      "breakpoint": 992,
	      "settings": {
	        "slidesToShow": 1
	      }
	    }] }\'';
	}

?>