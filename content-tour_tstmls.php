                <div class="col-sm-6">
                    <div class="testimonial">
                        <div class="testimonial-content s-item">
                            <strong><?php the_field('testimonial_quote'); ?></strong>
                            <p><?php the_field('testimonial_excerpt'); ?></p>
                            <div class="t-author">
                                <?php 
                                $img_url = wp_get_attachment_url( get_field('photo'),'full');
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
                                    <?php $testimonial_text = get_field('testimonial_link_anchor_text'); ?>
                                    <?php if($testimonial_text): ?>
                                    <a href="<?php the_field('testimonial_link'); ?>"><?php echo $testimonial_text; ?></a>
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
                