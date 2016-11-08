<?php

//Front-1 Featured area tile title    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured1_title_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'featured1_tile_title',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.featured-tours .tour strong a:link, .featured-tours .tour strong a:active, .featured-tours .tour strong a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured1_title_color_hover',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'featured1_tile_title',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.featured-tours .tour strong a:hover',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'featured1_title_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'featured1_tile_title',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.featured-tours .tour strong',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured1_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'featured1_tile_title',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours .tour strong',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured1_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'featured1_tile_title',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours .tour strong',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

