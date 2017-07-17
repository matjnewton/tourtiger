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

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-bg.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-radius.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-headline.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-editor.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-line.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-button.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-accordion.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-testimonials.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-form.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-more.php' );

				echo '</style>';
			} 
		} 

		return $cc_styles_arr;

}

$cc_styles_arr = array();

?>