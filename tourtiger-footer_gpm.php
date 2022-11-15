<?php
/**
 * footer
 */

global $sitepress_settings;
$sitepress_settings = get_option( 'icl_sitepress_settings' );
$adm_lng = $sitepress_settings['admin_default_language'] ?? 'en';

$footer_areas = defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE !== $adm_lng ? '  options_' . ICL_LANGUAGE_CODE . '_footer_areas' : 'options_footer_areas';
$options_address = defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE !== $adm_lng ? '  options_' . ICL_LANGUAGE_CODE . '_address' : 'options_address';
$options_phone_number = defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE !== $adm_lng ? '  options_' . ICL_LANGUAGE_CODE . '_phone_number' : 'options_phone_number';
$options_phone_html = defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE !== $adm_lng ? '  options_' . ICL_LANGUAGE_CODE . '_custom_phone_html' : 'options_custom_phone_html';
$options_use_phone_html = defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE !== $adm_lng ? '  options_' . ICL_LANGUAGE_CODE . '_custom_phone_html_in_footer' : 'options_custom_phone_html_in_footer';


if (get_field('advanced_footer', 'option')) :
  ?>

  <div class="advanced-footer">

    <?php
    while (have_rows('advanced_footer', 'option')) :
      the_row();

      $layout = get_row_layout();
      ?>

      <div class="advanced-footer--box layout_<?php echo $layout; ?>">
        <div class="advanced-footer--column">

          <?php
          while (have_rows('column-1')) :
            ?>

            <div class="advanced-footer--element">
              <?php get_advanced_footer_column_acf(); ?>
            </div>

          <?php
          endwhile;
          ?>

        </div>

        <div class="advanced-footer--column">

          <?php
          while (have_rows('column-2')) :
            ?>

            <div class="advanced-footer--element">
              <?php get_advanced_footer_column_acf(); ?>
            </div>

          <?php
          endwhile;
          ?>

        </div>

        <div class="advanced-footer--column">

          <?php
          while (have_rows('column-3')) :
            ?>

            <div class="advanced-footer--element">
              <?php get_advanced_footer_column_acf(); ?>
            </div>

          <?php
          endwhile;
          ?>

        </div>

        <div class="advanced-footer--column">

          <?php
          while (have_rows('column-4')) :
            ?>

            <div class="advanced-footer--element">
              <?php get_advanced_footer_column_acf(); ?>
            </div>

          <?php
          endwhile;
          ?>

        </div>

        <div class="advanced-footer--column">

          <?php
          while (have_rows('column-5')) :
            ?>

            <div class="advanced-footer--element">
              <?php get_advanced_footer_column_acf(); ?>
            </div>

          <?php
          endwhile;
          ?>

        </div>
      </div>

    <?php
    endwhile;
    ?>

  </div>

