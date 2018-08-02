<?php 

	$tour_section_bg_texture = get_sub_field( 'tour_pc-bg__select-texture--image' );
	$tour_section_classes .= ' pc--s__texture';

    if ( $tour_section_bg_texture ) {
    	$tour_section_styles .= ' background: url(' . $tour_section_bg_texture . ') center center;';
    } else {
    	$tour_section_classes .= ' pc--s__texture_empty';
    }

?>