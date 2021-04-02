<div class='<?=$ha_style;?>'>
    <div id="pc_hero-area" class="pc__banner-wrapper-inner <?php echo 'banner-width__' . $hero_width_box; ?> align-banner_<?php echo $hero_align_t; ?>" align="<?php echo $hero_align_t; ?>">

    <?php
    $hero_headline_dropshadow = get_field('hero_headline_dropshadow', 'option');
    $hero_content_dropshadow = get_field('hero_content_dropshadow', 'option');


    $headline = get_sub_field( 'pc_headline' );
    $content_editor = get_sub_field( 'pc_content_editor' );
    $cta_button_text = get_sub_field( 'pc_cta_button_text' );
    $cta_button_text_addt = get_sub_field( 'pc_cta_button_text_addt' );
    $cta_button_text_addt2 = get_sub_field( 'pc_cta_button_text_addt2' );
    $poster_url = get_sub_field( 'pc_video_poster' );

    $book_tours = get_sub_field( 'pc_book_tours_link' );
    $cta_button_radius = get_sub_field( 'pc_cta_button_radius' );
    $text_align = get_sub_field( 'pc_text_align' );
    $integrate_xola = get_field( 'pc_integrate_xola_with_this_website', 'option' );
    $integrate_peek = get_field( 'pc_integrate_peek_with_this_website', 'option' );
    $third_party = get_sub_field( 'pc_third_party' );
    $pc_cta_onclick = get_sub_field( 'pc_cta_onclick' );

    $banner_type = get_sub_field( 'pc_image_type' ); ?>

        <section class="pc_hero-area__banner">
            <div class="pc_hero-area__wrapper">

                <?php if ( $banner_type == 'Single image' ) :
                    include ( PCA_DIR . '/head/temp/pc-banner-image.php' );
                elseif ( $banner_type == 'Slider images' ) :
                    include ( PCA_DIR . '/head/temp/pc-banner-slider.php' );
                elseif ( $banner_type == 'Background video' ) :
                    include ( PCA_DIR . '/head/temp/pc-banner-video.php' );
                endif ?>

            </div>

    <?php $banner_divi = get_sub_field( 'pc_ha_bd' );

            if ( $banner_divi == 'repeater' ) {
                $banner_divi_сss = 'background: url(' . get_sub_field( 'pc_ha_bd_repeater' ) . ') 50% 50%;';
                echo $banner_divi_сss ? '<div style="' . $banner_divi_сss . '" id="pc_ha_' . $banner_divi . '"></div>' : '';
            } elseif ( $banner_divi == 'image' ) {
                $banner_divi_сss = 'background: none;';
                $banner_divi_content = '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" data-aload="' . get_sub_field( 'pc_ha_bd_image' ) . '" alt="" />';
                echo $banner_divi_сss ? '<div style="' . $banner_divi_сss . '" id="pc_ha_' . $banner_divi . '">' . $banner_divi_content . '</div>' : '';
            } elseif ( $banner_divi == 'gradient' ) {
                $banner_divi_сss = ' 
                    background: ' . get_sub_field( 'pc_ha_bd_gradient' ) . ';
                    background: -moz-linear-gradient(top, ' . get_sub_field( 'pc_ha_bd_gradient' ) . ' 0%, rgba(255,255,255,0) 100%);
                    background: -webkit-linear-gradient(top, ' . get_sub_field( 'pc_ha_bd_gradient' ) . ' 0%, rgba(255,255,255,0) 100%);
                    background: linear-gradient(to bottom, ' . get_sub_field( 'pc_ha_bd_gradient' ) . ' 0%, rgba(255,255,255,0) 100%);  
                ';
                echo $banner_divi_сss ? '<div style="' . $banner_divi_сss . '" id="pc_ha_' . $banner_divi . '"></div>' : '';
            } ?>

        </section>
    </div>






</div>
