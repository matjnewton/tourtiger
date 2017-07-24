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
								$('.slider-pro--panel__btn').on('click', function(){
									var $self     = $(this);
									var $slider   = $self.closest('.slider-pro');
									var $carousel = $slider.find('.slider-pro__carousel');

									$carousel.css({
										'position': 'fixed',
										'top': '50%',
										'left': '0',
										'width': '100%',
										'height': '500px',
										'background-color': 'yellow',
										'z-index': '999999',
										'transform': 'translateY(-50%)'
									}).fadeIn(1000);
								});
							});
						})(jQuery);
					</script>

					<div class="slider-pro">
						<div class="slider-pro__cover">
							<div class="slider-pro--preview">
								<img src="http://placehold.it/757x484" alt="" class="slider-pro--preview__image">
							</div>
							<div class="slider-pro--panel">
								<a href="javascript:" class="slider-pro--panel__btn"><?=$label;?></a>
							</div>
						</div>
						<div class="slider-pro__carousel"></div>
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