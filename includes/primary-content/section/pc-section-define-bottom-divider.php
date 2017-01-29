<?php 

	$tour_section_bd_repeater = '';
	$tour_section_bd_image = '';

	$tour_section_classes .= ' pc--s__bottom-divider_' . get_sub_field( 'tour_pc-bd--cover' );

	if ( $tour_section_bd_select == 'repeater' ) {
		$tour_section_bd_repeater = get_sub_field( 'tour_pc-bd--select__repeater' );

		$tour_section_classes .= ' pc--s__bd_repeater';

		if ( !$tour_section_bd_repeater ) {
			$tour_section_classes .= ' pc--s__bd_repeater_empty';
		}
	} elseif ( $tour_section_bd_select == 'image' ) {
		$tour_section_bd_image = get_sub_field( 'tour_pc-bd--select__image' );

		$tour_section_classes .= ' pc--s__bd_image';

		if ( !$tour_section_bd_image ) {
			$tour_section_classes .= ' pc--s__bd_repeater_empty';
		}
	}

?>