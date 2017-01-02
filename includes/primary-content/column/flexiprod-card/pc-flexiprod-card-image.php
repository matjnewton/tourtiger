<?php 

$tour_flexiprod_image_classes = 'pc--c__b-image fc_style--image pc--crop__thumb';

/* Image URL */

if ( $tour_flexi_content == 'tour_pc-flexi' ) :

	$tour_flexiprod_image_url = get_sub_field( 'tour_pc-flexi--image-add' );

endif;

if ( $tour_flexiprod_image_url ) :

	if ( 
		get_sub_field( $tour_flexi_content . '--image-height' ) == 'pc--c__b-image--tall' 
		|| get_sub_field( $tour_flexi_content . '--image-height' ) == 'pc--c__b-image--really-tall' 
	) {
		$thumb_height = $thumb_width * 1.35;
	} else {
		$thumb_height = $thumb_height_normal;
	}

	$thumb_img = thumb_crop_etrange( $tour_flexiprod_image_url, $thumb_width, $thumb_height );

	$tour_flexiprod_image_classes .= ' ' . get_sub_field( $tour_flexi_content . '--image-height' );
	$tour_flexiprod_image_classes .= ' ' . get_sub_field( $tour_flexi_content . '--image-aligment' );

	if ( $tour_flexi_content == 'tour_pc-flexi' ) :
		while ( have_rows( 'tour_pc-flexi--image-row' ) ) : the_row(); 
			$title   = get_sub_field( 'tour_pc-flexi--image-row__title' );
			$desc    = get_sub_field( 'tour_pc-flexi--image-row__description' );
			$price   = get_sub_field( 'tour_pc-flexi--image-row__price' );
			$label   = get_sub_field( 'tour_pc-flexi--image-row__label' );
		endwhile;
	endif;

	/* Url */
	if ( $tour_flexiprod_tag_url ) {
		$image_tag_open = 'a href="' . $tour_flexiprod_tag_url . '"';
		$image_tag_close = 'a';
	} else {
		$image_tag_open = 'div';
		$image_tag_close = 'div';
	} ?>
	<<?php echo $image_tag_open; ?> class="<?php echo $tour_flexiprod_image_classes; ?>">
		<img class="pc--c__b-image_thumb" src="<?php echo $thumb_img; ?>" alt="<?php echo $tour_flexiprod_image_title; ?>">
		<?php if ( in_array( 'text', $show_image ) && ( $title || $desc ) ) :  ?>
			<div class="fc_style--image_text">
				<?php if ( $title ) : ?>
					<div class="pc--c__b-image_title fc_style--image_title">
						<?php echo $title; ?>	
					</div>
				<?php endif; ?>

				<?php if ( $desc ) : ?>
					<div class="pc--c__b-image_description fc_style--image_desc">
						<?php echo $desc; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $price && in_array( 'price', $show_image ) ) : ?>
			<div class="pc--c__b-image_price fc_style--image_price"><?php echo $price; ?></div>
		<?php endif; ?>

		<?php if ( $label && in_array( 'label', $show_image ) ) : ?>
			<div class="pc--c__b-image_label fc_style--image_label">
				<?php echo $label; ?>
			</div>
		<?php endif; ?>
	</<?php echo $image_tag_close; ?>>

<?php endif; ?>
