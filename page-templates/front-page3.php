<?php
/**
 * Template Name: Front-3 Page Template
 */

//add_action('genesis_after_header', 'tourtiger_after_header');


/*add_action('genesis_before_content', 'tourtiger_before_content');
function tourtiger_before_content(){ ?>

<?php }*/

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_sub_contents');
function tourtiger_sub_contents(){ ?>
<?php $site_layout = genesis_site_layout(); ?>



    <?php global $post; ?>

            <?php if(get_field('tiles_area')): ?>

            <?php while(has_sub_field('tiles_area')): ?>
            <?php
                $section_headline = get_sub_field('section_headline');
                $custom_headline = get_sub_field('custom_headline');
                $number_of_columns = get_sub_field('number_of_columns');
                $linked_to_hero_cta = get_sub_field('linked_to_hero_cta');
                $testimonials_type = get_field('testimonials_type', 'option');
            ?>



    <section class="<?php if($section_headline == 'Featured tours'): ?>featured-tours-2<?php else: ?>testimonials<?php endif; ?>"<?php if($linked_to_hero_cta): ?> data-scroll-index='110'<?php endif; ?>>
        <div class="container position-wrapper">
            <?php if($custom_headline): ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2>
                    <?php echo $custom_headline; ?>
                    </h2>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <?php
                    $col = 0;
                    switch ($number_of_columns) {
                        case 1:
                            $col = 12;
                            break;
                        case 2:
                            $col = 6;
                            break;
                        case 3:
                            $col = 4;
                            break;
                        case 4:
                            $col = 3;
                            break;
                        case 5:
                            $col = 5;
                            break;
                    }
                    ?>

                    <?php
                        //if (have_rows('tiles')):
                        if(have_rows('tiles') && ($section_headline == 'Testimonials') && ($testimonials_type == 'Scrolling')): ?>
                        <div class="col-sm-12">
        <div class="testimonials-slider-wrapper">
                        <div class="testimonials-slider">
                            <ul class="slides">
                            <?php while(have_rows('tiles')): the_row(); ?>
                            <?php if( get_row_layout() == 'testimonials' ):
                            $pulled_specific = get_sub_field('pull_specific_from');

                            if($pulled_specific):
                                $post = $pulled_specific;
        				        setup_postdata( $post ); ?>

        				        <?php get_template_part( 'content', 'scrltstmls' ); ?>

        				        <?php
        				        wp_reset_postdata();
                            endif;
                        endif;
                        ?>
                            <?php endwhile; ?>
                            </ul>
                        </div>
        </div>
        </div>

                        <?php else:
                        while(have_rows('tiles')): the_row();

                        if( get_row_layout() == 'tours' ):
                            $pulled_specific = get_sub_field('pull_specific_from');
                            $button_label = get_sub_field('button_label');
                            if($pulled_specific):
                            $post = $pulled_specific;
                            setup_postdata( $post );
                            ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?><?php endif; ?>">
                            <?php //get_template_part( 'content', 'feat_tours_2' ); ?>
                            <div class="tour-2">

                        <?php if (has_post_thumbnail()) {
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
            if($col==6):
            $image = aq_resize( $img_url, 568, 377, true );
            else:
            $image = aq_resize( $img_url, 377, 377, true ); //resize & crop img
            endif;
            ?>
            <a href="<?php the_permalink() ?>" class="tile-image">
                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                <div class="tile-tint"></div>
                <div class="tile-tint2"></div>
            </a>
            <?php
        }
        ?>
                    <div class="name-wrapper">
                        <div class="name">
                            <strong>
                                <?php the_title(); ?>
                            </strong>
                        </div>
                    </div>
                    <div class="btn-tour">
                        <div class="txt-button-tour"><?php if($button_label): echo $button_label; else: echo "View Tour"; endif; ?></div>
                        <div class="hover-button-tour"></div>
                    </div>

                    </div>
                            </div>
                            <?php
                            wp_reset_postdata();
                            endif;/*end if pulled_specific*/
                        endif;/*end if get_row_layout tours*/
                        if( get_row_layout() == 'categories' ): ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?><?php endif; ?>">
                            <?php get_template_part( 'content', 'feat_cats_2' ); ?>
                            </div>
                        <?php
                        endif;

                        if( get_row_layout() == 'testimonials' ):
                            $pulled_specific = get_sub_field('pull_specific_from');

                            if($pulled_specific):
                                $post = $pulled_specific;
        				        setup_postdata( $post ); ?>
        				        <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?><?php endif; ?>">
        				        <?php get_template_part( 'content', 'home_tstmls' ); ?>
        				        </div>
        				        <?php
        				        wp_reset_postdata();
                            endif;
                        endif;

                        endwhile;
                        endif;
                       ?>


                </div>
        </div>
    </section>



                <?php endwhile; ?>

            <?php endif; ?>

    <?php global $post; ?>
    <?php $testimonials_type = get_field('testimonials_type', 'option'); ?>
    <?php if( have_rows('testimonial_tiles_area') && ($testimonials_type == 'Scrolling') ): ?>
            <section class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="testimonials-slider-wrapper">
                                <div class="testimonials-slider">
                            <ul class="slides">
                            <?php while ( have_rows('testimonial_tiles_area') ) : the_row(); ?>
                            <?php if( get_row_layout() == 'testimonial' ): ?>
                            <?php if(have_rows('tiles')):
                            while(have_rows('tiles')): the_row();

                            $pulled_specific = get_sub_field('pull_specific_from');

                            if($pulled_specific):
                                $post = $pulled_specific;
        				        setup_postdata( $post ); ?>
        				        <?php get_template_part( 'content', 'scrltstmls' ); ?>
        				        <?php
        				        wp_reset_postdata();
                            endif;

                            endwhile;
                            endif; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php else: ?>
            <?php while ( have_rows('testimonial_tiles_area') ) : the_row(); ?>
            <section class="testimonials">
            <div class="container">
            <div class="row even-grid">

               <?php if( get_row_layout() == 'testimonial' ):
                        $number_of_columns = get_sub_field('number_of_columns');

                        $col = 0;
                    switch ($number_of_columns) {
                        case 1:
                            $col = 12;
                            break;
                        case 2:
                            $col = 6;
                            break;
                        case 3:
                            $col = 4;
                            break;
                        case 4:
                            $col = 3;
                            break;
                        case 5:
                            $col = 5;
                            break;
                    }

                        if(have_rows('tiles')):
                            while(have_rows('tiles')): the_row();

                            $pulled_specific = get_sub_field('pull_specific_from');

                            if($pulled_specific):
                                $post = $pulled_specific;
        				        setup_postdata( $post ); ?>
        				        <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?><?php endif; ?>">
        				        <?php get_template_part( 'content', 'home_tstmls' ); ?>
        				        </div>
        				        <?php
        				        wp_reset_postdata();
                            endif;

                            endwhile;
                            endif;

                        endif; ?>

            </div>
            </div>
            </section>
            <?php endwhile; ?>
    <?php endif; ?>

    <?php if(have_rows('multi_column_area')): ?>
    <section class="multi-column-area text-center">
        <div class="container">
        <?php while(have_rows('multi_column_area')): the_row(); ?>
            <?php if( get_row_layout() == 'heading'): ?>
                <?php $text = get_sub_field('text'); ?>
                <?php if($text): ?>
                    <h2 class="text-center"><?php echo $text; ?></h2>
                <?php endif; ?>
            <?php endif; ?>
            <?php if( get_row_layout() == '3_column_content'): ?>
                <?php $line_under_subheading = get_sub_field('line_under_subheading');
                if( have_rows('content') ): ?>
                <ul class="row">
                <?php $m = 0; ?>
                <?php while( have_rows('content') ): the_row();
                    $subheading = get_sub_field('subheading');
                    $textarea = get_sub_field('textarea');
                    $m++;
                    ?>
                    <li class="col-sm-4<?php //if($m == 3): echo " col-sm-offset-3 col-md-offset-0"; endif; ?> col-md-4">
                    <?php if($subheading): ?>
                    <h3><?php echo $subheading; ?></h3>
                    <?php endif; ?>
                    <?php if($line_under_subheading): ?>
                    <hr />
                    <?php endif; ?>
                    <?php if($textarea): ?>
                    <p><?php echo $textarea; ?></p>
                    <?php endif; ?>
                    </li>
                    <?php
                    endwhile; ?>
                </ul>
                <?php endif;
                ?>

            <?php endif; ?>
        <?php endwhile; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if(get_field('headline_content')): ?>
    <section class="reasons">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8 col-lg-9<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
                <?php if(get_field('headline_content')): ?>
                    <?php while(has_sub_field('headline_content')):
                        $embed = get_sub_field('embed');
                        $headline_align = get_sub_field('headline_text_align');
                    ?>
                        <div class="headline-content">
                            <h2<?php if($headline_align == 'Center'): echo ' class="text-center"'; endif;?>>
                                <?php the_sub_field('headline'); ?>
                            </h2>
                            <div class="subcontent">
                                <?php the_sub_field('subcontent'); ?>
                                <?php if($embed): echo $embed; endif; ?>
                            </div>
                            <div class="view-tours-wrapper">
                                <?php $view_tours = get_sub_field('view_tours_link');
                                    if($view_tours):
                                ?>
                                <a class="view-tours-btn" href="<?php the_sub_field('view_tours_link'); ?>">View tours</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-4 col-lg-3 front-right-col">
                    <?php if(get_field('universal_sidebar', 'option')): ?>
                           <?php while(has_sub_field('universal_sidebar', 'option')): ?>

                           <?php if( get_row_layout() == 'content_editor' ): ?>
                           <div class="widget-item">
                           <?php $content = get_sub_field('content');
                               echo $content;
                           ?>
                           </div>
                           <?php endif; ?>

                           <?php if( get_row_layout() == 'text_area' ): ?>
                           <div class="widget-item">
                           <?php $content = get_sub_field('content');
                               echo $content;
                           ?>
                           </div>
                           <?php endif; ?>

                           <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(have_rows('sections_area')): ?>
    <?php
                            $numm = 0;
                            $section_count = (int)$numm; ?>
        <?php while(have_rows('sections_area')): the_row(); ?>
        <?php
                $heading = get_sub_field('section_heading');
                $heading_align = get_sub_field('heading_text_align');
                //$linked_to_hero_cta = get_sub_field('linked_to_hero_cta');
                $custom_options = get_sub_field('custom_options');
                $custom_margin_presets = get_sub_field('custom_margin_presets');
                $custom_bottom_space = get_sub_field('bottom_space_options');
        ?>
        <?php $section_count++; ?>
            <section class="front-page-section fps<?php echo $section_count; ?><?php if($custom_margin_presets == "50px 0px 40px 0px"): ?> custom-margin-preset1<?php endif; ?><?php if($custom_margin_presets == "0px 0px 0px 0px"): ?> custom-margin-preset2<?php endif;?> <?=$custom_bottom_space?>"<?php if( is_array($custom_options) && in_array('Linked to Hero CTA', $custom_options)): ?> data-scroll-index='110'<?php endif; ?>>

            <?php if($heading): ?>
                <div class="container">
                    <h2 class="section-heading<?php if($heading_align == 'Center'): echo ' text-center'; endif;?>">
                        <?php echo $heading; ?>
                    </h2>
                </div>
            <?php endif; ?>

            <?php if(have_rows('section_elements')): ?>
                        <?php while(have_rows('section_elements')): the_row(); ?>

                            <?php if( get_row_layout() == 'heading'): ?>
                            <?php
                                $text = get_sub_field('text');
                                $text_align = get_sub_field('text_align');
                            ?>
                                <?php if($text): ?>
                            <div class="container">
                                        <h2 class="section-heading<?php if($text_align == 'Center'): echo ' text-center'; endif;?>">
                                            <?php echo $text; ?>
                                        </h2>
                            </div><!-- .container-->
                                <?php endif; ?>

                            <?php endif; ?>

                            <?php if( get_row_layout() == '3_column_content'): ?>
                            <div class="container">
                            <div class="multi-column-area text-center">

                                <?php $line_under_subheading = get_sub_field('line_under_subheading'); ?>
                                <?php $text = get_sub_field('heading'); ?>
                                <?php if($text): ?>
                                    <h2 class="text-center"><?php echo $text; ?></h2>
                                <?php endif; ?>
                                <?php if( have_rows('columns_set') ): ?>
                                <ul class="row">
                                <?php $m = 0; ?>
                                <?php while( have_rows('columns_set') ): the_row();
                                    $subheading = get_sub_field('subheading');
                                    $textarea = get_sub_field('textarea');
                                    $m++;
                                    ?>
                                    <li class="col-sm-4<?php //if($m == 3): echo " col-sm-offset-3 col-md-offset-0"; endif; ?> col-md-4">
                                    <?php if($subheading): ?>
                                    <h3><?php echo $subheading; ?></h3>
                                    <?php endif; ?>
                                    <?php if($line_under_subheading): ?>
                                    <hr />
                                    <?php endif; ?>
                                    <?php if($textarea): ?>
                                    <p><?php echo $textarea; ?></p>
                                    <?php endif; ?>
                                    </li>
                                    <?php
                                    endwhile; ?>
                                </ul>
                                <?php endif; ?>

                            </div>
                            </div><!-- end .container-->
                            <?php endif; ?>
                            <?php if(get_row_layout() == 'heading_content'): ?>
                            <div class="container">
            <div class="row reasons">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8 col-lg-9<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
                <?php if( have_rows('contents_set') ): ?>
                    <?php while( have_rows('contents_set') ): the_row();
                        $heading_align = get_sub_field('heading_text_align');
                        $heading = get_sub_field('heading');
                        $content_editor = get_sub_field('content_editor');
                        $embed = get_sub_field('embed');
                        $view_tours = get_sub_field('view_tours_link');
                    ?>
                        <div class="headline-content">
                            <?php if($heading): ?>
                            <h2<?php if($heading_align == 'Center'): echo ' class="text-center"'; endif;?>>
                                <?php echo $heading; ?>
                            </h2>
                            <?php endif; ?>
                            <div class="subcontent">
                                <?php if($content_editor): echo $content_editor; endif; ?>
                                <?php if($embed): echo $embed; endif; ?>
                            </div>
                                <?php if($view_tours): ?>
                                <div class="view-tours-wrapper">
                                <a class="view-tours-btn" href="<?php the_sub_field('view_tours_link'); ?>">View tours</a>
                                </div>
                                <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-4 col-lg-3 front-right-col">
                    <?php if(get_field('universal_sidebar', 'option')): ?>
                           <?php while(has_sub_field('universal_sidebar', 'option')): ?>

                           <?php if( get_row_layout() == 'content_editor' ): ?>
                           <div class="widget-item">
                           <?php $content = get_sub_field('content');
                               echo $content;
                           ?>
                           </div>
                           <?php endif; ?>

                           <?php if( get_row_layout() == 'text_area' ): ?>
                           <div class="widget-item">
                           <?php $content = get_sub_field('content');
                               echo $content;
                           ?>
                           </div>
                           <?php endif; ?>

                           <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

            </div><!-- end .reasons-->
                            </div><!-- end .container-->
    <?php endif; ?>
                            <?php if( get_row_layout() == 'map'): ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">

                                <?php $custom_heading = get_sub_field('custom_heading'); ?>
                                <?php
                                    $center = get_sub_field('map_center_address');
                                    $zoom = get_sub_field('zoom');
                                 ?>
                                <?php $content = '[bgmp-map center="'.$center.'" zoom="'.$zoom.'"]'; ?>
                            <div class="map">
                                <?php if($custom_heading): ?>
                                <h2 class="custom-heading">
                                    <?php echo $custom_heading; ?>
                                </h2>
                                <?php endif; ?>
                                <?php echo do_shortcode( $content ) ?>

                            </div>

                                        </div>
                                    </div>
                                </div><!-- end .container-->
                            <?php endif; ?>

                            <?php if( get_row_layout() == 'fluid_boxes'): ?>
                            <div class="container-fluid fluid-boxes">
                            	<div class="row even-grid">
                                	<?php if( have_rows('boxes_set') ): ?>
                                        <?php $n = 0; ?>
                                        <?php while ( have_rows('boxes_set') ) : the_row(); ?>
                                        <?php $n++; ?>
                                            <?php if( get_row_layout() == 'content_button'): ?>
                                            <?php
                                                $pull = get_sub_field('pull');
                                                $color_style = get_sub_field('background_color_style');
                                                $heading = get_sub_field('heading');
                                                $textarea = get_sub_field('textarea');
                                                $button_text = get_sub_field('button_text');
                                                $button_link = get_sub_field('button_link');
                                                $open_in_iframe = get_sub_field('open_in_iframe');
                                                ?>
                                    <div class="col-sm-6 s-item<?php if( (is_array($pull) && in_array('left', $pull)) && !(is_array($pull) && in_array('right', $pull))): ?> box-left<?php elseif( (is_array($pull) && in_array('right', $pull)) && !(is_array($pull) && in_array('left', $pull))): ?> box-right<?php endif; ?><?php if($color_style == 'Variation-1'): ?> color-variation-1<?php elseif($color_style == 'Variation-2'): ?> color-variation-2<?php endif; ?>">
                                    	<div class="inner-wrapper center-block">
                                        	<?php if($heading): ?>
                                            <h2><?php echo $heading; ?></h2>
                                            <?php endif; ?>
                                            <?php if($textarea): ?>
                                            <p><?php echo $textarea; ?></p>
                                            <?php endif; ?>
                                            <?php if($button_text): ?>
                                            <div class="view-btn-wrapper"> <?php //@todo:?>
                                                <div class="view-tour-btn">
                                                    <a <?php if($open_in_iframe):?>class="iframe-opener"<?php  endif; ?>href="<?php if($button_link): echo $button_link; else: ?>#<?php endif; ?>" <?php if($open_in_iframe):?>target="iframe1"<?php endif;?>>
                                                    <?php echo $button_text; ?>
                                                    </a>
                                                </div>
                                            </div>


                                            <?php endif; ?>
                                    	</div>

                                	</div>
                                            <?php endif;/*end content_button*/ ?>
                                            <?php if( get_row_layout() == 'image'): ?>
                                            <?php
                                                $pull = get_sub_field('pull');
                                                $image_url = wp_get_attachment_url( get_sub_field('image'),'full');
                                                ?>
                                            <?php if($image_url): ?>
                                    <div class="col-sm-6 s-item<?php if( is_array($pull) && in_array('left', $pull)): ?> box-left<?php elseif(is_array($pull) && in_array('right', $pull)): ?> box-right<?php endif; ?>" style="background-image:url('<?php echo $image_url; ?>'); background-size:cover; background-position:center center; min-height:410px;"></div>
                                            <?php endif; ?>
                                            <?php endif; /*end image*/ ?>
                                            <?php if((($n % 2) == 0)): ?>
                                            <hr class="col-sm-12" />
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                            	</div><!-- .row-->
                            </div>
                            <?php endif; ?>

                            <?php if( get_row_layout() == 'image_gallery'): ?>
                            <div class="container-fluid fluid-gallery photo-gallery">
                                    <div class="row">
                                <?php $images = get_sub_field('gallery'); ?>
                                <?php if( $images ): ?>
                                        <?php foreach( $images as $image ): ?>
                            <?php
                                $img_url = $image['url'];
                                $thumbnail = aq_resize( $img_url, 384, 288, true );
                            ?>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <a href="<?php echo $img_url; ?>" class="photo-thumbnail">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                                        </a>
                                    </div>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                                    </div>
                            </div><!-- end .container-fluid-->
                            <?php endif; /*end image_gallery*/ ?>

                            <?php if( get_row_layout() == 'tour_boxes'): ?>
                            <div class="container">
                                <div class="featured-tours-2">
                                <div class="row">
                                    <?php global $post; ?>
                                    <?php
                    $number_of_columns = get_sub_field('number_of_columns');
                    $col = 0;
                    if($number_of_columns):
                    switch ($number_of_columns) {
                        case 1:
                            $col = 12;
                            break;
                        case 2:
                            $col = 6;
                            break;
                        case 3:
                            $col = 4;
                            break;
                        case 4:
                            $col = 3;
                            break;
                        case 5:
                            $col = 5;
                            break;
                    }
                    endif;
                    ?>
                    <?php if( have_rows('boxes_set') ): ?>
                    <?php while ( have_rows('boxes_set') ) : the_row(); ?>

                    <?php if( get_row_layout() == 'tours'): ?>
                    <?php
                        $pulled_specific = get_sub_field('pull_specific_from');
                        if($pulled_specific):
                        $post = $pulled_specific;
                        setup_postdata( $post );
                    ?>
                        <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?>">
                            <?php include(locate_template('content-feat_tours_22.php' )); ?>
                        </div>
                    <?php
                       wp_reset_postdata();
                       endif;/*end if pulled_specific*/
                    ?>

                    <?php elseif(get_row_layout() == 'categories'): ?>
                    <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?>">
                            <?php include(locate_template('content-feat_cats_2.php' )); ?>
                            </div>
                    <?php endif; ?>

                    <?php endwhile; ?>

                    <?php endif; ?>
                                </div>
                                </div><!-- end .featured-tours-2-->
                            </div><!-- end .container-->
                            <?php endif; ?>

                            <?php if( get_row_layout() == 'tour_links'): ?>
                            <div class="container container960">
                                <?php global $post; ?>
                                <?php if( have_rows('links_set') ): ?>
                                <ul class="row link-tours">
                                <?php while ( have_rows('links_set') ) : the_row(); ?>

                                    <?php if( get_row_layout() == 'tours'): ?>
                                    <?php
                                        $pulled_specific = get_sub_field('pull_specific_from');
                                        if($pulled_specific):
                                        $post = $pulled_specific;
                                        setup_postdata( $post );
                                    ?>
                                    <?php include(locate_template('partials/content-tour_links.php' )); ?>
                                    <?php
                                       wp_reset_postdata();
                                       endif;/*end if pulled_specific*/
                                    ?>

                                    <?php elseif(get_row_layout() == 'categories'): ?>
                                    <?php include(locate_template('partials/content-categories_links.php' )); ?>
                                    <?php endif; ?>


                                <?php endwhile; ?>
                                </ul>
                                <hr />
                                <?php endif;/*links_set*/ ?>
                            </div>
                            <?php endif; /*end tour_links*/ ?>

                            <?php if( get_row_layout() == 'testimonials_boxes'): ?>
                            <?php $testimonials_type = get_field('testimonials_type', 'option'); ?>
                            <?php
                            $number_of_tstm_columns = get_sub_field('number_of_tstm_columns');

                        $testimonials_text_color = get_sub_field('testimonials_styling')['testimonials_text_color'];
                        $testimonials_text_weight = get_sub_field('testimonials_styling')['testimonials_text_weight'];
                        $testimonials_background_id = get_sub_field('testimonials_styling')['background_image'];
                        $testimonials_background_opacity = get_sub_field('testimonials_styling')['background_image_opacity'];
                        $testimonials_background_cover_or_repeat = get_sub_field('testimonials_styling')['background_cover_or_repeat'];
                        $testimonials_background_and_styling = get_sub_field('testimonials_styling_options');
                        $testimonials_heading = get_sub_field('testimonials_styling')['testimonials_heading'];
                        $testimonials_heading_color_inherit = get_sub_field('testimonials_styling')['testimonials_heading_color_inherit'];
                        $add_semi_opaque_background_over_bg_image = get_sub_field('testimonials_styling')['add_semi_opaque_background_over_bg_image'];
                        $semi_opaque_background_opacity = get_sub_field('testimonials_styling')['semi_opaque_background_opacity'];
                        $semi_opaque_background_border_radius = get_sub_field('testimonials_styling')['semi_opaque_background_border_radius'];


                            $tcol = 0;
                            if($number_of_tstm_columns):
                            switch ($number_of_tstm_columns) {
                                case 1:
                                    $tcol = 12;
                                    break;
                                case 2:
                                    $tcol = 6;
                                    break;
                                case 3:
                                    $tcol = 4;
                                    break;
                                case 4:
                                    $tcol = 3;
                                    break;
                                case 5:
                                    $tcol = 5;
                                    break;
                            }
                            endif;
                            ?>
                            <?php
if(have_rows('boxes_set') && $testimonials_type == 'Scrolling'):?>


<?php // proper size background image selector
$testimonials_background_id;
    $img_srcset_full = wp_get_attachment_image_url( $testimonials_background_id, 'full' );
    $img_srcset_large = wp_get_attachment_image_url( $testimonials_background_id, 'large' );
    $img_srcset_medium_large = wp_get_attachment_image_url( $testimonials_background_id, 'medium_large' );
    $img_srcset_medium = wp_get_attachment_image_url( $testimonials_background_id, 'medium' );

    ?>
    <style>
        .testimonials-background-image-container {
            background-image: url(<?=$img_srcset_full?>);
        }
        @media only screen and (min-width: 768px) {
            .testimonials-background-image-container {
            background-image: url(<?=$img_srcset_medium_large?>)
        }}
        @media only screen and (min-width: 1024px) {
            .testimonials-background-image-container {
            background-image: url(<?=$img_srcset_large?>)
        }}
    </style>

<div <?php if( $testimonials_background_and_styling == 1 ): ?>class="testimonials-div"<?php endif; ?>>

    <div class="testimonials-background-image-container" style="opacity: <?=$testimonials_background_opacity?>;<?php if($testimonials_background_cover_or_repeat == "cover"): ?> background-size: cover;<?php endif;?>"></div>
    <div class="container " <?php if( $testimonials_background_and_styling == 1 ): ?>style="background: none"<?php endif; ?>>

        <style>
            .txt-testimonial,
            .txt-testimonial span.name,
            div.txt-testimonial > div > a {
                color: <?=$testimonials_text_color?> !important;
                font-weight: <?=$testimonials_text_weight?>;
            }
        </style>

        <div class="semi-opaque-rectangle-background-holder" <?php if ($testimonials_background_and_styling == 1 && $add_semi_opaque_background_over_bg_image):?>style="background: rgba(255,255,255,<?=$semi_opaque_background_opacity?>); border-radius: <?=$semi_opaque_background_border_radius?>px;"<?php endif; ?>>  <?php // semi-opaque rectangle background holder ?>

            <?php if($testimonials_heading && $testimonials_background_and_styling == 1) : ?>
            <h2 class="testimonials-heading"<?php if($testimonials_heading_color_inherit):?> style="color: <?php echo $testimonials_text_color;?>"<?php endif;?>><?=$testimonials_heading?></h2>
            <?php endif; ?>

            <div class="row testimonials">
                <div class="col-sm-12 testimonials-box">
                    <div class="testimonials-slider-wrapper" <?php if( $testimonials_heading ) : ?>style="margin-top:0"<?php endif;?>>
                        <div class="testimonials-slider">
                            <ul class="slides">
                                <?php while(have_rows('boxes_set')): the_row(); ?>
                                    <?php if( get_row_layout() == 'testimonials' ):
                                        $pulled_specific = get_sub_field('pull_specific_from');
                                        if($pulled_specific):
                                            $post = $pulled_specific;
                                            setup_postdata( $post ); ?>

                                            <?php get_template_part( 'content', 'scrltstmls' ); ?>

                                            <?php
                                            wp_reset_postdata();
                                        endif;
                                    endif;
                                    ?>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end .row-->
        </div>  <?php // end of semi-opaque rectangle background ?>

    </div><!-- end .container-->
</div> <?php // End of testimonials-div ?>
                            <?php
                            else:
                            ?>
                            <div class="container">
                            <div class="row even-grid testimonials">
                            <?php
                            while(have_rows('boxes_set')): the_row();
                            if( get_row_layout() == 'testimonials' ):
                            $pulled_specific = get_sub_field('pull_specific_from');
                            if($pulled_specific):
                                $post = $pulled_specific;
        				        setup_postdata( $post ); ?>
        				        <div class="<?php if($tcol==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $tcol; ?><?php endif; ?>">
        				        <?php get_template_part( 'content', 'home_tstmls' ); ?>
        				        </div>
        				        <?php
        				        wp_reset_postdata();
                            endif;
                            endif;
                            endwhile; ?>
                            </div><!-- end .row.even-grid.testimonials-->
                            </div><!-- end .container-->
                            <?php
                            endif;
                            ?>
                            <?php endif; ?>

                            <?php if( get_row_layout() == 'blog_boxes'): ?>
                            <div class="container">
                            <div class="row even-grid testimonials front-blog-wrapper">
                            <?php
                                $number_of_blog_columns = get_sub_field('number_of_blog_columns');
                                $number_of_posts = get_sub_field('number_of_posts');
                                $bcol = 0;
                                if($number_of_columns):
                                switch ($number_of_blog_columns) {
                                    case 1:
                                        $bcol = 12;
                                        break;
                                    case 2:
                                        $bcol = 6;
                                        break;
                                    case 3:
                                        $bcol = 4;
                                        break;
                                }
                                endif;
                                $args = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'nopaging' => true,
                        'post_status' => 'publish'
                        );

                        $i = 0;
                        global $wp_query;
                        $wp_query = new WP_Query( $args );

                        if ( have_posts() ) :

                        while ( have_posts() ) : the_post();

                        $i++; ?>
                        <div<?php if($bcol): ?> class="col-xs-12 col-sm-<?php echo $bcol; ?> s-item"<?php endif; ?>>
                        <?php
                        get_template_part( 'content', 'front_blog' );
                        ?>
                        </div>
                        <?php
                        if($i == $number_of_posts):
                        break;
                        endif;
                        endwhile;

                        do_action( 'genesis_after_endwhile' );
                        endif;

                        wp_reset_query();
                                ?>




            </div><!-- .row-->
