<?php

/* migrate to tiger_live.php */

// function get_rezdy_tour_select($field) {
// 	$field['choices'] = array();
//     $field['choices']['0'] = 'no sync';
    
// 	global $wpdb;
//     $table = $wpdb->prefix."options";
//     $query = "SELECT * FROM ".$table." WHERE `option_name` =  'options_check_user_id'";
//     $results = $wpdb->get_row($query);
//     $api_key = $results->option_value;

//     //$api_key = get_field('field_n1993k2903', 'option');
//     $product_url = "https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey=".$api_key;

//     $json = file_get_contents($product_url);
//     $rezdy = json_decode($json);
//     $rezdy_tour_name = array();
//     foreach($rezdy->products as $key=>$product){
//     	$rezdy_tour_name[] = $product->name;
//     	$field['choices'][ $product->productCode ] = $product->name;
//     }

//     return $field;

// } 

// add_filter('acf/load_field/name=our_tours_rezdy', 'get_rezdy_tour_select');


// function get_cpt_tours_select($field) {
// 	$field['choices'] = array();

// 	global $wpdb;
// 	$table = $wpdb->prefix."posts";
// 	$query = "SELECT * FROM ".$table." WHERE post_type='tour' AND post_status='publish'";
// 	$results = $wpdb->get_results($query);
// 	$tours_array = array();

// 	foreach ($results as $res){
// 	 	$tours_array[] = $res->post_title;
// 	 	$field['choices'][ $res->ID ] = $res->post_title;
// 	 }
// 	 return $field;
// } 
// add_filter('acf/load_field/name=our_tours', 'get_cpt_tours_select');


// function get_cpt_tours_select_checker($field) {
// 	$field['choices'] = array();

// 	$tours_array = array();
// 	$our_tours = array(); 

// 	if( have_rows('matching_products', 'option') ): 
// 		while( have_rows('matching_products', 'option') ): the_row(); 
// 			$our_tours[] = get_sub_field('our_tours');
// 		endwhile; 
// 	endif; 


// 	foreach ($our_tours as $res){
// 	 	$field['choices'][ $res ] = get_the_title( $res );
// 	 }
// 	 return $field;
// } 
// add_filter('acf/load_field/name=our_tours_checker', 'get_cpt_tours_select_checker');

// function save_rezdy_sync() {
// 	$screen = get_current_screen();
// 	if (strpos($screen->id, "acf-options-company-details") == true) {
// 		//print_r($_POST['acf']['field_57eb6b8fd8aae'] );
// 		//die();
// 		$matching_products = $_POST['acf']['field_57eb6b8fd8aae'];
// 		if ($matching_products) {
// 				foreach ($matching_products as $key => $matching_product) {
// 					// print_r($matching_product['field_57eb6b9ad8aaf']);
// 					// die();
// 					$postid = $matching_product['field_57eb6b9ad8aaf'];
// 					$productcode = $matching_product['field_57eb6b9ad8aaf_rezdy'];
// 					update_field('productcode', $productcode, $postid);
// 				}
// 		}

// 	} 
// }
// add_action('acf/save_post', 'save_rezdy_sync', 20);

function tour_output($product_code, $seatsavailable, $category_array, $product_id ) {


		$args = array(
			'post_type'			 => 'tour',
			'post_status'		 => 'publish',
			'order'              => 'DESC',
			'orderby'            => 'date',
			'posts_per_page'     => -1,
		);

	if ($product_id) {
			$args['page_id'] = $product_id;
	}

		if ( $category_array ) {
			// $termArray = array_map('strtolower', $category_array);
			$termArray = $category_array;
			
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'tour_cat',
					'field'    => 'slug',
					'terms'    => $termArray
				)
			);
		}

	
	$the_query = new WP_Query( $args );


	    if ( $the_query->have_posts() ) :

	            while ( $the_query->have_posts() ) :
	                  $the_query->the_post();
	              	  if (get_field('productcode') == $product_code) {
				 			
				 			if (has_post_thumbnail()) {
					            $thumb = get_post_thumbnail_id();
					            $img_url = wp_get_attachment_url( $thumb,'full'); 
					            $image = aq_resize( $img_url, 346, 240, true );
					        }



				          $output.= '<div class="anrow">
			                                  <div class="col-md-4">
			                                    <div class="rezdImg" style="background-image:url('."'".''. $image.''."'".')"></div>
			                                  </div>
			                                  <div class="col-md-8">
			                                    <h3>'.get_the_title().'</h3>
			                                    <p class="rezdDesc">'.wp_strip_all_tags( get_field('hero_area_0_content_editor') ).' <br>seatsAvailable:  '.$seatsavailable.' </p>
			                                    
			                                  </div>
			                            <a href="'.get_post_permalink().'" class="btn btn-default pull-right viewtour">View Tour</a>
			                        </div>';
	              	  }

	              	  
	            endwhile;

	    endif;

    return $output;
	
}



