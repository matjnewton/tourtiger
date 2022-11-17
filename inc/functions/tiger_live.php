<?php


// rezdy
function get_rezdy_tour_select($field) {
	$field['choices'] = array();
    $field['choices']['0'] = 'no sync';

	global $wpdb;
    $table = $wpdb->prefix."options";
    $query = "SELECT * FROM ".$table." WHERE `option_name` =  'options_check_user_id'";
    $results = $wpdb->get_row($query);
    $api_key = $results->option_value;

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

    //$api_key = get_field('field_n1993k2903', 'option');
    $product_url = "https://api.rezdy.com/v1".$rezdy_category."/products?limit=100&apiKey=".$api_key;

    $json = file_get_contents($product_url);
    $rezdy = json_decode($json);
    $rezdy_tour_name = array();
    foreach($rezdy->products as $key=>$product){
    	$rezdy_tour_name[] = $product->name;
    	$field['choices'][ $product->productCode ] = $product->name;
    }

    return $field;

}
add_filter('acf/load_field/name=our_tours_rezdy', 'get_rezdy_tour_select');
add_filter('acf/load_field/name=our_tours_rezdy_group', 'get_rezdy_tour_select');//group

function get_cpt_tours_select($field) {
	$field['choices'] = array();

	global $wpdb;
	$table = $wpdb->prefix."posts";
	$query = "SELECT * FROM ".$table." WHERE post_type='tour' AND post_status='publish'";
	$query2 = "SELECT * FROM ".$table." WHERE post_type='product' AND post_status='publish'";
	$results = $wpdb->get_results($query);
	$results2 = $wpdb->get_results($query2);
	$full_result = array_merge($results,$results2);
	$tours_array = array();

	// foreach ($results as $res){
	//  	$tours_array[] = $res->post_title;
	//  	$field['choices'][ $res->ID ] = $res->post_title;
	//  }
	foreach ($full_result as $res){
	 	$tours_array[] = $res->post_title;
	 	$field['choices'][ $res->ID ] = $res->post_title.' ('.$res->post_type.')';
	 }
	 return $field;
}
add_filter('acf/load_field/name=our_tours', 'get_cpt_tours_select');
add_filter('acf/load_field/name=our_tours_group', 'get_cpt_tours_select');//group
add_filter('acf/load_field/name=our_tours_group_xola', 'get_cpt_tours_select');//group

function get_cpt_tours_select_checker($field) {
	$field['choices'] = array();

	$tours_array = array();
	$our_tours = array();
	$our_tours_group = array();

	$integrate_xola_with_this_website = get_field('integrate_xola_with_this_website', 'option');
	$integrate_rezdy_with_this_website = get_field('rezdy', 'option');
	$rezdy_group_tours = get_field('rezdy_group_tours', 'option');
	$xola_group_tours = get_field('xola_group_tours', 'option');
	$integrate_atlasx = get_field('integrate_atlasx_with_this_website', 'option');

	//atlas
	if( have_rows('matching_products_xola', 'option') && $integrate_atlasx ):
		while( have_rows('matching_products_xola', 'option') ): the_row();
			$our_tours[] = get_sub_field('our_tours_forxola');
		endwhile;
	endif;

	//xola
	if( have_rows('matching_products_xola', 'option') && $integrate_xola_with_this_website ):
		while( have_rows('matching_products_xola', 'option') ): the_row();
			$our_tours[] = get_sub_field('our_tours_forxola');
		endwhile;
	endif;

	// rezdy
	if( have_rows('matching_products', 'option') && $integrate_rezdy_with_this_website ):
		while( have_rows('matching_products', 'option') ): the_row();
			$our_tours[] = get_sub_field('our_tours');
		endwhile;
	endif;

	// rezdy Group
	if( have_rows('matching_products_group', 'option') && $integrate_rezdy_with_this_website ):
		while( have_rows('matching_products_group', 'option') ): the_row();
			$our_tours_group[] = get_sub_field('our_tours_group');
		endwhile;
	endif;
	if ($rezdy_group_tours) {
		$our_tours = array_merge($our_tours,$our_tours_group);
	}
	//Xola group
	if( have_rows('matching_products_group_xola', 'option') && $integrate_xola_with_this_website ):
		while( have_rows('matching_products_group_xola', 'option') ): the_row();
			$our_tours_group[] = get_sub_field('our_tours_group_xola');
		endwhile;
	endif;
	if ($xola_group_tours) {
		//$our_tours = array_merge($our_tours,$our_tours_group);
	}

	foreach ($our_tours as $res){
		$post_type = get_post_type( $res );
	 	$field['choices'][ $res ] = get_the_title( $res ).' ('.$post_type.')';
	 }
	 return $field;
}
add_filter('acf/load_field/name=our_tours_checker', 'get_cpt_tours_select_checker');

function get_cpt_tours_select_checker_group($field) {
	$field['choices'] = array();
	$our_tours_group = array();

	$integrate_xola_with_this_website = get_field('integrate_xola_with_this_website', 'option');
	$integrate_rezdy_with_this_website = get_field('rezdy', 'option');
	$rezdy_group_tours = get_field('rezdy_group_tours', 'option');
	$xola_group_tours = get_field('xola_group_tours', 'option');

	if ($integrate_xola_with_this_website && $xola_group_tours) {
		global $wpdb;
	    $table = $wpdb->prefix."options";
	    $query = "SELECT * FROM ".$table." WHERE `option_name` =  'options_check_user_id_xola'";
	    $results = $wpdb->get_row($query);
	    $api_key = $results->option_value;

	    $product_url = "https://silent.xola.com/api/experiences?_format=json&seller=".$api_key;

	    $json = file_get_contents($product_url);
	    $xola = json_decode($json);
	    foreach($xola->data as $key=>$product){
	    	$field['choices'][ $product->id ] = $product->name;
	    }
	} else {
		 $field['choices']['0'] = 'not available';
	}
	return $field;
}
add_filter('acf/load_field/name=our_tours_checker_forgroup', 'get_cpt_tours_select_checker_group');

