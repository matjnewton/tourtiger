<?php $tour_image = get_sub_field( 'tour_pc-coltype--image_add' );
$tour_content_content_classes .= ' pc--c__image';
		
$tour_image_url = get_sub_field( 'tour_pc-coltype--image_url' ); 

if ( get_sub_field( 'tour_pc-coltype--image_cir' ) == 'circle' ) {
	$thumb_img = thumb_crop_etrange( $tour_image, $thumb_height, $thumb_height ); 
	$tour_content_content_classes .= ' pc--c__image--circle';
} else {
	$thumb_img = thumb_crop_etrange( $tour_image, $thumb_width, $thumb_height ); 
}

if ( $tour_image ) { ?>

		<div 
			class="<?php echo $tour_content_content_classes; ?>" 
			style="<?php echo $tour_content_content_styles; ?>"
			align="center">

				<?php if ( $tour_image_url ): ?>
					<a class="pc--c__image-link" href="<?php echo $tour_image_url; ?>" target="_blank">
				<?php endif ?>
						<img class="pc--c__image-thumb" src="<?php echo $thumb_img; ?>" alt="">
				<?php if ( $tour_image_url ): ?>
					</a>
				<?php endif ?>

		</div>
			
<?php } ?>