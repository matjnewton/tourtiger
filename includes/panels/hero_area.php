<?php

//hero area title
$fields[] = array(
        'type'        => 'background',
        'setting'     => 'hero_title_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'hero_area_title',
        'default'     => array(
            'color'    => '#0c324f',
            'opacity'  => 80
        ),
        'priority'    => 10,
        'output' => '.banner-top h1 span, .banner-top h2 span, .tour-2 .name',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'hero_title_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'hero_area_title',
        'default'     => '#fff',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.banner-top h1, .banner-top h2',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'hero_title_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'hero_area_title',
        'default'  => 'Roboto',
        'priority' => 21,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.banner-top h1, .banner-top h2',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'hero_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'hero_area_title',
        'default'  => 700,
        'priority' => 22,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top h1, .banner-top h2',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'hero_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'hero_area_title',
        'default'  => 41,
        'priority' => 23,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top h1, .banner-top h2',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'hero_title_m_font_size',
        'label'    => __( 'Mobile Font Size', 'tourtiger' ),
        'section'  => 'hero_area_title',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top.banner-top-mobile h1, .banner-top.banner-top-mobile h2',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
    //hero area content    
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'hero_content_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'hero_area_content',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 80
        ),
        'priority'    => 17,
        'output' => '.banner-top li span, .banner-top p span',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'hero_content_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'hero_area_content',
        'default'     => '#fff',
        'priority'    => 25,
        'output' => array(
            array(
            'element'  => '.banner-top li, .banner-top p',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'hero_content_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'hero_area_title',
        'default'  => 600,
        'priority' => 26,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top li, .banner-top p',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'hero_content_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'hero_area_content',
        'default'  => 26,
        'priority' => 27,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top li, .banner-top p',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'pod_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'hero_pod',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 100
        ),
        'priority'    => 28,
        'output' => '.home .banner-bottom .container',
    );

//Hero Area CTA
    
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'cta_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'hero_area_cta',
        'default'     => array(
            'color'    => '#c2272f',
            'opacity'  => 100
        ),
        'priority'    => 17,
        'output' => '.site-container .site-header .book-btn',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'cta_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'hero_area_cta',
        'default'     => '#000',
        'priority'    => 28,
        'output' => array(
            array(
            'element'  => '.banner-top a.book-btn:hover, .content .book-tour-wrapper a.book-btn:hover, .content .book-tour-wrapper a.book-btn:hover',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'checkbox',
        'setting'     => 'cta_border_on',
        'label'       => __( 'Include Border', 'tourtiger' ),
        'section'     => 'hero_area_cta',
        'default'     => 0,
        'priority'    => 29,
    );
    
    $fields[] = array(
        'type'        => 'slider',
        'setting'     => 'cta_border_width',
        'label'       => __( 'Border Width', 'tourtiger' ),
        'section'     => 'hero_area_cta',
        'default'     => '0',
        'priority'    => 29,
        'choices'  => array(
            'min'  => 0,
            'max'  => 5,
            'step' => 1,
        ),
        'required'  =>  array(
            array(
                'setting'   =>  'cta_border_on',
                'operator'  =>  '==',
                'value' =>  1
            )
        ),
        'output' => array(
            array(
            'element'  => '.banner-top .book-btn, .banner-bottom .book-btn, .site-inner .book-btn',
            'property' => 'border-width',
            'units'    => 'px',
            ),
        )
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'cta_border_color',
        'label'       => __( 'Border Color', 'tourtiger' ),
        'section'     => 'hero_area_cta',
        'default'     => '#000',
        'priority'    => 30,
        'required'  =>  array(
            array(
                'setting'   =>  'cta_border_on',
                'operator'  =>  '==',
                'value' =>  1
            )
        ),
        'output' => array(
            array(
            'element'  => '.banner-top .book-btn, .banner-bottom .book-btn, .site-inner .book-btn',
            'property' => 'border-color',
            ),
        )
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'cta_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'hero_area_cta',
        'default'  => 'Roboto',
        'priority' => 30,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.banner-top .book-btn-wrapper, .banner-bottom .book-tour-wrapper, .site-container .book-tour-wrapper',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'cta_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'hero_area_cta',
        'default'  => 14,
        'priority' => 31,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top .book-btn-wrapper, .banner-bottom .book-tour-wrapper, .site-container .book-tour-wrapper',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'cta_border_radius',
        'label'    => __( 'Border Radius', 'tourtiger' ),
        'section'  => 'hero_area_cta',
        'default'  => 0,
        'priority' => 41,
        'choices'  => array(
            'min'  => 0,
            'max'  => 20,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.banner-top .book-btn',
            'property' => 'border-radius',
            'units'    => 'px',
            ),
        ),
    );
    
//Hero Area Background Opacity
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'hero_image_tint_set',
        'description' => __( 'Tint Color', 'tourtiger' ),
        'section'     => 'hero_image_tint',
        'default'     => array(
            'color'    => '#74acdf',
            'opacity'  => 80
        ),
        'priority'    => 17,
        'output' => '.site-container .tint',
    );