function rezdy_get_tour_by_date_transient($transientname, $url, $interval=0) {
  // those are the same arguments as 'set_transient()'

  $stalecachename = 'rezdy_' . $transientname; 
  // we generate a consistent name for the backup data


     if ( false === ( $json = get_transient($transientname) ) ) {
       $response = wp_remote_get($url);

       // get the remote data as before, but this time...

       if (is_wp_error($response) || ! isset($response['body']) || 200 != $response['response']['code']) {
       // check to see all of the ways that the data request could return an error.

         $json = get_option($stalecachename);
         // one of our checks failed, so we get the stale cache data from WP Options and store in the $json variable.

       } else {
         $json =  $response['body'];
         // no errors!  we store the remote data in the $json variable.
 
         if (! get_option($stalecachename)) {
           add_option($stalecachename, $json, '', 'no');
           // Store the data in the $json variable in the options table as a backup. 
           // We _could_ have just used update_option(), but by using add_option() with 'no' in the third arg
           // we keep the option from being 'autoloaded' into memory and reducing memory usage.
         } else {
           update_option($stalecachename, $json);
           // update_option() preserves the 'autoload' setting of a previously created option.
         }
       }

       set_transient($transientname, $json, $interval );
       // Regardless of whether we got the data from the remote site or our local backup, we store that data in the transient.
       // We won't try to regenerate that data until the transient expires. 
 
    }
    return $json;
    // on general principle return the data we are storing in case we'd like to do something with it.

}

function interval_rezdy_tours_1($field) {
	$field['choices'] = array();
    $field['choices']['0'] = 'non cache';
    
    for ($i = 1; $i <= 24; $i++) {
	   $field['choices'][ $i ] = $i;
	}

    return $field;

} 

add_filter('acf/load_field/name=interval_rezdy_tours_1', 'interval_rezdy_tours_1');

function interval_rezdy_tours_2($field) {
	$field['choices'] = array();
    $field['choices']['0'] = 'non cache';
    
    for ($i = 1; $i <= 24; $i++) {
    		$field['choices'][ $i ] = $i;
	}

    return $field;

} 

add_filter('acf/load_field/name=interval_rezdy_tours_2', 'interval_rezdy_tours_2');


