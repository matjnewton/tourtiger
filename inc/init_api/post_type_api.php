<?php

define('WQS_API_URL',site_url().'/wqs-api');

function getWqsApiUrl()
{
    if(WQS_API_URL)
    {
        return WQS_API_URL;
    }
}
function getWqsCurrentUrl()
{
    // fix protocol
    $isSecure = false;
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $isSecure = true;
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
        $isSecure = true;
    }
    $REQUEST_PROTOCOL = $isSecure ? 'https' : 'http';
    //end fix

    $actual_link = $REQUEST_PROTOCOL."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($actual_link != null) {
        return $actual_link;
    }
}
add_action('init','getWqsApi');
function getWqsApi() {

    if(getWqsCurrentUrl()==WQS_API_URL)  :

        $args = array(
            'post_type' => array('tour','product'),
            'posts_per_page' => -1
        );
        $mainObj=array();
        $productcodeArray = array();

        $loop = new WP_Query($args);
        while ($loop->have_posts()) :

            $tempArray=[];
            
            $loop->the_post();

            $title= get_the_title();
            $link= get_the_permalink();
            //$date= get_the_date();
                
                //$image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $thumb = get_post_thumbnail_id($post->ID);
                $img_url = wp_get_attachment_url( $thumb,'full'); 
                $image = aq_resize( $img_url, 346, 240, true );
                $image2 = aq_resize( $img_url, 305, 205, true );

            $descript_from_hero = wp_strip_all_tags( get_field('hero_area_0_content_editor', $post->ID ) );

            $id=get_the_id();
            //$cur_terms = get_the_terms( $id, 'rezdy_cat' );
            //$cur_terms = get_the_terms( $id, 'tour_cat' );
            $posttype = get_post_type( $post->ID );
            if ($posttype == 'tour') {
                $cur_terms = get_the_terms( $id, 'tour_cat' );
            } else if ($posttype == 'product') {
                $cur_terms = get_the_terms( $id, 'rezdy_cat' );
            }
            //$cur_terms = wp_get_object_terms($id, 'tour_cat', array( 'fields' => 'ids' ));
            //$cur_terms = wp_get_object_terms($post->ID, 'tour_cat');
            $productcode = get_field('productcode', $post->ID);
            $xola_id = get_field('xola_id', $post->ID);
            // group tour option
            $productcode_group = get_field('productcode_group', $post->ID);
            $enable_group_product = get_field('enable_group_product', $post->ID);
            
            $integration_flag = get_field('integration_flag', $post->ID);
            $integration_price = get_field('integration_price', $post->ID);
            $integration_availability = get_field('integration_availability', $post->ID);
            $integration_product_description = get_field('integration_product_description', $post->ID );
            
            if ($posttype == 'tour') {
                $descriptions = $descript_from_hero;
            } else if ($posttype == 'product') {
                $descriptions = $integration_product_description;
            }

            $integration_not_display_details = get_field('integration_not_display_details', $post->ID );

            $label = array();
            $text = array();
            $details = array();
            $count = 0;
            if( have_rows('integration_details_list', $post->ID) ): 
                while( have_rows('integration_details_list') ): the_row(); 
                    $label[$count] = get_sub_field('label');
                    $text[$count] = get_sub_field('text');
                    $details[$count]['label'] = $label[$count];
                    $details[$count]['text'] = $text[$count];
                    $count++;
                endwhile;
            else:
                $details->length = 0; 
            endif;


            if(have_rows('sidebar_1', $post->ID)): 
                while(have_rows('sidebar_1')): the_row(); 
                    if( get_row_layout() == 'button' ):
                        $custom_button_link = get_sub_field('custom_button_link');
                    endif;
                endwhile;
            endif;


            if ($productcode) {
               array_push($productcodeArray,$productcode);
            }
            

            $tempArray['title'] = $title;
            //$tempArray['date']=$date;
            $tempArray['image'] = $image;
            $tempArray['image2'] = $image2;
            $tempArray['link'] = $link;
            $tempArray['id'] = $id;
            
            if ($cur_terms) {
                $tempArray['term'] = $cur_terms[0];
            }
            
            $tempArray['productcode'] = $productcode;
            // add group
            $tempArray['enable_group_product'] = $enable_group_product;
            $tempArray['productcode_group'] = $productcode_group;

            $tempArray['xola_id'] = $xola_id;
            $tempArray['descript'] = $descriptions;

            $tempArray['integration_flag'] = $integration_flag;
            $tempArray['integration_price'] = $integration_price;
            //$tempArray['label'] = $label;
            //$tempArray['text_detail'] = $text;
            $tempArray['details'] = $details;
            $tempArray['integration_details'] = $integration_not_display_details;
            $tempArray['integration_availability'] = $integration_availability;
            $tempArray['custom_button_link'] = $custom_button_link;
            $tempArray['post_type'] = get_post_type( $post->ID );

            array_push($mainObj,$tempArray);
        endwhile;


        //array_push($mainObj,$productcodeArray);

        header('Content-Type: application/json');
        print_r(json_encode($mainObj,JSON_PRETTY_PRINT));
        exit;
    endif;

}

