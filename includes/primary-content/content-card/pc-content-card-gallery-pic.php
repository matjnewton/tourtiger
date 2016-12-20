<?php 

$tour_gallery_images = get_sub_field( 'tour_pc-coltype--gallery_add' );
$tour_content_content_classes .= ' pc--c__gallery';
$tour_content_content_classes .= ' pc--c__gallery-' . get_sub_field( 'tour_pc-coltype--gallery_count' );  ?>

<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>">

	<?php if( $tour_gallery_images ): ?>
        <?php foreach( $tour_gallery_images as $image ):
        	$thumb_img = thumb_crop_etrange( $image['sizes']['thumbnail'], 150, 150 ); ?>
         	<img src="<?php echo $thumb_img; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endforeach; ?>
	<?php endif; ?>

</div>