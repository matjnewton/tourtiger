<div class="hidden-xs hidden-sm container">
            <div class="row">
            <?php
            $use_logo = get_option( 'options_use_logo_image' );
            if($use_logo == true): ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="logo text-center">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php
                                $logo_image = get_option( 'options_logo_image' );
                                $logo_url = wp_get_attachment_url( $logo_image,'full');
                                $logo = aq_resize( $logo_url, 362, 64, false );
                                ?>
                            <?php if($logo_url): ?>
                            <img class="img-responsive" src="<?=$logo_url?>" alt="<?=$logo?>" />
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
                <nav class="above-menu text-center <?php if($use_logo == true): echo 'col-sm-12 col-md-12 col-lg-12 use-logo'; else: echo 'col-sm-12 col-md-12 col-lg-12'; endif; ?>">
                    <div class="main-nav-wrapper<?php if($all_caps == true): ?> all-caps<?php endif; ?>" style="display:inline-block;">

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
        </div>
