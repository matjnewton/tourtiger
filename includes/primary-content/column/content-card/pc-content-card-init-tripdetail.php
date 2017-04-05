<?php 

/**
 * Headline styles
 */
$cc_style__ccc_css     = pc_init_font_css( get_sub_field( 'cc_style__trip_headline_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__trip_headline_font_color' ) ? 'color:' . get_sub_field( 'cc_style__trip_headline_font_color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__tripdetail--headline {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Label styles
 */
$cc_style__ccc_css     = pc_init_font_css( get_sub_field( 'cc_style__trip_label_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__trip_label_font_color' ) ? 'color:' . get_sub_field( 'cc_style__trip_label_font_color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__tripdetail--label {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Details styles
 */
$cc_style__ccc_css     = pc_init_font_css( get_sub_field( 'cc_style__trip_details_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__trip_details_color' ) ? 'color:' . get_sub_field( 'cc_style__trip_details_color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__tripdetail---details {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Link styles
 */
$cc_style__ccc_css     = pc_init_font_css( get_sub_field( 'cc_style__trip_link_font' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__trip_link_color' ) ? 'color:' . get_sub_field( 'cc_style__trip_link_color' ) . ';' : '';
$cc_style__ccc_css[2] .= get_sub_field( 'cc_style__trip_link_color-h' ) ? 'color:' . get_sub_field( 'cc_style__trip_link_color-h' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__tripdetail---details a {' . $cc_style__ccc_css[1] . '}' : '';
echo $cc_style__ccc_css[2] ? '#pc_wrap .' . $cc_style . ' .pc--c__tripdetail---details a:hover {' . $cc_style__ccc_css[2] . '}' : '';

/**
 * Divider color
 */
echo '#pc_wrap .' . $cc_style . ' .pc--c__tripdetail--item:not(:first-child) { border-top: 1px solid ' . get_sub_field( 'cc_style__trip_divider_color' ) . ';}';


