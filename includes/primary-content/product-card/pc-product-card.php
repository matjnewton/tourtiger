<?php /* Get variables */
$tour_product_content = get_sub_field( 'tour_pc-product--content' );
$tour_product_object  = get_sub_field( 'tour_pc-product--object' );
$tour_column_content_classes .= ' pc--c__product';

if( $tour_product_object ):  

	// override $post
	$post = $tour_product_object;
	setup_postdata( $post );
	$tour_column_content_classes .= ' product-id-' . get_the_ID(); ?>

	<article 
		id="product-id-<?php echo get_the_ID(); ?>"
		class="<?php echo $tour_column_content_classes; ?>" 
		style="<?php echo $tour_column_content_styles; ?>">
		
			<?php if ( have_rows( 'tour_pc-product--content' ) ) :

				while ( have_rows( 'tour_pc-product--content' ) ) : the_row();

					if ( get_row_layout() == 'tour_pc-product--content--image' ) :

						include( get_stylesheet_directory() . '/includes/primary-content/product-card/pc-product-card-image.php' );

					elseif ( get_row_layout() == 'tour_pc-product--content_first' ) : 

						include( get_stylesheet_directory() . '/includes/primary-content/product-card/pc-product-card-first.php' );

					elseif ( get_row_layout() == 'tour_pc-product--content_second' ) : 

						include( get_stylesheet_directory() . '/includes/primary-content/product-card/pc-product-card-second.php' );

					endif;

				endwhile;

			endif; ?>

	</article>

<?php wp_reset_postdata();

endif; ?>
