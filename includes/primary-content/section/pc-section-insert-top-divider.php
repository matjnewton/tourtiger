<?php 
	if ( $tour_section_td_select == 'repeater' ) {
		$tour_section_td_e = 'background: url(' . $tour_section_td_repeater . ') center center repeat;';
	} elseif ( $tour_section_td_select == 'image' ) {
		$tour_section_td_e = 'background: url(' . $tour_section_td_image . ') center center no-repeat; background-size: contain;';
	}
?>

<div class="pc--s__top-divider" style="<?php echo $tour_section_td_e; ?>"></div>