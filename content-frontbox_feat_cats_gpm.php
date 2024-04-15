<?php
            if($col == 6):
                $image = str_contains($image_url, '.gif') ? $image_url : aq_resize( $image_url, 559, 327, true );
            else:
                $image = str_contains($image_url, '.gif') ? $image_url : aq_resize( $image_url, 450, 263, true );
            endif;
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
                            <?php include(locate_template('buttons/cat_mobd_gpm.php' )); ?>
                        <?php endif; ?>

                    </div>
