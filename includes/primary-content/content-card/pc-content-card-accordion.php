<?php
	include_once( get_stylesheet_directory() . '/includes/primary-content/content-card/pc-content-card-accordion-script.php' );

	$tour_content_content_classes .= ' pc--c__accordion';
?>

<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>"
>
	
	<button class="pc--c__accordion--label">
		<span><?php echo get_sub_field( 'tour_pc-coltype--accordion_label' ); ?></span>
		<span class="pc--c__accordion--status pc--c__accordion--status_opened"><?php echo get_sub_field( 'tour_pc-coltype--accordion_open' ); ?></span>
		<span class="pc--c__accordion--status pc--c__accordion--status_closed"><?php echo get_sub_field( 'tour_pc-coltype--accordion_close' ); ?></span>
	</button>

	<div class="pc--c__accordion--paragraf">
		<?php echo get_sub_field( 'tour_pc-coltype--accordion_wysiwyg' ); ?>
	</div>

</div>