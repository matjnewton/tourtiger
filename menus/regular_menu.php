<div class="hidden-xs hidden-sm container">
            <div class="row">
            <?php 
            $use_logo = get_field('use_logo_image', 'option');
            if($use_logo == true): ?>
                <div class="col-sm-2 col-md-3 col-lg-3">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php 
                                $logo_url = wp_get_attachment_url( get_field('logo_image', 'option'),'full');
                                $logo = aq_resize( $logo_url, 362, 64, false );
                                ?>
                            <?php if($logo_url): ?>
                            <div class="logo-container" style="background-image: url(<?=$logo_url?>);"></div>
                            <!--<img src="<?=$logo_url?>" alt="<?=$logo?>" />-->
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>    
                <nav class="regular-type <?php if($use_logo == true): echo 'col-sm-10 col-md-9 col-lg-9 use-logo'; else: echo 'col-sm-12 col-md-12 col-lg-12'; endif; ?>">
                    <div class="main-nav-wrapper<?php if($all_caps == true): ?> all-caps<?php endif; ?>">
                        
                        <?php if($secondary_menu != true): ?>
                        <?php if(function_exists('icl_object_id')): ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'language_switcher', 'menu_class' => 'lang-nav', 'container_class' => 'menu-languages-container', 'fallback_cb'    => false ) ); ?>
                        <?php endif; ?>
                        <?php 
                        $use_media = get_field('use_social_media_in_main_nav', 'option');
                        if(get_field('social_media', 'option') && ($use_media == true)): ?>
                        <div class="social-media">
                        <ul class="genesis-nav-menu">
                           <?php while(has_sub_field('social_media', 'option')): ?>
                           <li>
                               <a href="<?php the_sub_field('link'); ?>" target="_blank">
                               <?php $icon = get_sub_field('social_icon'); ?>
                                    <?php if($icon == 'facebook'): ?>
                                   <i class="fa fa-facebook-square fa-lg"></i>
                                   <?php endif; ?>
                                   <?php if($icon == 'pinterest'): ?>
                                   <i class="fa fa-pinterest-square fa-lg"></i>
                                   <?php endif; ?>
                                   <?php if($icon == 'twitter'): ?>
                                   <i class="fa fa-twitter-square fa-lg"></i>
                                   <?php endif; ?>
                                   <?php if($icon == 'youtube'): ?>
                                   <i class="fa fa-youtube-square fa-lg"></i>
                                   <?php endif; ?>
                                   <?php if($icon == 'instagram'): ?>
                                   <i class="fa fa-instagram fa-lg"></i>
                                   <?php endif; ?>
                                   <?php if($icon == 'linkedin'): ?>
                                   <i class="fa fa-linkedin-square fa-lg"></i>
                                   <?php endif; ?>
                                   <?php if($icon == 'google-plus'): ?>
                                   <i class="fa fa-google-plus-square fa-lg"></i>
                                   <?php endif; ?>
                               </a>
                           </li>
                           <?php endwhile; ?> 
                        </ul>
                        </div>
                        <?php endif; ?>
                        <?php endif; //end if secondary_menu?>
                        
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu genesis-nav-menu main-nav', 'container_class' => 'menu-main-nav-container', 'fallback_cb'    => false, 'walker'  => new Wpse8170_Menu_Walker() ) ); ?>
                        
                        
                    </div>
                </nav>
            </div>
        </div>    