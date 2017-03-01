<?php
/* get variables */
$tour_product_second_classes = 'pc--c__b-second fc_style--second';

if ( $tour_flexi_content == 'tour_pc-flexi' ) {
	$title = get_sub_field( 'tour_pc-flexi--second-row__title' );
	$desc = get_sub_field( 'tour_pc-flexi--second-row__description' );
	$detail = get_sub_field( 'tour_pc-flexi--second-row__detail' );
	$price = get_sub_field( 'tour_pc-flexi--second-row__price' );
	$label = get_sub_field( 'tour_pc-flexi--second-row__label' );
}

?>

<div class="<?php echo $tour_product_second_classes; ?>">
	<?php if ( 
		   ( in_array( 'title', $show_ct ) && $title )
		|| ( in_array( 'desc', $show_ct ) && $desc )
		|| ( in_array( 'price', $show_ct ) && $price )	
	) { ?>
		<div class="fc_style--second_wrap">
			<?php if ( in_array( 'title', $show_ct ) && $title ) : ?>
				<div class="fc_style--second_title second_title"><?php echo $title; ?></div>
			<?php endif; ?>

			<?php if ( in_array( 'desc', $show_ct ) && $desc ) : ?>
				<div class="fc_style--second_desc second_desc"><?php echo $desc; ?></div>
			<?php endif; ?>

			<?php if ( in_array( 'price', $show_ct ) && $price ) : ?>
				<div class="fc_style--second_price second_price"><?php echo $price; ?></div>
			<?php endif; ?>
		</div>
	<?php } ?>

	<?php if ( in_array( 'button', $show_ct ) && $label ) : ?>
		<?php if ( $fc_style__ct_butt_pos == 'left' ): ?>
			<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" style="margin-right: auto;" class="fc_style--second_button second_button"><?php echo $label; ?></a>
		<?php elseif ( $fc_style__ct_butt_pos == 'center' ) : ?>
			<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" style="margin-left: auto;margin-right: auto;" class="fc_style--second_button second_button"><?php echo $label; ?></a>
		<?php elseif ( $fc_style__ct_butt_pos == 'right' ) : ?>
			<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" style="margin-left: auto;" class="fc_style--second_button second_button"><?php echo $label; ?></a>
		<?php elseif ( $fc_style__ct_butt_pos == 'right-d' && $detail ) : ?>
			<div class="fc_style--second__button_details">
				<div class="fc_style--second__button_detail second_detail"><span class="fc_style--second_detail"><?php echo $detail; ?></span></div>
				<a href="<?php echo get_sub_field( 'tour_pc-flexi--url' ); ?>" class="fc_style--second_button second_button" style="margin-top: 0;">
					<span><?php echo $label; ?></span>
				</a>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>