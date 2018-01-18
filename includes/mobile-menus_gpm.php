<?php

class Wpse8170mobile_Menu_Walker extends Walker_Nav_Menu {
    
    var $number = 1;

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        if ( $args->walker->has_children ) {
          //$atts['href']   = ! empty( $item->url ) ? $item->url : '';
          
        } else {
          //$atts['href']   = ! empty( $item->url ) ? $item->url : '';
        }
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        
      
      /*if( $args->walker->has_children ) {
            $attributes .= ' class="test-parent"';
        }*/
        
    /*if( !empty($item->classes) && 
        is_array($item->classes) && 
        in_array('menu-item-has-children', $item->classes) ){
            $attributes .= ' class="test-parent"';
    }*/
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
        $integrate_rezdy = get_field('rezdy','option');
        $integrate_zaui = get_field('zaui','option');
        $integrate_regiondo = get_field('regiondo','option');*/
        
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
            $attributes .= ' href="'.$gid.'"';
            $attributes .= ' class="peek-book-button-flat"';
            $attributes .= ' data-purchase-type="activity"';
            $attributes .= ' data-button-text="'.$item->title.'"';
            $attributes .= ' data-activity-gid="'.$gid.'"';
        }*/
        
        
        if ( $integrate_rezdy == true && $depth == 0 && ($classes[0] == 'rezdy-book-btn')) {
            $attributes .= ' class="button-booking rezdy rezdy-modal"';
        }
        
        if ( $integrate_zaui == true && $depth == 0 && ($classes[0] == 'zaui-book-btn')) {
            $attributes .= ' onclick="return Zaui.open(event)"';
            $attributes .= ' class="button-booking zaui-embed-button override"';
        }
        
        
        if ( $integrate_peek == true && $depth == 0 && ($classes[0] == 'peek-book-btn')) {
            $t_gid = $atts['href'];
            $gid = preg_replace('#^https?://#', '', $t_gid);
            if($classes[1] == 'gift'):
              $h_attribute = ' href="http://www.peek.com/purchase/gift_card/'.$gid.'"';
              $h_attribute .= ' class="peek-book-button-flat"';
              $h_attribute .= ' itemprop="url"';
              $h_attribute .= ' data-purchase-type="gift-card"';
              $h_attribute .= ' data-button-text="'.$item->title.'"';
            //$attributes .= ' data-partner-gid="'.$gid.'"';
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
        } elseif($integrate_regiondo == true && $depth == 0 && ($classes[0] == 'regiondo-book-btn')) {
            $t_rid = $atts['href'];
            $url_attribute = ' data-url="'.$t_rid.'"';
            $item_output = $args->before;
            $item_output .= '<a class="regiondo-button"'.$url_attribute.'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
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
    
    
}
