<?php
/**
 * Template Name: Testimonials Page Template
 */

//* This file handles single entries, but only exists for the sake of child theme forward compatibility.

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_archive');
function tourtiger_archive(){ ?>
<?php $site_layout = genesis_site_layout(); ?>
<section class="tour-page-content">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?> left-col">
                    <section class="testimonials">
                    <div class="row">
                    <?php //while ( have_posts() ) : the_post(); ?>
                    <?php //get_template_part( 'content', 'tour_tstml' ); ?>
                    <?php //endwhile; ?>
<?php                    	global $post;
 
// arguments, adjust as needed
$args = array(
'post_type' => 'testimonial',
'posts_per_page' => -1,
'post_status' => 'publish',
'paged' => get_query_var( 'paged' )
);
 

global $wp_query;
$wp_query = new WP_Query( $args );
 
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
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-4 right-col">
                
                
                </div>
                <?php endif; ?>
            </div>
        </div>
</section>
<?php global $post; ?>
            
            <?php if(get_field('tiles_area')): ?>
            
            <?php while(has_sub_field('tiles_area')): ?>
            <?php
                $section_headline = get_sub_field('section_headline');
                $number_of_columns = get_sub_field('number_of_columns');
                $linked_to_hero_cta = get_sub_field('linked_to_hero_cta');
            ?>
    <section class="<?php if($section_headline == 'Featured tours'): ?>featured-tours<?php else: ?>testimonials<?php endif; ?>"<?php if($linked_to_hero_cta): ?> data-scroll-index='110'<?php endif; ?>>
        <div class="container">
            <!--<div class="row">
                <div class="col-sm-12">
                    <h3>
                        <hr />
                        <span><?php echo $section_headline; ?></span>
                        <hr />
                    </h3>
                </div>
            </div>-->
            <div class="row even-grid">
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
                        if (have_rows('tiles')):
                        while(have_rows('tiles')): the_row();
                        
                        if( get_row_layout() == 'tours' ):
                            $pulled_specific = get_sub_field('pull_specific_from');
                            if($pulled_specific):
                            $post = $pulled_specific;
                            setup_postdata( $post );
                            ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?> s-item<?php endif; ?>">
                            <?php get_template_part( 'content', 'feat_tours' ); ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                            endif;/*end if pulled_specific*/
                        endif;/*end if get_row_layout tours*/
                        if( get_row_layout() == 'categories' ): ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?> s-item<?php endif; ?>">
                            <?php get_template_part( 'content', 'feat_cats' ); ?>
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

    <?php //get_sidebar('subscribe'); ?>

<?php }

remove_action('genesis_sidebar', 'genesis_do_sidebar');

genesis();