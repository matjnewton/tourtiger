<?php 

$cc_style__ccc_css = '';

/* Set BG */
if ( get_sub_field( 'cc_style__bg' ) == 'texture' ) {
	echo '#pc_wrap .' . $cc_style . ' .pc--c__content {background:url(' . get_sub_field( 'cc_style__bg_texture' ) . ') center center repeat;}';
} elseif ( get_sub_field( 'cc_style__bg' ) == 'color' ) {
	echo '#pc_wrap .' . $cc_style . ' .pc--c__content {color:' . get_sub_field( 'cc_style__bg_color' ) . ';}';
}
