<?php 

	$tour_section_td_repeater = '';
	$tour_section_td_image = '';
	$tour_section_td_class = 'pc_divider pc_divider__top';
	
	if ( get_sub_field( 'tour_pc-td--select' ) == 'repeater' ) {
		$tour_section_td_repeater = get_sub_field( 'tour_pc-td--select__repeater' );

		$tour_section_classes .= ' pc--s__td_repeater pc--s__divider_repeater';

		if ( !$tour_section_td_repeater ) {
			$tour_section_classes .= ' pc--s__td_repeater_empty';
		}
	} elseif ( get_sub_field( 'tour_pc-td--select' ) == 'image' ) {
		$tour_section_td_image = get_sub_field( 'tour_pc-td--select__image' );

		$tour_section_classes .= ' pc--s__td_image';

		if ( !$tour_section_td_image ) {
			$tour_section_classes .= ' pc--s__td_repeater_empty';
		}
	}

?>