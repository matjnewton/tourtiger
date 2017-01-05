<?php 
	if ( get_sub_field( 'tour_pc-bd--select' ) == 'repeater' ) {
		$tour_section_bd_e = 'background: url(' . get_sub_field( 'tour_pc-bd--select__repeater' ) . ') center center repeat;';
	} elseif ( get_sub_field( 'tour_pc-bd--select' ) == 'image' ) {
		$tour_section_bd_e = 'background: url(' . get_sub_field( 'tour_pc-bd--select__image' ) . ') center center no-repeat; background-size: contain;';
	}
?>

<div class="pc--s__bottom-divider" style="<?php echo $tour_section_bd_e; ?>"></div>