
<!-- headline layout -->
<?php if( get_row_layout() == 'primary_content_headline'):
	$primary_content_headline_title = get_sub_field('primary_content_headline_title');
 	// $product_headline_font = get_sub_field('product_headline_font');
	// $product_headline_color = get_sub_field('product_headline_color');
	// $product_headline_size = get_sub_field('product_headline_size');
	$product_headline_seo_tag = get_sub_field('product_headline_seo_tag');
	?>
	<div class="product_content_wrapper product_title_area customstyle">
		<?php //echo '<'.$product_headline_seo_tag.' style="font-family:'.$product_headline_font["font"].'; color:'.$product_headline_color.';">'.get_the_title().'</'.$product_headline_seo_tag.'>'; ?>
		<?php echo '<'.$product_headline_seo_tag.' >'.$primary_content_headline_title.'</'.$product_headline_seo_tag.'>'; ?>
	</div>
	<?php
endif; 