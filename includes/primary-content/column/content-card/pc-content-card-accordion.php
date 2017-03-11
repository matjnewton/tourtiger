<?php 
$tour_content_content_classes .= ' pc--c__accordion'; 
$accordion_cound = $accordion_cound === null ? 0 : $accordion_cound + 1;
$accordion_id = $tour_selection_id . '-accordion-' . $accordion_cound;
?>


<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>"
>
	
	<script>
		!(function($){
			$(function(){
	            $('#<?php echo $accordion_id; ?>').on('click', function(){
	                $(this).toggleClass('is_active');
	                $(this).closest('.slick-slide').height("auto");
	                $(this).closest('.pc--r__scroll').slick('setOption', 'height', null, true);
	            });
			});
		})(jQuery);
	</script>

	<button id="<?php echo $accordion_id; ?>" class="pc--c__accordion--label">
		<span><?php echo get_sub_field( 'tour_pc-coltype--accordion_label' ); ?></span>
		<span class="pc--c__accordion--status pc--c__accordion--status_opened"><?php echo get_sub_field( 'tour_pc-coltype--accordion_open' ); ?></span>
		<span class="pc--c__accordion--status pc--c__accordion--status_closed"><?php echo get_sub_field( 'tour_pc-coltype--accordion_close' ); ?></span>
	</button>

	<div class="pc--c__accordion--paragraf">
		<?php echo get_sub_field( 'tour_pc-coltype--accordion_wysiwyg' ); ?>
	</div>

</div>