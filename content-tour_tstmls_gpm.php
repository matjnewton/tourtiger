                <div class="col-sm-6">
                    <div class="testimonial">
                        <div class="testimonial-content s-item">
                            <?php
                                $testimonial_quote = get_post_meta( get_the_ID(), 'testimonial_quote', true );
                                $testimonial_excerpt = get_post_meta( get_the_ID(), 'testimonial_excerpt', true );
                                $testimonial_text = get_post_meta( get_the_ID(), 'testimonial_link_anchor_text', true );
                                $testimonial_link = get_post_meta( get_the_ID(), 'testimonial_link', true );
                            ?>
                            <strong><?php echo $testimonial_quote; ?></strong>
                            <p><?php echo $testimonial_excerpt; ?></p>
                            <div class="t-author">
                                <?php 
                                $img = (int) get_post_meta( get_the_ID(), 'photo', true );
                                $img_url = wp_get_attachment_url( $img,'full');
                                $image = aq_resize( $img_url, 85, 84, true );
                                ?>
                                <?php if($img_url): ?>
                                <div class="author-img-wrapper">
                                    <img src="<?=$image?>" alt="<?=$image?>" class="img-circle" />
                                </div>
                                <?php endif; ?>
                                <div class="rate-about">
                                    
                                    <span>
                                    <?php the_title(); ?>
                                    </span>
                                    <?php if($testimonial_text): ?>
                                    <a href="<?php echo $testimonial_link; ?>"><?php echo $testimonial_text; ?></a>
                                    <?php else: ?>
                                    <a href="<?php the_permalink() ?>">Read full testimonial</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="t-author">
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
                