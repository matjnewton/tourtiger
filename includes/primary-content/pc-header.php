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

        if ( have_rows( $ha_style, 'option' ) ) :

            echo '<style>';

                while ( have_rows( $ha_style, 'option' ) ) : the_row();

                    /**
                     * Title styles
                    */

                    for ( $ii = 1; $ii < 4; $ii++ ) {

                        if ( $title[$ii] ) {
                            $color = get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] . '_color' );

                            $css = pc_init_font_css( get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] ) );
                            $css[1] .= $color ? 'color:' . $color . ';' : '';

                            echo $css[0];
                            echo '#pc_hero-area.' . $ha_style . ' ' . $tag[$ii] . '.hero-area_title-' . $ii . ' {' . $css[1] . '}';
                        }

                    }

                endwhile;

            echo '</style>';

        endif;

        ?>

        <script>
            
        !(function( $ ){

            $(function(){

                $('.go_to').click( function(){ 
                    var scroll_el = $(this).attr('href');
                    if ($(scroll_el).length != 0) { 
                        $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); 
                    }
                    return false; 
                });

            });

        })(jQuery);

        </script>


        <?php include ( PCA_DIR . '/head/pc-banner.php' );

    endwhile;
endif; ?>
