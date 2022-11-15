<?php

global $post;

$post_fields = get_fields($post);
$post_meta = get_post_meta($post->ID);
$spritesheets_settings = get_field( 'spritesheets', 'option' );
$json_post_fields = json_encode($post_fields);
$position = strpos('tour_primary-content', $json_post_fields);
$keys = array_keys( $post_meta );
$found_key[] = "Found Keys";
$has_spritesheet = 0;

foreach ($keys as $key) :
    if(strpos( $key, 'tour_pc-coltype--use_spritesheet')) $found_key[] = $key;
endforeach;

foreach ($found_key as $key) :
    if(is_array($key) && count($key) && $key[0]!=="_" && !empty($post_meta[$key][0]) && $post_meta[$key][0] == 1) {
        $has_spritesheet = 1;
        break;
    }
endforeach;

if($has_spritesheet && $spritesheets_settings) :
    $spritesheet = $spritesheets_settings[0]['add_spritesheet'];
    $spritesheet_image = $spritesheet['spritesheet_image'];
    $spritesheet_image_id = $spritesheet['spritesheet_unique_id'];
    $spritesheet_stylesheet = $spritesheet['spritesheet_stylesheet'];

    $spritesheet_stylesheet = str_replace('url(spritesheet.png)', 'url("'.$spritesheet_image.'"); margin-left: auto;
    margin-right: auto;', $spritesheet_stylesheet);
    $spritesheet_stylesheet = str_replace('.sprite', '.sprite-'.$spritesheet_image_id, $spritesheet_stylesheet);

    ?>
    <style>
        <?php echo $spritesheet_stylesheet;?>
    </style>
<?php

endif;
