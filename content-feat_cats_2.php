                <?php
                    $image_url = wp_get_attachment_url( get_sub_field('image'),'full');
                    if($col==6):
                    $image = aq_resize( $image_url, 568, 377, true );
                    else:
                    $image = aq_resize( $image_url, 377, 377, true );
                    endif;

                    $headline = get_sub_field('heading');
                    $button_label = get_sub_field('button_label');
                    $third_party = get_sub_field('third_party');
                    $use_as_integration_link = get_sub_field('use_as_third_party_integration_link');
                    $link = get_sub_field('link');
                    $excerpt = get_sub_field('excerpt');
                ?>
                    <div class="tour-2">
                        <?php include(locate_template('buttons/front3_cat_thumb.php' )); ?>
                    </div>
