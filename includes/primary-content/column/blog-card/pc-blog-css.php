<?php

add_action( "wp_footer", "add_primary_area_blog_card" );
 
function add_primary_area_blog_card() { ?>

<?php 

	if ( have_rows( 'bc_style-one', 'option' ) ) {
		while ( have_rows( 'bc_style-one', 'option' ) ) { the_row();

			echo '<style>';

			/*
				Title
			 */
			$bc_style__title_set = pc_init_font_css( get_sub_field( 'bc_style__title' ) );
			$bc_style__title_set[1] .= get_sub_field( 'bc_style__title-color' ) ? "color:" . get_sub_field( 'bc_style__title-color' ) . ";" :'';

			echo $bc_style__title_set[0] ? $bc_style__title_set[0] : '';
			echo $bc_style__title_set[1] ? '.pc_wrap .pc--blog__post .pc--blog__title {' . $bc_style__title_set[1] . '}' : '';

			/*
				Excerpt
			 */
			$bc_style__excerpt_set = pc_init_font_css( get_sub_field( 'bc_style__excerpt' ) );
			$bc_style__excerpt_set[1] .= get_sub_field( 'bc_style__excerpt-color' ) ? "color:" . get_sub_field( 'bc_style__excerpt-color' ) . ";" :''; 

			echo $bc_style__excerpt_set[0] ? $bc_style__excerpt_set[0] : '';
			echo $bc_style__excerpt_set[1] ? '.pc_wrap .pc--blog__post .pc--blog__excerpt {' . $bc_style__excerpt_set[1] . '}' : '';

			/*
				Date
			 */
			$bc_style__date_set = pc_init_font_css( get_sub_field( 'bc_style__date' ) );
			$bc_style__date_set[1] .= get_sub_field( 'bc_style__excerpt-color' ) ? "color:" . get_sub_field( 'bc_style__date-color' ) . ";" :''; 
			$bc_style__date_bg_color = get_sub_field( 'bc_style__date-bg-color' );

			if ( 
				   $bc_style__date_bg_color == '' 
				|| $bc_style__date_bg_color == 'transparent' 
				|| !$bc_style__date_bg_color 
			) {
				$bc_style__date_set[1] .= "padding: 0; background-color: transparent; ";
			} else {
				$bc_style__date_set[1] .= "padding: 8px 13px; background-color: " . $bc_style__date_bg_color . "; ";
			}

			echo $bc_style__date_set[0] ? $bc_style__date_set[0] : '';
			echo $bc_style__date_set[1] ? '.pc_wrap .pc--blog__post .pc--blog__date {' . $bc_style__date_set[1] . '}' : '';

			/*
				Button
			 */
			$bc_style__button_color = get_sub_field( 'bc_style__button-color' );
			$bc_style__button_bg_color = get_sub_field( 'bc_style__button-bg-color' );

			$bc_style__button_set = pc_init_font_css( get_sub_field( 'bc_style__button' ) );
			$bc_style__button_set[1] .= $bc_style__button_color ? "color:" . $bc_style__button_color . ";" :''; 
			$bc_style__button_set_hover = '';
			$bc_style__button = get_sub_field( 'bc_style__button' );
			$bc_style__button_bg_color = $bc_style__button_bg_color ? 'backgrond-color:' . $bc_style__button_bg_color . ';':'';

			if ( in_array( 'invert', get_sub_field( 'bc_type__button_hover' ) ) ) {
				$bc_style__button_set_hover .= $bc_style__button_color ? 'background-color:' . $bc_style__button_color . ';':'';
				$bc_style__button_set_hover .= $bc_style__button_bg_color ? 'color:' . $bc_style__button_bg_color . ';':'';
			} else {
				$bc_style__button_set_hover .= $bc_style__button_bg_color ? 'background-color:' . $bc_style__button_bg_color . ';':'';
				$bc_style__button_set_hover .= $bc_style__button_color ? 'color:' . $bc_style__button_color . ';':'';
			}

			if ( in_array( 'decor', get_sub_field( 'bc_type__button_hover' ) ) ) $bc_style__button_set_hover .= 'text-decoration:underline;';


			if ( get_sub_field( 'bc_type__button' ) == 'text' ) {
				$bc_style__button_set[1] .= '';
			} elseif ( get_sub_field( 'bc_type__button' ) == 'square' ) {
				$bc_style__button_set[1] .= 'padding: 4px 7px; border-radius: 0;';
			} elseif ( get_sub_field( 'bc_type__button' ) == 'round' ) {
				$bc_style__button_set[1] .= 'padding: 4px 7px; border-radius: 50%;';
			} elseif ( get_sub_field( 'bc_type__button' ) == 'corner' ) {
				$bc_style__button_set[1] .= 'padding: 4px 7px; border-radius: 4px;';
			}

			if ( get_sub_field( 'bc_style__button_drop' ) ) $bc_style__button_set[1] .= 'text-shadow: 1px 1px 2px rgba(0,0,0,.2);';

			if ( get_sub_field( 'bc_style__button_bor' ) != 'no' ) {
				$bc_style__button_set[1] .= 'border:' . get_sub_field( 'bc_style__button_thi' ) . 'px solid transparent;';
				$bc_style__button_set_hover .= 'border-color:' . $bc_style__button_color_hover;

				if ( get_sub_field( 'bc_style__button_bor' ) == 'yes' ) {
					$bc_style__button_set[1] .= 'border-color:' . $bc_style__button_color . ';';
				}
			}

			echo $bc_style__button_set[0] ? $bc_style__button_set[0] : '';
			echo $bc_style__button_set[1] ? '.pc_wrap .pc--blog__post .pc--blog__button {' . $bc_style__button_set[1] . '}' : '';
			echo $bc_style__button_set_hover ? '.pc_wrap .pc--blog__post .pc--blog__button:hover {' . $bc_style__button_set_hover . '}' : '';

			echo '</style>';

		}
	}
} ?>