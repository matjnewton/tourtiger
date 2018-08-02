<?php 
                    $testimonial_quote = get_post_meta( get_the_ID(), 'testimonial_quote', true );
                    
                ?>
                <li class="t-slide slide">
                    <div class="txt-testimonial"><span class="name"><?php the_title(); ?>:</span> <?php echo $testimonial_quote; ?><div><a href="<?php echo esc_url( home_url() );?>/testimonials/" class="read-test">Read full Testimonial</a></div>
                    </div>
                </li>