<?php
else :
  ?>

  <div class="container">
  <div class="row">
  <?php
  $isButtonUp = get_option('button_up', 'option');


  $i = isset($col) ? (int)$col : '';

  $address = get_option( $options_address );
  $phone_number = get_option( $options_phone_number );
  $use_phone_html = get_option( $options_use_phone_html );
  $phone_html = $use_phone_html ? get_option( $options_phone_html ) : '';


  $fa_rows = get_option( $footer_areas );

  if(in_array ('footer_links', $fa_rows) || in_array ('tours', $fa_rows) || in_array ('additional', $fa_rows)):
    foreach( (array) $fa_rows as $fa_count => $fa_row ):
      switch( $fa_row ):
        case 'tours':
          ?>
          <div class="col-sm-2">
            <?php
            $links_list = get_option( $footer_areas . '_' . $fa_count . '_links_list' );
            if($links_list):
              $i+=2;
              ?>
              <h4>
                Tours
              </h4>
              <ul>
                <?php
                for( $fi = 0; $fi < $links_list; $fi++ ):
                  $link = get_option( $footer_areas . '_' . $fa_count . '_links_list_' . $fi . '_link' );
                  $name = get_option( $footer_areas . '_' . $fa_count . '_links_list_' . $fi . '_text' );

                  ?>
                  <li>
                    <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
                  </li>
                <?php endfor; ?>
              </ul>
            <?php
            endif;
            ?>
          </div>
          <?php
          break;
        case 'footer_links':
          ?>
          <div class="col-sm-2">
            <?php
            $links_list = get_option( $footer_areas . '_' . $fa_count . '_links_list' );
            if($links_list):
              $i+=2;
              ?>
              <div class="footer-nav-wrapper">
                <ul>
                  <?php
                  for( $fi = 0; $fi < $links_list; $fi++ ):
                    $link = get_option( $footer_areas . '_' . $fa_count . '_links_list_' . $fi . '_link' );
                    $name = get_option( $footer_areas . '_' . $fa_count . '_links_list_' . $fi . '_text' );

                    ?>
                    <li>
                      <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
                    </li>
                  <?php endfor; ?>
                </ul>
              </div>
            <?php
            endif;
            ?>
          </div>
          <?php
          break;
        case 'additional':
          $content = get_option( $footer_areas . '_' . $fa_count . '_content' );
          $i+=4;
          ?>
          <div class="col-sm-4">
            <?php echo $content;  ?>
          </div>
          <?php
          break;
      endswitch;
    endforeach;
  endif;

    if($address || $phone_number || ($use_phone_html && $phone_html)): ?>

        <div class="col-sm-2">

            <?php $i+=2; ?>
            <?php
            if($address): ?>
                <address>
                    <?php if (checkIfEmail($address)) {
                    $address_words = preg_split("/[\s]+/", $address);
                    $not_email_address = ''; $email = '';
                    foreach ($address_words as $value) {
                            if (checkIfEmail($value)) {
                                $email = $value;
                            } else {
                                $not_email_address = $not_email_address . $value . " ";
                            }
                        }
                    echo $not_email_address; ?>
                    Mail us to:<br>
                    <a href="mailto:<?php echo $email; ?>">
                        <?php echo $email; ?>
                    </a>
                    <?php } else {
                        echo $address;
                    } ?>
                </address>
            <?php endif;
            if($phone_number || ($use_phone_html && $phone_html)): ?>
                <?php

                if ($use_phone_html && $phone_html) :
                    echo $phone_html;
                else :
                    $phone = preg_replace('/[+]/', '00', $phone_number);
                    $phone = preg_replace('/\D+/', '', $phone); ?>
                    <div class="phone">
                        <a href="tel:<?php echo $phone; ?>">
                            <?php echo $phone_number; ?>
                        </a>
                    </div><?php
                endif;
            endif; ?>
        </div>
    <?php        endif;

    if(in_array ('footer_image', $fa_rows)) :
        $fa_count = array_search('footer_image', $fa_rows);
        $image_id = get_option( $footer_areas . '_' . $fa_count . '_footer_image' );
        $img_url = wp_get_attachment_image($image_id, 'medium');
        ?>
        <div class="col-sm-<?php echo 10-$i;?> footer-image-wrapper" style="text-align: center;">
            <?=$img_url;?>
        </div>
        <?php
        $i+=12;
        endif;
    ?>

  <div class="col-sm-2<?php if($i<10): ?> col-sm-offset-<?php $i=10-$i; echo $i; ?><?php endif; ?>">
    <?php $i+=4; ?>
    <div class="utilities-wrapper-container">
      <div class="utilities-wrapper">
        <?php
        $search_box = get_option( 'options_keep_search_box' );
        if($search_box == true):
          ?>
          <div class="search-form-wrapper">
            <form method="get" id="searchform" class="main-searchform" action="#">
              <input type="text" class="field" dir="auto" name="s" id="s" value="Search" />
              <button class="submit btn btn-search glyphicon glyphicon-search" id="searchsubmit"></button>
            </form>
          </div>
        <?php endif; ?>

        <?php
        $social_media = get_option( 'options_social_media' );
        if($social_media):
          ?>
          <ul class="social-wrapper">
            <?php include(locate_template('partials/social_media_gpm.php' )); ?>
          </ul>
        <?php endif; ?>

      </div>
    </div><!-- utilities-wrapper-container-->
    <div class="copyright">
      <p>
        Copyright &copy; <?php echo date('Y'); ?>
      </p>
      <?php
      $integrate_getinsellout = get_option( 'options_getinsellout' );
      if($integrate_getinsellout): ?>
        <a class="poweredby" href="https://getinsellout.com"><img src="<?php bloginfo('stylesheet_directory');?>/images/poweredbygiso.png" /></a>
      <?php else: ?>
        <strong>
          <a href="https://www.tourismtiger.com/" target="_blank">Website by Tourismtiger</a>
        </strong>
      <?php endif; ?>
    </div>
  </div>
  <?php if (get_field('button_up', 'option')) : ?>
  <div class="button-up">
    <div class="button-up__container">
      <div <?php  echo 'class="button-wrapper button-up__align--'.get_field('button-align', 'option').'"';?>>
        <button id="button-up__btn" class="button-up__btn" data-handle-click="scrollToTop">
          <?php
          if (get_field('content-choice', 'option') == 'icon' || get_field('content-choice', 'option') == 'both'){
            echo '<i class="fa '.get_field('icon', 'option').'"></i>';
          }
          if (get_field('content-choice', 'option') == 'label' || get_field('content-choice', 'option') == 'both'){
            echo '<span>'.get_field('label', 'option').'</span>';
          }
          ?>
        </button>
      </div>

    </div>
  </div>

  <script>
    $('#button-up__btn').click(function (e) {
      e.preventDefault();
      $("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });
    window.onscroll = function() {
      var scroledClassName = 'is-scrolled';
      var scrolled = window.pageYOffset || document.documentElement.scrollTop;
      var htmlElement = document.getElementsByTagName("html")[0];
      if (scrolled > 0) {
        htmlElement.classList.add(scroledClassName);
      }
      else {
        htmlElement.classList.remove(scroledClassName);
      }

    }
  </script>

<?php if (get_field('btn-up-color', 'option')) : ?>
  <style>
    #button-up__btn {
      background-color: <?php echo get_field('btn-up-color', 'option'); ?>;
    }
  </style>
<?php endif; ?>
<?php endif; ?>

<?php
endif;
