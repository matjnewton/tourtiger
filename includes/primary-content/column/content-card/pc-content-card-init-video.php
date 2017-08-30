<?php 

$border_color       = get_sub_field( 'border-color' );
$hover_border_color = get_sub_field( 'hover-border-color' );
$arrow_color        = get_sub_field( 'arrow-color' );

$cc_style__ccc_css  = '';
$cc_style__ccc_css .= $border_color ? "border-color:{$border_color};" : '';
$cc_style__ccc_css .= $hover_border_color ? "color:{$hover_border_color};" : '';

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .play-btn--border {' . $cc_style__ccc_css . ';}' : '';

$cc_style__ccc_css  = '';
$cc_style__ccc_css .= $arrow_color ? "border-left-color:{$arrow_color};" : '';

echo $cc_style__ccc_css ? '#pc_wrap .' . $cc_style . ' .play-btn--image {' . $cc_style__ccc_css . ';}' : '';