// xola
function get_cpt_tours_select_xola($field) {
	$field['choices'] = array();

	global $wpdb;
	$table = $wpdb->prefix."posts";
	$query = "SELECT * FROM ".$table." WHERE post_type='tour' AND post_status='publish'";
	$query2 = "SELECT * FROM ".$table." WHERE post_type='product' AND post_status='publish'";
	$results = $wpdb->get_results($query);
	$results2 = $wpdb->get_results($query2);
	$full_result = array_merge($results,$results2);
	$tours_array = array();

	foreach ($full_result as $res){
	 	$tours_array[] = $res->post_title;
	 	$field['choices'][ $res->ID ] = $res->post_title.' ('.$res->post_type.')';
	 }
	 return $field;
}
add_filter('acf/load_field/name=our_tours_forxola', 'get_cpt_tours_select_xola');

function get_api_xola_tour($field) {
	$field['choices'] = array();
    $field['choices']['0'] = 'no sync';

	global $wpdb;
    $table = $wpdb->prefix."options";
    $query = "SELECT * FROM ".$table." WHERE `option_name` =  'options_check_user_id_xola'";
    $results = $wpdb->get_row($query);
    $api_key = $results->option_value;

    //$api_key = get_field('field_n1993k2903', 'option'); 5605b264926705ac758b45c8
    $product_url = "https://silent.xola.com/api/experiences?_format=json&seller=".$api_key;

	if ( file_exists($product_url) ) :

	    $json = file_get_contents($product_url);
	    $xola = json_decode($json);
	    //$rezdy_tour_name = array();
	    foreach($xola->data as $key=>$product){
	        //$rezdy_tour_name[] = $product->name;
	        $field['choices'][ $product->id ] = $product->name;
	    }

	endif;

    return $field;

}

add_filter('acf/load_field/name=our_tours_apixola', 'get_api_xola_tour');
add_filter('acf/load_field/name=our_tours_xola_group', 'get_api_xola_tour');

function save_sync() {
	$screen = get_current_screen();
	if (strpos($screen->id, "acf-options-company-details") == true) {
		// print_r($_POST['acf']['field_57eb6b8fd8aae_xola'] );
		// print_r($_POST['acf']['field_57eb6b8fd8aae'] );
		// die();

		// xola
		$matching_products_xola = $_POST['acf']['field_57eb6b8fd8aae_xola'];
		if ($matching_products_xola) {
				foreach ($matching_products_xola as $key => $matching_product_xola) {
					// print_r($matching_product['field_57eb6b9ad8aaf']);
					// die();
					$postid_xola = $matching_product_xola['field_57eb6b9ad8aaf_forxola'];
					$xola_id = $matching_product_xola['field_57eb6b9ad8aaf_apiXola'];
					update_field('xola_id', $xola_id, $postid_xola);
				}
		}
		// rezdy
		$matching_products = $_POST['acf']['field_57eb6b8fd8aae'];
		if ($matching_products) {
				foreach ($matching_products as $key => $matching_product) {
					// print_r($matching_product['field_57eb6b9ad8aaf']);
					// die();
					$postid = $matching_product['field_57eb6b9ad8aaf'];
					$productcode = $matching_product['field_57eb6b9ad8aaf_rezdy'];
					update_field('productcode', $productcode, $postid);
				}
		}
		// rezdy group
		$matching_products_group = $_POST['acf']['field_57eb6b8fd8aae_group'];
		if ($matching_products_group) {
				foreach ($matching_products_group as $key => $matching_product_group) {

					$postid_group = $matching_product_group['field_57eb6b9ad8aaf_group'];
					$productcode_group = $matching_product_group['field_57eb6b9ad8aaf_rezdy_group'];

					update_field('productcode_group', $productcode_group, $postid_group);
					update_field('enable_group_product', true, $postid_group);
					// no sync
					if ($productcode_group[0] === "0" ) {
						// print_r($productcode_group[0] );
						// die();
						update_field('enable_group_product', false, $postid_group);
					} else {
						update_field('productcode', null, $postid_group); // execude in single
					}
				}
		}

		// Xola group
		$matching_products_group_xola = $_POST['acf']['field_57eb6b8fd8aae_group_xola'];
		// print_r($matching_products_group_xola);
		// die();
		if ($matching_products_group_xola) {
					// print_r($matching_products_group_xola);
					// die();
				foreach ($matching_products_group_xola as $key => $matching_product_group) {

					$postid_group = $matching_product_group['field_57eb6b9ad8aaf_group_xola'];
					$productcode_group = $matching_product_group['field_57eb6b9ad8aaf_xola_group'];
					// print_r($productcode_group);
					// print_r($postid_group);
					//die();
					update_field('productcode_group', $productcode_group, $postid_group);
					update_field('enable_group_product', true, $postid_group);
					// no sync
					if ($productcode_group[0] === "0" ) {
						// print_r($productcode_group[0] );
						// die();
						update_field('enable_group_product', false, $postid_group);
					} else {
						update_field('productcode', null, $postid_group); // execude in single
					}
				}
		}

	}

}
add_action('acf/save_post', 'save_sync', 20);

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
