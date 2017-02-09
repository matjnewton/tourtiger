<?php 

	$tour_section_bd_repeater = '';
	$tour_section_bd_image = '';
	$tour_section_bd_class = 'pc_divider pc_divider__bottom js-divider';

	if ( get_sub_field( 'tour_pc-td--select' ) == 'repeater' ) {
		$tour_section_bd_repeater = get_sub_field( 'tour_pc-bd--select__repeater' );

		$tour_section_classes .= ' pc--s__bd_repeater pc--s__divider_repeater';

		if ( !$tour_section_bd_repeater ) {
			$tour_section_classes .= ' pc--s__bd_repeater_empty';
		}
	} elseif ( get_sub_field( 'tour_pc-td--select' ) == 'image' ) {
		$tour_section_bd_image = get_sub_field( 'tour_pc-bd--select__image' );

		$tour_section_classes .= ' pc--s__bd_image';

		if ( !$tour_section_bd_image ) {
			$tour_section_classes .= ' pc--s__bd_repeater_empty';
		}
	}

?>