</div><!-- .container-->
                            <?php endif; ?>

                        <?php if( get_row_layout() == 'content'): ?>
                        <?php
                            $heading = get_sub_field('heading');
                            $content_editor = get_sub_field('content_editor');
                            $embed = get_sub_field('embed');
                            $enable_expandable_content = get_sub_field('enable_expandable_content');
                            $open_label = get_sub_field('open_label');
                            //$close_label = get_sub_field('close_label');
                            $expandable_content = get_sub_field('expandable_content');
                        ?>
                    <div class="container">
                        <div class="testimonials c-editor-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="c-editor">
                                <?php if($heading): ?>
                                    <h2>
                                        <?php echo $heading; ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if($content_editor): ?>

                                        <?php echo $content_editor; ?>

                                <?php endif; ?>
                                <?php if($embed):?>
                                        <?php echo $embed; ?>
                                <?php endif; ?>
                                <?php if($enable_expandable_content): ?>
                                   <div class="slideout" data-ref="1">
                                   <?php echo $expandable_content;  ?>
                                   </div>
                                   <a class="button slideouttrigger" href="#" data-ref="1"><?php echo $open_label; ?></a>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div><!-- end .container -->
                        <?php endif; ?>



                    <?php if( get_row_layout() == 'accreditation_logos'): ?>
                        <?php
                            $number_of_acclogos_columns = get_sub_field('number_of_acclogos_columns');
                        ?>
                        <?php if( have_rows('columns_set') ): ?>
                            <div class="container">
                                <ul class="row accreditation_logos">
                                <?php
                                $accol = 0;
                                if($number_of_acclogos_columns):
                                switch ($number_of_acclogos_columns) {
                                    case 1:
                                        $accol = 12;
                                        break;
                                    case 2:
                                        $accol = 6;
                                        break;
                                    case 3:
                                        $accol = 4;
                                        break;
                                    case 4:
                                        $accol = 3;
                                        break;
                                    case 5:
                                        $accol = 5;
                                        break;
                                    case 6:
                                        $accol = 2;
                                        break;
                                }
                                endif;
                                ?>
                                <?php while( have_rows('columns_set') ): the_row();
                                    $image_url = wp_get_attachment_url( get_sub_field('image'),'full');
                                    //$image = aq_resize( $image_url, 377, 377, true );
                                    $link = get_sub_field('link');
