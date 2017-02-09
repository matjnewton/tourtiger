<?php 

$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__headline' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__headline-color' ) ? 'color:' . get_sub_field( 'cc_style__headline-color' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' div.pc--c__headline > * {' . $cc_style__ccc_css[1] . '}' : '';
