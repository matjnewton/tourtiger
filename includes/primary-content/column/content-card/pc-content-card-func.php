<?php

/**
 * Init styles for each styling element of content card
 * @param  string $cc_style 
 * @return array with counter
 */
function get_pc_content_card_style( $cc_style ) {

		if ( have_rows( $cc_style, 'option' ) ) {

			while ( have_rows( $cc_style, 'option' ) ) { 
				the_row();

				echo '<style>';

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-headline.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-subheadline.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-editor.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-line.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-button.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-accordion.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-testimonials.php' );

				include ( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-init-form.php' );

				echo '</style>';
			} 
		} 

		return $cc_styles_arr;

}

$cc_styles_arr = array();

?>