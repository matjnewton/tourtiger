<div class="flxslider-wrapper">
    <?php 
    $images = get_sub_field('pc_hero_slides');    
    if( $images ) : ?>
        <div id="slider">
            <ul class="slides">

                <?php 
                foreach( $images as $slider_image ):
                    $simage = aq_resize( $slider_image['url'], 1920, $hero_height_n, true );?>

                    <li style="
                        background-image: url(<?php echo $simage; ?>); 
                        background-repeat: no-repeat; 
                        background-size: cover; 
                        background-position: center center; 
                        width: 100%;
                        height: <?=$hero_height_n;?>px; ">                      

                        <?php include ( get_stylesheet_directory() . '/includes/primary-content/head/temp/pc-elements.php' ); ?>

                    </li>

                <?php endforeach; ?>

            </ul>
        </div>
    <?php endif; ?> 
</div>