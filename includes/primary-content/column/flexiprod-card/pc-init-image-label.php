<?php

$fc_style__fcc_butt_font_color = get_sub_field( 'fc_style__la_butt_font-color' );
$fc_style__fcc_butt_bordr_type = get_sub_field( 'fc_style__la_butt_bord_color-type' ) || false;
$fc_style__fcc_butt_bordr_colo = get_sub_field( 'fc_style__la_butt_bord_color' );

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__la_butt_font' ) );

$fc_style__fcc_css[1] .= $fc_style__fcc_butt_font_color ? 'color:' . $fc_style__fcc_butt_font_color . ';' : '';
$fc_style__fcc_css[1] .= get_sub_field( 'fc_style__la_butt_bg' ) ? 'background-color:' . get_sub_field( 'fc_style__la_butt_bg' ) . ';' : '';
$fc_style__fcc_css[1] .= 'transition: ease .3s;';
$fc_style__fcc_css_hover = 'transition: ease .3s;';


/* Button style */
if ( get_sub_field( 'fc_style__la_butt_style' ) == 'square' ) {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;border-radius: 0;';
} elseif ( get_sub_field( 'fc_style__la_butt_style' ) == 'round' ) {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;border-radius: 50%;';
} elseif ( get_sub_field( 'fc_style__la_butt_style' ) == 'corner' ) {
	$fc_style__fcc_css[1] .= 'padding: 15px 20px;border-radius: 4px;';
} else {
	$fc_style__fcc_css[1] .= 'padding: .7em 1.1em;';
}

/* Button effect */
if ( get_sub_field( 'fc_style__la_butt_hover' ) ) {
	$fc_style__fcc_button_hover_show = get_sub_field( 'fc_style__la_butt_hover' );

	if ( $fc_style__fcc_button_hover_show ) {

		if ( in_array( 'invert', $fc_style__fcc_button_hover_show ) ) {
			$fc_style__fcc_css_hover .= 'background-color:' . $fc_style__fcc_butt_font_color . ';';
			$fc_style__fcc_css_hover .= 'color:' . get_sub_field( 'fc_style__la_butt_bg' ) . ';';
		}

		if ( in_array( 'decor', $fc_style__fcc_button_hover_show ) ) $fc_style__fcc_css[1] .= 'text-decoration: underline;';
	}
}

/* Button dropshadow */
if ( get_sub_field( 'fc_style__la_butt_drop' ) ) $fc_style__fcc_css[1] .= 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);';

/* Set border */
if ( 
	get_sub_field( 'fc_style__la_butt_bord' ) == 'yes' 
	|| get_sub_field( 'fc_style__la_butt_bord' ) == 'hover' 
) {

	if ( $fc_style__fcc_butt_bordr_type == 'custom' ) :
		$fc_border__color = $fc_style__fcc_butt_bordr_colo;
	elseif ( $fc_style__fcc_butt_bordr_type == 'auto' || $fc_style__fcc_butt_bordr_type === false ) :
		$fc_border__color = $fc_style__fcc_butt_font_color;
	endif;

	$fc_style__fcc_butt_bord_width = get_sub_field( 'fc_style__la_butt_bord_width' );
	$fc_style__fcc_css_hover .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid ' . $fc_border__color . ';';
	$fc_style__fcc_css[1] .= 'box-sizing: border-box;';

	if ( get_sub_field( 'fc_style__la_butt_bord' ) == 'yes' ) {
 		$fc_style__fcc_css[1] .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid ' . $fc_border__color . ';';
	} elseif ( get_sub_field( 'fc_style__la_butt_bord' ) == 'hover' ) {
		$fc_style__fcc_css[1] .= 'border:' . $fc_style__fcc_butt_bord_width . 'px solid transparent;';
	}
} 

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . '  .fc_style--image_label {' . $fc_style__fcc_css[1] . '}';
echo '#pc_wrap .' . $fc_style . '  .fc_style--image_label:hover{' . $fc_style__fcc_css_hover . '}';

echo get_sub_field( 'fc_style__la_butt_ver' ) ? '#pc_wrap .' . $fc_style . '  .pc--c__b-wrap-image_label{' . get_sub_field( 'fc_style__la_butt_ver' ) . '}' : '';

echo '#pc_wrap .' . $fc_style . '  .pc--c__b-wrap-image_label {';
	if ( get_sub_field( 'fc_style__la_butt_pos' ) == 'left' ) {
		echo 'text-align: left;';
	} elseif ( get_sub_field( 'fc_style__la_butt_pos' ) == 'right' ) {
		echo 'text-align: right;';
	} elseif ( get_sub_field( 'fc_style__la_butt_pos' ) == 'center' ) {
		echo 'text-align: center;';
	}
echo '}';

?>