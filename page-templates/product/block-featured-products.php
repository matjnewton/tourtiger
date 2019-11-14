<?php
/**
 * Product primary area component: Featured Products
 */

if ( get_row_layout() == 'primary_content_f_products' ) :

    global $primary_content_options_count;
	$post_objects = get_sub_field('featured_products');
	$tour_label   = get_sub_field('featured_products--label') ? get_sub_field('featured_products--label') : 'View Tour Now';

	if ( $post_objects ) :
		?>

		<div class="product_content_wrapper primary_content_featured-products">
			<div class="pc_featured-products-carousel">

				<?php
				/**
				 * Roll each selected product
				 */
				foreach ( $post_objects as $key => $post_object ) :

					/**
					 * Get thumbnail
					 */
					if ( has_post_thumbnail( $post_object->ID ) ) {
					    $thumb_id = get_post_thumbnail_id( $post_object->ID );
					    $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
					    $this_thumb = $thumb_url[0];
					    $show = true;
					} else {
						$show = false;
					}

					?>

					<div class="pc_featured-products">
						<?php if ( $show ) : ?>
							<div class="pc_featured-products__thumb">
								<a href="<?php the_permalink( $post_object->ID ); ?>" class="pc_featured-products__thumb-link">
									<img src="<?=$this_thumb;?>" alt="<?php echo get_the_title( $post_object->ID ); ?>" class="pc_featured-products__img" />
								</a>
							</div>
						<?php endif; ?>

						<div class="pc_featured-products__body">
							<h4><?php echo get_the_title( $post_object->ID ); ?></h4>
							<a href="<?php the_permalink( $post_object->ID ); ?>" class="pc_featured-products__body-link"><?=$tour_label;?></a>
						</div>
					</div>

					<?php
				endforeach;
				?>

			</div>
		</div>

		<?php
	endif;

endif;
