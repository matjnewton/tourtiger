<?php 

/*
	Price
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__impr_fonth' ) );
$fc_style__fcc_css[1] .= get_sub_field( 'fc_style__impr_font-colorh' ) ? 'color:' . get_sub_field( 'fc_style__impr_font-colorh' ) . ';' : '';

$fc_style__fcc_css[1] .= 'padding: 8px 25px;';

$alignment = get_sub_field( 'fc_style__impr_alignmenth' );

/* Price position */
if ( get_sub_field( 'fc_style__impr_posh' ) == 'content' ) {
	$fc_style__fcc_css[1] .= 'order: 4;';
} elseif ( get_sub_field( 'fc_style__impr_posh' ) == 'top' ) {
	$fc_style__fcc_css[1] .= 'position: absolute; top: 10%; '.$alignment.': 0; margin: 0;';
} elseif ( get_sub_field( 'fc_style__impr_posh' ) == 'center' ) {
	$fc_style__fcc_css[1] .= 'position: absolute; top: 50%; '.$alignment.': 0; transform: translateY(-50%); -webkit-transform: translateY(-50%); margin: 0;';
} elseif ( get_sub_field( 'fc_style__impr_posh' ) == 'bottom' ) {
	$fc_style__fcc_css[1] .= 'position: absolute; bottom: 10%; '.$alignment.': 0; margin: 0;';
}

/* Price BG */
if ( get_sub_field( 'fc_style__impr_bgh' ) ) $fc_style__fcc_css[1] .= 'background-color:' . get_sub_field( 'fc_style__impr_bgh' ) . ';';

/* Price Dropshadow */
if ( get_sub_field( 'fc_style__impr_shadh' ) ) $fc_style__fcc_css[1] .= 'text-shadow: 1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3);';

/* Price Underline */
if ( get_sub_field( 'fc_style__impr_font_underh' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .pc--c__flexicard--hover .fc_style--image_price {' . $fc_style__fcc_css[1] . '}';	

?>
