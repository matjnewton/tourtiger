                    <?php
                        include(locate_template('includes/integrate_vars.php' ));
                    ?>
                    <div class="book-btn-wrapper">
                    <?php if($integrate_xola && ($button_type == 'Use as third party integration Link')): ?>

                            <?php if($third_party == "xola-single-item"): ?>
                                <?php
                                    $xsi = explode(",",$book_tours);
                                    $seller = $xsi[0];
                                    $experience = $xsi[1];
                                    $version = $xsi[2];
                                ?>
                                <div class="xola-checkout xola-custom book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif; ?> data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                    <?php echo $cta_button_text; ?>
                                </div>
                            <?php elseif($third_party == "xola-multi-item"): ?>
                                <div class="xola-checkout xola-custom book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif; ?> data-button-id="<?php if($book_tours): echo $book_tours; endif; ?>">
                                    <?php echo $cta_button_text; ?>
                                </div>
                            <?php else: ?>
                                <div data-button-id="<?php if($book_tours): echo $book_tours; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                                    <?php echo $cta_button_text; ?>
                                </div>
                            <?php endif; ?>

                    <?php elseif($integrate_peek && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="http://www.peek.com/purchase/activity/widget/<?php if($book_tours): echo $book_tours; endif; ?>" class="peek-book-button-flat book-btn" data-purchase-type="activity" data-button-text="<?php echo $cta_button_text; ?>" data-activity-gid="<?php if($book_tours): echo $book_tours; endif; ?>"><?php echo $cta_button_text; ?></a>
                    <?php elseif($integrate_fareharbor && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $book_tours.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $book_tours.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $book_tours; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>" class="book-btn"><?php echo $cta_button_text; ?></a>
                    <?php elseif($integrate_getinsellout && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="giso_cb giso_btn book-btn"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($book_tours): echo $book_tours; endif; ?>"><?php echo $cta_button_text; ?></a>
                    <?php elseif($integrate_trekksoft && ($button_type == 'Use as third party integration Link')): ?>
                            <?php
                                $arr = explode(",",$book_tours);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" class="book-btn" id="<?php if($book_tours): echo 'hcta_trekksoft_' . $format1; endif; ?>">
                            <?php echo $cta_button_text; ?>    
                            </a>  
                            <script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($book_tours): echo 'hcta_trekksoft_' . $format1; endif; ?>"); })();
// ]]></script>
                     <?php elseif($integrate_rezdy && ($button_type == 'Use as third party integration Link')): ?>
                                <a class="button-booking rezdy rezdy-modal book-btn" href="<?php echo $book_tours; ?>">
                                    <?php echo $cta_button_text; ?>
                                </a>
                    <?php elseif($integrate_zaui && ($button_type == 'Use as third party integration Link')): ?>
                                <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override book-btn" href="<?php echo $book_tours; ?>">
                                    <?php echo $cta_button_text; ?>
                                </a>
                    <?php elseif($integrate_regiondo && ($button_type == 'Use as third party integration Link')): ?>
                        <a class="regiondo-button book-btn" data-url="<?php echo $book_tours; ?>">
                            <?php echo $cta_button_text; ?>
                        </a>
                    <?php else: ?>
                    <a <?php if($button_type == 'Link to Featured tours'): ?>data-scroll-nav='110'<?php endif; ?> href="<?php if($button_type == 'Link to Featured tours'): echo '#'; else: echo $book_tours; endif; ?>"<?php if($cta_onclick): ?> onclick="<?php echo $cta_onclick; ?>"<?php endif; ?> class="book-btn"<?php if($cta_button_radius): echo ' style="border-radius:'.$cta_button_radius.'px"'; endif;?>>
                            <?php echo $cta_button_text; ?>
                        </a>
                    <?php endif; ?>
                    </div><!-- end .book-btn-wrapper-->