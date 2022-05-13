                        <?php
                            include(locate_template('includes/integrate_vars.php' ));
                        ?>
                        <?php
                        $check_user_id_xola = get_field('check_user_id_xola', 'options');
                        $integrate_atlasx_with_this_website = get_field('integrate_atlasx_with_this_website', 'options');
                        ?>
                        <div class="book-btn2-product btn-group">
                              <button type="button" class="btn-default dropdown-toggle book-btn2-inner" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <span class="caret"></span>
                                </div>
                              </button>

                            <?php if( have_rows('button_sub_options') ): ?>
                            <?php $smobd_counter = 0; ?>

                            	<ul class="dropdown-menu" data-checker="sidebar_mobd_product">
                            	<?php while( have_rows('button_sub_options') ): the_row();
                            		$button_text = get_sub_field('button_text');
                                    $link = get_sub_field('link');
                                    $smobd_counter++;
                                    $dz_iframe = $button_type == 'iframe-popup' ? 'data-iframe-popup="'.$link.'"' : '';
                            		?>
                            		<li>
                            		<?php if($integrate_xola && ($button_type == 'Use as third party integration Link')): ?>

                                        <?php if($third_party == "xola-single-item"): ?>
                                        <?php
                                            $xsi = explode(",",$link);
                                            $seller = $xsi[0];
                                            $experience = $xsi[1];
                                            $version = $xsi[2];
                                        ?>
                                            <div class="xola-checkout xola-custom" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                                <?php echo $button_text; ?>
                                            </div>
                                        <?php elseif($third_party == "xola-multi-item"): ?>
                                            <div class="xola-checkout xola-custom" data-button-id="<?php if($link): echo $link; endif; ?>">
                                                <?php echo $button_text; ?>
                                            </div>
                                        <?php else: ?>
                                            <div id="<?php if($link): echo $link; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom">
                                                <?php echo $button_text; ?>
                                            </div>
                                        <?php endif; ?>


                                    <?php elseif($integrate_peek && ($button_type == 'Use as third party integration Link')): ?>
                                        <a href="http://www.peek.com/purchase/activity/widget/<?php echo $link; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $link; ?>" style="border-radius:0; text-align:left;"><?php echo $button_text; ?></a>
                                    <?php elseif($integrate_fareharbor && ($button_type == 'Use as third party integration Link')): ?>
                                        <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $link.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $link.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $link; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>"><?php echo $button_text; ?></a>
                                    <?php elseif($integrate_getinsellout && ($button_type == 'Use as third party integration Link')): ?>
                            		    <a class="giso_cb giso_btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $button_text; ?></a>
                                    <?php elseif($integrate_trekksoft && ($button_type == 'Use as third party integration Link')): ?>
                                        <?php
                                            $arr = explode(",",$link);
                                            $format1 = $arr[0];
                                            $format2 = $arr[1];
                                        ?>
                                        <a href="#" id="<?php if($link): echo 'smobd'.$smobd_counter.'_trekksoft_' . $format1; endif; ?>">
                                        <?php echo $button_text; ?>
                                        </a>
            <script>// <![CDATA[
            (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'smobd'.$smobd_counter.'_trekksoft_' . $format1; endif; ?>"); })();
            // ]]>
            </script>
                            		<?php elseif($integrate_rezdy && ($button_type == 'Use as third party integration Link')): ?>
                            		    <a class="button-booking rezdy rezdy-modal" href="<?php echo $link; ?>"><?php echo $button_text; ?></a>

                                    <?php elseif($integrate_atlasx_with_this_website && ($button_type == 'Use as third party integration Link')): ?>
                                    <div class="button-booking xola-checkout xola-custom " data-seller="<?php echo $check_user_id_xola; ?>" data-version="2">
                                        <?php echo $button_text; ?></span>
                                    </div>

                                    <?php else: ?>
                            		    <?php if($button_text): ?>
                                        <a <?=$dz_iframe;?> href="<?php echo $link; ?>"><?php echo $button_text; ?></a>
                            		    <?php endif; ?>
                                    <?php endif; ?>
                                    </li>
                            	<?php endwhile; ?>
                            	</ul>
                            <?php endif; ?>
                        </div><!-- end .btn-group-->
