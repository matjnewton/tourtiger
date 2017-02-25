<?php
    $phone_number = get_field('phone_number','option');    
?>
    
<?php if(function_exists('icl_object_id')): ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'language_switcher', 'menu_class' => 'lang-nav', 'container_class' => 'menu-languages-container', 'fallback_cb'    => false ) ); ?>
                        <?php endif; ?>
                        <?php 
                        $use_media = get_field('use_social_media_in_main_nav', 'option');
                        if(get_field('social_media', 'option') && ($use_media == true)): ?>
                        <div class="social-media hidden-xs">
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
                        <?php if($phone_number): ?>
        <?php $phone = preg_replace('/\D+/', '', $phone_number); ?>
                            <div class="phone hidden-xs">
                                <i class="fa fa-phone"></i>
                                <a href="tel:<?php echo $phone; ?>">
                                
                                <?php echo $phone_number; ?>
                                </a>
                            </div>
        <?php endif; ?>