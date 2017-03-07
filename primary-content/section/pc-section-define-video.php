<?php 

	$tour_section_bg_video_poster = get_sub_field( 'tour_pc-bg__select-video--image' );

	$tour_section_classes .= ' pc--s__video';

	if ( $tour_section_bg_video_poster ) {
		$tour_section_styles .= ' background: url(' . $tour_section_bg_video_poster . ') center center no-repeat;';
	} else {
		$tour_section_classes .= ' pc--s__video_poster-empty';
	}

?>