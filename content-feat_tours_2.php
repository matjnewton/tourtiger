                    <div class="tour-2">

                        <?php if (has_post_thumbnail()) {
                            $thumb = get_post_thumbnail_id();
                            $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
                            $image = str_contains($img_url, '.gif') ? $img_url : aq_resize( $img_url, 377, 377, true );
            ?>
            <a href="<?php the_permalink() ?>" class="tile-image">
                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                <div class="tile-tint"></div>
            </a>
            <?php
        }
        ?>
                    <div class="name-wrapper">
                        <div class="name">
                            <strong>
                                <a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                                </a>
                            </strong>
                        </div>
                    </div>

                    </div>
