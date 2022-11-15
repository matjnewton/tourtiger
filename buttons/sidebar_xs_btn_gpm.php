                            <?php
                                include(locate_template('includes/integrate_vars_gpm.php' ));
                            ?>
                            <?php if(isset($integrate_xola) && $integrate_xola && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                                <?php if(isset($third_party) && $third_party == "xola-single-item" && isset($xsi) && is_array($xsi)): ?>
                                    <?php
                                        $xsi = explode(",",$bbl??'');
                                        $seller = $xsi[0] ?? '';
                                        $experience = $xsi[1] ?? '';
                                        $version = $xsi[2] ?? '';
                                    ?>
                                    <div class="xola-checkout xola-custom book-btn2" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <div class="arrow-left"></div>
                                        <div><?php echo $bbt??''; ?></div>
                                        <div class="arrow-right"></div>
                                    </div>
                                <?php elseif($third_party == "xola-multi-item"): ?>
                                    <div class="xola-checkout xola-custom book-btn2" data-button-id="<?php if(isset($bbl)): echo $bbl; endif; ?>">
                                        <div class="arrow-left"></div>
                                        <div><?php echo $bbt??''; ?></div>
                                        <div class="arrow-right"></div>
                                    </div>
                                <?php else: ?>
                                    <div data-button-id="<?php if(isset($bbl)): echo $bbl; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?> xola-custom book-btn2">
                                        <div class="arrow-left"></div>
                                        <div><?php echo $bbt??''; ?></div>
                                        <div class="arrow-right"></div>
                                    </div>
                                <?php endif; ?>
                            <?php elseif(isset($integrate_peek)&&$integrate_peek && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="<?php echo $bbl??''; ?>" class="peek-book-button-flat book-btn2" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $bbl??''; ?>" style="border-radius:0;">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt ?? ''; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif(isset($integrate_fareharbor) && $integrate_fareharbor && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="<?php if(isset($fareharbor_shortname)&&$fareharbor_shortname && isset($third_party)):
                                    ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $bbl??''.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $bbl.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $bbl; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>" class="book-btn2">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt??''; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_getinsellout??'' && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="giso_cb giso_btn book-btn2"<?php if($getinsellout_data_pn??''): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url??''): ?> data-url="<?php echo $getinsellout_data_url??''; ?>"<?php endif; ?><?php if($getinsellout_data_evt??''): ?> data-evt="<?php echo $getinsellout_data_evt??''; ?>"<?php endif; ?> href="<?php if($bbl??''): echo $bbl; endif; ?>">
                                <div class="arrow-left"></div>
                                <?php echo $bbt??''; ?>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_trekksoft??'' && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <?php
                                $arr = explode(",",$bbl ?? '');
                                $format1 = $arr[0] ?? '';
                                $format2 = $arr[1] ?? '';
                            ?>
                            <a href="#" class="book-btn2" id="<?php if($bbl ?? ''): echo 'sxsbtn_trekksoft_' . $format1; endif; ?>">
                            <?php echo $bbt??''; ?>
                            </a>
                            <script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if(isset($third_party) && $third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($bbl): echo 'sxsbtn_trekksoft_' . $format1; endif; ?>"); })();
// ]]></script>
                            <?php elseif($integrate_rezdy??'' && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="button-booking rezdy rezdy-modal book-btn2" href="<?php echo $bbl ?? ''; ?>">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt ?? ''; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif(isset($integrate_zaui) && $integrate_zaui && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override book-btn2" href="<?php echo $bbl??''; ?>">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt??''; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif(isset($integrate_orioly)&&$integrate_orioly && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <div class="book-btn2 mh58">
                                <div class="arrow-left"></div>
                                    <a class="orioly-booknow" data="<?php if(isset($bbl)): echo $bbl; endif; ?>" style="color:#fff !important;"><?php echo $bbt??''; ?></a>
                                <div class="arrow-right"></div>
                            </div>
                            <?php elseif(isset($integrate_regiondo)&&$integrate_regiondo && isset($button_type) && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="regiondo-button book-btn2" data-url="<?php echo $bbl??''; ?>">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt??''; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php else: ?>
                            <a <?php if(isset($button_type) && $button_type == 'Link to form'): ?>data-scroll-nav='100'<?php endif; ?> href="<?php if(isset($button_type) && $button_type == 'Link to form'): echo '#'; else: echo $bbl??''; endif; ?>"<?php if(isset($cta_onclick)&&$cta_onclick): ?> onclick="<?php echo $cta_onclick; ?>"<?php endif; ?> class="book-btn2">
                                <?php echo $bbt??''; ?>
                            </a>
                            <?php endif; ?>
