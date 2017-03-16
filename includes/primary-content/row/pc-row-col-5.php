<?php

	$tour_column_classes .= ' pc--r__col-5';
	
	$thumb_width = 400;
	$thumb_width_normal = 400;
	$thumb_height = 400;
	$thumb_height_normal = 400;
	$thumb_upload = 'pc-medium';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_slides = get_sub_field( 'tour_pc-scroll-slides' );
		$scroll_slides_str = $scroll_slides ? $scroll_slides : 5;

		$scroll_data = "data-slick='{
			\"adaptiveHeight\": true, 
			\"slidesToShow\": 5, 
			\"slidesToScroll\": {$scroll_slides_str},
			\"responsive\" : [{
				\"breakpoint\": 1150,
				\"settings\": {
					\"slidesToShow\": 4,
					\"slidesToScroll\": 4,
				}
			},{
				\"breakpoint\": 992,
				\"settings\": {
	        		\"slidesToShow\": 3,
					\"slidesToScroll\": 3,
	      		}
	    	},{
	      		\"breakpoint\": 868,
	      		\"settings\": {
	        		\"slidesToShow\": 2,
					\"slidesToScroll\": 2,
	      		}
	    	},{
	      		\"breakpoint\": 678,
	      		\"settings\": {
        			\"slidesToShow\": 1,
					\"slidesToScroll\": 1,
	      		}
	    	}] 
	    }'";
	}

?>