// include script
add_action( 'wp_enqueue_scripts', 'rezdy_scripts_method' ); 
function rezdy_scripts_method() {
	wp_enqueue_script( 'rezdy_scripts', CORE_URL . '/js/rezdy_scripts.js', array('jquery') );
	wp_localize_script( 'rezdy_scripts', 'localize_var', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

// ajax callback
add_action('wp_ajax_check_availability', 'check_availability_callback');
add_action('wp_ajax_nopriv_check_availability', 'check_availability_callback');
function check_availability_callback() {
	$datepicker_from = ($_POST['datepicker_from']);
	$datepicker_to = ($_POST['datepicker_to']);
	$tour_cat_arr = ($_POST['tour_cat_arr']);
	$product_id = ($_POST['product_id']);
	$offset = 0;
	$limit = 100;
	$response['datepicker_from']  = $datepicker_from;
	$response['datepicker_to']  = $datepicker_to;
	$response['tour_cat_arr'] = $tour_cat_arr;
	$response['product_id'] = $product_id;
	$rezdy = get_check_product( $offset, $limit, $datepicker_from, $datepicker_to);
	$response['get_check_product'] = $rezdy;
	$response['get_check_availiability'] = get_check_availiability( $offset, $limit, $datepicker_from, $datepicker_to, $rezdy, $tour_cat_arr, $product_id);
	echo json_encode( $response );
	exit;
}

function get_check_product( $offset, $limit, $startTime, $endTime) {

      // key
      $api_key = get_field('field_n1993k2903', 'option');
    
	    // category rezdy option
	    $rezdy_cat = get_field('rezdy_cat', 'option');
	    $rezdy_cat_id = '';
	    $rezdy_category ='';
	    if ($rezdy_cat) {
	        $rezdy_cat_id = get_field('rezdy_cat_id', 'option');
	        $rezdy_category = '/categories/'.$rezdy_cat_id;
	    } else {
	        $rezdy_cat_id = '';
	        $rezdy_category ='';
	    }

      // query url
      $url = "https://api.rezdy.com/v1".$rezdy_category."/products?limit=".$limit."&offset=".$offset."&startDate=".$startTime."&endDate=".$endTime."&apiKey=".$api_key;
      // transient name
      $transientname  = 'products_'.$startTime.'_'.$endTime.'_'.$limit.'_'.$offset;
      // interval
      $interval = get_field('interval_rezdy_tours_1', 'option');

      $json_transient = rezdy_get_tour_by_date_transient($transientname, $url, $interval);
      $rezdy = json_decode($json_transient);

    return $rezdy;
}



function get_check_availiability( $offset, $limit, $startTime, $endTime, $rezdy, $category_array, $product_id) {

	$product_names_array = array();
    $startTime_minus = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $startTime) ) ));
    $allDatesFromStartToEnd = createDateRangeArray_($startTime_minus,$endTime);

	    foreach($allDatesFromStartToEnd as $dkey=>$groupDates){
	        $origKey = $dkey+1;
	        $daymonthyear = explode("-",$allDatesFromStartToEnd[$origKey]);
	        $dayR = $daymonthyear[2];
	        $month_array = month_array();
	        $monthR = $month_array[$daymonthyear[1]];
	        
	        if ($origKey != count($allDatesFromStartToEnd) ) {
				$rezdy_content .= "<p class='cDate'>".$dayR." ".$monthR."</p>";
			}
	        // $rezdy_content .= "<p class='cDate'>".$dayR." ".$monthR."</p>";

	        $rezdy_content_none = 'Unavailable';
	        //start foreach2
	        foreach($rezdy->products as $key=>$product){
	        	 
				  // transient rezdy query Available
			      // offset
	        	  $offset_avail = $offset;
			      // limit
			      $limit_avail = $limit;
			      // time
			      $startTime_avail = $groupDates;
			      $endTime_avail = $allDatesFromStartToEnd[$origKey];
			      // key
			      $api_key = get_field('field_n1993k2903', 'option');
			      // productCode
			      $productCode_avail = $product->productCode;
			      // query url
			      $availiabilityUrl = "https://api.rezdy.com/v1/availability?limit=".$limit_avail."&offset=".$offset_avail."&productCode=".$productCode_avail."&startTime=".$startTime_avail."&endTime=".$endTime_avail."&apiKey=".$api_key;
			      // transient name
			      $transientname_avail  = 'availability_'.$productCode_avail.'_'.$startTime_avail.'_'.$endTime_avail.'_'.$limit_avail.'_'.$offset_avail;
			      // interval
			      //$interval_avail=3*HOUR_IN_SECONDS;
			      $interval_avail = get_field('interval_rezdy_tours_2', 'option');
			      $json1_transient = rezdy_get_tour_by_date_transient($transientname_avail, $availiabilityUrl, $interval_avail);
			      $rezdy1_transient = json_decode($json1_transient);
			      $rezdy1 = $rezdy1_transient;
			      //$rezdy_content .= $json1_transient;
			      if(!empty($rezdy1->sessions) && ($rezdy1->sessions[0]->seatsAvailable >0 )){
			      //if(!empty($rezdy1->sessions)){

			      		$rezdy_content.= tour_output($product->productCode,$rezdy1->sessions[0]->seatsAvailable, $category_array, $product_id);

			      		if ( count( tour_output($product->productCode,$rezdy1->sessions[0]->seatsAvailable, $category_array, $product_id)) > 0) {
			      			$rezdy_content_none = '';
			      		}
			      		
			      }
			} //end foreach 2 
			
			if ($origKey != count($allDatesFromStartToEnd) ) {
				$rezdy_content.= $rezdy_content_none;
			}
			

	    } //end foreach alldates

    return $rezdy_content;

} //end 


