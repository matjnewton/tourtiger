<?php 


/**
 * Sections AJAX auto-loading
 */
function pc_show_more_sections() {
	
	if ( !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'pc_field_nonce' ) ) {
		echo json_encode( array( 'content' => '<!-- server error -->', 'more' => true, 'offset' => 1, 'debug' => 'ajax-error' ) );
		exit;
	}
	// make sure we have the other values
	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		return;
	}

	$show = 1; 
	$start = $_POST['offset'];
	$end = $start + $show;
	$post_id = $_POST['post_id'];
	$ajax_form_id = false;

	ob_start();

	if ( have_rows( 'tour_primary-content', $post_id ) ) :
		$total         = count( get_field( 'tour_primary-content', $post_id ) );
		$count         = 0;
		$section_count = 0;

		include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-dependences.php' );

		while ( have_rows( 'tour_primary-content', $post_id ) ) :
			the_row();

			if ( !defined('PCA_AJAX_LOADING_CONTENT') )
				define( 'PCA_AJAX_LOADING_CONTENT', true );

			if ( $count < $start ) {
				$count++;
				$section_count++;
				continue;
			}

			include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-parameters.php' );

			$count++;
			$section_count++;
			if ( $count == $end )
				break; 
		endwhile;
	endif;

	$content = ob_get_clean();

	$more = false;
	if ($total > $count) $more = true;

	echo json_encode( array( 'content' => $content, 'more' => $more, 'offset' => $end, 'debug' => 'success' ) );
	exit;
} 
add_action('wp_ajax_pc_show_more_sections', 'pc_show_more_sections');
add_action('wp_ajax_nopriv_pc_show_more_sections', 'pc_show_more_sections');



/**
 * Rows AJAX manual-loading
 */
function show_more_rows() {

	if ( !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'nonce' ) ) {
		echo json_encode( array( 'content' => '', 'rows'  => 0, 'more' => 0, 'message' => 'Nonce error' ) );
		exit;
	}

	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		echo json_encode( array( 'content' => '', 'rows'  => 0, 'more' => 0, 'message' => 'Post id or offset error' ) );
		return;
	}
   
   	/**
   	 * Grab the common values
   	 */
	$total         = $_POST['total_rows'];
	$initial       = $_POST['init_rows'];
	$lack_rows     = $_POST['lack_rows'];
	$offset        = $_POST['offset'] != 'all' ? $_POST['offset'] : $lack_rows;
	$start         = $initial;
	$end           = $start + $offset;
	$post_id       = $_POST['post_id'];
	$more          = false;
	$section_id    = $_POST['section_id'];
	$section_count = 0;

	if ( !defined('PCA_AJAX_LOADING_CONTENT') )
		define( 'PCA_AJAX_LOADING_CONTENT', true );

	if ( !defined('PCA_AJAX_LOADING_ROW') )
		define( 'PCA_AJAX_LOADING_ROW', true );


	/**
	 * From this point all echo and print_r calls 
	 * will be writting to $content 
	 */
	ob_start();


	/**
	 * Lop sections. 
	 * It's nessesarily to be able to get Row loop 
	 */
	while ( have_rows( 'tour_primary-content', $post_id ) ) :
		the_row();


		/**
		 * Find a section from which was sent AJAX request.
		 * Sections before will be ignored, and next sections fill be left.
		 */
		if ( $section_count == $section_id ) :
			$row_count    = 0;
			$output_count = 0;


			/**
			 * Loop rows. However we get just those rows 
			 * wich matched to followign criteria:
			 * - aren't displayed on the front-end part so far.
			 * - if $_POST['offset'] == 'all' -
			 * 		- return lack rows 
			 * 	 else 
			 * 	    - return just one more
			 */
			while ( have_rows( 'tour_pc-rows' ) ) :
				the_row();
				$row_count++;

				if ( $row_count > $start ) :
					$output_count++;
					include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-loop.php' );
				endif;

				/**
				 * After grabbing all needed rows, stop Rows loop
				 */
				if ( $row_count == $end || $offset == $output_count ) 
					break; 
			endwhile;
	

			/**
			 * If there are rows user can request
			 * allow him to use 'Show more' button on front-end
			 */
			if ( $total > $row_count ) 
				$more = true;

		endif;

		$section_count++;
	endwhile;

	/**
	 * Collect all calls in one variable 
	 * to be able to return them to front-end
	 */
	$content = ob_get_clean();


	/**
	 * Add count of loaded rows 
	 * to count of earlier existed rows
	 */
	$initial += $output_count;

	/**
	 * JSON which will be used in AJAX responce 
	 * @var array
	 */
	$json = array( 
		'content' => $content, # HTML
		'rows'    => $initial, # Count of rows which exist on front end 
		'more'    => $more,    # Whether to return 'Show more' button or not
		'message' => 'Successful!' #'Request is successfull!' 
	);

	echo json_encode( $json );
	exit;
}
add_action('wp_ajax_show_more_rows', 'show_more_rows');
add_action('wp_ajax_nopriv_show_more_rows', 'show_more_rows');
	
?>