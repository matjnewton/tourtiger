<?php
    $phone_number = get_option( 'options_phone_number' );    
?>
    
<?php if(function_exists('icl_object_id')): ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'language_switcher', 'menu_class' => 'lang-nav', 'container_class' => 'menu-languages-container', 'fallback_cb'    => false ) ); ?>
                        <?php endif; ?>
                        <?php 
                        $use_media = get_option( 'options_use_social_media_in_main_nav' );
                        $social_media = get_option( 'options_social_media' );
                        if($social_media && ($use_media == true)): ?>
                        <div class="social-media hidden-xs">
                        <ul class="genesis-nav-menu">
                           <?php include(locate_template('partials/social_media_gpm.php' )); ?> 
                        </ul>
                        </div>
                        <?php endif; ?>
<?php
$custom_phone_html = get_field( 'custom_phone_html', 'option' );

if ( $phone_number && ! $custom_phone_html ) :
  $phone = preg_replace('/\D+/', '', $phone_number); 
  ?>

  <div class="phone hidden-xs">
    <i class="fa fa-phone"></i>
    <a href="tel:<?php echo $phone; ?>">             
      <?php echo $phone_number; ?>
    </a>
  </div>

  <?php 
elseif ( $custom_phone_html ) :
  ?>

  <div class="phone hidden-xs" style="color:white;">
    <?=$custom_phone_html;?>
  </div>

  <?php
endif; 
?>