<?php

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__co_desc_font' ) );

if ( get_sub_field( 'fc_style__co_desc_font-color' ) ) $fc_style__fcc_css[1] .= 'color:' . get_sub_field( 'fc_style__co_desc_font-color' ) . ';';
if ( get_sub_field( 'fc_style__co_desc_under' ) ) $fc_style__fcc_css[1] .= 'text-decoration: underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_desc {' . $fc_style__fcc_css[0] . '}';

?>