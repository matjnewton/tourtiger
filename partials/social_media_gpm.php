<?php 
                               for( $sm = 0; $sm < $social_media; $sm++ ):
                                    $link = get_option( 'options_social_media_' . $sm . '_link' );
                                    $icon = get_option( 'options_social_media_' . $sm . '_social_icon' );
                            ?>
                           <li>
                               <a href="<?php echo $link; ?>" target="_blank">
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
                               </a>
                           </li>
                           <?php
                               endfor; 
                            ?>