<?php 
	$tour_instagram_pull = get_sub_field( 'tour_pc-coltype--instagram' );
	$tour_instagram_what_pull = get_sub_field( 'tour_pc-coltype--gallery_what' );
	$tour_instagram_id = get_sub_field( 'tour_pc-coltype--instagram_account' );
	$tour_instagram_id = 'self';
	$tour_instagram_hash = get_sub_field( 'tour_pc-coltype--instagram_hash' );
	$tour_content_content_classes .= ' pc--c__instagram';
	$tour_content_content_classes .= ' pc--c__instagram-' . get_sub_field( 'tour_pc-coltype--gallery_count' ); ?>

<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>">

		<!-- Instagramm -->

	<?php 

	/*
	 * Enter token
	 */
	$token = 'e90694d035b351249ee69fa8f545010d80cec05f';

	$instagram_cnct = curl_init(); // URL Connect

	if ( $tour_instagram_what_pull == 'id' ) {
		curl_setopt( $instagram_cnct, CURLOPT_URL, "https://api.instagram.com/v1/users/" . $tour_instagram_id . "/media/recent?access_token=" . $token ); 
	} elseif ( $tour_instagram_what_pull == 'hash' ) {
		curl_setopt( $instagram_cnct, CURLOPT_URL, "https://api.instagram.com/v1/tags/" . $tour_instagram_hash . "/media/recent?access_token=" . $token );
	}
		

	curl_setopt( $instagram_cnct, CURLOPT_RETURNTRANSFER, 1 ); // please return response
	curl_setopt( $instagram_cnct, CURLOPT_TIMEOUT, 15 );
	$media = json_decode( curl_exec( $instagram_cnct ) ); // get and de-code data JSON
	curl_close( $instagram_cnct ); // close connecting
	 
	/*
	 * Picture size
	 */
	$size = 200;

	foreach( array_slice($media->data, 0, $tour_instagram_pull) as $data ) { ?>

		<a href="<?php echo $data->link; ?>" target="_blank">
			<img 
				src="<?php echo $data->images->low_resolution->url; ?>" 
				height="<?php echo $size; ?>" 
				width="<?php echo $size; ?>"
				alt="<?php echo $data->caption->text; ?>"
			/>
		</a>

	<?php } ?>

</div>