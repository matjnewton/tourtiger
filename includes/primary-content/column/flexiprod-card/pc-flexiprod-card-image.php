<?php 

$tour_flexiprod_image_classes = 'pc--c__b-image fc_style--image pc--crop__thumb';

/* Image URL */

if ( $tour_flexi_content == 'tour_pc-flexi' )
	$tour_flexiprod_image_url = get_sub_field( 'tour_pc-flexi--image-add' );

if ( $tour_flexiprod_image_url ) :

	if ( 
		get_sub_field( $tour_flexi_content . '--image-height' ) == 'pc--c__b-image--tall' 
		|| get_sub_field( $tour_flexi_content . '--image-height' ) == 'pc--c__b-image--really-tall' 
	) {
		$thumb_height = $thumb_width * 1.4;
		$thumb_width = $thumb_width * 1.4;
	} else {
		$thumb_height = $thumb_height_normal;
	}

	$tour_flexiprod_image_classes .= ' ' . get_sub_field( $tour_flexi_content . '--image-height' );
	$tour_flexiprod_image_classes .= ' ' . get_sub_field( $tour_flexi_content . '--image-aligment' );

	if ( $tour_flexi_content == 'tour_pc-flexi' ) :
		$title   = get_sub_field( 'tour_pc-flexi--image-row__title' );
		$desc    = get_sub_field( 'tour_pc-flexi--image-row__description' );
		$price   = get_sub_field( 'tour_pc-flexi--image-row__price' );
		$label   = get_sub_field( 'tour_pc-flexi--image-row__label' );
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

		<?php pc_image( $tour_flexiprod_image_url, $thumb_width, $thumb_height, false, array( 'class' => 'pc--c__b-image_thumb' ) ); ?>

		<?php $padding_top = ''; if ( $price && in_array( 'price', $flexi_attr['image'] ) ) : $padding_top = 'padding-top-mob'; ?>
			<div class="pc--c__b-image_price fc_style--image_price"><?php echo $price; ?></div>
		<?php endif; ?>

		<?php if ( 
			( 
				in_array( 'title', $flexi_attr['image'] ) 
				|| in_array( 'desc', $flexi_attr['image'] ) 
			) 
			&& ( $title || $desc ) ) : ?>

			<div class="fc_style--image_text <?=$padding_top;?>">
				<?php if ( $title && in_array( 'title', $flexi_attr['image'] ) ) : ?>
					<div class="pc--c__b-image_title fc_style--image_title">
						<?php echo $title; ?>	
					</div>
				<?php endif; ?>
 
				<?php if ( $desc && in_array( 'desc', $flexi_attr['image'] )  ) : ?>
					<div class="pc--c__b-image_description fc_style--image_desc">
						<?php echo $desc; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $label && in_array( 'label', $flexi_attr['image'] ) ) : ?>
			<div class="pc--c__b-wrap-image_label">
				<div class="pc--c__b-image_label fc_style--image_label">
					<?php echo $label; ?>
				</div>
			</div>
		<?php endif; ?>
	</<?php echo $image_tag_close; ?>>

<?php endif; ?>