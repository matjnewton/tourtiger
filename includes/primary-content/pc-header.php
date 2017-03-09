<?php
/* =======================
 * PC: Header
 * ==================== */

if( have_rows('pc_hero_area') ):
    while ( have_rows('pc_hero_area') ) : the_row();
        $background_placement = get_sub_field( 'pc_background_position' );
        $slides_images = get_sub_field( 'pc_hero_slides' );
        $hero_video = get_sub_field( 'pc_hero_video' );
        $hero_video_webm = get_sub_field( 'pc_hero_video_webm' );
        $hero_video_ogv = get_sub_field( 'pc_hero_video_ogv' );
        $full_video_poster = get_sub_field( 'pc_video_poster' );
        $poster_url = wp_get_attachment_url( $full_video_poster, 'full' );

        $hero_height = get_sub_field( 'pc_hero_area_size' );
        $hero_align_h = get_sub_field( 'pc_hero_area_align' );
        $hero_width = get_sub_field( 'pc_hero_area_width' );
        $hero_align_v = get_sub_field( 'pc_hero_area_vertical' );

        if ( $hero_height == 'short' ) {
            $hero_height_n = 250;
        } elseif ( $hero_height == 'medium' ) {
            $hero_height_n = 450;
        } else {
            $hero_height_n = 650;
        }

        include ( get_stylesheet_directory() . '/includes/primary-content/head/pc-banner.php' );
    endwhile;
endif; ?>
