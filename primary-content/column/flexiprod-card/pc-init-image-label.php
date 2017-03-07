<?php

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__imla_font' ) );
if ( get_sub_field( 'fc_style__imla_font-color' ) ) 
	$fc_style__fcc_css[1] .= 'color:' . get_sub_field( 'fc_style__imla_font-color' ) . ';';

$fc_style__fcc_css[1] .= 'transition: ease .3s;';
$fc_style__fcc_css_hover = 'transition: ease .3s;';

/* Label position */
if ( get_sub_field( 'fc_style__imla_pos' ) == 'top' ) {
	$fc_style__fcc_css[1] .= 'order: 1;';
} elseif ( get_sub_field( 'fc_style__imla_pos' ) == 'center' ) {
	$fc_style__fcc_css[1] .= 'order: 2;';
} elseif ( get_sub_field( 'fc_style__imla_pos' ) == 'bottom' ) {
	$fc_style__fcc_css[1] .= 'order: 3;';
}

if ( get_sub_field( 'fc_style__imla_font-bg' ) || get_sub_field( 'fc_style__imla_font-bg' ) != '' ) {
	$fc_style__fcc_css[1] .= 'padding: .78em 1.1em; background-color:' . get_sub_field( 'fc_style__imla_font-bg' ) . ';';

	if ( in_array( 'color', get_sub_field( 'fc_style__imla_butt_hovef' ) ) ) {
		$fc_style__fcc_css_hover .= 'background-color: ' . get_sub_field( 'fc_style__imla_font-color' ) . ';';
		$fc_style__fcc_css_hover .= 'color: ' . get_sub_field( 'fc_style__imla_font-bg' ) . ';';
	} 
}


if ( in_array( 'text', get_sub_field( 'fc_style__imla_butt_hovef' ) ) ) $fc_style__fcc_css_hover .= 'text-decoration: underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_label { ' . $fc_style__fcc_css[1] . '}';	
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_label:hover { ' . $fc_style__fcc_css_hover . '}';	

?>

