<!-- primary_content_images_video -->
<?php global $primary_content_options_count; global $post; ?>

        <?php if( get_row_layout() == 'primary_content_images_video'): 
	        
        	$primary_content_images_video_image = get_sub_field('primary_content_images_video_image');
				
				// image
				if($primary_content_images_video_image) : 
					$params_images_video_image = array( 'width' => 757, 'height' => 250 ); ?>
					<div class="product_content_wrapper primary_content_images_video_image_wrap">
						<img src="<?php echo bfi_thumb( $primary_content_images_video_image['url'], $params_images_video_image ); ?>" class="img-responsive"/>
						<?php tourtiger_image( $primary_content_images_video_image['id'], $params_images_video_image['width'], $params_images_video_image['height'], false, array( 'class' => 'img-responsive' ) ); ?>
					</div>
				<?php endif; 

			$primary_content_images_video_carousel = get_sub_field('primary_content_images_video_carousel');

				//carousel
				if ( $primary_content_images_video_carousel ) : ?>
				<div class="product_content_wrapper primary_content_images_video_carousel_wrap">
			    	<div class="gallery">
            			<div class="photo-gallery gallery<?php echo $post->ID.'-'.$primary_content_options_count; ?>">
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
				$params_full = array( 'width' => 757, 'height' => 484 );
				$params = array( 'width' => 110, 'height' => 73 );
				global $primary_content_options_count;

				if ($slides_images): ?>

					<div class="product_content_wrapper primary_content_maingallery_slides">
						<ul class="bxslider-<?php echo $primary_content_options_count; ?>">
							<?php foreach ($slides_images as $key => $slides_image) { ?>
								<li><img src="<?php echo bfi_thumb( $slides_image['url'], $params_full ); ?>" /></li>
							<?php } ?>
						</ul>
<!--  						<div id="bx-pager-<?php echo $primary_content_options_count; ?>">
							<?php foreach ($slides_images as $key => $slides_image_p) { ?>
								<a data-slide-index="<?php echo $key; ?>" href=""><img src="<?php echo bfi_thumb( $slides_image_p['url'], $params ); ?>" /></a>
							<?php } ?>
						</div>  -->
						<ul id="bx-pager-<?php echo $primary_content_options_count; ?>">
							<?php foreach ($slides_images as $key => $slides_image_p) { ?>
								<li data-slideIndex="<?php echo $key; ?>">
									<a href="">
										<img src="<?php echo bfi_thumb( $slides_image_p['url'], $params ); ?>">
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){

							$(".single-product").length>0&&$(".photo-gallery").length>0&&$(".gallery<?php echo $post->ID.'-'.$primary_content_options_count; ?>").magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}});
							


								// $('.bxslider-<?php echo $primary_content_options_count; ?>').bxSlider({
								//   pagerCustom: '#bx-pager-<?php echo $primary_content_options_count; ?>',
								//   slideMargin: 0,
								// });

								// new bxslider
								var realSlider= $("ul.bxslider-<?php echo $primary_content_options_count; ?>").bxSlider({
								      speed:1000,
								      pager:false,
								      nextText:'<i class="fa fa-angle-right"></i>',
								      prevText:'<i class="fa fa-angle-left"></i>',
								      infiniteLoop:false,
								      hideControlOnEnd:true,
								      onSlideBefore:function($slideElement, oldIndex, newIndex){
								        changeRealThumb(realThumbSlider,newIndex);
								        
								      }
								      
								    });
								    
								    var realThumbSlider=$("ul#bx-pager-<?php echo $primary_content_options_count; ?>").bxSlider({
								      minSlides: 4,
								      maxSlides: 7,
								      slideWidth: 110,
								      slideMargin: 0,
								      moveSlides: 1,
								      pager:false,
								      speed:1000,
								      infiniteLoop:false,
								      hideControlOnEnd:true,
								      nextText:'<span></span>',
								      prevText:'<span></span>',
								      controls: false,
								      onSlideBefore:function($slideElement, oldIndex, newIndex){
								        /*$j("#sliderThumbReal ul .active").removeClass("active");
								        $slideElement.addClass("active"); */

								      }
								    });
								    
								    linkRealSliders(realSlider,realThumbSlider);

								    if($("#bx-pager-<?php echo $primary_content_options_count; ?> li").length<5){
								      $("#bx-pager-<?php echo $primary_content_options_count; ?> .bx-next").hide();
								    }

								// sincronizza sliders realizzazioni
								function linkRealSliders(bigS,thumbS){
								  
								  $("ul#bx-pager-<?php echo $primary_content_options_count; ?>").on("click","a",function(event){
								    event.preventDefault();
								    var newIndex=$(this).parent().attr("data-slideIndex");
								        bigS.goToSlide(newIndex);
								  });
								}

								//slider!=$thumbSlider. slider is the realslider
								function changeRealThumb(slider,newIndex){
								  
								  var $thumbS=$("#bx-pager-<?php echo $primary_content_options_count; ?>");
								  $thumbS.find('.active').removeClass("active");
								  $thumbS.find('li[data-slideIndex="'+newIndex+'"]').addClass("active");
								  
								  if(slider.getSlideCount()-newIndex>=1)slider.goToSlide(newIndex);
								  else slider.goToSlide(slider.getSlideCount()-1);

								}
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