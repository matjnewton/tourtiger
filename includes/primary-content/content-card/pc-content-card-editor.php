<?php 

	$tour_editor = get_sub_field( 'tour_pc-coltype--editor-editor' ); 
	$tour_content_content_classes .= ' pc--c__editor'; ?>

	<div 
		class="<?php echo $tour_content_content_classes; ?>" 
		style="<?php echo $tour_content_content_styles; ?>">
		
		<?php echo $tour_editor; ?>

	</div>