<?php

//Testimonials headline
/*
$fields[] = array(
        'type'        => 'color',
        'setting'     => 'testimonial_headline_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'testimonial_headline',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.testimonials h3',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'testimonial_headline_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'testimonial_headline',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.testimonials h3',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'testimonial_headline_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'testimonial_headline',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.testimonials h3',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'testimonial_headline_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'testimonial_headline',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.testimonials h3',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
*/

//Testimonials tile title
$fields[] = array(
        'type'        => 'color',
        'setting'     => 'testimonial_title_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'testimonial_title',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.testimonials strong',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'testimonial_title_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'testimonial_title',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.testimonials .testimonial-content strong',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'testimonial_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'testimonial_title',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.testimonials .testimonial-content strong',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'testimonial_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'testimonial_title',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.testimonials .testimonial-content strong',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
    
//Testimonials excerpt
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'testimonial_excerpt_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'testimonial_excerpt',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.testimonials p',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'testimonial_excerpt_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'testimonial_excerpt',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.testimonials p',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'testimonial_excerpt_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'testimonial_excerpt',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.testimonials p',
            'property' => 'font-weight',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'testimonial_excerpt_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'testimonial_excerpt',
        'default'  => 14,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.testimonials p',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

