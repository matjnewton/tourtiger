<?php
/**
 * Instagram component
 */
$d = [
    'type'         => get_sub_field('inst_type'),
    'count'        => get_sub_field('inst_count'),
    'columns'      => get_sub_field('inst_columns'),
    'rest'         => get_sub_field('inst_rest'),
    'onclick'      => get_sub_field('inst_onclick'),
    'user-details' => get_sub_field('inst_user-details'),
    'text_before_logo' => get_sub_field('inst_text_before_logo'),
    'text_before_logo_size' => get_sub_field('inst_text_before_logo_size'),
    'logo_size' => get_sub_field('inst_logo_size'),
    'img-resolution' => get_sub_field('inst_img-resolution') ? get_sub_field('inst_img-resolution') : 'thumbnail',
    'token'          => get_field('insta_token','apikey'),
];

$d['token'] && do_shortcode(
  "[instagram 
    type='{$d['type']}'
    count='{$d['count']}'
    columns='{$d['columns']}' 
    rest='{$d['rest']}' 
    onclick='{$d['onclick']}' 
    user-details='{$d['user-details']}'
    text_before_logo='{$d['text_before_logo']}'
    text_before_logo_size='{$d['text_before_logo_size']}'
    logo_size='{$d['logo_size']}' 
    img-resolution='{$d['img-resolution']}' 
    token='{$d['token']}']"
);
