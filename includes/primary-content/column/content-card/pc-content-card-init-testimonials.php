<?php 

$cc_style__ccc_css = '';

/* Testimonial title Font */
if ( get_sub_field( 'cc_style__test_title_f' ) ) {
	$cc_style_tes_ti_font = get_sub_field( 'cc_style__test_title_f' );

	if ( $cc_style_tes_ti_font['font-family'] ) {
		$cc_style_tes_ti_font_family = $cc_style_tes_ti_font['font-family'];
	} else {
		$cc_style_tes_ti_font_family = '"Open Sans", Arial, sans-serif';
	}

	if ( $cc_style_tes_ti_font['font-weight'] ) {
		$cc_style_tes_ti_font_weight = $cc_style_tes_ti_font['font-weight'];
	} else {
		$cc_style_tes_ti_font_weight = 300;
	}

	$cc_style__ccc_css .=  "font-family:'" . $cc_style_tes_ti_font_family . "';";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style_tes_ti_font_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style_tes_ti_font['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style_tes_ti_font['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style_tes_ti_font['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__test_title_c' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style_tes_ti_font['font_style'] . ";";

	echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $cc_style_tes_ti_font['font-family'] . "');";
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--title {' . $cc_style__ccc_css . ';}';
}

/* Excerpt title Font */
if ( get_sub_field( 'cc_style__test_excerpt_f' ) ) {
	$cc_style_tes_ex_font = get_sub_field( 'cc_style__test_excerpt_f' );

	if ( $cc_style_tes_ex_font['font-family'] ) {
		$cc_style_tes_ex_font_family = $cc_style_tes_ex_font['font-family'];
	} else {
		$cc_style_tes_ex_font_family = '"Open Sans", Arial, sans-serif';
	}

	if ( $cc_style_tes_ex_font['font-weight'] ) {
		$cc_style_tes_ex_font_weight = $cc_style_tes_ex_font['font-weight'];
	} else {
		$cc_style_tes_ex_font_weight = 300;
	}

	$cc_style__ccc_css =  "font-family:'" . $cc_style_tes_ex_font_family . "';";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style_tes_ex_font_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style_tes_ex_font['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style_tes_ex_font['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style_tes_ex_font['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__test_excerpt_c' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style_tes_ex_font['font_style'] . ";";

	echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $cc_style_tes_ex_font['font-family'] . "');";
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--description {' . $cc_style__ccc_css . ';}';
}

/* Link title Font */
if ( get_sub_field( 'cc_style__test_link_f' ) ) {
	$cc_style_tes_li_font = get_sub_field( 'cc_style__test_link_f' );
	$cc_style__ccc_css_hover = 'color:' . get_sub_field( 'cc_style__test_link_c-h' ) . ';';

	if ( $cc_style_tes_li_font['font-family'] ) {
		$cc_style_tes_li_font_family = $cc_style_tes_li_font['font-family'];
	} else {
		$cc_style_tes_li_font_family = '"Open Sans", Arial, sans-serif';
	}

	if ( $cc_style_tes_li_font['font-weight'] ) {
		$cc_style_tes_li_font_weight = $cc_style_tes_li_font['font-weight'];
	} else {
		$cc_style_tes_li_font_weight = 300;
	}

	$cc_style__ccc_css =  "font-family:'" . $cc_style_tes_li_font_family . "';";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style_tes_li_font_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style_tes_li_font['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style_tes_li_font['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style_tes_li_font['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__test_link_c' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style_tes_li_font['font_style'] . ";";

	echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $cc_style_tes_li_font['font-family'] . "');";
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--link {' . $cc_style__ccc_css . ';}';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--link:hover {' . $cc_style__ccc_css_hover . ';}';
}

if ( in_array( 'quotes', get_sub_field( 'cc_style__test_show' ) ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__test_quotes_c' ) . ';';

	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider:before {' . $cc_style__ccc_css . ';}';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider:after {' . $cc_style__ccc_css . ';}';

	 echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider .slick-dots .slick-active button {' . get_sub_field( 'cc_style__test_quotes_c' ) . ';}';
} else {
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider .slick-dots .slick-active button {background-color:#666;}';
}


