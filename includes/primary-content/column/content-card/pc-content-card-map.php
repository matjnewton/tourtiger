<?php 

	$location = get_sub_field( 'tour_pc-coltype--map_map' );
	$tour_content_content_classes .= ' pc--c__map acf-map js-new-map';
	if ( $location ) { ?>

		<div 
			id="<?php echo 'acf-bg-' . $bg_map_count; ?>"
			class="<?php echo $tour_content_content_classes; ?>" 
			style="<?php echo $tour_content_content_styles; ?>">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>	
		</div>

<?php $bg_map_count++; }  ?>