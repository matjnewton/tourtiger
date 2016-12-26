<?php
/* get variables */
$tour_product_first_classes     = 'pc--c__b-first fc_style--first'; ?>

<div class="<?php echo $tour_product_first_classes; ?>">
	<?php if (
		   in_array( 'title', $show_co ) 
		|| in_array( 'desc', $show_co ) 
		|| in_array( 'detail', $show_co ) 
		|| in_array( 'price', $show_co ) 
	) { ?>
		<div class="fc_style--first_wrap">
			<?php if ( in_array( 'title', $show_co ) ) : ?>
				<div class="fc_style--first_title first_title">
					<?php the_title(); ?>
				</div>
			<?php endif; ?>

			<?php if ( in_array( 'desc', $show_co ) ) : ?>
				<div class="fc_style--first_desc first_desc">
					Description
				</div>
			<?php endif; ?>

			<?php if ( 
				   in_array( 'detail', $show_co ) 
				&& $fc_style__co_butt_pos != 'rigt-d'
			) : ?>
				<div class="fc_style--first_detail first_detail">Detail</div>
			<?php endif; ?>

			<?php if ( in_array( 'price', $show_co ) ) : ?>
				<div class="fc_style--first_price first_price">
					1,199
				</div>
			<?php endif; ?>
		</div>
	<?php } ?>

	<?php if ( in_array( 'button', $show_co ) ) : ?>
		<?php if ( $fc_style__co_butt_pos == 'left' ): ?>
			<button style="margin-right: auto;" class="fc_style--first_button first_button">Click me now!</button>
		<?php elseif ( $fc_style__co_butt_pos == 'center' ) : ?>
			<button style="margin-left: auto;margin-right: auto;" class="fc_style--first_button first_button">Click me now!</button>
		<?php elseif ( $fc_style__co_butt_pos == 'right' ) : ?>
			<button style="margin-left: auto;" class="fc_style--first_button first_button">Click me now!</button>
		<?php elseif ( $fc_style__co_butt_pos == 'rigt-d' && in_array( 'detail', $show_co ) ) : ?>
			<div class="fc_style--first__details">
				<div class="fc_style--first_detail first_detail">Detail</div>
				<button class="fc_style--first_button first_button">Click me now!</button>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>