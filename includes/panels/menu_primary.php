<?php

/* Top items */
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'primary_top_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'primary_top_links',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu a:link, .main-nav-wrapper .genesis-nav-menu a:active, .main-nav-wrapper .genesis-nav-menu a:visited, .main-nav-wrapper .genesis-nav-menu span',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'primary_top_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'primary_top_links',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu a:hover, .main-nav-wrapper .genesis-nav-menu span:hover',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'primary_top_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'primary_top_links',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.site-header, .main-nav-wrapper .genesis-nav-menu a',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'primary_top_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'primary_top_links',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.site-header, .main-nav-wrapper .genesis-nav-menu a',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'md_primary_top_font_size',
        'label'    => __( 'Tablet Font Size', 'tourtiger' ),
        'section'  => 'primary_top_links',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-header, .main-nav-wrapper .genesis-nav-menu a',
            'property' => 'font-size',
            'prefix'    => '@media (min-width: 992px) {',
            'suffix'    => '}',
            'units'    => 'px',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'lg_primary_top_font_size',
        'label'    => __( 'Desktop Font Size', 'tourtiger' ),
        'section'  => 'primary_top_links',
        'default'  => 20,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-header, .main-nav-wrapper .genesis-nav-menu a',
            'property' => 'font-size',
            'prefix'    => '@media (min-width: 1200px) {',
            'suffix'    => '}',
            'units'    => 'px',
            ),
        ),
    );
    
/* Sub items */
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'primary_sub_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'primary_sub_links',
        'default'     => array(
            'color'    => '#184468',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.main-nav-wrapper .genesis-nav-menu .sub-menu a',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'primary_sub_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'primary_sub_links',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu .sub-menu a:link, .main-nav-wrapper .genesis-nav-menu .sub-menu a:active, .main-nav-wrapper .genesis-nav-menu .sub-menu a:visited',
            'property' => 'color',
            ),
        ),
    );

    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'primary_sub_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'primary_sub_links',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu .sub-menu a:hover',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'primary_submenu_border_color',
        'label'       => __( 'Submenu Border Color', 'tourtiger' ),
        'section'     => 'primary_sub_links',
        'default'     => '#000',
        'priority'    => 22,
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu .sub-menu, .main-nav-wrapper .genesis-nav-menu .sub-menu a',
            'property' => 'border-color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'primary_sub_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'primary_sub_links',
        'default'  => 'Roboto',
        'priority' => 23,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu .sub-menu a',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'primary_sub_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'primary_sub_links',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu .sub-menu a',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'primary_sub_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'primary_sub_links',
        'default'  => 18,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.main-nav-wrapper .genesis-nav-menu .sub-menu a',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

/*CTA*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'primary_menu_cta_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'primary_menu_cta',
        'default'     => array(
            'color'    => '#184468',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.site-container .genesis-nav-menu .book-btn',
    );
    
    $fields[] = array(
        'type'        => 'checkbox',
        'setting'     => 'primary_menu_cta_border_on',
        'label'       => __( 'Include Border', 'tourtiger' ),
        'section'     => 'primary_menu_cta',
        'default'     => 0,
        'priority'    => 20,
    );
    
    $fields[] = array(
        'type'        => 'slider',
        'setting'     => 'primary_menu_cta_border_width',
        'label'       => __( 'Border Width', 'tourtiger' ),
        'section'     => 'primary_menu_cta',
        'default'     => '0',
        'priority'    => 29,
        'choices'  => array(
            'min'  => 0,
            'max'  => 5,
            'step' => 1,
        ),
        'required'  =>  array(
            array(
                'setting'   =>  'primary_menu_cta_border_on',
                'operator'  =>  '==',
                'value' =>  1
            )
        ),
        'output' => array(
            array(
            'element'  => '.site-container .genesis-nav-menu .book-btn',
            'property' => 'border-width',
            'units'    => 'px',
            ),
        )
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'primary_menu_cta_border_color',
        'label'       => __( 'CTA Border Color', 'tourtiger' ),
        'section'     => 'primary_menu_cta',
        'default'     => '#000',
        'priority'    => 21,
        'required'  =>  array(
            array(
                'setting'   =>  'primary_menu_cta_border_on',
                'operator'  =>  '==',
                'value' =>  1
            )
        ),
        'output' => array(
            array(
            'element'  => '.site-container .genesis-nav-menu .book-btn',
            'property' => 'border-color',
            ),
        ),
    );
    