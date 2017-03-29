<?php 

$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__editor' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__editor-color' ) ? 'color:' . get_sub_field( 'cc_style__editor-color' ) . ';' : '';
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__editor-shadow' ) ? 'text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.3);' : '';
echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' div.pc--c__editor {' . $cc_style__ccc_css[1] . '}' : '';
echo get_sub_field( 'cc_style__editor_link' ) ? '#pc_wrap .' . $cc_style . ' div.pc--c__editor a:hover {color:' . get_sub_field( 'cc_style__editor_link' ) . ';}':'';
