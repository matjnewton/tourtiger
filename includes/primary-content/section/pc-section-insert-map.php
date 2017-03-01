<?php $location = get_sub_field( 'tour_pc-bg__select-map' );

if( !empty($location) ): ?>

	<div id="acf-bg-<?php echo $bg_map_count; ?>" class="acf-bg acf-map js-new-map acf-bg-<?php echo $bg_map_count; ?>">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	</div>

<?php $bg_map_count++; endif; ?>