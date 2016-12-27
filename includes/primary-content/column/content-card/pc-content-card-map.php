<?php 

	include_once( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-map-api.php' );

	$location = get_sub_field( 'tour_pc-coltype--map_map' );
	$tour_content_content_classes .= ' pc--c__map acf-map';

	if ( $location ) { ?>

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

		<div 
			class="<?php echo $tour_content_content_classes; ?>" 
			style="<?php echo $tour_content_content_styles; ?>">
			
		</div>

<?php $bg_map_count++; }  ?>