<?php

	$tour_column_content_classes .=  ' ' . $fc_style . ' ';
	include_once( get_stylesheet_directory() . '/includes/primary-content/column/pc-css-flexi-prod.php' );

	if ( get_row_layout() == 'tour_pc-product' ) :

 		include( get_stylesheet_directory() . '/includes/primary-content/product-card/pc-product-card.php' );

	elseif ( get_row_layout() == 'tour_pc-flexi' ) :

		include( get_stylesheet_directory() . '/includes/primary-content/flexi-card/pc-flexi-card.php' );

	endif; 

?>