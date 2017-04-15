<?php $site_layout = genesis_site_layout(); ?>
<?php
$tiles_area = get_post_meta( get_the_ID(), 'tiles_area', true );
if( $tiles_area ):
    for( $tl = 0; $tl < $tiles_area; $tl++ ):
        $section_headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_section_headline', true );
        $custom_headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_custom_headline', true );
        $text_align = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_text_align', true );
        $number_of_columns = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_number_of_columns', true );
        $number_of_blog_columns = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_number_of_blog_columns', true );
        $linked_to_hero_cta = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_linked_to_hero_cta', true );
        $number_of_blog_tiles = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_number_of_blog_tiles', true );
        $headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_headline', true );
        $content = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_content', true );
        $embed = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_embed', true );
        $testimonials_type = get_option( 'options_testimonials_type' );
?>
<section class="<?php if($section_headline == 'Featured tours'): ?>featured-tours<?php elseif ($section_headline == 'Testimonials'): ?>testimonials<?php elseif($section_headline == 'Blog'): ?>testimonials front-blog-wrapper<?php elseif($section_headline == 'Content'): ?>testimonials c-editor-wrapper<?php endif; ?><?php if($text_align == 'Center'):?> text-center<?php endif; ?>"<?php if($linked_to_hero_cta): ?> data-scroll-index='110'<?php endif; ?>>
        <div class="container">
            <?php if($custom_headline): ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2>
                        <span><?php echo $custom_headline; ?></span>
                    </h2>
                </div>
            </div>
            <?php endif; ?>
            <div class="row-eq-height">
                
                <?php 
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
                    
                    else:
                    switch ($number_of_blog_columns) {
                        case 1:
                            $col = 12;
                            break;
                        case 2:
                            $col = 6;
                            break;
                        case 3:
                            $col = 4;
                            break;
                    }
                    endif;
                    ?>
                    <?php if($section_headline == 'Content'): ?>
                        <div class="col-sm-12">
                            <div class="c-editor">
                        <?php if($headline): ?>
                            <h2>
                                <?php echo $headline; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if($content): ?>
                            
                                <?php echo $content; ?>
                                
                        <?php endif; ?>
                        <?php if($embed):?>
                                <?php echo $embed; ?>
                        <?php endif; ?>
                            </div>
                              
                        </div>
                    <?php endif; ?>
                    <?php if($section_headline == 'Blog'): 
                    
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
                        <div<?php if($col): ?> class="col-xs-12 col-sm-<?php echo $col; ?> col-eq-height"<?php endif; ?>>
                        <?php
                        get_template_part( 'content', 'front_blog' );
                        ?>
                        </div>
                        <?php
                        if($i == $number_of_blog_tiles):
                        break;
                        endif; 
                        endwhile;
                        
                        do_action( 'genesis_after_endwhile' );
                        endif;
                         
                        wp_reset_query();
                    endif;?>
                    <?php
                        $tile_rows = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles', true );
                        
                        if($tile_rows && ($section_headline == 'Testimonials') && ($testimonials_type == 'Scrolling')): ?>
                        <div class="col-sm-12">
        <div class="testimonials-slider-wrapper">
                        <div class="testimonials-slider">
                            <ul class="slides">
                            <?php 
                                foreach( (array) $tile_rows as $tile_count => $tile_row ):
                                    switch( $tile_row ):
                                        case 'testimonials':
                                            $pulled_specific = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_pull_specific_from', true );
                                            if($pulled_specific):
                                                $post = $pulled_specific;
                        				        setup_postdata( $post ); 
                        				        get_template_part( 'content', 'scrltstmls_gpm' ); 
                        				        wp_reset_postdata();
                                            endif;
                                        break;
                                    endswitch;
                                endforeach; 
                            ?>
                            </ul>
                        </div>
        </div>
        </div>
                        <?php else:
                        $tile_rows = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles', true );
                            foreach( (array) $tile_rows as $tile_count => $tile_row ):
                                    switch( $tile_row ):
                                        case 'tours':
                                        $pulled_specific = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_pull_specific_from', true );
                                        $button_label = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_button_label', true );
                                        if($pulled_specific):
                                        $post = $pulled_specific;
                                        setup_postdata( $post );
                            ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?> col-eq-height">
                            <?php //get_template_part( 'content', 'feat_tours' ); ?>
                            <?php include(locate_template('content-front_feat_tours_gpm.php' )); ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                            endif;/*end if pulled_specific*/
                                        break;/*end if get_row_layout tours*/
                                        case 'categories':
                        ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?> col-eq-height">
                            <?php //get_template_part( 'content', 'feat_cats' ); ?>
                            <?php include(locate_template('content-front_feat_cats_gpm.php' )); ?>
                            </div>
                        <?php
                                        break;
                                        case 'testimonials':
                                        $pulled_specific = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_pull_specific_from', true );
                                        if($pulled_specific):
                                        $post = $pulled_specific;
                                        setup_postdata( $post ); 
        				    ?>
        				        <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?>">
        				        <?php get_template_part( 'content', 'home_tstmls' ); ?>
        				        </div>
        				        <?php 
        				        wp_reset_postdata();
                            endif;
                                    break;
                                endswitch;
                            endforeach;
                        endif;
                       ?> 
                </div>
            </div>
    </section>
