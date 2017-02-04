                            <?php
                                include(locate_template('includes/integrate_vars.php' ));
                            ?>
                            <?php if($integrate_xola && ($button_type == 'Use as third party integration Link')): ?>

                                <?php if($third_party == "xola-single-item"): ?>
                                <?php
                                    $xsi = explode(",",$bbl);
                                    $seller = $xsi[0];
                                    $experience = $xsi[1];
                                    $version = $xsi[2];
                                ?>
                                    <div class="book-btn2-product xola-checkout xola-custom _book-btn2" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <div class="book-btn2-product-title">
                                            <span><?php echo $bbt; ?></span>
                                            <i class="fa fa-angle-right"></i>
                                        </div> 
                                        <!-- <div class="arrow-left"></div> -->
                                        <!-- <div><?php echo $bbt; ?></div> -->
                                        <!-- <div class="arrow-right"></div> -->
                                    </div>
                                <?php elseif($third_party == "xola-multi-item"): ?>
                                    <div class="book-btn2-product xola-checkout xola-custom _book-btn2" data-button-id="<?php if($bbl): echo $bbl; endif; ?>">
                                        <div class="book-btn2-product-title">
                                            <span><?php echo $bbt; ?></span>
                                            <i class="fa fa-angle-right"></i>
                                        </div> 
                                        <!-- <div class="arrow-left"></div> -->
                                       <!--  <div><?php echo $bbt; ?></div> -->
                                        <!-- <div class="arrow-right"></div> -->
                                    </div>
                                <?php else: ?>
                                    <div id="<?php if($bbl): echo $bbl; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?> xola-custom _book-btn2 book-btn2-product">
                                        <div class="book-btn2-product-title">
                                            <span><?php echo $bbt; ?></span>
                                            <i class="fa fa-angle-right"></i>
                                        </div> 
                                       <!--  <div class="arrow-left"></div> -->
                                        <!-- <div><?php echo $bbt; ?></div> -->
                                        <!-- <div class="arrow-right"></div> -->
                                    </div>
                                <?php endif; ?>

                            <?php elseif($integrate_peek && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="http://www.peek.com/purchase/activity/widget/<?php echo $bbl; ?>" class="peek-book-button-flat _book-btn2 book-btn2-product" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $bbl; ?>" style="border-radius:0;">
                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <i class="fa fa-angle-right"></i>
                                </div> 
                                <!-- <div class="arrow-left"></div> -->
                                <!-- <div><?php echo $bbt; ?></div> -->
                                <!-- <div class="arrow-right"></div> -->
                            </a>
                            <?php elseif($integrate_fareharbor && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $bbl.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $bbl.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $bbl; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>" class="_book-btn2 book-btn2-product">
                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <i class="fa fa-angle-right"></i>
                                </div> 
                                <!-- <div class="arrow-left"></div> -->
                                <!-- <div><?php echo $bbt; ?></div> -->
                                <!-- <div class="arrow-right"></div> -->
                            </a>
                            <?php elseif($integrate_getinsellout && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="giso_cb giso_btn _book-btn2 book-btn2-product"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($bbl): echo $bbl; endif; ?>">
                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <i class="fa fa-angle-right"></i>
                                </div> 
                                <!-- <div class="arrow-left"></div> -->
                                <!-- <?php echo $bbt; ?> -->
                                <!-- <div class="arrow-right"></div> -->
                            </a>
                            <?php elseif($integrate_trekksoft && ($button_type == 'Use as third party integration Link')): ?>
                            <?php
                                $arr = explode(",",$bbl);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" class="book-btn2-product" id="<?php if($bbl): echo 'sbtn_trekksoft_' . $format1; endif; ?>">
                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <i class="fa fa-angle-right"></i>
                                </div>    
                            </a>
<script>
// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($bbl): echo 'sbtn_trekksoft_' . $format1; endif; ?>"); })();
// ]]>
</script>
                            <?php elseif($integrate_rezdy && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="button-booking rezdy rezdy-modal book-btn2-product" href="<?php echo $bbl; ?>">

                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <i class="fa fa-angle-right"></i>
                                </div>

                            </a>
                            <?php else: ?>
                            <a <?php if($button_type == 'Link to form'): ?>id="scroll_to_form" <?php endif; ?> <?php if($button_type == 'Link to form'): ?>data-scroll-nav='100'<?php endif; ?> href="<?php if($button_type == 'Link to form'): echo '#'; else: echo $bbl; endif; ?>"<?php if($cta_onclick): ?> onclick="<?php echo $cta_onclick; ?>"<?php endif; ?> class="book-btn2-product">

                                <div class="book-btn2-product-title">
                                    <span><?php echo $bbt; ?></span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </a>
                            <?php endif; ?>