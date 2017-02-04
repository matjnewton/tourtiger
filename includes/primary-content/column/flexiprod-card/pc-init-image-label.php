<?php



$fc_style__fcc_css = 'transition: ease .3s;';
$fc_style__fcc_css_hover = 'transition: ease .3s;';

/* Label position */
if ( get_sub_field( 'fc_style__imla_pos' ) == 'top' ) {
	$fc_style__fcc_css .= 'order: 1;';
} elseif ( get_sub_field( 'fc_style__imla_pos' ) == 'center' ) {
	$fc_style__fcc_css .= 'order: 2;';
} elseif ( get_sub_field( 'fc_style__imla_pos' ) == 'bottom' ) {
	$fc_style__fcc_css .= 'order: 3;';
}

/* Label Font Field */
$fc_style__imla_font = get_sub_field( 'fc_style__imla_font' );
$fc_style__imla_font_color = get_sub_field( 'fc_style__imla_font-color' );

$fc_style__image_labe_in = '';

if ( get_sub_field( 'fc_style__imla_font-bg' ) || get_sub_field( 'fc_style__imla_font-bg' ) != '' ) {
	$fc_style__fcc_css .= 'padding: 8px 13px; background-color:' . get_sub_field( 'fc_style__imla_font-bg' ) . ';';

	if ( in_array( 'color', get_sub_field( 'fc_style__imla_butt_hovef' ) ) ) {
		$fc_style__fcc_css_hover = 'background-color: ' . $fc_style__imla_font_color . '; color: ' . get_sub_field( 'fc_style__imla_font-bg' ) . ';';
	} 
}

if ( $fc_style__imla_font['font-family'] ) {
	$fc_style__imla_font_family = $fc_style__imla_font['font-family'];
} else {
	$fc_style__imla_font_family = '"Roboto", Arial, sans-serif';
}

if ( $fc_style__imla_font['font-weight'] ) {
	$fc_style__imla_font_weight = $fc_style__imla_font['font-weight'];
} else {
	$fc_style__imla_font_weight = 400;	
}

$fc_style__fcc_css .=  "font-family: " . $fc_style__imla_font_family . "; ";
$fc_style__fcc_css .=  "font-weight: " . $fc_style__imla_font_weight . "; ";
$fc_style__fcc_css .=  "text-align: " . $fc_style__imla_font['text_align'] . "; ";
$fc_style__fcc_css .=  "font-size: " . $fc_style__imla_font['font_size'] . "px; ";
$fc_style__fcc_css .=  "line-height: " . $fc_style__imla_font['line_height'] . "px; ";
$fc_style__fcc_css .=  "color: " . $fc_style__imla_font_color . "; ";
$fc_style__fcc_css .=  "font-style: " . $fc_style__imla_font['font_style'] . "; ";

if ( in_array( 'text', get_sub_field( 'fc_style__imla_butt_hovef' ) ) ) {
	$fc_style__fcc_css .= 'text-decoration: underline;';
}

echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $fc_style__imla_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_label { ' . $fc_style__fcc_css . '}';	
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_label:hover { ' . $fc_style__fcc_css . '}';	

?>

