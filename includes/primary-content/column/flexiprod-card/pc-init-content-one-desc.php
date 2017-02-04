<?php

$fc_style__fcc_css = '';

/* Desc Font Field */
if ( get_sub_field( 'fc_style__co_desc_font' ) ) {
	$fc_style__co_desc_font = get_sub_field( 'fc_style__co_desc_font' );
	$fc_style__co_desc_font_color = get_sub_field( 'fc_style__co_desc_font-color' );

	if ( $fc_style__co_desc_font['font-family'] ) {
		$fc_style__co_desc_font_family = $fc_style__co_desc_font['font-family'];
	} else {
		$fc_style__co_desc_font_family = '"Roboto", Arial, sans-serif';
	}

	if ( $fc_style__co_desc_font['font-weight'] ) {
		$fc_style__co_desc_font_weight = $fc_style__co_desc_font['font-weight'];
	} else {
		$fc_style__co_desc_font_weight = 400;
	}

	$fc_style__fcc_css .=  "font-family:'" . $fc_style__co_desc_font_family . "';";
	$fc_style__fcc_css .=  "font-weight:" . $fc_style__co_desc_font_weight . ";";
	$fc_style__fcc_css .=  "text-align:" . $fc_style__co_desc_font['text_align'] . ";";
	$fc_style__fcc_css .=  "font-size:" . $fc_style__co_desc_font['font_size'] . "px;";
	$fc_style__fcc_css .=  "line-height:" . $fc_style__co_desc_font['line_height'] . "px;";
	$fc_style__fcc_css .=  "color:" . $fc_style__co_desc_font_color . ";";
	$fc_style__fcc_css .=  "font-style:" . $fc_style__co_desc_font['font_style'] . ";";
}

/* Desc Underline */
if ( get_sub_field( 'fc_style__co_desc_under' ) ) {
	$fc_style__fcc_css .= 'text-decoration: underline;';
} 

echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $fc_style__co_desc_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_desc {' . $fc_style__fcc_css . '}';

?>