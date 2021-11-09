<?php
/**
 * Single product Component: Sidebar
 */

if ( have_rows( 'sidebar_1' ) ) :
    $class = get_field('sticky-sidebar', 'option') || get_field('sticky-sidebar') === 'non-sticky'
        ? 'book-tour-wrapper_product non-sticky' : 'book-tour-wrapper_product';
	?>

    <div class="hidden-xs">
        <div id="booking_product" class="<?=$class?>">

            <?php
            /**
             * Loop sidebar components
             */
            $title_counter = 0;

            while( have_rows('sidebar_1') ) :
            	the_row();

            	if ( get_row_layout() == 'button' ):
            		?>

                	<div class="book-tour-wrapper_product_row">

                        <?php if ($title_counter == 0) {?>
                            <div class="book-tour-title_product">
                                <?php
                                echo get_the_title( $post->ID ); $title_counter++; ?>
                            </div>
                        <?php } ?>


                        <?php
                        /**
                         * Button variables
                         */
                        $bbt         = get_sub_field('button_text');
                        $cta_onclick = get_sub_field('cta_onclick');
                        $button_type = get_sub_field('button_link_type');
                        $bbl         = get_sub_field('custom_button_link');
                        $third_party = get_sub_field('third_party');
                        $mobd        = get_sub_field('multi_option_button_dropdown');
                        $servername  = $_SERVER['SERVER_NAME'];
                        /**
                         * Include button template
                         * if button text is exist
                         */

                        if ( $bbt ) :
                            if ( !$mobd ) :
                                include(locate_template('buttons/sidebar_btn_product.php' ));
                            elseif ( $mobd ) :
                                include(locate_template('buttons/sidebar_mobd_product.php' ));
                            endif;
                        endif;

                        /**
                         * Reason to book check the loop
                         */
                        if( have_rows('reason_to_book_options') ) :
                        	?>

							<ul class="reason_to_book_options">

								<?php
								/**
								 * Loop list of book reasons
								 */
								while( have_rows('reason_to_book_options') ) :
									the_row();

									$reason_to_book_label = get_sub_field('reason_to_book_label');
									$reason_icon          = get_sub_field('reason_icon');

									/**
									 * Output book label construction
									 */
									if ( $reason_to_book_label ) :
										?>

										<li class="reason_to_book_label">
											<?php
											echo $reason_icon ? '<i class="fa '.$reason_icon.'"></i><i class="fa fa-check"></i>' : '';
											echo '<span>' . $reason_to_book_label . '</span>';
											?>
										</li>

										<?php
									endif;
								endwhile;
								?>

							</ul>

							<?php
						endif;
						?>

            		</div>

                	<?php
                elseif ( get_row_layout() == 'sidebar_links_row' ) :
                	?>

                	<div class="book-tour-wrapper_product_row sidebar_links_row">

		                <?php
		                if ( have_rows( 'sidebar_links_options' ) ) :
		                	?>

							<ul class="sidebar_links_options">

								<?php
								/**
								 * Loop the links
								 */
								while( have_rows( 'sidebar_links_options' ) ) :
									the_row();

									$link_label   = get_sub_field('link_label');
									$link_icon    = get_sub_field('link_icon');
									$link_url     = get_sub_field('link_url');
									$mobile_class = $link_icon == 'fa-gift' ? 'js-show-certificate-mob' : '';

									if ( $link_label ) :
										?>

										<li class="sidebar_links_options_list">
											<div class="sidebar_links_options_wrap <?=$mobile_class;?>">
												<a href="<?=$link_url;?>" style="margin-left: 0px;">
													<?php
													echo $link_icon ? '<i class="fa '.$link_icon.'"></i>' : '';
													echo '<span style="margin-left: 46px;">' . $link_label . '</span>';
													?>
												</a>
											</div>
										</li>

										<?php
									endif;
								endwhile;
								?>

							</ul>

							<?php
						endif;
						?>

					</div>

               		<?php
                elseif ( get_row_layout() == 'sidebar_phone_row' ) :

        		    $phone_label  = get_sub_field('phone_label');
                    $phone_number = get_sub_field('phone_number');
                    ?>

                	<div class="book-tour-wrapper_product_row sidebar_phone_row <?php echo $phone_label ? 'sidebar_phone_label' : ''; ?>">
            			<?php echo $phone_label ? '<div class="phone_label">' . $phone_label . '</div>' : ''; ?>
                		<div class="phone_number">
                			<i class="fa fa-phone"></i>
                			<span><?php echo $phone_number; ?></span>
                		</div>
                	</div>

                 	<?php
                elseif ( get_row_layout() == 'content_editor' || get_row_layout() == 'text_area' ) :

                    $content = get_sub_field('content');
                	echo $content ? '<div class="widget-item book-tour-wrapper_product_row">' . $content . '</div>' : '';

                elseif ( get_row_layout() == 'trip_advisor' ) :

                	if ( get_sub_field( 'view' ) == 'card' )
                		$view = 'class="book-tour-wrapper_product_row" style="margin-top:10px;padding:17px 15px;"';
                	?>

					<center id="trip_advisor_in_sidebar"<?=$view;?>>
						<?php echo get_sub_field( 'html' ); ?>
						<?php echo get_sub_field( 'javascript' ); ?>
					</center>

					<?php
                endif;
           	endwhile;
           	?>

        </div>
    </div>

	<?php
endif;
?>
