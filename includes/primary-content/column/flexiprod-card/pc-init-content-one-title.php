<?php

$fc_style__fcc_css = '';

/* Title Font Field */
if ( get_sub_field( 'fc_style__co_titl_font' ) ) {
	$fc_style__co_titl_font = get_sub_field( 'fc_style__co_titl_font' );
	$fc_style__co_titl_font_color = get_sub_field( 'fc_style__co_titl_font-color' );

	if ( $fc_style__co_titl_font['font-family'] ) {
		$fc_style__co_titl_font_family = $fc_style__co_titl_font['font-family'];
	} else {
		$fc_style__co_titl_font_family = '"Roboto", Arial, sans-serif';
	}

	if ( $fc_style__co_titl_font['font-weight'] ) {
		$fc_style__co_titl_font_weight = $fc_style__co_titl_font['font-weight'];
	} else {
		$fc_style__co_titl_font_weight = 700;
	}

	$fc_style__fcc_css .=  "font-family: '" . $fc_style__co_titl_font_family . "'; ";
	$fc_style__fcc_css .=  "font-weight: " . $fc_style__co_titl_font_weight . "; ";
	$fc_style__fcc_css .=  "text-align: " . $fc_style__co_titl_font['text_align'] . "; ";
	$fc_style__fcc_css .=  "font-size: " . $fc_style__co_titl_font['font_size'] . "px; ";
	$fc_style__fcc_css .=  "line-height: " . $fc_style__co_titl_font['line_height'] . "px; ";
	$fc_style__fcc_css .=  "color: " . $fc_style__co_titl_font_color . "; ";
	$fc_style__fcc_css .=  "font-style: " . $fc_style__co_titl_font['font_style'] . "; ";
}

/* Title Underline */
if ( get_sub_field( 'fc_style__co_titl_under' ) ) {
	$fc_style__fcc_css .= 'text-decoration:underline;';
}

echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $fc_style__co_titl_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_title {' . $fc_style__fcc_css . '}';

?>