<!-- testimonials -->
<?php if( get_row_layout() == 'primary_content_testimonials'):

	$post_objects = get_sub_field('primary_content_testimonials_post_object');
    global $primary_content_options_count;

	if( $post_objects ): ?>

					<div class="product_content_wrapper primary_content_testimonials">
						<ul class="testimonialsbxslider-<?php echo $primary_content_options_count; ?>">
							<?php foreach ( $post_objects as $key => $post_object) { ?>
							<?php $testimonial_link = get_field('testimonial_link', $post_object->ID); ?>
								<li>
									<a class="testimonial_title" href=""><?php echo get_the_title($post_object->ID); ?></a>
									<div class="testimonial_quote"> <?php echo get_field('testimonial_quote', $post_object->ID); ?></div>
								    <?php if($testimonial_link) : ?>
								    	<a class="testimonial_link" href="<?php echo $testimonial_link; ?>" target="_blank">Read more</a>
								    <?php endif; ?>
								</li>
							<?php } ?>
						</ul>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
								$('.testimonialsbxslider-<?php echo $primary_content_options_count; ?>').bxSlider({
								});
						}); //end ready 
					</script>

	<?php endif; ?>

	<?php
endif;  