<?php

	$tour_column_classes .= ' pc--r__col-2 pc--r__col-2__ratio-' . get_sub_field( 'tour_pc-colums--ratio' );

	$thumb_width = 900;
	$thumb_width_normal = 900;
	$thumb_height = 900;
	$thumb_height_normal = 900;
	$thumb_upload = 'pc-middle';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_slides = get_sub_field( 'tour_pc-scroll-slides' );
		$scroll_slides_str = $scroll_slides ? $scroll_slides : 2;

		$scroll_data = "data-slick='{
			\"adaptiveHeight\": true, 
			\"slidesToShow\": 2, 
			\"prevArrow\": {$arrow_prev}, 
			\"nextArrow\": {$arrow_next},
			\"slidesToScroll\": {$scroll_slides_str},
			\"responsive\" : [{
				\"breakpoint\": 992,
				\"settings\": {
					\"slidesToShow\": 1,
					\"slidesToScroll\": 1
				}
	    	}]
	    }'";
	}

?>