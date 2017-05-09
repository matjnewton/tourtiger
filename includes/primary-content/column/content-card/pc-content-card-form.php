<?php 
	$tour_content_content_classes .= ' pc--form';
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_la' );
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_ti' );
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_le' );

	$titles = get_sub_field( 'tour_pc-coltype--form_ti' ) != 'pc--form__head-hide';
	$titles = (string)$title;

	$form_id = get_sub_field( 'tour_pc-coltype--form_ob' );
?>

<div id="pca_form_id-<?php echo $form_id; ?>" class="<?php echo $tour_content_content_classes; ?>">

	<?php

	if ( defined('PCA_AJAX_LOADING_CONTENT') ) {

		echo do_shortcode( '[gravityform action="ajax" id="' . $form_id . '" title="<?=$titles;?>" description="<?=$titles;?>"]' );

	} else {

		echo do_shortcode( '[gravityform id="' . $form_id . '" title="<?=$titles;?>" description="<?=$titles;?>"]' );

	}


	?>

</div>