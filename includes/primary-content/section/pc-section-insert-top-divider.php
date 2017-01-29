<?php 
	if ( get_sub_field( 'tour_pc-td--select' ) == 'repeater' ) {
		$tour_section_td_e = 'background: url(' . get_sub_field( 'tour_pc-td--select__repeater' ) . ') center center repeat;';
	} elseif ( get_sub_field( 'tour_pc-td--select' ) == 'image' ) {
		$tour_section_td_e = 'background: url(' . get_sub_field( 'tour_pc-td--select__image' ) . ') center center no-repeat; background-size: contain;';
	}

	$tour_section_td_e .= get_sub_field( 'tour_pc-td--height' ) ? 'height:' . get_sub_field( 'tour_pc-td--height' ) . 'px;' : 'height: 10px;';
?>

<div class="pc--s__top-divider" style="<?php echo $tour_section_td_e; ?>"></div>