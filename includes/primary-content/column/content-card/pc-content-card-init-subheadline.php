<?php

$cc_style__ccc_css = '';

/* Sub Headline */
if ( get_sub_field( 'cc_style__sub-headline' ) ) {
	$cc_style__sub_headline = get_sub_field( 'cc_style__sub-headline' );

	if ( $cc_style__sub_headline['font-family'] ) {
		$cc_style__sub_headline_family = $cc_style__sub_headline['font-family'];
	} else {
		$cc_style__sub_headline_family = 'Open Sans';
	}

	if ( $cc_style__sub_headline['font-weight'] ) {
		$cc_style__sub_headline_weight = $cc_style__sub_headline['font-weight'];
	} else {
		$cc_style__sub_headline_weight = 400;
	}

	$cc_style__ccc_css .=  "font-family:'" . $cc_style__sub_headline_family . "';";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style__sub_headline_weight . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style__sub_headline['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style__sub_headline['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__sub-headline-color' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style__sub_headline['font_style'] . ";";

	echo $cc_style__sub_headline['font-family'] ? "</style><style type="text/css">@import url('https://fonts.googleapis.com/css?family=" . $cc_style__sub_headline['font-family'] . "');" : '';
	echo '#pc_wrap .' . $cc_style . ' div.pc--c__subheadline > *  {' . $cc_style__ccc_css . ';}';
}
