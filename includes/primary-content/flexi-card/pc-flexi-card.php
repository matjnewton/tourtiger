<?php /* Get variables */
$tour_flexi_content = get_sub_field( 'tour_pc-flexi--content' );
$tour_column_content_classes .= ' pc--c__flexi'; ?>

<article
	class="<?php echo $tour_column_content_classes; ?>" 
	style="<?php echo $tour_column_content_styles; ?>">
	
		<?php if ( have_rows( 'tour_pc-flexi--content' ) ) :

			while ( have_rows( 'tour_pc-flexi--content' ) ) : the_row();

				if ( get_row_layout() == 'tour_pc-flexi--content--image' ) :

					include( get_stylesheet_directory() . '/includes/primary-content/flexi-card/pc-flexi-card-image.php' );

				elseif ( get_row_layout() == 'tour_pc-flexi--content_first' ) : 

					include( get_stylesheet_directory() . '/includes/primary-content/flexi-card/pc-flexi-card-first.php' );

				elseif ( get_row_layout() == 'tour_pc-flexi--content_second' ) : 

					include( get_stylesheet_directory() . '/includes/primary-content/flexi-card/pc-flexi-card-second.php' );

				endif;

			endwhile;

		endif; ?>

</article>
