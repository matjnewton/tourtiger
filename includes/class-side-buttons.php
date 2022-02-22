<?php

namespace TT1;

class Side_Buttons
{
    public function __construct(){
        self::render_buttons();
    }

    public static function render_buttons(){

        $side_buttons = get_field( 'side_buttons', 'option');

        if ( !empty($side_buttons) && is_array($side_buttons) && count($side_buttons) )
            self::add_buttons_to_page( $side_buttons );
    }

    private static function add_buttons_to_page( $side_buttons ){

        self::add_styles_inline();

        echo "<div class='side-buttons-wrapper'></div>";

        $existing_buttons = [];

        foreach ( $side_buttons as $button ) :
            if ( $button['button']['button_type'] === 'existing' && !empty($button['button']['existing_button']) ) :
                $existing_buttons[] = [
                    'link-to'=>$button['button']['existing_button'],
                    'text'=>$button['button']['existing_button__text']
                ];
            endif;

        endforeach;

        if ( count( $existing_buttons ) ) :

            self::add_side_buttons_script_data( $existing_buttons );

            $script_src = get_stylesheet_directory_uri() . '/js/side-buttons.js';

            echo "<script src='$script_src'></script>";
        endif;
    }

    private static function add_side_buttons_script_data( $existing_buttons ) {
        $data = 'var side_buttons_data = ' . json_encode($existing_buttons);
        echo "<script type='text/javascript' id='side-buttons-data'>
        /* <![CDATA[ */ $data /* ]]> */
        </script>";
    }

    private static function add_styles_inline(){
        $content = file_get_contents( get_stylesheet_directory() . '/css/side-buttons.css' );

        echo "<style>$content</style>";
    }
}

new Side_Buttons();



/**
 * 1. Develop for book-now button
 *
 *
 */
