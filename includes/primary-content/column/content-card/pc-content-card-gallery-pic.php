<?php 
/**
 * Content card gallery
 */
$gallery   = get_sub_field( 'tour_pc-coltype--gallery_add' );
$label     = get_sub_field( 'tour_pc-coltype--gallery_label' );
$columns   = get_sub_field( 'tour_pc-coltype--gallery_count' );
$type      = get_sub_field( 'gallery_type' );
$onclick   = get_sub_field( 'gallery_onclick' );

include get_stylesheet_directory() . '/partials/gallery.php';
?>

