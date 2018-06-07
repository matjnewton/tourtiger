<?php
/**
 * Template Name: Front-2 Page Template
 */

//add_action('genesis_after_header', 'tourtiger_after_header');


/*add_action('genesis_before_content', 'tourtiger_before_content');
function tourtiger_before_content(){ ?>
    
<?php }*/

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_sub_contents');
function tourtiger_sub_contents(){ ?>
<?php $site_layout = genesis_site_layout(); ?>    
            
            
    <div class="margin-spacing"></div>
    <?php global $post; ?>
    <?php if( have_rows('testimonial_tiles_area') ): ?>
            
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
    
        
    <section class="reasons">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
                <?php if(get_field('headline_content')): ?>
                    <?php while(has_sub_field('headline_content')): 
                        $headline_align = get_sub_field('headline_text_align');
                    ?>
                        <div class="headline-content">
                            <h3<?php if($headline_align == 'Center'): echo ' class="text-center"'; endif;?>>
                                <?php the_sub_field('headline'); ?>
                            </h3>
                            <div class="subcontent">
                                <?php the_sub_field('subcontent'); ?>
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
                <div class="col-sm-4 front-right-col">
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
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <?php get_sidebar('subscribe'); ?>
    
<?php }

remove_action('genesis_sidebar', 'genesis_do_sidebar');

genesis();
