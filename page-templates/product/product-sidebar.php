                    

<?php if(have_rows('sidebar_1')): ?>

    <div class="hidden-xs">
        <div id="booking_product" class="book-tour-wrapper_product">

        	

            <?php while(have_rows('sidebar_1')): the_row(); ?>

                <!-- button layout -->
                <?php if( get_row_layout() == 'button' ): ?>

                	<div class="book-tour-wrapper_product_row">
                		<div class="book-tour-title_product"><?php echo get_the_title( $post->ID ); ?></div>

	                    <?php
	                        $bbt = get_sub_field('button_text');
	                        $cta_onclick = get_sub_field('cta_onclick');
	                        $button_type = get_sub_field('button_link_type');
	                        $bbl = get_sub_field('custom_button_link');
	                        // $b_radius = get_sub_field('button_radius');
	                        // $rb1 = get_sub_field('reason_to_book_1');
	                        // $rb2 = get_sub_field('reason_to_book_2');
	                        $third_party = get_sub_field('third_party');
	                        $mobd = get_sub_field('multi_option_button_dropdown');
	                        //var_dump($bbl);
	                    ?>
	                    
	                    <?php if($bbt && !$mobd): ?>
	                        <?php include(locate_template('buttons/sidebar_btn_product.php' )); ?>
	                    <?php elseif($bbt && $mobd): ?>
	                        <?php include(locate_template('buttons/sidebar_mobd_product.php' )); ?>
	                    <?php endif; /*end of last button condition*/ ?>

	                <!--  reason link -->
	                <?php if( have_rows('reason_to_book_options') ): ?>
						
						<ul class="reason_to_book_options">
							<?php while( have_rows('reason_to_book_options') ): the_row(); 
								// vars
								$reason_to_book_label = get_sub_field('reason_to_book_label');	
								$reason_icon = get_sub_field('reason_icon');
								//var_dump($reason_icon);
								 ?>

								<li class="reason_to_book_label">
									<?php if( $reason_to_book_label ): 
										if ($reason_icon) {
											echo '<i class="fa '.$reason_icon.'"></i>';
										} ?>
										<i class="fa fa-check"></i>
										<span><?php echo $reason_to_book_label; ?></span>
									<?php endif; ?>
								</li>

							<?php endwhile; ?>
						</ul>

					<?php endif; ?>
					<!-- end reason link -->
                
                	</div>    
                <?php endif; /*end button layout*/ ?>

                <!--links layout -->
                <?php if( get_row_layout() == 'sidebar_links_row' ): ?>

                	<div class="book-tour-wrapper_product_row sidebar_links_row">
	                	<!--   link -->
		                <?php if( have_rows('sidebar_links_options') ): ?>
							
							<ul class="sidebar_links_options">
								<?php while( have_rows('sidebar_links_options') ): the_row(); 
									// vars
									$link_label = get_sub_field('link_label');	
									$link_icon = get_sub_field('link_icon');
									$link_url = get_sub_field('link_url');
									//var_dump($reason_icon);
									 ?>

									<li class="">
										<?php if($link_label ): 
											if ($link_icon) {
												echo '<i class="fa '.$link_icon.'"></i>';
											} ?>
											<a href="<?php echo $link_url; ?>">
												<?php echo $link_label; ?></span>
											</a>
										<?php endif; ?>
									</li>

								<?php endwhile; ?>
							</ul>

						<?php endif; ?>
						<!-- end  link -->
					</div>

                <?php endif; /*end links layout*/ ?>

                <!-- phone layout -->
                <?php if( get_row_layout() == 'sidebar_phone_row' ): 
        		    $phone_label = get_sub_field('phone_label');
                    $phone_number = get_sub_field('phone_number');
                    ?>

                	<div class="book-tour-wrapper_product_row sidebar_phone_row">
                		<?php if ($phone_label) { ?>
                			<div class="phone_label"><?php echo $phone_label; ?></div>
                		<?php } ?>
                		<div class="phone_number">
                			<i class="fa fa-phone"></i>
                			<span><?php echo $phone_number; ?></span>
                		</div>	
                	</div>

                 <?php endif; /*end phone layout*/ ?>
                
                <!-- content_editor layout -->
                <?php if( get_row_layout() == 'content_editor' ): 
                    $content = get_sub_field('content'); ?>
                    
                    <div class="widget-item">
                        <?php echo $content; ?>
                    </div>

                <?php endif; ?>
                
                <!-- text_area layout -->
                <?php if( get_row_layout() == 'text_area' ): 
                    $content = get_sub_field('content'); ?>
                    
                    <div class="widget-item">
                        <?php echo $content; ?>
                    </div>

                <?php endif; ?>
                
            <?php endwhile; /*end while sidebar_1*/ ?>

        </div><!-- end #booking-->

    </div><!-- end .center-booking -->

<?php endif; /*end if sidebar_1*/ ?>