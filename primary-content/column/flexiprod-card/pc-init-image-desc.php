<?php 

/*
	Description
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__imte_font_des' ) );
$fc_style__imte_font_des_color = get_sub_field( 'fc_style__imte_font_des-color' );

$fc_style__fcc_css[1] .= $fc_style__imte_font_des_color ? 'color:' . $fc_style__imte_font_des_color . ';' : '';
$fc_style__fcc_css[1] .= 'padding: 5px 0;';

if ( get_sub_field( 'fc_style__imte_und_des' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_desc {' . $fc_style__fcc_css[1] . '}';

?>