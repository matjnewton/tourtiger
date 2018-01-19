<?php

class split_nav_walker extends Walker_Nav_Menu {

    var $current_menu = null;
    var $break_point  = null;


    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        global $wp_query;

        if( !isset( $this->current_menu ) )
            $this->current_menu = wp_get_nav_menu_object( $args->menu );

        /*if( !isset( $this->break_point ) )
            $this->break_point = ceil( $this->current_menu->count / 2 ) + 1;*/
         if( !isset( $this->break_point ) ) {
            $menu_elements = wp_get_nav_menu_items( $args->menu );
            $top_level_elements = 0;

            foreach( $menu_elements as $el ) {
                if( $el->menu_item_parent === '0' ) {
                    $top_level_elements++;
                }
            }
            $this->break_point = ceil( $top_level_elements / 2 ) + 1;
         }

         if( $item->menu_item_parent === '0' ) {
                $this->displayed++;
            }

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $use_logo = get_option( 'options_use_logo_image' );
        $logo_image = get_option( 'options_logo_image' );
        $logo_url = wp_get_attachment_url( $logo_image,'full');
        $logo = aq_resize( $logo_url, 362, 64, false );
        $home_url = home_url( '/' );

        $logo_covers_both_menus = get_option( 'options_logo_covers_both_menus' );
        if($logo_covers_both_menus):
        ob_start();
        include(locate_template('menus/right_secondary.php' ));
        $right_secondary_menu = ob_get_clean();
        else:
        $right_secondary_menu = '';
        endif;

        $logo_item = '<div class="col-sm-2 col-md-2 col-lg-2 hidden-xs hidden-sm"><div class="logo"><a href="'.$home_url.'"><img class="img-responsive" src="'.$logo_url.'" /></a></div></div>';
        //if( $this->break_point == $item->menu_order )
        if( $this->break_point == $this->displayed )
            $output .= $indent . '</li></ul></div>'.$logo_item.'<div class="col-sm-12 col-md-5 col-lg-5 right-menu-part main-nav-wrapper"><div class="secondary-menu-wrapper"><div class="above-split-bar">'.$right_secondary_menu.'</div></div><ul class="menu genesis-nav-menu main-nav hidden-xs hidden-sm"><li' . $id . $value . $class_names .'>';
        else
            $output .= $indent . '<li' . $id . $value . $class_names .'>';

        /*$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;*/

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        include(locate_template('includes/integrate_vars_gpm.php' ));
        /*$integrate_xola = get_field('integrate_xola_with_this_website','option');
        $integrate_peek = get_field('integrate_peek_with_this_website','option');
        $integrate_fareharbor = get_field('fareharbor','option');
        $fareharbor_shortname = get_field('fareharbor_shortname','option');
        $integrate_getinsellout = get_field('getinsellout','option');
        $getinsellout_data_pn = get_field('getinsellout_data_pn','option');
        $getinsellout_data_url = get_field('getinsellout_data_url','option');
        $getinsellout_data_evt = get_field('getinsellout_data_evt','option');
        $integrate_trekksoft = get_field('trekksoft','option');
        $integrate_zaui = get_field('zaui','option');*/

        // get thumbnail
        $thumbnail = '';
        if ( has_post_thumbnail( $item->object_id ) && $classes[0] == 'megamenu-item') {
            $thumb = get_post_thumbnail_id( $item->object_id );
            $img_url = wp_get_attachment_url( $thumb,'full' );
            $thumbnail = aq_resize( $img_url, 355, 207, true );
        }

        // add custom data attributes for giso
        if ( $integrate_getinsellout == true && $depth == 0 && ($classes[0] == 'giso-book-btn')) { // remove if statement if depth check is not required
            // These lines adds your custom class and attribute
            $attributes .= ' class="giso_cb giso_btn"';
            $attributes .= ' data-pn="'.$getinsellout_data_pn.'"';
            $attributes .= ' data-url="'.$getinsellout_data_url.'"';
            $attributes .= ' data-evt="'.$getinsellout_data_evt.'"';
        }

        // add custom data attributes for peek
        /*if ( $integrate_peek == true && $depth == 0 && ($classes[0] == 'peek-book-btn')) {
            $t_gid = $atts['href'];
            $gid = preg_replace('#^https?://#', '', $t_gid);
            $attributes .= ' href="http://www.peek.com/purchase/activity/widget/'.$gid.'"';
            $attributes .= ' class="peek-book-button-flat"';
            $attributes .= ' data-purchase-type="activity"';
            $attributes .= ' data-button-text="'.$item->title.'"';
            $attributes .= ' data-activity-gid="'.$gid.'"';
        }*/

        if ( $integrate_zaui == true && $depth == 0 && ($classes[0] == 'zaui-book-btn')) {
            $attributes .= ' onclick="return Zaui.open(event)"';
            $attributes .= ' class="button-booking zaui-embed-button override"';
        }



