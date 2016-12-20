<?php

	$tour_column_classes .= ' pc--r__col-5';
	
	$thumb_width = 400;
	$thumb_height = 400;
	$thumb_height_normal = 400;
	$thumb_upload = 'pc-medium';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 5, "responsive" : [{
	      "breakpoint": 1150,
	      "settings": {
	        "slidesToShow": 4
	      }
	    },{
	      "breakpoint": 992,
	      "settings": {
	        "slidesToShow": 3
	      }
	    },{
	      "breakpoint": 868,
	      "settings": {
	        "slidesToShow": 2
	      }
	    },{
	      "breakpoint": 678,
	      "settings": {
	        "slidesToShow": 1
	      }
	    }] }\'';
	}

?>