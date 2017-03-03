<?php

include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-text.php' );

if ( in_array( 'title', $flexi_attr['image'] ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-title.php' );

if ( in_array( 'desc', $flexi_attr['image'] ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-desc.php' );

if ( in_array( 'price', $flexi_attr['image'] ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-price.php' );

if ( in_array( 'label', $flexi_attr['image'] ) ) 
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-label.php' );

?>