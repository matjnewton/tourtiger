<?php 

if ( get_sub_field( 'tour_pc-coltype--gallery_type' ) == 'gallery' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-gallery-pic.php' );
} else {
  include( get_stylesheet_directory() . '/includes/primary-content/column/content-card/pc-content-card-gallery-ins.php' );
}