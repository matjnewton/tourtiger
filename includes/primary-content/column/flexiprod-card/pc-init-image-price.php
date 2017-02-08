<?php 

/*
	Price
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__impr_font' ) );
$fc_style__fcc_css[1] .= get_sub_field( 'fc_style__impr_font-color' ) ? 'color:' . get_sub_field( 'fc_style__impr_font-color' ) . ';' : '';

$fc_style__fcc_css[1] .= 'padding: 5px 14px;';

/* Price position */
if ( get_sub_field( 'fc_style__impr_pos' ) == 'content' ) {
	$fc_style__fcc_css[1] .= 'order: 4;';
} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'top' ) {
	$fc_style__fcc_css[1] .= 'position: absolute; top: 10%; right: 0; margin: 0;';
} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'center' ) {
	$fc_style__fcc_css[1] .= 'position: absolute; top: 50%; right: 0; transform: translateY(-50%); -webkit-transform: translateY(-50%); margin: 0;';
} elseif ( get_sub_field( 'fc_style__impr_pos' ) == 'bottom' ) {
	$fc_style__fcc_css[1] .= 'position: absolute; bottom: 10%; right: 0; margin: 0;';
}

/* Price BG */
if ( get_sub_field( 'fc_style__impr_bg' ) ) $fc_style__fcc_css[1] .= 'background-color:' . get_sub_field( 'fc_style__impr_bg' ) . ';';

/* Price Dropshadow */
if ( get_sub_field( 'fc_style__impr_shad' ) ) $fc_style__fcc_css[1] .= 'text-shadow: 1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3);';

/* Price Underline */
if ( get_sub_field( 'fc_style__impr_font_under' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_price {' . $fc_style__fcc_css[1] . '}';	

?>
