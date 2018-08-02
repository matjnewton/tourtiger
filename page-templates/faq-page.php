<?php
/**
 * Template Name: FAQ Page Template
 */

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_sub_contents');
function tourtiger_sub_contents(){ ?>
<?php $site_layout = genesis_site_layout(); ?>
<?php if(have_rows('sections')): ?>
<?php while(have_rows('sections')): the_row(); ?>
    <?php if( get_row_layout() == 'featured_section'): ?>
    <?php $headline = get_sub_field('headline'); ?>
    <?php $text_area = get_sub_field('text_area'); ?>
    <section class="featured-section">
        <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if($headline): ?>
                        <h2>
                        <?php echo $headline; ?>
                        </h2>
                        <?php endif; ?>
                                    
                        <?php if($text_area): ?>
                        <p>
                        <?php echo $text_area; ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
    </section>
    <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
                        
<section class="tour-page-content faq-page-content">
        
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-6<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
                    <?php
                    if( have_rows('question_answer_section') ): ?>
    <div class="questions-wrapper">
    <?php                
    while ( have_rows('question_answer_section') ) : the_row(); ?>
        <section class="questions">
        <?php
        if( get_row_layout() == 'question_answer'):
                   $headline = get_sub_field('headline');
                   ?>
                   <?php if($headline): ?>
                   <h2>
                       <?php echo $headline;?>
                   </h2>
                   <?php endif; ?>
                        <?php if(have_rows('question_answer_pair')): ?>
                        <div>
                            <?php while(have_rows('question_answer_pair')): the_row(); ?>
                                <?php 
                                    $question = get_sub_field('question');
                                    $answer = get_sub_field('answer');
                                 ?>
                                
                                <p>
                                    <strong><?php echo $question; ?></strong>
                                    <?php echo $answer; ?>
                                </p>
                                
                            <?php endwhile; ?>
                        </div>        
                        <?php endif; ?>
                    
        <?php            
        endif; ?>
        </section>
    <?php
    endwhile; ?>
    </div>
                    <?php endif; ?>
                </div>
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-6 right-col">
                       <div class="faq-cf">
                    <?php echo do_shortcode('[gravityform id="2" name="Newsletter"]'); ?>
                       </div>
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
