<?php 

$cc_style__ccc_css = '';

if ( get_sub_field( 'cc_style__headline' ) ) {
	$cc_style__headline = get_sub_field( 'cc_style__headline' );

	if ( $cc_style__headline['font-family'] ) {
		$cc_style__headline_family = $cc_style__headline['font-family'];
	} else {
		$cc_style__headline_family = '"Open Sans", Arial, sans-serif';
	}

	if ( $cc_style__headline['font-weight'] ) {
		$cc_style__headline_weight = $cc_style__headline['font-weight'];
	} else {
		$cc_style__headline_weight = 400;
	}

	$cc_style__ccc_css .=  "font-family:" . $cc_style__headline_family . ";";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style__headline_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style__headline['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style__headline['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style__headline['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__headline-color' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style__headline['font_style'] . ";";

	$css[0] = "@import url('https://fonts.googleapis.com/css?family=" . $cc_style__headline['font-family'] . "');";
	echo '#pc_wrap .' . $cc_style . ' div.pc--c__headline > * {' . $cc_style__ccc_css . ';}';
}