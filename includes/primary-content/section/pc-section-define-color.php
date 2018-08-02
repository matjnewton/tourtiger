<?php 

	$tour_section_bg_color = get_sub_field( 'tour_pc-bg__select-color' );
	$tour_section_classes .= ' pc--s__color';

    if ( $tour_section_bg_color ) {
    	$tour_section_styles .= ' background-color: ' . $tour_section_bg_color . ';';
    } else {
    	$tour_section_classes .= ' pc--s__color_empty';
    }

?>