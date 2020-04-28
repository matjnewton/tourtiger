<?php
/**
 * footer
 */

?>


<div class="container">
  <div class="row">

    <?php


    $i = (int)$col;

    $address = get_field('address','option');
    $phone_number = get_field('phone_number','option');

// It Was Here :)

    ?>

    <?php
    if( have_rows('footer_areas','option') ):
      while ( have_rows('footer_areas','option') ) : the_row();

        if( get_row_layout() == 'tours' ): ?>

          <div class="col-sm-2">
            <?php
            if( have_rows('links_list') ): ?>
              <?php $i+=2; ?>
              <h4>
                Tours
              </h4>
              <ul>
                <?php			    while ( have_rows('links_list') ) : the_row();
                  $link = get_sub_field('link');
                  $name = get_sub_field('text');
                  ?>
                  <li>
                    <a href="<?php echo $link; ?>"><?php echo $name ?></a>
                  </li>
                <?php               endwhile; ?>
              </ul>

            <?php			endif; ?>
          </div>
        <?php        endif;
        ?>

        <?php
        if(get_row_layout() == 'footer_links'):
          ?>

          <div class="col-sm-2">
            <?php
            if( have_rows('links_list') ): ?>

              <div class="footer-nav-wrapper">
                <?php $i+=2; ?>
                <ul>

                  <?php			    while ( have_rows('links_list') ) : the_row();
                    $link = get_sub_field('link');
                    $name = get_sub_field('text');
                    ?>

                    <li>
                      <a href="<?php echo $link; ?>"><?php echo $name ?></a>
                    </li>
                  <?php endwhile; ?>

                </ul>
              </div>
            <?php			endif; ?>
          </div>
        <?php        endif;
        ?>
        <?php
        if( get_row_layout() == 'additional' ): ?>

          <div class="col-sm-2">
            <?php $i+=2; ?>
            <?php the_sub_field('content'); ?>
          </div>
        <?php        endif;
        ?>

      <?php    endwhile;

    else : ?>

    <?php    // no layouts found

    endif;

    // Now it is Here


    if($address || $phone_number): ?>

        <div class="col-sm-2">

            <?php $i+=2; ?>
            <?php if($address): ?>
                <address>
                    <?php echo $address; ?>
                </address>
            <?php endif; ?>
            <?php if($phone_number): ?>
                <?php $phone = preg_replace('/\D+/', '', $phone_number); ?>
                <div class="phone">
                    <a href="tel:<?php echo $phone; ?>">
                        <?php echo $phone_number; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php        endif;


    ?>

    <div class="col-sm-4<?php if($i<8): ?> col-sm-offset-<?php $i=8-$i; echo $i; ?><?php endif; ?>">
      <?php $i+=4; ?>
      <div class="utilities-wrapper-container">
        <div class="utilities-wrapper">
          <?php $search_box = get_field('keep_search_box', 'option');
          if($search_box == true):
            ?>
            <div class="search-form-wrapper">
              <form method="get" id="searchform" class="main-searchform" action="#">
                <input type="text" class="field" dir="auto" name="s" id="s" value="Search" />
                <button class="submit btn btn-search glyphicon glyphicon-search" id="searchsubmit"></button>
              </form>
            </div>
          <?php endif; ?>
          <?php if(get_field('social_media', 'option')): ?>
            <ul class="social-wrapper">
              <?php while(has_sub_field('social_media', 'option')): ?>
                <li>
                  <a href="<?php the_sub_field('link'); ?>">
                    <?php $icon = get_sub_field('social_icon'); ?>
                    <?php if($icon == 'facebook'): ?>
                      <i class="fa fa-facebook-square fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'pinterest'): ?>
                      <i class="fa fa-pinterest-square fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'twitter'): ?>
                      <i class="fa fa-twitter-square fa-lg"></i>
                    <?php endif; ?>
                  <?php if($icon == 'ebird'): ?>
                      <i class="fas fa-ebird"></i>
                  <?php endif; ?>
                    <?php if($icon == 'youtube'): ?>
                      <i class="fa fa-youtube-square fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'instagram'): ?>
                      <i class="fa fa-instagram fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'linkedin'): ?>
                      <i class="fa fa-linkedin-square fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'google-plus'): ?>
                      <i class="fa fa-google-plus-square fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'yelp'): ?>
                      <i class="fa fa-yelp fa-lg"></i>
                    <?php endif; ?>
                    <?php if($icon == 'tripadvisor'): ?>
                      <i class="fa fa-tripadvisor fa-lg"></i>
                    <?php endif; ?>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div><!-- utilities-wrapper-container-->
      <div class="copyright">
        <p>
          Copyright &copy; <?php echo date('Y'); ?>
        </p>
        <?php
        $integrate_getinsellout = get_field('getinsellout','option');
        if($integrate_getinsellout): ?>
          <a class="poweredby" href="http://getinsellout.com"><img src="<?php bloginfo('stylesheet_directory');?>/images/poweredbygiso.png" /></a>
        <?php else: ?>
          <strong>
            <a href="https://www.tourismtiger.com/">Website by Tourismtiger</a>
          </strong>
        <?php endif; ?>
      </div>
    </div><?php
    /**
     * footer
     */

    ?>


    <div class="container">
      <div class="row">

        <?php


        $i = (int)$col;

        $address = get_field('address','option');
        $phone_number = get_field('phone_number','option');

        if($address || $phone_number): ?>

          <div class="col-sm-2">

            <?php $i+=2; ?>
            <?php if($address): ?>
              <address>
                <?php echo $address; ?>
              </address>
            <?php endif; ?>
            <?php if($phone_number): ?>
              <?php $phone = preg_replace('/\D+/', '', $phone_number); ?>
              <div class="phone">
                <a href="tel:<?php echo $phone; ?>">
                  <?php echo $phone_number; ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        <?php        endif; ?>

        <?php
        if( have_rows('footer_areas','option') ):
          while ( have_rows('footer_areas','option') ) : the_row();

            if( get_row_layout() == 'tours' ): ?>

              <div class="col-sm-2">
                <?php
                if( have_rows('links_list') ): ?>
                  <?php $i+=2; ?>
                  <h4>
                    Tours
                  </h4>
                  <ul>
                    <?php			    while ( have_rows('links_list') ) : the_row();
                      $link = get_sub_field('link');
                      $name = get_sub_field('text');
                      ?>
                      <li>
                        <a href="<?php echo $link; ?>"><?php echo $name ?></a>
                      </li>
                    <?php               endwhile; ?>
                  </ul>

                <?php			endif; ?>
              </div>
            <?php        endif;
            ?>

            <?php
            if(get_row_layout() == 'footer_links'):
              ?>

              <div class="col-sm-2">
                <?php
                if( have_rows('links_list') ): ?>

                  <div class="footer-nav-wrapper">
                    <?php $i+=2; ?>
                    <ul>

                      <?php			    while ( have_rows('links_list') ) : the_row();
                        $link = get_sub_field('link');
                        $name = get_sub_field('text');
                        ?>

                        <li>
                          <a href="<?php echo $link; ?>"><?php echo $name ?></a>
                        </li>
                      <?php endwhile; ?>

                    </ul>
                  </div>
                <?php			endif; ?>
              </div>
            <?php        endif;
            ?>
            <?php
            if( get_row_layout() == 'additional' ): ?>

              <div class="col-sm-2">
                <?php $i+=2; ?>
                <?php the_sub_field('content'); ?>
              </div>
            <?php        endif;
            ?>

          <?php    endwhile;

        else : ?>

        <?php    // no layouts found

        endif;

        ?>

        <div class="col-sm-4<?php if($i<8): ?> col-sm-offset-<?php $i=8-$i; echo $i; ?><?php endif; ?>">
          <?php $i+=4; ?>
          <div class="utilities-wrapper-container">
            <div class="utilities-wrapper">
              <?php $search_box = get_field('keep_search_box', 'option');
              if($search_box == true):
                ?>
                <div class="search-form-wrapper">
                  <form method="get" id="searchform" class="main-searchform" action="#">
                    <input type="text" class="field" dir="auto" name="s" id="s" value="Search" />
                    <button class="submit btn btn-search glyphicon glyphicon-search" id="searchsubmit"></button>
                  </form>
                </div>
              <?php endif; ?>
              <?php if(get_field('social_media', 'option')): ?>
                <ul class="social-wrapper">
                  <?php while(has_sub_field('social_media', 'option')): ?>
                    <li>
                      <a href="<?php the_sub_field('link'); ?>">
                        <?php $icon = get_sub_field('social_icon'); ?>
                        <?php if($icon == 'facebook'): ?>
                          <i class="fa fa-facebook-square fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'pinterest'): ?>
                          <i class="fa fa-pinterest-square fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'twitter'): ?>
                          <i class="fa fa-twitter-square fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'youtube'): ?>
                          <i class="fa fa-youtube-square fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'instagram'): ?>
                          <i class="fa fa-instagram fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'linkedin'): ?>
                          <i class="fa fa-linkedin-square fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'google-plus'): ?>
                          <i class="fa fa-google-plus-square fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'yelp'): ?>
                          <i class="fa fa-yelp fa-lg"></i>
                        <?php endif; ?>
                        <?php if($icon == 'tripadvisor'): ?>
                          <i class="fa fa-tripadvisor fa-lg"></i>
                        <?php endif; ?>
                      </a>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div><!-- utilities-wrapper-container-->
          <div class="copyright">
            <p>
              Copyright &copy; <?php echo date('Y'); ?>
            </p>
            <?php
            $integrate_getinsellout = get_field('getinsellout','option');
            if($integrate_getinsellout): ?>
              <a class="poweredby" href="http://getinsellout.com"><img src="<?php bloginfo('stylesheet_directory');?>/images/poweredbygiso.png" /></a>
            <?php else: ?>
              <strong>
                <a href="https://www.tourismtiger.com/">Website by Tourismtiger</a>
              </strong>
            <?php endif; ?>
          </div>
        </div>
