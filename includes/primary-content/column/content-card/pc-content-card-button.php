<?php 

	$tour_button_label = get_sub_field( 'tour_pc-coltype--button_label' );
	$tour_button_action = get_sub_field( 'tour_pc-coltype--button_action' );
	$tour_button_supone = get_sub_field( 'tour_pc-coltype--button_sup-one' );
	$tour_button_suptwo = get_sub_field( 'tour_pc-coltype--button_sup-two' );
	$tour_content_content_classes .= ' pc--c__button ' . get_sub_field( 'tour_pc-coltype--button_align' );
	$attribute = get_sub_field('button_target') ? 'target="_blank"' : '';
	?>

	<div 
		class="<?php echo $tour_content_content_classes; ?>" 
		style="<?php echo $tour_content_content_styles; ?>">
		
		<div class="pc--c__button-support">
			<?php if ( $tour_button_supone ) echo '<h3 class="pc--c__button-supone">' . $tour_button_supone . '</h3>'; ?>
			<?php if ( $tour_button_suptwo ) echo '<p class="pc--c__button-suptwo">' . $tour_button_suptwo . '</p>'; ?>
		</div>

		<a class="pc--c__button-link" <?=$attribute;?> href="<?php echo $tour_button_action; ?>"><?php echo $tour_button_label; ?></a>

	</div>