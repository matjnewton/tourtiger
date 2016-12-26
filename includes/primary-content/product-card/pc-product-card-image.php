<?php 

/* get variables */
$tour_product_image_classes     = 'pc--c__b-image fc_style--image pc--crop__thumb';

$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);

if ( get_sub_field( 'tour_pc-flexi--image-height' ) == 'pc--c__b-image--tall' ) {
	$thumb_height = $thumb_width * 1.35;
} else {
	$thumb_height = $thumb_height_normal;
}

if ( $thumb_url ) : ?>

	<div class="<?php echo $tour_product_image_classes; ?>">

		<img 
			class="pc--c__b-image_thumb" 
			src="<?php echo thumb_crop_etrange( $thumb_url[0], $thumb_width, $thumb_height ); ?>" 
			alt="">
			
		<?php if ( in_array( 'text', $show_image ) ) :  ?>
			<div class="fc_style--image_text">
				<div class="pc--c__b-image_title fc_style--image_title">
					<?php the_title(); ?>
				</div>

				<div class="pc--c__b-image_description fc_style--image_desc">
					Product description
				</div>
			</div>
		<?php endif; ?>

		<?php if ( in_array( 'price', $show_image ) ) : ?>
			<div class="pc--c__b-image_price fc_style--image_price">1,199</div>
		<?php endif; ?>

		<?php if ( in_array( 'label', $show_image ) ) : ?>
			<div class="pc--c__b-image_label fc_style--image_label">
				Label
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>