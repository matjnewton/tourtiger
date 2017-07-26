<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

//* This file handles single entries, but only exists for the sake of child theme forward compatibility.
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_sub_contents');
function tourtiger_sub_contents(){ ?>
<?php $site_layout = genesis_site_layout();?> 
        
<section class="tour-page-content testimonials">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-12 col-md-offset-2 col-md-8<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?> blog-left-col">
                    <?php while ( have_posts() ) : the_post(); 

                    /**
                     * Include additional styles
                     */
                    if ( get_field( 'is-style'' ) ) :
                        echo Testimonial::get_styles( get_field( 'testimonial-style' ) );
                        ?>
                            <script>
                                ;(function($){
                                    $(function(){
                                        $('html').addClass('<?php the_field( 'testimonial-style' ); ?>');
                                    });
                                })(jQuery);
                            </script>
                
                        <?php
                    endif;
                    ?>

                    <?php get_template_part( 'content', 'tstmls' ); ?>
                            
                    <?php endwhile; // end of the loop. ?>
                </div>
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-4 blog-right-col">
                    
                    
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('above-sidebar') ) : ?>
<?php endif; ?>        
                    
                    
                    <?php if(get_field('universal_sidebar', 'option')): ?>
                           <?php while(has_sub_field('universal_sidebar', 'option')): ?>
                           
                           <?php if( get_row_layout() == 'content_editor' ): ?>
                           <div class="widget-item"><div class="row"><div class="col-sm-10 col-sm-offset-1">
                           <?php $content = get_sub_field('content'); 
                               echo $content;
                           ?>
                           </div></div></div>
                           <?php endif; ?>
                           
                           <?php if( get_row_layout() == 'text_area' ): ?>
                           <div class="widget-item"><div class="row"><div class="col-sm-10 col-sm-offset-1">
                           <?php $content = get_sub_field('content'); 
                               echo $content;
                           ?>
                           </div></div></div>
                           <?php endif; ?>
                           
                           <?php endwhile; ?>
                    <?php endif; ?>
                    
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('below-sidebar') ) : ?>
<?php endif; ?>
                    
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
            <div class="row">
                <div class="col-sm-12">
                    <h2>
                        <!--<hr />-->
                        <span><?php echo $section_headline; ?></span>
                        <!--<hr />-->
                    </h2>
                </div>
            </div>
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
                        if (have_rows('tiles')):
                        while(have_rows('tiles')): the_row();
                        
                        if( get_row_layout() == 'tours' ):
                            $pulled_specific = get_sub_field('pull_specific_from');
                            if($pulled_specific):
                            $post = $pulled_specific;
                            setup_postdata( $post );
                            ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?><?php endif; ?>">
                            <?php get_template_part( 'content', 'feat_tours' ); ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                            endif;/*end if pulled_specific*/
                        endif;/*end if get_row_layout tours*/
                        if( get_row_layout() == 'categories' ): ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?><?php endif; ?>">
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