        if ( $integrate_peek == true && $depth == 0 && ($classes[0] == 'peek-book-btn')) {
            $t_gid = $atts['href'];
            $gid = preg_replace('#^https?://#', '', $t_gid);
            $attributes = '';
            if($classes[1] == 'gift'):
              $h_attribute = ' href="http://www.peek.com/purchase/gift_card/'.$gid.'"';
              $h_attribute .= ' class="peek-book-button-flat"';
              $h_attribute .= ' itemprop="url"';
              $h_attribute .= ' data-purchase-type="gift-card"';
              $h_attribute .= ' data-button-text="'.$item->title.'"';
              $h_attribute .= ' data-partner-gid="'.$gid.'"';
            else:
              $h_attribute = ' href="https://www.peek.com/s/'.$gid.'"';
              $h_attribute .= ' class="peek-book-button-flat"';
              $h_attribute .= ' itemprop="url"';
              $h_attribute .= ' data-purchase-type="activity"';
              $h_attribute .= ' data-button-text="'.$item->title.'"';
              //$attributes .= ' data-activity-gid="'.$gid.'"';
            endif;

            $item_output = $args->before;
                $item_output .= '<a'. $h_attribute .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
        }
        elseif ( $integrate_xola == true && $depth == 0 && ($classes[0] == 'xola-book-btn')) {
            $t_xid = $atts['href'];
            $xid = preg_replace('#^https?://#', '', $t_xid);
            if($classes[1] == 'checkout' || $classes[1] == 'checkout-all' || $classes[1] == 'timeline'):
            $def_class = 'xola-checkout';
            elseif($classes[1] == 'gift'):
            $def_class = 'xola-gift';
            endif;

            $class_attribute .= ' class="'.$def_class.' xola-custom"';
            if($classes[1] == 'checkout-all'):
                $id_attribute .= ' data-seller="'.$xid.'"';
            elseif($classes[1] == 'timeline'):
                $id_attribute .= ' data-button-id="'.$xid.'"';
            else:
                $id_attribute .= ' data-button-id="'.$xid.'"';
            endif;

            $item_output = $args->before;
            $item_output .= '<div'. $class_attribute .' '.$id_attribute.'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</div>';
            $item_output .= $args->after;
        } elseif($integrate_fareharbor == true && $depth == 0 && ($classes[0] == 'fareharbor-book-btn')){
                $t_fid = $atts['href'];
                $fid = preg_replace('#^https?://#', '', $t_fid);

                if($classes[1] == 'grid'):
                $h_attribute = ' href="https://fareharbor.com/'.$fareharbor_shortname.'/items/"';
                $c_attribute = ' onclick="FH.open({ shortname:\''.$fareharbor_shortname.'\', fullItems: \'yes\' }); return false;"';
                elseif($classes[1] == 'all'):
                $h_attribute = ' href="https://fareharbor.com/'.$fareharbor_shortname.'/items/calendar/"';
                $c_attribute = ' onclick="FH.open({ shortname:\''.$fareharbor_shortname.'\', view: \'all-availability\', fullItems: \'yes\' }); return false;"';
                elseif($classes[1] == 'tour'):
                $h_attribute = ' href="https://fareharbor.com/'.$fareharbor_shortname.'/items/'.$fid.'/"';
                $c_attribute = ' onclick="FH.open({ shortname:\''.$fareharbor_shortname.'\', view: { item:'.$fid.'}, fullItems: \'yes\' }); return false;"';
                endif;

                $item_output = $args->before;
                $item_output .= '<a'. $h_attribute .''.$c_attribute.'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
        } elseif ( $integrate_trekksoft == true && $depth == 0 && ($classes[0] == 'trekksoft-book-btn')) {
            $trekk_id_temp = $atts['href'];
            $trekk_id = preg_replace('#^https?://#', '', $trekk_id_temp);
            $arr = explode(",",$trekk_id);
            $format1 = $arr[0];
            $format2 = $arr[1];
            if($classes[1] == 'tour_details'):
            $entryPoint = 'tour_details';
            elseif($classes[1] == 'tour_finder'):
            $entryPoint = 'tour_finder';
            endif;

            $item_output = $args->before;
            $item_output .= '<a href="#" id="menubtn_trekksoft_'. $format1 .'">';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            if($entryPoint == 'tour_details'):
            $item_output .= '<script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") .setAttrib("entryPoint", "'.$entryPoint.'") .setAttrib("tourId", "'.$format2.'") .registerOnClick("#menubtn_trekksoft_' . $format1 .'"); })();
// ]]></script>';
            else:
            $item_output .= '<script>// <![CDATA[
(function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") .setAttrib("entryPoint", "'.$entryPoint.'") .registerOnClick("#menubtn_trekksoft_' . $format1 .'"); })();
// ]]></script>';
            endif;
            $item_output .= $args->after;
        } elseif($classes[0] == 'megamenu') {
            $item_output = $args->before;
            $item_output .= '<div class="megalink-wrap"><a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a></div><div class="sm-container"><div class="sm-inner">';
            $item_output .= $args->after;
        } elseif(has_post_thumbnail( $item->object_id ) && $classes[0] == 'megamenu-item'){
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'><div><img src="'.$thumbnail.'" class="img-responsive" /></div><span>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</span></a>';
            $item_output .= $args->after;
        } else {
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= apply_filters( 'walker_nav_menu_end_el', $item_output, $item, $depth, $args );
        if($classes[0] == 'megamenu'){
            $output .= "</div></div></li>\n";
        } else {
            $output .= "</li>\n";
        }

    }
}
