<?php
$hero_headline_dropshadow = get_field('hero_headline_dropshadow', 'option');
$hero_content_dropshadow = get_field('hero_content_dropshadow', 'option');
?>
<?php    
if( have_rows('hero_area') ):
    while ( have_rows('hero_area') ) : the_row();
        if( get_row_layout() == 'hero'):
        $text_align = get_sub_field('text_align');
    ?>
<section class="banner"<?php if($text_align == 'Center'): echo ' style="text-align:center;"'; endif;?>>
<?php 
        endif;
    endwhile;
    else:
    ?>
<section class="banner">  
<?php    
endif;
?>

<?php    
if( have_rows('hero_area') ):
    while ( have_rows('hero_area') ) : the_row();
        if( get_row_layout() == 'hero'):
        
        /*$image = get_sub_field('image'); 
        $gradient = get_sub_field('gradient');
        $background_type = get_sub_field('background_type');*/
        $headline = get_sub_field('headline');
        $content_editor = get_sub_field('content_editor');
        $cta_button_text = get_sub_field('cta_button_text');
        $cta_onclick = get_sub_field('cta_onclick');
        $button_type = get_sub_field('button_link_type');
        
        $book_tours = get_sub_field('book_tours_link');
        $cta_button_radius = get_sub_field('cta_button_radius');
        $text_align = get_sub_field('text_align');
    ?>
     
        
        <div class="banner-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="headline-group">
                    <?php if($headline): ?>
                    <h2 class="headline<?php if($hero_headline_dropshadow == 'Light'): echo ' light'; elseif($hero_headline_dropshadow == 'Medium'): echo ' medium-shadow'; elseif($hero_headline_dropshadow == 'Strong'): echo ' strong'; else: echo ' none'; endif;?>">
                        <span><?php echo $headline; ?></span>
                    </h2>
                    <?php endif; ?>
                    <?php if($content_editor): ?>
                    <div class="hidden-xs c-editor subheadline<?php if($hero_content_dropshadow == 'Light'): echo ' light'; elseif($hero_headline_dropshadow == 'Medium'): echo ' medium-shadow'; elseif($hero_headline_dropshadow == 'Strong'): echo ' strong'; else: echo ' none'; endif;?>">
                        <?php echo $content_editor; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($cta_button_text): ?>
                    <div class="book-btn-wrapper">
                        <a <?php if($button_type == 'Link to Featured tours'): ?>data-scroll-nav='110'<?php endif; ?> href="<?php if($button_type == 'Link to Featured tours'): echo '#'; else: echo $book_tours; endif; ?>"<?php if($cta_onclick): ?> onclick="<?php echo $cta_onclick; ?>"<?php endif; ?> class="book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                            <?php echo $cta_button_text; ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        
        
<?php 
        endif;
    endwhile;
endif;
?>

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

</section><!-- end banner-->