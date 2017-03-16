<?php

	$tour_column_classes .= ' pc--r__col-3';
	
	$thumb_width = 600;
	$thumb_height = 600;
	$thumb_height_normal = 800;
	$thumb_upload = 'pc-medium';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_slides = get_sub_field( 'tour_pc-scroll-slides' );
		$scroll_slides_str = $scroll_slides ? $scroll_slides : 3;

		$scroll_data = "data-slick='{
			\"adaptiveHeight\": true, 
			\"slidesToShow\": 3, 
			\"slidesToScroll\": {$scroll_slides_str},
			\"responsive\" : [{
				\"breakpoint\": 992,
				\"settings\": {
	        		\"slidesToShow\": 2,
					\"slidesToScroll\": 2
	      		}
    		},{
				\"breakpoint\": 868,
				\"settings\": {
	        		\"slidesToShow\": 1,
					\"slidesToScroll\": 1
				}
	    	}] 
	    }'";
}

?>