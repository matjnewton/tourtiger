<?php

/*Content Area Background*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'content_area_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'content_area',
        'default'     => array(
            'color'    => '#ffffff',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.site-inner .content',
    );

/*Content Containers Background*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'content_containers_bg',
        'description' => __( 'Background Color', 'tourtiger' ),
        'section'     => 'content_containers',
        'default'     => array(
            'color'    => '#ffffff',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.testimonials .container, .reasons .container, .single-tour .left-col, .page-template-default .left-col, .page-template-page-templatestestimonials-php .left-col, .page-template-page-templatestours-php .left-col, .blog-left-col, .faq-page-content .container, .team-members .container, .single-tour .right-col>div, .page-template-default .right-col>div, .page-template-page-templatestestimonials-php .right-col>div, .page-template-page-templatestours-php .right-col>div, .single-tour .right-col .testimonials, .page-template-default .right-col .testimonials, .blog-right-col>div',
    );
    
/* Paragraph */
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'content_paragraph_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'content_paragraph',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.site-inner .content p',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'content_paragraph_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'content_paragraph',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.site-inner .content p, .site-inner .content p a, .widget-item p, .widget-item a',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'content_paragraph_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'content_paragraph',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.site-inner .content p, .site-inner .content p a, .widget-item p, .widget-item a',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'content_paragraph_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'content_paragraph',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.site-inner .content p, .site-inner .content p a, .widget-item p, .widget-item a',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
/* Links set for content.*/
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'content_link_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'content_link',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.site-inner .content a:link, .site-inner .content a:active, .site-inner .content a:visited, .widget-item a:link, .widget-item a:active, .widget-item a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'content_link_hover_color',
        'label'       => __( 'Hover Color', 'tourtiger' ),
        'section'     => 'content_link',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.site-inner .content a:hover, .widget-item a:hover',
            'property' => 'color',
            ),
        ),
    );

/* Lists */
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'content_list_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'content_list',
        'default'     => '#000',
        'priority'    => 10,
        'output' => array(
            array(
            'element'  => '.content li, .content li p, .c-editor li, .c-editor li h3, .c-editor li h4, .c-editor li h5, .c-editor li h6',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'bullet_background',
        'description' => __( 'Bullet Background Color', 'tourtiger' ),
        'section'     => 'content_list',
        'default'     => array(
            'color'    => '#0c324f'
        ),
        'priority'    => 11,
        'output' => '.content .td-list span',
    );
    
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'bullet_icon_color',
        'label'       => __( 'Bullet icon Color', 'tourtiger' ),
        'section'     => 'content_list',
        'default'     => '#000',
        'priority'    => 12,
        'output' => array(
            array(
            'element'  => '.content .td-list i',
            'property' => 'color',
            ),
        ),
    );

    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'content_list_font_family',
        'label'    => __( 'Font Family', 'tourtiger' ),
        'section'  => 'content_list',
        'default'  => 'Roboto',
        'priority' => 20,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.entry-content li, .entry-content li p, .widget-item li, .c-editor li, .c-editor li h3, .c-editor li h4, .c-editor li h5, .c-editor li h6',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'content_list_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'content_list',
        'default'  => 300,
        'priority' => 24,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.entry-content li, .entry-content li p, .widget-item li, .c-editor li, .c-editor li h3, .c-editor li h4, .c-editor li h5, .c-editor li h6',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'content_list_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'content_list',
        'default'  => 14,
        'priority' => 25,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.entry-content li, .entry-content li p, .widget-item li, .c-editor li, .c-editor li h3, .c-editor li h4, .c-editor li h5, .c-editor li h6',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );
    
/*headlines*/
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'content_heading3_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'content_heading3',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.reasons h3',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'content_heading3_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'content_heading3',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.reasons h3',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'content_heading3_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'content_heading3',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.reasons h3',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'content_heading3_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'content_heading3',
        'default'  => 18,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.reasons h3',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );    
    
/*Blog Headline*/
    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'blog_heading3_color',
        'label'       => __( 'Color', 'tourtiger' ),
        'section'     => 'blog_heading3',
        'default'     => '#000',
        'priority'    => 20,
        'output' => array(
            array(
            'element'  => '.blog-left-col h3.entry-title a:link, .blog-left-col h3.entry-title a:hover, .blog-left-col h3.entry-title a:active, .blog-left-col h3.entry-title a:visited',
            'property' => 'color',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'select',
        'setting'  => 'blog_heading3_font_family',
        'label'    => __( 'Select a Font', 'tourtiger' ),
        'section'  => 'blog_heading3',
        'default'  => 'Roboto',
        'priority' => 22,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
            array(
            'element'  => '.blog-left-col h3.entry-title',
            'property' => 'font-family',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'blog_heading3_font_weight',
        'label'    => __( 'Font Weight', 'tourtiger' ),
        'section'  => 'blog_heading3',
        'default'  => 300,
        'priority' => 23,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            array(
            'element'  => '.blog-left-col h3.entry-title',
            'property' => 'font-weight',
            ),
        ),
    );
    
    $fields[] = array(
        'type'     => 'slider',
        'setting'  => 'blog_heading3_font_size',
        'label'    => __( 'Font Size', 'tourtiger' ),
        'section'  => 'blog_heading3',
        'default'  => 18,
        'priority' => 24,
        'choices'  => array(
            'min'  => 7,
            'max'  => 48,
            'step' => 1,
        ),
        'output' => array(
            array(
            'element'  => '.blog-left-col h3.entry-title',
            'property' => 'font-size',
            'units'    => 'px',
            ),
        ),
    );


    