<?php 

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
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:before {content:\'\';display: inline-block;position: absolute;left: 50%;left: 50%;width: 50%;border-top: 1px solid ' . $fc_style__imte_font_color . ';-webkit-transform: translateX(-50%);transform: translateX(-50%);top:0;}';
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:after {content:\'\';display: inline-block;position: absolute;left: 50%;left: 50%;width: 50%;border-top: 1px solid ' . $fc_style__imte_font_color . ';-webkit-transform: translateX(-50%);transform: translateX(-50%);bottom:0;}';
}  elseif ( get_sub_field( 'fc_style__imte_dec' ) == 'underline' ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:after {content:\'\';display: inline-block;position: absolute;left: 50%;left: 50%;width: 50%;border-top: 1px solid ' . $fc_style__imte_font_color . ';-webkit-transform: translateX(-50%);transform: translateX(-50%);bottom:0;}';
} 

?>