<?php
/*Subscribe Container Background*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'subscribe_container_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'subscribe_container',
        'default'     => array(
            'color'    => '#eaf3fa',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.subscribe .container',
    );
    
//Title
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'subscribe_title_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'subscribe_form_title',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_title',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'subscribe_title_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'subscribe_form_title',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_title',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'subscribe_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'subscribe_form_title',
        'default'  => 700,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_title',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'subscribe_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'subscribe_form_title',
        'default'  => 32,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_title',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//Description
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'subscribe_description_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'subscribe_form_description',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_description',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'subscribe_description_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'subscribe_form_description',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_description',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'subscribe_description_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'subscribe_form_description',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_description',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'subscribe_description_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'subscribe_form_description',
        'default'  => 18,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_heading .gform_description',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//Form
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'subscribe_form_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'subscribe_form_form',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.subscribe .ginput_container input[type="text"]',
            'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'subscribe_form_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'subscribe_form_form',
        'default'  => 18,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.subscribe .ginput_container input[type="text"]',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

/*Submit*/
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'subscribe_submit_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'subscribe_form_submit',
        'default'  => 'Roboto',
        'priority' => 21,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_footer input[type="submit"]',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'subscribe_submit_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'subscribe_form_submit',
        'default'  => 16,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.subscribe .gform_footer input[type="submit"]',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );    
