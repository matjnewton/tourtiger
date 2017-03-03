<?php
/* get variables */
$tour_product_classes = 'pc--c__b-' . $flexi_attr['name'] . ' fc_style--' . $flexi_attr['name'];

if ( $tour_flexi_content == 'tour_pc-flexi' ) {
	$title = get_sub_field( 'tour_pc-flexi--' . $flexi_attr['name'] . '-row__title' );
	$desc = get_sub_field( 'tour_pc-flexi--' . $flexi_attr['name'] . '-row__description' );
	$detail = get_sub_field( 'tour_pc-flexi--' . $flexi_attr['name'] . '-row__detail' );
	$price = get_sub_field( 'tour_pc-flexi--' . $flexi_attr['name'] . '-row__price' );
	$label = get_sub_field( 'tour_pc-flexi--' . $flexi_attr['name'] . '-row__label' );
}

?>

<div class="<?php echo $tour_product_classes; ?>">

	<?php if ( 
		   ( in_array( 'title', $flexi_attr[$prefix] ) && $title )
		|| ( in_array( 'desc', $flexi_attr[$prefix] ) && $desc )
		|| ( in_array( 'price', $flexi_attr[$prefix] ) && $price )
	) { ?>
		<div class="fc_style--first_wrap">
			<?php if ( in_array( 'title', $flexi_attr[$prefix] ) && $title ) : ?>
				<div class="fc_style--first_title first_title"><?php echo $title; ?></div>
			<?php endif; 

			if ( in_array( 'desc', $flexi_attr[$prefix] ) && $desc ) : ?>
				<div class="fc_style--first_desc first_desc"><?php echo $desc; ?></div>
			<?php endif; 

			if ( in_array( 'price', $flexi_attr[$prefix] ) && $price ) : ?>
				<div class="fc_style--first_price first_price"><?php echo $price; ?></div>
			<?php endif; ?>
		</div>

	<?php }

	if ( in_array( 'button', $flexi_attr[$prefix] ) && $label ) :

		$url = get_sub_field( 'tour_pc-flexi--url' );

		if ( $flexi_attr['button'] != 'right-d' ) : ?>

			<a 
				href="<?= $url; ?>" 
				class="fc_style--<?= $flexi_attr['name']; ?>_button <?= $flexi_attr['name']; ?>_button button_type_inline-block button_type_<?= $flexi_attr['button']; ?>">
					<?php echo $label; ?>
			</a>

		<?php elseif ( $flexi_attr['button'] == 'right-d' && $detail ) : ?>

			<div class="<?= 'fc_style--' . $flexi_attr['name'] . '__details ' . 'fc_style--' . $flexi_attr['name'] . '__button_details'; ?>">

				<div class="<?= 'fc_style--' . $flexi_attr['name'] . '__button_detail ' . $flexi_attr['name'] . '_detail'; ?>">

					<span class="fc_style--<?= $flexi_attr['name']; ?>_detail"><?php echo $detail; ?></span>

				</div>

				<a 
					href="<?= $url; ?>" 
					class="<?= 'fc_style--' . $flexi_attr['name'] . '_button ' . $flexi_attr['name'] . '_button'; ?> button_type_<?= $flexi_attr['button']; ?>">

					<span><?php echo $label; ?></span>
				</a>

			</div>

		<?php endif; ?>
	<?php endif; ?>
</div>