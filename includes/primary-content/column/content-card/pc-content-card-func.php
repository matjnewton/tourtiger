<?php

/**
 * This function builds css styles for forms
 * @param  string $font       Font ACF Fiels 
 * @param  string $color      Color value
 * @param  string $background Color value
 * @param  string $border     Color value
 * @return string             return string with styles
 */
function pc_content_init_form( $font='', $color='', $background='', $border='' ) {
	$css = '';

	if ( $font ) :
		if ( $font['font_family'] ) $css .= "font-family:" . $font['font_family'] . ";";
		if ( $font['font_weight'] ) $css .= "font-weight:" . $font['font_weight'] . ";";

		$css .=  "font-size:" . $font['font_size'] . "px;";
		$css .=  "line-height:" . $font['line_height'] . "px;";
		$css .=  "font-style:" . $font['font_style'] . ";";
	endif;

	$css .= $color ? 'color:' . $color . ';' : '';
	$css .= $background ? 'background-color:' . $background . ';' : '';
	$css .= $border ? 'border-color:' . $border . ';' : '';

	return $css;
}

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