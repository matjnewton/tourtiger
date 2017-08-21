<?php

/**
 * Title
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_tit_f' ), 
	get_sub_field( 'cc_style__fo_tit_c' ) 
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_heading .gform_title {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Description
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_titd_f' ), 
	get_sub_field( 'cc_style__fo_titd_c' ) 
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_heading .gform_description {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Field Label
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_lab_f' ), 
	get_sub_field( 'cc_style__fo_lab_c' ) 
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_body .gfield_label {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Steps title
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_stt_f' ), 
	get_sub_field( 'cc_style__fo_stt_c' ) 
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gf_progressbar_title {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Steps progress
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_stp_f' ), 
	get_sub_field( 'cc_style__fo_stp_c' ) 
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gf_progressbar span {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Field description
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_des_f' ), 
	get_sub_field( 'cc_style__fo_des_c' ) 
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gfield_description  {' . $cc_style__ccc_css[1] . '}' : '';

$cc_style_btn = '';

$cc_style_btn .= get_font_corner_style( get_sub_field( 'cc__fo_butts_style' ) );

// TODO: Border

// TODO: Thickness

/**
 * Next Button
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_ne_f' ), 
	get_sub_field( 'cc_style__fo_ne_c' )
);

$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_ne_bg' ) ? 'background-color:'.get_sub_field( 'cc_style__fo_ne_bg' ).';' : '';

$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_ne_drop' ) ? 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);' : '';

$cc_style__ccc_css[2] = '';

$cc_style_btn_mouse_over = get_font_mouseover_effect_styles( 
	get_sub_field( 'cc__fo_butts_hover' ), 
	get_sub_field( 'cc_style__fo_ne_c' ), 
	get_sub_field( 'cc_style__fo_ne_bg' ) 
);
$cc_style__ccc_css[1] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[0] : '';
$cc_style__ccc_css[2] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[1] : '';

$cc_style_btn_border = get_font_border_styles( 
	get_sub_field( 'cc__fo_butts_border' ), 
	get_sub_field( 'cc_style__fo_ne_c' ), 
	get_sub_field( 'cc__fo_butts_border_thickness' ) 
);
$cc_style__ccc_css[1] .= $cc_style_btn_border ? $cc_style_btn_border[0] : '';
$cc_style__ccc_css[2] .= $cc_style_btn_border ? $cc_style_btn_border[1] : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_next_button {' . $cc_style__ccc_css[1] . '}' : '';
echo $cc_style__ccc_css[2] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_next_button:hover{' . $cc_style__ccc_css[2] . '}' : '';

/**
 * Previous Button
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_pr_f' ), 
	get_sub_field( 'cc_style__fo_pr_c' )
);

$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_pr_bg' ) ? 'background-color:'.get_sub_field( 'cc_style__fo_pr_bg' ).';' : '';

$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_pr_drop' ) ? 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);' : '';

$cc_style__ccc_css[2] = '';

$cc_style_btn_mouse_over = get_font_mouseover_effect_styles( 
	get_sub_field( 'cc__fo_butts_hover' ), 
	get_sub_field( 'cc_style__fo_pr_c' ), 
	get_sub_field( 'cc_style__fo_pr_bg' )
);

$cc_style__ccc_css[1] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[0] : '';
$cc_style__ccc_css[2] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[1] : '';

$cc_style_btn_border = get_font_border_styles( 
	get_sub_field( 'cc__fo_butts_border' ), 
	get_sub_field( 'cc_style__fo_pr_c' ), 
	get_sub_field( 'cc__fo_butts_border_thickness' ) 
);
$cc_style__ccc_css[1] .= $cc_style_btn_border ? $cc_style_btn_border[0] : '';
$cc_style__ccc_css[2] .= $cc_style_btn_border ? $cc_style_btn_border[1] : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_previous_button {' . $cc_style__ccc_css[1] . '}' : '';
echo $cc_style__ccc_css[2] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_previous_button:hover{' . $cc_style__ccc_css[2] . '}' : '';

/**
 * Submit Button
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_su_f' ), 
	get_sub_field( 'cc_style__fo_su_c' )
);

$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_su_bg' ) ? 'background-color:'.get_sub_field( 'cc_style__fo_su_bg' ).';' : '';

$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__fo_su_drop' ) ? 'text-shadow:1px 1px 2px rgba(0,0,0,.3),1px 1px 2px rgba(0,0,0,.3);' : '';

$cc_style__ccc_css[2] = '';

$cc_style_btn_mouse_over = get_font_mouseover_effect_styles( 
	get_sub_field( 'cc__fo_butts_hover' ), 
	get_sub_field( 'cc_style__fo_su_c' ), 
	get_sub_field( 'cc_style__fo_su_bg' )
);

$cc_style__ccc_css[1] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[0] : '';
$cc_style__ccc_css[2] .= $cc_style_btn_mouse_over ? $cc_style_btn_mouse_over[1] : '';

$cc_style_btn_border = get_font_border_styles( 
	get_sub_field( 'cc__fo_butts_border' ), 
	get_sub_field( 'cc_style__fo_su_c' ), 
	get_sub_field( 'cc__fo_butts_border_thickness' ) 
);
$cc_style__ccc_css[1] .= $cc_style_btn_border ? $cc_style_btn_border[0] : '';
$cc_style__ccc_css[2] .= $cc_style_btn_border ? $cc_style_btn_border[1] : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_button{' . $cc_style__ccc_css[1] . '}' : '';
echo $cc_style__ccc_css[2] ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_button:hover{' . $cc_style__ccc_css[2] . '}' : '';

/**
 * Input/Textarea field
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_fi_f' ), 
	get_sub_field( 'cc_style__fo_te_c' ),
	get_sub_field( 'cc_style__fo_bg_c' )
);

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .dropdown-menu > li > a, #pc_wrap .' . $cc_style . ' .bootstrap-select.btn-group .btn .filter-option {' . $cc_style__ccc_css[1] . '} ' : '';

$cc_style__ccc_css[1] .= 'border-style: solid;border-color:' . get_sub_field( 'cc_style__fo_bo_c' ) . ';';

echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--form .gfield .gfield_select, #pc_wrap .' . $cc_style . ' .pc--form .gfield .gfield_multiselect, #pc_wrap .' . $cc_style . ' .pc--form input, #pc_wrap .' . $cc_style . ' .pc--form .gfield dropdown-toggle, #pc_wrap .' . $cc_style . ' .pc--form .gfield textarea, #pc_wrap .' . $cc_style . ' .pc--form .gfield textarea:focus, #pc_wrap .' . $cc_style . ' .pc--form .gfield .gfield_radio label, #pc_wrap .' . $cc_style . ' .ginput_common--label {' . $cc_style__ccc_css[1] . '}' : '';

echo get_sub_field( 'cc_style__fo_bg_c' ) ? '#pc_wrap .' . $cc_style . ' .pc--form input:-webkit-autofill, #pc_wrap .' . $cc_style . ' .pc--form .gfield textarea:-webkit-autofill { -webkit-box-shadow: 0 0 0 30px ' . get_sub_field( 'cc_style__fo_bg_c' ) . ' inset;}' : '';

/**
 * Input placeholder
 */
$cc_style__ccc_css = get_sub_field( 'cc_style__fo_pc_c' ) ? 'color:' . get_sub_field( 'cc_style__fo_pc_c' ) . ';' : '';

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' ::-webkit-input-placeholder {' . $cc_style__ccc_css . '}' : '';
echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' ::-moz-placeholder {' . $cc_style__ccc_css . '}' : '';
echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' :-moz-placeholder {' . $cc_style__ccc_css . '}' : '';
echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' :-ms-input-placeholder {' . $cc_style__ccc_css . '}' : '';

?>