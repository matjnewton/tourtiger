<?php
    $phone_number = get_field( 'phone_number','option' );
    $motto = get_field( 'motto', 'option' );    
?>

<div class="secondary-menu-wrapper">
    <div class="hidden-xs container">
        <div class="row">
            <div class="col-sm-6">
                <div class="above-split-bar">
                    <span class="motto">
                        <?php if ( $motto ) echo $motto; ?>
                    </span>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="above-split-bar">        
                    <?php 
                    if ( function_exists( 'icl_object_id' ) ) :
                        wp_nav_menu( array( 
                            'theme_location' => 'language_switcher', 
                            'menu_class' => 'lang-nav', 
                            'container_class' => 'menu-languages-container', 
                            'fallback_cb' => false 
                        ) ); 
                    endif;

                    $use_media = get_field( 'use_social_media_in_main_nav', 'option' );
                    
                    if ( get_field( 'social_media', 'option' ) && ( $use_media == true ) ) : ?>

                        <div class="social-media">
                            <ul class="genesis-nav-menu">
                                <?php while ( has_sub_field( 'social_media', 'option' ) ) : ?>
                                    <li>
                                        <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                            <?php if ( get_sub_field('social_icon') == 'instagram' ) :
                                                echo '<i class="fa fa-instagram fa-lg"></i>';
                                            elseif (get_sub_field('social_icon') == 'wechat') :
                                                echo '<i class="fa fa-weixin fa-lg"></i>';
                                            elseif (get_sub_field('social_icon') == 'yelp') :
                                                echo '<i class="fa fa-yelp fa-lg"></i>';
                                            elseif (get_sub_field('social_icon') == 'tripadvisor') :
                                                echo '<i class="fa fa-tripadvisor fa-lg"></i>';
                                            else :
                                                echo '<i class="fa fa-' . get_sub_field('social_icon') . '-square fa-lg"></i>';
                                            endif; ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?> 
                            </ul>
                        </div>
                    <?php endif;

                    if( $phone_number ) :
                        $phone = preg_replace('/\D+/', '', $phone_number); ?>

                        <div class="phone">
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?php echo $phone; ?>">
                                <?php echo $phone_number; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>