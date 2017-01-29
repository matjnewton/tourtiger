<?php 
	$tour_content_content_classes .= ' pc--form';
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_la' );
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_ti' );
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_le' );

	$form_id = get_sub_field( 'tour_pc-coltype--form_ob' );
?>

<div class="<?php echo $tour_content_content_classes; ?>">

	<?php echo do_shortcode( '[gravityform id="' . $form_id . '" title="true" description="true"]' ); ?>

</div>