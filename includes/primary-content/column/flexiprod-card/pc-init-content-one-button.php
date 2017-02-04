<?php

$fc_style__fcc_css = 'transition: ease .3s;';
$fc_style__fcc_css_hover = 'transition: ease .3s;';

/* Button style */
if ( get_sub_field( 'fc_style__co_butt_style' ) == 'square' ) {
	$fc_style__fcc_css .= 'padding: 15px 20px;border-radius: 0;';
} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'round' ) {
	$fc_style__fcc_css .= 'padding: 15px 20px;border-radius: 50%;';
} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'corner' ) {
	$fc_style__fcc_css .= 'padding: 15px 20px;border-radius: 4px;';
}

/* Button font */
if ( get_sub_field( 'fc_style__co_butt_font' ) ) {
	$fc_style__fcc_butt_font = get_sub_field( 'fc_style__co_butt_font' );
	$fc_style__fcc_butt_font_color = get_sub_field( 'fc_style__co_butt_font-color' );

	if ( $fc_style__fcc_butt_font['font-family'] ) {
		$fc_style__fcc_butt_font_family = $fc_style__fcc_butt_font['font-family'];
	} else {
		$fc_style__fcc_butt_font_family = '"Roboto", Arial, sans-serif';
	}

	if ( $fc_style__fcc_butt_font['font-weight'] ) {
		$fc_style__fcc_butt_font_weight = $fc_style__fcc_butt_font['font-weight'];
	} else {
		$fc_style__fcc_butt_font_weight = 400;
	}

	$fc_style__fcc_css .=  "font-family: '" . $fc_style__fcc_butt_font_family . "'; ";
	$fc_style__fcc_css .=  "font-weight: " . $fc_style__fcc_butt_font_weight . "; ";
	$fc_style__fcc_css .=  "text-align: center; ";
	$fc_style__fcc_css .=  "font-size: " . $fc_style__fcc_butt_font['font_size'] . "px; ";
	$fc_style__fcc_css .=  "line-height: " . $fc_style__fcc_butt_font['line_height'] . "px; ";
	$fc_style__fcc_css .=  "color: " . $fc_style__fcc_butt_font_color . "; ";
	$fc_style__fcc_css .=  "font-style: " . $fc_style__fcc_butt_font['font_style'] . "; ";
}

/* Button BG color */
if ( get_sub_field( 'fc_style__co_butt_bg' ) ) {
	$fc_style__fcc_css .= 'background-color:' . get_sub_field( 'fc_style__co_butt_bg' ) . ';';
}

/* Button effect */
if ( get_sub_field( 'fc_style__co_butt_hover' ) ) {
	$fc_style__fcc_button_hover_show = get_sub_field( 'fc_style__co_butt_hover' );

	if ( $fc_style__fcc_button_hover_show ) {

		if ( in_array( 'invert', $fc_style__fcc_button_hover_show ) ) {
			$fc_style__fcc_css_hover .= 'background-color:' . $fc_style__fcc_butt_font_color . ';';
			$fc_style__fcc_css_hover .= 'color:' . get_sub_field( 'fc_style__co_butt_bg' ) . ';';
		}

		if ( in_array( 'decor', $fc_style__fcc_button_hover_show ) ) {
			$fc_style__fcc_css .= 'text-decoration: underline;';
		} else {
			$fc_style__fcc_css .= 'text-decoration: none;';
		}
	}
}

/* Button dropshadow */
if ( get_sub_field( 'fc_style__co_butt_drop' ) ) {
	$fc_style__fcc_css .= 'box-shadow: 2px 2px 6px 0 rgba(0,0,0,.3)';
}

/* Set border */
if ( 
	get_sub_field( 'fc_style__co_butt_bord' ) == 'yes' 
	|| get_sub_field( 'fc_style__co_butt_bord' ) == 'hover' 
) {
	$fc_style__fcc_butt_bord_width = get_sub_field( 'fc_style__co_butt_bord_width' );
	$fc_style__fcc_css_hover .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid ' . $fc_style__fcc_butt_font_color . ';';

	if ( get_sub_field( 'fc_style__co_butt_bord' ) == 'yes' ) {
 		$fc_style__fcc_css .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid ' . $fc_style__fcc_butt_font_color . ';';
	} elseif ( get_sub_field( 'fc_style__co_butt_bord' ) == 'hover' ) {
		$fc_style__fcc_css .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid transparent' . ';';
	}
} 

echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $fc_style__fcc_butt_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_button{' . $fc_style__fcc_css . '}';
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_button:hover{' . $fc_style__fcc_css_hover . '}';

?>