                        <?php
                            include(locate_template('includes/integrate_vars_gpm.php' ));

                        $count = $count ?? '';
                        $i = $i ?? '';
                        $tb_count = $tb_count ?? '';

                        ?>
                        <div class="view-dropdown-wrapper view-btn-wrapper">
                                <div class="view-dropdown-tour-btn">
                            <div class="btn-group">
                              <button type="button" class="btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $button_label??''; ?> <span class="caret"></span>
                              </button>
                            <?php $button_sub_options = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_sub_options', true ); ?>
                            <?php if( $button_sub_options ): ?>

                            	<ul class="dropdown-menu">
                            	<?php for( $cbd = 0; $cbd < $button_sub_options; $cbd++ ):
                            		$button_text = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_sub_options_' . $cbd . '_button_text', true ));
                            		$link = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_sub_options_' . $cbd . '_link', true ));
                            		?>
                            		<li>
                            		<?php if(isset($integrate_xola)&&$integrate_xola && isset($use_as_integration_link)&&$use_as_integration_link): ?>

                                        <?php if(isset($third_party)&&$third_party == "xola-single-item"): ?>
                                        <?php
                                            $xsi = explode(",",$link);
                                            $seller = $xsi[0]??'';
                                            $experience = $xsi[1]??'';
                                            $version = $xsi[2]??'';
                                        ?>
                                            <div class="xola-checkout xola-custom" data-seller="<?php echo $seller; ?>" data-experience="<?php echo $experience; ?>" data-version="<?php echo $version; ?>">
                                                <?php echo $button_text; ?>
                                            </div>
                                        <?php elseif(isset($third_party)&&$third_party == "xola-multi-item"): ?>
                                            <div class="xola-checkout xola-custom" data-button-id="<?php if($link): echo $link; endif; ?>">
                                                <?php echo $button_text; ?>
                                            </div>
                                        <?php else: ?>
                                            <div data-button-id="<?php if($link): echo $link; endif; ?>" class="<?php if(isset($third_party)&&$third_party == "xola-checkout"): ?>xola-checkout <?php elseif(isset($third_party)&&$third_party == "xola-gift"): ?>xola-gift <?php endif; ?>xola-custom">
                                                <?php echo $button_text; ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php elseif(isset($integrate_peek)&&$integrate_peek && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                        <a href="<?php echo $link; ?>" class="peek-book-button-flat" data-purchase-type="activity" data-button-text="" data-activity-gid="<?php echo $link; ?>" style="border-radius:0; text-align:left;"><?php echo $button_text; ?></a>
                                    <?php elseif(isset($integrate_fareharbor)&&$integrate_fareharbor && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                        <a href="<?php if(isset($fareharbor_shortname)&&$fareharbor_shortname): ?>https://fareharbor.com/<?php echo $fareharbor_shortname; ?>/items/<?php if(isset($third_party)&&$third_party == 'all-availability'): ?>calendar/<?php endif; ?><?php if(isset($third_party)&&$third_party == 'tour-item'): echo $link.'/'; endif; ?><?php if(isset($third_party)&&$third_party == 'tour-item-calendar'): echo $link.'/calendar/'; endif; ?><?php else: echo '#'; endif; ?>" onclick="<?php if(isset($fareharbor_shortname)&&$fareharbor_shortname): ?>FH.open({ shortname: '<?php echo $fareharbor_shortname; ?>',<?php if(isset($third_party)&&$third_party == 'all-availability'): ?> view: 'all-availability',<?php endif; ?><?php if(isset($third_party)&&($third_party == 'tour-item' || $third_party == 'tour-item-calendar')): ?> view: { item: <?php echo $link; ?> }<?php endif; ?><?php if(isset($third_party)&&!$third_party == 'tour-item-calendar'): ?>, fullItems: 'yes'<?php endif; ?> }); return false;<?php endif; ?>">
                                            <?php echo $button_text; ?>
                                        </a>
                                    <?php elseif(isset($integrate_getinsellout)&&$integrate_getinsellout && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                        <a class="giso_cb giso_btn"<?php if(isset($getinsellout_data_pn)&&$getinsellout_data_pn): ?> data-pn="<?php echo $getinsellout_data_pn; ?>"<?php endif; ?><?php if(isset($getinsellout_data_url)&&$getinsellout_data_url): ?> data-url="<?php echo $getinsellout_data_url; ?>"<?php endif; ?><?php if(isset($getinsellout_data_evt)&&$getinsellout_data_evt): ?> data-evt="<?php echo $getinsellout_data_evt; ?>"<?php endif; ?> href="<?php if($link): echo $link; endif; ?>"><?php echo $button_text; ?></a>
                            		<?php elseif(isset($integrate_trekksoft)&&$integrate_trekksoft && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                            		    <?php
                                            $arr = explode(",",$link);
                                            $format1 = $arr[0]??'';
                                            $format2 = $arr[1]??'';
                                        ?>
                                        <a href="#" id="<?php if($link): echo 'catmobd'.$cbd.'_trekksoft_' . $format1; endif; ?>">
                                    <?php echo $button_text; ?>
                                    </a>
                                    <script>// <![CDATA[
        (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if(isset($third_party)&&$third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif(isset($third_party)&&$third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($link): echo 'catmobd'.$cbd.'_trekksoft_' . $format1; endif; ?>"); })();
        // ]]></script>
                            		<?php elseif(isset($integrate_rezdy)&&$integrate_rezdy && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                            		    <a class="button-booking rezdy rezdy-modal" href="<?php echo $link; ?>">
                                        <?php echo $button_text; ?>
                            		    </a>
                                    <?php elseif(isset($integrate_zaui)&&$integrate_zaui && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                        <a onclick="return Zaui.open(event)" class="button-booking zaui-embed-button override" href="<?php echo $link; ?>">
                                        <?php echo $button_text; ?>
                            		    </a>
                                    <?php elseif(isset($integrate_regiondo)&&$integrate_regiondo && isset($use_as_integration_link)&&$use_as_integration_link): ?>
                                        <a class="regiondo-button" data-url="<?php echo $link; ?>">
                                        <?php echo $button_text; ?>
                                        </a>
                            		<?php else: ?>
                            		    <?php if($button_text): ?>
                                        <a href="<?php echo $link; ?>"><?php echo $button_text; ?></a>
                            		    <?php endif; ?>
                                    <?php endif; ?>
                                    </li>
                            	<?php endfor; ?>
                            	</ul>
                            <?php endif; ?>
                            </div>
                                </div><!-- end .view-dropdown-tour-btn-->
                        </div><!-- end .view-btn-wrapper-->


