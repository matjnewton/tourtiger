<?php 

	$tour_section_classes .= ' pc--s__map ';
	$bg_map_count = 1;

    if ( get_sub_field( 'tour_pc-bg__select-map' ) ) {
    	$tour_section_classes .= ' pc--s__map_active';
    } else {
    	$tour_section_classes .= ' pc--s__map_empty';
    }

?>
