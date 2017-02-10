<?php

$fc_style__fcc_butt_font_color = get_sub_field( 'fc_style__co_butt_font-color' );

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__co_butt_font' ) );

$fc_style__fcc_css[1] .= $fc_style__fcc_butt_font_color ? 'color:' . $fc_style__fcc_butt_font_color . ';' : '';
$fc_style__fcc_css[1] .= get_sub_field( 'fc_style__co_butt_bg' ) ? 'background-color:' . get_sub_field( 'fc_style__co_butt_bg' ) . ';' : '';
$fc_style__fcc_css[1] .= 'transition: ease .3s;';
$fc_style__fcc_css_hover = 'transition: ease .3s;';

/* Button style */
if ( get_sub_field( 'fc_style__co_butt_style' ) == 'square' ) {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;border-radius: 0;';
} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'round' ) {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;border-radius: 50%;';
} elseif ( get_sub_field( 'fc_style__co_butt_style' ) == 'corner' ) {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;border-radius: 4px;';
} else {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;';
}

/* Button effect */
if ( get_sub_field( 'fc_style__co_butt_hover' ) ) {
	$fc_style__fcc_button_hover_show = get_sub_field( 'fc_style__co_butt_hover' );

	if ( $fc_style__fcc_button_hover_show ) {

		if ( in_array( 'invert', $fc_style__fcc_button_hover_show ) ) {
			$fc_style__fcc_css_hover .= 'background-color:' . $fc_style__fcc_butt_font_color . ';';
			$fc_style__fcc_css_hover .= 'color:' . get_sub_field( 'fc_style__co_butt_bg' ) . ';';
		}

		if ( in_array( 'decor', $fc_style__fcc_button_hover_show ) ) $fc_style__fcc_css[1] .= 'text-decoration: underline;';
	}
}

/* Button dropshadow */
if ( get_sub_field( 'fc_style__co_butt_drop' ) ) $fc_style__fcc_css[1] .= 'box-shadow: 2px 2px 6px 0 rgba(0,0,0,.3);';

/* Set border */
if ( 
	get_sub_field( 'fc_style__co_butt_bord' ) == 'yes' 
	|| get_sub_field( 'fc_style__co_butt_bord' ) == 'hover' 
) {
	$fc_style__fcc_butt_bord_width = get_sub_field( 'fc_style__co_butt_bord_width' );
	$fc_style__fcc_css_hover .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid ' . $fc_style__fcc_butt_font_color . ';';

	if ( get_sub_field( 'fc_style__co_butt_bord' ) == 'yes' ) {
 		$fc_style__fcc_css[1] .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid ' . $fc_style__fcc_butt_font_color . ';';
	} elseif ( get_sub_field( 'fc_style__co_butt_bord' ) == 'hover' ) {
		$fc_style__fcc_css[1] .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid transparent;';
	}
} 

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_button {' . $fc_style__fcc_css[1] . '}';
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_button:hover{' . $fc_style__fcc_css_hover . '}';

/*
	Detail
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__co_deta_font' ) );

if ( get_sub_field( 'fc_style__co_deta_font-color' ) ) $fc_style__fcc_css[1] .= 'color:' . get_sub_field( 'fc_style__co_deta_font-color' ) . ';';
if ( get_sub_field( 'fc_style__co_deta_under' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--first_detail {' . $fc_style__fcc_css[1] . '}';

?>