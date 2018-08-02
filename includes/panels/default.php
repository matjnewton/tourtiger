<?php

//default text

    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'default_text_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_text',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.site-container',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'default_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'default_text',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.site-container',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'default_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_text',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.site-container',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'default_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_text',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-container',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

//default links    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'default_link_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_link',
        'default'     => '#000',
        'priority'    => 10,
        'output'    => array(
            array(
            'element'  => '.site-container a:link, .site-container a:active, .site-container a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'default_link_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'default_link',
        'default'     => '#000',
        'priority'    => 11,
        'output'    => array(
            array(
            'element'  => '.site-container a:hover',
            'property'  => 'color',
            ),
        ),
    );

//h1    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'heading1_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_h1',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.content h1',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'heading1_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'default_h1',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.content h1',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading1_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_h1',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.content h1',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading1_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_h1',
        'default'  => 41,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.content h1',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//h2
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'heading2_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_h2',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.content h2',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'heading2_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'default_h2',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.content h2',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading2_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_h2',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.content h2',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading2_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_h2',
        'default'  => 37,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.content h2',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//h3
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'heading3_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_h3',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.content h3',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'heading3_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'default_h3',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.content h3',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading3_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_h3',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.content h3',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading3_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_h3',
        'default'  => 32,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.content h3',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

//h4
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'heading4_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_h4',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.content h4',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'heading4_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'default_h4',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.content h4',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading4_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_h4',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.content h4',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading4_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_h4',
        'default'  => 26,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.content h4',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//h5
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'heading5_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_h5',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.content h5',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'heading5_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'default_h5',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.content h5',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading5_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_h5',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.content h5',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading5_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_h5',
        'default'  => 21,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.content h5',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//h6
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'heading6_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'default_h6',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.content h6',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'heading6_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'default_h6',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.content h6',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading6_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'default_h6',
        'default'  => 700,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.content h6',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'heading6_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'default_h6',
        'default'  => 18,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.content h6',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

