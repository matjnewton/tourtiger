<?php

$cc_styles_arr = array();

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

				echo '</style>';
			} 
		} 

		return $cc_styles_arr;

}

?>