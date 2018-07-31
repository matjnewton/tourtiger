                <?php
                    include(locate_template('includes/integrate_vars_gpm.php' ));
                    $img = (int) get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_image', true );
                                $image_url = wp_get_attachment_url( $img,'full');
                                $headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_headline', true );
                                $button_label = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_button_label', true );
                                $use_as_integration_link = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_use_as_third_party_integration_link', true );
                                $link = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_link', true );
                                $excerpt = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_excerpt', true );
                                $mobd = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_multi_option_button_dropdown', true );
                ?>
                <?php
                    if($col == 6):
            $image = aq_resize( $image_url, 559, 327, true ); //resize & crop img
            else:
            $image = aq_resize( $image_url, 450, 368, true ); //resize & crop img
            endif;
                ?>
                    <div class="tour">
                        <?php if($integrate_xola && $use_as_integration_link && !$mobd): ?>
                            <div id="<?php if($link): echo $link; endif; ?>" class="xola-checkout xola-custom tile-image">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                            </div>
                        <?php elseif($integrate_peek && $use_as_integration_link && !$mobd): ?>
                            <a href="http://www.peek.com/purchase/activity/widget/<?php echo $link; ?>" class="peek-book-button-flat tile-image" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php if($link): echo $link; endif; ?>" style="padding:0; width:100%;">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
                                <div class="tile-tint"></div>
                            </a>
                        <?php elseif($integrate_getinsellout && $use_as_integration_link && !$mobd): ?>
                            <a class="giso_cb giso_btn tile-image"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" /><div class="tile-tint"></div></a>
                        <?php elseif($use_as_integration_link && $mobd): ?>
                        <div class="tile-image">
                            <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                            <div class="tile-tint"></div>
                        </div>
                        <?php else: ?>
                            <?php if ($image_url): ?>
                            <a href="<?php echo $link; ?>" class="tile-image">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
                                <div class="tile-tint"></div>
                            </a>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <div class="title-excerpt">
                            <strong>
                            <?php if($integrate_xola && $use_as_integration_link && !$mobd): ?>
                                <div id="<?php if($link): echo $link; endif; ?>" class="xola-checkout xola-custom"><?php echo $headline; ?></div>
                            <?php elseif($integrate_peek && $use_as_integration_link && !$mobd): ?>
                                <a href="http://www.peek.com/purchase/activity/widget/<?php if($link): echo $link; endif; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="<?php echo $headline; ?>" data-activity-gid="<?php if($link): echo $link; endif; ?>"><?php echo $headline; ?></a>
                            <?php elseif($integrate_getinsellout && $use_as_integration_link && !$mobd): ?>
                                <a class="giso_cb giso_btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $headline; ?></a>
                            <?php elseif($use_as_integration_link && $mobd): ?>
                                <?php echo $headline; ?>
                            <?php else: ?>
                                <a href="<?php echo $link; ?>">
                                    <?php echo $headline; ?>
                                </a>
                            <?php endif; ?>    
                            </strong>
                            
                        </div>
                        
                        <?php if($button_label && !$mobd): ?>
                        <div class="view-btn-wrapper">
                            <div class="view-tour-btn">
                            <?php if($integrate_xola && $use_as_integration_link): ?>
                                <div id="<?php if($link): echo $link; endif; ?>" class="xola-checkout xola-custom">
                                    <?php echo $button_label; ?>
                                </div>
                            <?php elseif($integrate_peek && $use_as_integration_link): ?>
                                <a href="http://www.peek.com/purchase/activity/widget/<?php if($link): echo $link; endif; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="<?php echo $button_label; ?>" data-activity-gid="<?php if($link): echo $link; endif; ?>" style="border-radius:0;">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php elseif($integrate_getinsellout && $use_as_integration_link): ?>
                                <a class="giso_cb giso_btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $button_label; ?></a>
                            <?php else: ?>
                                <a href="<?php if($link): echo $link; else: echo '#'; endif; ?>">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php endif; ?>
                            </div>
                        </div>
                        <?php elseif($button_label && $mobd): ?>
                            <div class="view-dropdown-wrapper view-btn-wrapper">
                                <div class="view-dropdown-tour-btn">
                            <div class="btn-group">
                              <button type="button" class="btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $button_label; ?> <span class="caret"></span>
                              </button>
                            <?php 
                                $button_sub_options = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_button_sub_options', true );
                                if( $button_sub_options ): 
                            ?>
                            	<ul class="dropdown-menu">
                            	<?php 
                                	for( $tfc = 0; $tfc < $button_sub_options; $tfc++ ):
                                	    $button_text = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_button_sub_options_' . $tfc . '_button_text', true );
                            		    $link = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_button_sub_options_' . $tfc . '_link', true );
                            		?>
                            		<li>
                            		<?php if($integrate_xola && $use_as_integration_link): ?>
                            		    <div id="<?php if($link): echo $link; endif; ?>" class="xola-checkout xola-custom">
                                        <?php echo $button_text; ?>
                                        </div>
                                    <?php elseif($integrate_peek && $use_as_integration_link): ?>
                                        <a href="http://www.peek.com/purchase/activity/widget/<?php echo $link; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $link; ?>" style="border-radius:0; text-align:left;"><?php echo $button_text; ?></a>
                                    <?php elseif($integrate_getinsellout && $use_as_integration_link): ?>
                                        <a class="giso_cb giso_btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $button_text; ?></a>
                            		<?php else: ?>
                            		    <?php if($button_text): ?>
                                        <a href="<?php echo $link; ?>"><?php echo $button_text; ?></a>
                            		    <?php endif; ?>
                                    <?php endif; ?>
                                    </li>
                            	<?php 
                                	endfor; 
                                ?>
                            	</ul>
                            <?php endif; ?>
                            </div>
                                </div><!-- end .view-dropdown-tour-btn-->
                            </div><!-- end .view-btn-wrapper-->
                        <?php endif; ?>
                        
                    </div>
