<?php 

	$tour_button_label = get_sub_field( 'tour_pc-coltype--button_label' );
	$tour_button_align = get_sub_field( 'tour_pc-coltype--button_align' );
	$tour_button_supone = get_sub_field( 'tour_pc-coltype--button_sup-one' );
	$tour_button_suptwo = get_sub_field( 'tour_pc-coltype--button_sup-two' ); 
	$tour_content_content_classes .= ' pc--c__button';
	$tour_content_content_styles .= ' text-align:' . $tour_button_align;
	?>

	<div 
		class="<?php echo $tour_content_content_classes; ?>" 
		style="<?php echo $tour_content_content_styles; ?>">
		
		<button 
			data-supone="<?php echo $tour_button_supone; ?>" 
			data-suptwo="<?php echo $tour_button_suptwo; ?>"><?php echo $tour_button_label; ?></button>

	</div>