// custom route /wqs-api/tour_product_api
function wqs_api_get_tour_product() {


        $args = array(
            'post_type' => array('tour','product'),
            'posts_per_page' => -1
        );
        $mainObj=array();
        $productcodeArray = array();

        $loop = new WP_Query($args);
        while ($loop->have_posts()) :

            $tempArray=[];
            
            $loop->the_post();

            $title= get_the_title();
            $link= get_the_permalink();
            //$date= get_the_date();
                
                //$image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $thumb = get_post_thumbnail_id($post->ID);
                $img_url = wp_get_attachment_url( $thumb,'full'); 
                $image = aq_resize( $img_url, 346, 240, true );
                $image2 = aq_resize( $img_url, 305, 205, true );

            $descript_from_hero = wp_strip_all_tags( get_field('hero_area_0_content_editor', $post->ID ) );

            $id=get_the_id();
            //$cur_terms = get_the_terms( $id, 'rezdy_cat' );
            //$cur_terms = get_the_terms( $id, 'tour_cat' );
            $posttype = get_post_type( $post->ID );
            if ($posttype == 'tour') {
                $cur_terms = get_the_terms( $id, 'tour_cat' );
            } else if ($posttype == 'product') {
                $cur_terms = get_the_terms( $id, 'rezdy_cat' );
            }
            //$cur_terms = wp_get_object_terms($id, 'tour_cat', array( 'fields' => 'ids' ));
            //$cur_terms = wp_get_object_terms($post->ID, 'tour_cat');
            $productcode = get_field('productcode', $post->ID);
            $xola_id = get_field('xola_id', $post->ID);
            // group tour option
            $productcode_group = get_field('productcode_group', $post->ID);
            $enable_group_product = get_field('enable_group_product', $post->ID);
            
            $integration_flag = get_field('integration_flag', $post->ID);
            $integration_price = get_field('integration_price', $post->ID);
            $integration_availability = get_field('integration_availability', $post->ID);
            $integration_product_description = get_field('integration_product_description', $post->ID );
            
            if ($posttype == 'tour') {
                $descriptions = $descript_from_hero;
            } else if ($posttype == 'product') {
                $descriptions = $integration_product_description;
            }

            $integration_not_display_details = get_field('integration_not_display_details', $post->ID );

            $label = array();
            $text = array();
            $details = array();
            $count = 0;
            if( have_rows('integration_details_list', $post->ID) ): 
                while( have_rows('integration_details_list') ): the_row(); 
                    $label[$count] = get_sub_field('label');
                    $text[$count] = get_sub_field('text');
                    $details[$count]['label'] = $label[$count];
                    $details[$count]['text'] = $text[$count];
                    $count++;
                endwhile; 
            endif;


            if(have_rows('sidebar_1', $post->ID)): 
                while(have_rows('sidebar_1')): the_row(); 
                    if( get_row_layout() == 'button' ):
                        $custom_button_link = get_sub_field('custom_button_link');
                    endif;
                endwhile;
            endif;


            if ($productcode) {
               array_push($productcodeArray,$productcode);
            }
            

            $tempArray['title'] = $title;
            //$tempArray['date']=$date;
            $tempArray['image'] = $image;
            $tempArray['image2'] = $image2;
            $tempArray['link'] = $link;
            $tempArray['id'] = $id;
            
            if ($cur_terms) {
                $tempArray['term'] = $cur_terms[0];
            }
            
            $tempArray['productcode'] = $productcode;
            // add group
            $tempArray['enable_group_product'] = $enable_group_product;
            $tempArray['productcode_group'] = $productcode_group;

            $tempArray['xola_id'] = $xola_id;
            $tempArray['descript'] = $descriptions;

            $tempArray['integration_flag'] = $integration_flag;
            $tempArray['integration_price'] = $integration_price;
            //$tempArray['label'] = $label;
            //$tempArray['text_detail'] = $text;
            $tempArray['integration_details'] = $integration_not_display_details;
            $tempArray['details'] = $details;
            $tempArray['integration_availability'] = $integration_availability;
            $tempArray['custom_button_link'] = $custom_button_link;
            $tempArray['post_type'] = get_post_type( $post->ID );

            array_push($mainObj,$tempArray);
        endwhile;

    return rest_ensure_response( $mainObj );
}
 

function wqs_api_tour_product_routes() {
    register_rest_route( 'wqs-api', '/tour_product_api', array(
        'methods'  => 'GET',
        'callback' => 'wqs_api_get_tour_product',
    ) );
}
add_action( 'rest_api_init', 'wqs_api_tour_product_routes' );
?>