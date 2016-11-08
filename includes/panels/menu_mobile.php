<?php

/* Top items */
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'mobile_top_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'mobile_top_links',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav a:link, .navbar-collapse .mobile-nav a:active, .navbar-collapse .mobile-nav a:visited, .navbar-collapse .mobile-nav .dropdown .dropdown-toggle:link, .navbar-collapse .mobile-nav .dropdown .dropdown-toggle:active, .navbar-collapse .mobile-nav .dropdown .dropdown-toggle:visited, .navbar-collapse .mobile-nav .dropdown.open .dropdown-toggle:link, .navbar-collapse .mobile-nav .dropdown.open .dropdown-toggle:active, .navbar-collapse .mobile-nav .dropdown.open .dropdown-toggle:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'mobile_top_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'mobile_top_links',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav > li > a:hover',
            'property' => 'color',
            'units' =>  ' !important',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'mobile_top_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'mobile_top_links',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.navbar-header .navbar-toggle, .navbar-collapse .mobile-nav a, .navbar-collapse .mobile-nav .dropdown.open a',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'mobile_top_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'mobile_top_links',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.navbar-header .navbar-toggle, .navbar-collapse .mobile-nav a, .navbar-collapse .mobile-nav .dropdown.open a',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'mobile_top_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'mobile_top_links',
        'default'  => 18,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.navbar-header .navbar-toggle, .navbar-collapse .mobile-nav a, .navbar-collapse .mobile-nav .dropdown.open a',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
/*Toggle Button*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'mobile_toggle_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'mobile_toggle_btn',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 80
        ),
        'priority'    => 10,
        'output' => '.navbar .navbar-toggle',
    );
    
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'mobile_toggle_hover_bg',
        'description' => __( 'Hover Background Color', 'tourtiger' ),
        'section'     => 'mobile_toggle_btn',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 30
        ),
        'priority'    => 20,
        'output' => '.navbar .navbar-toggle:hover, .navbar .navbar-toggle:focus',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'mobile_toggle_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'mobile_toggle_btn',
        'default'     => '#000',
        'priority'    => 31,
        'output' => array(
            array(
            'element'  => '.navbar-header .navbar-toggle',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'mobile_toggle_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'mobile_toggle_btn',
        'default'     => '#000',
        'priority'    => 32,
        'output' => array(
            array(
            'element'  => '.navbar-header .navbar-toggle:hover',
            'property' => 'color',
            ),
        ),
    );
    
    

/* Sub items */
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'mobile_sub_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'mobile_sub_links',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav .sub-menu.dropdown-menu a:link, .navbar-collapse .mobile-nav .sub-menu.dropdown-menu a:active, .navbar-collapse .mobile-nav .sub-menu.dropdown-menu a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'mobile_sub_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'mobile_sub_links',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav .sub-menu.dropdown-menu a:hover',
            'property' => 'color',
            'units' =>  ' !important',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'mobile_sub_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'mobile_sub_links',
        'default'  => 'Roboto',
        'priority' => 23,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav .sub-menu.dropdown-menu a',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'mobile_sub_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'mobile_sub_links',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav .sub-menu.dropdown-menu a',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'mobile_sub_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'mobile_sub_links',
        'default'  => 18,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.navbar-collapse .mobile-nav .sub-menu.dropdown-menu a',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    