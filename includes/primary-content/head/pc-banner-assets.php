<?php  
/**
 * Benner assets
 */

if ( have_rows( $ha_style, 'option' ) ) :

    echo '<style>';

        while ( have_rows( $ha_style, 'option' ) ) : the_row();

            /**
             * Title styles
            */

            for ( $ii = 1; $ii < 4; $ii++ ) {

                if ( $title[$ii] ) {
                    $color = get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] . '_color' );
                    $shadow = get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] . '_shadow' );

                    $css = pc_init_font_css( get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] ) );
                    $css[1] .= $color ? 'color:' . $color . ';' : '';
                    $css[1] .= $shadow ? 'text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.3);' : '';

                    echo $css[0];
                    echo '#pc_hero-area.' . $ha_style . ' ' . $tag[$ii] . '.hero-area_title-' . $ii . ' {' . $css[1] . '}';
                }

            }

            /**
             * Button styles
             */
            
            $ha_style__button_font_color = get_sub_field( 'ha_style__button_label_font-color' );
            $ha_style__ccc_css = pc_init_font_css( get_sub_field( 'ha_style__button_label_font' ) );
            $ha_style__ccc_css[1] .= $ha_style__button_font_color ? 'color:' . $ha_style__button_font_color . ';' : '';


            /* Set Button styles */
            if ( get_sub_field( 'ha_style__button_style' ) == 'text' ) {
                $ha_style__ccc_css[1] .= 'border-radius: 0;background: none;';
            } elseif ( get_sub_field( 'ha_style__button_style' ) == 'square' ) {
                $ha_style__ccc_css[1] .= 'border-radius: 0; padding: .4em .7em;';
            } elseif ( get_sub_field( 'ha_style__button_style' ) == 'round' ) {
                $ha_style__ccc_css[1] .= 'border-radius: 50%; padding: .4em .7em;';
            } elseif ( get_sub_field( 'ha_style__button_style' ) == 'corner' ) {
                $ha_style__ccc_css[1] .= 'border-radius: 5px; padding: .4em .7em;';
            }

            /* Button BG */
            if ( get_sub_field( 'ha_style__button_bg' ) ) {
                $ha_style__ccc_css[1] .= 'background-color:' . get_sub_field( 'ha_style__button_bg' ) . ';';
            } else {
                $ha_style__ccc_css[1] .= 'background-color:transparent;';
            }

            $ha_style__ccc_css[1] .= 'transition: ease .3s;';
            $ha_style__ccc_css_hover = 'transition: ease .3s;';

            /* Mouseover effect */
            $ha_style__button_hover_object = get_sub_field( 'ha_style__button_hover' );
            $ha_style__button_hover_object_color = false;
            $ha_style__button_hover_object_text = false;

            if ( $ha_style__button_hover_object ) {
                foreach ( $ha_style__button_hover_object as $value ) {
                    if ( $value == 'color' ) {
                        $ha_style__button_hover_object_color = true;
                    } elseif ( $value == 'text' ) {
                        $ha_style__button_hover_object_text = true;
                    }
                }

                if ( $ha_style__button_hover_object_color ) {
                    $ha_style__ccc_css_hover .= 'background-color:' . $ha_style__button_font_color .';';
                    $ha_style__ccc_css_hover .= 'color:' . get_sub_field( 'ha_style__button_bg' ) .';';
                } 

                if ( $ha_style__button_hover_object_text ) {
                    $ha_style__ccc_css_hover .= 'text-decoration:underline;';
                } 
            }

            /* Set Button border */
            if ( get_sub_field( 'ha_style__button_bor' ) != 'no' ) {
                $ha_style__button_bor_width = get_sub_field( 'ha_style__button_bor_width' );

                $ha_style__ccc_css_hover .= $ha_style__button_bor_width . 'px solid ' . $ha_style__button_font_color . ';';
                $ha_style__ccc_css[1] .= 'padding: .4em .7em;';

                if ( get_sub_field( 'ha_style__button_bor' ) == 'yes' ) {
                    $ha_style__button_bor = $ha_style__button_bor_width . 'px solid ' . $ha_style__button_font_color;
                    $ha_style__ccc_css[1] .= 'border:' . $ha_style__button_bor_width . 'px solid ' . get_sub_field( 'ha_style__button_bg' ) . ';';
                } elseif ( get_sub_field( 'ha_style__button_bor' ) == 'hover' ) {
                    $ha_style__ccc_css[1] .= 'border:' . $ha_style__button_bor_width . 'px solid transparent;';
                }
            }

            /* Label Shadow */
            if ( get_sub_field( 'ha_style__button_label_sha' ) ) {
                $ha_style__ccc_css[1] .= 'text-shadow: 1px 1px 3px rgba(0,0,0,.3), 1px 1px 3px rgba(0,0,0,.3);';
            }

            echo $ha_style__ccc_css[0] ? $ha_style__ccc_css[0] : '';
            echo $ha_style__ccc_css[1] ? '#pc_hero-area.' . $ha_style . ' .pc_hero-area__action-btn {' . $ha_style__ccc_css[1] . '}' : '';
            echo $ha_style__ccc_css_hover ? '#pc_hero-area.' . $ha_style . ' .pc_hero-area__action-btn:hover {' . $ha_style__ccc_css_hover . '}' : '';

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