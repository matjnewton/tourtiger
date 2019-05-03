<?php

 $locations = array(
    'Header area' => array(
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'product',
            ),
        ),
    ),
    'Header template' => array(
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'template',
            ),
        ),
    ),
    'Singular' => array(
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'product',
            ),
        ),
    )
);



// $languages = get_languages();
$languages = false;

if ($languages) :
    foreach ( $languages as $slug) :

        if ($slug !== 'en') :

            $locations['Header area'][] = array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => "common-$slug",
                ),
            );

            $locations['Header template'][] = array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'template',
                ),
                array (
                    'param' => 'post_taxonomy',
                    'operator' => '==',
                    'value' => "template-type:header-$slug",
                ),
            );

        endif;

    endforeach;
endif;


acf_add_local_field_group(array (
    'key' => 'he-ar_5829d7835eb2b',
    'title' => 'Header area',
    'fields' => array (
        array(
            'key' => 'he-ar_Fa982bc694Cd13',
            'label' => 'Header',
            'name' => '_tab',
            'type' => 'accordion',
            'required' => '',
        ),

        array (
            'key' => 'he-ar_5821d29cf2cca',
            'label' => 'Header',
            'name' => 'header',
            'type' => 'flexible_content',
            'required' => 0,
            'button_label' => 'Add custom one',
            'max' => 1,
            'layouts' => array (
                array (
                    'key' => 'he-ar_49650003e333f',
                    'name' => 'header-template',
                    'label' => 'Template',
                    'display' => 'block',
                    'sub_fields' => array(
                        array (
                            'key' => 'he-ar_48650003e333f',
                            'label' => 'Choose header template',
                            'name' => 'header-id',
                            'type' => 'post_object',
                            'instructions' => '',
                            'required' => 1,
                            'post_type' => array (
                                'template'
                            ),
                            //'taxonomy' => get_languages_slugs_and_concat_to_string('template-type:menu-template'),
                            'taxonomy' => 'template-type:menu-template',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'return_format' => 'object',
                            'ui' => 1,
                        ),
                    )
                )
            )
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-templates/test-pc.php',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => 1,
));
