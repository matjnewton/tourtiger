                        <?php
                            include(locate_template('includes/integrate_vars_gpm.php' ));

                        $button_label = $button_label ?? '';
                        $tl = $tl ?? '';
                        $tile_count =  $tile_count ?? '';
                        $use_as_integration_link = $use_as_integration_link ?? '';
                        $integrate_xola = $integrate_xola ?? '';
                        $third_party = $third_party ?? '';
                        $integrate_peek = $integrate_peek ?? '';
                        $integrate_fareharbor = $integrate_fareharbor ?? '';
                        $fareharbor_shortname = $fareharbor_shortname ?? '';
                        $integrate_getinsellout = $integrate_getinsellout ?? '';
                        $getinsellout_data_pn = $getinsellout_data_pn ?? '';
                        $getinsellout_data_url = $getinsellout_data_url ?? '';
                        $integrate_trekksoft = $integrate_trekksoft ?? '';
                        $getinsellout_data_evt = $getinsellout_data_evt ?? '';
                        $mobd = $mobd ?? '';
                        $link = $link ?? '';
                        $image = $image ?? '';
                        $image_url = $image_url ?? '';
                        $integrate_rezdy = $integrate_rezdy ?? '';
                        $integrate_zaui = $integrate_zaui ?? '';
                        $integrate_regiondo = $integrate_regiondo ?? '';

                        ?>
                        <?php if($integrate_xola && $use_as_integration_link && !$mobd): ?>

                                <?php if($third_party == "xola-single-item"): ?>
                                    <?php
                                        $xsi = explode(",",$link);
                                        $seller = $xsi[0];
                                        $experience = $xsi[1];
                                        $version = $xsi[2];
                                    ?>
                                    <div class="xola-checkout xola-custom tile-image" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                        <div class="tile-tint"></div>
                                    </div>
                                <?php elseif($third_party == "xola-multi-item"): ?>
                                    <div class="xola-checkout xola-custom tile-image" data-button-id="<?php if($link): echo $link; endif; ?>">
                                        <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                        <div class="tile-tint"></div>
                                    </div>
                                <?php else: ?>
                                    <div data-button-id="<?php if($link): echo $link; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom tile-image">
                                        <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                        <div class="tile-tint"></div>
                                    </div>
                                <?php endif; ?>

                        <?php elseif($integrate_peek && $use_as_integration_link && !$mobd): ?>
                            <?php if ($image_url): ?>
                            <a href="<?php if($link): echo $link; endif; ?>" class="peek-book-button-flat tile-image" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php if($link): echo $link; endif; ?>" style="padding:0; width:100%;">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
                                <div class="tile-tint"></div>
                            </a>
                            <?php endif; /*end $image_url*/?>
                        <?php elseif($integrate_fareharbor && $use_as_integration_link && !$mobd): ?>
                            <a class="tile-image" href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $link.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $link.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $link; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
                                <div class="tile-tint"></div>
                            </a>
                        <?php elseif($integrate_getinsellout && $use_as_integration_link && !$mobd): ?>
                            <a class="giso_cb giso_btn tile-image"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" /><div class="tile-tint"></div></a>
                        <?php elseif($integrate_trekksoft && $use_as_integration_link && !$mobd): ?>
                            <?php
                                $arr = explode(",",$link);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" id="<?php if($link): echo 'cathumb_trekksoft_' . $format1; endif; ?>" class="tile-image">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
                                <div class="tile-tint"></div>
                            </a>
                            <script>// <![CDATA[
        (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'cathumb_trekksoft_' . $format1; endif; ?>"); })();
        // ]]></script>
                        <?php elseif($integrate_rezdy && $use_as_integration_link && !$mobd): ?>
                            <a class="button-booking rezdy rezdy-modal tile-image" href="<?php if($link): echo $link; endif; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                            </a>
                        <?php elseif($integrate_zaui && $use_as_integration_link && !$mobd): ?>
                            <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override tile-image" href="<?php if($link): echo $link; endif; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                            </a>
                        <?php elseif($integrate_regiondo && $use_as_integration_link && !$mobd): ?>
                            <a class="regiondo-button tile-image" data-url="<?php if($link): echo $link; endif; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                            </a>
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

