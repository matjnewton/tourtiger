<?php

if ( in_array( 'text', $show_image ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-text.php' );

if ( in_array( 'price', $show_image ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-price.php' );

if ( in_array( 'label', $show_image ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-label.php' );

?>