<?php 
    $logo_covers_both_menus = get_option( 'options_logo_covers_both_menus' );
?>
            <div class="row">
                <?php if(!$logo_covers_both_menus): ?>
                <?php include(locate_template('menus/logo_gpm.php' )); ?>
                <?php endif; ?>    
                <nav class="regular-type <?php if(($use_logo == true) && !($logo_covers_both_menus)): echo 'col-sm-10 col-md-9 col-lg-9 use-logo'; else: echo 'col-sm-12 col-md-12 col-lg-12'; endif; ?>">
                    <div class="main-nav-wrapper<?php if($all_caps == true): ?> all-caps<?php endif; ?>">
                        
                        <?php if($secondary_menu != true): ?>
                        <?php if(function_exists('icl_object_id')): ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'language_switcher', 'menu_class' => 'lang-nav', 'container_class' => 'menu-languages-container', 'fallback_cb'    => false ) ); ?>
                        <?php endif; ?>
                        <?php 
                        $use_media = get_option( 'options_use_social_media_in_main_nav' );
                        $social_media = get_option( 'options_social_media' );
                        if($social_media && ($use_media == true)): ?>
                        <div class="social-media">
                        <ul class="genesis-nav-menu">
                           <?php include(locate_template('partials/social_media_gpm.php' )); ?> 
                        </ul>
                        </div>
                        <?php endif; ?>
                        <?php endif; //end if secondary_menu?>
                        
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu genesis-nav-menu main-nav', 'container_class' => 'menu-main-nav-container', 'fallback_cb'    => false, 'walker'  => new Wpse8170_Menu_Walker() ) ); ?>
                        
                        
                    </div>
                </nav>
            </div>
            