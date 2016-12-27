<?php

if ( have_rows( 'bc_style-one', 'option' ) ) {
	while ( have_rows( 'bc_style-one', 'option' ) ) { the_row();
		$bc_style__date_pos = get_sub_field( 'bc_style__date-pos' );
	}
} 

add_action( "wp_footer", "add_primary_area_blog_card" );
 
function add_primary_area_blog_card() { ?>

<?php 

	if ( have_rows( 'bc_style-one', 'option' ) ) {
		while ( have_rows( 'bc_style-one', 'option' ) ) { the_row();

			if ( get_sub_field( 'bc_style__title' ) ) {
				$bc_style__title = get_sub_field( 'bc_style__title' );
				$bc_style__title_color = get_sub_field( 'bc_style__title-color' );

				if ( $bc_style__title['font_family'] ) {
					$bc_style__title_family = $bc_style__title['font_family'];
				} else {
					$bc_style__title_family = '"Open Sans", Arial, sans-serif';
				}

				if ( $bc_style__title['font_weight'] ) {
					$bc_style__title_weight = $bc_style__title['font_weight'];
				} else {
					$bc_style__title_weight = 400;
				}

				$bc_style__title_set =  "font-family: " . $bc_style__title_family . "; ";
				$bc_style__title_set .=  "font-weight: " . $bc_style__title_weight . "; ";
				$bc_style__title_set .=  "text-align: " . $bc_style__title['text_align'] . "; ";
				$bc_style__title_set .=  "font-size: " . $bc_style__title['font_size'] . "px; ";
				$bc_style__title_set .=  "line-height: " . $bc_style__title['line_height'] . "px; ";
				$bc_style__title_set .=  "color: " . $bc_style__title_color . "; ";
				$bc_style__title_set .=  "font-style: " . $bc_style__title['font_style'] . "; ";
			} 

			if ( get_sub_field( 'bc_style__excerpt' ) ) {
				$bc_style__excerpt = get_sub_field( 'bc_style__excerpt' );
				$bc_style__excerpt_color = get_sub_field( 'bc_style__excerpt-color' );

				if ( $bc_style__excerpt['font_family'] ) {
					$bc_style__excerpt_family = $bc_style__excerpt['font_family'];
				} else {
					$bc_style__excerpt_family = '"Open Sans", Arial, sans-serif';
				}

				if ( $bc_style__excerpt['font_weight'] ) {
					$bc_style__excerpt_weight = $bc_style__excerpt['font_weight'];
				} else {
					$bc_style__excerpt_weight = 400;
				}

				$bc_style__excerpt_set =  "font-family:" . $bc_style__excerpt_family . ";";
				$bc_style__excerpt_set .=  "font-weight:" . $bc_style__excerpt_weight . ";";
				$bc_style__excerpt_set .=  "text-align:" . $bc_style__excerpt['text_align'] . ";";
				$bc_style__excerpt_set .=  "font-size:" . $bc_style__excerpt['font_size'] . "px;";
				$bc_style__excerpt_set .=  "line-height:" . $bc_style__excerpt['line_height'] . "px;";
				$bc_style__excerpt_set .=  "color:" . $bc_style__excerpt_color . ";";
				$bc_style__excerpt_set .=  "font-style:" . $bc_style__excerpt['font_style'] . ";";
			}

			if ( get_sub_field( 'bc_style__date' ) ) {
				$bc_style__date = get_sub_field( 'bc_style__date' );
				$bc_style__date_color = get_sub_field( 'bc_style__date-color' );
				$bc_style__date_bg_color = get_sub_field( 'bc_style__date-bg-color' );

				if ( $bc_style__date['font_family'] ) {
					$bc_style__date_family = $bc_style__date['font_family'];
				} else {
					$bc_style__date_family = '"Open Sans", Arial, sans-serif';
				}

				if ( $bc_style__date['font_weight'] ) {
					$bc_style__date_weight = $bc_style__date['font_weight'];
				} else {
					$bc_style__date_weight = 400;
				}

				if ( 
					   $bc_style__date_bg_color == '' 
					|| $bc_style__date_bg_color == 'transparent' 
					|| !$bc_style__date_bg_color 
				) {
					$bc_style__date_set = "padding: 0; background-color: transparent; ";
				} else {
					$bc_style__date_set = "padding: 8px 13px; background-color: " . $bc_style__date_bg_color . "; ";
				}

				$bc_style__date_set .=  "font-family:" . $bc_style__date_family . ";";
				$bc_style__date_set .=  "font-weight:" . $bc_style__date_weight . ";";
				$bc_style__date_set .=  "text-align:" . $bc_style__date['text_align'] . ";";
				$bc_style__date_set .=  "font-size:" . $bc_style__date['font_size'] . "px;";
				$bc_style__date_set .=  "line-height:" . $bc_style__date['line_height'] . "px;";
				$bc_style__date_set .=  "color:" . $bc_style__date_color . ";";
				$bc_style__date_set .=  "font-style:" . $bc_style__date['font_style'] . ";";
			}

			if ( get_sub_field( 'bc_type__button' ) ){
				$bc_style__button = get_sub_field( 'bc_style__button' );
				$bc_style__button_color = get_sub_field( 'bc_style__button-color' );
				$bc_style__button_set_hover = '';

				if ( get_sub_field( 'bc_style__button-bg-color' ) ) {
					$bc_style__button_bg_color = get_sub_field( 'bc_style__button-bg-color' );
				} else {
					$bc_style__button_bg_color = "#fff";
				}

				if ( in_array( 'invert', get_sub_field( 'bc_type__button_hover' ) ) ) {
					$bc_style__button_bg_color_hover = $bc_style__button_color;
					$bc_style__button_color_hover = $bc_style__button_bg_color;
				} else {
					$bc_style__button_bg_color_hover = $bc_style__button_bg_color;
					$bc_style__button_color_hover = $bc_style__button_color;
				}

				if ( in_array( 'decor', get_sub_field( 'bc_type__button_hover' ) ) ) {
					$bc_style__button_bg_decor_hover = 'underline';
				} else {
					$bc_style__button_bg_decor_hover = 'none';
				}

				if ( $bc_style__button['font_family'] ) {
					$bc_style__button_family = $bc_style__button['font_family'];
				} else {
					$bc_style__button_family = '"Open Sans", Arial, sans-serif';
				}	

				if ( $bc_style__button['font_weight'] ) {
					$bc_style__button_weight = $bc_style__button['	font_weight'];
				} else {
					$bc_style__button_weight = 400;
				}

				$bc_style__button_set =  "font-family:" . $bc_style__button_family . ";";
				$bc_style__button_set .=  "font-weight:" . $bc_style__button_weight . ";";
				$bc_style__button_set .=  "text-align:" . $bc_style__button['text_align'] . ";";
				$bc_style__button_set .=  "font-size:" . $bc_style__button['font_size'] . "px;";
				$bc_style__button_set .=  "line-height:" . $bc_style__button['line_height'] . "px;";
				$bc_style__button_set .=  "color:" . $bc_style__button_color . ";";
				$bc_style__button_set .=  "background-color:" . $bc_style__button_bg_color . ";";
				$bc_style__button_set .=  "font-style:" . $bc_style__button['font_style'] . ";";
				$bc_style__button_set .=  "text-decoration: none;";

				if ( get_sub_field( 'bc_type__button' ) == 'text' ) {
					$bc_style__button_set .= '';
				} elseif ( get_sub_field( 'bc_type__button' ) == 'square' ) {
					$bc_style__button_set .= 'padding: 4px 7px; border-radius: 0;';
				} elseif ( get_sub_field( 'bc_type__button' ) == 'round' ) {
					$bc_style__button_set .= 'padding: 4px 7px; border-radius: 50%;';
				} elseif ( get_sub_field( 'bc_type__button' ) == 'corner' ) {
					$bc_style__button_set .= 'padding: 4px 7px; border-radius: 4px;';
				}

				if ( get_sub_field( 'bc_style__button_drop' ) ) {
					$bc_style__button_set .= 'text-shadow: 1px 1px 2px rgba(0,0,0,.2);';
				}

				if ( get_sub_field( 'bc_style__button_bor' ) != 'no' ) {
					$bc_style__button_set .= 'border:' . get_sub_field( 'bc_style__button_thi' ) . 'px solid transparent;';
					$bc_style__button_set_hover .= 'border-color:' . $bc_style__button_color_hover;

					if ( get_sub_field( 'bc_style__button_bor' ) == 'yes' ) {
						$bc_style__button_set .= 'border-color:' . $bc_style__button_color . ';';
					}
				}
			}

		}
	}
?>

	<style>
		.pc_wrap .pc--blog__post .pc--blog__title { 
			<?php echo $bc_style__title_set; ?>
		}

		.pc_wrap .pc--blog__post .pc--blog__excerpt { 
			<?php echo $bc_style__excerpt_set; ?> 
		}

		.pc_wrap .pc--blog__post .pc--blog__date { 
			<?php echo $bc_style__date_set; ?>
			z-index: 3;
		}

		.pc_wrap .pc--blog__post .pc--blog__date.top-left {
			position: absolute;
			top: 20px;
			left: 0;
			padding: 8px 12px;
			color: #fff; 
			background-color: rgba(0,0,0,.5);
		}

		.pc_wrap .pc--blog__post .pc--blog__date.top-left {
			position: absolute;
			top: 20px;
			right: 0;
			padding: 8px 12px;
			color: #fff; 
			background-color: rgba(0,0,0,.5);
		}

		.pc_wrap .pc--blog__post .pc--blog__date.above {
			position: relative;
		}

		.pc_wrap .pc--blog__post .pc--blog__date.beneath {
			position: relative;
		}

		.pc_wrap .pc--blog__post .pc--blog__button { 
			margin-top: 15px;	
			display: inline-block;
			<?php echo $bc_style__button_set; ?>;
			transition: ease .3s;
		}

		.pc_wrap .pc--blog__post .pc--blog__button:hover {
			background-color: <?php echo $bc_style__button_bg_color_hover; ?>;
			color: <?php echo $bc_style__button_color_hover; ?>;
			<?php echo $bc_style__button_set_hover; ?>
			transition: ease .3s;
		}
	</style>


<?php } ?>