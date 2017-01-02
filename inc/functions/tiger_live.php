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

    //$api_key = get_field('field_n1993k2903', 'option');
    $product_url = "https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey=".$api_key;

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


function get_cpt_tours_select_checker($field) {
	$field['choices'] = array();

	$tours_array = array();
	$our_tours = array(); 

	$integrate_xola_with_this_website = get_field('integrate_xola_with_this_website', 'option');
	$integrate_rezdy_with_this_website = get_field('rezdy', 'option');

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


	foreach ($our_tours as $res){
		$post_type = get_post_type( $res );
	 	$field['choices'][ $res ] = get_the_title( $res ).' ('.$post_type.')';
	 }
	 return $field;
} 
add_filter('acf/load_field/name=our_tours_checker', 'get_cpt_tours_select_checker');

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

    $json = file_get_contents($product_url);
    $xola = json_decode($json);
    //$rezdy_tour_name = array();
    foreach($xola->data as $key=>$product){
    	//$rezdy_tour_name[] = $product->name;
    	$field['choices'][ $product->id ] = $product->name;
    }

    return $field;

} 

add_filter('acf/load_field/name=our_tours_apixola', 'get_api_xola_tour');

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