<?php $location = get_sub_field( 'tour_pc-bg__select-map' );

if( !empty($location) ): 

	include_once( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-map-api.php' ); ?>

	<div id="acf-bg-<?php echo $bg_map_count; ?>" class="acf-bg acf-map acf-bg-<?php echo $bg_map_count; ?>">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	</div>

<?php $bg_map_count++; endif; ?>