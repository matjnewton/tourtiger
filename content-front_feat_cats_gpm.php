                <?php
                    $img = (int) get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_image', true );
                    $image_url = wp_get_attachment_url( $img,'full');

                    if($col == 6):
                    $image = str_contains($image_url, '.gif') ? $image_url : aq_resize( $image_url, 559, 327, true );
            else:
                    $image = str_contains($image_url, '.gif') ? $image_url : aq_resize( $image_url, 450, 263, true );
            endif;

                    $headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_headline', true );
                    $button_label = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_button_label', true );
                    $third_party = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_third_party', true );
                    $use_as_integration_link = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_use_as_third_party_integration_link', true );
                    $link = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_link', true );
                    $excerpt = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_excerpt', true );
                    $mobd = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' . $tile_count . '_multi_option_button_dropdown', true );
                ?>
                    <div class="tour front-tour">
                        <?php include(locate_template('buttons/cat_thumb_gpm.php' )); ?>

                        <div class="title-excerpt">
                            <?php include(locate_template('buttons/cat_title_gpm.php' )); ?>
                            <p><?php echo $excerpt; ?></p>
                        </div>

                        <?php if($button_label && !$mobd): ?>
                            <?php include(locate_template('buttons/cat_btn_gpm.php' )); ?>
                        <?php elseif($button_label && $mobd): ?>
                            <?php include(locate_template('buttons/cat_mobd_gpm2.php' )); ?>
                        <?php endif; ?>

                    </div>
