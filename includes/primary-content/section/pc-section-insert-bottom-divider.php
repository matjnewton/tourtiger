<?php

if ( get_sub_field( 'tour_pc-bd--select' ) == 'repeater' ) {
	echo '<div class="' . $tour_section_bd_class . ' js-divider" ';
	echo 'style="background: url(' . get_sub_field( 'tour_pc-bd--select__repeater' ) . ');';
	echo '"></div>';
} elseif ( get_sub_field( 'tour_pc-bd--select' ) == 'image' ) {
	echo '<img class="' . $tour_section_bd_class . '" ';
	echo 'src="' . get_sub_field( 'tour_pc-bd--select__image' ) . '" ';
	echo 'alt="" />';
}

?>