<div class="hidden-xs hidden-sm container">
    <div class="row">
        <?php $use_logo = get_field( 'use_logo_image', 'option' );
        if ( $use_logo ): ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="logo text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php 
                        $logo_url = wp_get_attachment_url( get_field('logo_image', 'option'),'full');
                        $logo = aq_resize( $logo_url, 362, 64, false );
                            
                        if( $logo_url ): ?>
                            <img class="img-responsive" src="<?=$logo_url?>" alt="<?=$logo?>" />
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>  

        <nav class="above-menu text-center col-sm-12 col-md-12 col-lg-12 <?php if ( $use_logo ) echo 'use-logo'; ?>">

            <div class="main-nav-wrapper<?php if( $all_caps ) echo 'all-caps'; ?>" style="display:inline-block;">
                        
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

                    if ( get_field( 'social_media', 'option' ) && ( get_field( 'use_social_media_in_main_nav', 'option' ) ) ) : ?>

                        <div class="social-media">
                            <ul class="genesis-nav-menu">
                               <?php while( has_sub_field( 'social_media', 'option' ) ) : ?>
                                   <li>
                                       <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                            <?php if ( get_sub_field('social_icon') == 'instagram' ) {
                                                echo '<i class="fa fa-instagram fa-lg"></i>';
                                            } else {
                                                echo '<i class="fa fa-' . get_sub_field('social_icon') . '-square fa-lg"></i>';
                                            } ?>
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
                    'fallback_cb'    => false, 
                    'walker'  => new Wpse8170_Menu_Walker() 
                ) ); ?>
                        
                        
            </div>
        </nav>
    </div>
</div>    