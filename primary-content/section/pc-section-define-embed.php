<?php 

	$tour_section_bg_video_embed = get_sub_field( 'tour_pc-bg__select-videoembed' ); 

	$tour_section_classes .= ' pc--s__embed';

	if ( !$tour_section_bg_video_embed ) {
		$tour_section_classes .= ' pc--s__embed_empty';
	}

?>