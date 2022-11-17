                        <?php
                            include(locate_template('includes/integrate_vars_gpm.php' ));
                        ?>
                        <div class="view-btn-wrapper">
                            <div class="view-tour-btn">
                            <?php if(isset($integrate_xola)&&$integrate_xola && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <?php if(isset($third_party)&&$third_party == "xola-single-item"): ?>
                                    <?php
                                            $xsi = explode(",",$link??'');
                                            $seller = $xsi[0];
                                            $experience = $xsi[1];
                                            $version = $xsi[2];
                                    ?>
                                    <div class="xola-checkout xola-custom" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <?php echo $button_label??''; ?>
                                    </div>
                                <?php elseif(isset($third_party)&&$third_party == "xola-multi-item"): ?>
                                    <div class="xola-checkout xola-custom" data-button-id="<?php if(isset($link)&&$link): echo $link; endif; ?>">
                                        <?php echo $button_label??''; ?>
                                    </div>
                                <?php else: ?>
                                    <div data-button-id="<?php if(isset($link)&&$link): echo $link; endif; ?>" class="<?php if(isset($third_party)&&$third_party == "xola-checkout"): ?>xola-checkout <?php elseif(isset($third_party)&&$third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom">
                                        <?php echo $button_label??''; ?>
                                    </div>
                                <?php endif; ?>
                            <?php elseif(isset($integrate_peek)&&$integrate_peek && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <a href="<?php if(isset($link)&&$link): echo $link; endif; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="<?php echo $button_label??''; ?>" data-activity-gid="<?php if(isset($link)&&$link): echo $link; endif; ?>" style="border-radius:0;">
                                    <?php echo $button_label??''; ?>
                                </a>
                            <?php elseif(isset($integrate_fareharbor)&&$integrate_fareharbor && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <a href="<?php if(isset($fareharbor_shortname)&&$fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if(isset($third_party)&&$third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if(isset($third_party)&&$third_party == 'tour-item'): echo $link??''.'/'; endif; ?><?php if(isset($third_party)&&$third_party == 'tour-item-calendar'): echo $link.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if(isset($fareharbor_shortname)&&$fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if(isset($third_party)&&$third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if(isset($third_party)&&$third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $link??''; ?> }<?php endif; ?><?php if(isset($third_party)&&!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>">
                                    <?php echo $button_label??''; ?>
                                </a>
                            <?php elseif(isset($integrate_getinsellout)&&$integrate_getinsellout && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <a class="giso_cb giso_btn"<?php if(isset($getinsellout_data_pn)&&$getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if(isset($getinsellout_data_url)&&$getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if(isset($getinsellout_data_evt)&&$getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if(isset($link)&&$link): echo $link; endif; ?>"><?php echo $button_label??''; ?></a>
                            <?php elseif(isset($integrate_trekksoft)&&$integrate_trekksoft && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                            <?php
                                $arr = explode(",",$link??'');
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" id="<?php if(isset($link)&&$link): echo 'catbtn_trekksoft_' . $format1; endif; ?>">
                            <?php echo $button_label??''; ?>
                            </a>
                            <script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if(isset($third_party)&&$third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif(isset($third_party)&&$third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if(isset($link)&&$link): echo 'catbtn_trekksoft_' . $format1; endif; ?>"); })();
// ]]></script>
                            <?php elseif(isset($integrate_rezdy)&&$integrate_rezdy && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <a class="button-booking rezdy rezdy-modal" href="<?php if(isset($link)&&$link): echo $link; endif; ?>">
                                    <?php echo $button_label??''; ?>
                                </a>
                            <?php elseif(isset($integrate_zaui)&&$integrate_zaui && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override" href="<?php if(isset($link)&&$link): echo $link; endif; ?>">
                                    <?php echo $button_label??''; ?>
                                </a>
                            <?php elseif(isset($integrate_regiondo)&&$integrate_regiondo && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                <a class="regiondo-button" data-url="<?php if(isset($link)&&$link): echo $link; endif; ?>">
                                    <?php echo $button_label??''; ?>
                                </a>
                            <?php else: ?>
                                <a href="<?php if(isset($link)&&$link): echo $link; else: echo '#'; endif; ?>">
                                    <?php echo $button_label??''; ?>
                                </a>
                            <?php endif; ?>
                            </div>
                        </div>

