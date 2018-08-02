<div class="container split-menu">
    <?php 
        $motto = get_field('motto', 'option'); 
        if($motto): 
            $left_secondary_menu = $motto; 
        else:
            $left_secondary_menu = '';
        endif;
    ?>
    <div class="row mnws<?php if($all_caps == true): ?> all-caps<?php endif; ?>">
<?php
$items_wrap = '<div class="col-sm-5 col-md-5 col-lg-5 left-menu-part main-nav-wrapper"><div class="hidden-xs hidden-sm"><div class="secondary-menu-wrapper"><div class="above-split-bar"><span class="motto">'.$left_secondary_menu.'</span></div></div></div>';
$items_wrap .= '<ul id="%1$s" class="%2$s hidden-xs hidden-sm">%3$s</ul>';
$items_wrap .= '</div>';
?>                        
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu genesis-nav-menu main-nav', 'fallback_cb'    => false,  'items_wrap' => $items_wrap, 'walker'  => new split_nav_walker() ) ); ?>
<?php if($secondary_menu != true): ?>
<?php if(function_exists('icl_object_id')): ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'language_switcher', 'menu_class' => 'lang-nav', 'container_class' => 'menu-languages-container', 'fallback_cb'    => false ) ); ?>
                        <?php endif; ?>
<?php endif; ?>
    </div>    
</div>