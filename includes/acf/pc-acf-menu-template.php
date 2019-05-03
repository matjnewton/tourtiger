<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/01/19
 * Time: 3:34 PM
 */

/**
 * @param string $id
 * @return array
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5cc9c753c191919',
        'title' => 'Menu template',
        'fields' => array(
            array(
                'key' => 'field_5cc9c75e4cde9',
                'label' => 'Menu template',
                'name' => 'menu_template',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => get_header_panels_local_field('menus'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_taxonomy',
                    'operator' => '==',
                    'value' => 'template-type:menu-template',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;


function get_header_panels_local_field( $id = '1234QWERasdf' ) {
    return  apply_filters( 'tt1_header_panels_local_fields', array(
        array (
            'key' => $id . '_PR982bc694Cd13',
            'label' => 'Primary panel',
            'name' => 'content_tab',
            'type' => 'tab',
            'required' => '',
        ),

        array (
            'key'      => $id . '_PR9HRbc694Cd91',
            'label'    => 'Header Layout',
            'name'     => 'header_layout',
            'type'     => 'flexible_content',
            'required' => '',
            'button_label' => 'Add choose layout',
            'max' => 1,
            'layouts'       => array(
                array(
                    'key' => $id . '_PR9HRbc694Cd82',
                    'name' => 'layout-1',
                    'label' => 'Layout 1',
                    'display' => 'block',
                    'max' => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_PR9HRbc694Cd73',
                            'label'  => 'Description',
                            'name' => 'message',
                            'type'  => 'message',
                            'required' => 0,
                            'message' => 'Logo is placed on the left, and Menu is on the right.'
                        ),
                        array(
                            'key' => $id . '_PR982bc694Cd91',
                            'label' => 'Logotype',
                            'name' => 'logotype',
                            'type' => 'image',
                            'instructions' => 'Leave empty for using the Logo from Settings -> Common',
                            'required' => '',
                            'return_format' => 'id',
                            'preview_size' => 'full',
                            'wrapper' => array(
                                'width' => 30
                            )
                        ),
                        array(
                            'key' => $id . '_S2982bc694Cm82',
                            'label' => 'Menu name',
                            'name' => 'menu_name',
                            'type' => 'text',
                            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Header',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 70
                            )
                        ),
                    )
                ),




                /**


                array(
                    'key' => $id . '_PR8HRbc694Cd82',
                    'name' => 'layout-2',
                    'label' => 'Layout 2',
                    'display' => 'block',
                    'max' => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_PR8HRbc694Cd73',
                            'label'  => 'Description',
                            'name' => 'message',
                            'type'  => 'message',
                            'required' => 0,
                            // 'message' => 'Logo placed on center, the first menu placed on left, the second on right.'
                            'message' => 'These features are temporary disabled and in state of development.'
                        ),
                        array(
                            'key' => $id . '_S2882bc694Cm81',
                            'label' => 'Menu name',
                            'name' => 'menu_name_left',
                            'type' => 'text',
                            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Header',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 35
                            )
                        ),
                        array(
                            'key' => $id . '_PR882bc694Cd91',
                            'label' => 'Logotype',
                            'name' => 'logotype',
                            'type' => 'image',
                            'instructions' => 'Leave empty for using the Logo from Settings -> Common',
                            'required' => '',
                            'return_format' => 'id',
                            'preview_size' => 'full',
                            'wrapper' => array(
                                'width' => 30
                            )
                        ),
                        array(
                            'key' => $id . '_S2882bc694Cm82',
                            'label' => 'Menu name',
                            'name' => 'menu_name_right',
                            'type' => 'text',
                            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Header',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 35
                            )
                        ),

                        array(
                            'key' => $id . '_S28dskt94Cm81',
                            'label' => 'Menus align',
                            'name' => 'menus_align',
                            'type' => 'select',
                            'choices' => [
                                'center' => 'Center (Default)',
                                'middle' => 'Align to middle'
                            ],
                            'instructions' => '',
                            'allow_null' => 1,
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 35
                            )
                        ),
                    )
                ),

                array(
                    'key' => $id . '_PX03Rb3694Cd82',
                    'name' => 'layout-3',
                    'label' => 'Layout 3',
                    'display' => 'block',
                    'max' => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_PX93Rbc694Cd73',
                            'label'  => 'Description',
                            'name' => 'message',
                            'type'  => 'message',
                            'required' => 0,
                            // 'message' => 'Logo and menu are centered, the last one is underneath of the logo.'
                            'message' => 'These features are temporary disabled and in state of development.'
                        ),
                        array(
                            'key' => $id . '_PX932bc694Cd91',
                            'label' => 'Logotype',
                            'name' => 'logotype',
                            'type' => 'image',
                            'instructions' => 'Leave empty for using the Logo from Settings -> Common',
                            'required' => '',
                            'return_format' => 'id',
                            'preview_size' => 'full',
                            'wrapper' => array(
                                'width' => 100
                            )
                        ),
                        array(
                            'key' => $id . '_SX932bc694Cm82',
                            'label' => 'Menu name',
                            'name' => 'menu_name',
                            'type' => 'text',
                            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Header',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 100
                            )
                        ),
                    )
                ),
                array(
                    'key' => $id . '_PR9l4bc6c4xdd4',
                    'name' => 'layout-4',
                    'label' => 'Layout 4',
                    'display' => 'block',
                    'max' => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_PR9HRbc694Cdd3x',
                            'label'  => 'Description',
                            'name' => 'message',
                            'type'  => 'message',
                            'required' => 0,
                            // 'message' => 'Logo placed on left, Menu on left hand as well.'
                            'message' => 'These features are temporary disabled and in state of development.'
                        ),
                        array(
                            'key' => $id . '_PR982bc694Cd9dx',
                            'label' => 'Logotype',
                            'name' => 'logotype',
                            'type' => 'image',
                            'instructions' => 'Leave empty for using the Logo from Settings -> Common',
                            'required' => '',
                            'return_format' => 'id',
                            'preview_size' => 'full',
                            'wrapper' => array(
                                'width' => 30
                            )
                        ),
                        array(
                            'key' => $id . '_S2982bw694Cm73',
                            'label' => 'Menu name',
                            'name' => 'menu_name',
                            'type' => 'text',
                            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Header',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 70
                            )
                        ),
                    )
                ),



                */


            )
        ),

        /**

        array (
            'key' => $id . '_P2982bc694Cd13',
            'label' => 'Sup panel',
            'name' => 'content_tab',
            'type' => 'tab',
            'required' => '',
        ),

        array (
            'key'      => $id . '_S2982bc694Cd91',
            'label'    => 'Components',
            'name'     => 'header_components',
            'type'     => 'flexible_content',
            'required' => '',
            'button_label' => 'Add component',
            'layouts'   => array(
                array (
                    'key' => $id . '_A2sc694xCah5',
                    'label' => 'Menu',
                    'name' => 'menu',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => $id . '_A2sc384xZas5',
                            'label' => 'Menu name',
                            'name' => 'menu_name',
                            'type' => 'text',
                            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Sup panel',
                            'required' => 0,
                        ),
                        array (
                            'key' => $id . '_596506809234736',
                            'label' => 'Nav Menu',
                            'name' => 'nav_menu',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => get_registered_nav_menus(),
                            'allow_null' => 1,
                        ),
                    )
                ),
                array(
                    'key' => $id . '_S2982bc694Cm81',
                    'name' => 'message',
                    'label' => 'Messsage',
                    'display' => 'block',
                    'max' => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_Sz982bc694Cm72',
                            'label'  => 'Message',
                            'name' => 'message',
                            'type'  => 'text',
                            'required' => 0,
                        ),
                        array(
                            'key' => $id . '_SD1234ewe543430',
                            'label' => 'Alignment',
                            'name' => 'alignment',
                            'type' => 'select',
                            'required' => '',
                            'choices' => array(
                                'left' => 'Right',
                                'right' => 'Left'
                            ),
                            'allow_null' => 1
                        )
                    )
                ),
                array(
                    'key'        => $id . '_S2982bc694C91',
                    'label'       => 'Phone numbers',
                    'name'      => 'phone-numbers',
                    'display'    => 'block',
                    'max' => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_S2982bc694Cm72',
                            'label'  => 'Phone numbers',
                            'name' => 'phone-numbers',
                            'type'  => 'message',
                            'required' => 0,
                            'message' => '<p>You can configure contact phone numbers from Common settings page</p>'
                        ),
                        array(
                            'key' => $id . '_SD1234ewe543433',
                            'label' => 'Alignment',
                            'name' => 'alignment',
                            'type' => 'select',
                            'required' => '',
                            'choices' => array(
                                'left' => 'Right',
                                'right' => 'Left'
                            ),
                            'allow_null' => 1
                        )
                    )
                ),
                array(
                    'key'       => $id . '_S2982bc694C82',
                    'label'     => 'Contact emails',
                    'name'      => 'contact-emails',
                    'display'   => 'block',
                    'max'       => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_S2982bc694Cm67',
                            'label'  => 'Contact emails',
                            'name' => 'contact-emails',
                            'type'  => 'message',
                            'required' => 0,
                            'message' => '<p>You can configure contact emails from Common settings page</p>'
                        ),
                        array(
                            'key' => $id . '_SD1234ewe543434',
                            'label' => 'Alignment',
                            'name' => 'alignment',
                            'type' => 'select',
                            'required' => '',
                            'choices' => array(
                                'left' => 'Right',
                                'right' => 'Left'
                            ),
                            'allow_null' => 1
                        )
                    )
                ),
                array(
                    'key'       => $id . '_S2982bc694C83',
                    'label'     => 'Social links',
                    'name'      => 'social-links',
                    'display'   => 'block',
                    'max'       => 1,
                    'sub_fields' => array (
                        array(
                            'key'   => $id . '_S2982bc694Cm66',
                            'label'  => 'Social links',
                            'name' => 'social-links',
                            'type'  => 'message',
                            'required' => 0,
                            'message' => '<p>You can configue social links from Common settings page</p>'
                        ),
                        array(
                            'key' => $id . '_SD1234ewe543432',
                            'label' => 'Alignment',
                            'name' => 'alignment',
                            'type' => 'select',
                            'required' => '',
                            'choices' => array(
                                'left' => 'Right',
                                'right' => 'Left'
                            ),
                            'allow_null' => 1
                        )
                    )
                )
            )
        ),

        array (
            'key' => $id . '_sub9822xfc1',
            'label' => 'Sub panel',
            'name' => 'sub_panel_tab',
            'type' => 'tab',
            'required' => '',
        ),

        array (
            'key'      => $id . '_sub9822xfx2',
            'label'    => 'Components',
            'name'     => 'sub_header_components',
            'type'     => 'flexible_content',
            'required' => '',
            'button_label' => 'Add component',
            'layouts'   => array(
                array(
                    'key'       => $id . '_sub9822xfz3',
                    'label'     => 'Excerpt slider',
                    'name'      => 'excerpt-slider',
                    'display'   => 'block',
                    'max'       => 1,
                    'sub_fields' => array (
                        array(
                            'key' => $id . '_sub9822xfv4',
                            'label' => 'Excerpts',
                            'name' => 'excerpt_tab',
                            'type' => 'tab',
                            'required' => '',
                        ),
                        array(
                            'key'      => $id . '_sub9822xff4',
                            'label'    => 'Excerpts',
                            'name'     => 'excerpts',
                            'type'     => 'repeater',
                            'required' => '',
                            'button_label' => 'Add excerpt',
                            'layout'   => 'block',
                            'collapsed'   => '',
                            'sub_fields' => array(
                                array(
                                    'key' => $id . '_sub9822xff5',
                                    'label' => 'Excerpt',
                                    'name' => 'excerpt',
                                    'type' => 'wysiwyg',
                                    'required' => '',
                                    'media_upload' => 1,
                                ),
                            )
                        ),
                        array(
                            'key' => $id . '_sub9822xfz6',
                            'label' => 'Settings',
                            'name' => 'settings_tab',
                            'type' => 'tab',
                            'required' => '',
                        ),
                        array(
                            'key'        => $id . '_sub9822xfx6',
                            'label' => 'Menu style',
                            'name' => 'style',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => get_pc_styles_list( 'hero_area' ), // @todo
                            'allow_null' => 1,
                            'wrapper' => array(
                                'width' => 25
                            )
                        ),
                        array(
                            'key'   => $id . '_sub9822xfv6',
                            'label' => 'Max width',
                            'name' => 'max-width',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'auto' => 'Auto',
                                '1000px' => '1000px',
                                '750px' => '750px',
                                '500px' => '500px',
                                '250px' => '250px',
                            ),
                            'allow_null' => 0,
                            'wrapper' => array(
                                'width' => 25
                            )
                        ),
                        array(
                            'key'   => $id . '_sub9822xfc6',
                            'label' => 'Scroll type',
                            'name' => 'scroll-type',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'manually' => 'Manually',
                                'auto'     => 'Auto every 5 seconds',
                            ),
                            'allow_null' => 0,
                            'wrapper' => array(
                                'width' => 25
                            )
                        ),

                        array (
                            'key' => $id . '_xrr2s8ff6d59a',
                            'label' => 'Arrows type',
                            'name' => 'arrows_type',
                            'type' => 'select',
                            'required' => 0,
                            'wrapper' => array (
                                'width' => 25,
                            ),
                            'choices' => array (
                                'auto' => 'Auto',
                                'custom' => 'Custom',
                                'images' => 'Images'
                            ),
                            'default_value' => array (
                                0 => 'auto',
                            ),
                            'readonly' => 1,
                        ),
                        array (
                            'key' => $id . '_BdC1xxqCg5P4b1',
                            'label' => 'Left arrow',
                            'name' => 'arrows-img_left',
                            'type' => 'image',
                            'required' => '',
                            'return_format' => 'url',
                            'preview_size' => 'full',
                            'conditional_logic' => array (
                                array (
                                    array (
                                        'field' => $id . '_xrr2s8ff6d59a',
                                        'operator' => '==',
                                        'value' => 'images'
                                    )
                                ),
                            ),
                            'wrapper' => array (
                                'width' => 25,
                            ),
                        ),
                        array (
                            'key' => $id . '_BC1CqCg5P4xb2',
                            'label' => 'Right arrow',
                            'name' => 'arrows-img_right',
                            'type' => 'image',
                            'required' => '',
                            'return_format' => 'url',
                            'preview_size' => 'full',
                            'conditional_logic' => array (
                                array (
                                    array (
                                        'field' => $id . '_xrr2s8ff6d59a',
                                        'operator' => '==',
                                        'value' => 'images'
                                    )
                                ),
                            ),
                            'wrapper' => array (
                                'width' => 25,
                            ),
                        ),
                        array (
                            'key' => $id . '_axrrwe0s9a',
                            'label' => 'Arrows weight',
                            'name' => 'arrows_weight',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => array (
                                array (
                                    array (
                                        'field' => $id . '_xrr2s8ff6d59a',
                                        'operator' => '==',
                                        'value' => 'custom'
                                    )
                                ),
                            ),
                            'wrapper' => array (
                                'width' => 25
                            ),
                            'choices' => array (
                                'thin' => 'Thin',
                                'normal' => 'Normal',
                                'bold' => 'Bold'
                            ),
                            'default_value' => array (
                                0 => 'normal',
                            ),
                        ),
                        array (
                            'key' => $id . '_losr8a49e2x',
                            'label' => 'Arrows Color',
                            'name' => 'arrows_color',
                            'type' => 'rgba_color',
                            'required' => 0,
                            'conditional_logic' => array (
                                array (
                                    array (
                                        'field' => $id . '_xrr2s8ff6d59a',
                                        'operator' => '==',
                                        'value' => 'custom'
                                    )
                                ),
                            ),
                            'wrapper' => array (
                                'width' => 25
                            ),
                            'rgba' => 'rgba(255,255,255,1)',
                            'return_value' => 0
                        ),
                    )
                )
            )
        ),

        array (
            'key' => $id . '_5823dc8cfs6c1',
            'label' => 'Mobile settings',
            'name' => 'mob_tab',
            'type' => 'tab',
        ),

        array (
            'key' => $id . '_PR98sb9mob11',
            'label' => 'Logotype',
            'name' => 'mobile_logotype',
            'type' => 'image',
            'instructions' => 'Leave empty for using the Logo from Settings -> Common',
            'required' => '',
            'return_format' => 'id',
            'preview_size' => 'full',
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_S29822cs9zCa81',
            'label' => 'Mobile menu name',
            'name' => 'mobile_menu_name',
            'type' => 'text',
            'instructions' => 'Leave empty for using the Menu from Appearance -> Menus -> the Menu which is set to location: Header',
            'required' => 0,
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key'      => $id . '_Tassw6Adp21',
            'label'    => 'Header type',
            'name'     => 'mob-type',
            'type'     => 'select',
            'required' => '',
            'choices'  => array(
                'logo-and-burger'   => 'Logo & Burger',
                'logo-only'   => 'Logo only',
            ),
            'default_value' => 'logo-and-burger',
            'allow_null' => 0,
            'wrapper'    => array(
                'width'    => 25
            )
        ),

        array (
            'key'      => $id . '_Tasvb4cdsdfs6A2p1s1',
            'label'    => 'Pulsing animation',
            'name'     => 'mob-pulsing',
            'type'     => 'select',
            'required' => '',
            'choices'  => array(
                'onload'   => 'Once a page loaded',
                'infinite' => 'Each 5 seconds',
            ),
            'allow_null' => 1,
            'wrapper'    => array(
                'width'    => 25
            )
        ),

        array (
            'key'   => $id . '_5823dc8cfxss3',
            'label' => 'Buttons panel',
            'name'  => 'buttons_panel',
            'type'  => 'flexible_content',
            'button_label' => 'Add button',
            'layouts' => array (
                array (
                    'key' => $id . '_p823dc8cfs4c2',
                    'name' => 'existed',
                    'label' => 'Existed',
                    'display' => 'block',
                    'sub_fields' => array(
                        array (
                            'key' => $id . '_5825dc3cfs3c5',
                            'label' => 'Button ID',
                            'name' => 'id',
                            'type' => 'text',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => 33
                            ),
                        ),
                        array (
                            'key' => $id . '_583ads3qfs3z5',
                            'label' => 'Conditional',
                            'name' => 'conditional',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => [
                                'single-product' => 'Product pages'
                            ],
                            'wrapper' => array(
                                'width' => 67
                            ),
                            'multiple' => 1,
                            'ui' => 1,
                            'ajax' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => $id . '_5825dc3cfa3z7',
                    'name' => 'custom',
                    'label' => 'Custom',
                    'display' => 'block',
                    'sub_fields' => array(
                        array (
                            'key'   => $id . '_5825dc3cAa3w9',
                            'label' => 'Style',
                            'name'  => 'style',
                            'type'       => 'select',
                            'required'   => '',
                            'choices'    => get_pc_styles_list( 'hero_area' ), // @todo
                            'allow_null' => 1,
                            'wrapper' => array(
                                'width' => 33
                            ),
                        ),
                        array (
                            'key' => $id . '_583ads3qfs3z4',
                            'label' => 'Conditional',
                            'name' => 'conditional',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => [
                                'single-product' => 'Product pages'
                            ],
                            'wrapper' => array(
                                'width' => 67
                            ),
                            'multiple' => 1,
                            'ui' => 1,
                            'ajax' => 1,
                        ),
                        array (
                            'key' => $id . '_5825dc2cfs5c4',
                            'label' => 'Button',
                            'name' => 'button',
                            'type' => 'clone',
                            'required' => 0,
                            'clone' => array (
                                0 => 'bttn_59930ca194830',
                            ),
                            'display' => 'group',
                            'layout' => 'block',
                            'prefix_label' => 0,
                            'prefix_name' => 0,
                            'wrapper' => array(
                                'width' => '100'
                            )
                        ),
                    )
                )
            )
        ),

        array (
            'key' => $id . '_5821d28cf16ca',
            'label' => 'Settings',
            'name' => 'settings_tab',
            'type' => 'tab',
        ),

        array (
            'key' => $id . '_596506806441f',
            'label' => 'Header style',
            'name' => 'style',
            'type' => 'select',
            'required' => 0,
            'choices' => get_pc_styles_list( 'hero_area' ),  // @todo
            'allow_null' => 1,
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_596506817250g',
            'label' => 'Overlaying areas',
            'name' => 'overlaying',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'sup'     => 'Sup header',
                'primary' => 'Primary',
                'mobile'  => 'Mobile view'
            ),
            'allow_null' => 1,
            'multiple'   => 1,
            'ui'         => 1,
            'wrapper'    => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_596521816341h',
            'label' => 'Header paddings',
            'name' => 'header-paddings',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'small'  => 'Small',
            ),
            'allow_null' => 1,
            'wrapper'    => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_596506909179g',
            'label' => 'Position',
            'name' => 'position',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'sticky' => 'Sticky',
            ),
            'allow_null' => 1,
            'wrapper'    => array(
                'width' => 25
            )
        ),




    /**



        array (
            'key' => $id . '_596503919378g',
            'label' => 'Logotype position',
            'name' => 'logo-position',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'offset' => 'Offset'
            ),
            'allow_null' => 1,
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_5963Hhe1d3723',
            'label' => 'Logotype area height',
            'name' => 'header-logo-height',
            'type' => 'number',
            'required' => 0,
            'append'=> 'px',
            'placeholder' => 'auto',
            'wrapper' => array(
                'width' => 25,
            ),
            'conditional_logic' => array(
                array(
                    array(
                        'field' => $id . '_596503919378g',
                        'operator' => '!=',
                        'value' => 'offset'
                    ),
                )
            )
        ),

        array (
            'key' => $id . '_5965d3H1d3723',
            'label' => 'Header height',
            'name' => 'header-height',
            'type' => 'text',
            'required' => 0,
            'append'=> 'px',
            'placeholder' => 'auto',
            'wrapper' => array(
                'width' => 25,
            ),
            'conditional_logic' => array(
                array(
                    array(
                        'field' => $id . '_596503919378g',
                        'operator' => '==',
                        'value' => 'offset'
                    ),
                )
            )
        ),

        array (
            'key' => $id . '_5963H1d3723of',
            'label' => 'Logo bottom offset',
            'name' => 'logo-bottom',
            'type' => 'number',
            'required' => 0,
            'append'=> 'px',
            'wrapper' => array(
                'width' => 25,
            ),
            'placeholder' => '0',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => $id . '_596503919378g',
                        'operator' => '==',
                        'value' => 'offset'
                    ),
                )
            )
        ),

        array (
            'key' => $id . '_596sd3H723of',
            'label' => 'Menu height for iPad',
            'name' => 'ipad-nav-height',
            'type' => 'select',
            'required' => 0,
            'choices' => [
                'auto' => 'Auto',
                'logo' => 'Fit to the logo size',
            ],
            'default_values' => ['auto'],
            'wrapper' => array(
                'width' => 25,
            ),
            'conditional_logic' => array(
                array(
                    array(
                        'field' => $id . '_596503919378g',
                        'operator' => '==',
                        'value' => 'offset'
                    ),
                )
            )
        ),

        array (
            'key' => $id . '_59651sffx451',
            'label' => 'Navigation overflowing',
            'name' => 'overflowing',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'menu' => 'Wrap menu',
                'labels' => 'Wrap labels',
            ),
            'allow_null' => 1,
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_59x51sffx451',
            'label' => 'Menu align',
            'name' => 'menu-align',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'left'   => 'Left',
                'center' => 'Center',
                'right'  => 'Right',
            ),
            'conditional_logic' => array(
                array(
                    array(
                        'field' => $id . '_59651sffx451',
                        'operator' => '==',
                        'value' => 'menu',
                    )
                )
            ),
            'allow_null' => 1,
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key' => $id . '_59x51sffx452',
            'label' => 'Labels align',
            'name' => 'labels-align',
            'type' => 'select',
            'required' => 0,
            'choices' => array(
                'left'   => 'Left',
                'center' => 'Center',
                'right'  => 'Right',
            ),
            'conditional_logic' => array(
                array(
                    array(
                        'field' => $id . '_59651sffx451',
                        'operator' => '==',
                        'value' => 'labels',
                    )
                )
            ),
            'allow_null' => 1,
            'wrapper' => array(
                'width' => 25
            )
        ),

        array (
            'key'        => $id . '_596xd68d6fq13d',
            'label'      => 'Transition',
            'name'       => 'transition',
            'type'       => 'select',
            'required'   => '',
            'choices'    => [
                'separately' => 'Separately',
            ],
            'wrapper' => array(
                'width' => 25
            ),
            'allow_null' => 1
        ),

        array (
            'key'        => $id . '_596xd68d6fq1f',
            'label'      => 'Menu items Transition',
            'name'       => 'transition-item',
            'type'       => 'select',
            'required'   => '',
            'instructions'   => '',
            // 'choices'    => get_button_transitions_list(),
            'choices'    => [
                'hello' => 'Hello',
                'tigers' => 'Tigers'    //@todo
            ],
            'allow_null' => 1,
            'ui' => 1,
            'ajax' => 1,
            'wrapper' => array(
                'width' => 25
            ),
            'conditional_logic' => [
                [
                    [
                        'field' => $id . '_596xd68d6fq13d',
                        'operator' => '==',
                        'value' => 'separately'
                    ]
                ]
            ]
        ),

        array (
            'key'   => $id . '_596xd68d6fq13dzz',
            'label' => 'Menu item style',
            'name' => 'item-style',
            'type' => 'select',
            'required' => '',
            'wrapper' => array ( 'width' => 25 ),
            'choices' => get_pc_styles_list( 'hero_area' ), // @todo
            'allow_null' => 1,
            'conditional_logic' => [
                [
                    [
                        'field' => $id . '_596xd68d6fq13d',
                        'operator' => '==',
                        'value' => 'separately'
                    ]
                ]
            ]
        ),

        array (
            'key'   => $id . '_993xdf513d25',
            'label' => 'Logotype click',
            'name' => 'logo-click',
            'type' => 'select',
            'required' => '',
            'wrapper' => array ( 'width' => 25 ),
            'choices' => array(
                'home' => 'Lead to Home',
                'nothing' => 'Nothing',
            ),
            'allow_null' => 1,
            'default_value' => 'home'
        ),

        array (
            'key'   => $id . '_596divid6fq13dzz',
            'label' => 'Bottom divider',
            'name' => 'bottom-divider',
            'type' => 'image',
            'required' => '',
            'return_format' => 'url'
        ),



        */

    ), $id );
}
