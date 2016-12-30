<!-- primary_content_images_video -->
<?php global $primary_content_options_count; ?>

        <?php if( get_row_layout() == 'primary_content_images_video'): 
	        
        	$primary_content_images_video_image = get_sub_field('primary_content_images_video_image');
				
				// image
				if($primary_content_images_video_image) : 
					$params_images_video_image = array( 'width' => 757, 'height' => 250 ); ?>
					<div class="product_content_wrapper primary_content_images_video_image_wrap">
						<img src="<?php echo bfi_thumb( $primary_content_images_video_image['url'], $params_images_video_image ); ?>" class="img-responsive"/>
					</div>
				<?php endif; 

			$primary_content_images_video_carousel = get_sub_field('primary_content_images_video_carousel');

				//carousel
				if ( $primary_content_images_video_carousel ) : ?>
				<div class="product_content_wrapper primary_content_images_video_carousel_wrap">
			    	<div class="gallery">
            			<div class="photo-gallery">
					    	<?php $params_carousel_image = array( 'width' => 250, 'height' => 250 ); ?>
							<?php foreach ( $primary_content_images_video_carousel as $key => $gallery) { ?>
						    	<a href="<?php echo $gallery['url']; ?>" class="w-inline-block photo-thumbnail">
                                    <img src="<?php echo bfi_thumb( $gallery['url'], $params_carousel_image ); ?>" alt="" class="image-thumb img-responsive">
                                </a>
					    	<?php } ?>
					    </div>
					</div>
				</div>
                <?php endif; 

                // gallery
                $slides_images = get_sub_field('primary_content_images_video_gallery');
				$params_full = array( 'width' => 727, 'height' => 484 );
				$params = array( 'width' => 110, 'height' => 73 );
				global $primary_content_options_count;

				if ($slides_images): ?>

					<div class="product_content_wrapper primary_content_maingallery_slides">
						<ul class="bxslider-<?php echo $primary_content_options_count; ?>">
							<?php foreach ($slides_images as $key => $slides_image) { ?>
								<li><img src="<?php echo bfi_thumb( $slides_image['url'], $params_full ); ?>" /></li>
							<?php } ?>
						</ul>
						<div id="bx-pager-<?php echo $primary_content_options_count; ?>">
							<?php foreach ($slides_images as $key => $slides_image_p) { ?>
								<a data-slide-index="<?php echo $key; ?>" href=""><img src="<?php echo bfi_thumb( $slides_image_p['url'], $params ); ?>" /></a>
							<?php } ?>
						</div>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
								$('.bxslider-<?php echo $primary_content_options_count; ?>').bxSlider({
								  pagerCustom: '#bx-pager-<?php echo $primary_content_options_count; ?>'
								});
						}); //end ready 
					</script>
					<?php
				endif; 
                //end gallery

                //video
                $images_video_video = get_sub_field('images_video_video');
                if ($images_video_video): ?>
	                <div class="product_content_wrapper images_video_video">
		                <div class="embed-container">
							<?php echo $images_video_video; ?>
						</div>
					</div>
				<?php endif;

	    endif; // end row primary_content_images_video
?>  