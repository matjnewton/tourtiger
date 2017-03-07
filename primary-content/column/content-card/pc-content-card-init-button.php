<?php 

/* Support 1 */
if ( get_sub_field( 'cc_style__button_supone_font' ) ) {
	$cc_style__ccc_css = '';

	$cc_style__button_supone_font = get_sub_field( 'cc_style__button_supone_font' );

	if ( $cc_style__button_supone_font['font-family'] ) {
		$cc_style__button_supone_font_family = $cc_style__button_supone_font['font-family'];
	} else {
		$cc_style__button_supone_font_family = 'Open Sans';
	}

	if ( $cc_style__button_supone_font['font-weight'] ) {
		$cc_style__button_supone_font_weight = $cc_style__button_supone_font['font-weight'];
	} else {
		$cc_style__button_supone_font_weight = 400;
	}

	$cc_style__ccc_css .=  "font-family: '" . $cc_style__button_supone_font_family . "'; ";
	$cc_style__ccc_css .=  "font-weight: " . $cc_style__button_supone_font_weight . "; ";
	$cc_style__ccc_css .=  "text-align: " . $cc_style__button_supone_font['text_align'] . "; ";
	$cc_style__ccc_css .=  "font-size: " . $cc_style__button_supone_font['font_size'] . "px; ";
	$cc_style__ccc_css .=  "line-height: " . $cc_style__button_supone_font['line_height'] . "px; ";
	$cc_style__ccc_css .=  "color: " . get_sub_field( 'cc_style__button_supone_font-color' ) . "; ";
	$cc_style__ccc_css .=  "font-style: " . $cc_style__button_supone_font['font_style'] . "; ";

	echo $cc_style__button_supone_font['font-family'] ? "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $cc_style__button_supone_font['font-family'] . "');" : '';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__button-supone {' . $cc_style__ccc_css . '}';
} 

/* Support 2 */
if ( get_sub_field( 'cc_style__button_suptwo_font' ) ) {
	$cc_style__ccc_css = '';

	$cc_style__button_suptwo_font = get_sub_field( 'cc_style__button_suptwo_font' );

	if ( $cc_style__button_suptwo_font['font-family'] ) {
		$cc_style__button_suptwo_font_family = $cc_style__button_suptwo_font['font-family'];
	} else {
		$cc_style__button_suptwo_font_family = 'Open Sans';
	}

	if ( $cc_style__button_suptwo_font['font-weight'] ) {
		$cc_style__button_suptwo_font_weight = $cc_style__button_suptwo_font['font-weight'];
	} else {
		$cc_style__button_suptwo_font_weight = 400;
	}

	$cc_style__ccc_css .=  "font-family: '" . $cc_style__button_suptwo_font_family . "'; ";
	$cc_style__ccc_css .=  "font-weight: " . $cc_style__button_suptwo_font_weight . "; ";
	$cc_style__ccc_css .=  "text-align: " . $cc_style__button_suptwo_font['text_align'] . "; ";
	$cc_style__ccc_css .=  "font-size: " . $cc_style__button_suptwo_font['font_size'] . "px; ";
	$cc_style__ccc_css .=  "line-height: " . $cc_style__button_suptwo_font['line_height'] . "px; ";
	$cc_style__ccc_css .=  "color: " . get_sub_field( 'cc_style__button_suptwo_font-color' ) . "; ";
	$cc_style__ccc_css .=  "font-style: " . $cc_style__button_suptwo_font['font_style'] . "; ";


	echo $cc_style__button_suptwo_font['font-family'] ? "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $cc_style__button_suptwo_font['font-family'] . "');" : '';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__button-suptwo {' . $cc_style__ccc_css . '}';
}

/* Button lable */
$cc_style__ccc_css = 'transition: ease .3s;';

