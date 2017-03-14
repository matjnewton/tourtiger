<?php 

/**
 * Paddings manipulations
 */
if ( get_sub_field( 'cc_style__card_paddings' ) ) {
	echo '#pc_wrap .' . $cc_style . '.pc--c__content{padding:0;}';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion{padding:15px 20px;}';
}

/**
 * Question label
 */
$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__a-l_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__a-l_font-color' ) ? 'color:' . get_sub_field( 'cc_style__a-l_font-color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__accordion--label_question {' . $cc_style__ccc_css[1] . '}' : '';

/* Accordion Label Font Link Hover */
if ( get_sub_field( 'cc_style__a-l_font-hover' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-l_font-hover' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--label_question:hover {' . $cc_style__ccc_css . ';}';
}

/**
 * More/Less label
 */
$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__a-s_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__a-s_font-color' ) ? 'color:' . get_sub_field( 'cc_style__a-s_font-color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__accordion--status {' . $cc_style__ccc_css[1] . '}' : '';

/* Accordion Label Font Link Hover */
if ( get_sub_field( 'cc_style__a-s_font-hover' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-s_font-hover' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--status:hover {' . $cc_style__ccc_css . ';}';
}

if ( get_sub_field( 'cc_style__a-arrow' ) ) {
	$color = get_sub_field( 'cc_style__a-l_font-color' ) ? get_sub_field( 'cc_style__a-l_font-color' ) : '#777';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--status:after {transition:.3s;content:"";width:0;height:0;border: 4px solid transparent;display:inline-block;margin-left:5px;}';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--status_opened:after {border-bottom:9px solid ' . $color .  ';}';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--status_closed:after {border-top:9px solid ' . $color .  ';position: relative;transform: translateY(25%);}';
}

/**
 * Paragraph
 */
$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__a-p_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__a-p_font-color' ) ? 'color:' . get_sub_field( 'cc_style__a-p_font-color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__accordion--paragraf {' . $cc_style__ccc_css[1] . '}' : '';

/* Accordion Paragraf Font Link Hover */
if ( get_sub_field( 'cc_style__a-p_font-link' ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__a-p_font-link' ) . ';';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__accordion--paragraf a:hover {' . $cc_style__ccc_css . ';}';
}