//                                    $p++;
                                    ?>
                                    <li class="<?php if($accol==5): ?>five-cols <?php else: ?>col-xs-6 col-sm-<?php echo $accol; ?><?php endif; ?>">
                                    <?php if($image_url): ?>
                                        <a href="<?php if($link): echo $link; endif; ?>" target="_blank">
                                            <img src="<?php echo $image_url; ?>" class="img-responsive" />
                                        </a>
                                    <?php endif; ?>
                                    </li>
                                    <?php
                                    endwhile; ?>
                                </ul>
                            </div>
                                <?php endif; ?>
                        <?php endif; ?>

<?php // --   - - - -   VIDEO AND LOGOS SECTION   - - - - -   -- ?>

<?php if( get_row_layout() == 'video_and_logos_adv'):
    $order = get_sub_field('order');
    $color_style = get_sub_field('add_background');
    ;?>
    <div class="<?php if($order!='collapse'): ?>container-fluid<?php endif;?> fluid-boxes">
        <div class="<?php if($order!='collapse'): ?>row even-grid<?php else: ?>container-special<?php endif;?>">
            <?php // -- main video and logos section container -- ?>

            <?php  $video_section = get_sub_field('video_section');?>

            <div class="<?php if($order!='collapse'): ?>col-sm-6 s-item<?php if( $order == 'video_left'): ?> box-left<?php elseif($order == 'video_right'): ?> box-right<?php endif; ?><?php endif;?><?php if($color_style == 'Variation-1'): ?> color-variation-1<?php elseif($color_style == 'Variation-2'): ?> color-variation-2<?php endif; ?> <?php if($order=='collapse'): ?>extra-padding-top<?php endif;?>">
                <?php // -- video section container -- ?>

                <?php
                 echo '<div class="container-special" style="text-align: center;">'.$video_section['video'].'</div>';
                ?>

            </div><?php // -- end of video section container -- ?>

            <div class="<?php if($order!='collapse'): ?>col-sm-6 s-item<?php if($order == 'video_left' ): ?> box-right<?php elseif( $order == 'video_right'): ?> box-left<?php endif; ?><?php endif;?><?php if($color_style == 'Variation-1'): ?> color-variation-1<?php elseif($color_style == 'Variation-2'): ?> color-variation-2<?php endif; ?><?php if($order=='collapse'): ?> extra-padding-top<?php endif;?>"> <!-- logos section container -->
            <?php

            if ($order=='collapse') {echo '<div class="container" style="background: rgba(0,0,0,0)">';}

            if( have_rows('accreditation_logos_section_repeater') ):

                // loop through the rows of data
                while ( have_rows('accreditation_logos_section_repeater') ) : the_row();


                    if( have_rows('accreditation_logos_section') ):
                        while ( have_rows('accreditation_logos_section') ) : the_row();

                            $als_heading = get_sub_field('heading');

                            if ($als_heading!='')
                            echo "<h2 class='text-center extra-padding'>".$als_heading."</h2>";

                            $number_of_acclogos_columns = get_sub_field('number_of_acclogos_columns'); ?>
                            <?php if( have_rows('columns_set') ): ?>
                                <ul class="row accreditation_logos">
                                    <?php
                                    $accol = 0;
                                    if($number_of_acclogos_columns):
                                        switch ($number_of_acclogos_columns) {
                                            case 1:
                                                $accol = 12;
                                                break;
                                            case 2:
                                                $accol = 6;
                                                break;
                                            case 3:
                                                $accol = 4;
                                                break;
                                            case 4:
                                                $accol = 3;
                                                break;
                                            case 5:
                                                $accol = 5;
                                                break;
                                            case 6:
                                                $accol = 2;
                                                break;
                                        }
                                    endif;
                                    ?>
                                    <?php while( have_rows('columns_set') ): the_row();
                                        $image_url = get_sub_field('image');
                                        $link = get_sub_field('url');
                                        ?>
                                        <li class="<?php if($accol==5): ?>five-cols <?php else: ?>col-xs-6 col-sm-<?php echo $accol; ?><?php endif; ?>">
                                            <?php if($image_url): ?>
                                        <a href="<?php if($link): echo $link; endif; ?>" target="_blank">
                                            <img src="<?php echo $image_url; ?>" class="img-responsive" />
                                        </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php
                                    endwhile; ?>
                                </ul>
                            <?php endif;
                        endwhile;
                    endif;
                endwhile; // inner loop accreditation_logos_section
            endif;



                if ($order=='collapse') {echo '</div>';}


            ?>
            </div><?php // -- end of logos section container -- ?>
        </div><?php // -- .row-- ?>
    </div><?php // -- end of main video and logos section container -- ?>


