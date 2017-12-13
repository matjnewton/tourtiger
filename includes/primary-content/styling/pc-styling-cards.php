<?php 

/**
 * Methods outside any Classes
 */

/* Register AJAX function count styles */
add_action( 'wp_ajax_get_pc_styles_count', 'get_pc_styles_count' );

/* Register AJAX function add style */
add_action( 'wp_ajax_pc_add_style', 'pc_add_style' );

/* Register AJAX function remove style */
add_action( 'wp_ajax_pc_remove_style', 'pc_remove_style' );

/* Enqueue AJAX functions on manage option page */
add_action( 'admin_print_footer_scripts', 'primary_content_styles_ajax_option_page', 99 );

/**
 * Function creates new style in database.
 * Calls after creating a table in database
 * And then someone clicks on button 'create card'
 *
 * $name - strung - table name without wp_prefix
 * 
 * @return intenger
 */
function pc_add_style( $name = '' ) {
	global $wpdb;

	$table_name = isset( $_POST['object'] ) ? $wpdb->prefix . $_POST['object'] : $wpdb->prefix . $name;

	$query = $wpdb->get_results( "INSERT INTO $table_name (id) VALUES (DEFAULT);" );

	wp_die();
}


/**
 * Function remove latest row from database.
 * Calls then someone clicks on button 'remove card'
 *
 * $name - strung - table name without wp_prefix
 * 
 * @return intenger
 */
function pc_remove_style( $name = '' ) {
	global $wpdb;

	$table_name = isset( $_POST['object'] ) ? $wpdb->prefix . $_POST['object'] : $wpdb->prefix . $name;

	$query = $wpdb->get_results( "DELETE FROM $table_name ORDER BY id DESC LIMIT 1;" );

	wp_die();
}


/**
 * Get count of rows in database
 *
 * $name - strung - table name without wp_prefix
 * 
 * @return intager 
 */
function get_pc_styles_count( $name = '' ) {
	global $wpdb;
	$table_name = $wpdb->prefix . $name;

	$query = $wpdb->get_results( "SELECT SQL_CALC_FOUND_ROWS `id` FROM $table_name;", ARRAY_N );

	return count($query);
}


/**
 * JavaScript functions 
 * for option page "Manage styles"
 */
function primary_content_styles_ajax_option_page() { 
	?>
	<script>
		jQuery(document).ready(function($) {

			/** 
			 * AJAX Request
			 */
			function request_styles( data, reload ) {
				jQuery.post( ajaxurl, data, function(response) {

					if ( reload ) { 
						location.reload();
					}

					return true;
				});
			}

			/**
			 * Add flexi style
			 */
			$('#add-style').click(function(){
				var object = $(this).attr('data-style-object');

				var data = {
					action: 'pc_add_style',
					object: object
				};

				request_styles( data, true );

				return false;
			});

			/**
			 * Remove flexi style
			 */
			$('#remove-style').click(function(){
				var object = $(this).attr('data-style-object');

				var data = {
					action: 'pc_remove_style',
					object: object
				};

				request_styles( data, true );

				return false;
			});
		});
	</script>
	<?php
}


/**
 * Return list of available styles 
 * in Primary Content Area counstructor
 * 
 * @param  string $name class slug
 * @return array       
 */
function get_pc_styles_list( $name = '' ) {
	$count = get_pc_styles_count( $name );
	$list = array();

	for ( $i = 1; $i <= $count; $i++ ) {
		$number = $name . '_style-' . create_style_prefix($i);
		$list[$number] = 'Style ' . $i;
	}  

	return $list;
}


/**
 * Call back which builds 
 * HTML of "Manage styles option page"
 */
function render_manage_option_page( $field = array() ) {

	$other_attributes = array( 'data-style-object' => $field['styling_group'] );

	$button_add = get_submit_button( 
		'Add style', 
		'primary', 
		'add-style', 
		false,
		$other_attributes
	);

	$count = get_pc_styles_count( $field['styling_group'] );

	if ( $count <= 1 ) 
		$other_attributes['disabled'] = 'disabled';

	$button_remove = get_submit_button( 
		'Remove latest group', 
		'delete', 
		'remove-style', 
		false,
		$other_attributes
	); 

?>

	<form metod="POST">
		<p><?php echo $button_add . ' ' . $button_remove; ?></p>
	</form>

<?php 
}

include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-cards.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-core.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-typography.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-blogcard.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-flexicard.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-contentcard.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-heroarea.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-productpage.php' );
include( get_stylesheet_directory() . '/includes/primary-content/styling/pc-class-styling-testimonial.php' );

?>