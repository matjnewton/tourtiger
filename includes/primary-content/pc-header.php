<?php
/* =======================
 * PC: Header
 * ==================== */
include_once ('styling/pc-spritesheets-css.php');

if( have_rows('pc_hero_area') ): $hero_counts = 0; //fix bug Hero loaded twice
    while ( have_rows('pc_hero_area') ) : the_row();
        $background_placement = get_sub_field( 'pc_background_position' );
        $slides_images = get_sub_field( 'pc_hero_slides' );
        $hero_video = get_sub_field( 'pc_hero_video' );
        $hero_video_webm = get_sub_field( 'pc_hero_video_webm' );
        $hero_video_ogv = get_sub_field( 'pc_hero_video_ogv' );
        $full_video_poster = get_sub_field( 'pc_video_poster' );
        $poster_url = wp_get_attachment_url( $full_video_poster, 'full' );

        $button_type = get_sub_field( 'pc_button_link_type' );

        $hero_width_box = get_sub_field( 'pc_hero_area_banner-width' );
        $hero_height = get_sub_field( 'pc_hero_area_size' );
        $hero_align_h = get_sub_field( 'pc_hero_area_align' );
        $hero_align_t = get_sub_field( 'pc_hero_area_text-align' );
        $hero_width = get_sub_field( 'pc_hero_area_width' );
        $hero_align_v = get_sub_field( 'pc_hero_area_vertical' );

        $ha_style = get_sub_field( 'hero_area-style' );

        $title = array();
        $tag = array();

        for ( $i = 1; $i < 4; $i++ ) {
            $title[$i] = get_sub_field( 'pc_ha_' . $i . '-tit' );
            $tag[$i] = get_sub_field( 'pc_ha_' . $i . '-tit_seo' );
        }

        if ( $hero_height == 'short' ) {
            $hero_height_n = 250;
        } elseif ( $hero_height == 'medium' ) {
            $hero_height_n = 450;
        } else {
            $hero_height_n = 650;
        }

        /**
         * Load CSS styles
         */
        include_once ( PCA_DIR . '/head/pc-banner-assets.php' );

        /**
         * Load banner
         */
        include ( PCA_DIR . '/head/pc-banner.php' );

        /**
         * Load Searchbox
         */
        if ( $button_type == 'Search Box' && $hero_counts == 1) :
            get_template_part( '/page-templates/search/search_box_settings_atlas_pc' );
        endif;

        /**
         * Load mobile under-hero area
         */
        if ( get_sub_field( 'pc_ha_action_button' ) && get_sub_field( 'pc_ha_action_button_url' ) && wp_is_mobile() ) :
            include ( PCA_DIR . '/head/pc-under-hero.php' );
        endif;

        $hero_counts++; //fix bug Hero loaded twice
    endwhile;
endif; ?>
