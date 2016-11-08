<?php

//Front-3 Featured area tile title    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured3_title_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'featured3_tile_title',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.featured-tours-2 .tour-2 strong a:link, .featured-tours-2 .tour-2 strong a:active, .featured-tours-2 .tour-2 strong a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured3_title_color_hover',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'featured3_tile_title',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.site-container .featured-tours-2 .name a:hover',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'featured3_title_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'featured3_tile_title',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.featured-tours-2 .tour-2 strong',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured3_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'featured3_tile_title',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours-2 .tour-2 strong',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured3_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'featured3_tile_title',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours-2 .tour-2 strong',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

//Front-3 Featured area spacing
    /*$fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured3_top_margin',
        'label'    => __( 'Featured Tiles top margin', 'tourtiger' ),
        'section'  => 'featured3_spacing',
        'default'  => 0,
        'priority' => 24,
        'choices'  => array(
            'min'  => -500,
            'max'  => 500,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-inner',
            'property' => 'margin-top',
            'units'    => 'px',
            ),
        ),
    );*/

