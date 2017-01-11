<?php

$show_image = get_sub_field( 'fc_style__imdis' );
$show_co = get_sub_field( 'fc_style__co' ); 
$show_ct = get_sub_field( 'fc_style__ct' ); 

$fc_style__fcc_css = '';
$fc_style__fcc_css_hover = '';

/* Set background */
if ( get_sub_field( 'fc_style__bg' ) == 'texture' ) {
	$fc_style__fcc_css .= 'background:url(' . get_sub_field( "fc_style__bg_texture" ) . ') center center repeat;';
} elseif ( get_sub_field( 'fc_style__bg' ) == 'color' ) {
	$fc_style__fcc_css .= 'background-color:' . get_sub_field( "fc_style__bg_color" ) . ';';
}

/* Set border */
if ( get_sub_field( 'fc_style__rad' ) != 'none' ) 
	$fc_style__fcc_css .= 'border-radius: ' . get_sub_field( "fc_style__rad-css" ) . '; overflow: hidden;';

/* Set border */
if ( get_sub_field( 'fc_style__br' ) == 'yes' ) {
	$fc_style__fcc_css .= 'border:' . get_sub_field( "fc_style__br_width" ) . 'px solid ' . get_sub_field( 'fc_style__br_color' ) . ';';
} elseif ( get_sub_field( 'fc_style__br' ) == 'hover' ) {
	$fc_style__fcc_css .= 'border:' . get_sub_field( "fc_style__br_width" ) . 'px solid transparent;';
	$fc_style__fcc_css_hover .= 'border:' . get_sub_field( "fc_style__br_width" ) . 'px solid ' . get_sub_field( "fc_style__br_color" ) . ';';
}

/* Set Dropshadow */
if ( get_sub_field( 'fc_style__sh' ) == 'yes' ) {
	$fc_style__fcc_css .= 'box-shadow:2px 2px 6px 0px rgba(0,0,0,.3);';
} elseif ( get_sub_field( 'fc_style__sh' ) == 'hover' ) {
	$fc_style__fcc_css_hover .= 'box-shadow:2px 2px 6px 0px rgba(0,0,0,.3);';
}

/* Set Set paddings */
if ( get_sub_field( 'fc_style__pa' ) == 'hover' ) {
	$fc_style__fcc_css_hover .= 'bottom:' . get_sub_field( "fc_style__pa_yes" ) . ';';
	$fc_style__fcc_css_hover .= 'padding:' . get_sub_field( "fc_style__pa_yes" ) . ';';
} elseif ( get_sub_field( "fc_style__pa" ) ==  'yes' ) {
	$fc_style__fcc_css .= 'padding:' . get_sub_field( "fc_style__pa_yes" ) . ';';
}

echo '#pc_wrap .' . $fc_style . ' {' . $fc_style__fcc_css . '}';
echo '#pc_wrap .' . $fc_style . ':hover {' . $fc_style__fcc_css_hover . '}';

?>
