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
        $button_type = get_sub_field('button_link_type');

        $book_tours = get_sub_field('book_tours_link');
        $cta_button_radius = get_sub_field('cta_button_radius');
        $text_align = get_sub_field('text_align');
        $integrate_xola = get_field('integrate_xola_with_this_website','option');
        $integrate_peek = get_field('integrate_peek_with_this_website','option');
        $third_party = get_sub_field('third_party');
        $transparent_background = get_field('transparent_background', 'option');
    ?>
     <section class="banner"<?php if($text_align == 'Center'): echo ' style="text-align:center;"'; endif;?>>
        <?php if($transparent_background == true): ?>
         <div class="shadow"></div>
         <?php endif; ?>
        <div class="banner-top">


                    <div class="flxslider-wrapper content-default_hero">
                        <?php $images = get_sub_field( 'image_type' ) === 'Slider images'
                            ? get_sub_field('hero_slides')
                            : ( get_sub_field( 'image_type' ) === 'Single image'
                                ? [get_sub_field('hero_image')]
                                : ''
                            ) ?>
                        <?php if( $images && get_sub_field( 'image_type' ) === 'Slider images' ): ?>
                             <div id="slider" class="flexslider">
                                <ul class="slides">
                                    <?php foreach( $images as $slider_image ) :
                                     $simage = aq_resize( $slider_image['url'], 1440, 362, true ) ?: $slider_image['url'];
                                        ?>
                                        <li style="background-image:url(<?php echo $simage; ?>); background-repeat:no-repeat; background-size:1440px auto; background-position:center center; width:100%; height:362px;">
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
                    <?php if($cta_button_text): ?>
                    <div class="book-btn-wrapper">
                    <?php if($integrate_xola && ($button_type == 'Use as third party integration Link')): ?>
                                <div id="<?php if($book_tours): echo $book_tours; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                                    <?php echo $cta_button_text; ?>
                                </div>
                            <?php elseif($integrate_peek && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="http://www.peek.com/purchase/activity/widget/<?php if($book_tours): echo $book_tours; endif; ?>" class="peek-book-button-flat book-btn" data-purchase-type="activity" data-button-text="<?php echo $cta_button_text; ?>" data-activity-gid="<?php if($book_tours): echo $book_tours; endif; ?>"><?php echo $cta_button_text; ?></a>
                            <?php else: ?>
                        <a <?php if($button_type == 'Link to Featured tours'): ?>data-scroll-nav='110'<?php endif; ?> href="<?php if($button_type == 'Link to Featured tours'): echo '#'; else: echo $book_tours; endif; ?>" class="book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                            <?php echo $cta_button_text; ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div><!-- end of hero-elements-wrapper-->
                    </div>
                    </div>
            </div>
        </div>
                    </div><!-- end of flxslider-wrapper position context-->

        </div>
    </section>
<?php
        endif;
    endwhile;
endif;
?>
