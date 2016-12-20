<?php
	 		$tour_row_styles = '';
	 		$tour_column_classes = 'pc--r hidden-load'; 

	 		$tour_row_type       = get_sub_field( 'tour_pc-rowtype' );
	 		$scroll_data		 = '';

	 		$fc_style 			 = get_sub_field( 'tour_pc-col-style' );
	 					
	 		$tour_column_wrap     = get_sub_field( 'tour_pc-colums--wrap' );

	 		if ( get_sub_field( 'tour_pc-rowtype--bg' ) == 'texture' ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-bg-texture.php' );
	 		} elseif ( get_sub_field( 'tour_pc-rowtype--bg' ) == 'color' ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-bg-color.php' );
	 		}

	 		if ( get_sub_field( 'tour_pc-colums--count' ) == 1 ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-col-1.php' );
	 		} elseif ( get_sub_field( 'tour_pc-colums--count' ) == 2 ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-col-2.php' );
	 		} elseif ( get_sub_field( 'tour_pc-colums--count' ) == 3 ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-col-3.php' );
	 		} elseif ( get_sub_field( 'tour_pc-colums--count' ) == 4 ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-col-4.php' );
	 		} elseif ( get_sub_field( 'tour_pc-colums--count' ) == 5 ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-col-5.php' );
	 		} elseif ( get_sub_field( 'tour_pc-colums--count' ) == 6 ) {
	 			include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-col-6.php' );
	 		}

	 		if ( $tour_column_wrap == 'wrap' ) {
 				$tour_column_classes .= ' pc--r__wrap';
	 		} elseif ( $tour_column_wrap == 'scroll' ) {
 				$tour_column_classes .= ' pc--r__scroll';
				include_once( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-scroll.php' );
	 		}

	 		if ( get_sub_field( 'tour_pc-colums--margin' ) == 'none' ) {
	 			$tour_column_classes .= ' pc--r__mar-none';
	 		} elseif ( get_sub_field( 'tour_pc-colums--margin' ) == 'normal' ) {
	 			$tour_column_classes .= ' pc--r__mar-normal';
	 		}

	 		if ( get_sub_field( 'tour_pc-colums--position' ) == 'top' ) {
 				$tour_column_classes .= ' pc--r_pos-top';
	 		} elseif ( get_sub_field( 'tour_pc-colums--position' ) == 'middle' ) {
				$tour_column_classes .= ' pc--r_pos-middle';
			} elseif ( get_sub_field( 'tour_pc-colums--position' ) == 'bottom' ) {
 				$tour_column_classes .= ' pc--r_pos-bottom';
	 		} else {
 				$tour_column_classes .= ' pc--r_pos-stretch';
	 		}
?>