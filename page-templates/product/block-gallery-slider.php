<?php
//main Gallery slider
if( get_row_layout() == 'primary_content_maingallery_area'):
	$primary_content_maingallery_options = get_sub_field('primary_content_maingallery_options');
		if($primary_content_maingallery_options) :
			foreach($primary_content_maingallery_options as $key=>$row) : 


						$slides_images = $row['primary_content_maingallery_slides'];
						$params_full = array( 'width' => 727, 'height' => 484 );
						$params = array( 'width' => 110, 'height' => 73 );

						if ($slides_images): ?>
							<div class="product_content_wrapper primary_content_maingallery_slides">
								<ul class="bxslider">
									<?php foreach ($slides_images as $key => $slides_image) { ?>
										<li><img src="<?php echo bfi_thumb( $slides_image['url'], $params_full ); ?>" /></li>
									<?php } ?>
								</ul>
								<div id="bx-pager">
									<?php foreach ($slides_images as $key => $slides_image_p) { ?>
										<a data-slide-index="<?php echo $key; ?>" href=""><img src="<?php echo bfi_thumb( $slides_image_p['url'], $params ); ?>" /></a>
									<?php } ?>
								</div>
							</div>
							<?php
						endif; 


			endforeach;
		endif;
endif;
?> 