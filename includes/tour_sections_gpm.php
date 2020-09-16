<?php $site_layout = genesis_site_layout(); ?>
<div class="tour-nav visible-xs">
    <div class="container">
        <div class="row">
        <?php $hero_area = get_post_meta( get_the_ID(), 'hero_area', true ); ?>
            <div class="col-sm-12 right-col<?php if( $hero_area ): echo " bear-banner"; else: echo " skip-banner"; endif;?>">
            <?php $rows = get_post_meta( get_the_ID(), 'sidebar_1', true ); ?>
            <?php
                if($rows):
                    foreach( (array) $rows as $count => $row ):
                        switch( $row ):
                            case 'button':
                               $bbt = esc_html( get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_button_text', true ) );
                               $cta_onclick = get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_button_text', true );
                               $button_type = get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_button_link_type', true );
                               $bbl = get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_custom_button_link', true );
                               $b_radius = get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_button_radius', true );
                               $third_party = get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_third_party', true );
                               $mobd = get_post_meta( get_the_ID(), 'sidebar_1_' . $count . '_multi_option_button_dropdown', true );
                               $click_to_call = get_option( 'options_click_to_call' );
                               $phone_number = get_option( 'options_phone_number' );
                    ?>
                                <?php if($click_to_call && $phone_number): ?>
                        <?php $phone = preg_replace('/\D+/', '', $phone_number); ?>
                        <div class="center-block center-booking">
                            <div id="booking2" class="book-tour-wrapper booking-sidebar">
                                <a href="tel:<?php echo $phone; ?>" class="book-btn2">
                                    Click to Call: <?php echo $phone_number; ?>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="center-block center-booking<?php if($click_to_call && $phone_number): ?> relative-pos<?php endif; ?>">
                                <div<?php if(!$click_to_call): ?> id="booking2"<?php endif; ?> class="book-tour-wrapper booking-sidebar">
                        <?php if($bbt && !$mobd): ?>
                            <?php include(locate_template('buttons/sidebar_xs_btn_gpm.php' )); ?>
                        <?php elseif($bbt && $mobd): ?>
                            <?php include(locate_template('buttons/sidebar_xs_mobd_gpm.php' )); ?>
                        <?php endif; ?><!-- end of button-->
                                </div>
                        </div>
                    <?php
                            break;
                        endswitch;
                    endforeach;
                endif;
            ?>
            </div>
        </div>
    </div>
</div>
<section class="tour-page-content">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?> left-col"><!-- not closed yet-->
                <?php $sections = get_post_meta( get_the_ID(), 'sections_area', true );
                        if( $sections ):
                            for( $i = 0; $i < $sections; $i++ ):
                                $headline = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_headline', true ) );
                                $headline_align = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_headline_text_align', true );

                ?>
                    <section class="section-item">
                        <?php if($headline): ?>
                        <h2<?php if($headline_align == 'Center'): echo ' class="text-center"'; endif;?>>
                            <?php echo $headline; ?>
                        </h2>
                        <?php endif; ?>
                        <?php
                            $rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements', true );
                            if($rows):
                                foreach( (array) $rows as $count => $row ):
                                    switch( $row ):
                                        case 'section_subheadline':
                                            $subheadline = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_subheadline', true ) );

                        ?>
                        <?php if($subheadline): ?>
                        <h3>
                            <?php echo $subheadline; ?>
                        </h3>
                        <?php endif; ?>
                        <?php
                                        break;
                                        case 'image':
                                            $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_image', true );
                                            $img_url = wp_get_attachment_url( $img,'full');
                                            $image = aq_resize( $img_url, 279, 158, true );
                                            $img_embed = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_image_embed_options', true );
                        ?>
                        <div>
                                <?php if($img_url && ($img_embed == 'embed on the Side')): ?>
                        <img src="<?=$image?>" alt="<?=$image?>" class="side-embed img-responsive" />
                                <?php elseif($img_url && ($img_embed == 'embed to the full width')): ?>
                        <img src="<?=$img_url?>" alt="<?=$img_url?>" class="full-embed img-responsive" />
                                <?php endif; ?>
                        </div>
                        <?php
                                        break;
                                        case 'content_editor':
                                            $content = apply_filters('the_content', get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_content', true ));
                                            $linked_to_button = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_linked_to_button', true );
                        ?>
                        <div>
                            <div class="c-editor"<?php if($linked_to_button): ?> data-scroll-index='100'<?php endif; ?>>
                            <?php if($content): echo $content; endif; ?>
                            </div>
                        </div>
                        <?php
                                        break;
                                        case 'classic_details':
                                            $details_list = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_details_list', true );
                                            if($details_list):
                        ?>
                        <ul class="classic-details-list">
                        <?php
                                                for( $j = 0; $j < $details_list; $j++ ):
                                                    $label = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_details_list_' . $j . '_label', true ));
                                                    $text = nl2br(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_details_list_' . $j . '_text', true ));
                        ?>
                            <li class="row">
                                <div class="col-xs-3 details-label">
                                    <span>
                                    <?php if($label): echo $label; endif; ?>
                                    </span><i class="fa fa-chevron-right"></i>
                                </div>
                                <div class="col-xs-9">
                                    <?php if($text): echo $text; endif; ?>
                                </div>
                            </li>
                        <?php
                                                endfor;
                        ?>
                        </ul>
                        <?php
                                            endif; //$details_list
                                        break;
                                        case 'classic_itinerary':
                                            $num = 1;
                                            $ki = (int)$num;
                                            $itinerary_list = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_itinerary_list', true );
                                            if($itinerary_list):
                        ?>
                        <div class="classic-itinerary-list">
                        <?php
                                                for( $k = 0; $k < $itinerary_list; $k++ ):
                                                    $title = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_itinerary_list_' . $k . '_title', true ));
                                                    $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_itinerary_list_' . $k . '_image', true );
                                                    $img_url = wp_get_attachment_url( $img,'full');
                                                    $image = aq_resize( $img_url, 600, 258, true );
                                                    $paragraph = nl2br(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_itinerary_list_' . $k . '_paragraph', true ));
                        ?>
                            <div class="row">
                                <div class="col-sm-12 itinerary-inner-offset">
                                    <div class="row itinerary-inner-wrapper">
                                        <div class="vert-line"></div>
                                        <div class="col-xs-12 itinerary-inner">
                                            <div class="num-wrapper">
                                                <div class="top-line"></div>
                                                <div class="itinery-num"><span><?php echo $ki; ?></span></div>
                                                <div class="bottom-line"></div>
                                            </div>
                                      <?php if($title): ?>
                                            <h4 class="itinerary-title"><span><?php echo $title; ?></span></h4>
                                      <?php endif; ?>
                                      <?php if($image): ?>
                                            <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>" class="img-featured img-responsive" />
                                      <?php endif; ?>
                                      <?php if($paragraph): ?><p><?php echo $paragraph; ?></p><?php endif; ?>
                                        </div><!-- end .itinerary-inner-->
                                    </div><!-- end .itinerary-inner-wrapper-->
                                </div>
                            </div><!-- end .row -->
                        <?php
                                                $ki++;
                                                endfor;
                        ?>
                        </div><!-- end .classic-itinerary-list-->
                        <?php
                                            endif; //$itinerary_list
                                        break;
                                        case 'multiple_trip_details':
                                            $gal_num = 0;
                                            $gn = (int)$gal_num;
                                            $trip_list = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list', true );
                                            if($trip_list):
                        ?>
                            <div class="trip-list">
                        <?php
                                                for( $m = 0; $m < $trip_list; $m++ ):
                                                    $title = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_title', true ));
                                                    $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_image', true );
                                                    $img_url = wp_get_attachment_url( $img,'full');
                                                    $image = aq_resize( $img_url, 715, 303, true );
                                                    $images = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_gallery', true );
                                                    $paragraph = nl2br(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_paragraph', true ));
                                                    $custom_options = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_custom_options', true );
                        ?>
                        <div class="trip-item">
                                    <?php if($image): ?>
                                        <img src="<?=$image?>" alt="<?=$image?>" class="center-block img-featured img-responsive" />
                                    <?php endif; ?>
                                <?php if( $images ): ?>
                                <div class="gallery">
                                    <div class="photo-gallery gallery-one gallery-<?php echo $gn; ?>">
                                        <?php
                                            foreach( $images as $image ):
                                        ?>
                            <?php
                                $img_url = wp_get_attachment_url($image);
                                $thumbnail = aq_resize( $img_url, 250, 250, true );
                            ?>
                                        <a href="<?php echo $img_url; ?>" class="w-inline-block photo-thumbnail">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php echo $image['alt']; ?>" class="image-thumb img-responsive" />
                                        </a>
                                        <?php
                                            endforeach;
                                        ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                    <?php if($title): ?>
                                        <h4 class="trip-title text-center"><span><?php echo $title; ?></span></h4>
                                    <?php endif; ?>
                                    <?php if($paragraph): ?>
                                        <?php if(is_array($custom_options) && in_array('Show button to hide description', $custom_options) ): ?>
                                            <p style="max-height: 50px; overflow: hidden;"><?php echo $paragraph; ?></p>
                                        <?php else: ?>
                                            <p><?php echo $paragraph; ?></p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php $details_list = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_details_list', true ); ?>
                                    <?php if($details_list): ?>
                                        <?php if(is_array($custom_options) && in_array('Show button to hide description', $custom_options) ): ?>
                                            <ul class="details-row-wrapper" style="display: none">
                                        <?php else: ?>
                                            <ul class="details-row-wrapper">
                                        <?php endif; ?>

                                    <?php
                                        for( $mn = 0; $mn < $details_list; $mn++ ):
                                    ?>
                                    <?php
                                    $label = esc_html( get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_details_list_' .$mn. '_label', true ));
                                    $text = apply_filters('the_content', get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_trip_list_' . $m . '_details_list_' .$mn. '_text', true ));
                                    ?>
                                        <li class="row details-row">
                                            <div class="col-sm-3 details-label">
                                            <?php if($label): echo $label; endif; ?>
                                            </div>
                                            <div class="col-sm-9">
                                            <?php if($text): echo $text; endif; ?>
                                            </div>
                                        </li>
                                    <?php endfor; ?>

                                        </ul>
                                    <?php endif; ?>

                                    <?php if( is_array($custom_options) && in_array('Show button to hide description', $custom_options) ): ?>
                                        <div class="tour-see-more">
                                          <p>see details...</p>
                                        </div>
                                    <?php endif ?>
                                    </div><!-- end .trip-item-->
                                    <?php $gn++; ?>
                        <?php
                                                endfor;
                        ?>
                            </div>
                        <?php
                                            endif; //$trip_list
                                        break;
                                        case 'icons_list':
                                        $list_item = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_list_item', true );
                                        if($list_item):
                                        ?>
                                        <ul class="td-list">
                                        <?php for( $p = 0; $p < $list_item; $p++ ):
                                                $icon = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_list_item_' . $p . '_icons', true );
                                                $description = nl2br(get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_list_item_' . $p . '_description', true ));
                                        ?>
                                            <li class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <?php if($icon): ?>
                                                    <span>
                                                    <?php if($icon == 'Accommodation'): ?>
                                                    <i class="fa fa-home"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Activities'): ?>
                                                    <i class="fa fa-spoon"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Ages'): ?>
                                                    <i class="fa fa-child"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Carbon Offset'): ?>
                                                    <i class="fa fa-leaf"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Departure Time'): ?>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Difficulty'): ?>
                                                    <i class="fa fa-signal"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Duration'): ?>
                                                    <i class="fa fa-play"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Finish'): ?>
                                                    <i class="fa fa-flag-checkered"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Group size'): ?>
                                                    <i class="fa fa-group"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Highlights'): ?>
                                                    <i class="fa fa-camera"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Inclusions'): ?>
                                                    <i class="fa fa-list-ol"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Languages'): ?>
                                                    <i class="fa fa-globe"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Meals'): ?>
                                                    <i class="fa fa-cutlery"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Meeting Place'): ?>
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Options'): ?>
                                                    <i class="fa fa-file-text-o"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Places Visited'): ?>
                                                    <i class="fa fa-picture-o"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Price'): ?>
                                                    <i class="fa fa-tag"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Start'): ?>
                                                    <i class="fa fa-flag"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Transport'): ?>
                                                    <i class="fa fa-cab"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'Travel Style'): ?>
                                                    <i class="fa fa-tachometer"></i>
                                                    <?php endif; ?>

                                                    <?php if($icon == 'When'): ?>
                                                    <i class="fa fa-calendar"></i>
                                                    <?php endif; ?>
                                                    </span>
                                                    <strong><?php echo $icon; ?>:</strong>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-8 col-lg-8">
                                                    <?php if($description): echo $description; endif; ?>
                                                </div>
                                            </li>
                                        <?php endfor; ?>
                                        </ul>
                                        <?php
                                        endif; //$list_item
                                        break;
                                        case 'table':
                                            $table_row = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_table_row', true );
                                            if($table_row):
                                        ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                            <?php for( $t = 0; $t < $table_row; $t++ ):
                                                    $cell_1 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_table_row_' .$t. '_cell_1', true );
                                                    $cell_2 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_table_row_' .$t. '_cell_2', true );
                                                    $cell_3 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_table_row_' .$t. '_cell_3', true );
                                                    $cell_4 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_table_row_' .$t. '_cell_4', true );
                                                    $cell_5 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_table_row_' .$t. '_cell_5', true );
                                            ?>
                                            <tr>
                                                <th><?php if($cell_1): echo $cell_1; else: echo '&nbsp;'; endif; ?></th>
                                                <td><?php if($cell_2): echo $cell_2; else: echo '&nbsp;'; endif; ?></td>
                                                <td><?php if($cell_3): echo $cell_3; else: echo '&nbsp;'; endif; ?></td>
                                                <td><?php if($cell_4): echo $cell_4; else: echo '&nbsp;'; endif; ?></td>
                                                <td><?php if($cell_5): echo $cell_5; else: echo '&nbsp;'; endif; ?></td>
                                            </tr>
                                            <?php endfor; ?>
                                            </table>
                                        </div>
                                        <?php
                                            endif;
                                        break;
                                        case 'subsection':
                                            $subheadline = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_headline', true );
                                            $subcontent = apply_filters('the_content', get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_content_editor', true ));
                                        ?>
                                        <div class="item">
                                            <?php if($subheadline): ?>
                                            <h3>
                                            <?php echo $subheadline; ?>
                                            </h3>
                                            <?php endif; ?>
                                            <?php
                                            $img_embed = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_image_embed_options', true );
                                            $img = (int) get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_image', true );
                                            $img_url = wp_get_attachment_url( $img,'full');
                                            $image = aq_resize( $img_url, 279, 158, true );

                                            ?>
                                            <?php if($img_url && ($img_embed == 'embed on the Side')): ?>
                                            <img src="<?=$image?>" alt="<?=$image?>" class="side-embed img-responsive" />
                                            <?php elseif($img_url && ($img_embed == 'embed to the full width')): ?>
                                            <img src="<?=$img_url?>" alt="<?=$img_url?>" class="full-embed img-responsive" />
                                            <?php endif; ?>

                                            <div class="c-editor">
                                            <?php if($subcontent): echo $subcontent; endif; ?>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'booking_button':
                                            $bbt = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_booking_button_text', true );
                                            $text_align = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_text_align', true );
                                            $bbl = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_booking_button_link', true );
                                            $cta_onclick = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_cta_onclick', true );
                                            $bb_radius = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_booking_button_radius', true );
                                            $rb1 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_reason_to_book_1', true );
                                            $rb2 = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_reason_to_book_2', true );
                                            $third_party = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_third_party', true );
                                            $use_as_integration_link = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_use_as_third_party_integration_link', true );
                                            $mobd = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_multi_option_button_dropdown', true );
                                        ?>
                                        <div class="book-tour-wrapper<?php if($text_align == 'Center'): echo ' text-center'; endif;?>">
                                            <?php if($bbt && !$mobd): ?>
                                                <?php include(locate_template('buttons/leftcol_btn_gpm.php' )); ?>
                                            <?php elseif($bbt && $mobd): ?>
                                                <?php include(locate_template('buttons/leftcol_mobd_gpm.php' )); ?>
                                            <?php endif; ?>
                                            <?php if($rb1 || $rb2): ?>
                                            <ul class="book-tour-list">
                                                <?php if($rb1): ?>
                                                <li>
                                                    <i class="fa fa-check"></i><?php echo $rb1; ?>
                                                </li>
                                                <?php endif; ?>
                                                <?php if($rb2): ?>
                                                <li>
                                                    <i class="fa fa-check"></i><?php echo $rb2; ?>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                            <?php if($text_align == 'Left'): ?><br clear="both" /><?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                        break;
                                        case 'map':
                                            $custom_headline = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_custom_headline', true );
                                            $center = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_map_center_address', true );
                                            $zoom = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_zoom', true );
                                            $content = '[bgmp-map center="'.$center.'" zoom="'.$zoom.'"]';
                                        ?>
                                        <div class="map">
                                            <?php if($custom_headline): ?>
                                            <h2>
                                                <?php echo $custom_headline; ?>
                                            </h2>
                                            <?php endif; ?>
                                            <?php echo do_shortcode( $content ) ?>
                                        </div>
                                        <?php
                                        break;
                                        case 'image_gallery':
                                            $images = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_gallery', true );
                                            $gal_num2 = 0;
                                            $gn2 = (int)$gal_num2;
                                            if( $images ):
                                            ?>
                                            <div class="gallery">
                                        <div class="photo-gallery gallery-two gallery2-<?php echo $gn2; ?>">
                                            <?php
                                                foreach( $images as $image ):
                                            ?>
                                    <?php
                                        $img_url = wp_get_attachment_url($image);
                                        $thumbnail = aq_resize( $img_url, 250, 250, true );
                                    ?>
                                                <a href="<?php echo $img_url; ?>" class="w-inline-block photo-thumbnail">
                                                    <img src="<?php echo $thumbnail; ?>" alt="<?php echo $image['alt']; ?>" class="image-thumb img-responsive" />
                                                </a>
                                                <?php $gn2++; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                            <?php
                                            endif; //$images
                                        break; /*end image_gallery*/
                                        case 'tour_boxes':
                                        ?>
                                        <div class="featured-tours featured-tours-section">
                                            <div class="row-eq-height">
                                            <?php
                                                $number_of_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_number_of_columns', true );
                                                $col = 0;
                                                if($number_of_columns):
                                                    switch ($number_of_columns):
                                                        case 1:
                                                            $col = 12;
                                                            break;
                                                        case 2:
                                                            $col = 6;
                                                            break;
                                                        case 3:
                                                            $col = 4;
                                                            break;
                                                        case 4:
                                                            $col = 3;
                                                            break;
                                                        case 5:
                                                            $col = 5;
                                                            break;
                                                    endswitch;
                                                endif;
                                                $bs_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                                                if($bs_rows):
                                                foreach( (array) $bs_rows as $tb_count => $bs_row ):
                                                    switch( $bs_row ):
                                                        case 'tours':
                                                            $button_label = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_button_label', true );
                                                            $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tb_count . '_pull_specific_from', true );
                                                            if($pulled_specific):
                                                            $post = $pulled_specific;
                                                            setup_postdata( $post );
                                            ?>
                                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?> col-eq-height">
                                            <?php include(locate_template('content-feat_tours_gpm.php' )); ?>
                                            </div>
                                             <?php
                                                        wp_reset_postdata();
                                                        endif; /*end if pulled_specific*/
                                                        break;
                                                        case 'categories':
                                                        ?>
                                            <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $col; ?><?php endif; ?> col-eq-height">
                                            <?php include(locate_template('content-feat_cats_11_gpm.php' )); ?>
                                            </div>
                                                        <?php
                                                        break;
                                                    endswitch;
                                                 endforeach;
                                                 endif;
                                            ?>
                                            </div>
                                        </div><!-- end .featured-tours-->
                                        <?php
                                        break;
                                        case 'testimonials_boxes':
                                            $testimonials_type = get_option( 'options_testimonials_type' );
                                            $number_of_tstm_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_tstm_columns', true );
                                            $tcol = 0;
                                            if($number_of_tstm_columns):
                                                switch ($number_of_tstm_columns):
                                                    case 1:
                                                        $tcol = 12;
                                                        break;
                                                    case 2:
                                                        $tcol = 6;
                                                        break;
                                                    case 3:
                                                        $tcol = 4;
                                                        break;
                                                    case 4:
                                                        $tcol = 3;
                                                        break;
                                                    case 5:
                                                        $tcol = 5;
                                                        break;
                                                endswitch;
                                            endif;
                                            if($testimonials_type == 'Scrolling'):
                                            ?>
                                            <div class="row testimonials">
                                                <div class="col-sm-12">
                                                    <div class="testimonials-slider-wrapper">
                                                        <div class="testimonials-slider">
                                                            <ul class="slides">
                                                            <?php
                                                                $tsm_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                                                                if($tsm_rows):
                                                                foreach( (array) $tsm_rows as $tsm_count => $tsm_row ):
                                                                    switch( $tsm_row ):
                                                                        case 'testimonials':
                                                            ?>
                                                            <?php
                                                            $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tsm_count . '_pull_specific_from', true );

                                                            if($pulled_specific):
                                                                $post = $pulled_specific;
                                        				        setup_postdata( $post );
                                        				        //get_template_part( 'content', 'scrltstmls' );
                                            				    include(locate_template('content-scrltstmls_gpm.php' ));
                                        				        wp_reset_postdata();
                                                            endif;
                                                                break;
                                                                endswitch;
                                                                endforeach;
                                                                endif; //$tsm_rows
                                                                 ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end .row-->
                                            <?php
                                            else:
                                            ?>
                                            <div class="row even-grid testimonials">
                                            <?php
                                                $tsm_rows = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set', true );
                                                if($tsm_rows):
                                                foreach( (array) $tsm_rows as $tsm_count => $tsm_row ):
                                                    switch( $tsm_row ):
                                                        case 'testimonials':
                                                $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_boxes_set_' . $tsm_count . '_pull_specific_from', true );
                                                if($pulled_specific):
                                                    $post = $pulled_specific;
                            				        setup_postdata( $post ); ?>
                            				        <div class="<?php if($tcol==5): ?>five-cols <?php else: ?>col-xs-12 col-sm-<?php echo $tcol; ?><?php endif; ?>">
                            				        <?php get_template_part( 'content', 'home_tstmls_gpm' ); ?>
                            				        </div>
                            				        <?php
                            				        wp_reset_postdata();
                                                endif;
                                                        break;
                                                    endswitch;
                                                endforeach;
                                                endif;
                                            ?>
                                            </div><!-- end .row.even-grid.testimonials-->
                                            <?php
                                            endif;
                                        break;
                                        case 'blog_boxes':
                                        ?>
                                        <div class="row even-grid testimonials front-blog-wrapper">
                                        <?php
                                            $number_of_blog_columns = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_blog_columns', true );
                                            $number_of_posts = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count .'_number_of_posts', true );

                                            $bcol = 0;
                                            if($number_of_columns):
                                                switch ($number_of_blog_columns):
                                                    case 1:
                                                        $bcol = 12;
                                                        break;
                                                    case 2:
                                                        $bcol = 6;
                                                        break;
                                                    case 3:
                                                        $bcol = 4;
                                                        break;
                                                endswitch;
                                                endif;
                                                $args = array(
                                        'post_type' => 'post',
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'nopaging' => true,
                                        'post_status' => 'publish'
                                        );

                                        $bbi = 0;
                                        global $wp_query;
                                        $wp_query = new WP_Query( $args );

                                        if ( have_posts() ) :

                                        while ( have_posts() ) : the_post();

                                        $bbi++; ?>
                                        <div<?php if($bcol): ?> class="col-xs-12 col-sm-<?php echo $bcol; ?> s-item"<?php endif; ?>>
                                        <?php get_template_part( 'content', 'front_blog' ); ?>
                                        </div>
                                        <?php
                                        if($bbi == $number_of_posts):
                                        break;
                                        endif;
                                        endwhile;

                                        do_action( 'genesis_after_endwhile' );
                                        endif;

                                        wp_reset_query();
                        ?>
                                        </div><!-- .row-->
                                        <?php
                                        break;
                                        case 'sitewide_modules':
                                            $section_module = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_section_module', true );
                                                if( $section_module ):
                                                    for( $ri = 0; $ri < $section_module; $ri++ ):
                                                    $pulled_specific = get_post_meta( get_the_ID(), 'sections_area_' . $i . '_section_elements_' . $count . '_section_module_' . $ri . '_pull_specific_from', true );

                                        if($pulled_specific):
                                            $post = $pulled_specific;
                    				        setup_postdata( $post );
                    				        //in progress
                    				        //get_template_part( 'content', 'sitewide_sections_gpm' );
                    				        wp_reset_postdata();
                                        endif;

                                                    endfor;
                                                endif;

                                        break; //sitewide_modules
                                    endswitch;
                                endforeach;
                            endif; //$rows, end section_elements
                        ?>
                        </section>
                <?php
                            endfor;
                        endif;
                ?>
                <?php
                    $testimonials_type = get_option( 'options_testimonials_type' );
                    $testimonials = get_post_meta( get_the_ID(), 'testimonials', true );
                    if($testimonials && ($testimonials_type == 'Scrolling')):
                ?>
                        <section class="testimonials">
                            <div class="testimonials-slider-wrapper">
                                <div class="testimonials-slider">
                                    <ul class="slides">
                <?php
                                for( $te = 0; $te < $testimonials; $te++ ):
                                    $pulled_specific = get_post_meta( get_the_ID(), 'testimonials_' . $te . '_pull_specific_from', true );
                                    $testimonial_quote = get_post_meta( get_the_ID(), 'testimonials_' . $te . '_testimonial_quote', true );
                                    if($pulled_specific):
                                        $post = $pulled_specific;
                				        setup_postdata( $post );
                				        get_template_part( 'content', 'scrltstmls_gpm' );
                				        wp_reset_postdata();
                                    endif;
                                endfor;
                ?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                <?php
                    elseif($testimonials):
                ?>
                <section class="testimonials">
                        <h2>
                            <span>Testimonials</span>
                        </h2>

                        <div class="row multi-columns-row even-grid">
                <?php
                                for( $te = 0; $te < $testimonials; $te++ ):
                                    $pulled_specific = get_post_meta( get_the_ID(), 'testimonials_' . $te . '_pull_specific_from', true );
                                    if($pulled_specific):
                                        $post = $pulled_specific;
                				        setup_postdata( $post );
                				        get_template_part( 'content', 'tour_tstmls_gpm' );

                				        wp_reset_postdata();
                                    endif;
                                endfor;
                ?>
                        </div>
                </section>
                <?php
                    endif;
                ?>
                </div><!-- end col-->
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <?php $hero_area = get_post_meta( get_the_ID(), 'hero_area', true ); ?>
                <div class="col-sm-4 right-col<?php if( $hero_area ): echo " bear-banner"; else: echo " skip-banner"; endif;?>">
                    <?php
                        $s1_rows = get_post_meta( get_the_ID(), 'sidebar_1', true );
                        if($s1_rows):
                    ?>
                <div class="center-block center-booking hidden-xs">
                    <div id="booking" class="book-tour-wrapper booking-sidebar">
                    <?php
                    foreach( (array) $s1_rows as $sr_count => $s1_row ):
                        switch( $s1_row ):
                            case 'button':
                                $bbt = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_button_text', true );
                                $cta_onclick = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_cta_onclick', true );
                                $button_type = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_button_link_type', true );
                                $bbl = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_custom_button_link', true );
                                $b_radius = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_button_radius', true );
                                $rb1 = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_reason_to_book_1', true );
                                $rb2 = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_reason_to_book_2', true );
                                $third_party = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_third_party', true );
                                $mobd = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_multi_option_button_dropdown', true );
                    ?>
                    <?php if($bbt && !$mobd):       ?>
                    <?php include(locate_template('buttons/sidebar_btn_gpm.php' )); ?>
                    <?php elseif($bbt && $mobd): ?>
                    <?php include(locate_template('buttons/sidebar_mobd_gpm.php' )); ?>
                    <?php endif; /*end of last button condition*/ ?>
                    <?php if($rb1 || $rb2): ?>
                            <div class="hidden-xs text-left">
                                <?php if($rb1): ?>
                              <div class="trigger-txt"><?php echo $rb1; ?></div>
                              <div class="separator2"></div>
                              <?php endif; ?>
                              <?php if($rb2): ?>
                              <div class="trigger-txt"><?php echo $rb2; ?></div>
                              <div class="separator2"></div>
                              <?php endif; ?>
                            </div>
                    <?php endif; /*end reasons to book*/ ?>
                    <?php
                                break; //end button layout
                                case 'content_editor':
                                case 'text_area':
                                    $content = get_post_meta( get_the_ID(), 'sidebar_1_' . $sr_count . '_content', true );
                    ?>
                    <div class="widget-item">
                    <?php echo $content; ?>
                    </div>
                    <?php
                                break;
                            endswitch;
                        endforeach; //end sidebar_1
                    ?>
                    </div><!-- end #booking-->
                </div><!-- end .center-booking -->
                    <?php
                        endif; //$s1_rows
                        $s2_rows = get_post_meta( get_the_ID(), 'sidebar_2', true );
                        if($s2_rows):
                        foreach( (array) $s2_rows as $srt_count => $s2_row ):
                            switch( $s2_row ):
                                case 'content_editor':
                                    $content = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_content', true );
                                    $linked_to_button = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_linked_to_button', true );
                    ?>
                    <div<?php if($linked_to_button): ?> data-scroll-index='100'<?php endif; ?>>
                    <?php echo $content; ?>
                    </div>
                    <?php
                                break;
                                case 'text_area':
                                    $content = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_content', true );
                    ?>
                    <div class="widget-item"><div class="row"><div class="col-sm-10 col-sm-offset-1">
                    <?php echo $content; ?>
                    </div></div></div>
                    <?php
                                break;
                                case 'testimonials':
                                    $pulled_specific = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_pull_specific_from', true );
                                    $testimonial_quote = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_testimonial_quote', true );
                                    $testimonial_excerpt = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_testimonial_excerpt', true );
                                    $testimonial_text = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_testimonial_link_anchor_text', true );
                                    $testimonial_link = get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_testimonial_link', true );
                                    $img = (int) get_post_meta( get_the_ID(), 'sidebar_2_' . $srt_count . '_photo', true );
                                    $img_url = wp_get_attachment_url( $img,'full');
                                    $image = aq_resize( $img_url, 85, 84, true );
                    ?>
                    <section class="testimonials">
                        <div class="row even-grid">
                        <?php
                            if($pulled_specific):
                                $post = $pulled_specific;
                				setup_postdata( $post );
                				get_template_part( 'content', 'tour_tstml_gpm' );
                				wp_reset_postdata();
                            endif;
                        ?>
                        </div>
                    </section>
                    <?php
                                break;
                            endswitch;
                        endforeach;
                        endif; //$s2_rows
                    ?>
                </div><!-- end content-sidebar-->
                <?php endif; ?>
            </div>
        </div><!-- .container-->
</section>

<?php
$tiles_area = get_post_meta( get_the_ID(), 'tiles_area', true );
if( $tiles_area ):
    for( $tl = 0; $tl < $tiles_area; $tl++ ):
        $section_headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_section_headline', true );
        $custom_headline = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_custom_headline', true );
        $number_of_columns = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_number_of_columns', true );
        $linked_to_hero_cta = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_linked_to_hero_cta', true );
        if ( 'content-sidebar' == $site_layout ):
            $col_def = "col-md-";
            elseif( 'full-width-content' == $site_layout ):
            $col_def = "col-sm-";
        endif;
?>
<section class="<?php if($section_headline == 'Featured tours'): ?>featured-tours<?php else: ?>testimonials<?php endif; ?>"<?php if($linked_to_hero_cta): ?> data-scroll-index='110'<?php endif; ?>>
        <div class="container<?php if ( 'content-sidebar' == $site_layout ): ?> no-bg<?php endif; ?>">
        <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8 left-col<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?>">
            <?php if($custom_headline): ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2>
                        <?php echo $custom_headline; ?>
                    </h2>
                </div>
            </div>
            <?php endif; ?>
            <div class="row-eq-height">
                <?php
                    $col = 0;
                    switch ($number_of_columns) {
                        case 1:
                            $col = 12;
                            break;
                        case 2:
                            $col = 6;
                            break;
                        case 3:
                            $col = 4;
                            break;
                        case 4:
                            $col = 3;
                            break;
                        case 5:
                            $col = 5;
                            break;
                    }
                    ?>

                    <?php
                        $tile_rows = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles', true );

                        if ($tile_rows):
                        foreach( (array) $tile_rows as $tile_count => $tile_row ):
                            switch( $tile_row ):
                                case 'tours':
                                    $pulled_specific = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_pull_specific_from', true );
                                    $button_label = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_button_label', true );
                            if($pulled_specific):
                            $post = $pulled_specific;
                            setup_postdata( $post );
                            ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?><?php echo $col_def.$col; ?> col-eq-height<?php endif; ?>">
                            <?php //get_template_part( 'content', 'feat_tours' ); ?>
                            <?php include(locate_template('content-feat_tours_gpm.php' )); ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                            endif;/*end if pulled_specific*/
                                break;/*end if get_row_layout tours*/
                                case 'categories':
                    ?>
                            <div class="<?php if($col==5): ?>five-cols <?php else: ?><?php echo $col_def.$col; ?> col-eq-height<?php endif; ?>">
                            <?php //get_template_part( 'content', 'feat_cats' ); ?>
                            <?php
                                include(locate_template('content-feat_cats_gpm.php' ));
                            ?>
                            </div>
                        <?php
                                break;
                                case 'testimonials':
                                    $pulled_specific = get_post_meta( get_the_ID(), 'tiles_area_' . $tl . '_tiles_' .$tile_count. '_pull_specific_from', true );

                            if($pulled_specific):
                                $post = $pulled_specific;
        				        setup_postdata( $post ); ?>
        				        <div class="<?php if($col==5): ?>five-cols <?php else: ?>col-sm-<?php echo $col; ?> col-eq-height<?php endif; ?>">
        				        <?php get_template_part( 'content', 'home_tstmls_gpm' ); //need revision ?>
        				        </div>
        				        <?php
        				        wp_reset_postdata();
                            endif;


                                break;
                            endswitch;
                         endforeach;
                        //endwhile;
                        endif;
                       ?>


                </div>
                </div>
        </div>
            </div><!-- .container-->
    </section>
<?php
    endfor;
endif;
?>
