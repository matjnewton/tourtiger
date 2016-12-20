<?php
/* get variables */
$tour_product_first_classes     = 'pc--c__b-first fc_style--first';

if ( have_rows( 'tour_pc-flexi--first-row' ) ) {
	while ( have_rows( 'tour_pc-flexi--first-row' ) ) { the_row();
		$title = get_sub_field( 'tour_pc-flexi--first-row__title' );
		$desc = get_sub_field( 'tour_pc-flexi--first-row__description' );
		$detail = get_sub_field( 'tour_pc-flexi--first-row__detail' );
		$price = get_sub_field( 'tour_pc-flexi--first-row__price' );
		$label = get_sub_field( 'tour_pc-flexi--first-row__label' );
	}
}

?>

<div class="<?php echo $tour_product_first_classes; ?>">
	<?php if ( 
		   ( in_array( 'title', $show_co ) && $title )
		|| ( in_array( 'desc', $show_co ) && $desc )
		|| ( in_array( 'detail', $show_co ) && $detail && $fc_style__co_butt_pos != 'rigt-d' )
		|| ( in_array( 'price', $show_co ) && $price )
	) { ?>
		<div class="fc_style--first_wrap">
			<?php if ( in_array( 'title', $show_co ) && $title ) : ?>
				<div class="fc_style--first_title first_title"><?php echo $title; ?></div>
			<?php endif; ?>

			<?php if ( in_array( 'desc', $show_co ) && $desc ) : ?>
				<div class="fc_style--first_desc first_desc"><?php echo $desc; ?></div>
			<?php endif; ?>

			<?php if ( in_array( 'detail', $show_co ) && $detail && $fc_style__co_butt_pos != 'rigt-d' ) : ?>
				<div class="fc_style--first_detail first_detail"><?php echo $detail; ?></div>
			<?php endif; ?>

			<?php if ( in_array( 'price', $show_co ) && $price ) : ?>
				<div class="fc_style--first_price first_price"><?php echo $price; ?></div>
			<?php endif; ?>
		</div>

	<?php }

	if ( in_array( 'button', $show_co ) ) : ?>
		<?php if ( $fc_style__co_butt_pos == 'left' ): ?>
			<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" style="margin-right: auto;" class="fc_style--first_button first_button"><?php echo $label; ?></a>
		<?php elseif ( $fc_style__co_butt_pos == 'center' ) : ?>
			<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" style="margin-left: auto;margin-right: auto;" class="fc_style--first_button first_button"><?php echo $label; ?></button>
		<?php elseif ( $fc_style__co_butt_pos == 'right' ) : ?>
			<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" style="margin-left: auto;" class="fc_style--first_button first_button"><?php echo $label; ?></a>
		<?php elseif ( $fc_style__co_butt_pos == 'rigt-d' && $detail ) : ?>
			<div class="fc_style--first__details fc_style--first__button_details">
				<div class="fc_style--first__button_detail first_detail"><span><?php echo $detail; ?></span></div>
				<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" class="fc_style--first_button first_button" style="margin-top: 0;"><?php echo $label; ?></a>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>