<?php      
    endfor;
endif;  
?>

<?php
   $mca_rows = get_post_meta( get_the_ID(), 'multi_column_area', true );
   if ($mca_rows):
?>
<section class="multi-column-area text-center">
        <div class="container">
<?php
        foreach( (array) $mca_rows as $mca_count => $mca_row ):
            switch( $mca_row ):
                case 'heading':
                    $text = get_post_meta( get_the_ID(), 'multi_column_area_' . $mca_count . '_text', true );
                    if($text):
?>
            <h2 class="text-center"><?php echo $text; ?></h2>
<?php 
                    endif;
                break;
                case '3_column_content':
                    $line_under_subheading = get_post_meta( get_the_ID(), 'multi_column_area_' . $mca_count . '_line_under_subheading', true );
                    $content = get_post_meta( get_the_ID(), 'multi_column_area_' . $mca_count . '_content', true );
                    if( $content ):
?>
            <ul class="row">
<?php
                        for( $tcc = 0; $tcc < $content; $tcc++ ):
                            $subheading = get_post_meta( get_the_ID(), 'multi_column_area_' . $mca_count . '_content_' . $tcc . '_subheading', true );
                            $textarea = nl2br(get_post_meta( get_the_ID(), 'multi_column_area_' . $mca_count . '_content_' . $tcc . '_textarea', true ));
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
                        endfor;
?>
            </ul>
<?php
                    endif;
                break;
            endswitch;
        endforeach;
?>
        </div>
</section>
<?php
    endif; //$mca_rows
?>

<?php
$headline_content = get_post_meta( get_the_ID(), 'headline_content', true );
if( $headline_content ):
?>
<section class="reasons">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8 col-lg-9<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
                <?php 
                    if( $headline_content ): 
                        for( $hc = 0; $hc < $headline_content; $hc++ ):
                            $headline_align = get_post_meta( get_the_ID(), 'headline_content_' . $hc . '_headline_text_align', true );
                            $headline = get_post_meta( get_the_ID(), 'headline_content_' . $hc . '_headline', true );
                            $subcontent = apply_filters('the_content', get_post_meta( get_the_ID(), 'headline_content_' . $hc . '_subcontent', true ));
                            $embed = get_post_meta( get_the_ID(), 'headline_content_' . $hc . '_embed', true );
                            $view_tours = get_post_meta( get_the_ID(), 'headline_content_' . $hc . '_view_tours_link', true );
                ?>
                    <div class="headline-content">
                        <h2<?php if($headline_align == 'Center'): echo ' class="text-center"'; endif;?>>
                            <?php echo $headline; ?>
                        </h2>
                        <div class="subcontent">
                                <?php echo $subcontent; ?>
                                <?php 
                                if($embed): echo $embed; endif;
                                ?>
                        </div>
                                <?php 
                                if($view_tours):
                                ?>
                        <div class="view-tours-wrapper">
                            <a class="view-tours-btn" href="<?php echo $view_tours; ?>">View tours</a>
                        </div>
                                <?php endif; ?>
                            
                    </div>
                <?php 
                        endfor;
                    endif; 
                ?>
                </div>
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-4 col-lg-3 front-right-col">
                    <?php 
                        $us_rows = get_option( 'options_universal_sidebar' );
                        if($us_rows): ?>
                           <?php
                               foreach( (array) $us_rows as $us_count => $us_row ):
                                switch( $us_row ):
                                    case 'content_editor':
                                        $content = get_option( 'options_universal_sidebar_' . $us_count . '_content' );
                            ?>
                           <div class="widget-item">
                           <?php echo $content; ?>
                           </div>
                           <?php 
                                    break;
                                    case 'text_area':
                                        $content = get_option( 'options_universal_sidebar_' . $us_count . '_content' );
                            ?>
                           <div class="widget-item">
                           <?php echo $content; ?>
                           </div>
                           <?php
                                    break;
                                endswitch;
                               endforeach; 
                            ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
