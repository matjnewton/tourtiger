<?php $logo_covers_both_menus = get_field('logo_covers_both_menus', 'option'); ?>
            <div class="row">
                <?php if(!$logo_covers_both_menus): ?>
                <?php include(locate_template('menus/logo.php' )); ?>
                <?php endif; ?>    
                <nav class="regular-type <?php if(($use_logo == true) && !($logo_covers_both_menus)): echo 'col-sm-10 col-md-9 col-lg-9 use-logo'; else: echo 'col-sm-12 col-md-12 col-lg-12'; endif; ?>">
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
                                   <?php if($icon == 'wechat'): ?>
                                   <i class="fa fa-weixin fa-lg"></i>
                                   <?php endif; ?>
                                 <?php if($icon == 'yelp'): ?>
                                   <i class="fa fa-yelp fa-lg"></i>
                                 <?php endif; ?>
                                 <?php if($icon == 'tripadvisor'): ?>
                                   <i class="fa fa-tripadvisor fa-lg"></i>
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
            