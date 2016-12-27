<?php 
	$tour_content_content_classes .= ' pc--c__instagram';
	$tour_content_content_classes .= ' pc--c__instagram-' . get_sub_field( 'tour_pc-coltype--gallery_count' ); 

	if ( get_sub_field( 'tour_pc-coltype--instagram_account' ) ) {
		$account = get_sub_field( 'tour_pc-coltype--instagram_account' );
	} else {
		$account = '';
	}

	if ( get_sub_field( 'tour_pc-coltype--instagram_hash' ) ) {
		$hash = get_sub_field( 'tour_pc-coltype--instagram_hash' );
	} else {
		$hash = '';
	}
?>


<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>">

	<?php echo do_shortcode( '[true_instagram 
		user="' . $account . '" 
		tag="' . $hash . '" 
		heading="no" 
		scroll="no" 
		w="100%" 
		h="'. get_sub_field( 'tour_pc-coltype--instagram' ) . 'px" 
		size="'. get_sub_field( 'tour_pc-coltype--instagram_size' ) . '"
	]' ); ?>

</div>