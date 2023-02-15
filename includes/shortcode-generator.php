<?php


function generate_random_only_letters_string($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) :
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    endfor;

    return $randomString;
}

function image_shortcode( $atts ) {
    $atts = shortcode_atts([
        'id' => 0,
        'width' => 0,
        'height' => 0,
        'size' => 'cover',
    ], $atts);


    if ($atts['id']) :
        $image = wp_get_attachment_image_src($atts['id'], '350-size');

        if ( $image && is_array($image)) :
            $id = generate_random_only_letters_string();

            if ( $atts['width'] && $atts['height'] ) :
                $attrs = 'style="width: '.$atts['width'].'px; height: '.$atts['height'].'px;"';
            elseif ( $image[2] && $image[1]) :
                $attrs = 'style="width: '.$image[2].'px; height: '.$image[1].'px;"';
            else :
                $attrs = '';
            endif;

            ob_start();

            if ( strpos($image[0], '.svg') && !$attrs ) : // TODO: check
                $path = get_attached_file($atts['id']);

                if ( file_exists($path) ) :
                    $content = file_get_contents($path);
                    ?>
                        <div class="image--shortcode">
                            <div class="image--shortcode-background svg-image"><?=$content?></div>
                        </div>
                    <?php
                endif;

            else :
                ?>
                <style>.image--shortcode-background.<?=$id?> {background: url("<?=$image[0]?>") no-repeat center center;
                        background-size:<?php echo $atts['size'];?>;
                        margin: auto;
                    }</style>
                <div class="image--shortcode">
                    <div class="image--shortcode-background <?=$id?>" <?php echo $attrs; ?>></div>
                </div>
                <?php
            endif;
            return ob_get_clean();
        endif;
    endif;

    return '';
}
add_shortcode('image', 'image_shortcode');


/**
 * Hours table shortcode
 */
add_shortcode( 'flybook-embeddable-button', 'shortcode_flybook_embeddable_button' );
function shortcode_flybook_embeddable_button( $attrs ) {
    $attrs = shortcode_atts( array(
        'account' => '',
        'target' => ''
    ), $attrs );

    return "<div id='FlybookButton{$attrs['target']}-{$attrs['account']}-tickets' data-flybook-embeddable-button='{$attrs['target']}' data-flybook-account='{$attrs['account']}'>";
}



/**
 * Booking hound api button
 */
add_shortcode( 'booking-hound-button', 'booking_hound_button' );
function booking_hound_button( $attrs ) {
    $attrs = shortcode_atts( array(
        'label'     => 'BOOK NOW',
        'api-hash'  => get_field('booking_hound_hash', 'apikey'), // e.g. 90520c81-fb74-4cba-9abd-475413eff10a
        'item-code' => '', // tngbh-script-1710134223
        'id'        => 0,  // 1
        'class'     => ''  // 'class1 class2 class3'
    ), $attrs );

    if ( $attrs['api-hash'] && $attrs['item-code'] ) :
        wp_enqueue_script('booking_hound_api');
        return "<div bt='{$attrs['label']}' data-classes='{$attrs['class']}' og='{$attrs['api-hash']}' fs='https://booking.bookinghound.com/rezfe/' id='{$attrs['item-code']}' uniqueId='{$attrs['id']}' mode='ap'></div>";
    else :
        return "<!-- Booking hound API code ain't work. API Hash: {$attrs['api-hash']}; Item code: {$attrs['item-code']}; Id: {$attrs['id']}. -->";
    endif;
}

function a_func($atts, $content = null) {
    shortcode_atts(array('href'=>'','text'=>''),$atts);
    return '<a href="'.$atts['href'].'">'.$atts['text'].'</a>';
}
add_shortcode('a', 'a_func');

function b_func($atts, $content = null) {
    shortcode_atts(array('text'=>''),$atts);
    return '<strong>'.$atts['text'].'</strong>';
}
add_shortcode('b', 'b_func');

//Google Maps Shortcode
function do_googleMaps($atts, $content = null) {
    extract(shortcode_atts(array(
        "width" => '600',
        "height" => '450',
        "src" => ''
    ), $atts));
    $width = $atts['width'] ?? '';
    $height = $atts['height'] ?? '';
    $src = $atts['src'] ?? '';
    return '<div class="video-responsive"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" src="'.$src.'" style="border:0" allowfullscreen></iframe></div>';
}
add_shortcode("googlemap", "do_googleMaps");


function tourismtiger_year_shortcode() {
    return date('Y');
}
add_shortcode('year', 'tourismtiger_year_shortcode');
