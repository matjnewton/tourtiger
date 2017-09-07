<?php

	$tour_column_classes .= ' pc--r__col-6';
	
	$thumb_width = 230;
	$thumb_width_normal = 230;
	$thumb_height = 230;
	$thumb_height_normal = 230;
	$thumb_upload = 'pc-small';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_slides = get_sub_field( 'tour_pc-scroll-slides' );
		$scroll_slides_str = $scroll_slides ? $scroll_slides : 6;

		$scroll_data = "data-slick='{
			\"adaptiveHeight\": true, 
			\"slidesToShow\": 6, 
			\"prevArrow\": {$arrow_prev}, 
			\"nextArrow\": {$arrow_next},
			\"slidesToShow\": {$scroll_slides_str},
			\"responsive\" : [{
	      		\"breakpoint\": 1150,
	      		\"settings\": {
	        		'slidesToShow': 5,
					'slidesToScroll': 5
	      		}
    		},{
	      		\"breakpoint\": 992,
	      		\"settings\": {
	        		\"slidesToShow\": 4,
					\"slidesToScroll\": 4
	      		}
	    	},{
	      		\"breakpoint\": 868,
	      		\"settings\": {
	        		\"slidesToShow\": 3,
					\"slidesToScroll\": 3
	      		}
	    	},{
	      		\"breakpoint\": 678,
	      		\"settings\": {
	        		\"slidesToShow\": 1,
					\"slidesToScroll\": 1
	      		}
	    	}] 
	    }'";
	}

?>