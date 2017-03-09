<?php 

$cc_style__ccc_css = get_sub_field( 'cc_style__a-l_font' );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__a-l_font-color' ) ? 'color:' . get_sub_field( 'cc_style__a-l_font-color' ) . ';' : '';
echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__accordion--label {' . $cc_style__ccc_css[1] . '}' : '';

/* Accordion Label Font Link Hover */
if ( get_sub_field( 'cc_style__a-l_font-hover' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-l_font-hover' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--label:hover {' . $cc_style__ccc_css . ';}';
}

$cc_style__ccc_css = get_sub_field( 'cc_style__a-p_font' );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__a-p_font-color' ) ? 'color:' . get_sub_field( 'cc_style__a-p_font-color' ) . ';' : '';
echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__accordion--paragraf {' . $cc_style__ccc_css[1] . '}' : '';

/* Accordion Paragraf Font Link Hover */
if ( get_sub_field( 'cc_style__a-p_font-link' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-p_font-link' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--paragraf a:hover {' . $cc_style__ccc_css . ';}';
}