<?php //$tour_column_content_classes .= ' pc--c__content ' . $cc_style . ' '; ?>

<div 
	class="<?php echo $tour_column_content_classes; ?>" 
	style="<?php echo $tour_column_content_styles; ?>">

	<?php 
	/** 
	 * If Content Card has rows 
	 */
	if ( have_rows( 'tour_pc-content--content' ) ) {

		while ( have_rows( 'tour_pc-content--content' ) ) : the_row();
		 	$tour_content_content_classes = 'pc--c__col';
		 	$tour_content_content_styles = ''; 


		 	if ( get_row_layout() == 'tour_pc-coltype--headline' ) { 

		 		include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-headline.php' );

		 	} elseif ( get_row_layout() == 'tour_pc-coltype--subheadline' ) {

		 		include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-subheadline.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--editor' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-editor.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--button' ) { 

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-button.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--map' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-map.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--image' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-image.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--video' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-video.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--line' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-line.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--gallery' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-gallery.php' );

			} elseif ( get_row_layout() == 'tour_pc-coltype--accordion' ) {

				include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-accordion.php' );

			}

		endwhile; 

	} else { echo '<!-- There is not content -->'; }  ?>

</div>