<?php  
/**
 * Benner assets
 */

if ( have_rows( $ha_style, 'option' ) ) :

    echo '<style>';

        while ( have_rows( $ha_style, 'option' ) ) : the_row();

            /**
             * Title styles
             *
             * $ii - this is 1, 2, 3 variables
             */
            for ( $ii = 1; $ii < 4; $ii++ ) {

                if ( $title[$ii] ) {
                    $color = get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] . '_color' );
                    $shadow = get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] . '_shadow' );

                    $css = pc_init_font_css( get_sub_field( 'ha_style__headline-' . $ii . '-' . $tag[$ii] ) );
                    $css[1] .= $color ? 'color:' . $color . ';' : '';
                    $css[1] .= $shadow ? 'text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.3);' : '';

                    echo $css[0];
                    echo '.' . $ha_style . ' #pc_hero-area ' . $tag[$ii] . '.hero-area_title-' . $ii . ' {' . $css[1] . '}';

                    /**
                     * Media queries
                     */
                    $css       = '';
                    if ( have_rows( $ii . '-' . $tag[$ii] . '_media' ) ) {
                        while ( have_rows( $ii . '-' . $tag[$ii] . '_media' ) ) {
                            the_row();

                            $typography = get_sub_field( 'typography' );
                            $css       .= $typography['font_size'] ? 'font-size:' . $typography['font_size'] . 'px;' : '';
                            $css       .= $typography['line_height'] ? 'font-height:' . $typography['line_height'] . 'px;' : '';
                            $css       .= get_sub_field( 'margin-top' ) ? 'margin-top:' . get_sub_field( 'margin-top' ) . 'px;' : '';
                            $css       .= get_sub_field( 'margin-bottom' ) ? 'margin-bottom:' . get_sub_field( 'margin-bottom' ) . 'px;' : '';

                            
                            echo '@media (max-width: ' . get_sub_field( 'device' ) . ') {';

                                echo '.' . $ha_style . ' #pc_hero-area ' . $tag[$ii] . '.hero-area_title-' . $ii . ' {' . $css . '}';

                            echo '}'; 
                        }
                    }
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
            echo $ha_style__ccc_css[1] ? '.' . $ha_style . ' #pc_hero-area .pc_hero-area__action-btn {' . $ha_style__ccc_css[1] . '}' : '';
            echo $ha_style__ccc_css_hover ? '.' . $ha_style . ' #pc_hero-area .pc_hero-area__action-btn:hover {' . $ha_style__ccc_css_hover . '}' : '';

            if ( $button_type == 'Search Box' ) :

                /**
                 * Search box styles
                 */
                
                /**
                 * Input/Textarea field
                 */
                $ha_style__ccc_css = pc_content_init_form( get_sub_field( 'ha_style__sarh' ) );

                $ha_style__ccc_css[1] .= 'color:' . get_sub_field( 'ha_style__sarh_te_c' ) . ';';
                $ha_style__ccc_css[1] .= 'background-color:' . get_sub_field( 'ha_style__sarh_bg_c' ) . ';';

                $ha_style__ccc_css[1] .= 'border-color:' . get_sub_field( 'ha_style__sarh_bo_c' ) . ';';

                echo $ha_style__ccc_css[0] ? $ha_style__ccc_css[0] : '';
                echo $ha_style__ccc_css[1] ? '.' . $ha_style . ' .home_page_search .form-control, .' . $ha_style . ' .home_page_search #endTime, .' . $ha_style . ' .home_page_search #startTime, .' . $ha_style . ' .home_page_search #num_people {'.$ha_style__ccc_css[1].'}' : '';

                /**
                 * Input placeholder
                 */
                $ha_style__ccc_css = get_sub_field( 'ha_style__sarh_pc_c' ) ? 'color:' . get_sub_field( 'ha_style__sarh_pc_c' ) . ';' : '';

                echo $ha_style__ccc_css ? '.' . $ha_style . ' .home_page_search .form-control::-webkit-input-placeholder {' . $ha_style__ccc_css . '}' : '';
                echo $ha_style__ccc_css ? '.' . $ha_style . ' .home_page_search .form-control::-moz-placeholder {' . $ha_style__ccc_css . '}' : '';
                echo $ha_style__ccc_css ? '.' . $ha_style . ' .home_page_search .form-control:-moz-placeholder {' . $ha_style__ccc_css . '}' : '';
                echo $ha_style__ccc_css ? '.' . $ha_style . ' .home_page_search .form-control:-ms-input-placeholder {' . $ha_style__ccc_css . '}' : '';



                $ha_base_color = get_sub_field('ha_style__base-color') ? 'color:' . get_sub_field( 'ha_style__base-color' ) . ';' : '';

                echo $ha_base_color ? '.' . $ha_style . ' .home_page_search .fa:not(.fa-search), #vinetrekker_piker .fa, #vinetrekker_piker .active, #vinetrekker_piker .table-condensed .prev.available i:before, #vinetrekker_piker .table-condensed .next.available i:before {' . $ha_base_color . '}' : '';
                echo $ha_base_color ? '#vinetrekker_piker.daterangepicker td.active, #vinetrekker_piker.daterangepicker td.active:hover, #vinetrekker_piker.daterangepicker td.active.available.selectredzy, #vinetrekker_piker.daterangepicker td.active.available.selectredzy:hover, #vinetrekker_piker.daterangepicker .calendar td.active.available.selectredzy, #vinetrekker_piker.daterangepicker .calendar td.active.available {background-'.$ha_base_color.'}' : ''; 


                /**
                 * Button styles
                 */
                $ha_style__button_font_color = get_sub_field( 'ha_style__sabt_label_font-color' );
                $ha_style__ccc_css = pc_init_font_css( get_sub_field( 'ha_style__sabt_label_font' ) );
                $ha_style__ccc_css[1] .= $ha_style__button_font_color ? 'color:' . $ha_style__button_font_color . ';' : '';

                echo $ha_style__button_font_color ? '.' . $ha_style . ' .home_page_search .add-on i { pointer-events: none; transition: ease .3s; color:'.$ha_style__button_font_color.';}' : '';

                /* Set Button styles */
                if ( get_sub_field( 'ha_style__sabt_style' ) == 'text' ) {
                    $ha_style__ccc_css[1] .= 'border-radius: 0;background: none;';
                } elseif ( get_sub_field( 'ha_style__sabt_style' ) == 'square' ) {
                    $ha_style__ccc_css[1] .= 'border-radius: 0; padding: .4em .7em;';
                } elseif ( get_sub_field( 'ha_style__sabt_style' ) == 'round' ) {
                    $ha_style__ccc_css[1] .= 'border-radius: 50%; padding: .4em .7em;';
                } elseif ( get_sub_field( 'ha_style__sabt_style' ) == 'corner' ) {
                    $ha_style__ccc_css[1] .= 'border-radius: 5px; padding: .4em .7em;';
                }

                /* Button BG */
                if ( get_sub_field( 'ha_style__sabt_bg' ) ) {
                    $ha_style__ccc_css[1] .= 'background-color:' . get_sub_field( 'ha_style__sabt_bg' ) . ';';
                }

                $ha_style__ccc_css[1] .= 'transition: ease .3s;';
                $ha_style__ccc_css_hover = 'transition: ease .3s;';

                /* Mouseover effect */
                $ha_style__button_hover_object = get_sub_field( 'ha_style__sabt_hover' );
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
                        $ha_style__ccc_css_hover .= 'color:' . get_sub_field( 'ha_style__sabt_bg' ) .';';
                        echo  '.' . $ha_style . ' .home_page_search .add-on .rezdy_search:hover + i, .' . $ha_style . ' .home_page_search .add-on .rezdy_search:active + i { transition: ease .3s; color:'.get_sub_field( 'ha_style__sabt_bg' ).';}';
                    } 

                    if ( $ha_style__button_hover_object_text ) {
                        $ha_style__ccc_css_hover .= 'text-decoration:underline;';
                    } 
                }

                /* Set Button border */
                if ( get_sub_field( 'ha_style__sabt_bor' ) != 'no' ) {
                    $ha_style__button_bor_width = get_sub_field( 'ha_style__sabt_bor_width' );

                    $ha_style__ccc_css_hover .= $ha_style__button_bor_width . 'px solid ' . $ha_style__button_font_color . ';';
                    $ha_style__ccc_css[1] .= 'padding: .4em .7em!important;';

                    if ( get_sub_field( 'ha_style__sabt_bor' ) == 'yes' ) {
                        $ha_style__button_bor = $ha_style__button_bor_width . 'px solid ' . $ha_style__button_font_color;
                        $ha_style__ccc_css[1] .= 'border:' . $ha_style__button_bor_width . 'px solid ' . $ha_style__button_font_color . ';';
                    } elseif ( get_sub_field( 'ha_style__sabt_bor' ) == 'hover' ) {
                        $ha_style__ccc_css[1] .= 'border:' . $ha_style__button_bor_width . 'px solid transparent;';
                    }
                }

                /* Label Shadow */
                if ( get_sub_field( 'ha_style__sabt_label_sha' ) ) {
                    $ha_style__ccc_css[1] .= 'text-shadow: 1px 1px 3px rgba(0,0,0,.3), 1px 1px 3px rgba(0,0,0,.3);';
                }

                echo $ha_style__ccc_css[0] ? $ha_style__ccc_css[0] : '';
                echo $ha_style__ccc_css[1] ? '.' . $ha_style . ' .home_page_search .rezdy_search {' . $ha_style__ccc_css[1] . '}' : '';
                echo '.' . $ha_style . ' .home_page_search .rezdy_search:hover {' . $ha_style__ccc_css_hover . '}';
                echo '.' . $ha_style . ' .home_page_search .rezdy_search:active {' . $ha_style__ccc_css_hover . '}';

                echo '.home_page_search.integrate_atlasx{ padding: 30px 0; }';

                $ha_bg = get_sub_field( 'ha_style__section-color' );

                if ( $ha_bg ) echo ".{$ha_style} .home_page_search.integrate_atlasx { background-color: {$ha_bg}; }";

            endif;

        endwhile;

    echo '</style>';

endif;


?>