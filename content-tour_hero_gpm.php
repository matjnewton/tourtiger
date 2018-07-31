<?php
$hero_headline_dropshadow = get_option( 'options_hero_headline_dropshadow' );
$hero_content_dropshadow = get_option( 'options_hero_content_dropshadow' );
?>
<?php
$ha_rows = get_post_meta( get_the_ID(), 'hero_area', true );
if( $ha_rows ):
    foreach( (array) $ha_rows as $ha_count => $ha_row ):
            switch( $ha_row ):
                case 'hero':
                    $headline = esc_html( get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_headline', true ) );
                    $content_editor = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_content_editor', true );
                    $cta_button_text = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_cta_button_text', true );
                    $cta_onclick = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_cta_onclick', true );
                    $button_type = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_button_link_type', true );
                    $book_tours = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_book_tours_link', true );
                    $cta_button_radius = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_cta_button_radius', true );
                    $text_align = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_text_align', true );
                    $background_placement = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_background_position', true );
                    $third_party = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_third_party', true );
                    $mobd = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_multi_option_button_dropdown', true );
                    $video_button_link = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_video_button_link', true );
                    $transparent_background = get_option( 'options_transparent_background' );
    ?>
     <section class="banner"<?php if($text_align == 'Center'): echo ' style="text-align:center;"'; endif;?>>
        <?php if($transparent_background == true): ?>
         <div class="shadow"></div>
         <?php endif; ?>
        <?php if( $button_type == 'Play Video'): ?>
         <a href="<?php if($video_button_link): echo $video_button_link; else: echo '#'; endif; ?>" class="video-play popup-video">
         <?php endif; ?>
        <div class="banner-top">
        
                    
                    <div class="flxslider-wrapper">
                        <?php 
                            $images = get_post_meta( get_the_ID(), 'hero_area_' . $ha_count . '_hero_slides', true );    
                                ?>
                                <?php if( $images ): ?>
                             <div id="slider" class="flexslider">
                                <ul class="slides">
                                    <?php foreach( $images as $slider_image ): ?>
                            <?php 
                                $img_url = wp_get_attachment_url($slider_image);
                                //$simage = aq_resize( $slider_image['url'], 1440, 362, true );
                                if($background_placement=='Under Header'):
                                $simage = aq_resize( $img_url, 1440, 620, true );
                                else:
                                $simage = aq_resize( $img_url, 1440, 545, true );
                                endif;
                                //$img_url = $slider_image['url'];
                                
                            ?>
                                        <li style="background-image:url(<?php echo $simage; ?>); background-repeat:no-repeat; background-size:1440px auto; background-position:center center; width:100%; height:<?php if($background_placement=='Under Header'): ?>620<?php else: ?>539<?php endif; ?>px;">
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
                    <h1 class="mobile-headline visible-xs headline<?php if($hero_headline_dropshadow == 'Light'): echo ' light'; elseif($hero_headline_dropshadow == 'Medium'): echo ' medium-shadow'; elseif($hero_headline_dropshadow == 'Strong'): echo ' strong'; elseif($hero_headline_dropshadow == 'Extra Strong'): echo ' extra-strong'; elseif(!$transparent_background): echo ' none'; endif;?>">
                        <span><?php echo $headline; ?></span>
                    </h1>
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
                        <?php include(locate_template('buttons/hero_mobd_gpm.php' )); ?>
                    <?php endif; ?><!-- end of button-->
                    <?php endif; /*end of Video/others condition*/?>
                    
                </div><!-- end of hero-elements-wrapper-->
                    </div>
                    </div>
            </div>
        </div>
                    </div><!-- end of flxslider-wrapper position context-->
                
        </div>
        <?php if( $button_type == 'Play Video'): ?>
         </a>
         <?php endif; ?>
    </section>
<?php 
        
            
            break;
        endswitch;
    endforeach;
endif;
?>