<?php

/*Footer Background*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'footer_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'footer_bg',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.site-footer',
    );

/*Content*/
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'footer_content_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'footer_content',
        'default'     => '#000',
        'priority'    => 19,
        'output' => array(
            array(
            'element'  => '.site-container .site-footer',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'footer_content_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'footer_content',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.site-container .site-footer',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'footer_content_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'footer_content',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.site-container .site-footer',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'footer_content_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'footer_content',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-container .site-footer',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
/*Footer Link*/
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'footer_link_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'footer_link',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.site-container .site-footer a:link, .site-container .site-footer a:active, .site-container .site-footer a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'footer_link_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'footer_link',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.site-container .site-footer a:hover',
            'property' => 'color',
            ),
        ),
    );

/*Footer Titles and Navigation*/
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'footer_title_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'footer_title',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.site-container .site-footer .footer-nav-wrapper, .site-container .site-footer h4',
            'property' => 'font-family',
            ),
        ),
    );    
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'footer_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'footer_title',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.site-container .site-footer .footer-nav-wrapper, .site-container .site-footer h4',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'footer_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'footer_title',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-container .site-footer .footer-nav-wrapper, .site-container .site-footer h4',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    