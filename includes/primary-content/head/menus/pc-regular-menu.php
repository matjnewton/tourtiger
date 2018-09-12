<div class="hidden-xs hidden-sm container">
    <div class="row">
        <?php 
        $use_logo = get_field( 'use_logo_image', 'option' );
        if( $use_logo ): ?>
            <div class="col-sm-2 col-md-3 col-lg-3">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php 
                        $logo_url = wp_get_attachment_url( get_field( 'logo_image', 'option' ), 'full' );
                        $logo = aq_resize( $logo_url, 362, 64, false );
                            
                        if( $logo_url ) : ?>
                            <div class="logo-container" style="background-image: url(<?=$logo_url?>);"></div>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>  

        <nav class="regular-type <?php if ( $use_logo ) echo 'col-sm-10 col-md-9 col-lg-9 use-logo'; ?>">
            <div class="main-nav-wrapper <?php if( $all_caps ) echo 'all-caps'; ?>">
                        
                <?php 
                if ( !$secondary_menu ) :
                    if ( function_exists( 'icl_object_id' ) ) :
                        wp_nav_menu( array( 
                            'theme_location' => 'language_switcher', 
                            'menu_class' => 'lang-nav', 
                            'container_class' => 'menu-languages-container', 
                            'fallback_cb'    => false 
                        ) );
                    endif;

                    $use_media = get_field('use_social_media_in_main_nav', 'option');

                    if ( get_field( 'social_media', 'option' ) && ( $use_media ) ) : ?>
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
                endif;

                wp_nav_menu( array( 
                    'theme_location' => 'primary', 
                    'menu_class' => 'menu genesis-nav-menu main-nav', 
                    'container_class' => 'menu-main-nav-container', 
                    'fallback_cb'    => false, 'walker'  => new Wpse8170_Menu_Walker() 
                ) ); ?>
                        
                        
            </div>
        </nav>
    </div>
</div>    