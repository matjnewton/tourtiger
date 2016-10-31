                <?php
                    $image_url = wp_get_attachment_url( get_sub_field('image'),'full'); 
                    if($col == 6):
            $image = aq_resize( $image_url, 559, 327, true ); //resize & crop img
            else:
            $image = aq_resize( $image_url, 450, 368, true ); //resize & crop img
            endif;
            
                    $headline = get_sub_field('heading');
                    $button_label = get_sub_field('button_label');
                    $third_party = get_sub_field('third_party');
                    $use_as_integration_link = get_sub_field('use_as_third_party_integration_link');
                    $link = get_sub_field('link');
                    $excerpt = get_sub_field('excerpt');
                    $mobd = get_sub_field('multi_option_button_dropdown');
                ?>
                    <div class="tour">
                        
                        <?php include(locate_template('buttons/cat_thumb.php' )); ?>
                        
                        <div class="title-excerpt">
                            <?php include(locate_template('buttons/cat_title.php' )); ?>
                        </div>
                        
                        <?php if($button_label && !$mobd): ?>
                            <?php include(locate_template('buttons/cat_btn.php' )); ?>
                        <?php elseif($button_label && $mobd): ?>
                            <?php include(locate_template('buttons/cat_mobd.php' )); ?>
                        <?php endif; ?>
                        
                    </div>
