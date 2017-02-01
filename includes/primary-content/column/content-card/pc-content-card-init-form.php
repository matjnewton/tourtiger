<?php

/**
 * HINT:
 * Learn more about pc_content_init_form() function in file 
 * theme_root/includes/primary-content/dependences/pc-dependences.php
 */

/**
 * Title
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_tit_f' ), 
	get_sub_field( 'cc_style__fo_tit_c' ) 
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_heading .gform_title {' . $cc_style__ccc_css . '}' : '';

/**
 * Description
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_titd_f' ), 
	get_sub_field( 'cc_style__fo_titd_c' ) 
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_heading .gform_description {' . $cc_style__ccc_css . '}' : '';

/**
 * Field Label
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_lab_f' ), 
	get_sub_field( 'cc_style__fo_lab_c' ) 
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_body .gfield_label {' . $cc_style__ccc_css . '}' : '';

/**
 * Steps title
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_stt_f' ), 
	get_sub_field( 'cc_style__fo_stt_c' ) 
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gf_progressbar_title {' . $cc_style__ccc_css . '}' : '';

/**
 * Steps progress
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_stp_f' ), 
	get_sub_field( 'cc_style__fo_stp_c' ) 
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gf_progressbar span {' . $cc_style__ccc_css . '}' : '';

/**
 * Field description
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_des_f' ), 
	get_sub_field( 'cc_style__fo_des_c' ) 
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gfield_description  {' . $cc_style__ccc_css . '}' : '';

/**
 * Next Button
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_ne_f' ), 
	'',
	get_sub_field( 'cc_style__fo_ne_c' ),
	get_sub_field( 'cc_style__fo_ne_c' )
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_next_button {' . $cc_style__ccc_css . '}' : '';

/**
 * Previous Button
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_pr_f' ), 
	'',
	get_sub_field( 'cc_style__fo_pr_c' ),
	get_sub_field( 'cc_style__fo_pr_c' )
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_previous_button {' . $cc_style__ccc_css . '}' : '';

/**
 * Submit Button
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_su_f' ), 
	'',
	get_sub_field( 'cc_style__fo_su_c' ),
	get_sub_field( 'cc_style__fo_su_c' )
);

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .pc--form .gform_button{' . $cc_style__ccc_css . '}' : '';

/**
 * Input/Textarea field
 */
$cc_style__ccc_css = pc_content_init_form( 
	get_sub_field( 'cc_style__fo_te_f' ), 
	get_sub_field( 'cc_style__fo_te_c' ),
	get_sub_field( 'cc_style__fo_bg_c' )
);

echo $cc_style__ccc_css ? '
	#pc_wrap .' . $cc_style . ' .pc--form .dropdown-menu > li > a, 
	#pc_wrap .' . $cc_style . ' .bootstrap-select.btn-group .btn .filter-option {' . $cc_style__ccc_css . '} 
' : '';

$cc_style__ccc_css .= 'border-color:' . get_sub_field( 'cc_style__fo_bo_c' ) . ';';

echo $cc_style__ccc_css ? '
	#pc_wrap .' . $cc_style . ' .pc--form .gfield input.inputDefault,
	#pc_wrap .' . $cc_style . ' .pc--form .gfield dropdown-toggle,
	#pc_wrap .' . $cc_style . ' .pc--form .gfield textarea,
	#pc_wrap .' . $cc_style . ' .pc--form .gfield textarea:focus {' . $cc_style__ccc_css . '};
' : '';

/**
 * Input placeholder
 */
$cc_style__ccc_css = get_sub_field( 'cc_style__fo_pc_c' ) ? 'color:' . get_sub_field( 'cc_style__fo_pc_c' ) . ';' : '';

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' ::-webkit-input-placeholder {' . $cc_style__ccc_css . '}' : '';
echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' ::-moz-placeholder {' . $cc_style__ccc_css . '}' : '';
echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' :-moz-placeholder {' . $cc_style__ccc_css . '}' : '';
echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' :-ms-input-placeholder {' . $cc_style__ccc_css . '}' : '';

?>