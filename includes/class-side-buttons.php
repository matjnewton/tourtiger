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

        $existing_buttons = [];
        $custom_buttons = [];

        foreach ( $side_buttons as $button ) :

            $svg = '';
            if ( !empty($button['button']['button__icon']) )
                $svg = self::get_button_icon_svg( $button['button']['button__icon'] );

            if ( $button['button']['button_type'] === 'existing' && !empty($button['button']['existing_button']) ) :
                $existing_buttons[] = [
                    'link-to'=>$button['button']['existing_button'],
                    'text'=>$button['button']['existing_button__text'],
                    'display-on'=>$button['button']['display-on'],
                    'icon'=> $svg
                ];
            elseif ( $button['button']['button_type'] === 'custom-link' && !empty($button['button']['custom_link']) ) :
                $button['button']['custom_link']['icon'] = $svg;
                $button['button']['custom_link']['display-on'] = $button['button']['display-on'];

                $custom_buttons[] = $button['button']['custom_link'];
            endif;

        endforeach;

        if ( count( $existing_buttons ) )
            self::add_existing_buttons( $existing_buttons );

        if ( count($custom_buttons) )
            self::add_custom_buttons( $custom_buttons );
    }


    private static function add_custom_buttons( $custom_buttons ){

        echo "<div class='side-buttons-wrapper'>";

        foreach ( $custom_buttons as $button ) :

            if ( $button['display-on'] === 'all-pages'
                || $button['display-on'] === 'tour-pages' && ( get_post_type() === 'product' || get_post_type() === 'tour' )
            ) :

            $icon = $button['icon'];
            $link = $button['url'];
            $text = $button['title'];
            $target = $button['target'] === '_blank' ? 'target="_blank"' : '';

            ?>
                <div class="featured-tours">
                    <div class="view-tour-btn">
                        <a href="<?=$link?>" class="link" <?=$target?>><?=$icon?><?=$text?></a>
                    </div>
                </div>
            <?php

            endif;
        endforeach;

        echo "</div>";

    }


    private static function add_existing_buttons( $existing_buttons ){
        echo "<div class='side-buttons-wrapper'></div>";

        self::add_side_buttons_script_data( $existing_buttons );

        $script_src = get_stylesheet_directory_uri() . '/js/side-buttons.js';

        echo "<script src='$script_src'></script>";
    }

    private static function get_button_icon_svg( $svg_id ){
        $file = get_attached_file( $svg_id );
        return file_get_contents( $file );
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
