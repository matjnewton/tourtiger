<?php
$hero_headline_dropshadow = get_field('hero_headline_dropshadow', 'option');
$hero_content_dropshadow = get_field('hero_content_dropshadow', 'option');
?>
<?php
if( have_rows('hero_area') ):
    while ( have_rows('hero_area') ) : the_row();
        if( get_row_layout() == 'hero'):

        /*$image = get_sub_field('image');
        $gradient = get_sub_field('gradient');
        $background_type = get_sub_field('background_type');*/
        $headline = get_sub_field('headline');
        $content_editor = get_sub_field('content_editor');
        $cta_button_text = get_sub_field('cta_button_text');
        $cta_onclick = get_sub_field('cta_onclick');
        $button_type = get_sub_field('button_link_type');

        $book_tours = get_sub_field('book_tours_link');
        $cta_button_radius = get_sub_field('cta_button_radius');
        $text_align = get_sub_field('text_align');

        $third_party = get_sub_field('third_party');
        $mobd = get_sub_field('multi_option_button_dropdown');
        $video_button_link = get_sub_field('video_button_link');
        $transparent_background = get_field('transparent_background', 'option');
    ?>
     <section class="banner"<?php if($text_align == 'Center'): echo ' style="text-align:center;"'; endif;?>>
         <?php if($transparent_background == true): ?>
         <div class="shadow"></div>
         <?php endif; ?>
         <?php if( $button_type == 'Play Video'): ?>
         <a href="<?php if($video_button_link): echo $video_button_link; else: echo '#'; endif; ?>" class="video-play popup-video">
         <?php endif; ?>
        <div class="banner-top">

        <div class="flxslider-wrapper content-front_hero">
                        <?php $images = get_sub_field( 'image_type' ) === 'Slider images'
                            ? get_sub_field('hero_slides')
                            : ( get_sub_field( 'image_type' ) === 'Single image'
                                ? [get_sub_field('hero_image')]
                                : ''
                            );
                        if( $images ): ?>
                             <div id="slider" class="flexslider">
                                <ul class="slides">
                                    <?php foreach( $images as $slider_image ):
                                        $simage = aq_resize( $slider_image['url'], 1440, 545, true ) ?: $slider_image['url'];

                                        ?>
                                        <li style="background-image:url(<?php echo $simage; ?>); background-repeat:no-repeat; background-size:cover; background-position:center center; width:100%; height:539px;">
                                        <div class="tint"></div>
                                        <div class="container">
                                            <div class="row">
                                            <div class="col-sm-12">
                                            <img class="img-responsive center-block" src="<?php bloginfo('stylesheet_directory'); ?>/images/blank_full.png" />
                                            </div>
                                            </div>
                                        </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                             </div>
                                <?php endif; ?>

                    <div class="overlay-slider">
                    <div class="container">
            <div class="row">
                <div class="col-sm-12 overlay-slider-content">
                <div class="hero-elements-wrapper">
                    <?php if($headline): ?>
                    <h1 class="desktop-headline hidden-xs headline<?php if($hero_headline_dropshadow == 'Light'): echo ' light'; elseif($hero_headline_dropshadow == 'Medium'): echo ' medium-shadow'; elseif($hero_headline_dropshadow == 'Strong'): echo ' strong'; elseif($hero_headline_dropshadow == 'Extra Strong'): echo ' extra-strong'; elseif(!$transparent_background): echo ' none'; endif;?>">
                        <span><?php echo $headline; ?></span>
                    </h1>
                    <h2 class="mobile-headline visible-xs headline<?php if($hero_headline_dropshadow == 'Light'): echo ' light'; elseif($hero_headline_dropshadow == 'Medium'): echo ' medium-shadow'; elseif($hero_headline_dropshadow == 'Strong'): echo ' strong'; elseif($hero_headline_dropshadow == 'Extra Strong'): echo ' extra-strong'; elseif(!$transparent_background): echo ' none'; endif;?>">
                        <span><?php echo $headline; ?></span>
                    </h2>
                    <?php endif; ?>
                    <?php if($content_editor): ?>
                    <div class="hidden-xs c-editor subheadline<?php if($hero_content_dropshadow == 'Light'): echo ' light'; elseif($hero_headline_dropshadow == 'Medium'): echo ' medium-shadow'; elseif($hero_headline_dropshadow == 'Strong'): echo ' strong'; elseif($hero_headline_dropshadow == 'Extra Strong'): echo ' extra-strong'; elseif(!$transparent_background): echo ' none'; endif;?>">
                        <?php echo $content_editor; ?>
                    </div>
                    <?php endif; ?>

                    <?php if( $button_type == 'Play Video'): ?>
                        <img class="play-icon" src="<?php bloginfo('stylesheet_directory');?>/images/554cc0ad2cb6bf677667cea7_play.png" />
                    <?php else: ?>
                        <?php if($cta_button_text && !$mobd): ?>
                            <?php include(locate_template('buttons/hero_cta.php' )); ?>
                        <?php elseif($cta_button_text && $mobd): ?>
                            <?php include(locate_template('buttons/hero_mobd.php' )); ?>
                        <?php endif; ?><!-- end of button-->
                    <?php endif; /*end of Video/others condition*/?>


                </div><!-- end of hero-elements-wrapper-->
                    </div>
                    </div>
            </div>
        </div><br clear="both" />
                    </div><!-- end of flxslider-wrapper position context-->

        </div>


    <?php if( $button_type == 'Play Video'): ?>
         </a>
         <?php endif; ?>
    </section>



<?php
        endif;
    endwhile;
endif;

