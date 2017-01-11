<?php

if ( get_sub_field( 'fc_style__ov' ) != 'none' ) {
	$fc_style__fcc_css = 'position: absolute; content: "";bottom: 0; left: 0; width: 100%; pointer-events: none; height: 100%;';

	if ( get_sub_field( 'fc_style__ov' ) == 'yes' ) {
		$fc_style__fcc_css .= 'background-color: ' . get_sub_field( "fc_style__ov_color" ) . ';';
	} elseif ( get_sub_field( 'fc_style__ov' ) == 'grad' ) {
		$fc_style__fcc_css .= 'background: -moz-linear-gradient(top,  rgba(30,87,153,0) 0%, ' . get_sub_field( "fc_style__ov_color" ) . ' 100%);';
		$fc_style__fcc_css .= '-webkit-linear-gradient(top,  rgba(30,87,153,0) 0%, ' . get_sub_field( "fc_style__ov_color" ) . ' 100%);';
		$fc_style__fcc_css .= 'linear-gradient(to bottom,  rgba(30,87,153,0) 0%, ' . get_sub_field( "fc_style__ov_color" ) . ' 100%);';
	}

	echo '#pc_wrap .' . $fc_style . ' .fc_style--image:before {' . $fc_style__fcc_css . '}';	
}

/* Set Border */
if ( get_sub_field( 'fc_style__imbo_bet' ) ) {
	$fc_style__fcc_css = 'content: "";position: absolute;bottom: 0; left: 50%;';
	$fc_style__fcc_css .= 'transform: translate(-50%, 50%);-webkit-transform: translate(-50%, 50%);width: 100%;z-index: 5;';
	$fc_style__fcc_css .= 'border:' . get_sub_field( "fc_style__imbo_bet_width" ) . 'px solid ' . get_sub_field( "fc_style__imbo_bet_color" ) . ';';

	echo '#pc_wrap .' . $fc_style . ' .fc_style--image:after {' . $fc_style__fcc_css . '}'; 
}


/* Set Radius */
if ( get_sub_field( 'fc_style__imru' ) ) {
	$fc_style__fcc_css = 'border-top-right-radius:' . get_sub_field( "fc_style__imru_top" ) . ';';
	$fc_style__fcc_css .= 'border-top-left-radius:' . get_sub_field( "fc_style__imru_top" ) . ';';
	$fc_style__fcc_css .= 'border-bottom-right-radius:' . get_sub_field( "fc_style__imru_bottom" ) . ';';
	$fc_style__fcc_css .= 'border-bottom-left-radius:' . get_sub_field( "fc_style__imru_bottom" ) . ';';

	echo '#pc_wrap .' . $fc_style . ' .fc_style--image {' . $fc_style__fcc_css . '}';
}


?>
