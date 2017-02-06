<?php 

/*
	Image text
 */

$fc_style__fcc_css = 'position: relative;z-index: 4;padding: 5px 0;';

if ( get_sub_field( 'fc_style__imte_pos' ) == 'top' ) {
	$fc_style__fcc_css .= 'order: 1;margin-bottom: auto;';
} elseif ( get_sub_field( 'fc_style__imte_pos' ) == 'center' ) {
	$fc_style__fcc_css .= 'order: 2;margin-top: auto;margin-bottom: auto;';
} elseif ( get_sub_field( 'fc_style__imte_pos' ) == 'bottom' ) {
	$fc_style__fcc_css .= 'order: 3;margin-top: auto;';
}

if ( get_sub_field( 'fc_style__imte_bg' ) ) $fc_style__fcc_css .= 'background-color:' . get_sub_field( 'fc_style__imte_bg' ) . ';';

echo '#pc_wrap .' . $fc_style . ' .fc_style--image_text {' . $fc_style__fcc_css . '}';

/*
	Image title
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__imte_font' ) );
$fc_style__imte_font_color = get_sub_field( 'fc_style__imte_font-color' );

$fc_style__fcc_css[1] .= $fc_style__imte_font_color ? 'color:' . $fc_style__imte_font_color . ';' : '';
$fc_style__fcc_css[1] .= 'position: relative;padding: 5px 0;';

if ( get_sub_field( 'fc_style__imte_drsh' ) ) $fc_style__fcc_css[1] .= 'text-shadow:1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3);';
if ( get_sub_field( 'fc_style__imte_und' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title {' . $fc_style__fcc_css[1] . '}';

/*
	Decoration
 */

if ( get_sub_field( 'fc_style__imte_dec' ) == 'double' ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:before {content:\'\';display: inline-block;position: absolute;left: 50%;left: 50%;width: 100%;border-top: 1px solid ' . $fc_style__imte_font_color . ';-webkit-transform: translateX(-50%);transform: translateX(-50%);top:0;}';
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:after {content:\'\';display: inline-block;position: absolute;left: 50%;left: 50%;width: 100%;border-top: 1px solid ' . $fc_style__imte_font_color . ';-webkit-transform: translateX(-50%);transform: translateX(-50%);bottom:0;}';
}  elseif ( get_sub_field( 'fc_style__imte_dec' ) == 'underline' ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:after {content:\'\';display: inline-block;position: absolute;left: 50%;left: 50%;width: 100%;border-top: 1px solid ' . $fc_style__imte_font_color . ';-webkit-transform: translateX(-50%);transform: translateX(-50%);bottom:0;}';
} 

/*
	Description
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__imte_font_des' ) );
$fc_style__imte_font_des_color = get_sub_field( 'fc_style__imte_font_des-color' );

$fc_style__fcc_css[1] .= $fc_style__imte_font_des_color ? 'color:' . $fc_style__imte_font_des_color . ';' : '';
$fc_style__fcc_css[1] .= 'padding: 5px 0;';

if ( get_sub_field( 'fc_style__imte_und_des' ) ) $fc_style__fcc_css[1] .= 'underline';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_desc {' . $fc_style__fcc_css[1] . '}';

?>