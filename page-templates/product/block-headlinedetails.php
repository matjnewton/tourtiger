<?php
// headline_details layout
if( get_row_layout() == 'primary_content_headline_details'):
	$details_options = get_sub_field('primary_content_headline_details_options');
	if($details_options) : ?>
		<div class="product_content_wrapper product_title_area_details">
			<ul class="primary_content_headline_details_options customstyle">
				<?php foreach($details_options as $row) { ?>
					<li style="width:<?php echo round(100/count($details_options)-1); ?>%;">
						<i class="fa <?php echo $row['primary_content_headline_details_icon']; ?>"></i>
						<span><?php echo $row['primary_content_headline_details_text']; ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
	<?php endif; //end repeter
endif; // end detail layout ?> 