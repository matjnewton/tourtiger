<!-- primary_content_expandable_content -->
<?php global $primary_content_options_count; ?>

        <?php if( get_row_layout() == 'primary_content_expandable_content'): 
	        
        	$primary_content_expandable_content_options = get_sub_field('primary_content_expandable_content_options');
				if($primary_content_expandable_content_options) : ?>

					<div class="product_content_wrapper primary_content_expandable_content">
						<ul class="primary_content_expandable_content_options">
							<?php foreach($primary_content_expandable_content_options as $key=>$row) { ?>
								<li class="primary_content_expandable_content_options_li">
						        	<h3 class="primary_content_subhead line customstyle"><?php echo $row['primary_content_expandable_content_label']; ?></h3>
								    <a class="primary_content_expandable_content_toggle line collapsed customstyle" data-close="<?php echo $row['primary_content_expandable_content_label_close']; ?>" data-open="<?php echo $row['primary_content_expandable_content_label_open']; ?>" data-toggle="collapse" href="#primary_content_expandable_content_editor_<?php echo $key.'_'.$primary_content_options_count; ?>" aria-expanded="false" aria-controls="cprimary_content_expandable_content_editor_<?php echo $key.'_'.$primary_content_options_count; ?>">
								       <?php echo $row['primary_content_expandable_content_label_open']; ?>
								    </a>
									<div class="collapse" id="primary_content_expandable_content_editor_<?php echo $key.'_'.$primary_content_options_count; ?>">
									  <div class="primary_content_expandable_content_editor_wrap">
									    <?php echo $row['primary_content_expandable_content_editor']; ?>
									    
									    <!-- gallery -->
<!-- 									    <?php if ( $row['primary_content_expandable_content_image_gallery'] ) : ?>
									    	<div class="gallery">
                                    			<div class="photo-gallery">
											    	<?php $params_expand_image = array( 'width' => 250, 'height' => 250 ); ?>
													<?php foreach ( $row['primary_content_expandable_content_image_gallery'] as $key => $gallery) { ?>
												    	<a href="<?php echo $gallery['url']; ?>" class="w-inline-block photo-thumbnail">
				                                            <img src="<?php echo bfi_thumb( $gallery['url'], $params_expand_image ); ?>" alt="" class="image-thumb img-responsive">
				                                        </a>
											    	<?php } ?>
											    </div>
											</div>
	                                    <?php endif; ?> -->

									  </div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
				<?php endif; ?>

	        <?php 
	    endif; ?> 