<?php

if ( get_sub_field( 'tour_pc-td--select' ) == 'repeater' ) {
	echo '<div class="' . $tour_section_td_class . ' js-divider" data-bg="';
	echo get_sub_field( 'tour_pc-td--select__repeater' );
	echo '"></div>';
} elseif ( get_sub_field( 'tour_pc-td--select' ) == 'image' ) {
	echo '<img class="' . $tour_section_td_class . '" ';
	echo 'src="' . get_sub_field( 'tour_pc-td--select__image' ) . '" ';
	echo 'alt="" />';
} elseif ( get_sub_field( 'tour_pc-td--select' ) == 'line' ) {
	echo '<hr class="pc_top-divider" style="border-top:' . get_sub_field( 'tour_pc-td--line-thickness' ) . 'px solid ' . get_sub_field( 'tour_pc-td--line-color' ) . '" />';
}

?>