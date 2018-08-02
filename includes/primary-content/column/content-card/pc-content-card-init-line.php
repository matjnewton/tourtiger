<?php 

$cc_style__ccc_css = 'margin: 0 auto;border-top-style:solid;';

$tour_line_width_percent = get_sub_field( 'cc_style__hl_width' );
$tour_line_color = get_sub_field( 'cc_style__hl_color' );
$tour_line_thi = get_sub_field( 'cc_style__hl_thi' );

/* Horizontal Line Color */
if ( get_sub_field( 'cc_style__hl_color' ) ) {
	$cc_style__ccc_css .= 'border-top-color:' . get_sub_field( 'cc_style__hl_color' ) . ';';
} else {
	$cc_style__ccc_css .= 'border-top-color:#333;';
}

/* Horizontal Line Thchness */
if ( get_sub_field( 'cc_style__hl_thi' ) ) {
	$cc_style__ccc_css .= 'border-top-width:' . get_sub_field( 'cc_style__hl_thi' ) . 'px;';
} else {
	$cc_style__ccc_css .= 'border-top-width:1px;';
}

/* Horizontal Line Width */
if ( get_sub_field( 'cc_style__hl_width' ) == 'full' ) {
	$cc_style__ccc_css .= 'width:100%;';
} elseif ( get_sub_field( 'cc_style__hl_width' ) == 'three-four' ) {
	$cc_style__ccc_css .= 'width:75%;';
} elseif ( get_sub_field( 'cc_style__hl_width' ) == 'three-four' ) {
	$cc_style__ccc_css .= 'width:50%;';
}

echo '#pc_wrap .' . $cc_style . ' .pc--c__line .pc--c__line-item {' . $cc_style__ccc_css . ';}';