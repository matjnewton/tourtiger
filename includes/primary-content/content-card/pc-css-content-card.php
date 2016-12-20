<?php add_action( "wp_footer", "add_primary_area_content_card" );
 
function add_primary_area_content_card() { ?>

	<?php 
		if ( have_rows( 'сc_style', 'option' ) ) {
			while ( have_rows( 'сc_style', 'option' ) ) { 
				the_row();

				/* Set BG */
				if ( get_sub_field( 'сc_style__bg' ) == 'none' ) {
					$сc_style__bg = 'none';
				} elseif ( get_sub_field( 'сc_style__bg' ) == 'texture' ) {
					$сc_style__bg = 'url(' . get_sub_field( "сc_style__bg_texture" ) . ') center center repeat';
				} elseif ( get_sub_field( 'сc_style__bg' ) == 'color' ) {
					$сc_style__bg = get_sub_field( 'сc_style__bg_color' );
				}

				/* Headline */
				if ( get_sub_field( 'сc_style__headline' ) ) {
					$сc_style__headline = get_sub_field( 'сc_style__headline' );
					$сc_style__headline_color = get_sub_field( 'сc_style__headline-color' );

					if ( $сc_style__headline['font_family'] ) {
						$сc_style__headline_family = $сc_style__headline['font_family'];
					} else {
						$сc_style__headline_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $сc_style__headline['font_weight'] ) {
						$сc_style__headline_weight = $сc_style__headline['font_weight'];
					} else {
						$сc_style__headline_weight = 400;
					}

					$сc_style__headline_set =  "font-family:" . $сc_style__headline_family . ";";
					$сc_style__headline_set .=  "font-weight:" . $сc_style__headline_weight . ";";
					$сc_style__headline_set .=  "text-align:" . $сc_style__headline['text_align'] . ";";
					$сc_style__headline_set .=  "font-size:" . $сc_style__headline['font_size'] . "px;";
					$сc_style__headline_set .=  "line-height:" . $сc_style__headline['line_height'] . "px;";
					$сc_style__headline_set .=  "color:" . $сc_style__headline_color . ";";
					$сc_style__headline_set .=  "font-style:" . $сc_style__headline['font_style'] . ";";
				}

				/* Sub Headline */
				if ( get_sub_field( 'сc_style__sub-headline' ) ) {
					$сc_style__sub_headline = get_sub_field( 'сc_style__sub-headline' );
					$сc_style__sub_headline_color = get_sub_field( 'сc_style__sub-headline-color' );
 
					if ( $сc_style__sub_headline['font_family'] ) {
						$сc_style__sub_headline_family = $сc_style__sub_headline['font_family'];
					} else {
						$сc_style__sub_headline_family = '"Open Sans", Arial, sans-serif';
					}
 
					if ( $сc_style__sub_headline['font_weight'] ) {
						$сc_style__sub_headline_weight = $сc_style__sub_headline['font_weight'];
					} else {
						$сc_style__sub_headline_weight = 400;
					}

					$сc_style__sub_headline_set =  "font-family:" . $сc_style__sub_headline_family . ";";
					$сc_style__sub_headline_set .=  "font-weight:" . $сc_style__sub_headline_weight . ";";
					$сc_style__sub_headline_set .=  "text-align:" . $сc_style__sub_headline['text_align'] . ";";
					$сc_style__sub_headline_set .=  "font-size:" . $сc_style__sub_headline['font_size'] . "px;";
					$сc_style__sub_headline_set .=  "line-height:" . $сc_style__sub_headline['line_height'] . "px;";
					$сc_style__sub_headline_set .=  "color:" . $сc_style__sub_headline_color . ";";
					$сc_style__sub_headline_set .=  "font-style:" . $сc_style__sub_headline['font_style'] . ";";
				}

				/* Editor */
				if ( get_sub_field( 'сc_style__editor' ) ) {
					$сc_style__editor = get_sub_field( 'сc_style__editor' );
					$сc_style__editor_color = get_sub_field( 'сc_style__editor-color' );

					if ( $сc_style__editor['font_family'] ) {
						$сc_style__editor_family = $сc_style__editor['font_family'];
					} else {
						$сc_style__editor_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $сc_style__editor['font_weight'] ) {
						$сc_style__editor_weight = $сc_style__editor['font_weight'];
					} else {
						$сc_style__editor_weight = 400;
					}

					$сc_style__editor_set =  "font-family:" . $сc_style__editor_family . ";";
					$сc_style__editor_set .=  "font-weight:" . $сc_style__editor_weight . ";";
					$сc_style__editor_set .=  "text-align:" . $сc_style__editor['text_align'] . ";";
					$сc_style__editor_set .=  "font-size:" . $сc_style__editor['font_size'] . "px;";
					$сc_style__editor_set .=  "line-height:" . $сc_style__editor['line_height'] . "px;";
					$сc_style__editor_set .=  "color:" . $сc_style__editor_color . ";";
					$сc_style__editor_set .=  "font-style:" . $сc_style__editor['font_style'] . ";";

					if ( get_sub_field( 'сc_style__editor_link' ) ) {
						$сc_style__editor_link = get_sub_field( 'сc_style__editor_link' );
					} else {
						$сc_style__editor_link = 'blue';
					}
				}

				if ( get_sub_field( 'сc_style__button_label_font' ) ) {
					$сc_style__button_font = get_sub_field( 'сc_style__button_label_font' );
					$сc_style__button_font_color = get_sub_field( 'сc_style__button_label_font-color' );

					if ( $сc_style__button_font['font_family'] ) {
						$сc_style__button_font_family = $сc_style__button_font['font_family'];
					} else {
						$сc_style__button_font_family = '"Open Sans", Arial, sans-serif';
					}

					if ( $сc_style__button_font['font_weight'] ) {
						$сc_style__button_font_weight = $сc_style__button_font['font_weight'];
					} else {
						$сc_style__button_font_weight = 400;
					}

					$сc_style__button_font_set =  "font-family: " . $сc_style__button_font_family . "; ";
					$сc_style__button_font_set .=  "font-weight: " . $сc_style__button_font_weight . "; ";
					$сc_style__button_font_set .=  "text-align: " . $сc_style__button_font['text_align'] . "; ";
					$сc_style__button_font_set .=  "font-size: " . $сc_style__button_font['font_size'] . "px; ";
					$сc_style__button_font_set .=  "line-height: " . $сc_style__button_font['line_height'] . "px; ";
					$сc_style__button_font_set .=  "color: " . $сc_style__button_font_color . "; ";
					$сc_style__button_font_set .=  "font-style: " . $сc_style__button_font['font_style'] . "; ";
				} else { $сc_style__button_font_set = '// Styles for title is empty'; }

				/* Set Button styles */
				if ( get_sub_field( 'сc_style__button_style' ) == 'text' ) {
					$сc_style__button_style = 'border-radius: 0; background: none;';
				} elseif ( get_sub_field( 'сc_style__button_style' ) == 'square' ) {
					$сc_style__button_style = 'border-radius: 0; padding: 4px 7px;';
				} elseif ( get_sub_field( 'сc_style__button_style' ) == 'round' ) {
					$сc_style__button_style = 'border-radius: 50%; padding: 4px 7px;';
				} elseif ( get_sub_field( 'сc_style__button_style' ) == 'corner' ) {
					$сc_style__button_style = 'border-radius: 5px; padding: 4px 7px;';
				}

				/* Button BG */
				if ( get_sub_field( 'сc_style__button_bg' ) ) {
					$cc_style__button_bg_color = get_sub_field( 'сc_style__button_bg' );
				} else {
					$cc_style__button_bg_color = 'transparent';
				}

				/* Mouseover effect */
				$cc_style__button_hover_object = get_sub_field( 'сc_style__button_hover' );
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
						$cc_style__button_hover_bg_color = $сc_style__button_font_color;
						$cc_style__button_hover_te_color = $cc_style__button_bg_color;
					} else {
						$cc_style__button_hover_bg_color = $cc_style__button_bg_color;
						$cc_style__button_hover_te_color = $сc_style__button_font_color;
					}

					if ( $cc_style__button_hover_object_text ) {
						$cc_style__button_hover_te_deco = 'underline';
					} else {
						$cc_style__button_hover_te_deco = 'none';
					}
				}

				/* Button Position */
				if ( get_sub_field( 'сc_style__button_pos' ) == 'left' ) {
					$сc_style__button_pos = 'margin-right: auto;';
				} elseif ( get_sub_field( 'сc_style__button_pos' ) == 'center' ) {
					$сc_style__button_pos = 'margin-right: auto;';
					$сc_style__button_pos .= 'margin-left: auto;';
				} elseif ( get_sub_field( 'сc_style__button_pos' ) == 'right' ) {
					$сc_style__button_pos .= 'margin-left: auto;';
				} elseif ( get_sub_field( 'сc_style__button_pos' ) == 'detail' ) {

				}

				/* Set Button border */
				if ( get_sub_field( 'сc_style__button_bor' ) == 'no' ) {
					$сc_style__button_bor = 'none';
					$сc_style__button_bor_hover = 'none';
				} else {
					$сc_style__button_bor_width = get_sub_field( 'сc_style__button_bor_width' );
					$сc_style__button_bor_hover = $сc_style__button_bor_width . 'px solid ' . '#000';

					if ( get_sub_field( 'сc_style__button_bor' ) == 'yes' ) {
						$сc_style__button_bor = $сc_style__button_bor_width . 'px solid #fff';
					} elseif ( get_sub_field( 'сc_style__button_bor' ) == 'hover' ) {
						$сc_style__button_bor = $сc_style__button_bor_width . 'px solid transparent';
					}
				}

				/* Label Shadow */
				if ( get_sub_field( 'сc_style__button_label_sha' ) ) {
					$сc_style__button_label_sha = '1px 1px 3px rgba(0,0,0,.3), 1px 1px 3px rgba(0,0,0,.3)';
				} else {
					$сc_style__button_label_sha = 'none';
				}

				$tour_line_width_percent = get_sub_field( 'сc_style__hl_width' );
				$tour_line_color = get_sub_field( 'сc_style__hl_color' );
				$tour_line_thi = get_sub_field( 'сc_style__hl_thi' );

				/* Horizontal Line Color */
				if ( get_sub_field( 'сc_style__hl_color' ) ) {
					$сc_style__hl_color = get_sub_field( 'сc_style__hl_color' );
				} else {
					$сc_style__hl_color = '#000';
				}

				/* Horizontal Line Thchness */
				if ( get_sub_field( 'сc_style__hl_thi' ) ) {
					$сc_style__hl_thi = get_sub_field( 'сc_style__hl_thi' ) . 'px';
				} else {
					$сc_style__hl_thi = '1px';
				}

				/* Horizontal Line Width */
				if ( get_sub_field( 'сc_style__hl_width' ) == 'full' ) {
					$сc_style__hl_width = '100%';
				} elseif ( get_sub_field( 'сc_style__hl_width' ) == 'three-four' ) {
					$сc_style__hl_width = '75%';
				} elseif ( get_sub_field( 'сc_style__hl_width' ) == 'three-four' ) {
					$сc_style__hl_width = '50%';
				}

				/* Accordion Label Font */
				if ( get_sub_field( 'сc_style__a-l_font' ) ) {
					$cc_style__a_l_font = get_sub_field( 'сc_style__a-l_font' );
					$cc_style__a_l_font_color = get_sub_field( 'сc_style__a-l_font-color' );

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
				if ( get_sub_field( 'сc_style__a-l_font-hover' ) ) {
					$cc_style__a_l_font_hover = get_sub_field( 'сc_style__a-l_font-hover' );
				}

				/* Accordion Paragraf Font */
				if ( get_sub_field( 'сc_style__a-p_font' ) ) {
					$cc_style__a_p_font = get_sub_field( 'сc_style__a-p_font' );
					$cc_style__a_p_font_color = get_sub_field( 'сc_style__a-p_font-color' );

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
				if ( get_sub_field( 'сc_style__a-p_font-link' ) ) {
					$cc_style__a_p_font_link = get_sub_field( 'сc_style__a-p_font-link' );
				}
			}
		} 
	?>

	<style>
		div.pc--c__content {
			background: <?php echo $сc_style__bg; ?>;
		}

		div.pc--c div.pc--c__headline > * {
			<?php echo $сc_style__headline_set; ?>;
		}

		div.pc--c div.pc--c__subheadline > *  {
			<?php echo $сc_style__sub_headline_set; ?>;
		}

		div.pc--c div.pc--c__editor {
			<?php echo $сc_style__editor_set; ?>;
		}

		div.pc--c div.pc--c__editor p {
			margin-bottom: 0;
			margin-top: 0;
		}

		div.pc--c div.pc--c__editor p + p {
			margin-top: 10px;
		}

		div.pc--c div.pc--c__editor a {
			color: <?php echo $сc_style__editor_link; ?>;
		}

		div.pc--c div.pc--c__editor a:hover {
			text-decoration: underline;
		}

		.pc--c__button button {
			<?php echo $сc_style__button_font_set; ?>
			<?php echo $сc_style__button_style . $сc_style__button_pos; ?>
			background-color: <?php echo $cc_style__button_bg_color; ?>;
			display: block;
			border: <?php echo $сc_style__button_bor; ?>;
			text-shadow: <?php echo $сc_style__button_label_sha; ?>;
		}

		.pc--c__button button:hover {
			background-color: <?php echo $cc_style__button_hover_bg_color; ?>;
			color: <?php echo $cc_style__button_hover_te_color; ?>;
			text-decoration: <?php echo $cc_style__button_hover_te_deco; ?>;
			border: <?php echo $сc_style__button_bor_hover; ?>;
		}

		.pc--c__line .pc--c__line-item {
			width: 100px;
			margin: 0 auto;
			border-top: <?php echo $сc_style__hl_thi . ' solid ' . $сc_style__hl_color; ?>;
			width: <?php echo $сc_style__hl_width; ?>
		}

		.pc--c__accordion--label {
			<?php echo $cc_style__a_l_font_set; ?>
		}

		.pc--c__accordion--label:hover {
			color: <?php echo $cc_style__a_l_font_hover; ?>;
		}

		.pc--c__accordion--paragraf {
			<?php echo $cc_style__a_p_font_set; ?>
		}

		.pc--c__accordion--paragraf a {
			text-decoration: underline;
		}

		.pc--c__accordion--paragraf a:hover {
			color: <?php echo $cc_style__a_p_font_link; ?>;
		}
	</style>

<?php } ?>