function check_available_single_tour($id) {
	$productcode = get_field('productcode',$id);
	$begin = date('Y-m-d');
	$end = date('Y-m-d',(strtotime ( '+7 day' , strtotime ( $begin) ) ));
	$period= createDateRangeArray_($begin,$end);
	$option_available = array();

		foreach ( $period as $dt ) {
		      $dt_first = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $dt) ) ));
		      $option_available[$dt] = get_option('_transient_availability_'.$productcode.'_'.$dt_first.'_'.$dt.'_100_0');
		      $this_available[$dt] = json_decode($option_available[$dt])->sessions[0]->seatsAvailable;
		}
		//var_dump($this_available);
		return $this_available;
}

// helpers 
function month_array() {
    $month_array = array(
      '01' => 'January',
      '02' => 'February',
      '03' => 'March',
      '04' => 'April',
      '05' => 'May',
      '06' => 'June',
      '07' => 'July',
      '08' => 'August',
      '09' => 'September',
      '10' => 'October',
      '11' => 'November',
      '12' => 'December',
    );
    return $month_array;
}

function createDateRangeArray_($strDateFrom,$strDateTo)
{
    $aryRange=array();
    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));
    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}

function checkbox_term($taxonomy, $id, $current) {

	$args = array(
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
	);
	$terms = get_terms( $args );
	echo "<ul>";
		foreach($terms as $term){
		    $checked = (has_term($term->slug, 'tour', $id)) ? 'checked="checked"' : '';
		    if ($current) {
		    	$checked = ($term->slug == $current) ? 'checked="checked"' : '';
		    }
		    echo "<li>";
			    echo "<input class='checkbox_term' type='checkbox' name='term-" . $term->slug . "' value='" . $term->slug . "' $checked />";
			    echo "<label for='term-" . $term->slug . "'>" . $term->name . "</label>";
			echo "</li>";
		}
	echo "</ul>";

}

function select_term_forslug($taxonomy, $id, $current) {

	$args = array(
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
	);
	$terms = get_terms( $args );
	//echo "<select size='1' multiple name = 'name[]'>";
	echo "<select>";
		echo "<option class='checkbox_term' selected name='term-all' value = ''>for All</option>";
		foreach($terms as $term){
		    $checked = (has_term($term->slug, 'tour', $id)) ? 'selected' : '';
		    if ($current) {
		    	$checked = ($term->slug == $current) ? 'selected' : '';
		    }
		    echo "<option class='checkbox_term' ".$checked." name='term-" . $term->slug . "' value = " . $term->slug . ">" . $term->name . "</option>";
		}
	echo "</select>";

}

function select_term($taxonomy, $id, $current) {

	$args = array(
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
	);
	$terms = get_terms( $args );
	//echo "<select size='1' multiple name = 'name[]'>";
	echo "<select>";
		echo "<option class='checkbox_term' selected name='term-all' value = ''>for All</option>";
		foreach($terms as $term){
		    $checked = (has_term($term->term_id, 'tour', $id)) ? 'selected' : '';
		    if ($current) {
		    	$checked = ($term->term_id == $current) ? 'selected' : '';
		    }
		    echo "<option class='checkbox_term' ".$checked." name='term-" . $term->slug . "' value = " . $term->term_id . ">" . $term->name . "</option>";
		}
	echo "</select>";

}