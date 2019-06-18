<?php
/**
 * Template Name: Testimonials Page Template
 */

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_archive');

function tourtiger_archive() {

    $site_layout = genesis_site_layout();

    /**
     * Include additional styles
     */
    if ( get_field( 'is_dzv_teti_style' ) ) :
        echo Testimonial::get_styles( get_field( 'dzv_teti_style' ) );
    endif;
    ?>

    <section class="tour-page-content">
        <div class="container">
            <div class="row">
                <?php
                /**
                 * Put class accordin to chosen layout
                 */
                if ( 'content-sidebar' == $site_layout ) :
                    $div_class = 'col-sm-12 col-md-10 col-lg-8';
                elseif ( 'full-width-content' == $site_layout ) :
                    $div_class = 'col-sm-12';
                endif;
                ?>

                <div class="<?=$div_class;?> left-col">
                    <section class="testimonials">
                        <div class="row">
                            <?php
                            /**
                             * POst data
                             */
                            global $post;
                            $args = array(
                                'post_type'      => 'testimonial',
                                'posts_per_page' => 10,
                                'post_status'    => 'publish',
                                'paged'          => get_query_var( 'paged' )
                            );

                            /**
                             * Generate WP_Guery request
                             */
                            global $wp_query;
                            $wp_query = new WP_Query( $args );

                            /**
                             * Loop testimonials
                             */
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'content', 'tstmls' );
                                endwhile;

                                do_action( 'genesis_after_endwhile' );
                            endif;
                            wp_reset_query();
                            ?>
                        </div>
                    </section>
                </div>

                <?php
                /**
                 * I dont know why a founder of code below wrote that.
                 */
                if ( 'content-sidebar' == $site_layout ):
                    echo '<div class="col-sm-4 right-col"></div>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php
    global $post;
    if ( get_field('tiles_area') ) :
        while( has_sub_field( 'tiles_area' ) ) :

            /**
             * Core variables
             */
            $section_headline   = get_sub_field('section_headline');
            $number_of_columns  = get_sub_field('number_of_columns');
            $linked_to_hero_cta = get_sub_field('linked_to_hero_cta');

            /**
             * Selector's variables
             */
            $div_attrs          = $linked_to_hero_cta ? "data-scroll-index='110'" : '';
            $div_class          = $section_headline == 'Featured tours' ? 'featured-tours' : 'testimonials';

            /**
             * Grid variable
             */
            $col = 0;
            switch ($number_of_columns) :
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
            endswitch;
            ?>

            <section class="<?=$div_class?>" <?=$div_attrs;?>>
                <div class="container">
                    <div class="row even-grid">
                        <?php
                        if ( have_rows( 'tiles' ) ) :
                            while ( have_rows( 'tiles' ) ) :
                                the_row();

                                // Tours layout
                                if( get_row_layout() == 'tours' ):
                                    $pulled_specific = get_sub_field( 'pull_specific_from' );

                                    if( $pulled_specific ):

                                        // Init post
                                        $post = $pulled_specific;
                                        setup_postdata( $post );

                                        // Class
                                        $div_class = $col == 5 ? 'five-cols' : "col-sm-{$col} s-item";

                                        // View
                                        echo "<div class='{$div_class}'></div>";
                                            get_template_part( 'content', 'feat_tours' );
                                        echo '</div>';

                                        wp_reset_postdata();
                                    endif;
                                endif;

                                // Categories layout
                                if ( get_row_layout() == 'categories' ) :
                                    $div_class = $col == 5 ? 'five-cols' : "col-sm-{$col} s-item";

                                    // View
                                    echo "<div class='{$div_class}'></div>";
                                        get_template_part( 'content', 'feat_cats' );
                                    echo '</div>';
                                endif;

                                // Testimonials
                                if( get_row_layout() == 'testimonials' ):
                                    $pulled_specific = get_sub_field('pull_specific_from');
                                    $div_class = $col == 5 ? 'five-cols' : "col-sm-{$col} s-item";

                                    if ( $pulled_specific ) :
                                        $post = $pulled_specific;
                				        setup_postdata( $post );

                                        // View
                                        echo "<div class='{$div_class}'></div>";
                                            get_template_part( 'content', 'home_tstmls' );
                                        echo '</div>';
                				        wp_reset_postdata();
                                    endif;
                                endif;

                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </section>

            <?php
        endwhile;
    endif;

    if (get_field('place_on_all_site_pages', 'option'))
        get_sidebar('subscribe_gpm');
}



remove_action('genesis_sidebar', 'genesis_do_sidebar');

genesis();
