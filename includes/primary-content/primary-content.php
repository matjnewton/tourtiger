<?php
/* =======================
 * PC: Root
 * ==================== */

if ( have_rows( 'tour_primary-content' ) ) { ?>

	<div id="pc_wrap" class="pc_wrap">
	
		<?php 
		/**
		 * Indlude Dependences
		 */
		
		include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-footer-inc.php' );
		include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-dependences.php' );

		ob_start();

		while ( have_rows( 'tour_primary-content' ) ) :
			the_row();

			include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-parameters.php' );

			if ($section_count == $number) break;
		endwhile; 

		echo ob_get_clean();  ?>

	</div> 

<?php } ?>