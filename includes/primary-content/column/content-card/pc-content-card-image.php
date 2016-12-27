<?php 
	$tour_image = get_sub_field( 'tour_pc-coltype--image_add' );?>

	<div 
		class="<?php echo $tour_content_content_classes; ?>" 
		style="<?php echo $tour_content_content_styles; ?>">
		<?php if ( $tour_image ) {
			
			$tour_image_url = get_sub_field( 'tour_pc-coltype--image_url' ); 
			$thumb_img = thumb_crop_etrange( $tour_image_url, $thumb_width, $thumb_height );

			$tour_content_content_classes .= ' pc--c__image'; ?>

			<?php if ( $tour_image_url ): ?>
				<a class="pc--c__image-link" href="<?php echo $tour_image; ?>" target="_blank">
			<?php endif ?>
					<img class="pc--c__image-thumb" src="<?php echo $tour_image; ?>" alt="">
			<?php if ( $tour_image_url ): ?>
				</a>
			<?php endif ?>
			
		<?php } ?>

	</div>