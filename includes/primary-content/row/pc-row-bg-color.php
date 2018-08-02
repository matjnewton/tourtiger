<?php

	$tour_column_classes .= ' pc--r__bg-color';

	if ( get_sub_field( 'tour_pc-rowtype--bg_color' ) ) {
		$tour_row_styles .= ' background-color: ' . get_sub_field( 'tour_pc-rowtype--bg_color' ) . ';';
	} else {
		$tour_column_classes .= ' pc--r__bg-color_empty';
	}

?>