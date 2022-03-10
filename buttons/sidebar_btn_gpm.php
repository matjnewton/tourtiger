                            <?php
                            $integrate_xola = get_option( 'options_integrate_xola_with_this_website' );
                            $integrate_peek = get_option( 'options_integrate_peek_with_this_website' );
                            $integrate_fareharbor = get_option( 'options_fareharbor' );
                            $fareharbor_shortname = get_option( 'options_fareharbor_shortname' );
                            $integrate_getinsellout = get_option( 'options_getinsellout' );
                            $getinsellout_data_pn = get_option( 'options_getinsellout_data_pn' );
                            $getinsellout_data_url = get_option( 'options_getinsellout_data_url' );
                            $getinsellout_data_evt = get_option( 'options_getinsellout_data_evt' );
                            $integrate_trekksoft = get_option( 'options_trekksoft' );
                            $integrate_rezdy = get_option( 'options_rezdy' );
                            $integrate_zaui = get_option( 'options_zaui' );
                            $integrate_regiondo = get_option( 'options_regiondo' );
                            $integrate_orioly = get_option( 'options_orioly' );
                            $flybook_account_id = get_field('the_fly_book_account_id','apikey');
                            $third_party = $third_party ?? '';
                            $bbt = $bbt ?? '';
                            $bbl = $bbl ?? '';

                            $button_type = $button_type ?? '';

                            if ( $button_type === 'flybook-button' && $flybook_account_id && isset($flybook_button_id) ) :
                                    $button_id = $flybook_button_id;
                                    ?>
                                    <a href="#" class='book-btn2 flybook-book-now-button fb-widget-type-frontend fb-default-category-id-0 fb-account-id-<?=$flybook_account_id?> fb-entity-config-id-<?=$button_id?> fb-domain-go.theflybook.com fb-protocol-https'><?=$bbt?></a>
                                    <link rel='stylesheet' href='https://go.theflybook.com/content/bootstrapper/flybookbootstrap.css' />
                                    <script src='https://go.theflybook.com/custom/bootstrapper/flybookbootstrap.js'></script>
                                    <?php
                            elseif($integrate_xola && ($button_type == 'Use as third party integration Link')): ?>

                                <?php if($third_party == "xola-single-item"): ?>
                                <?php
                                    $xsi = explode(",",$bbl);
                                    $seller = $xsi[0];
                                    $experience = $xsi[1];
                                    $version = $xsi[2];
                                ?>
                                    <div class="xola-checkout xola-custom book-btn2" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                        <div class="arrow-left"></div>
                                        <div><?php echo $bbt; ?></div>
                                        <div class="arrow-right"></div>
                                    </div>
                                <?php elseif($third_party == "xola-multi-item"): ?>
                                    <div class="xola-checkout xola-custom book-btn2" data-button-id="<?php if($bbl): echo $bbl; endif; ?>">
                                        <div class="arrow-left"></div>
                                        <div><?php echo $bbt; ?></div>
                                        <div class="arrow-right"></div>
                                    </div>
                                <?php else: ?>
                                    <div data-button-id="<?php if($bbl): echo $bbl; endif; ?>" class="<?php if($third_party == "xola-checkout"): ?>xola-checkout <?php elseif($third_party == "xola-gift"): ?>xola-gift <?php endif; ?> xola-custom book-btn2">
                                        <div class="arrow-left"></div>
                                        <div><?php echo $bbt; ?></div>
                                        <div class="arrow-right"></div>
                                    </div>
                                <?php endif; ?>

                            <?php elseif($integrate_peek && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="<?php echo $bbl; ?>" class="peek-book-button-flat book-btn2" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $bbl; ?>" style="border-radius:0;">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_fareharbor && ($button_type == 'Use as third party integration Link')): ?>
                            <a href="<?php if($fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if($third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if($third_party == 'tour-item'): echo $bbl.'/'; endif; ?><?php if($third_party == 'tour-item-calendar'): echo $bbl.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if($fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if($third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if($third_party == 'tour-item' || $third_party == 'tour-item-calendar'): ?> view: { item: <?php echo $bbl; ?> }<?php endif; ?><?php if(!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>" class="book-btn2">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_getinsellout && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="giso_cb giso_btn book-btn2"<?php if($getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if($getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if($getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($bbl): echo $bbl; endif; ?>">
                                <div class="arrow-left"></div>
                                <?php echo $bbt; ?>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_trekksoft && ($button_type == 'Use as third party integration Link')): ?>
                            <?php
                                $arr = explode(",",$bbl);
                                $format1 = $arr[0];
                                $format2 = $arr[1];
                            ?>
                            <a href="#" class="book-btn2" id="<?php if($bbl): echo 'sbtn_trekksoft_' . $format1; endif; ?>">
                            <?php echo $bbt; ?>
                            </a>
                            <script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($bbl): echo 'sbtn_trekksoft_' . $format1; endif; ?>"); })();
// ]]></script>
                            <?php elseif($integrate_rezdy && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="button-booking rezdy rezdy-modal book-btn2" href="<?php echo $bbl; ?>">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_zaui && ($button_type == 'Use as third party integration Link')): ?>
                            <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override book-btn2" href="<?php if($bbl): echo $bbl; else: echo "#"; endif; ?>">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php elseif($integrate_orioly && ($button_type == 'Use as third party integration Link')): ?>
                            <div class="book-btn2 mh86">
                                <div class="arrow-left"></div>
                                    <a class="orioly-booknow" data="<?php if($bbl): echo $bbl; endif; ?>" style="color:#fff !important;"><?php echo $bbt; ?></a>
                                <div class="arrow-right"></div>
                            </div>

                            <?php elseif($integrate_regiondo && ($button_type == 'Use as third party integration Link')): ?>
                            <a class="regiondo-button book-btn2" data-url="<?php if($bbl): echo $bbl; endif; ?>">
                                <div class="arrow-left"></div>
                                <div><?php echo $bbt; ?></div>
                                <div class="arrow-right"></div>
                            </a>
                            <?php else:

                                $booking_hound = false;

                                if ( have_rows( 'sidebar_1' ) ) :
                                    while ( have_rows( 'sidebar_1' ) ) :
                                        the_row();

                                        if ( get_sub_field( 'button_link_type' ) === 'booking-hound' ) :
                                            $api_hash      = get_sub_field( 'api-hash' );
                                            $item_code     = get_sub_field( 'item-code' );
                                            $unique_id     = get_sub_field( 'id' );
                                            $class         = get_sub_field( 'class' );
                                            $booking_hound = true;

                                            echo do_shortcode( "[booking-hound-button api-hash='{$api_hash}' item-code='{$item_code}' id='{$unique_id}' class='{$class}']" );
                                        endif;
                                    endwhile;
                                endif;

                                if (!$booking_hound) :

                                  if ($button_type === 'iframe-popup') :
                                    ?>

                                    <a data-iframe-popup="<?php echo $bbl;?>" href="javascript:" class="book-btn2">
                                      <?php echo $bbt; ?>
                                    </a>

                                    <?php
                                  else :
                                    ?>

                                    <a <?php if($button_type == 'Link to form'): ?>data-scroll-nav='100'<?php endif; ?> href="<?php if($button_type == 'Link to form'): echo '#'; else: echo $bbl; endif; ?>"<?php if($cta_onclick): ?> onclick="<?php echo $cta_onclick; ?>"<?php endif; ?> class="book-btn2"  <?php if($button_type === 'custom-in-new-tab'): ?>  target="_blank" <?php endif;?>>
                                        <?php echo $bbt; ?>
                                    </a>

                                    <?php
                                  endif;
                                endif;
                              endif; ?>
