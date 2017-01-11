<?php

$cc_styles_arr = array();

function get_pc_content_card_style( $cc_style ) {


		if ( have_rows( $cc_style, 'option' ) ) {

			while ( have_rows( $cc_style, 'option' ) ) { 
				the_row();

				/* Set BG */
				if ( get_sub_field( 'cc_style__bg' ) == 'none' ) {
					$cc_style__bg = 'none';
				} elseif ( get_sub_field( 'cc_style__bg' ) == 'texture' ) {
					$cc_style__bg = 'url(' . get_sub_field( "cc_style__bg_texture" ) . ') center center repeat';
				} elseif ( get_sub_field( 'cc_style__bg' ) == 'color' ) {
					$cc_style__bg = get_sub_field( 'cc_style__bg_color' );
				}

				/* Headline */
				if ( get_sub_field( 'cc_style__headline' ) ) {
					$cc_style__headline = get_sub_field( 'cc_style__headline' );
					$cc_style__headline_color = get_sub_field( 'cc_style__headline-color' );

					if ( $cc_style__headline['font_family'] ) {
						$cc_style__headline_family = $cc_style__headline['font_family'];
					} else {
						$cc_style__headline_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__headline['font_weight'] ) {
						$cc_style__headline_weight = $cc_style__headline['font_weight'];
					} else {
						$cc_style__headline_weight = 400;
					}

					$cc_style__headline_set =  "font-family:" . $cc_style__headline_family . ";";
					$cc_style__headline_set .=  "font-weight:" . $cc_style__headline_weight . ";";
					$cc_style__headline_set .=  "text-align:" . $cc_style__headline['text_align'] . ";";
					$cc_style__headline_set .=  "font-size:" . $cc_style__headline['font_size'] . "px;";
					$cc_style__headline_set .=  "line-height:" . $cc_style__headline['line_height'] . "px;";
					$cc_style__headline_set .=  "color:" . $cc_style__headline_color . ";";
					$cc_style__headline_set .=  "font-style:" . $cc_style__headline['font_style'] . ";";
				}

				/* Sub Headline */
				if ( get_sub_field( 'cc_style__sub-headline' ) ) {
					$cc_style__sub_headline = get_sub_field( 'cc_style__sub-headline' );
					$cc_style__sub_headline_color = get_sub_field( 'cc_style__sub-headline-color' );

					if ( $cc_style__sub_headline['font_family'] ) {
						$cc_style__sub_headline_family = $cc_style__sub_headline['font_family'];
					} else {
						$cc_style__sub_headline_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__sub_headline['font_weight'] ) {
						$cc_style__sub_headline_weight = $cc_style__sub_headline['font_weight'];
					} else {
						$cc_style__sub_headline_weight = 400;
					}

					$cc_style__sub_headline_set =  "font-family:" . $cc_style__sub_headline_family . ";";
					$cc_style__sub_headline_set .=  "font-weight:" . $cc_style__sub_headline_weight . ";";
					$cc_style__sub_headline_set .=  "text-align:" . $cc_style__sub_headline['text_align'] . ";";
					$cc_style__sub_headline_set .=  "font-size:" . $cc_style__sub_headline['font_size'] . "px;";
					$cc_style__sub_headline_set .=  "line-height:" . $cc_style__sub_headline['line_height'] . "px;";
					$cc_style__sub_headline_set .=  "color:" . $cc_style__sub_headline_color . ";";
					$cc_style__sub_headline_set .=  "font-style:" . $cc_style__sub_headline['font_style'] . ";";
				}

				/* Editor */
				if ( get_sub_field( 'cc_style__editor' ) ) {
					$cc_style__editor = get_sub_field( 'cc_style__editor' );
					$cc_style__editor_color = get_sub_field( 'cc_style__editor-color' );

					if ( $cc_style__editor['font_family'] ) {
						$cc_style__editor_family = $cc_style__editor['font_family'];
					} else {
						$cc_style__editor_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__editor['font_weight'] ) {
						$cc_style__editor_weight = $cc_style__editor['font_weight'];
					} else {
						$cc_style__editor_weight = 400;
					}

					$cc_style__editor_set =  "font-family:" . $cc_style__editor_family . ";";
					$cc_style__editor_set .=  "font-weight:" . $cc_style__editor_weight . ";";
					$cc_style__editor_set .=  "text-align:" . $cc_style__editor['text_align'] . ";";
					$cc_style__editor_set .=  "font-size:" . $cc_style__editor['font_size'] . "px;";
					$cc_style__editor_set .=  "line-height:" . $cc_style__editor['line_height'] . "px;";
					$cc_style__editor_set .=  "color:" . $cc_style__editor_color . ";";
					$cc_style__editor_set .=  "font-style:" . $cc_style__editor['font_style'] . ";";

					if ( get_sub_field( 'cc_style__editor_link' ) ) {
						$cc_style__editor_link = get_sub_field( 'cc_style__editor_link' );
					} else {
						$cc_style__editor_link = 'blue';
					}
				}

				/* Support 1 */
				if ( get_sub_field( 'cc_style__button_supone_font' ) ) {
					$cc_style__button_supone_font = get_sub_field( 'cc_style__button_supone_font' );
					$cc_style__button_supone_font_color = get_sub_field( 'cc_style__button_supone_font-color' );

					if ( $cc_style__button_supone_font['font_family'] ) {
						$cc_style__button_supone_font_family = $cc_style__button_supone_font['font_family'];
					} else {
						$cc_style__button_supone_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__button_supone_font['font_weight'] ) {
						$cc_style__button_supone_font_weight = $cc_style__button_supone_font['font_weight'];
					} else {
						$cc_style__button_supone_font_weight = 400;
					}

					$cc_style__button_supone_font_set =  "font-family: " . $cc_style__button_supone_font_family . "; ";
					$cc_style__button_supone_font_set .=  "font-weight: " . $cc_style__button_supone_font_weight . "; ";
					$cc_style__button_supone_font_set .=  "text-align: " . $cc_style__button_supone_font['text_align'] . "; ";
					$cc_style__button_supone_font_set .=  "font-size: " . $cc_style__button_supone_font['font_size'] . "px; ";
					$cc_style__button_supone_font_set .=  "line-height: " . $cc_style__button_supone_font['line_height'] . "px; ";
					$cc_style__button_supone_font_set .=  "color: " . $cc_style__button_supone_font_color . "; ";
					$cc_style__button_supone_font_set .=  "font-style: " . $cc_style__button_supone_font['font_style'] . "; ";
				} else { $cc_style__button_supone_font_set = '// Styles for title is empty'; }

				/* Support 2 */
				if ( get_sub_field( 'cc_style__button_suptwo_font' ) ) {
					$cc_style__button_suptwo_font = get_sub_field( 'cc_style__button_suptwo_font' );
					$cc_style__button_suptwo_font_color = get_sub_field( 'cc_style__button_suptwo_font-color' );

					if ( $cc_style__button_suptwo_font['font_family'] ) {
						$cc_style__button_suptwo_font_family = $cc_style__button_suptwo_font['font_family'];
					} else {
						$cc_style__button_suptwo_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__button_suptwo_font['font_weight'] ) {
						$cc_style__button_suptwo_font_weight = $cc_style__button_suptwo_font['font_weight'];
					} else {
						$cc_style__button_suptwo_font_weight = 400;
					}

					$cc_style__button_suptwo_font_set =  "font-family: " . $cc_style__button_suptwo_font_family . "; ";
					$cc_style__button_suptwo_font_set .=  "font-weight: " . $cc_style__button_suptwo_font_weight . "; ";
					$cc_style__button_suptwo_font_set .=  "text-align: " . $cc_style__button_suptwo_font['text_align'] . "; ";
					$cc_style__button_suptwo_font_set .=  "font-size: " . $cc_style__button_suptwo_font['font_size'] . "px; ";
					$cc_style__button_suptwo_font_set .=  "line-height: " . $cc_style__button_suptwo_font['line_height'] . "px; ";
					$cc_style__button_suptwo_font_set .=  "color: " . $cc_style__button_suptwo_font_color . "; ";
					$cc_style__button_suptwo_font_set .=  "font-style: " . $cc_style__button_suptwo_font['font_style'] . "; ";
				} else { $cc_style__button_suptwo_font_set = '// Styles for title is empty'; }

				/* Button lable */
				if ( get_sub_field( 'cc_style__button_label_font' ) ) {
					$cc_style__button_font = get_sub_field( 'cc_style__button_label_font' );
					$cc_style__button_font_color = get_sub_field( 'cc_style__button_label_font-color' );

					if ( $cc_style__button_font['font_family'] ) {
						$cc_style__button_font_family = $cc_style__button_font['font_family'];
					} else {
						$cc_style__button_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__button_font['font_weight'] ) {
						$cc_style__button_font_weight = $cc_style__button_font['font_weight'];
					} else {
						$cc_style__button_font_weight = 400;
					}

					$cc_style__button_font_set =  "font-family: " . $cc_style__button_font_family . "; ";
					$cc_style__button_font_set .=  "font-weight: " . $cc_style__button_font_weight . "; ";
					$cc_style__button_font_set .=  "text-align: " . $cc_style__button_font['text_align'] . "; ";
					$cc_style__button_font_set .=  "font-size: " . $cc_style__button_font['font_size'] . "px; ";
					$cc_style__button_font_set .=  "line-height: " . $cc_style__button_font['line_height'] . "px; ";
					$cc_style__button_font_set .=  "color: " . $cc_style__button_font_color . "; ";
					$cc_style__button_font_set .=  "font-style: " . $cc_style__button_font['font_style'] . "; ";
				} else { $cc_style__button_font_set = '// Styles for title is empty'; }

				$cc_style__button_style_pad = 'padding: 0';

				/* Set Button styles */
				if ( get_sub_field( 'cc_style__button_style' ) == 'text' ) {
					$cc_style__button_style = 'border-radius: 0; background: none!important;';
				} elseif ( get_sub_field( 'cc_style__button_style' ) == 'square' ) {
					$cc_style__button_style = 'border-radius: 0;';
					$cc_style__button_style_pad = 'padding: .4em .7em;';
				} elseif ( get_sub_field( 'cc_style__button_style' ) == 'round' ) {
					$cc_style__button_style = 'border-radius: 50%; padding: .4em .7em;';
					$cc_style__button_style_pad = 'padding: .4em .7em;';
				} elseif ( get_sub_field( 'cc_style__button_style' ) == 'corner' ) {
					$cc_style__button_style = 'border-radius: 5px;';
					$cc_style__button_style_pad = 'padding: .4em .7em;';
				}

				/* Button BG */
				if ( get_sub_field( 'cc_style__button_bg' ) ) {
					$cc_style__button_bg_color = get_sub_field( 'cc_style__button_bg' );
					$cc_style__button_bo_color = get_sub_field( 'cc_style__button_bg' );
				} else {
					$cc_style__button_bg_color = 'transparent';
					$cc_style__button_bo_color = $cc_style__button_font_color;
				}

				/* Mouseover effect */
				$cc_style__button_hover_object = get_sub_field( 'cc_style__button_hover' );
				$cc_style__button_hover_object_color = false;
				$cc_style__button_hover_object_text = false;

				if ( $cc_style__button_hover_object ) {
					foreach ( $cc_style__button_hover_object as $value ) {
						if ( $value == 'color' ) {
							$cc_style__button_hover_object_color = true;
						} elseif ( $value == 'text' ) {
							$cc_style__button_hover_object_text = true;
						}
					}

					if ( $cc_style__button_hover_object_color ) {
						$cc_style__button_hover_bg_color = $cc_style__button_font_color;
						$cc_style__button_hover_te_color = $cc_style__button_bg_color;
					} else {
						$cc_style__button_hover_bg_color = $cc_style__button_bg_color;
						$cc_style__button_hover_te_color = $cc_style__button_font_color;
					}

					if ( $cc_style__button_hover_object_text ) {
						$cc_style__button_hover_te_deco = 'underline';
					} else {
						$cc_style__button_hover_te_deco = 'none';
					}
				}

				/* Set Button border */
				if ( get_sub_field( 'cc_style__button_bor' ) == 'no' ) {
					$cc_style__button_bor = 'none';
					$cc_style__button_bor_hover = 'none';
				} else {
					$cc_style__button_bor_width = get_sub_field( 'cc_style__button_bor_width' );
					if ( $cc_style__button_hover_object_color ) {
						$cc_style__button_bor_hover = $cc_style__button_bor_width . 'px solid ' . $cc_style__button_hover_bg_color;
					} else {
						$cc_style__button_bor_hover = $cc_style__button_bor_width . 'px solid ' . $cc_style__button_bo_color;
					}
					$cc_style__button_style_pad = 'padding: .4em .7em;';

					if ( get_sub_field( 'cc_style__button_bor' ) == 'yes' ) {
						$cc_style__button_bor = $cc_style__button_bor_width . 'px solid ' . $cc_style__button_font_color;
					} elseif ( get_sub_field( 'cc_style__button_bor' ) == 'hover' ) {
						$cc_style__button_bor = $cc_style__button_bor_width . 'px solid transparent';
					}
				}

				/* Label Shadow */
				if ( get_sub_field( 'cc_style__button_label_sha' ) ) {
					$cc_style__button_label_sha = '1px 1px 3px rgba(0,0,0,.3), 1px 1px 3px rgba(0,0,0,.3)';
				} else {
					$cc_style__button_label_sha = 'none';
				}

				$tour_line_width_percent = get_sub_field( 'cc_style__hl_width' );
				$tour_line_color = get_sub_field( 'cc_style__hl_color' );
				$tour_line_thi = get_sub_field( 'cc_style__hl_thi' );

				/* Horizontal Line Color */
				if ( get_sub_field( 'cc_style__hl_color' ) ) {
					$cc_style__hl_color = get_sub_field( 'cc_style__hl_color' );
				} else {
					$cc_style__hl_color = '#000';
				}

				/* Horizontal Line Thchness */
				if ( get_sub_field( 'cc_style__hl_thi' ) ) {
					$cc_style__hl_thi = get_sub_field( 'cc_style__hl_thi' ) . 'px';
				} else {
					$cc_style__hl_thi = '1px';
				}

				/* Horizontal Line Width */
				if ( get_sub_field( 'cc_style__hl_width' ) == 'full' ) {
					$cc_style__hl_width = '100%';
				} elseif ( get_sub_field( 'cc_style__hl_width' ) == 'three-four' ) {
					$cc_style__hl_width = '75%';
				} elseif ( get_sub_field( 'cc_style__hl_width' ) == 'three-four' ) {
					$cc_style__hl_width = '50%';
				}

				/* Accordion Label Font */
				if ( get_sub_field( 'cc_style__a-l_font' ) ) {
					$cc_style__a_l_font = get_sub_field( 'cc_style__a-l_font' );
					$cc_style__a_l_font_color = get_sub_field( 'cc_style__a-l_font-color' );

					if ( $cc_style__a_l_font['font_family'] ) {
						$cc_style__a_l_font_family = $cc_style__a_l_font['font_family'];
					} else {
						$cc_style__a_l_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__a_l_font['font_weight'] ) {
						$cc_style__a_l_font_weight = $cc_style__a_l_font['font_weight'];
					} else {
						$cc_style__a_l_font_weight = 400;
					}

					$cc_style__a_l_font_set =  "font-family:" . $cc_style__a_l_font_family . ";";
					$cc_style__a_l_font_set .=  "font-weight:" . $cc_style__a_l_font_weight . ";";
					$cc_style__a_l_font_set .=  "text-align:" . $cc_style__a_l_font['text_align'] . ";";
					$cc_style__a_l_font_set .=  "font-size:" . $cc_style__a_l_font['font_size'] . "px;";
					$cc_style__a_l_font_set .=  "line-height:" . $cc_style__a_l_font['line_height'] . "px;";
					$cc_style__a_l_font_set .=  "color:" . $cc_style__a_l_font_color . ";";
					$cc_style__a_l_font_set .=  "font-style:" . $cc_style__a_l_font['font_style'] . ";";
				}

				/* Accordion Label Font Link Hover */
				if ( get_sub_field( 'cc_style__a-l_font-hover' ) ) {
					$cc_style__a_l_font_hover = get_sub_field( 'cc_style__a-l_font-hover' );
				}

				/* Accordion Paragraf Font */
				if ( get_sub_field( 'cc_style__a-p_font' ) ) {
					$cc_style__a_p_font = get_sub_field( 'cc_style__a-p_font' );
					$cc_style__a_p_font_color = get_sub_field( 'cc_style__a-p_font-color' );

					if ( $cc_style__a_p_font['font_family'] ) {
						$cc_style__a_p_font_family = $cc_style__a_p_font['font_family'];
					} else {
						$cc_style__a_p_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style__a_p_font['font_weight'] ) {
						$cc_style__a_p_font_weight = $cc_style__a_p_font['font_weight'];
					} else {
						$cc_style__a_p_font_weight = 400;
					}

					$cc_style__a_p_font_set =  "font-family:" . $cc_style__a_p_font_family . ";";
					$cc_style__a_p_font_set .=  "font-weight:" . $cc_style__a_p_font_weight . ";";
					$cc_style__a_p_font_set .=  "text-align:" . $cc_style__a_p_font['text_align'] . ";";
					$cc_style__a_p_font_set .=  "font-size:" . $cc_style__a_p_font['font_size'] . "px;";
					$cc_style__a_p_font_set .=  "line-height:" . $cc_style__a_p_font['line_height'] . "px;";
					$cc_style__a_p_font_set .=  "color:" . $cc_style__a_p_font_color . ";";
					$cc_style__a_p_font_set .=  "font-style:" . $cc_style__a_p_font['font_style'] . ";";
				}

				/* Accordion Paragraf Font Link Hover */
				if ( get_sub_field( 'cc_style__a-p_font-link' ) ) {
					$cc_style__a_p_font_link = get_sub_field( 'cc_style__a-p_font-link' );
				}

				/* Testimonial title Font */
				if ( get_sub_field( 'cc_style__test_title_f' ) ) {
					$cc_style_tes_ti_font = get_sub_field( 'cc_style__test_title_f' );
					$cc_style__tes_ti_font_color = get_sub_field( 'cc_style__test_title_c' );

					if ( $cc_style_tes_ti_font['font_family'] ) {
						$cc_style_tes_ti_font_family = $cc_style_tes_ti_font['font_family'];
					} else {
						$cc_style_tes_ti_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style_tes_ti_font['font_weight'] ) {
						$cc_style_tes_ti_font_weight = $cc_style_tes_ti_font['font_weight'];
					} else {
						$cc_style_tes_ti_font_weight = 300;
					}

					$cc_style_tes_ti_font_set =  "font-family:" . $cc_style_tes_ti_font_family . ";";
					$cc_style_tes_ti_font_set .=  "font-weight:" . $cc_style_tes_ti_font_weight . ";";
					$cc_style_tes_ti_font_set .=  "text-align:" . $cc_style_tes_ti_font['text_align'] . ";";
					$cc_style_tes_ti_font_set .=  "font-size:" . $cc_style_tes_ti_font['font_size'] . "px;";
					$cc_style_tes_ti_font_set .=  "line-height:" . $cc_style_tes_ti_font['line_height'] . "px;";
					$cc_style_tes_ti_font_set .=  "color:" . $cc_style__tes_ti_font_color . ";";
					$cc_style_tes_ti_font_set .=  "font-style:" . $cc_style_tes_ti_font['font_style'] . ";";
				}

				/* Excerpt title Font */
				if ( get_sub_field( 'cc_style__test_excerpt_f' ) ) {
					$cc_style_tes_ex_font = get_sub_field( 'cc_style__test_excerpt_f' );
					$cc_style__tes_ex_font_color = get_sub_field( 'cc_style__test_excerpt_c' );

					if ( $cc_style_tes_ex_font['font_family'] ) {
						$cc_style_tes_ex_font_family = $cc_style_tes_ex_font['font_family'];
					} else {
						$cc_style_tes_ex_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style_tes_ex_font['font_weight'] ) {
						$cc_style_tes_ex_font_weight = $cc_style_tes_ex_font['font_weight'];
					} else {
						$cc_style_tes_ex_font_weight = 300;
					}

					$cc_style_tes_ex_font_set =  "font-family:" . $cc_style_tes_ex_font_family . ";";
					$cc_style_tes_ex_font_set .=  "font-weight:" . $cc_style_tes_ex_font_weight . ";";
					$cc_style_tes_ex_font_set .=  "text-align:" . $cc_style_tes_ex_font['text_align'] . ";";
					$cc_style_tes_ex_font_set .=  "font-size:" . $cc_style_tes_ex_font['font_size'] . "px;";
					$cc_style_tes_ex_font_set .=  "line-height:" . $cc_style_tes_ex_font['line_height'] . "px;";
					$cc_style_tes_ex_font_set .=  "color:" . $cc_style__tes_ex_font_color . ";";
					$cc_style_tes_ex_font_set .=  "font-style:" . $cc_style_tes_ex_font['font_style'] . ";";
				}

				/* Link title Font */
				if ( get_sub_field( 'cc_style__test_link_f' ) ) {
					$cc_style_tes_li_font = get_sub_field( 'cc_style__test_link_f' );
					$cc_style__tes_li_font_color = get_sub_field( 'cc_style__test_link_c' );
					$cc_style__tes_li_font_color_h = get_sub_field( 'cc_style__test_link_c-h' );

					if ( $cc_style_tes_li_font['font_family'] ) {
						$cc_style_tes_li_font_family = $cc_style_tes_li_font['font_family'];
					} else {
						$cc_style_tes_li_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $cc_style_tes_li_font['font_weight'] ) {
						$cc_style_tes_li_font_weight = $cc_style_tes_li_font['font_weight'];
					} else {
						$cc_style_tes_li_font_weight = 300;
					}

					$cc_style_tes_li_font_set =  "font-family:" . $cc_style_tes_li_font_family . ";";
					$cc_style_tes_li_font_set .=  "font-weight:" . $cc_style_tes_li_font_weight . ";";
					$cc_style_tes_li_font_set .=  "text-align:" . $cc_style_tes_li_font['text_align'] . ";";
					$cc_style_tes_li_font_set .=  "font-size:" . $cc_style_tes_li_font['font_size'] . "px;";
					$cc_style_tes_li_font_set .=  "line-height:" . $cc_style_tes_li_font['line_height'] . "px;";
					$cc_style_tes_li_font_set .=  "color:" . $cc_style__tes_li_font_color . ";";
					$cc_style_tes_li_font_set .=  "font-style:" . $cc_style_tes_li_font['font_style'] . ";";
				}

				if ( in_array( 'quotes', get_sub_field( 'cc_style__test_show' ) ) ) {
					$cc_style_tes_qu_font_c = get_sub_field( 'cc_style__test_quotes_c' );
					$cc_style_tes_qu_font_o = 1;
				} else {
					$cc_style_tes_qu_font_c = '#666';
					$cc_style_tes_qu_font_o = 0;
				}

				$cc_style__test_show = get_sub_field( 'cc_style__test_show' ); ?>

					<style>
						#pc_wrap .<?php echo $cc_style; ?>.pc--c__content {
							background: <?php echo $cc_style__bg; ?>;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__headline > * {
							<?php echo $cc_style__headline_set; ?>;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__subheadline > *  {
							<?php echo $cc_style__sub_headline_set; ?>;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__editor {
							<?php echo $cc_style__editor_set; ?>;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__editor p {
							margin-bottom: 0;
							margin-top: 0;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__editor p + p {
							margin-top: 10px;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__editor a {
							color: <?php echo $cc_style__editor_link; ?>;
						}
						#pc_wrap .<?php echo $cc_style; ?> div.pc--c__editor a:hover {
							text-decoration: underline;
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__button-link {
							<?php echo $cc_style__button_font_set; ?>
							<?php echo $cc_style__button_style; ?>
							background-color: <?php echo $cc_style__button_bg_color; ?>;
							display: inline-block;
							border: <?php echo $cc_style__button_bor; ?>;
							text-shadow: <?php echo $cc_style__button_label_sha; ?>;
							<?php echo $cc_style__button_style_pad; ?>;
							transition: ease .3s;
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__button-link:hover {
							background-color: <?php echo $cc_style__button_hover_bg_color; ?>;
							color: <?php echo $cc_style__button_hover_te_color; ?>;
							text-decoration: <?php echo $cc_style__button_hover_te_deco; ?>;
							border: <?php echo $cc_style__button_bor_hover; ?>;
							transition: ease .3s;
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__button-supone {
							<?php echo $cc_style__button_supone_font_set; ?>
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__button-suptwo {
							<?php echo $cc_style__button_suptwo_font_set; ?>
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__line .pc--c__line-item {
							width: 100px;
							margin: 0 auto;
							border-top: <?php echo $cc_style__hl_thi . ' solid ' . $cc_style__hl_color; ?>;
							width: <?php echo $cc_style__hl_width; ?>
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__accordion--label {
							<?php echo $cc_style__a_l_font_set; ?>
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__accordion--label:hover {
							color: <?php echo $cc_style__a_l_font_hover; ?>;
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__accordion--paragraf {
							<?php echo $cc_style__a_p_font_set; ?>
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__accordion--paragraf a {
							text-decoration: underline;
						}
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__accordion--paragraf a:hover {
							color: <?php echo $cc_style__a_p_font_link; ?>;
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--slider:before,
						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--slider:after {
							font-family: Dosis;
							font-size: 200px;
							font-weight: 500;
							font-style: normal;
							font-stretch: normal;
							text-align: center;
							color: <?php echo $cc_style_tes_qu_font_c; ?>;
							position: absolute;
							top: 0;
							line-height: 1;
							opacity: <?php echo $cc_style_tes_qu_font_o; ?>
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--slider:before {
							content: '“';
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--slider:after {
							content: '”';
							right: 0;
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--slider .slick-dots button {
							background-color: #d8d8d8;
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--slider .slick-dots .slick-active button {
							background-color: <?php echo $cc_style_tes_qu_font_c; ?>;
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--title {
							<?php echo $cc_style_tes_ti_font_set; ?>
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--description {
							<?php echo $cc_style_tes_ex_font_set; ?>
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--link {
							<?php echo $cc_style_tes_li_font_set; ?>
							transition: ease .3s;
						}

						#pc_wrap .<?php echo $cc_style; ?> .pc--c__testimonial--link:hover {
							color: <?php echo $cc_style__tes_li_font_color_h; ?>;
							transition: ease .3s;
						}
					</style>

			<?php } 
		} 

		return $cc_styles_arr;

}

?>