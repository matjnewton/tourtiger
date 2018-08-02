<!-- sub_headline -->
<?php if( get_row_layout() == 'primary_content_sub_headline'):
	$primary_content_sub_headline_text = get_sub_field('primary_content_sub_headline_text');
	$primary_content_sub_headline_seo_tag = get_sub_field('primary_content_sub_headline_seo_tag');
	?>

	<div class="product_content_wrapper primary_content_sub_headline" >
		<<?php echo $primary_content_sub_headline_seo_tag; ?> class="primary_content_subhead customstyle"><?php echo $primary_content_sub_headline_text; ?></<?php echo $primary_content_sub_headline_seo_tag; ?>>
	</div> 

<?php endif; ?> 