<?php 

/* get variables */
$tour_product_image_classes     = 'pc--c__b-image fc_style--image pc--crop__thumb';
$tour_product_image_url         = get_sub_field( 'tour_pc-flexi--image-add' );

/* Image URL */

if ( $tour_product_image_url ) :

	if ( get_sub_field( 'tour_pc-flexi--image-height' ) == 'pc--c__b-image--tall' ) {
		$thumb_height = $thumb_width * 1.35;
	} else {
		$thumb_height = $thumb_height_normal;
	}

	$thumb_img = thumb_crop_etrange( $tour_product_image_url, $thumb_width, $thumb_height );

	$tour_product_image_classes .= ' ' . get_sub_field( 'tour_pc-flexi--image-height' );
	$tour_product_image_classes .= ' ' . get_sub_field( 'tour_pc-flexi--image-aligment' );

	if ( have_rows( 'tour_pc-flexi--image-row' ) ) :
		while ( have_rows( 'tour_pc-flexi--image-row' ) ) : the_row(); 
			$tour_product_image_title       = get_sub_field( 'tour_pc-flexi--image-row__title' );
			$tour_product_image_description = get_sub_field( 'tour_pc-flexi--image-row__description' );
			$tour_product_image_price       = get_sub_field( 'tour_pc-flexi--image-row__price' );
			$tour_product_image_label       = get_sub_field( 'tour_pc-flexi--image-row__label' );
		endwhile;
	endif;

/* Url */
if ( get_sub_field( 'tour_pc-flexi--url' ) ) {
	$image_tag_open = 'a href="' . get_sub_field( 'tour_pc-flexi--url' ) . '"';
	$image_tag_close = 'a';
} else {
	$image_tag_open = 'div';
	$image_tag_close = 'div';
}

?>

	<<?php echo $image_tag_open; ?> class="<?php echo $tour_product_image_classes; ?>">
		<img class="pc--c__b-image_thumb" src="<?php echo $thumb_img; ?>" alt="<?php echo $tour_product_image_title; ?>">
		<?php if ( in_array( 'text', $show_image ) && ( $tour_product_image_title || $tour_product_image_description ) ) :  ?>
			<div class="fc_style--image_text">
				<?php if ( $tour_product_image_title ) : ?>
					<div class="pc--c__b-image_title fc_style--image_title">
						<?php echo $tour_product_image_title; ?>	
					</div>
				<?php endif; ?>

				<?php if ( $tour_product_image_description ) : ?>
					<div class="pc--c__b-image_description fc_style--image_desc">
						<?php echo $tour_product_image_description; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $tour_product_image_price && in_array( 'price', $show_image ) ) : ?>
			<div class="pc--c__b-image_price fc_style--image_price">$<?php echo $tour_product_image_price; ?></div>
		<?php endif; ?>

		<?php if ( $tour_product_image_label && in_array( 'label', $show_image ) ) : ?>
			<div class="pc--c__b-image_label fc_style--image_label">
				<?php echo $tour_product_image_label; ?>
			</div>
		<?php endif; ?>
	</<?php echo $image_tag_close; ?>>

<?php endif; ?>
