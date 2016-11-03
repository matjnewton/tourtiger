<?php
/**
 * above-header panel
 */
?>

    <div class="above-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="utilities-wrapper-container">
                    <div class="utilities-wrapper">
                        <div class="search-form-wrapper">    
                            <?php //get_search_form(); ?>
                            <form method="get" id="searchform" class="main-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    		<input type="text" class="field" dir="auto" name="s" id="s" value="Search" />
    		<button class="submit btn btn-search glyphicon glyphicon-search" id="searchsubmit"></button>
                            </form>
                        </div>
                        <?php if(get_field('social_media', 'option')): ?>
                        <ul class="social-wrapper">
                           <?php while(has_sub_field('social_media', 'option')): ?>
                           <li>
                               <a href="<?php the_sub_field('link'); ?>">
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
                                   <?php if($icon == 'google-plus'): ?>
                                   <i class="fa fa-google-plus-square fa-lg"></i>
                                   <?php endif; ?>
                               </a>
                           </li>
                           <?php endwhile; ?> 
                        </ul>
                        <?php endif; ?>
                    </div>
                    </div><!-- utilities-wrapper-container-->
                </div>
            </div>
        </div>
    </div>