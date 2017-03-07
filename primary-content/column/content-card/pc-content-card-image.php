<?php $tour_image = get_sub_field( 'tour_pc-coltype--image_add' );

if ( $tour_image ) :

	$tour_content_content_classes .= ' pc--c__image';
	$tour_image_url = get_sub_field( 'tour_pc-coltype--image_url' ); 
	$tour_image_circl = get_sub_field( 'tour_pc-coltype--image_cir' );
	$tour_image_size = get_sub_field( 'tour_pc-coltype--image_size' ) / 100;

	$tour_content_content_styles .= "transform: scale({$tour_image_size});";

	$circle = false;

	if ( $tour_image_circl == 'circle' ) { 
		$tour_content_content_classes .= ' pc--c__image--circle'; 
		$circle = true; 
	} ?>

		<div 
			class="<?=$tour_content_content_classes;?>" 
			style="<?=$tour_content_content_styles;?>"
			align="center">
				<?php

				pc_image( $tour_image, $thumb_width, $thumb_height, $tour_image_url, null, $circle ); 

				?>
		</div>

<?php endif; ?>

