<?php

//main Gallery slider
if( get_row_layout() == 'primary_content_maingallery_area' ):
	$primary_content_maingallery_options = get_sub_field('primary_content_maingallery_options');

	if( $primary_content_maingallery_options) :

		/**
		 * Loop galleries
		 */
		foreach ( $primary_content_maingallery_options as $key => $row ) :

			// Core variables
			$gallery       = $row['primary_content_maingallery_slides'];
			$label         = $row['label'] ? $row['label'] : 'Click to view gallery';
			$display_caption = $row['display_caption'];

			include get_stylesheet_directory() . '/partials/gallery.php';
		endforeach;
	endif;
endif;
?>
