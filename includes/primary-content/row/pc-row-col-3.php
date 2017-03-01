<?php

	$tour_column_classes .= ' pc--r__col-3';
	
	$thumb_width = 800;
	$thumb_height = 800;
	$thumb_height_normal = 800;
	$thumb_upload = 'pc-medium';

	if ( $tour_column_wrap == 'scroll' ) {
		$scroll_data = 'data-slick=\'{"adaptiveHeight": true, "slidesToShow": 3, "responsive" : [{
	      "breakpoint": 992,
	      "settings": {
	        "slidesToShow": 2
	      }
	    },{
	      "breakpoint": 868,
	      "settings": {
	        "slidesToShow": 1
	      }
	    }] }\'';
}

?>