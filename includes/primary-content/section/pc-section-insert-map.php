<?php $location = get_sub_field( 'tour_pc-bg__select-map' );

if( !empty($location) ): 

	include_once( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-map-api.php' ); ?>

	<script type="text/javascript">
		jQuery(function(){
			let mapId = 'acf-bg-<?php echo $bg_map_count; ?>';

			new GMaps({
			  div: mapId,
			  lat: <?php echo $location['lat']; ?>,
			  lng: <?php echo $location['lng']; ?>
			});
		});
	</script>

	<div id="acf-bg-<?php echo $bg_map_count; ?>" class="acf-bg acf-map acf-bg-<?php echo $bg_map_count; ?>">
		
	</div>

<?php $bg_map_count++; endif; ?>