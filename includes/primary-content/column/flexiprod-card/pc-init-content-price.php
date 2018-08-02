<?php

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_pric_font' ) );

if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_pric_font-color' ) ) $fc_style__fcc_css[1] .= 'color:' . get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_pric_font-color' ) . ';';
if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_pric_under' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';
if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_pric_sh' ) ) $fc_style__fcc_css[1] .= 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);';

if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_butt_pos' ) == 'rigt-d' ) {
	$fc_style__fcc_css[1] .= 'padding:15px 20px;';
} else {
	$fc_style__fcc_css[1] .= 'padding:4px 7px;';
}

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--' . $flexi_attr['name'] . '_price {' . $fc_style__fcc_css[1] . '}';

?>