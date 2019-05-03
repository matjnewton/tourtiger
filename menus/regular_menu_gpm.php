<?php
echo "<!-- here it is -->";

$menu_template_name = get_field('header')[0]['header-id']->post_name;
$menu_template_id = get_field('header')[0]['header-id']->ID;
$menu_template = get_field('header')[0]['header-id'];

$menu_template_parts = get_field('menu_template', $menu_template_id);

$acf_fc_layout = $menu_template_parts['header_layout'][0]['acf_fc_layout'];
$logotype = $menu_template_parts['header_layout'][0]['logotype'];
$menu_name = $menu_template_parts['header_layout'][0]['menu_name'];

$menu_obj = wp_get_nav_menu_object($menu_name);

  if (false && $menu_template) :

print_r_html([get_registered_nav_menus(),$menu_name, $menu_obj, $menu_template_parts]);
exit;

 else :

?>

<?php

$logo_covers_both_menus = get_option( 'options_logo_covers_both_menus' );
?>
<div class="row">
    <!-- menus/regular_menu_gmp -->
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

      <?php
        $args  = array( 'theme_location' => 'primary', 'menu_class' => 'menu genesis-nav-menu main-nav', 'container_class' => 'menu-main-nav-container', 'fallback_cb'    => false, 'walker'  => new Wpse8170_Menu_Walker() );

       if ($menu_name) $args['menu'] = $menu_obj;

      ?>
      <?php wp_nav_menu( $args ); ?>

      <?php if (current_user_can('edit_posts')) wp_nav_menu(['menu' => 'Languages', 'fallback_cb' => '__return_empty_string']); ?>

    </div>
  </nav>
</div>

<?php endif;
