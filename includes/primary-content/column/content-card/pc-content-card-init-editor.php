<?php 

$cc_style__ccc_css = '';

if ( get_sub_field( 'cc_style__editor' ) ) {
	$cc_style__editor = get_sub_field( 'cc_style__editor' );

	if ( $cc_style__editor['font_family'] ) {
		$cc_style__editor_family = $cc_style__editor['font_family'];
	} else {
		$cc_style__editor_family = '"Open Sans", Arial, sans-serif';
	}

	if ( $cc_style__editor['font_weight'] ) {
		$cc_style__editor_weight = $cc_style__editor['font_weight'];
	} else {
		$cc_style__editor_weight = 400;
	}

	$cc_style__ccc_css .=  "font-family:" . $cc_style__editor_family . ";";
	$cc_style__ccc_css .=  "font-weight:" . $cc_style__editor_weight . ";";
	$cc_style__ccc_css .=  "text-align:" . $cc_style__editor['text_align'] . ";";
	$cc_style__ccc_css .=  "font-size:" . $cc_style__editor['font_size'] . "px;";
	$cc_style__ccc_css .=  "line-height:" . $cc_style__editor['line_height'] . "px;";
	$cc_style__ccc_css .=  "color:" . get_sub_field( 'cc_style__editor-color' ) . ";";
	$cc_style__ccc_css .=  "font-style:" . $cc_style__editor['font_style'] . ";";

	echo '#pc_wrap .' . $cc_style . ' div.pc--c__editor {' . $cc_style__ccc_css . '};';

	if ( get_sub_field( 'cc_style__editor_link' ) )
		echo '#pc_wrap .' . $cc_style . ' div.pc--c__editor a:hover {' . get_sub_field( 'cc_style__editor_link' ) . '};';
}

