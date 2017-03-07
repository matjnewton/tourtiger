<?php

	$tour_column_classes .= ' pc--r__bg-texture';

	if ( get_sub_field( 'tour_pc-rowtype--bg_texture' ) ) {
		$tour_row_styles .= ' background-image: url(' . get_sub_field( 'tour_pc-rowtype--bg_texture' ) . ');';
	} else {
		$tour_column_classes .= ' pc--r__bg-texture_empty';
	}

?>