<?php 



$fc_style__fcc_css = 'padding: 5px 14px;';

/* Price position */
if ( get_sub_field( 'fc_style__impr_pos' ) == 'content' ) {
	$fc_style__fcc_css .= 'order: 4;';
} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'top' ) {
	$fc_style__fcc_css .= 'position: absolute; top: 10%; right: 0; margin: 0;';
} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'center' ) {
	$fc_style__fcc_css .= 'position: absolute; top: 50%; right: 0; transform: translateY(-50%); -webkit-transform: translateY(-50%); margin: 0;';
} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'bottom' ) {
	$fc_style__fcc_css .= 'position: absolute; bottom: 10%; right: 0; margin: 0;';
}

/* Price BG */
if ( get_sub_field( 'fc_style__impr_bg' ) )
	$fc_style__fcc_css .= 'background-color:' . get_sub_field( 'fc_style__impr_bg' ) . ';';

/* Price Dropshadow */
if ( get_sub_field( 'fc_style__impr_shad' ) )
	$fc_style__fcc_css .= 'text-shadow: 1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3);';

/* Price Font Field */
if ( get_sub_field( 'fc_style__impr_font' ) ) {
	$fc_style__impr_font = get_sub_field( 'fc_style__impr_font' );
	$fc_style__impr_font_color = get_sub_field( 'fc_style__impr_font-color' );

	if ( $fc_style__impr_font['font-family'] ) {
		$fc_style__impr_font_family =  $fc_style__impr_font['font-family'];
	} else {
		$fc_style__impr_font_family = '"Roboto", Arial, sans-serif';
	}

	if ( $fc_style__impr_font['font-weight'] ) {
		$fc_style__impr_font_weight =  $fc_style__impr_font['font-weight'];
	} else {
		$fc_style__impr_font_weight = 400;
	}

	$fc_style__fcc_css .=  "font-family: '" . $fc_style__impr_font_family . "'; ";
	$fc_style__fcc_css .=  "font-weight: " . $fc_style__impr_font_weight . "; ";
	$fc_style__fcc_css .=  "text-align: " . $fc_style__impr_font['text_align'] . "; ";
	$fc_style__fcc_css .=  "font-size: " . $fc_style__impr_font['font_size'] . "px; ";
	$fc_style__fcc_css .=  "line-height: " . $fc_style__impr_font['line_height'] . "px; ";
	$fc_style__fcc_css .=  "color: " . $fc_style__impr_font_color . "; ";
	$fc_style__fcc_css .=  "font-style: " . $fc_style__impr_font['font_style'] . "; ";
}

/* Price Underline */
if ( get_sub_field( 'fc_style__impr_font_under' ) )
	$fc_style__fcc_css .= 'text-decoration:underline;';

echo "</style><style>@import url('https://fonts.googleapis.com/css?family=" . $fc_style__impr_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . '.fc_style--image_price {' . $fc_style__fcc_css . '}';	

?>