</section>
<?php
endif;
?>

<?php
$sections = get_post_meta( get_the_ID(), 'sections_area', true );
if( $sections ):
    for( $i = 0; $i < $sections; $i++ ):
        $heading = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_heading', true ) );
        //radio buttons
        $heading_align = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_heading_text_align', true );
        //checkboxes
        $custom_options = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_custom_options', true );
        //select
        $custom_margin_presets = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_custom_margin_presets', true );
    ?>
<section class="front-page-section fps<?php echo $i; ?><?php if($custom_margin_presets == "50px 0px 40px 0px"): ?> custom-margin-preset1<?php endif; ?>"<?php if( is_array($custom_options) && in_array('Linked to Hero CTA', $custom_options)): ?> data-scroll-index='110'<?php endif; ?>>
    <?php //var_dump($heading_align); ?>
    <?php if($heading): ?>
    <div class="container">
        <h2 class="section-heading<?php if($heading_align == 'Center'): echo ' text-center'; endif;?>">
        <?php echo $heading; ?>
        </h2>
    </div><!-- .container-->
    <?php endif; ?>
    <?php
        $rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements', true );
        foreach( (array) $rows as $count => $row ):
            switch( $row ):
                case 'heading':
                    $text = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_text', true ) );
                    $text_align = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_text_align', true );
                ?>
        <?php if($text): ?>
    <div class="container">
        <h2 class="section-heading<?php if($text_align == 'Center'): echo ' text-center'; endif;?>">
        <?php echo $text; ?>
        </h2>
    </div><!-- .container-->
        <?php endif;
                break;
                case '3_column_content':
                $line_under_subheading = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_line_under_subheading', true );
                $text = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_heading', true ) );
                ?>
    <div class="container">
        <div class="multi-column-area text-center">
        <?php if($text): ?>
            <h2 class="text-center"><?php echo $text; ?></h2>
        <?php endif; ?> 
        <?php $columns_set = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_columns_set', true ); ?>
        <?php
                if( $columns_set ):
        ?>
            <ul class="row">
        <?php
                    for( $j = 0; $j < $columns_set; $j++ ):
                        $subheading = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_columns_set_' . $j . '_subheading', true ));
                        $textarea = nl2br( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_columns_set_' . $j . '_textarea', true ));
        ?>
            <li class="col-sm-4 col-md-4">    
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
                    endfor;
        ?>
            </ul>
        <?php
                endif;
        ?>                   
        </div>
    </div><!-- end .container-->            
                <?php
                break;
                case 'heading_content':
                ?>
    <div class="container">
        <div class="row reasons">
            <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-7 col-md-8 col-lg-9<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
            <?php $contents_set = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_contents_set', true ); ?>
        <?php
                if( $contents_set ):
                    for( $k = 0; $k < $contents_set; $k++ ):
                        $heading_align = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_contents_set_' . $k . '_heading_text_align', true );
                        $heading = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_contents_set_' . $k . '_heading', true );
                        $content_editor = apply_filters('the_content', get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_contents_set_' . $k . '_content_editor', true ));
                        $embed = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_contents_set_' . $k . '_embed', true ));
                        $view_tours = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_contents_set_' . $k . '_view_tours_link', true ));
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
                    <a class="view-tours-btn" href="<?php echo $view_tours; ?>">View tours</a>
                    </div>
                    <?php endif; ?>
                </div>
        <?php
                    endfor;
                endif;
        ?>        
            </div>
            <?php if ( 'content-sidebar' == $site_layout ): ?>
            <div class="col-sm-5 col-md-4 col-lg-3 front-right-col">
            <?php
            $us_rows = get_option( 'options_universal_sidebar' );
            //var_dump($us_rows);
            if($us_rows):
            foreach( (array) $us_rows as $us_count => $us_row ):
            switch( $us_row ):
                case 'content_editor':
                $content = get_option( 'options_universal_sidebar_' . $us_count . '_content' );
                ?>
                <div class="widget-item">
                <?php echo $content; ?>
                </div>
                <?php
                break;
                case 'text_area':
                $content = get_option( 'options_universal_sidebar_' . $us_count . '_content' );
                ?>
                <div class="widget-item">
                <?php echo $content; ?>
                </div>
                <?php
                break;
            endswitch;
            endforeach;
            endif;
            ?>
            </div>
            <?php endif; ?>
            
        </div><!-- end .reasons-->
    </div><!-- end .container-->
                <?php
                break; //end of heading_content
                case 'map':
                $custom_heading = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_custom_heading', true );
                $center = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_map_center_address', true );
                $zoom = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_zoom', true );
                $content = '[bgmp-map center="'.$center.'" zoom="'.$zoom.'"]';
                ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
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
                <?php
                break;
                case 'fluid_boxes':
                ?>
    <div class="container-fluid fluid-boxes">
        <div class="row even-grid">
            <?php
                $bs_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                    if($bs_rows):
                    foreach( (array) $bs_rows as $bs_count => $bs_row ):
                        switch( $bs_row ):
                            case 'content_button':
                                $pull = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_pull', true );
                                $color_style = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_background_color_style', true );
                                $heading = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_heading', true );
                                $textarea = nl2br(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_textarea', true ));
                                $button_text = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_button_text', true ));
                                $button_link = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_button_link', true ));
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
                    <div class="view-btn-wrapper">
                        <div class="view-tour-btn">
                            <a href="<?php if($button_link): echo $button_link; else: ?>#<?php endif; ?>">
                            <?php echo $button_text; ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>                 	
            </div>
                            <?php
                            break; //end of content_button
                            case 'image':
                            $pull = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $bs_count . '_pull', true );
                            $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_boxes_set_' . $bs_count . '_image', true );
                            $image_url = wp_get_attachment_url( $img,'full');
                            ?>
            <?php if($image_url): ?>
            <div class="col-sm-6 s-item<?php if( is_array($pull) && in_array('left', $pull)): ?> box-left<?php elseif(is_array($pull) && in_array('right', $pull)): ?> box-right<?php endif; ?>" style="background-image:url('<?php echo $image_url; ?>'); background-size:cover; background-position:center center; min-height:410px;"></div>
            <?php endif; ?>
                            <?php
                            break;
                            ?>
            <?php if((($bs_count % 2) == 0)): ?>
            <hr class="col-sm-12" />
            <?php endif; ?>
                            <?php
                        endswitch;
                    endforeach;
                    endif;
            ?>
        </div><!-- .row-->
    </div><!-- .fluid-boxes-->
                <?php
                break;
                case 'image_gallery':
                    $images = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_gallery', true );
                    ?>
    <div class="container-fluid fluid-gallery photo-gallery">
        <div class="row">
            <?php if( $images ): ?>
                <?php foreach( $images as $image ): ?>
                    <?php 
                    $img_url = wp_get_attachment_url($image);
                    //$img_url = $image['url'];
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
                <?php
                break; //end image_gallery
                case 'tour_boxes':
                    $number_of_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_columns', true );
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
    <div class="container">
        <div class="featured-tours featured-tours-section">     
            <div class="row-eq-height">
            <?php
                $bs_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                if($bs_rows):
                foreach( (array) $bs_rows as $tb_count => $bs_row ):
                        switch( $bs_row ):
                            case 'tours':
                            $button_label = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_label', true );
                            $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_pull_specific_from', true );
                            if($pulled_specific):
                            $post = $pulled_specific;
                            setup_postdata( $post );
                            ?>
                <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?> col-eq-height">
                <?php include(locate_template('content-front_feat_tours_gpm.php' )); ?>
                </div>
                            <?php
                       wp_reset_postdata();
                       endif;/*end if pulled_specific*/ 
                    ?>
                            <?php
                            break;
                            case 'categories':
                            $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_boxes_set_' . $tb_count . '_image', true );
                            $image_url = wp_get_attachment_url( $img,'full');
                            $headline = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_heading', true ));
                            $button_label = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_label', true ));
                            $third_party = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_third_party', true );
                            $use_as_integration_link = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_use_as_third_party_integration_link', true );
                            $link = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_link', true ));
                            $excerpt = nl2br(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_excerpt', true ));
                            $mobd = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_multi_option_button_dropdown', true );
                               
                            ?>
                <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?> col-eq-height">
                <?php include(locate_template('content-frontbox_feat_cats_gpm.php' )); ?>
                </div>
                            <?php
                            break;
                        endswitch;
                endforeach;
                endif;
            ?>
            </div>
        </div><!-- end .featured-tours-->
    </div><!-- end .container-->
                <?php
                break;
                case 'tour_links':
                $ls_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_links_set', true );
                ?>
    <div class="container container960">
        <ul class="row link-tours">            
                <?php
                if($ls_rows):
                foreach( (array) $ls_rows as $tl_count => $ls_row ):
                        switch( $ls_row ):
                            case 'tours':
                                $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_links_set_' . $tl_count . '_pull_specific_from', true );
                                $button_label = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_links_set_' . $tl_count . '_button_label', true ));
                                if($pulled_specific):
                                    $post = $pulled_specific;
                                    setup_postdata( $post );
                                    include(locate_template('partials/content-tour_links_gpm.php' ));
                                    wp_reset_postdata();
                                endif;/*end if pulled_specific*/
                            break;
                            case 'categories':
                                $heading = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_links_set_' . $tl_count . '_heading', true ));
                                $button_label = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_links_set_' . $tl_count . '_button_label', true ));
                                $link = esc_html(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_links_set_' . $tl_count . '_link', true ));
                                include(locate_template('partials/content-categories_links_gpm.php' ));
                            break;
                        endswitch;
                endforeach;
                endif;
                ?>
        </ul>
        <hr />
    </div>                
                <?php
                break;/*end tour_links*/
                case 'testimonials_boxes':
                $testimonials_type = get_option( 'options_testimonials_type' );
                $number_of_tstm_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_tstm_columns', true );
                $tcol = 0;
                    if($number_of_tstm_columns):
                        switch ($number_of_tstm_columns):
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
                        endswitch;
                    endif;
                    if($testimonials_type == 'Scrolling'):
                    ?>
    <div class="container">
        <div class="row testimonials">
            <div class="col-sm-12">
                <div class="testimonials-slider-wrapper">
                    <div class="testimonials-slider">
                        <ul class="slides">
                        <?php
                        $tsm_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                    if($tsm_rows):    
                    foreach( (array) $tsm_rows as $tsm_count => $tsm_row ):
                        switch( $tsm_row ):
                            case 'testimonials':
                            $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tsm_count . '_pull_specific_from', true );
                            $testimonial_quote = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tsm_count . '_testimonial_quote', true );
                            if($pulled_specific):
                                $post = $pulled_specific;
                                setup_postdata( $post );  
                                get_template_part( 'content', 'scrltstmls_gpm' ); 
                                wp_reset_postdata();
                            endif;
                            break;
                        endswitch;
                    endforeach;
                    endif;    
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end .row-->
    </div><!-- end .container-->               
                    <?php
                    else:
                    ?>
    <div class="container">
        <div class="row even-grid testimonials">
            <?php
            $tsm_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                    if($tsm_rows):
                    foreach( (array) $tsm_rows as $tsm_count => $tsm_row ):
                        switch( $tsm_row ):
                            case 'testimonials':
                            $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tsm_count . '_pull_specific_from', true );
                            if($pulled_specific):
                                $post = $pulled_specific;
                                setup_postdata( $post );
                                ?>
            <div class="<?php if($tcol==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $tcol; ?><?php endif; ?>">
                                <?php  
                                get_template_part( 'content', 'home_tstmls_gpm' );
                                ?>
            </div>
                                <?php 
                                wp_reset_postdata();
                            endif;
                            break;
                        endswitch;
                    endforeach;
                    endif; 
            ?>
        </div><!-- end .row.even-grid.testimonials-->
    </div><!-- end .container-->
                    <?php
                    endif;
                break;
                case 'blog_boxes':
                    $number_of_blog_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_blog_columns', true );
                    $number_of_posts = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_posts', true );
                    $bcol = 0;
                    if($number_of_columns):
                        switch ($number_of_blog_columns):
                            case 1:
                                $bcol = 12;
                                break;
                            case 2:
                                $bcol = 6;
                                break;
                            case 3:
                                $bcol = 4;
                                break;
                        endswitch;
                    endif;
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'nopaging' => true,
                        'post_status' => 'publish'
                        );
                    $bbi = 0;
                    global $wp_query;
                    $wp_query = new WP_Query( $args );
                    ?>
    <div class="container">
        <div class="row row-eq-height testimonials front-blog-wrapper">                
                    <?php
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                        $bbi++; ?>
                        <div<?php if($bcol): ?> class="col-xs-12 col-sm-<?php echo $bcol; ?> col-eq-height"<?php endif; ?>>
                        <?php
                        get_template_part( 'content', 'front_blog' );
                        ?>
                        </div>
                        <?php
                        if($bbi == $number_of_posts):
                        break;
                        endif; 
                        endwhile;
                        
                        do_action( 'genesis_after_endwhile' );
                    endif;     
                    wp_reset_query();
                ?>
        </div><!-- .row-->
    </div><!-- .container-->
                <?php
                case 'content':
                    $heading = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_heading', true );
                    $content_editor = apply_filters('the_content', get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_content_editor', true ));
                    $embed = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_embed', true );
                    $enable_expandable_content = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_enable_expandable_content', true );
                    $open_label = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_open_label', true );
                    $expandable_content = apply_filters('the_content', get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_expandable_content', true ));
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
                <?php  
                break;
                case 'accreditation_logos':
                    $number_of_acclogos_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_acclogos_columns', true );
                    $columns_set = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_columns_set', true );
                if( $columns_set ):
                ?>
                <?php 
                    $accol = 0;
                    if($number_of_acclogos_columns):
                        switch ($number_of_acclogos_columns):
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
                        endswitch;
                    endif;
                ?>
    <div class="container">
        <ul class="row accreditation_logos">
                <?php
                    for( $s = 0; $s < $columns_set; $s++ ):
                        $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_columns_set_' . $s . '_image', true );
                        $image_url = wp_get_attachment_url( $img,'full');
                        $link = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_columns_set_' . $s . '_link', true ));
                        $p++;
                        ?>
            <li class="<?php if($accol==5): ?>five-cols <?php else: ?>col-xs-6 col-sm-<?php echo $accol; ?><?php endif; ?>">
                    <?php if($image_url): ?>
                <a href="<?php if($link): echo $link; endif; ?>" target="_blank">
                    <img src="<?php echo $image_url; ?>" class="img-responsive" />
                </a>
                    <?php endif; ?>
            </li>
                        <?php
                    endfor;
                ?>
        </ul>
    </div>
                <?php
                endif;
                break;
            endswitch;
        endforeach; /*end section_elements*/
        ?>
</section><!-- end .section-item-->
    <?php
  endfor;
endif; /*end sections_area*/