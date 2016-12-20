<?php while ( have_rows( 'tour_pc-col' ) ) : the_row();	

	$tour_column_content_classes = 'pc--c ';
	$tour_column_content_styles = '';

	if ( get_row_layout() == 'tour_pc-content' ) :

		include( get_stylesheet_directory() . '/includes/primary-content/content-card/pc-content-card.php' );

	elseif ( get_row_layout() == 'tour_pc-product' || get_row_layout() == 'tour_pc-flexi' ) :

		include( get_stylesheet_directory() . '/includes/primary-content/column/pc-define-flexi-prod.php' );

	endif;

endwhile; ?>