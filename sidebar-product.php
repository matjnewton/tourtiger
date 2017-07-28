<?php 
/**
 * Sidebar: Product
 */

/**
 * Check whether there are any blocks
 */
if ( have_rows( 'widgets' ) ) :
	?>

	<div class="product-sidebar">

		<?php
		/**
		 * Loop blocks
		 */

		while ( have_rows( 'widgets' ) ) :
			$the_row = the_row();
			$layout = get_row_layout();

			if ( $layout == 'widget' ) :

				include get_stylesheet_directory() . '/partials/component-widget.php';

			elseif ( $layout == 'sidebar-widget-template' ) :

				$object = get_sub_field( 'sidebar-widget-id' );
				if ( $object ) : 
					// override $post
					$post = $object;
					setup_postdata( $post );

						include get_stylesheet_directory() . '/partials/component-widget.php';

					wp_reset_postdata();
				endif;
			endif;
		endwhile;
		?>

	</div>

	<?php
endif;