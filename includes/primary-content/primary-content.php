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
		include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-dependences.php' );

		$section_count = 1;

		while ( have_rows( 'tour_primary-content' ) ) { the_row();

			/**
			 * Output Sections
			 */
			include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-parameters.php' );

		$section_count++; }  ?>

	</div> 

<?php } ?>