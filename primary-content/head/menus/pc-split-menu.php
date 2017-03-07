<div class="hidden-xs hidden-sm container split-menu">
    <div class="row mnws <?php if ( $all_caps ) echo 'all-caps'; ?>">
                        
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_class' => 'menu genesis-nav-menu main-nav', 
			'fallback_cb'    => false, 
			'container_class' => 'col-sm-5 col-md-5 col-lg-5 left-menu-part main-nav-wrapper', 
			'walker'  => new split_nav_walker() 
		) );

		if( !$secondary_menu ) :
			if ( function_exists('icl_object_id') ) :
				wp_nav_menu( array( 
					'theme_location' => 'language_switcher', 
					'menu_class' => 'lang-nav', 
					'container_class' => 'menu-languages-container', 
					'fallback_cb' => false 
				) ); 
			endif;
		endif; ?>
		
    </div>    
</div>