<?php 


add_action('wp_ajax_pc_show_more_sections', 'pc_show_more_sections');
add_action('wp_ajax_nopriv_pc_show_more_sections', 'pc_show_more_sections');

function pc_show_more_sections() {
	
	if ( !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'pc_field_nonce' ) ) {
		echo json_encode( array( 'content' => 'error', 'more' => true, 'offset' => 1 ) );
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
		$total = count( get_field( 'tour_primary-content', $post_id ) );
		$count = 0;

		include( get_stylesheet_directory() . '/includes/primary-content/dependences/pc-dependences.php' );

		while ( have_rows( 'tour_primary-content', $post_id ) ) :
			the_row();

			if ( !defined('PCA_AJAX_LOADING_CONTENT') )
				define( 'PCA_AJAX_LOADING_CONTENT', true );

			if ( $count < $start ) {
				$count++;
				continue;
			}

			include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-parameters.php' );

			$count++; 
			if ($count == $end) break; 
		endwhile;
	endif;

	$content = ob_get_clean();

	$more = false;
	if ($total > $count) $more = true;

	echo json_encode( array( 'content' => $content, 'more' => $more, 'offset' => $end, 'new_form' => $ajax_form_id ) );
	exit;
} 

	
?>