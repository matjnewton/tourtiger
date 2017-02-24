<?php $tour_image = get_sub_field( 'tour_pc-coltype--image_add' );

if ( $tour_image ) :

	$tour_content_content_classes .= ' pc--c__image';
	$tour_image_url = get_sub_field( 'tour_pc-coltype--image_url' ); 
	$tour_image_circl = get_sub_field( 'tour_pc-coltype--image_cir' );

	if ( $tour_image_circl == 'circle' ) $tour_content_content_classes .= ' pc--c__image--circle'; ?>

		<div 
			class="<?php echo $tour_content_content_classes; ?>" 
			style="<?php echo $tour_content_content_styles; ?>"
			align="center">

			<?php

			$w = $tour_image_circl != 'circle' ? $thumb_width : $thumb_height;
			$h = $thumb_height;

			pc_image( $tour_image, $w, $h, $tour_image_url ); 

			?>

		</div>

<?php endif; ?>

