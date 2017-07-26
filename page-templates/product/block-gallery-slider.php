<?php

//main Gallery slider
if( get_row_layout() == 'primary_content_maingallery_area' ):
	$primary_content_maingallery_options = get_sub_field('primary_content_maingallery_options');

	if( $primary_content_maingallery_options) :

		/**
		 * Loop galleries
		 */
		foreach ( $primary_content_maingallery_options as $key => $row ) :

			// Core variables
			$slides_images = $row['primary_content_maingallery_slides'];
			$label         = $row['label'] ? $row['label'] : 'Click to view gallery';
			$params_full   = array( 'width' => 757, 'height' => 484 );
			$params        = array( 'width' => 110, 'height' => 73 );

			/**
			 * Check whether the gallery has any images
			 */
			if ( $slides_images ) :
				$gallery_id = generateRandomString(5);
				$new_design = $row['new_design']; 

				if ( $new_design ) : 
					?>

					<script>
						!(function($){
							$(function(){

								/**
								 * Init slick carousel
								 */
								$('.slider-pro--preview').on('click', function(){
								    
								    // Set DOM elements to the variables
									var $self         = $(this);
									var $wrapper      = $self.closest('.slider-pro');
									var $image        = $wrapper.find('.slider-pro--preview__image');
									var width         = $image.width();
									var height        = $image.height();
									var $carousel     = $wrapper.find('.slider-pro__carousel');
									var $cover        = $wrapper.find('.slider-pro__cover');
									var $panel        = $wrapper.find('.slider-pro--panel');

                                    // Core values
									var globalWidth   = $(window).width();
									var globalHeight  = $(window).height();

                                    // Set width and height values to cover area and image
									$cover
									.width(width)
									.height(height)
									.find('img')
									.width(width)
									.height(height);
									
									$panel.hide();

                                    // Get cover coordinates relative to the window
									var coverTop  = $cover.offset().top - $(window).scrollTop();
									var coverLeft = $cover.offset().left;

									$image.css({
										'position': 'fixed',
										'z-index': '9999',
										'top': coverTop,
										'left': coverLeft,
									}).animate({
										'top': (globalHeight / 2) - (height / 2),
										'left': (globalWidth / 2) - (width / 2),
									}, 300, function(){
										$image.fadeOut(500);

										$carousel
										.css({
											'display': 'flex',
										})
										.animate({
											'opacity': '1'
										}, 300)
										.find('.slider-pro__slider')
										.slick({
											prevArrow: '<button type="button" class="slider-pro__prev slider-pro__arrow"></button>',
											nextArrow: '<button type="button" class="slider-pro__next slider-pro__arrow"></button>',
											adaptiveHeight: true,
											lazyLoad: 'progressive',
										})
										.slick('setOption', 'height', null, true);
									});
								});

								/**
								 * Close carousel
								 */
								$('.slider-pro__close-link').on('click', function(){
									var $self         = $(this);
									var $wrapper      = $self.closest('.slider-pro');
									var $image        = $wrapper.find('.slider-pro--preview__image');
									var $carousel     = $wrapper.find('.slider-pro__carousel');
									var $cover        = $wrapper.find('.slider-pro__cover');
									var $panel        = $wrapper.find('.slider-pro--panel');

									var coverTop  = $cover.offset().top - $(window).scrollTop();
									var coverLeft = $cover.offset().left;

									$image
									.show()
									.animate({
										'top': coverTop,
										'left': coverLeft,
									}, 300, function(){
										$image.css({
											'position': 'static',
										});
										$panel.show();
									});

									$carousel
									.hide()
									.animate({
										'opacity': '0'
									}, 300)
									.find('.slider-pro__slider')
									.slick('unslick');
								});
							});
						})(jQuery);
					</script>

					<div class="slider-pro">
						<div class="slider-pro__cover">
							<a href="javascript:" class="slider-pro--preview">
								<div class="slider-pro--preview__image">
									<img src="<?=$slides_images[0]['url'];?>" alt="">
								</div>
							</a>
							<div class="slider-pro--panel">
								<span class="slider-pro--panel__btn"><?=$label;?></span>
							</div>
						</div>
						<div class="slider-pro__carousel" style="display:none;">
							<a href="javascript:" class="slider-pro__close-link"></a>
							<div class="slider-pro__slider">
								<?php 
								foreach ( $slides_images as $key => $slides_image ) :
									$image = "<img data-lazy='{$slides_image['url']}' alt='' />";
									echo "<div><div class='slider-pro__item'>{$image}</div></div>";
								endforeach; 
								?>
							</div>
						</div>
					</div>

					<?php
				else :
					?>

					<div class="js-navigated-gallery">
						<ul 
							class="js-navigated-gallery__front js-front-<?=$gallery_id;?>"
							data-slick='{"asNavFor": ".js-nav-<?=$gallery_id;?>"}'>

							<?php 
							foreach ( $slides_images as $key => $slides_image ) :
								$image = wp_get_attachment_image( $slides_image['id'], 'pc-middle' );
								?>
								<li><?=$image;?></li>
								<?php 
							endforeach; 
							?>
						</ul>



						<ul 
							class="js-navigated-gallery__navigation js-nav-<?=$gallery_id;?>"
							data-slick='{"asNavFor": ".js-front-<?=$gallery_id;?>"}'>

							<?php 
							foreach ( $slides_images as $key => $slides_image ) :
								$image = wp_get_attachment_image( $slides_image['id'], 'pc-fit-iphone' ); 
								?>
								<li><?=$image;?></li>
								<?php 
							endforeach; 
							?>
						</ul>
					</div>

					<?php
				endif;
			endif;
		endforeach;
	endif;
endif;
?> 