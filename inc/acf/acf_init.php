<?php

function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyBPKkzpIMMXwxRMfArXDyzKZiRqdBVsfu0');
}

add_action('acf/init', 'my_acf_init');


acf_add_local_field_group( array(
    'key' => 'image-shortcode_60febe61ed953',
    'title' => 'Image shortcode',
    'fields' => array(
        array(
            'key' => 'field_attachment-details-shortcode',
            'label' => 'Image shortcode',
            'name' => 'image_shortcode',
            'type' => 'text',
            'instructions' => '<button type="button" class="button button-small copy-shortcode" data-clipboard-target="#acf-field_attachment-details-shortcode" style="margin-top:10px">Copy shortcode to clipboard</button><span class="success hidden" aria-hidden="true">Copied!</span>',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'id' => 'copy-shortcode_input',
            ),
            'default_value' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'attachment',
                'operator' => '==',
                'value' => 'image',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));
