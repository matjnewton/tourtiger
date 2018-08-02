                <div class="col-sm-12">
                    <div class="testimonial">
                        <div class="testimonial-content s-item">
                            <strong><?php echo $testimonial_quote; ?></strong>
                            <p><?php echo $testimonial_excerpt; ?></p>
                            <div class="t-author">
                                <?php if($img_url): ?>
                                <div class="author-img-wrapper">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>" class="img-circle" />
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