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
								$('.slider-pro--panel__btn').on('click', function(){
									var $self         = $(this);
									var $wrapper      = $self.closest('.slider-pro');
									var $image        = $wrapper.find('.slider-pro--preview__image');
									var width         = $image.width();
									var height        = $image.height();
									var $carousel     = $wrapper.find('.slider-pro__carousel');
									var $cover        = $wrapper.find('.slider-pro__cover');
									var $panel        = $wrapper.find('.slider-pro--panel');

									var globalWidth   = $(window).width();
									var globalHeight  = $(window).height();

									$cover.width(width).height(height);
									$panel.hide();

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
									}, 500, function(){
										$image.hide();

										$carousel
										.css({
											'display': 'flex',
											'opacity': '1'
										})
										.find('.slider-pro__slider')
										.css({
											'height': height
										})
										.slick({
											prevArrow: '<button type="button" class="slider-pro__prev slider-pro__arrow"></button>',
											nextArrow: '<button type="button" class="slider-pro__next slider-pro__arrow"></button>',
											adaptiveHeight: true,
											lazyLoad: 'progressive',
										});
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
									}, 500, function(){
										$image.css({
											'position': 'static',
										});
										$panel.show();
									});

									$carousel
									.hide()
									.css({
										'opacity': '0'
									})
									.find('.slider-pro__slider')
									.slick('unslick');
								});
							});
						})(jQuery);
					</script>

					<div class="slider-pro">
						<div class="slider-pro__cover">
							<div class="slider-pro--preview">
								<div class="slider-pro--preview__image">
									<img src="<?=$slides_images[0]['url'];?>" alt="">
								</div>
							</div>
							<div class="slider-pro--panel">
								<a href="javascript:" class="slider-pro--panel__btn"><?=$label;?></a>
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