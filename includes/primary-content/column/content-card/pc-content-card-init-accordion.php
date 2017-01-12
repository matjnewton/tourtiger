<?php 

$cc_style__ccc_css = '';

/* Accordion Label Font */
if ( get_sub_field( 'cc_style__a-l_font' ) ) {
	$cc_style__a_l_font = get_sub_field( 'cc_style__a-l_font' );

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

	$cc_style__ccc_css .=  "font-family:" . $cc_style__a_l_font_family . ";";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style__a_l_font_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style__a_l_font['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style__a_l_font['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style__a_l_font['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__a-l_font-color' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style__a_l_font['font_style'] . ";";

	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--label {' . $cc_style__ccc_css . ';}';
}

/* Accordion Label Font Link Hover */
if ( get_sub_field( 'cc_style__a-l_font-hover' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-l_font-hover' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--label:hover {' . $cc_style__ccc_css . ';}';
}

$cc_style__ccc_css = '';

/* Accordion Paragraf Font */
if ( get_sub_field( 'cc_style__a-p_font' ) ) {
	$cc_style__a_p_font = get_sub_field( 'cc_style__a-p_font' );

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

	$cc_style__ccc_css .=  "font-family:" . $cc_style__a_p_font_family . ";";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style__a_p_font_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style__a_p_font['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style__a_p_font['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style__a_p_font['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__a-p_font-color' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style__a_p_font['font_style'] . ";";

	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--paragraf {' . $cc_style__ccc_css . ';}';
}

/* Accordion Paragraf Font Link Hover */
if ( get_sub_field( 'cc_style__a-p_font-link' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-p_font-link' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--paragraf a:hover {' . $cc_style__ccc_css . ';}';
}