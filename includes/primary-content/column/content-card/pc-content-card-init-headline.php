<?php

for ( $i = 0; $i < 7; $i++ ) {
	$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__headline-h' . $i ) );
    $cc_style__ccc_css[1] = $cc_style__ccc_css[1] ?? '';
	$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__headline-color-h' . $i ) ? 'color:' . get_sub_field( 'cc_style__headline-color-h' . $i ) . ';' : '';
	$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__headline-shadow-h' . $i ) ? 'text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.3);' : '';
	echo $cc_style__ccc_css[0] ?? '';
	echo $cc_style__ccc_css[1]&&isset($cc_style) ? '#pc_wrap .' . $cc_style . ' div.pc--c__headline > h' . $i . ' {' . $cc_style__ccc_css[1] . '}' : '';
}
