<?php

//Title
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'gravity_title_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'gravity_form_title',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_title',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'gravity_title_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'gravity_form_title',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_title',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_title_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'gravity_form_title',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_title',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_title_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'gravity_form_title',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_title',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
//Description
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'gravity_description_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'gravity_form_description',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_description',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'gravity_description_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'gravity_form_description',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_description',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_description_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'gravity_form_description',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_description',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_description_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'gravity_form_description',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.gform_heading .gform_description',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );

//Label
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'gravity_label_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'gravity_form_label',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.gform_fields label',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'gravity_label_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'gravity_form_label',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.gform_fields label',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_label_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'gravity_form_label',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.gform_fields label',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_label_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'gravity_form_label',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.gform_fields label',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
/*  Input */
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'gravity_form_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'gravity_form_form',
        'default'     => array(
            'color'    => '#f3f5f6'
        ),
        'priority'    => 10,
        'output' => '.ginput_container input[type="text"], .ginput_container textarea, .btn.dropdown-toggle',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'gravity_form_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'gravity_form_form',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.ginput_container input[type="text"], .ginput_container textarea, .btn.dropdown-toggle',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'gravity_form_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'gravity_form_form',
        'default'  => 'Roboto',
        'priority' => 21,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.ginput_container input[type="text"], .ginput_container textarea, .btn.dropdown-toggle',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_form_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'gravity_form_form',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.ginput_container input[type="text"], .ginput_container textarea, .btn.dropdown-toggle',
            'property' => 'font-weight',
            'units' => ' !important'
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_form_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'gravity_form_form',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.ginput_container input[type="text"], .ginput_container textarea, .btn.dropdown-toggle',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
/* Focus */
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'gravity_form_focus_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'gravity_form_focus',
        'default'     => array(
            'color'    => '#e8eaeb'
        ),
        'priority'    => 10,
        'output' => '.ginput_container input[type="text"]:focus, .ginput_container textarea:focus, .btn.dropdown-toggle:active',
    );

/*  Submit */
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'gravity_submit_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'gravity_form_submit',
        'default'     => array(
            'color'    => '#c1272d'
        ),
        'priority'    => 10,
        'output' => '.gform_footer input[type="submit"]',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'gravity_submit_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'gravity_form_submit',
        'default'     => '#fff',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.gform_footer input[type="submit"]',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'gravity_submit_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'gravity_form_submit',
        'default'  => 'Roboto',
        'priority' => 21,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.gform_footer input[type="submit"]',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_submit_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'gravity_form_submit',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.gform_footer input[type="submit"]',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'gravity_submit_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'gravity_form_submit',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.gform_footer input[type="submit"]',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    