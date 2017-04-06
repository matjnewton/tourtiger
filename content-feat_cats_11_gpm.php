                <?php
                    
                    $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_boxes_set_' . $tb_count . '_image', true );
                    $image_url = wp_get_attachment_url( $img,'full');
                     
                    if($col == 6):
            $image = aq_resize( $image_url, 559, 327, true ); //resize & crop img
            else:
            $image = aq_resize( $image_url, 450, 368, true ); //resize & crop img
            endif;
                    
                    $headline = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_heading', true );
                    $button_label = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_label', true );
                    $third_party = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_third_party', true );
                    $use_as_integration_link = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_use_as_third_party_integration_link', true );
                    $link = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_link', true );
                    $excerpt = wpautop(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_excerpt', true ));
                    $mobd = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_multi_option_button_dropdown', true );
                    
                ?>
                    <div class="tour">
                        
                        <?php include(locate_template('buttons/cat_thumb_gpm.php' )); ?>
                        
                        <div class="title-excerpt">
                            <?php include(locate_template('buttons/cat_title_gpm.php' )); ?>
                        </div>
                        
                        <?php if($button_label && !$mobd): ?>
                            <?php include(locate_template('buttons/cat_btn_gpm.php' )); ?>
                        <?php elseif($button_label && $mobd): ?>
                            <?php include(locate_template('buttons/cat_mobd_gpm.php' )); ?>
                        <?php endif; ?>
                        
                    </div>
