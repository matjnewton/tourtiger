<?php 
/**
 * Sidebar: Product
 */

/**
 * Check whether there are any blocks
 */
if ( have_rows( 'sidebar_blocks' ) ) :
	?>

	<div class="product-sidebar">

		<?php
		/**
		 * Loop blocks
		 */
		while ( have_rows( 'sidebar_blocks' ) ) :
			the_row();

			/**
			 * Check whether current sidear block 
			 * has any content fields
			 */
			if ( have_rows( 'content' ) ) :
				?>
		
				<div class="product-sidebar--block">
					
					<?php
					/**
					 * Loop block's components
					 */
					while ( have_rows( 'content' ) ) :
						the_row();
						$layout = get_row_layout();
						?>

						<div class="product-sidebar--block__item">

							<?php
							/**
							 * Get component
							 */
							get_template_part( 'partials/sidebar', $layout );
							?>

						</div>

						<?php
					endwhile;
					?>

				</div>

				<?php
			endif;
		endwhile;
		?>

	</div>

	<?php
endif;