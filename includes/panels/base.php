<?php

/*base wrapper background*/
    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'wrapper_bg',
        'description' => __( 'Background', 'tourtiger' ),
        'section'     => 'base_wrapper',
        'default'     => array(
            'color'    => '#ffffff',
            'opacity'  => 100
        ),
        'priority'    => 10,
        'output' => '.site-container',
    );