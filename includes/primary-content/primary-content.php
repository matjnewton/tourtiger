<?php
/* =======================
 * PC: Root
 * ==================== */

$ajaxload = isset($_POST['ajaxload']);

ob_start();

?>

<?php

include( PCA_DIR . '/pc-header.php' );

if ( have_rows( 'tour_primary-content' ) ) { ?>

	<div id="pc_wrap" class="pc_wrap">

		<?php
		/**
		 * Indlude Dependences
		 */
		include( PCA_DIR . '/dependences/pc-dependences.php' );

		/**
		 * Content card styles
		 */
		$styles_array = get_pc_styles_list( 'content_card' );
		foreach ( $styles_array as $cc_style => $name ) :
			get_pc_content_card_style( $cc_style );
		endforeach;

		/**
		 * Flexi card styles
		 */
		$styles_array = get_pc_styles_list( 'flexi_card' );
		foreach ( $styles_array as $fc_style => $name ) :
			get_pc_flexiprod_card_style( $fc_style );
		endforeach;

    $section_count = 0;

		while ( have_rows( 'tour_primary-content' ) ) :
			the_row();
			$number        = 1;

			include( PCA_DIR . '/section/pc-section-parameters.php' );

			//if ($section_count == 1 && !$ajaxload) break;
		endwhile;

	    ?>

	</div>

	<?php
}

echo ob_get_clean();
?>
