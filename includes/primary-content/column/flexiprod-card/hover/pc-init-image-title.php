<?php 

/*
	Image title
 */

$fc_style__fcc_css = pc_init_font_css( get_sub_field( 'fc_style__imte_fonth' ) );
$fc_style__imte_font_color = get_sub_field( 'fc_style__imte_font-colorh' );

$fc_style__fcc_css[1] .= $fc_style__imte_font_color ? 'color:' . $fc_style__imte_font_color . ';' : '';
$fc_style__fcc_css[1] .= 'position: relative;padding: 8px 0 0;';

if ( get_sub_field( 'fc_style__imte_drshh' ) ) $fc_style__fcc_css[1] .= 'text-shadow:1px 1px 2px rgba(0,0,0,.3), 1px 1px 2px rgba(0,0,0,.3);';
if ( get_sub_field( 'fc_style__imte_undh' ) ) $fc_style__fcc_css[1] .= 'text-decoration:underline;';

echo $fc_style__fcc_css[0] ? $fc_style__fcc_css[0] : '';
echo '#pc_wrap .' . $fc_style . ' .pc--c__flexicard--hover .fc_style--image_title {' . $fc_style__fcc_css[1] . '}';

/*
	Decoration
 */

$check_align = get_sub_field( 'fc_style__imte_fonth' );

if ( get_sub_field( 'fc_style__imte_dech' ) == 'double' ) {
	echo '#pc_wrap .' . $fc_style . ' .pc--c__flexicard--hover .fc_style--image_title:before {content:\'\';display: inline-block;position: absolute;';

	if ( $check_align['text_align'] == 'left' ) { 
		echo 'left: 0%;-webkit-transform: translateX(0%);transform: translateX(0%);';
	} elseif ( $check_align['text_align'] == 'center' ) {
		echo 'left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%);';
	} elseif ( $check_align['text_align'] == 'right' ) {
		echo 'right: 0%;-webkit-transform: translateX(0%);transform: translateX(0%);';
	}

	echo 'width: 50%;border-top: 1px solid ' . $fc_style__imte_font_color . ';top:0;}';
	echo '#pc_wrap .' . $fc_style . ' .pc--c__flexicard--hover .fc_style--image_title:after {content:\'\';display: inline-block;position: absolute;';

	if ( $check_align['text_align'] == 'left' ) { 
		echo 'left: 0%;-webkit-transform: translateX(0%);transform: translateX(0%);';
	} elseif ( $check_align['text_align'] == 'center' ) {
		echo 'left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%);';
	} elseif ( $check_align['text_align'] == 'right' ) {
		echo 'right: 0%;-webkit-transform: translateX(0%);transform: translateX(0%);';
	}

	echo 'width: 50%;border-top: 1px solid ' . $fc_style__imte_font_color . ';bottom:0;}';
}  elseif ( get_sub_field( 'fc_style__imte_dech' ) == 'underline' ) {
	echo '#pc_wrap .' . $fc_style . ' .pc--c__flexicard--hover .fc_style--image_title:after {content:\'\';display: inline-block;position: absolute;';

	if ( $check_align['text_align'] == 'left' ) { 
		echo 'left: 0%;-webkit-transform: translateX(0%);transform: translateX(0%);';
	} elseif ( $check_align['text_align'] == 'center' ) {
		echo 'left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%);';
	} elseif ( $check_align['text_align'] == 'right' ) {
		echo 'right: 0%;-webkit-transform: translateX(0%);transform: translateX(0%);';
	}

	echo 'width: 50%;border-top: 1px solid ' . $fc_style__imte_font_color . ';bottom:0;}';
} 

$check_align = null;

?>