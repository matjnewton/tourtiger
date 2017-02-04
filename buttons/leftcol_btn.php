                            <?php
                                include(locate_template('includes/integrate_vars.php' ));
                            ?>
                            <?php if($integrate_xola && $use_as_integration_link): ?>

                                <?php if($third_party == "xola-single-item"): ?>
                                    <?php
                                        $xsi = explode(",",$bbl);
                                        $seller = $xsi[0];
                                        $experience = $xsi[1];
                                        $version = $xsi[2];
                                    ?>
                                    <div class="xola-checkout xola-custom book-btn"<?php if($bb_radius): echo ' style="border-radius:'.$bb_radius.'px"'; endif;?> data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <?php echo $bbt; ?>
                                    </div>
                                <?php elseif($third_party == "xola-multi-item"): ?>
                                    <div class="xola-checkout xola-custom book-btn"<?php if($bb_radius): echo ' style="border-radius:'.$bb_radius.'px"'; endif;?> data-button-id="<?php if($bbl): echo $bbl; endif; ?>">
                                        <?php echo $bbt; ?>
                                    </div>
                                <?php else: ?>
                                    <div data-button-id="<?php if($bbl): echo $bbl; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom book-btn"<?php if($bb_radius): echo ' style="border-radius:'.$bb_radius.'px"'; endif;?>>
                                        <?php echo $bbt; ?>
                                    </div>
                                <?php endif; ?>

                            <?php elseif($integrate_peek && $use_as_integration_link): ?>
                            <a href="http://www.peek.com/purchase/activity/widget/<?php echo $bbl; ?>" class="peek-book-button-flat book-btn" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $bbl; ?>" style="border-radius:0;">
                                <?php echo $bbt; ?>
                            </a>
                            <?php elseif($integrate_fareharbor && $use_as_integration_link): ?>
                            <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $bbl.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $bbl.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $bbl; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>" class="book-btn">
                                <?php echo $bbt; ?>
                            </a>
                            <?php elseif($integrate_getinsellout && $use_as_integration_link): ?>
                            <a class="giso_cb giso_btn book-btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($bbl): echo $bbl; endif; ?>">
                                <?php echo $bbt; ?>
                            </a>
                            <?php elseif($integrate_trekksoft && $use_as_integration_link): ?>
                            <?php
                                $arr = explode(",",$bbl);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" class="book-btn" id="<?php if($bbl): echo 'lcbtn_trekksoft_' . $format1; endif; ?>">
                            <?php echo $bbt; ?>    
                            </a>
                            <script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($bbl): echo 'lcbtn_trekksoft_' . $format1; endif; ?>"); })();
// ]]></script>
                            <?php elseif($integrate_rezdy && $use_as_integration_link): ?>
                            <a class="button-booking rezdy rezdy-modal book-btn" href="<?php if($bbl): echo $bbl; endif; ?>">
                                <?php echo $bbt; ?>
                            </a>
                            <?php elseif($integrate_zaui && $use_as_integration_link): ?>
                            <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override book-btn" href="<?php if($bbl): echo $bbl; endif; ?>">
                                <?php echo $bbt; ?>
                            </a>
                            <?php elseif($integrate_regiondo && $use_as_integration_link): ?>
                            <a class="regiondo-button book-btn" data-url="<?php if($bbl): echo $bbl; endif; ?>">
                                <?php echo $bbt; ?>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo $bbl; ?>"<?php if($cta_onclick): ?> onclick="<?php echo $cta_onclick; ?>"<?php endif; ?> class="book-btn"<?php if($bb_radius): echo ' style="border-radius:'.$bb_radius.'px"'; endif;?>><?php echo $bbt; ?></a>
                            <?php endif; ?>