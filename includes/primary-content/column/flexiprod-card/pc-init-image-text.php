<?php 



$fc_style__fcc_css = 'position: relative;z-index: 4;padding: 5px 0;';

/* Text Position */
if ( get_sub_field( 'fc_style__imte_pos' ) == 'top' ) {
	$fc_style__fcc_css .= 'order: 1;margin-bottom: auto;';
} elseif ( get_sub_field( 'fc_style__imte_pos' ) == 'center' ) {
	$fc_style__fcc_css .= 'order: 2;margin-top: auto;margin-bottom: auto;';
} elseif ( get_sub_field( 'fc_style__imte_pos' ) == 'bottom' ) {
	$fc_style__fcc_css .= 'order: 3;margin-top: auto;';
}

/* Text BG */
if ( get_sub_field( 'fc_style__imte_bg' ) ) {
	$fc_style__fcc_css .= 'background-color:' . get_sub_field( 'fc_style__imte_bg' ) . ';';
}

echo '#pc_wrap .' . $fc_style . ' .fc_style--image_text {' . $fc_style__fcc_css . '}';



/* Text decoration */
if ( get_sub_field( 'fc_style__imte_dec' ) == 'double' ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:before {display: inline-block;position: absolute;left: 50%;left: 50%;width: 100%;border-top: 1px solid #000;-webkit-transform: translateX(-50%);transform: translateX(-50%);top:0;}';
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:after {display: inline-block;position: absolute;left: 50%;left: 50%;width: 100%;border-top: 1px solid #000;-webkit-transform: translateX(-50%);transform: translateX(-50%);bottom:0;}';
}  elseif ( get_sub_field( 'fc_style__imte_dec' ) == 'underline' ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title:after {display: inline-block;position: absolute;left: 50%;left: 50%;width: 100%;border-top: 1px solid #000;-webkit-transform: translateX(-50%);transform: translateX(-50%);bottom:0;}';
} 



$fc_style__fcc_css = 'position: relative;padding: 5px 0;';

/* Text dropshadow */
if ( get_sub_field( 'fc_style__imte_drsh' ) )
$fc_style__fcc_css .= 'text-shadow:1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3);';

/* Text Font Field */
$fc_style__imte_font = get_sub_field( 'fc_style__imte_font' );

if ( get_sub_field( 'fc_style__imte_font-color' ) ) {
	$fc_style__imte_font_color = get_sub_field( 'fc_style__imte_font-color' );
} else {
	$fc_style__imte_font_color = '#000';
}

if ( $fc_style__imte_font['font-family'] ) {
	$fc_style__imte_font_family = $fc_style__imte_font['font-family'];
} else {
	$fc_style__imte_font_family = '"Roboto", Arial, sans-serif';
}

if ( $fc_style__imte_font['font-weight'] ) {
	$$fc_style__imte_font_weight = $fc_style__imte_font['font-weight'];
} else {
	$fc_style__imte_font_weight = 700;
}

$fc_style__fcc_css .=  "font-family:" . $fc_style__imte_font_family . ";";
$fc_style__fcc_css .=  "font-weight:" . $fc_style__imte_font_weight . ";";
$fc_style__fcc_css .=  "text-align:" . $fc_style__imte_font['text_align'] . ";";
$fc_style__fcc_css .=  "font-size:" . $fc_style__imte_font['font_size'] . "px;";
$fc_style__fcc_css .=  "line-height:" . $fc_style__imte_font['line_height'] . "px;";
$fc_style__fcc_css .=  "color:" . $fc_style__imte_font_color . ";";
$fc_style__fcc_css .=  "font-style:" . $fc_style__imte_font['font_style'] . ";";

/* Text Underline */
if ( get_sub_field( 'fc_style__imte_und' ) ) 
	$fc_style__fcc_css .= 'text-decoration:underline;';

echo "@import url('https://fonts.googleapis.com/css?family=" . $fc_style__imte_font['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_title {' . $fc_style__fcc_css . '}';




$fc_style__fcc_css = 'padding: 5px 0;';

/* Description Font Field */
$fc_style__imte_font_des = get_sub_field( 'fc_style__imte_font_des' );

if ( get_sub_field( 'fc_style__imte_font_des-color' ) ) {
	$fc_style__imte_font_des_color = get_sub_field( 'fc_style__imte_font_des-color' );
} else {
	$fc_style__imte_font_des_color = '#000';
}

if ( $fc_style__imte_font_des['font-family'] ) {
	$fc_style__imte_font_des_family = $fc_style__imte_font_des['font-family'];
} else {
	$fc_style__imte_font_des_family = '"Roboto", Arial, sans-serif';
}

if ( $fc_style__imte_font_des['font-weight'] ) {
	$fc_style__imte_font_des_weight = $fc_style__imte_font_des['font-weight'];
} else {
	$fc_style__imte_font_des_weight = 400;
}

$fc_style__fcc_css .=  "font-family:" . $fc_style__imte_font_des_family . ";";
$fc_style__fcc_css .=  "font-weight:" . $fc_style__imte_font_des_weight . ";";
$fc_style__fcc_css .=  "text-align:" . $fc_style__imte_font_des['text_align'] . ";";
$fc_style__fcc_css .=  "font-size:" . $fc_style__imte_font_des['font_size'] . "px;";
$fc_style__fcc_css .=  "line-height:" . $fc_style__imte_font_des['line_height'] . "px;";
$fc_style__fcc_css .=  "color:" . $fc_style__imte_font_des_color . ";";
$fc_style__fcc_css .=  "font-style:" . $fc_style__imte_font_des['font_style'] . ";";

/* Description Underline */
if ( get_sub_field( 'fc_style__imte_und_des' ) ) 
	$fc_style__fcc_css .= 'underline';

echo "@import url('https://fonts.googleapis.com/css?family=" . $fc_style__imte_font_des['font-family'] . "');";
echo '#pc_wrap .' . $fc_style . ' .fc_style--image_desc {' . $fc_style__fcc_css . '}';

?>