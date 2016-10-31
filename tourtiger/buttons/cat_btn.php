                        <?php
                            include(locate_template('includes/integrate_vars.php' ));
                        ?>
                        <div class="view-btn-wrapper">
                            <div class="view-tour-btn">
                            <?php if($integrate_xola && $use_as_integration_link): ?>
                                <?php if($third_party == "xola-single-item"): ?>
                                    <?php
                                            $xsi = explode(",",$link);
                                            $seller = $xsi[0];
                                            $experience = $xsi[1];
                                            $version = $xsi[2];
                                    ?>
                                    <div class="xola-checkout xola-custom" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <?php echo $button_label; ?>
                                    </div>
                                <?php elseif($third_party == "xola-multi-item"): ?>
                                    <div class="xola-checkout xola-custom" data-button-id="<?php if($link): echo $link; endif; ?>">
                                        <?php echo $button_label; ?>
                                    </div>
                                <?php else: ?>
                                    <div id="<?php if($link): echo $link; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom">
                                        <?php echo $button_label; ?>
                                    </div>
                                <?php endif; ?>
                            <?php elseif($integrate_peek && $use_as_integration_link): ?>
                                <a href="http://www.peek.com/purchase/activity/widget/<?php if($link): echo $link; endif; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="<?php echo $button_label; ?>" data-activity-gid="<?php if($link): echo $link; endif; ?>" style="border-radius:0;">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php elseif($integrate_fareharbor && $use_as_integration_link): ?>
                                <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $link.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $link.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $link; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php elseif($integrate_getinsellout && $use_as_integration_link): ?>
                                <a class="giso_cb giso_btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $button_label; ?></a>
                            <?php elseif($integrate_trekksoft && $use_as_integration_link): ?>
                            <?php
                                $arr = explode(",",$link);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" id="<?php if($link): echo 'catbtn_trekksoft_' . $format1; endif; ?>">
                            <?php echo $button_label; ?>    
                            </a>  
                            <script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'catbtn_trekksoft_' . $format1; endif; ?>"); })();
// ]]></script>    
                            <?php elseif($integrate_rezdy && $use_as_integration_link): ?>
                                <a class="button-booking rezdy rezdy-modal" href="<?php if($link): echo $link; endif; ?>">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php elseif($integrate_zaui && $use_as_integration_link): ?>
                                <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override" href="<?php if($link): echo $link; endif; ?>">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php else: ?>
                                <a href="<?php if($link): echo $link; else: echo '#'; endif; ?>">
                                    <?php echo $button_label; ?>
                                </a>
                            <?php endif; ?>
                            </div>
                        </div>
                        
                        