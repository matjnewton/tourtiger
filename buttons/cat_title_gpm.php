                            <?php
                                include(locate_template('includes/integrate_vars_gpm.php' ));
                            ?>
                            <strong>
                                <?php if($integrate_xola && $use_as_integration_link && !$mobd): ?>

                                    <?php if($third_party == "xola-single-item"): ?>
                                        <?php
                                                $xsi = explode(",",$link);
                                                $seller = $xsi[0];
                                                $experience = $xsi[1];
                                                $version = $xsi[2];
                                            ?>
                                        <div class="xola-checkout xola-custom" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>"><?php echo $headline; ?></div>
                                    <?php elseif($third_party == "xola-multi-item"): ?>
                                        <div class="xola-checkout xola-custom" data-button-id="<?php if($link): echo $link; endif; ?>"><?php echo $headline; ?></div>
                                    <?php else: ?>
                                        <div data-button-id="<?php if($link): echo $link; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom"><?php echo $headline; ?></div>
                                    <?php endif; ?>

                                <?php elseif($integrate_peek && $use_as_integration_link && !$mobd): ?>
                                <a href="<?php if($link): echo $link; endif; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="<?php echo $headline; ?>" data-activity-gid="<?php if($link): echo $link; endif; ?>"><?php echo $headline; ?></a>
                                <?php elseif($integrate_fareharbor && $use_as_integration_link && !$mobd): ?>
                                <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $link.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $link.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $link; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>">
                                    <?php echo $headline; ?>
                                </a>
                                <?php elseif($integrate_getinsellout && $use_as_integration_link && !$mobd): ?>
                                <a class="giso_cb giso_btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $headline; ?></a>
                                <?php elseif($integrate_trekksoft && $use_as_integration_link && !$mobd): ?>
                                <?php
                                    $arr = explode(",",$link);
                                    $format1 = $arr[0];
                                    $format2 = $arr[1];
                                ?>
                                <a href="#" id="<?php if($link): echo 'catitle_trekksoft_' . $format1; endif; ?>"><?php echo $headline; ?></a>
                                <script>// <![CDATA[
        (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'catitle_trekksoft_' . $format1; endif; ?>"); })();
        // ]]></script>
                                <?php elseif($integrate_rezdy && $use_as_integration_link && !$mobd): ?>
                                    <a class="button-booking rezdy rezdy-modal" href="<?php if($link): echo $link; endif; ?>">
                                        <?php echo $headline; ?>
                                    </a>
                                <?php elseif($integrate_zaui && $use_as_integration_link && !$mobd): ?>
                                    <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override" href="<?php if($link): echo $link; endif; ?>">
                                        <?php echo $headline; ?>
                                    </a>
                                <?php elseif($integrate_regiondo && $use_as_integration_link && !$mobd): ?>
                                    <a class="regiondo-button" data-url="<?php if($link): echo $link; endif; ?>">
                                        <?php echo $headline; ?>
                                    </a>
                                <?php elseif($use_as_integration_link && $mobd): ?>
                                    <?php echo $headline; ?>
                                <?php else: ?>
                                <a href="<?php echo $link; ?>">
                                    <?php echo $headline; ?>
                                </a>
                                <?php endif; ?>
                            </strong>