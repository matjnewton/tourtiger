<?php  
if ( function_exists( 'icl_object_id' ) ) :
  wp_nav_menu( array ( 
    'theme_location'  => 'language_switcher', 
    'menu_class'      => 'lang-nav', 
    'container_class' => 'menu-languages-container', 
    'fallback_cb'     => false 
  )); 
endif; 

$use_media = get_field( 'use_social_media_in_main_nav', 'option' );

if ( get_field( 'social_media', 'option' ) && ( $use_media == true ) ) : 
  ?>
  
  <div class="social-media hidden-xs">
    <ul class="genesis-nav-menu">
      <?php 
      while ( has_sub_field( 'social_media', 'option' ) ) : 
        ?>

          <li>
            <a href="<?php the_sub_field('link'); ?>" target="_blank">
              <?php 
              $icon = get_sub_field('social_icon');
              switch ($icon) :
                case 'facebook':
                case 'pinterest':
                case 'twitter':
                case 'youtube':
                case 'linkedin':
                case 'google-plus':
                  echo "<i class='fa fa-{$icon}-square fa-lg'></i>";
                  break;

                case 'instagram':
                case 'yelp':
                case 'tripadvisor':
                  echo "<i class='fa fa-{$icon} fa-lg'></i>";
                  break;

                case 'wechat':
                  echo "<i class='fa fa-weixin fa-lg'></i>";
                  break;
              endswitch;
              ?>
            </a>
          </li>

        <?php 
      endwhile; 
      ?> 
    </ul>
  </div>

  <?php 
endif; 

$phone_number      = get_field('phone_number','option');  
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

  <div class="phone hidden-xs">
    <?=$custom_phone_html;?>
  </div>

  <?php
endif; 
?>