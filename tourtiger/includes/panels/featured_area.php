<?php

//Tile image tint
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'featured_image_tint',
        'description' => __( 'Tint Color', 'tourtiger' ),
        'section'     => 'tile_image_tint',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 30
        ),
        'priority'    => 19,
        'output' => '.tile-tint',
    );
    
//Featured area container
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'featured_container_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'featured_area_container',
        'default'     => array(
            'color'    => '#f3f5f6',
            'opacity'  => 100
        ),
        'priority'    => 24,
        'output' => '.featured-tours .container, .featured-tours-2 .position-wrapper, .featured-section .container',
    );

//Featured area title
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured_headline_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'featured_headline',
        'default'     => '#000',
        'priority'    => 21,
        'output' => array(
            array(
            'element'  => '.featured-tours h3',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'featured_headline_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'featured_headline',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.featured-tours h3',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured_headline_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'featured_headline',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours h3',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured_headline_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'featured_headline',
        'default'  => 32,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours h3',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//Featured tile container
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'tile_container_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'featured_tile_container',
        'default'     => array(
            'color'    => '#fff'
        ),
        'priority'    => 26,
        'output' => '.featured-tours .tour',
    );
    
//Featured tile title
 $fields[] = array(
        'type'     => 'select',
        'setting'  => 'featured_title_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'featured_area_title',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.featured-tours .tour .title-excerpt strong',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'featured_area_title',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours .tour .title-excerpt strong',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'featured_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'featured_area_title',
        'default'  => 19,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.featured-tours .tour .title-excerpt strong',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

//Featured area excerpt    
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured_excerpt_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'featured_area_excerpt',
        'default'     => '#000',
        'priority'    => 27,
        'output' => array(
            array(
            'element'  => '.tour',
            'property' => 'color',
            ),
        ),
    );
    
    

//Featured area button
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'featured_button_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'featured_button',
        'default'     => array(
            'color'    => '#c2272f'
        ),
        'priority'    => 28,
        'output' => '.site-container .view-tour-btn a',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'featured_button_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'featured_button',
        'default'     => '#fff',
        'priority'    => 29,
        'output' => array(
            array(
            'element'  => '.site-container .featured-tours .view-tour-btn a:link, .site-container .featured-tours .view-tour-btn a:hover, .site-container .featured-tours .view-tour-btn a:active, .site-container .featured-tours .view-tour-btn a:visited',
            'property' => 'color',
            ),
        ),
    );