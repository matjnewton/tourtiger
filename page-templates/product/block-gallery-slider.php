<?php

//main Gallery slider
if( get_row_layout() == 'primary_content_maingallery_area'):
	$primary_content_maingallery_options = get_sub_field('primary_content_maingallery_options');
		if( $primary_content_maingallery_options) :

			foreach($primary_content_maingallery_options as $key => $row) :

				$slides_images = $row['primary_content_maingallery_slides'];
				$params_full   = array( 'width' => 757, 'height' => 484 );
				$params        = array( 'width' => 110, 'height' => 73 );

				if ( $slides_images ) :

					$gallery_id = generateRandomString(5);
					?>

					<div class="js-navigated-gallery js-navigated-gallery_<?=$gallery_id;?>">
						<ul 
							class="js-navigated-gallery__front"
							data-slick='{"asNavFor": ".js-navigated-gallery_<?=$gallery_id;?> .js-navigated-gallery__navigation"}'>

							<?php foreach ($slides_images as $key => $slides_image) { ?>
								<li>
									<?php echo wp_get_attachment_image( $slides_image['id'], 'pc-middle' ); ?>
								</li>
							<?php } ?>
						</ul>

						<ul 
							class="js-navigated-gallery__navigation"
							data-slick='{"asNavFor": ".js-navigated-gallery_<?=$gallery_id;?> .js-navigated-gallery__front"}'>

							<?php foreach ($slides_images as $key => $slides_image) { ?>
								<li>
									<?php echo wp_get_attachment_image( $slides_image['id'], 'pc-fit-iphone' ); ?>
								</li>
							<?php } ?>
						</ul>
					</div>

					<?php
				endif;

			endforeach;

		endif;
endif;
?> 