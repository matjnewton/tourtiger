<?php 
/**
 * Content card gallery
 */
$gallery = get_sub_field( 'tour_pc-coltype--gallery_add' );
$label   = get_sub_field( 'tour_pc-coltype--gallery_label' );

include get_stylesheet_directory() . '/partials/gallery.php';
?>