<?php endif; ?>

<?php // --   - - - -   END OF VIDEO AND LOGOS SECTION   - - - - -   -- ?>

                        <?php endwhile; ?>
            <?php endif; /*end section_elements*/ ?>


            </section><!-- -- end .section-item -->
        <?php endwhile; ?>

    <?php endif; /*end sections_area*/ ?>

    <?php get_sidebar('subscribe_gpm'); ?>

    <?php
    if ( get_field('instagram') ) :
      $d = [
        'token' => get_field('insta_token','apikey'),
        'inst'  => get_field('instagram'),
      ];
      ?>

      <div class="container" style="margin-bottom: 20px;">
        <div class="row">
          <div class="col-md-12">
            <?php
            $d['token'] && do_shortcode(
              "[instagram 
              type='{$d['inst']['type']}' 
              count='{$d['inst']['count']}' 
              columns='{$d['inst']['columns']}'
              rest='{$d['inst']['rest']}' 
              onclick='{$d['inst']['onclick']}' 
              user-details='{$d['inst']['user-details']}' 
              img-resolution='{$d['inst']['img-resolution']}'
              text_before_logo='{$d['inst']['text_before_logo']}'
              text_before_logo_size='{$d['inst']['text_before_logo_size']}'
              logo_size='{$d['inst']['logo_size']}' 
              token='{$d['token']}']"
            );
            ?>
          </div>
        </div>
      </div>
    <?php
    endif;
    ?>

<div class="popup-iframe-holder">
    <div class="close-iframe">X</div>
    <div class="popup-iframe-frame">
        <iframe class="iframe-popup" name="iframe1" width="1000" height="600"></iframe>
    </div>
</div>
<?php

    if (get_field('place_on_all_site_pages', 'option'))
        get_sidebar('subscribe_gpm');
}

remove_action('genesis_sidebar', 'genesis_do_sidebar');

genesis();
