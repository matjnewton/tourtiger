<?php
/**
 * footer
 */


if (current_user_can('edit_posts') && get_field('advanced_footer', 'option')) :
  ?>

  <div class="advanced-footer">

      <?php
      while (have_rows('advanced_footer', 'option')) :
        the_row();

        $layout = get_row_layout();
        ?>

        <div class="advanced-footer--box layout_<?php echo $layout; ?>">
          <div class="advanced-footer--column layout_<?php echo $layout; ?>">

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
      $isButtonUp = get_field('button_up', 'option');

      ?>
      <?php


      $i = (int)$col;

      $address = get_option( 'options_address' );
      $phone_number = get_option( 'options_phone_number' );

      if($address || $phone_number): ?>

        <div class="col-sm-2">

          <?php $i+=2; ?>
          <?php if($address): ?>
            <address>
              <?php echo $address; ?>
            </address>
          <?php endif; ?>
          <?php if($phone_number): ?>
            <?php
            $phone = preg_replace('/[+]/', '00', $phone_number);
            $phone = preg_replace('/\D+/', '', $phone);
            ?>
            <div class="phone">
              <a href="tel:<?php echo $phone; ?>">
                <?php echo $phone_number; ?>
              </a>
            </div>
          <?php endif; ?>
        </div>
      <?php        endif; ?>

      <?php
      $fa_rows = get_option( 'options_footer_areas' );
      if($fa_rows):
        foreach( (array) $fa_rows as $fa_count => $fa_row ):
          switch( $fa_row ):
            case 'tours':
              ?>
              <div class="col-sm-2">
                <?php
                $links_list = get_option( 'options_footer_areas_' . $fa_count . '_links_list' );
                if($links_list):
                  $i+=2;
                  ?>
                  <h4>
                    Tours
                  </h4>
                  <ul>
                    <?php
                    for( $fi = 0; $fi < $links_list; $fi++ ):
                      $link = get_option( 'options_footer_areas_' . $fa_count . '_links_list_' . $fi . '_link' );
                      $name = get_option( 'options_footer_areas_' . $fa_count . '_links_list_' . $fi . '_text' );

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
                $links_list = get_option( 'options_footer_areas_' . $fa_count . '_links_list' );
                if($links_list):
                  $i+=2;
                  ?>
                  <div class="footer-nav-wrapper">
                    <ul>
                      <?php
                      for( $fi = 0; $fi < $links_list; $fi++ ):
                        $link = get_option( 'options_footer_areas_' . $fa_count . '_links_list_' . $fi . '_link' );
                        $name = get_option( 'options_footer_areas_' . $fa_count . '_links_list_' . $fi . '_text' );

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
              $content = get_option( 'options_footer_areas_' . $fa_count . '_content' );
              $i+=2;
              ?>
              <div class="col-sm-2">
                <?php echo $content;  ?>
              </div>
              <?php
              break;
          endswitch;
        endforeach;
      endif;
      ?>

      <div class="col-sm-4<?php if($i<8): ?> col-sm-offset-<?php $i=8-$i; echo $i; ?><?php endif; ?>">
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
            <a class="poweredby" href="http://getinsellout.com"><img src="<?php bloginfo('stylesheet_directory');?>/images/poweredbygiso.png" /></a>
          <?php else: ?>
            <strong>
              <a href="http://www.tourismtiger.com/" rel="nofollow">Website by Tourismtiger</a>
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