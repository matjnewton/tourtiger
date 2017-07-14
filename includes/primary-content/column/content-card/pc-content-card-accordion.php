<?php 
$rand = generateRandomString(5);
$tour_content_content_classes .= ' pc--c__accordion'; 
$accordion_cound = $accordion_cound === null ? 0 : $accordion_cound + 1;
$accordion_id = $selection_id . '-accordion-' . $rand;
?>


<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>"
>
	<script>
		(function(factory) {
		    'use strict';
		    if (typeof define === 'function' && define.amd) {
		        define(['jquery'], factory);
		    } else if (typeof exports !== 'undefined') {
		        module.exports = factory(require('jquery'));
		    } else {
		        factory(jQuery);
		    }

		}(function($) {
			$(function(){
	            $('#<?php echo $accordion_id; ?>').click(function(e){
	            	e.preventDefault();
	                $(this).toggleClass('is_active');
	                $(this).closest('.slick-slide').height("auto");
	                $(this).closest('.pc--r__scroll').slick('setOption', 'height', null, true);
	                return false;
	            });
			});
		}));
	</script>

	<button id="<?php echo $accordion_id; ?>" class="pc--c__accordion--label">
		<span class="pc--c__accordion--label_question"><?php echo get_sub_field( 'tour_pc-coltype--accordion_label' ); ?></span>

		<?php if ( get_sub_field( 'tour_pc-coltype--accordion_open' ) ) :  ?>
			<span class="pc--c__accordion--status pc--c__accordion--status_opened">
				<span class="pc--c__accordion--status__text">
					<?php echo get_sub_field( 'tour_pc-coltype--accordion_open' ); ?>
				</span>
			</span>
		<?php endif; ?>

		<?php if ( get_sub_field( 'tour_pc-coltype--accordion_close' ) ) :  ?>
			<span class="pc--c__accordion--status pc--c__accordion--status_closed">
				<span class="pc--c__accordion--status__text">
					<?php echo get_sub_field( 'tour_pc-coltype--accordion_close' ); ?>
				</span>
			</span>
		<?php endif; ?>
	</button>

	<div class="pc--c__accordion--paragraf">
		<?php echo get_sub_field( 'tour_pc-coltype--accordion_wysiwyg' ); ?>
	</div>

</div>