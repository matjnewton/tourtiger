<?php 
	$tour_content_content_classes .= ' pc--c__headline'; ?>

	<div 
		class="<?php echo $tour_content_content_classes; ?>" 
		style="<?php echo $tour_content_content_styles; ?>">
		<<?php echo get_sub_field( 'tour_pc-coltype--headline_seo-tag' ); ?>>
			<?php echo get_sub_field( 'tour_pc-coltype--headline_text' ); ?>
		</<?php echo get_sub_field( 'tour_pc-coltype--headline_seo-tag' ); ?>>
	</div>