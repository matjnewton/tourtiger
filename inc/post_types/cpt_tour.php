<?php

// register taxonomy tour_cat
add_action( 'init', 'cptui_register_my_taxes_tour_cat' );
function cptui_register_my_taxes_tour_cat() {
	$labels = array(
		"name" => __( 'Tour Categories', '' ),
		"singular_name" => __( 'Tour Category', '' ),
		);

	$args = array(
		"label" => __( 'Tour Categories', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Tour Categories",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'tour_cat', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "tour_cat", array( "page", "tour" ), $args );

// End cptui_register_my_taxes_tour_cat()
}


// add column to cpt tour
function manage_tours_columns( $column_name, $id ) {

	global $wpdb, $pageURLs;

	$diplom = get_post( $id );
	$user   = get_userdata( $diplom->post_author );

	switch ( $column_name ) {
		case 'id':
			echo $id;
			break;


		case 'tour_cat':
				$terms = get_the_terms($id, 'tour_cat');
				foreach($terms as $term)
				    echo ' '.$term->name. ' ';
			break;

		default:
			break;
	} // end switch
}

function add_tours_columns( $columns ) {

	global $pageURLs;
	$new_columns['cb']               = '<input type="checkbox" />';
	$new_columns['title']            = _x( 'Title', 'column name' );
	$new_columns['tour_cat']		 = _x( 'Category', 'column name' );
	$new_columns['date']             = _x( 'Date', 'column name' );
	

	return $new_columns;
}

add_filter( 'manage_edit-tour_columns', 'add_tours_columns' );
add_action( 'manage_tour_posts_custom_column', 'manage_tours_columns', 10, 2 ); 