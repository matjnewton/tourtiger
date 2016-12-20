<?php while ( have_rows( 'tour_pc-rows' ) ) { the_row();

	if ( get_row_layout() == 'tour_pc-row' ) { 

 		include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-parameters.php' );

		if ( $tour_row_type == 'blog') { 

			include( get_stylesheet_directory() . '/includes/primary-content/blog-card/pc-blog-parameters.php' );

		} elseif ( $tour_row_type == 'content' ) { ?>

			<div 
				class="<?php echo $tour_column_classes; ?>"
				style="<?php echo $tour_row_styles; ?>" 
				<?php echo $scroll_data; ?>>
			
				<?php if ( have_rows( 'tour_pc-col' ) ) { 

					include( get_stylesheet_directory() . '/includes/primary-content/column/pc-parameters-flexi-prod.php' );
					include( get_stylesheet_directory() . '/includes/primary-content/column/pc-column-loop.php' ); 

				}  ?>

			</div> 

 		<?php }
	}  
} ?>