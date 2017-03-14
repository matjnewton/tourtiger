<?php
/* =======================
 * PC: Root
 * ==================== */


include( PCA_DIR . '/pc-header.php' );

if ( have_rows( 'tour_primary-content' ) ) { ?>

	<div id="pc_wrap" class="pc_wrap">
	
		<?php 
		/**
		 * Indlude Dependences
		 */
		
		include( PCA_DIR . '/dependences/pc-footer-inc.php' );
		include( PCA_DIR . '/dependences/pc-dependences.php' );

		ob_start();

		while ( have_rows( 'tour_primary-content' ) ) :
			the_row();

			include( PCA_DIR . '/section/pc-section-parameters.php' );

			if ($section_count == $number) break;
		endwhile; 

		echo ob_get_clean();  ?>

	</div> 

<?php } ?>