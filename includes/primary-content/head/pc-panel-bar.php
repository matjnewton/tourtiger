<?php
    $sticky_menu = get_field('sticky_menu', 'option');
    $all_caps = get_field( 'all_caps_on_menu', 'option' );
?>
<div class="header-bar-wrapper <?php if ( $sticky_menu ) echo ' sticky';?>">

    <div class="header-bar">
        <?php if( get_field( 'include_secondary_menu', 'option' ) )
            include ( get_stylesheet_directory() . '/includes/primary-content/head/menus/pc-secondary-menu.php' );

        $menu_type = get_field( 'menu_type', 'option' );

        if( $menu_type == 'Regular' ):
            include ( get_stylesheet_directory() . '/includes/primary-content/head/menus/pc-regular-menu.php' );
        elseif ( $menu_type == 'Split by Logo in center' ) :
            include ( get_stylesheet_directory() . '/includes/primary-content/head/menus/pc-split-menu.php' );
        elseif ( $menu_type == 'Logo Centered & Above Menu' ) :
            include ( get_stylesheet_directory() . '/includes/primary-content/head/menus/pc-above-menu.php' );
        endif; ?>

        <div class="visible-xs visible-sm container">
            <nav class="navbar navbar-default nav-panel" role="navigation">
                <div class="navbar-header">
    				<div class="row">
        				<div class="col-xs-9" style="text-align:left;">
                            <a
                                class="navbar-brand"
                                id="brand-name"
                                href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php
                                $logo_url = wp_get_attachment_url( get_field( 'logo_image', 'option' ), 'full' );
                                $logo = aq_resize( $logo_url, 362, 64, false );

                                if ( $logo_url ) : ?>
                                    <div class="logo-container" style="background-image: url(<?=$logo_url?>);"></div>
                                <?php endif; ?>
                            </a>

        				</div>

        				<div class="col-xs-3">
                            <button
                                type="button"
                                class="navbar-toggle"
                                data-toggle="collapse"
                                data-target="#navbar-ex1-collapse">

            					<span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
            				</button>
        				</div>
    				</div>
                </div>

        		<div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'mobile',
                        'menu_class' => 'nav navbar-nav mobile-nav',
                        'fallback_cb'    => false
                    ) ); ?>
        		</div>
            </nav>
        </div>
    </div>
</div>
