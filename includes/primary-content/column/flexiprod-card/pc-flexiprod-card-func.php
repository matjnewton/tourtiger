<?php

$fc_styles_arr = array();

function get_pc_flexiprod_card_style( $fc_style ) {


	if ( have_rows( $fc_style, 'option' ) ) {

		while ( have_rows( $fc_style, 'option' ) ) { 

			the_row(); 

			echo '<style>';

			include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-flexi-default.php' );

			/** 
	         * Image 
			 */
			if (
				( get_sub_field( 'fc_style__ov' ) != 'none' )
				|| get_sub_field( 'fc_style__imbo_bet' )
				|| get_sub_field( 'fc_style__imru' )
			) include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-default.php' );

			if ( 
				in_array( 'text', $show_image ) 
				|| in_array( 'price', $show_image ) 
				|| in_array( 'label', $show_image ) 
			) include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image.php' );

			/**
			 * Contet 1
			 */
			if ( 
				in_array( 'top-border', $show_co ) 
				|| in_array( 'title', $show_co ) 
				|| in_array( 'desc', $show_co ) 
				|| in_array( 'detail', $show_co ) 
				|| in_array( 'price', $show_co ) 
				|| in_array( 'button', $show_co ) 
			) include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-one.php' );

			/**
			 * Contet 2
			 */
			if ( 
				in_array( 'top-border', $show_ct ) 
				|| in_array( 'title', $show_ct ) 
				|| in_array( 'desc', $show_ct ) 
				|| in_array( 'detail', $show_ct ) 
				|| in_array( 'price', $show_ct ) 
				|| in_array( 'button', $show_ct ) 
			) include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-two.php' );

			echo '</style>';

		}

	}

	return $fc_styles_arr;


}

?>