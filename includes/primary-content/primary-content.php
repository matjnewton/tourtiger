<?php
/* =======================
 * PC: Root
 * ==================== */


ob_start();

include( PCA_DIR . '/pc-header.php' );

if ( have_rows( 'tour_primary-content' ) ) { ?>

	<div id="pc_wrap" class="pc_wrap">
	
		<?php 
		/**
		 * Indlude Dependences
		 */
		include( PCA_DIR . '/dependences/pc-dependences.php' );

		while ( have_rows( 'tour_primary-content' ) ) :
			the_row();
			
			$section_count = 0;

			include( PCA_DIR . '/section/pc-section-parameters.php' );

			if ($section_count == $number) break;
		endwhile; 

	    ?>

	</div> 

	<?php 
} 

echo ob_get_clean();
?>