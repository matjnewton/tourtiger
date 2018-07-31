                <div class="item">
                        <div class="headline-wrapper">
                            <h3>
                                <a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                                </a>
                            </h3>
                            <!--<div class="rate-price-wrapper">
                                <div class="rate">
                                    <img src="images/rate_placeholder.png" />
                                </div>
                                <div class="price">
                                    $165
                                </div>
                            </div>-->
                        </div>
                        <div class="excerpt-wrapper">
                            <div class="img-wrapper">
                                <?php if (has_post_thumbnail()) {
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
            $image = aq_resize( $img_url, 371, 217, true ); //resize & crop img
            ?>
            <a href="<?php the_permalink() ?>">
                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
            </a>
            <?php
        }
        ?>
                            </div>
                            <div class="excerpt">
                                
                                <p><?php the_excerpt(); ?></p>
                            
                            
                                <div class="view-tour-btn-2">
                                        <a href="<?php the_permalink() ?>">
                                            View tour now
                                        </a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>