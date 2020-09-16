                        <?php
                            include(locate_template('includes/integrate_vars_gpm.php' ));
                        ?>
                        <div class="btn-group book-btn-wrapper book-btn2">
                            <div class="arrow-left"></div>
                              <button type="button" class="btn-default dropdown-toggle book-btn2-inner" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                                <?php echo $bbt; ?> <span class="caret"></span>
                              </button>
                            <div class="arrow-right"></div>
                        <?php $button_sub_options = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_button_sub_options', true ); ?>
                        <?php if( $button_sub_options ): ?>
                        	<ul class="dropdown-menu" data-checker="sidebar_mobd_gpm">
                        	<?php
                            	for( $sbd = 0; $sbd < $button_sub_options; $sbd++ ):
                                    $button_text = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_button_sub_options_' . $sbd . '_button_text', true );
                                    $link = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_button_sub_options_' . $sbd . '_link', true );
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
                                        <div data-button-id="<?php if($link): echo $link; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom">
                                            <?php echo $button_text; ?>
                                        </div>
                                    <?php endif; ?>


                                <?php elseif($integrate_peek && ($button_type == 'Use as third party integration Link')): ?>
                                    <a href="<?php echo $link; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $link; ?>" style="border-radius:0; text-align:left;"><?php echo $button_text; ?></a>
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
                                    <a href="#" id="<?php if($link): echo 'smobd'.$sbd.'_trekksoft_' . $format1; endif; ?>">
                                    <?php echo $button_text; ?>
                                    </a>
                                    <script>// <![CDATA[
        (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'smobd'.$sbd.'_trekksoft_' . $format1; endif; ?>"); })();
        // ]]></script>
                        		<?php elseif($integrate_rezdy && ($button_type == 'Use as third party integration Link')): ?>
                        		    <a class="button-booking rezdy rezdy-modal" href="<?php echo $link; ?>">
                                    <?php echo $button_text; ?>
                                    </a>
                                <?php elseif($integrate_zaui && ($button_type == 'Use as third party integration Link')): ?>
                                    <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override" href="<?php echo $link; ?>"><?php echo $button_text; ?></a>
                        		<?php elseif($integrate_orioly && ($button_type == 'Use as third party integration Link')): ?>
                        		    <a class="orioly-booknow" data="<?php echo $link; ?>">
                                    <?php echo $button_text; ?>
                                    </a>
                        		<?php elseif($integrate_regiondo && ($button_type == 'Use as third party integration Link')): ?>
                        		    <a class="regiondo-button" data-url="<?php echo $link; ?>">
                                    <?php echo $button_text; ?>
                        		    </a>
                        		<?php else: ?>
                        		    <?php if($button_text): ?>
                                        <a href="<?php echo $link; ?>" <?php if($button_type === 'custom-in-new-tab'): ?>  target="_blank" <?php endif;?>><?php echo $button_text; ?></a>
                        		    <?php endif; ?>
                                <?php endif; ?>
                                </li>
                        	<?php endfor; ?>
                        	</ul>
                        <?php endif; ?>
                        </div><!-- end .btn-group-->
