<?php add_action("wp_footer", "add_primary_area_fp_styles");
 
function add_primary_area_fp_styles() { 

	for ( $i = 0; $i < 11; $i++ ) { 
		if ( $i == 1 ) {
			$fc_style = 'fc_style-one';
		} elseif ( $i == 2 ) {
			$fc_style = 'fc_style-two';
		} elseif ( $i == 3 ) {
			$fc_style = 'fc_style-three';
		} elseif ( $i == 4 ) {
			$fc_style = 'fc_style-four';
		} elseif ( $i == 5 ) {
			$fc_style = 'fc_style-five';
		} elseif ( $i == 6 ) {
			$fc_style = 'fc_style-six';
		} elseif ( $i == 7 ) {
			$fc_style = 'fc_style-seven';
		} elseif ( $i == 8 ) {
			$fc_style = 'fc_style-eight';
		} elseif ( $i == 9 ) {
			$fc_style = 'fc_style-nine';
		} elseif ( $i == 10 ) {
			$fc_style = 'fc_style-ten';
		}

		while ( have_rows( $fc_style, 'option' ) ) { the_row(); 

			/* Set background */
			$fc_style_bg = get_sub_field( 'fc_style__bg' );

			if ( $fc_style_bg == 'none' ) {
				$fc_style_bg_css = 'none';
			} elseif ( $fc_style_bg == 'texture' ) {
				$fc_style_bg_texture = get_sub_field( 'fc_style__bg_texture' );
				$fc_style_bg_css = 'url(' . $fc_style_bg_texture . ') center center repeat';
			} elseif ( $fc_style_bg == 'color' ) {
				$fc_style_bg_color = get_sub_field( 'fc_style__bg_color' );
				$fc_style_bg_css = $fc_style_bg_color;
			}

			/* Set border */
			$fc_style_br = get_sub_field( 'fc_style__br' );

			if ( $fc_style_br == 'no' || !$fc_style_br ) {
				$fc_style_br_css = 'none';
				$fc_style_br_css_hover = 'none';
			} elseif ( $fc_style_br == 'yes' ) {
				$fc_style_br_color = get_sub_field( 'fc_style__br_color' );
				$fc_style_br_width = get_sub_field( 'fc_style__br_width' );
				$fc_style_br_css = $fc_style_br_width . 'px solid ' . $fc_style_br_color;
				$fc_style_br_css_hover = $fc_style_br_width . 'px solid ' . $fc_style_br_color;
			} elseif ( $fc_style_br == 'hover' ) {
				$fc_style_br_color = get_sub_field( 'fc_style__br_color' );
				$fc_style_br_width = get_sub_field( 'fc_style__br_width' );
				$fc_style_br_css = $fc_style_br_width . 'px solid transparent';
				$fc_style_br_css_hover = $fc_style_br_width . 'px solid ' . $fc_style_br_color;
			}

			/* Set Dropshadow */
			$fc_style_sh = get_sub_field( 'fc_style__sh' );

			if ( $fc_style_sh == 'no' || !$fc_style_sh ) {
				$fc_style_sh_css = 'none';
			} elseif ( $fc_style_sh == 'yes' ) {
				$fc_style_sh_css = '2px 2px 6px 0px rgba(0,0,0,.3)';
				$fc_style_sh_css_hover = '2px 2px 6px 0px rgba(0,0,0,.3)';
			} elseif ( $fc_style_sh == 'hover' ) {
				$fc_style_sh_css = 'none';
				$fc_style_sh_css_hover = '2px 2px 6px 0px rgba(0,0,0,.3)';
			}

			/* Set Set paddings */
			$fc_style_pa = get_sub_field( 'fc_style__pa' );

			if ( $fc_style_pa == 'no' || !$fc_style_pa ) {
				$fc_style_pa_css = '0';
				$fc_style_pa_css_hover = '0';
					$fc_style_pa_css_fix = 'bottom: 0;';

			} else  {
				$fc_style_pa_get = get_sub_field( 'fc_style__pa_yes' );

				if ( $fc_style_pa_get == 'large' ) {
					$fc_style_pa_width = '20px';
				} elseif ( $fc_style_pa_get == 'medium' ) {
					$fc_style_pa_width = '12px';
				} elseif ( $fc_style_pa_get == 'small' ) {
					$fc_style_pa_width = '5px';
				}

				$fc_style_pa_css_hover = $fc_style_pa_width;

				if ( $fc_style_pa == 'hover' ) {
					$fc_style_pa_css = '0';
					$fc_style_pa_css_fix = 'bottom: ' . $fc_style_pa_width . ';';
				} else {
					$fc_style_pa_css = $fc_style_pa_width;
					$fc_style_pa_css_fix = 'bottom: 0;';
				}
			} 

			/** 
	         * Image styling
			 */

			/* Set Shadow Overlay */
			$fc_style_ov = get_sub_field( 'fc_style__ov' );
			$fc_style__image_text__css = '';
			$fc_style__image_pric__css = '';
			$fc_style__image_labe__css = '';

			if ( $fc_style_ov == 'none' ) {
				$fc_style_ov_bg = 'background: none;';
			} elseif ( $fc_style_ov == 'yes' ) {
				$fc_style_ov_bg_color = get_sub_field( 'fc_style__ov_color' );
				$fc_style_ov_bg = 'background-color: ' . $fc_style_ov_bg_color . '; height: 100%;';
			} elseif ( $fc_style_ov == 'grad' ) {
				$fc_style_ov_bg_color = get_sub_field( 'fc_style__ov_color' );
				$fc_style_ov_bg = '
				background: -moz-linear-gradient(top,  rgba(30,87,153,0) 0%, ' . $fc_style_ov_bg_color . ' 100%);
				background: -webkit-linear-gradient(top,  rgba(30,87,153,0) 0%, ' . $fc_style_ov_bg_color . ' 100%);
				background: linear-gradient(to bottom,  rgba(30,87,153,0) 0%, ' . $fc_style_ov_bg_color . ' 100%);
				height: 100%;';
			}

			/* Set Border */
			if ( get_sub_field( 'fc_style__imbo_bet' ) ) {
				$fc_style__imbo_bet = 'block';
				$fc_style__imbo_bet_color = get_sub_field( 'fc_style__imbo_bet_color' );
				$fc_style__imbo_bet_width = get_sub_field( 'fc_style__imbo_bet_width' );
			} else {
				$fc_style__imbo_bet = 'none';
				$fc_style__imbo_bet_color = '0';
				$fc_style__imbo_bet_width = 'transparent';
			}

			/* Set Radius */
			if ( get_sub_field( 'fc_style__imru' ) ) {
				$fc_style__imru_top = get_sub_field( 'fc_style__imru_top' ) . 'px';
				$fc_style__imru_bottom = get_sub_field( 'fc_style__imru_bottom' ) . 'px';
			} else {
				$fc_style__imru_top = '0px';
				$fc_style__imru_bottom = '0px';
			}

			/* Text Position */
			if ( get_sub_field( 'fc_style__imte_pos' ) == 'top' ) {
				$fc_style__image_text__css .= 'order: 1;margin-bottom: auto;';
			} elseif ( get_sub_field( 'fc_style__imte_pos' ) == 'center' ) {
				$fc_style__image_text__css .= 'order: 2;margin-top: auto;margin-bottom: auto;';
			} elseif ( get_sub_field( 'fc_style__imte_pos' ) == 'bottom' ) {
				$fc_style__image_text__css .= 'order: 3;margin-top: auto;';
			}

			/* Text BG */
			if ( get_sub_field( 'fc_style__imte_bg' ) ) {
				$fc_style__imte_bg = get_sub_field( 'fc_style__imte_bg' );
			} else {
				$fc_style__imte_bg = 'transparent';
			}

			/* Text decoration */
			if ( get_sub_field( 'fc_style__imte_dec' ) == 'none' ) {
				$fc_style__imte_dec_top = 'display: none';
				$fc_style__imte_dec_bot = 'display: none';
			} elseif ( get_sub_field( 'fc_style__imte_dec' ) == 'double' ) {
				$fc_style__imte_dec_top = 'content: ""';
				$fc_style__imte_dec_bot = 'content: ""';
			}  elseif ( get_sub_field( 'fc_style__imte_dec' ) == 'underline' ) {
				$fc_style__imte_dec_top = 'display: none';
				$fc_style__imte_dec_bot = 'content: ""';
			} 

			/* Text dropshadow */
			if ( get_sub_field( 'fc_style__imte_drsh' ) ) {
				$fc_style__imte_drsh = '1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3)';
			} else {
				$fc_style__imte_drsh = 'none';
			}

			/* Text Font Field */
			if ( get_sub_field( 'fc_style__imte_font' ) ) {
				$fc_style__imte_font = get_sub_field( 'fc_style__imte_font' );

				if ( get_sub_field( 'fc_style__imte_font-color' ) ) {
					$fc_style__imte_font_color = get_sub_field( 'fc_style__imte_font-color' );
				} else {
					$fc_style__imte_font_color = '#000';
				}

				if ( $fc_style__imte_font['font_family'] ) {
					$fc_style__imte_font_family = $fc_style__imte_font['font_family'];
				} else {
					$fc_style__imte_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__imte_font['font_weight'] ) {
					$$fc_style__imte_font_weight = $fc_style__imte_font['font_weight'];
				} else {
					$fc_style__imte_font_weight = 700;
				}

				$fc_style__imte_font_set =  "font-family: " . $fc_style__imte_font_family . "; ";
				$fc_style__imte_font_set .=  "font-weight: " . $fc_style__imte_font_weight . "; ";
				$fc_style__imte_font_set .=  "text-align: " . $fc_style__imte_font['text_align'] . "; ";
				$fc_style__imte_font_set .=  "font-size: " . $fc_style__imte_font['font_size'] . "px; ";
				$fc_style__imte_font_set .=  "line-height: " . $fc_style__imte_font['line_height'] . "px; ";
				$fc_style__imte_font_set .=  "color: " . $fc_style__imte_font_color . "; ";
				$fc_style__imte_font_set .=  "font-style: " . $fc_style__imte_font['font_style'] . "; ";
			}

			/* Text Underline */
			if ( get_sub_field( 'fc_style__imte_und' ) ) {
				$fc_style__imte_und = 'underline';
			} else {
				$fc_style__imte_und = 'none';
			}

			/* Description Font Field */
			if ( get_sub_field( 'fc_style__imte_font_des' ) ) {
				$fc_style__imte_font_des = get_sub_field( 'fc_style__imte_font_des' );

				if ( get_sub_field( 'fc_style__imte_font_des-color' ) ) {
					$fc_style__imte_font_des_color = get_sub_field( 'fc_style__imte_font_des-color' );
				} else {
					$fc_style__imte_font_des_color = '#000';
				}

				if ( $fc_style__imte_font_des['font_family'] ) {
					$fc_style__imte_font_des_family = $fc_style__imte_font_des['font_family'];
				} else {
					$fc_style__imte_font_des_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__imte_font_des['font_weight'] ) {
					$fc_style__imte_font_des_weight = $fc_style__imte_font_des['font_weight'];
				} else {
					$fc_style__imte_font_des_weight = 400;
				}

				$fc_style__imte_font_des_set =  "font-family: " . $fc_style__imte_font_des_family . "; ";
				$fc_style__imte_font_des_set .=  "font-weight: " . $fc_style__imte_font_des_weight . "; ";
				$fc_style__imte_font_des_set .=  "text-align: " . $fc_style__imte_font_des['text_align'] . "; ";
				$fc_style__imte_font_des_set .=  "font-size: " . $fc_style__imte_font_des['font_size'] . "px; ";
				$fc_style__imte_font_des_set .=  "line-height: " . $fc_style__imte_font_des['line_height'] . "px; ";
				$fc_style__imte_font_des_set .=  "color: " . $fc_style__imte_font_des_color . "; ";
				$fc_style__imte_font_des_set .=  "font-style: " . $fc_style__imte_font_des['font_style'] . "; ";
			}

			/* Description Underline */
			if ( get_sub_field( 'fc_style__imte_und_des' ) ) {
				$fc_style__imte_und_des = 'underline';
			} else {
				$fc_style__imte_und_des = 'none';
			}

			/* Price position */
			if ( get_sub_field( 'fc_style__impr_pos' ) == 'content' ) {
				$fc_style__image_pric__css .= 'order: 4;';
			} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'top' ) {
				$fc_style__image_pric__css .= 'position: absolute; top: 10%; right: 0; margin: 0;';
			} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'center' ) {
				$fc_style__image_pric__css .= 'position: absolute; top: 50%; right: 0; transform: translateY(-50%); -webkit-transform: translateY(-50%); margin: 0;';
			} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'bottom' ) {
				$fc_style__image_pric__css .= 'position: absolute; bottom: 10%; right: 0; margin: 0;';
			}

			/* Price BG */
			if ( get_sub_field( 'fc_style__impr_bg' ) ) {
				$fc_style__impr_bg = get_sub_field( 'fc_style__impr_bg' );
			} else {
				$fc_style__impr_bg = 'transparent';
			}

			/* Price Dropshadow */
			if ( get_sub_field( 'fc_style__impr_shad' ) ) {
				$fc_style__impr_shad = '1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3)';
			} else {
				$fc_style__impr_shad = 'none';
			}

			/* Price Font Field */
			if ( get_sub_field( 'fc_style__impr_font' ) ) {
				$fc_style__impr_font = get_sub_field( 'fc_style__impr_font' );
				$fc_style__impr_font_color = get_sub_field( 'fc_style__impr_font-color' );

				if ( $fc_style__impr_font['font_family'] ) {
					$fc_style__impr_font_family =  $fc_style__impr_font['font_family'];
				} else {
					$fc_style__impr_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__impr_font['font_weight'] ) {
					$fc_style__impr_font_weight =  $fc_style__impr_font['font_weight'];
				} else {
					$fc_style__impr_font_weight = 400;
				}

				$fc_style__impr_font_set =  "font-family: " . $fc_style__impr_font_family . "; ";
				$fc_style__impr_font_set .=  "font-weight: " . $fc_style__impr_font_weight . "; ";
				$fc_style__impr_font_set .=  "text-align: " . $fc_style__impr_font['text_align'] . "; ";
				$fc_style__impr_font_set .=  "font-size: " . $fc_style__impr_font['font_size'] . "px; ";
				$fc_style__impr_font_set .=  "line-height: " . $fc_style__impr_font['line_height'] . "px; ";
				$fc_style__impr_font_set .=  "color: " . $fc_style__impr_font_color . "; ";
				$fc_style__impr_font_set .=  "font-style: " . $fc_style__impr_font['font_style'] . "; ";
			}

			/* Description Underline */
			if ( get_sub_field( 'fc_style__impr_font_under' ) ) {
				$fc_style__impr_font_under = 'underline';
			} else {
				$fc_style__impr_font_under = 'none';
			}

			/* Label position */
			if ( get_sub_field( 'fc_style__imla_pos' ) == 'top' ) {
				$fc_style__image_labe__css .= 'order: 1;margin-bottom: auto;';
			} elseif ( get_sub_field( 'fc_style__imla_pos' ) == 'center' ) {
				$fc_style__image_labe__css .= 'order: 2;margin-top: auto;margin-bottom: auto;';
			} elseif ( get_sub_field( 'fc_style__imla_pos' ) == 'bottom' ) {
				$fc_style__image_labe__css .= 'order: 3;margin-top: auto;';
			}

			/* Label Font Field */
			if ( get_sub_field( 'fc_style__imla_font' ) ) {
				$fc_style__imla_font = get_sub_field( 'fc_style__imla_font' );
				$fc_style__imla_font_color = get_sub_field( 'fc_style__imla_font-color' );

				if ( $fc_style__imla_font['font_family'] ) {
					$fc_style__imla_font_family = $fc_style__imla_font['font_family'];
				} else {
					$fc_style__imla_font_family = '"Roboto, Arial, sans-serif"';
				}

				if ( $fc_style__imla_font['font_weight'] ) {
					$fc_style__imla_font_weight = $fc_style__imla_font['font_weight'];
				} else {
					$fc_style__imla_font_weight = 400;
				}

				$fc_style__imla_font_set =  "font-family: " . $fc_style__imla_font_family . "; ";
				$fc_style__imla_font_set .=  "font-weight: " . $fc_style__imla_font_weight . "; ";
				$fc_style__imla_font_set .=  "text-align: " . $fc_style__imla_font['text_align'] . "; ";
				$fc_style__imla_font_set .=  "font-size: " . $fc_style__imla_font['font_size'] . "px; ";
				$fc_style__imla_font_set .=  "line-height: " . $fc_style__imla_font['line_height'] . "px; ";
				$fc_style__imla_font_set .=  "color: " . $fc_style__imla_font_color . "; ";
				$fc_style__imla_font_set .=  "font-style: " . $fc_style__imla_font['font_style'] . "; ";
			} 

			/* Label Underline */
			if ( get_sub_field( 'fc_style__imla_font_under' ) ) {
				$fc_style__imla_font_under = 'underline';
			} else {
				$fc_style__imla_font_under = 'none';
			}

			/**
			 * Contet 1
			 */

			/* BG Color */
			if ( get_sub_field( 'fc_style__co_color' ) ) {
				$fc_style__co_color = get_sub_field( 'fc_style__co_color' );
			} else {
				$fc_style__co_color = 'transparent';
			}

			/* Border parameters */
			$show = get_sub_field( 'fc_style__co' ); 

			if ( in_array( 'top-border', $show ) && get_sub_field( 'fc_style__co_tobo-w' ) && get_sub_field( 'fc_style__co_tobo-c' ) && get_sub_field( 'fc_style__co_tobo-t' ) ) {
				$fc_style__co_tobo_w_content = 'content: ""';

				/* Border Width */
				if ( get_sub_field( 'fc_style__co_tobo-w' ) == 'full' ) {
					$fc_style__co_tobo_w = '100%';
				} elseif ( get_sub_field( 'fc_style__co_tobo-w' ) == 'half' ) {
					$fc_style__co_tobo_w = '50%';
				}

				/* Border color */
				if ( get_sub_field( 'fc_style__co_tobo-c' ) ) {
					$fc_style__co_tobo_c = get_sub_field( 'fc_style__co_tobo-c' );
				} else {
					$fc_style__co_tobo_c = 'transparent';
				}

				/* Border color */
				if ( get_sub_field( 'fc_style__co_tobo-t' ) ) {
					$fc_style__co_tobo_t = get_sub_field( 'fc_style__co_tobo-c' ) . 'px';
				} else {
					$fc_style__co_tobo_t = '0px';
				}
			} else {
				$fc_style__co_tobo_w_content = 'display: none';
			}

			/* Title Font Field */
			if ( get_sub_field( 'fc_style__co_titl_font' ) ) {
				$fc_style__co_titl_font = get_sub_field( 'fc_style__co_titl_font' );
				$fc_style__co_titl_font_color = get_sub_field( 'fc_style__co_titl_font-color' );

				if ( $fc_style__co_titl_font['font_family'] ) {
					$fc_style__co_titl_font_family = $fc_style__co_titl_font['font_family'];
				} else {
					$fc_style__co_titl_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__co_titl_font['font_weight'] ) {
					$fc_style__co_titl_font_weight = $fc_style__co_titl_font['font_weight'];
				} else {
					$fc_style__co_titl_font_weight = 700;
				}

				$fc_style__co_titl_font_set =  "font-family: " . $fc_style__co_titl_font_family . "; ";
				$fc_style__co_titl_font_set .=  "font-weight: " . $fc_style__co_titl_font_weight . "; ";
				$fc_style__co_titl_font_set .=  "text-align: " . $fc_style__co_titl_font['text_align'] . "; ";
				$fc_style__co_titl_font_set .=  "font-size: " . $fc_style__co_titl_font['font_size'] . "px; ";
				$fc_style__co_titl_font_set .=  "line-height: " . $fc_style__co_titl_font['line_height'] . "px; ";
				$fc_style__co_titl_font_set .=  "color: " . $fc_style__co_titl_font_color . "; ";
				$fc_style__co_titl_font_set .=  "font-style: " . $fc_style__co_titl_font['font_style'] . "; ";
			}

			/* Title Underline */
			if ( get_sub_field( 'fc_style__co_titl_under' ) ) {
				$fc_style__co_titl_under = 'underline';
			} else {
				$fc_style__co_titl_under = 'none';
			}

			/* Desc Font Field */
			if ( get_sub_field( 'fc_style__co_desc_font' ) ) {
				$fc_style__co_desc_font = get_sub_field( 'fc_style__co_desc_font' );
				$fc_style__co_desc_font_color = get_sub_field( 'fc_style__co_desc_font-color' );

				if ( $fc_style__co_desc_font['font_family'] ) {
					$fc_style__co_desc_font_family = $fc_style__co_desc_font['font_family'];
				} else {
					$fc_style__co_desc_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__co_desc_font['font_weight'] ) {
					$fc_style__co_desc_font_weight = $fc_style__co_desc_font['font_weight'];
				} else {
					$fc_style__co_desc_font_weight = 400;
				}

				$fc_style__co_desc_font_set =  "font-family: " . $fc_style__co_desc_font_family . "; ";
				$fc_style__co_desc_font_set .=  "font-weight: " . $fc_style__co_desc_font_weight . "; ";
				$fc_style__co_desc_font_set .=  "text-align: " . $fc_style__co_desc_font['text_align'] . "; ";
				$fc_style__co_desc_font_set .=  "font-size: " . $fc_style__co_desc_font['font_size'] . "px; ";
				$fc_style__co_desc_font_set .=  "line-height: " . $fc_style__co_desc_font['line_height'] . "px; ";
				$fc_style__co_desc_font_set .=  "color: " . $fc_style__co_desc_font_color . "; ";
				$fc_style__co_desc_font_set .=  "font-style: " . $fc_style__co_desc_font['font_style'] . "; ";
			}

			/* Desc Underline */
			if ( get_sub_field( 'fc_style__co_desc_under' ) ) {
				$fc_style__co_desc_under = 'underline';
			} else {
				$fc_style__co_desc_under = 'none';
			}

			/* Detail Font Field */
			if ( get_sub_field( 'fc_style__co_deta_font' ) ) {
				$fc_style__co_deta_font = get_sub_field( 'fc_style__co_deta_font' );
				$fc_style__co_deta_font_color = get_sub_field( 'fc_style__co_deta_font-color' );

				if ( $fc_style__co_deta_font['font_family'] ) {
					$fc_style__co_deta_font_family = $fc_style__co_deta_font['font_family'];
				} else {
					$fc_style__co_deta_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__co_deta_font['font_weight'] ) {
					$fc_style__co_deta_font_weight = $fc_style__co_deta_font['font_weight'];
				} else {
					$fc_style__co_deta_font_weight = 400;
				}

				$fc_style__co_deta_font_set =  "font-family: " . $fc_style__co_deta_font_family . "; ";
				$fc_style__co_deta_font_set .=  "font-weight: " . $fc_style__co_deta_font_weight . "; ";
				$fc_style__co_deta_font_set .=  "text-align: " . $fc_style__co_deta_font['text_align'] . "; ";
				$fc_style__co_deta_font_set .=  "font-size: " . $fc_style__co_deta_font['font_size'] . "px; ";
				$fc_style__co_deta_font_set .=  "line-height: " . $fc_style__co_deta_font['line_height'] . "px; ";
				$fc_style__co_deta_font_set .=  "color: " . $fc_style__co_deta_font_color . "; ";
				$fc_style__co_deta_font_set .=  "font-style: " . $fc_style__co_deta_font['font_style'] . "; ";
			}

			/* Detail Underline */
			if ( get_sub_field( 'fc_style__co_deta_under' ) ) {
				$fc_style__co_deta_under = 'underline';
			} else {
				$fc_style__co_deta_under = 'none';
			}

			/* Price Position */
			if ( get_sub_field( 'fc_style__co_pric_pos' ) == 'left' ) {
				$fc_style__co_pric_pos = '<!-- fc_style__imla_pos is left -->';
			} elseif ( get_sub_field( 'fc_style__co_pric_pos' ) == 'center' ) {
				$fc_style__co_pric_pos = '<!-- fc_style__imla_pos is center -->';
			} elseif ( get_sub_field( 'fc_style__co_pric_pos' ) == 'right' ) {
				$fc_style__co_pric_pos = '<!-- fc_style__imla_pos is right -->';
			} elseif ( get_sub_field( 'fc_style__co_pric_pos' ) == 'u-right' ) {
				$fc_style__co_pric_pos = '<!-- fc_style__imla_pos is upper right -->';
			}

			/* Price Font Field */
			if ( get_sub_field( 'fc_style__co_pric_font' ) ) {
				$fc_style__co_pric_font = get_sub_field( 'fc_style__co_pric_font' );
				$fc_style__co_pric_font_color = get_sub_field( 'fc_style__co_pric_font-color' );

				if ( $fc_style__co_pric_font['font_family'] ) {
					$fc_style__co_pric_font_family = $fc_style__co_pric_font['font_family'];
				} else {
					$fc_style__co_pric_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__co_pric_font['font_weight'] ) {
					$fc_style__co_pric_font_weight = $fc_style__co_pric_font['font_weight'];
				} else {
					$fc_style__co_pric_font_weight = 400;
				}

				$fc_style__co_pric_font_set =  "font-family: " . $fc_style__co_pric_font_family . "; ";
				$fc_style__co_pric_font_set .=  "font-weight: " . $fc_style__co_pric_font_weight . "; ";
				$fc_style__co_pric_font_set .=  "text-align: " . $fc_style__co_pric_font['text_align'] . "; ";
				$fc_style__co_pric_font_set .=  "font-size: " . $fc_style__co_pric_font['font_size'] . "px; ";
				$fc_style__co_pric_font_set .=  "line-height: " . $fc_style__co_pric_font['line_height'] . "px; ";
				$fc_style__co_pric_font_set .=  "color: " . $fc_style__co_pric_font_color . "; ";
				$fc_style__co_pric_font_set .=  "font-style: " . $fc_style__co_pric_font['font_style'] . "; ";
			}

			/* Price Underline */
			if ( get_sub_field( 'fc_style__co_pric_under' ) ) {
				$fc_style__co_pric_under = 'underline';
			} else {
				$fc_style__co_pric_under = 'none';
			}

			/* Price Underline */
			if ( get_sub_field( 'fc_style__co_pric_drop' ) ) {
				$fc_style__co_pric_drop = '1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3)';
			} else {
				$fc_style__co_pric_drop = 'none';
			}

			if ( get_sub_field( 'fc_style__co_butt_pos' ) == 'rigt-d' ) {
				$fc_style__co_butt_paddings = '15px 20px';
			} else {
				$fc_style__co_butt_paddings = '4px 7px';
			}

			/* Button style */
			if ( get_sub_field( 'fc_style__co_butt_style' ) == 'text' ) {
				$fc_style__co_butt_style = '';
			} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'square' ) {
				$fc_style__co_butt_style = 'padding: ' . $fc_style__co_butt_paddings . '; border-radius: 0;';
			} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'round' ) {
				$fc_style__co_butt_style = 'padding: ' . $fc_style__co_butt_paddings . '; border-radius: 50%;';
			} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'corner' ) {
				$fc_style__co_butt_style = 'padding: ' . $fc_style__co_butt_paddings . '; border-radius: 4px;';
			}

			/* Button font */
			if ( get_sub_field( 'fc_style__co_butt_font' ) ) {
				$fc_style__co_butt_font = get_sub_field( 'fc_style__co_butt_font' );
				$fc_style__co_butt_font_color = get_sub_field( 'fc_style__co_butt_font-color' );

				if ( $fc_style__co_butt_font['font_family'] ) {
					$fc_style__co_butt_font_family = $fc_style__co_butt_font['font_family'];
				} else {
					$fc_style__co_butt_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__co_butt_font['font_weight'] ) {
					$fc_style__co_butt_font_weight = $fc_style__co_butt_font['font_weight'];
				} else {
					$fc_style__co_butt_font_weight = 300;
				}

				$fc_style__co_butt_font_set =  "font-family: " . $fc_style__co_butt_font_family . "; ";
				$fc_style__co_butt_font_set .=  "font-weight: " . $fc_style__co_butt_font_weight . "; ";
				$fc_style__co_butt_font_set .=  "text-align: center; ";
				$fc_style__co_butt_font_set .=  "font-size: " . $fc_style__co_butt_font['font_size'] . "px; ";
				$fc_style__co_butt_font_set .=  "line-height: " . $fc_style__co_butt_font['line_height'] . "px; ";
				$fc_style__co_butt_font_set .=  "color: " . $fc_style__co_butt_font_color . "; ";
				$fc_style__co_butt_font_set .=  "font-style: " . $fc_style__co_butt_font['font_style'] . "; ";
			}

			/* Button BG color */
			if ( get_sub_field( 'fc_style__co_butt_bg' ) ) {
				$fc_style__co_butt_bg = get_sub_field( 'fc_style__co_butt_bg' );
			} else {
				$fc_style__co_butt_bg = 'transparent';
			}

			/* Button effect */
			if ( get_sub_field( 'fc_style__co_butt_hover' ) ) {
				$fc_style__co_button_hover_show = get_sub_field( 'fc_style__co_butt_hover' );

				if ( $fc_style__co_button_hover_show ) {

					if ( in_array( 'invert', $fc_style__co_button_hover_show ) ) {
						$fc_style__co_button_hover_bg_color = $fc_style__co_butt_font_color;
						$fc_style__co_button_hover_te_color = 	$fc_style__co_butt_bg;
					} else {
						$fc_style__co_button_hover_bg_color = 	$fc_style__co_butt_bg;
						$fc_style__co_button_hover_te_color = $fc_style__co_butt_font_color;
					}

					if ( in_array( 'decor', $fc_style__co_button_hover_show ) ) {
						$fc_style__co_button_hover_te_deco = 'underline';
					} else {
						$fc_style__co_button_hover_te_deco = 'none';
					}
				}
			}

			/* Button dropshadow */
			if ( get_sub_field( 'fc_style__co_butt_drop' ) ) {
				$fc_style__co_butt_drop = '2px 2px 6px 0 rgba(0,0,0,.3)';
			} else {
				$fc_style__co_butt_drop = 'none';
			}

			/* Set border */
			if ( get_sub_field( 'fc_style__co_butt_bord' ) == 'yes' || get_sub_field( 'fc_style__co_butt_bord' ) == 'hover' ) {
				$fc_style__co_butt_bord_width = get_sub_field( 'fc_style__co_butt_bord_width' );
				$fc_style__co_butt_bord_hover = $fc_style__co_butt_bord_width . 'px solid #000';

				if ( get_sub_field( 'fc_style__co_butt_bord' ) == 'yes' ) {
			 		$fc_style__co_butt_bord = $fc_style__co_butt_bord_width . 'px solid #000';
				} elseif ( get_sub_field( 'fc_style__co_butt_bord' ) == 'hover' ) {
					$fc_style__co_butt_bord = $fc_style__co_butt_bord_width . 'px solid transparent';
				}
			} else {
				$fc_style__co_butt_bord = 'none';
				$fc_style__co_butt_bord_hover = 'none';
			}

			/**
			 * Contet 2
			 */

			/* BG Color */
			if ( get_sub_field( 'fc_style__ct_color' ) ) {
				$fc_style__ct_color = get_sub_field( 'fc_style__ct_color' );
			} else {
				$fc_style__ct_color = 'transparent';
			}

			/* Border parameters */
			$show = get_sub_field( 'fc_style__co' ); 

			if ( in_array( 'top-border', $show ) && get_sub_field( 'fc_style__ct_tobo-w' ) && get_sub_field( 'fc_style__ct_tobo-c' ) && get_sub_field( 'fc_style__ct_tobo-t' ) ) {
				$fc_style__ct_tobo_w_content = 'content: ""';

				/* Border Width */
				if ( get_sub_field( 'fc_style__ct_tobo-w' ) == 'full' ) {
					$fc_style__ct_tobo_w = '100%';
				} elseif ( get_sub_field( 'fc_style__ct_tobo-w' ) == 'half' ) {
					$fc_style__ct_tobo_w = '50%';
				}

				/* Border color */
				if ( get_sub_field( 'fc_style__ct_tobo-c' ) ) {
					$fc_style__ct_tobo_c = get_sub_field( 'fc_style__ct_tobo-c' );
				} else {
					$fc_style__ct_tobo_c = 'transparent';
				}

				/* Border color */
				if ( get_sub_field( 'fc_style__ct_tobo-t' ) ) {
					$fc_style__ct_tobo_t = get_sub_field( 'fc_style__ct_tobo-c' ) . 'px';
				} else {
					$fc_style__ct_tobo_t = '0px';
				}
			} else {
				$fc_style__ct_tobo_w_content = 'display: none';
			}

			/* Title Font Field */
			if ( get_sub_field( 'fc_style__ct_titl_font' ) ) {
				$fc_style__ct_titl_font = get_sub_field( 'fc_style__ct_titl_font' );
				$fc_style__ct_titl_font_color = get_sub_field( 'fc_style__ct_titl_font-color' );

				if ( $fc_style__ct_titl_font['font_family'] ) {
					$fc_style__ct_titl_font_family = $fc_style__ct_titl_font['font_family'];
				} else {
					$fc_style__ct_titl_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__ct_titl_font['font_weight'] ) {
					$fc_style__ct_titl_font_weight = $fc_style__ct_titl_font['font_weight'];
				} else {
					$fc_style__ct_titl_font_weight = 700;
				}

				$fc_style__ct_titl_font_set =  "font-family: " . $fc_style__ct_titl_font_family . "; ";
				$fc_style__ct_titl_font_set .=  "font-weight: " . $fc_style__ct_titl_font_weight . "; ";
				$fc_style__ct_titl_font_set .=  "text-align: " . $fc_style__ct_titl_font['text_align'] . "; ";
				$fc_style__ct_titl_font_set .=  "font-size: " . $fc_style__ct_titl_font['font_size'] . "px; ";
				$fc_style__ct_titl_font_set .=  "line-height: " . $fc_style__ct_titl_font['line_height'] . "px; ";
				$fc_style__ct_titl_font_set .=  "color: " . $fc_style__ct_titl_font_color . "; ";
				$fc_style__ct_titl_font_set .=  "font-style: " . $fc_style__ct_titl_font['font_style'] . "; ";
			}

			/* Title Underline */
			if ( get_sub_field( 'fc_style__ct_titl_under' ) ) {
				$fc_style__ct_titl_under = 'underline';
			} else {
				$fc_style__ct_titl_under = 'none';
			}

			/* Desc Font Field */
			if ( get_sub_field( 'fc_style__ct_desc_font' ) ) {
				$fc_style__ct_desc_font = get_sub_field( 'fc_style__ct_desc_font' );
				$fc_style__ct_desc_font_color = get_sub_field( 'fc_style__ct_desc_font-color' );

				if ( $fc_style__ct_desc_font['font_family'] ) {
					$fc_style__ct_desc_font_family = $fc_style__ct_desc_font['font_family'];
				} else {
					$fc_style__ct_desc_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__ct_desc_font['font_weight'] ) {
					$fc_style__ct_desc_font_weight = $fc_style__ct_desc_font['font_weight'];
				} else {
					$fc_style__ct_desc_font_weight = 400;
				}

				$fc_style__ct_desc_font_set =  "font-family: " . $fc_style__ct_desc_font_family . "; ";
				$fc_style__ct_desc_font_set .=  "font-weight: " . $fc_style__ct_desc_font_weight . "; ";
				$fc_style__ct_desc_font_set .=  "text-align: " . $fc_style__ct_desc_font['text_align'] . "; ";
				$fc_style__ct_desc_font_set .=  "font-size: " . $fc_style__ct_desc_font['font_size'] . "px; ";
				$fc_style__ct_desc_font_set .=  "line-height: " . $fc_style__ct_desc_font['line_height'] . "px; ";
				$fc_style__ct_desc_font_set .=  "color: " . $fc_style__ct_desc_font_color . "; ";
				$fc_style__ct_desc_font_set .=  "font-style: " . $fc_style__ct_desc_font['font_style'] . "; ";
			}

			/* Desc Underline */
			if ( get_sub_field( 'fc_style__ct_desc_under' ) ) {
				$fc_style__ct_desc_under = 'underline';
			} else {
				$fc_style__ct_desc_under = 'none';
			}

			/* Detail Font Field */
			if ( get_sub_field( 'fc_style__ct_deta_font' ) ) {
				$fc_style__ct_deta_font = get_sub_field( 'fc_style__ct_deta_font' );
				$fc_style__ct_deta_font_color = get_sub_field( 'fc_style__ct_deta_font-color' );

				if ( $fc_style__ct_deta_font['font_family'] ) {
					$fc_style__ct_deta_font_family = $fc_style__ct_deta_font['font_family'];
				} else {
					$fc_style__ct_deta_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__ct_deta_font['font_weight'] ) {
					$fc_style__ct_deta_font_weight = $fc_style__ct_deta_font['font_weight'];
				} else {
					$fc_style__ct_deta_font_weight = 400;
				}

				$fc_style__ct_deta_font_set =  "font-family: " . $fc_style__ct_deta_font_family . "; ";
				$fc_style__ct_deta_font_set .=  "font-weight: " . $fc_style__ct_deta_font_weight . "; ";
				$fc_style__ct_deta_font_set .=  "text-align: " . $fc_style__ct_deta_font['text_align'] . "; ";
				$fc_style__ct_deta_font_set .=  "font-size: " . $fc_style__ct_deta_font['font_size'] . "px; ";
				$fc_style__ct_deta_font_set .=  "line-height: " . $fc_style__ct_deta_font['line_height'] . "px; ";
				$fc_style__ct_deta_font_set .=  "color: " . $fc_style__ct_deta_font_color . "; ";
				$fc_style__ct_deta_font_set .=  "font-style: " . $fc_style__ct_deta_font['font_style'] . "; ";
			}

			/* Detail Underline */
			if ( get_sub_field( 'fc_style__ct_deta_under' ) ) {
				$fc_style__ct_deta_under = 'underline';
			} else {
				$fc_style__ct_deta_under = 'none';
			}

			/* Price Position */
			if ( get_sub_field( 'fc_style__ct_pric_pos' ) == 'left' ) {
				$fc_style__ct_pric_pos = '<!-- fc_style__imla_pos is left -->';
			} elseif ( get_sub_field( 'fc_style__ct_pric_pos' ) == 'center' ) {
				$fc_style__ct_pric_pos = '<!-- fc_style__imla_pos is center -->';
			} elseif ( get_sub_field( 'fc_style__ct_pric_pos' ) == 'right' ) {
				$fc_style__ct_pric_pos = '<!-- fc_style__imla_pos is right -->';
			} elseif ( get_sub_field( 'fc_style__ct_pric_pos' ) == 'u-right' ) {
				$fc_style__ct_pric_pos = '<!-- fc_style__imla_pos is upper right -->';
			}

			/* Price Font Field */
			if ( get_sub_field( 'fc_style__ct_pric_font' ) ) {
				$fc_style__ct_pric_font = get_sub_field( 'fc_style__ct_pric_font' );
				$fc_style__ct_pric_font_color = get_sub_field( 'fc_style__ct_pric_font-color' );

				if ( $fc_style__ct_pric_font['font_family'] ) {
					$fc_style__ct_pric_font_family = $fc_style__ct_pric_font['font_family'];
				} else {
					$fc_style__ct_pric_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__ct_pric_font['font_weight'] ) {
					$fc_style__ct_pric_font_weight = $fc_style__ct_pric_font['font_weight'];
				} else {
					$fc_style__ct_pric_font_weight = 400;
				}

				$fc_style__ct_pric_font_set =  "font-family: " . $fc_style__ct_pric_font_family . "; ";
				$fc_style__ct_pric_font_set .=  "font-weight: " . $fc_style__ct_pric_font_weight . "; ";
				$fc_style__ct_pric_font_set .=  "text-align: " . $fc_style__ct_pric_font['text_align'] . "; ";
				$fc_style__ct_pric_font_set .=  "font-size: " . $fc_style__ct_pric_font['font_size'] . "px; ";
				$fc_style__ct_pric_font_set .=  "line-height: " . $fc_style__ct_pric_font['line_height'] . "px; ";
				$fc_style__ct_pric_font_set .=  "color: " . $fc_style__ct_pric_font_color . "; ";
				$fc_style__ct_pric_font_set .=  "font-style: " . $fc_style__ct_pric_font['font_style'] . "; ";
			}

			/* Price Underline */
			if ( get_sub_field( 'fc_style__ct_pric_under' ) ) {
				$fc_style__ct_pric_under = 'underline';
			} else {
				$fc_style__ct_pric_under = 'none';
			}

			/* Price Underline */
			if ( get_sub_field( 'fc_style__ct_pric_drop' ) ) {
				$fc_style__ct_pric_drop = '1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3)';
			} else {
				$fc_style__ct_pric_drop = 'none';
			}

			if ( get_sub_field( 'fc_style__ct_butt_pos' ) == 'rigt-d' ) {
				$fc_style__ct_butt_paddings = '15px 20px';
			} else {
				$fc_style__ct_butt_paddings = '4px 7px';
			}

			/* Button style */
			if ( get_sub_field( 'fc_style__ct_butt_style' ) == 'text' ) {
				$fc_style__ct_butt_style = '';
			} elseif ( get_sub_field( 'fc_style__ct_butt_style' ) == 'square' ) {
				$fc_style__ct_butt_style = 'padding: ' . $fc_style__ct_butt_paddings . '; border-radius: 0;';
			} elseif ( get_sub_field( 'fc_style__ct_butt_style' ) == 'round' ) {
				$fc_style__ct_butt_style = 'padding: ' . $fc_style__ct_butt_paddings . '; border-radius: 50%;';
			} elseif ( get_sub_field( 'fc_style__ct_butt_style' ) == 'corner' ) {
				$fc_style__ct_butt_style = 'padding: ' . $fc_style__ct_butt_paddings . '; border-radius: 4px;';
			}

			/* Button font */
			if ( get_sub_field( 'fc_style__ct_butt_font' ) ) {
				$fc_style__ct_butt_font = get_sub_field( 'fc_style__ct_butt_font' );
				$fc_style__ct_butt_font_color = get_sub_field( 'fc_style__ct_butt_font-color' );

				if ( $fc_style__ct_butt_font['font_family'] ) {
					$fc_style__ct_butt_font_family = $fc_style__ct_butt_font['font_family'];
				} else {
					$fc_style__ct_butt_font_family = '"Roboto", Arial, sans-serif';
				}

				if ( $fc_style__ct_butt_font['font_weight'] ) {
					$fc_style__ct_butt_font_weight = $fc_style__ct_butt_font['font_weight'];
				} else {
					$fc_style__ct_butt_font_weight = 400;
				}

				$fc_style__ct_butt_font_set =  "font-family: " . $fc_style__ct_butt_font_family . "; ";
				$fc_style__ct_butt_font_set .=  "font-weight: " . $fc_style__ct_butt_font_weight . "; ";
				$fc_style__ct_butt_font_set .=  "text-align: center; ";
				$fc_style__ct_butt_font_set .=  "font-size: " . $fc_style__ct_butt_font['font_size'] . "px; ";
				$fc_style__ct_butt_font_set .=  "line-height: " . $fc_style__ct_butt_font['line_height'] . "px; ";
				$fc_style__ct_butt_font_set .=  "color: " . $fc_style__ct_butt_font_color . "; ";
				$fc_style__ct_butt_font_set .=  "font-style: " . $fc_style__ct_butt_font['font_style'] . "; ";
			}

			/* Button BG color */
			if ( get_sub_field( 'fc_style__ct_butt_bg' ) ) {
				$fc_style__ct_butt_bg = get_sub_field( 'fc_style__ct_butt_bg' );
			} else {
				$fc_style__ct_butt_bg = 'transparent';
			}

			/* Button effect */
			if ( get_sub_field( 'fc_style__ct_butt_hover' ) ) {
				$fc_style__ct_button_hover_show = get_sub_field( 'fc_style__ct_butt_hover' );

				if ( $fc_style__ct_button_hover_show ) {

					if ( in_array( 'invert', $fc_style__ct_button_hover_show ) ) {
						$fc_style__ct_button_hover_bg_color = $fc_style__ct_butt_font_color;
						$fc_style__ct_button_hover_te_color = 	$fc_style__ct_butt_bg;
					} else {
						$fc_style__ct_button_hover_bg_color = 	$fc_style__ct_butt_bg;
						$fc_style__ct_button_hover_te_color = $fc_style__ct_butt_font_color;
					}

					if ( in_array( 'decor', $fc_style__ct_button_hover_show ) ) {
						$fc_style__ct_button_hover_te_deco = 'underline';
					} else {
						$fc_style__ct_button_hover_te_deco = 'none';
					}
				}
			}

			/* Button dropshadow */
			if ( get_sub_field( 'fc_style__ct_butt_drop' ) ) {
				$fc_style__ct_butt_drop = '2px 2px 6px 0 rgba(0,0,0,.3)';
			} else {
				$fc_style__ct_butt_drop = 'none';
			}

			/* Set border */
			if ( get_sub_field( 'fc_style__ct_butt_bord' ) == 'yes' || get_sub_field( 'fc_style__ct_butt_bord' ) == 'hover' ) {
				$fc_style__ct_butt_bord_width = get_sub_field( 'fc_style__ct_butt_bord_width' );
				$fc_style__ct_butt_bord_hover = $fc_style__ct_butt_bord_width . 'px solid #000';

				if ( get_sub_field( 'fc_style__ct_butt_bord' ) == 'yes' ) {
			 		$fc_style__ct_butt_bord = $fc_style__ct_butt_bord_width . 'px solid #000';
				} elseif ( get_sub_field( 'fc_style__ct_butt_bord' ) == 'hover' ) {
					$fc_style__ct_butt_bord = $fc_style__ct_butt_bord_width . 'px solid transparent';
				}
			} else {
				$fc_style__ct_butt_bord = 'none';
				$fc_style__ct_butt_bord_hover = 'none';
			} ?>

			<style>

				#pc_wrap .<?php echo $fc_style; ?> {
					position: relative;
					box-sizing: border-box;
					background: <?php echo $fc_style_bg_css; ?>;
					border: <?php echo $fc_style_br_css; ?>;
					box-shadow: <?php echo $fc_style_sh_css; ?>;
					padding: <?php echo $fc_style_pa_css; ?>;
				}

				#pc_wrap .<?php echo $fc_style; ?>:hover {
					<?php echo $fc_style_pa_css_fix; ?>;
					border: <?php echo $fc_style_br_css_hover; ?>;
					box-shadow: <?php echo $fc_style_sh_css_hover; ?>;
					padding: <?php echo $fc_style_pa_css_hover; ?>;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image {
					position: relative;
					border-top-right-radius: <?php echo $fc_style__imru_top; ?>;
					border-top-left-radius: <?php echo $fc_style__imru_top; ?>;
					border-bottom-right-radius: <?php echo $fc_style__imru_bottom; ?>;
					border-bottom-left-radius: <?php echo $fc_style__imru_bottom; ?>;
					text-decoration: none;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image:before {
					position: absolute;
					content: '';
					bottom: 0;
					left: 0;
					width: 100%;
					pointer-events: none;
					<?php echo $fc_style_ov_bg; ?>;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image:after {
					content: '';
					position: absolute;
					bottom: 0;
					left: 50%;
					transform: translate(-50%, 50%);
					-webkit-transform: translate(-50%, 50%);
					display: <?php echo $fc_style__imbo_bet; ?>;
					border: <?php echo $fc_style__imbo_bet_width . 'px solid ' . $fc_style__imbo_bet_color; ?>;
					width: 100%;
					z-index: 5;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_text {
					background-color: <?php echo $fc_style__imte_bg; ?>;
					position: relative;
    				z-index: 4;
    				<?php echo $fc_style__image_text__css; ?>
					padding: 5px 0;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_title {
					position: relative;
					padding: 5px 0;
					text-decoration: <?php echo $fc_style__imte_und; ?>;
					text-shadow: <?php echo $fc_style__imte_drsh; ?>;
					<?php echo $fc_style__imte_font_set; ?>
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_title:before {
					display: inline-block;
					position: absolute;
					top: 0;
					left: 50%;
					width: 100%;
					border-top: 1px solid #000;
					-webkit-transform: translateX(-50%);
					transform: translateX(-50%);
					<?php echo $fc_style__imte_dec_top; ?>;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_title:after {
					display: inline-block;
					position: absolute;
					bottom: 0px;
					left: 50%;
					width: 100%;
					border-top: 1px solid #000;
					-webkit-transform: translateX(-50%);
					transform: translateX(-50%);
					<?php echo $fc_style__imte_dec_bot; ?>;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_title + .fc_style--image_desc {
					margin-top: 4px;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_desc {
					padding: 5px 0;
					text-decoration: <?php echo $fc_style__imte_und_des; ?>;
					<?php echo $fc_style__imte_font_des_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_price {
					background-color: <?php echo $fc_style__impr_bg; ?>;
					text-shadow: <?php echo $fc_style__impr_shad; ?>;
					text-decoration: <?php echo $fc_style__impr_font_under; ?>;
					<?php echo $fc_style__impr_font_set; ?>
					<?php echo $fc_style__image_pric__css; ?>
					padding: 5px 14px;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--image_label {
					<?php echo $fc_style__imla_pos; ?>;
					text-decoration: <?php echo $fc_style__imla_font_under; ?>;
					<?php echo $fc_style__image_labe__css; ?>
					padding: 5px 14px;
				}	

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first {
					position: relative;
					background-color: <?php echo $fc_style__co_color; ?>;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first:before {
					<?php echo $fc_style__co_tobo_w_content; ?>;
					position: absolute;
					top: 0;
					left: 50%;
					-webkit-transform: translate(-50%, -50%);
					transform: translate(-50%, -50%);
					border: <?php echo $fc_style__co_tobo_t . 'px solid' . $fc_style__co_tobo_c; ?>;
					width: <?php echo $fc_style__co_tobo_w; ?>;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first_title {
					text-decoration: <?php echo $fc_style__co_titl_under; ?>;
					<?php echo $fc_style__co_titl_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first_desc {
					text-decoration: <?php echo $fc_style__co_desc_under; ?>;
					<?php echo $fc_style__co_desc_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first_detail {
					text-decoration: <?php echo $fc_style__co_deta_under; ?>;
					<?php echo $fc_style__co_deta_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first_price {
					<?php echo $fc_style__co_pric_pos; ?>;
					text-decoration: <?php echo $fc_style__co_pric_under; ?>;
					text-shadow: <?php echo $fc_style__co_pric_drop; ?>;
					<?php echo $fc_style__co_pric_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first_button {
					<?php echo $fc_style__co_butt_style; ?>;
					border: <?php echo $fc_style__co_butt_bord; ?>;
					box-shadow: <?php echo $fc_style__co_butt_drop; ?>;
					<?php echo $fc_style__co_butt_font_set; ?>
					background-color: <?php echo $fc_style__co_butt_bg; ?>;
					transition: ease .3s;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--first_button:hover {
					border: <?php echo $fc_style__co_butt_bord_hover; ?>;
					background-color: <?php echo $fc_style__co_button_hover_bg_color; ?>;
					color: <?php echo $fc_style__co_button_hover_te_color; ?>;
					text-decoration: <?php echo $fc_style__co_button_hover_te_deco; ?>;
					transition: ease .3s;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second {
					position: relative;
					background-color: <?php echo $fc_style__ct_color; ?>;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second:before {
					<?php echo $fc_style__ct_tobo_w_content; ?>;
					position: absolute;
					top: 0;
					left: 50%;
					-webkit-transform: translate(-50%, -50%);
					transform: translate(-50%, -50%);
					border: <?php echo $fc_style__ct_tobo_t . 'px solid' . $fc_style__ct_tobo_c; ?>;
					width: <?php echo $fc_style__ct_tobo_w; ?>;
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second_title {
					text-decoration: <?php echo $fc_style__ct_titl_under; ?>;
					<?php echo $fc_style__ct_titl_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second_desc {
					text-decoration: <?php echo $fc_style__ct_desc_under; ?>;
					<?php echo $fc_style__ct_desc_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second_detail {
					text-decoration: <?php echo $fc_style__ct_deta_under; ?>;
					<?php echo $fc_style__ct_deta_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second_price {
					<?php echo $fc_style__ct_pric_pos; ?>;
					text-decoration: <?php echo $fc_style__ct_pric_under; ?>;
					text-shadow: <?php echo $fc_style__ct_pric_drop; ?>;
					<?php echo $fc_style__ct_pric_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second_button {
					<?php echo $fc_style__ct_butt_style; ?>;
					border: <?php echo $fc_style__ct_butt_bord; ?>;
					box-shadow: <?php echo $fc_style__ct_butt_drop; ?>;
					background-color: <?php echo $fc_style__ct_butt_bg; ?>;
					transition: ease .3s;
					<?php echo $fc_style__ct_butt_font_set; ?>
				}

				#pc_wrap .<?php echo $fc_style; ?> .fc_style--second_button:hover {
					border: <?php echo $fc_style__ct_butt_bord_hover; ?>;
					background-color: <?php echo $fc_style__ct_button_hover_bg_color; ?>;
					color: <?php echo $fc_style__ct_button_hover_te_color; ?>;
					text-decoration: <?php echo $fc_style__ct_button_hover_te_deco; ?>;
					transition: ease .3s;
				}
			
			</style>

		<?php } 
	}

} ?>

