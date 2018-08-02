<?php 

	$tour_subheadline_title = get_sub_field( 'tour_pc-coltype--subheadline_text' );
	$tour_subheadline_tag   = get_sub_field( 'tour_pc-coltype--subheadline_seo-tag' );
	$tour_content_content_classes .= ' pc--c__subheadline'; ?>

	<div 
		class="<?php echo $tour_content_content_classes; ?>" 
		style="<?php echo $tour_content_content_styles; ?>">
		
		<<?php echo $tour_subheadline_tag; ?>>
			<?php echo $tour_subheadline_title; ?>
		</<?php echo $tour_subheadline_tag; ?>>

	</div>