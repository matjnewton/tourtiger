                        <?php
                            include(locate_template('includes/integrate_vars.php' ));
                        ?>
                        <?php if($integrate_xola && $use_as_integration_link): ?>
                            
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
                                <div class="tile-tint2"></div>
                            </div>
                            <?php elseif($third_party == "xola-multi-item"): ?>
                            <div class="xola-checkout xola-custom tile-image" data-button-id="<?php if($link): echo $link; endif; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </div>
                            <?php else: ?>
                            <div data-button-id="<?php if($link): echo $link; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom tile-image">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </div>
                            <?php endif; ?>
                        <?php elseif($integrate_getinsellout && $use_as_integration_link): ?>
                            <a class="giso_cb giso_btn tile-image"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" /><div class="tile-tint"></div><div class="tile-tint2"></div></a>
                        <?php elseif($integrate_trekksoft && $use_as_integration_link): ?>
                            <?php
                                $arr = explode(",",$link);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" id="<?php if($link): echo 'cathumb_trekksoft_' . $format1; endif; ?>" class="tile-image">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </a>
                            <script>// <![CDATA[
        (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'cathumb_trekksoft_' . $format1; endif; ?>"); })();
        // ]]></script>
                        <?php elseif($integrate_rezdy && $use_as_integration_link): ?>
                            <a class="button-booking rezdy rezdy-modal tile-image" href="<?php echo $link; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </a>
                        <?php elseif($integrate_zaui && $use_as_integration_link): ?>
                            <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override tile-image" href="<?php echo $link; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </a>
                        <?php elseif($integrate_regiondo && $use_as_integration_link): ?>
                            <a class="regiondo-button tile-image" data-url="<?php echo $link; ?>">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </a>
                        <?php else: ?>
                            <?php if ($image_url): ?>
                            <a href="<?php echo $link; ?>" class="tile-image">
                                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                                <div class="tile-tint"></div>
                                <div class="tile-tint2"></div>
                            </a>
                            <?php endif; ?>
                        <?php endif; ?>