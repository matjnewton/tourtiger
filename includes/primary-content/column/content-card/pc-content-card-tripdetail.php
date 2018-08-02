<?php 
$tour_content_content_classes .= ' pc--c__tripdetail'; ?>

<div 
	class="<?php echo $tour_content_content_classes; ?>" 
	style="<?php echo $tour_content_content_styles; ?>">

	<?php

	if ( get_sub_field( 'tt_details_headline' ) ) : 
		?>
			<h3 class="pc--c__tripdetail--headline"><?php echo get_sub_field( 'tt_details_headline' ); ?></h3>
		<?php 
	endif; 

	if ( have_rows( 'tt_details_opt' ) ) : ?>

		<ul class="pc--c__tripdetail--list">

		<?php
		/**
		 * Output items
		 */
		$i = 1;
		while ( have_rows( 'tt_details_opt' ) ) : 
			the_row();
			$label          = get_sub_field( 'tt_details_label' );
			$detail         = get_sub_field( 'tt_details_detail' );
			$is_icon        = get_sub_field( 'tt_details_icon' );
			$icon           = get_sub_field( 'tt_details_i' );
			$is_additional  = get_sub_field( 'tt_details_addi' );
			$link_label     = $is_additional ? '<a id="tripdet-link-'.$i.'" href="javascript:">' . get_sub_field( 'tt_details_lile' ) . '</a>' : '';
			$detail_content = get_sub_field( 'tt_details_content' );
			?>

				<li class="pc--c__tripdetail--item">
					<h4 class="pc--c__tripdetail--label">
						<?php

						echo $is_icon ? "<i class='fa {$icon}'></i> " : '';
						echo $label ? "<span>{$label}</span>" : '';

						?>
					</h4>

					<div class="pc--c__tripdetail---details wysiwyg">
						<p class="pc--c__tripdetail---primary"><?php echo $detail . ' ' . $link_label; ?></p>
						
						<?php if ($is_additional && $detail_content) : ?>
							<div id="tripdet-<?php echo $i; ?>" class="pc--c__tripdetail---additional"><?php echo $detail_content; ?></div>
							<script type="text/javascript">
								!(function($){
									$(function(){
										$('#tripdet-link-<?php echo $i; ?>').click(function(){
											$('#tripdet-<?php echo $i; ?>').slideToggle(200, function(){
												$(this).closest('.pc--r__scroll').slick('setOption', 'height', null, true);
											});
										});
									});
								})(jQuery);
							</script>
						<?php endif; ?>
					</div>
				</li>
			
			<?php
			$i++;
		endwhile; 
		?>

		</ul>

		<?php
	endif;

	?>

</div>