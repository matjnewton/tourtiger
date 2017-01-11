<?php 
	$tour_flexi_content = 'tour_pc-product';
	$tour_column_content_classes .= ' pc--c__product'; 

	if( get_sub_field( 'tour_pc-product--object' ) ) : 
		$post = get_sub_field( 'tour_pc-product--object' );
		setup_postdata( $post ); 

		$tour_flexiprod_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'full', true);
		$tour_flexiprod_tag_url = get_permalink();

		$title = get_the_title();
		$desc  = the_excerpt_max_charlength();
		$price = '$199';
		$label = 'View more';

		wp_reset_postdata();
	endif;
?>