<?php
    if ( isset($tour_content_content_classes) )
	    $tour_content_content_classes .= ' pc--c__testimonial';

	$pc_content_testimonial = 'tour_pc-coltype--testimonial_ob';

	while ( have_rows( $cc_style ?? [], 'option' ) ) {
		the_row();

		$cc_style__test_show = get_sub_field( 'cc_style__test_show' );
	}

    $cc_style__test_show = $cc_style__test_show ?? '';

if( get_sub_field( $pc_content_testimonial ) ) : ?>
		<div
			class="<?php echo $tour_content_content_classes ?? ''; ?>"
			style="<?php echo $tour_content_content_styles ?? ''; ?>">
			<div class="pc--c__testimonial--slider js-new-slider">

			 	<?php foreach( get_sub_field( $pc_content_testimonial ) as $post_object): ?>
					<div class="pc--c__testimonial--item" style="text-align: center;max-width: 100vw">

						<?php if (
							get_field( 'photo', $post_object->ID )
						) { ?>
							<div class="pc--c__testimonial--logo">
								<img
									src="<?php echo get_field( 'photo', $post_object->ID ); ?>"
									alt="<?php echo get_the_title($post_object->ID); ?>" />
							</div>
						<?php } ?>

						<?php if (
							get_the_title($post_object->ID)
						) { ?>
							<h3 class="pc--c__testimonial--title">
								<?php echo get_the_title($post_object->ID); ?>
							</h3>
						<?php } ?>

						<?php if (
							get_field( 'testimonial_quote', $post_object->ID )
						) { ?>
							<p class="pc--c__testimonial--description">
								<?php echo get_field( 'testimonial_quote', $post_object->ID ); ?>
							</p>
						<?php } ?>

						<?php if (
							get_field( 'testimonial_link', $post_object->ID )
						) { ?>
							<a
								target="_blank"
								href="<?php echo get_field( 'testimonial_link', $post_object->ID ); ?>"
								class="pc--c__testimonial--link">
								<?php echo get_field( 'testimonial_link_anchor_text', $post_object->ID ); ?>
							</a>
						<?php } ?>

					</div>
				<?php endforeach; ?>

			</div>
		</div>
	<?php endif; ?>
