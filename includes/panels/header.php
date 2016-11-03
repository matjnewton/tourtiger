<?php
    
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'header_bg',
        'description' => __( 'Background', 'tourtiger' ),
        'section'     => 'header_wrapper',
        'default'     => array(
            'color'    => '#184468',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.site-container .site-header .header-bar, .site-container .site-header .header-bar-wrapper',
    );
    
    /*$fields[] = array(
        'type'        => 'color',
        'setting'     => 'search_social_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'search_social_links',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.above-header .btn.btn-search, .above-header .social-wrapper a',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'search_social_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'search_social_links',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.above-header .btn.btn-search, .above-header .social-wrapper a',
            'property' => 'font-family',
            ),
        ),
    );*/
    
    