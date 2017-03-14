<?php 

$cc_style__ccc_css = '';

/* Set BG */
if ( get_sub_field( 'cc_style__rad' ) == 'yep' ) {
	echo '#pc_wrap .' . $cc_style . '.pc--c__content{border-radius:' . get_sub_field( 'cc_style__rad-css' ) . ';}';
}
