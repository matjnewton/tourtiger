<?php

$fc_styles_arr = array();

function get_pc_flexiprod_card_style( $fc_style ) {

	if ( have_rows( $fc_style, 'option' ) ) {

		while ( have_rows( $fc_style, 'option' ) ) {

			the_row();

			echo '<style type="text/css">';

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
				in_array( 'title', $flexi_attr['image'] )
				|| in_array( 'desc', $flexi_attr['image'] )
				|| in_array( 'price', $flexi_attr['image'] )
				|| in_array( 'label', $flexi_attr['image'] )
			) include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image.php' );

			/**
			 * Contet
			 */

			foreach ( array( 'co' => 'first', 'ct' => 'second' ) as $prefix => $name ) :

				$flexi_attr['prefix'] = $prefix;
				$flexi_attr['name'] = $name;

				if (
					in_array( 'top-border', $flexi_attr[$prefix] )
					|| in_array( 'title', $flexi_attr[$prefix] )
					|| in_array( 'desc', $flexi_attr[$prefix] )
					|| in_array( 'detail', $flexi_attr[$prefix] )
					|| in_array( 'price', $flexi_attr[$prefix] )
					|| in_array( 'button', $flexi_attr[$prefix] )
				) include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content.php' );

			endforeach;

			echo '</style>';

		}

		return $fc_style;

	}

}

?>