if ( get_sub_field( 'cc_style__button_label_font' ) ) {
	$cc_style__button_font = get_sub_field( 'cc_style__button_label_font' );
	$cc_style__button_font_color = get_sub_field( 'cc_style__button_label_font-color' );

	if ( $cc_style__button_font['font-family'] ) {
		$cc_style__button_font_family = $cc_style__button_font['font-family'];
	} else {
		$cc_style__button_font_family = 'Open Sans';
	}

	if ( $cc_style__button_font['font-weight'] ) {
		$cc_style__button_font_weight = $cc_style__button_font['font-weight'];
	} else {
		$cc_style__button_font_weight = 400;
	}

	$cc_style__ccc_css .=  "font-family: '" . $cc_style__button_font_family . "'; ";
	$cc_style__ccc_css .=  "font-weight: " . $cc_style__button_font_weight . "; ";
	$cc_style__ccc_css .=  "text-align: " . $cc_style__button_font['text_align'] . "; ";
	$cc_style__ccc_css .=  "font-size: " . $cc_style__button_font['font_size'] . "px; ";
	$cc_style__ccc_css .=  "line-height: " . $cc_style__button_font['line_height'] . "px; ";
	$cc_style__ccc_css .=  "color: " . get_sub_field( 'cc_style__button_label_font-color' ) . "; ";
	$cc_style__ccc_css .=  "font-style: " . $cc_style__button_font['font_style'] . "; ";
} 

/* Set Button styles */
if ( get_sub_field( 'cc_style__button_style' ) == 'text' ) {
	$cc_style__ccc_css .= 'border-radius: 0;background: none;';
} elseif ( get_sub_field( 'cc_style__button_style' ) == 'square' ) {
	$cc_style__ccc_css .= 'border-radius: 0; padding: .4em .7em;';
} elseif ( get_sub_field( 'cc_style__button_style' ) == 'round' ) {
	$cc_style__ccc_css .= 'border-radius: 50%; padding: .4em .7em;';
} elseif ( get_sub_field( 'cc_style__button_style' ) == 'corner' ) {
	$cc_style__ccc_css .= 'border-radius: 5px; padding: .4em .7em;';
}

/* Button BG */
if ( get_sub_field( 'cc_style__button_bg' ) ) {
	$cc_style__ccc_css .= 'background-color:' . get_sub_field( 'cc_style__button_bg' ) . ';';
} else {
	$cc_style__ccc_css .= 'background-color:transparent;';
}

$cc_style__ccc_css_hover = 'transition: ease .3s;';

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
		$cc_style__ccc_css_hover .= 'background-color:' . $cc_style__button_font_color .';';
		$cc_style__ccc_css_hover .= 'color:' . get_sub_field( 'cc_style__button_bg' ) .';';
	} 

	if ( $cc_style__button_hover_object_text ) {
		$cc_style__ccc_css_hover .= 'text-decoration:underline;';
	} 
}

/* Set Button border */
if ( get_sub_field( 'cc_style__button_bor' ) != 'no' ) {
	$cc_style__button_bor_width = get_sub_field( 'cc_style__button_bor_width' );

	$cc_style__ccc_css_hover .= $cc_style__button_bor_width . 'px solid ' . $cc_style__button_font_color . ';';
	$cc_style__ccc_css .= 'padding: .4em .7em;';

	if ( get_sub_field( 'cc_style__button_bor' ) == 'yes' ) {
		$cc_style__button_bor = $cc_style__button_bor_width . 'px solid ' . $cc_style__button_font_color;
		$cc_style__ccc_css .= 'border:' . $cc_style__button_bor_width . 'px solid ' . get_sub_field( 'cc_style__button_bg' ) . ';';
	} elseif ( get_sub_field( 'cc_style__button_bor' ) == 'hover' ) {
		$cc_style__ccc_css .= 'border:' . $cc_style__button_bor_width . 'px solid transparent;';
	}
}

/* Label Shadow */
if ( get_sub_field( 'cc_style__button_label_sha' ) ) {
	$cc_style__ccc_css .= 'text-shadow: 1px 1px 3px rgba(0,0,0,.3), 1px 1px 3px rgba(0,0,0,.3);';
}

echo $cc_style__button_font['font-family'] ? "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $cc_style__button_font['font-family'] . "');" : '';
echo '#pc_wrap .' . $cc_style . ' .pc--c__button-link {' . $cc_style__ccc_css . '}';
echo '#pc_wrap .' . $cc_style . ' .pc--c__button-link:hover {' . $cc_style__ccc_css . '}';