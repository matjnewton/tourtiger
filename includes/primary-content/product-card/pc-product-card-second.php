<?php
/* get variables */
$tour_product_second_classes     = 'pc--c__b-second fc_style--second'; ?>

<div class="<?php echo $tour_product_second_classes; ?>" style="background-color: <?php echo $bg_color; ?>;">
	<?php if (
		   in_array( 'title', $show_ct ) 
		|| in_array( 'desc', $show_ct ) 
		|| in_array( 'detail', $show_ct ) 
		|| in_array( 'price', $show_ct ) 
	) { ?>
		<div class="fc_style--second_wrap">
			<?php if ( in_array( 'title', $show_ct ) ) : ?>
				<div class="fc_style--second_title second_title">
					<?php the_title(); ?>
				</div>
			<?php endif; ?>

			<?php if ( in_array( 'desc', $show_ct ) ) : ?>
				<div class="fc_style--second_desc second_desc">
					Description
				</div>
			<?php endif; ?>

			<?php if ( 
				   in_array( 'detail', $show_ct ) 
				&& $fc_style__ct_butt_pos != 'rigt-d'
			) : ?>
				<div class="fc_style--second_detail second_detail">
					Detail
				</div>
			<?php endif; ?>

			<?php if ( in_array( 'price', $show_ct ) ) : ?>
				<div class="fc_style--second_price second_price">
					$1,199
				</div>
			<?php endif; ?>
		</div>
	<?php } ?>

	<?php if ( in_array( 'button', $show_ct ) ) : ?>
		<?php if ( $fc_style__ct_butt_pos == 'left' ): ?>
			<button style="margin-right: auto;" class="fc_style--second_button second_button">Click me now!</button>
		<?php elseif ( $fc_style__ct_butt_pos == 'center' ) : ?>
			<button style="margin-left: auto;margin-right: auto;" class="fc_style--second_button second_button">Click me now!</button>
		<?php elseif ( $fc_style__ct_butt_pos == 'right' ) : ?>
			<button style="margin-left: auto;" class="fc_style--second_button second_button">Click me now!</button>
		<?php elseif ( $fc_style__ct_butt_pos == 'rigt-d' && in_array( 'detail', $show_ct ) ) : ?>
			<div class="fc_style--second__details">
				<span>Details</span>
				<button class="fc_style--second_button second_button">Click me now!</button>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>