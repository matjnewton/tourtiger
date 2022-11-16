<?php

/**
 * Init styles for each styling element of content card
 * @param  string $cc_style
 * @return array with counter
 */
function get_pc_content_card_style( $cc_style ) {

    $cc_styles_arr = array();

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

        include ( PCA_DIR . '/column/content-card/pc-content-card-init-tripdetail.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-more.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-video.php' );

				include ( PCA_DIR . '/column/content-card/pc-content-card-init-gallery.php' );

				echo '</style>';
			}
		}

		return $cc_styles_arr;
}
