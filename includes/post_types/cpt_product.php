<?php 
 // Register rezdy product  Post Type
function product_post_type() {

	$labels = array(
		'name'                  => _x( 'Product', 'Product', 'borasite' ),
		'singular_name'         => _x( 'Product', 'Product', 'borasite' ),
		'menu_name'             => __( 'Product', 'borasite' ),
		'name_admin_bar'        => __( 'Product', 'borasite' ),
		'archives'              => __( 'Item Archives', 'borasite' ),
		'parent_item_colon'     => __( 'Parent Item:', 'borasite' ),
		'all_items'             => __( 'All Items', 'borasite' ),
		'add_new_item'          => __( 'Add New Item', 'borasite' ),
		'add_new'               => __( 'Add New', 'borasite' ),
		'new_item'              => __( 'New Item', 'borasite' ),
		'edit_item'             => __( 'Edit Item', 'borasite' ),
		'update_item'           => __( 'Update Item', 'borasite' ),
		'view_item'             => __( 'View Item', 'borasite' ),
		'search_items'          => __( 'Search Item', 'borasite' ),
		'not_found'             => __( 'Not found', 'borasite' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'borasite' ),
		'featured_image'        => __( 'Featured Image', 'borasite' ),
		'set_featured_image'    => __( 'Set featured image', 'borasite' ),
		'remove_featured_image' => __( 'Remove featured image', 'borasite' ),
		'use_featured_image'    => __( 'Use as featured image', 'borasite' ),
		'insert_into_item'      => __( 'Insert into item', 'borasite' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'borasite' ),
		'items_list'            => __( 'Items list', 'borasite' ),
		'items_list_navigation' => __( 'Items list navigation', 'borasite' ),
		'filter_items_list'     => __( 'Filter items list', 'borasite' ),
	);
	$args = array(
		'label'                 => __( 'product', 'borasite' ),
		'description'           => __( 'Rezdy tours', 'borasite' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'rezdy_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'product_post_type', 0 );

// Register Custom Taxonomy
function taxonomy_rezdy_cat() {

	$labels = array(
		'name'                       => _x( 'Categories Rezdy', 'Categories Rezdy', 'borasite' ),
		'singular_name'              => _x( 'Categories Rezdy', 'Categories Rezdy', 'borasite' ),
		'menu_name'                  => __( 'Categories Rezdy', 'borasite' ),
		'all_items'                  => __( 'All Items', 'borasite' ),
		'parent_item'                => __( 'Parent Item', 'borasite' ),
		'parent_item_colon'          => __( 'Parent Item:', 'borasite' ),
		'new_item_name'              => __( 'New Item Name', 'borasite' ),
		'add_new_item'               => __( 'Add New Item', 'borasite' ),
		'edit_item'                  => __( 'Edit Item', 'borasite' ),
		'update_item'                => __( 'Update Item', 'borasite' ),
		'view_item'                  => __( 'View Item', 'borasite' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'borasite' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'borasite' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'borasite' ),
		'popular_items'              => __( 'Popular Items', 'borasite' ),
		'search_items'               => __( 'Search Items', 'borasite' ),
		'not_found'                  => __( 'Not Found', 'borasite' ),
		'no_terms'                   => __( 'No items', 'borasite' ),
		'items_list'                 => __( 'Items list', 'borasite' ),
		'items_list_navigation'      => __( 'Items list navigation', 'borasite' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'rezdy_cat', array( 'product' ), $args );

}
add_action( 'init', 'taxonomy_rezdy_cat', 0 );


