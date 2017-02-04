<?php

$fc_style__fcc_css = '';

/* Price Font Field */
if ( get_sub_field( 'fc_style__ct_pric_font' ) ) {
	$fc_style__ct_pric_font = get_sub_field( 'fc_style__ct_pric_font' );
	$fc_style__ct_pric_font_color = get_sub_field( 'fc_style__ct_pric_font-color' );

	if ( $fc_style__ct_pric_font['font-family'] ) {
		$fc_style__ct_pric_font_family = $fc_style__ct_pric_font['font-family'];
	} else {
		$fc_style__ct_pric_font_family = '"Roboto", Arial, sans-serif';
	}

	if ( $fc_style__ct_pric_font['font-weight'] ) {
		$fc_style__ct_pric_font_weight = $fc_style__ct_pric_font['font-weight'];
	} else {
		$fc_style__ct_pric_font_weight = 400;
	}

	$fc_style__fcc_css .=  "font-family: '" . $fc_style__ct_pric_font_family . "'; ";
	$fc_style__fcc_css .=  "font-weight: " . $fc_style__ct_pric_font_weight . "; ";
	$fc_style__fcc_css .=  "text-align: " . $fc_style__ct_pric_font['text_align'] . "; ";
	$fc_style__fcc_css .=  "font-size: " . $fc_style__ct_pric_font['font_size'] . "px; ";
	$fc_style__fcc_css .=  "line-height: " . $fc_style__ct_pric_font['line_height'] . "px; ";
	$fc_style__fcc_css .=  "color: " . $fc_style__ct_pric_font_color . "; ";
	$fc_style__fcc_css .=  "font-style: " . $fc_style__ct_pric_font['font_style'] . "; ";
}

/* Price Underline */
if ( get_sub_field( 'fc_style__ct_pric_under' ) ) 
	$fc_style__fcc_css .= 'text-decoration:underline;';

/* Price Shadow */
if ( get_sub_field( 'fc_style__ct_pric_drop' ) ) 
	$fc_style__fcc_css .= 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);';

if ( get_sub_field( 'fc_style__ct_butt_pos' ) == 'rigt-d' ) {
	$fc_style__fcc_css .= 'padding:15px 20px;';
} else {
	$fc_style__fcc_css .= 'padding:4px 7px;';
}

echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $fc_style__ct_pric_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--second_price {' . $fc_style__fcc_css . '}';

?>