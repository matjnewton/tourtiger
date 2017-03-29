<?php

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_desc_font' ) );

if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_desc_font-color' ) ) $fc_style__fcc_css[1] .= 'color:' . get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_desc_font-color' ) . ';';
if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_desc_under' ) ) $fc_style__fcc_css[1] .= 'text-decoration: underline;';
if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_desc_sh' ) ) $fc_style__fcc_css[1] .= 'text-shadow: 1px 1px 3px rgba(0,0,0,.3), 1px 1px 3px rgba(0,0,0,.3);';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo $fc_style__fcc_css[1] ? '#pc_wrap .' . $fc_style . ' .fc_style--' . $flexi_attr['name'] . '_desc {' . $fc_style__fcc_css[1] . '}':'';

?>