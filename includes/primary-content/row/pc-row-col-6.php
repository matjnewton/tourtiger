<?php

	$tour_column_classes .= ' pc--r__col-6';
	
	$thumb_width = 230;
	$thumb_width_normal = 230;
	$thumb_height = 230;
	$thumb_height_normal = 230;
	$thumb_upload = 'medium';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 6, "responsive" : [{
	      "breakpoint": 1150,
	      "settings": {
	        "slidesToShow": 5
	      }
	    },{
	      "breakpoint": 992,
	      "settings": {
	        "slidesToShow": 4
	      }
	    },{
	      "breakpoint": 868,
	      "settings": {
	        "slidesToShow": 3
	      }
	    },{
	      "breakpoint": 678,
	      "settings": {
	        "slidesToShow": 1
	      }
	    }] }\'';
	}

?>