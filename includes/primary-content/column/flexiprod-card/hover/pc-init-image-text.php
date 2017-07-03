<?php 

/*
	Image text
 */

$fc_style__fcc_css = 'position: relative;z-index: 4;padding: 5px 0;';

if ( get_sub_field( 'fc_style__imte_posh' ) == 'top' ) {
	$fc_style__fcc_css .= 'order: 1;margin-bottom: auto;';
} elseif ( get_sub_field( 'fc_style__imte_posh' ) == 'center' ) {
	$fc_style__fcc_css .= 'order: 2;margin-top: auto;margin-bottom: auto;';
} elseif ( get_sub_field( 'fc_style__imte_posh' ) == 'bottom' ) {
	$fc_style__fcc_css .= 'order: 3;margin-top: auto;';
}

if ( get_sub_field( 'fc_style__imte_bgh' ) ) $fc_style__fcc_css .= 'background-color:' . get_sub_field( 'fc_style__imte_bgh' ) . ';';

echo '#pc_wrap .' . $fc_style . ' .pc--c__flexicard--hover .fc_style--image_text {' . $fc_style__fcc_css . '}';



?>