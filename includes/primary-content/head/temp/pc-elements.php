<div class="banner-width__wrap">
    <div class="
        pc-hero-content 
        pc-hero-content__<?php echo $hero_height; ?>
        pc-hero-content__<?php echo $hero_width; ?>
        pc-hero-content__<?php echo $hero_align_v; ?>
        pc-hero-content__<?php echo $hero_align_h; ?>
    "> 

        <?php 
            for ( $i = 1; $i < 4; $i++ ) {
                $title    = get_sub_field( 'pc_ha_' . $i . '-tit' );
                $title_mt = get_sub_field( 'pc_ha_' . $i . '-tit-mt' ) ? get_sub_field( 'pc_ha_' . $i . '-tit-mt' ) . 'px' : '';
                $title_mb = get_sub_field( 'pc_ha_' . $i . '-tit-mb' ) ? get_sub_field( 'pc_ha_' . $i . '-tit-mb' ) . 'px' : '';
                $tag      = get_sub_field( 'pc_ha_' . $i . '-tit_seo' );
                $hr       = get_sub_field( 'pc_ha_' . $i . '-tit_hr' );
                $hr_c     = get_sub_field( 'pc_ha_' . $i . '-tit_hr-c' ) ? get_sub_field( 'pc_ha_' . $i . '-tit_hr-c' ) : '#333';
                $hr_w     = get_sub_field( 'pc_ha_' . $i . '-tit_hr-w' );
                $hr_i     = get_sub_field( 'pc_ha_' . $i . '-tit_hr-i' ) ? get_sub_field( 'pc_ha_' . $i . '-tit_hr-i' ) : '';

                if ( $title ) {
                    $style = '';
                    $style .= $title_mt ? 'margin-top:' . $title_mt . ';' : '';
                    $style .= $title_mb ? 'margin-bottom:' . $title_mb . ';' : '';
                    $style = $title_mt || $title_mb ? "style='{$style}'" : '';

                    echo $title ? '<' . $tag . ' class="hero-area_title-' . $i . '" ' . $style . '>' . $title . '</' . $tag . '>' : '';
                    echo $hr && !$hr_i ? '<hr class="pc_ha_hr pc_ha_hr-' . $hr_w . '" style="color:' . $hr_c . ';">' : '';
                    echo $hr && $hr_i ? '<img class="pc_ha_hr-img" src="'. $hr_i . '" alt="" />' : '';
                }
            }
        ?>

        <?php if ( $cta_button_text || $cta_button_text_addt ) include( PCA_DIR . '/head/temp/pc-elements-button.php' ); ?>
    </div>

    <?php include( PCA_DIR . '/head/temp/pc-banner-addons.php' ); ?>
</div>