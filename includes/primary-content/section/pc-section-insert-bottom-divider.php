<?php 
	if ( $tour_section_bd_select == 'repeater' ) {
		$tour_section_bd_e = 'background: url(' . $tour_section_bd_repeater . ') center center repeat;';
	} elseif ( $tour_section_bd_select == 'image' ) {
		$tour_section_bd_e = 'background: url(' . $tour_section_bd_image . ') center center no-repeat; background-size: contain;';
	}
?>

<div class="pc--s__bottom-divider" style="<?php echo $tour_section_bd_e; ?>"></div>