                
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <strong class="dz-testimonial__quote"><?php the_field('testimonial_quote'); ?></strong>
                            <div class="dz-testimonial__full">
                                <?php the_field('full_testimonial'); ?>
                            </div>
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
                                    
                                    <?php if ( get_field( 'is_single_testimonial', 'option' ) ) : ?>
                                        <a href="<?php echo get_permalink(); ?>"  class="dz-testimonial__author" style="text-decoration: none;">
                                            <?php the_title(); ?>
                                        </a>
                                    <?php else: ?>
                                        <span  class="dz-testimonial__author">
                                            <?php the_title(); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php $testimonial_text = get_field('testimonial_link_anchor_text'); ?>
                                    <?php if($testimonial_text): ?>
                                    <a href="<?php the_field('testimonial_link'); ?>"><?php echo $testimonial_text; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="t-author">
                            <div class="triangle"></div>
                            
                        </div>
                    </div>
                