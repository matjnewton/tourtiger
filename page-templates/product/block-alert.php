<!-- alert_box -->
<?php if( get_row_layout() == 'primary_content_alert_box'):
	$primary_content_alert_headline = get_sub_field('primary_content_alert_headline');
	$primary_content_alert_text = get_sub_field('primary_content_alert_text');
	$primary_content_alert_color = get_sub_field('primary_content_alert_color');
	?>

	<div class="product_content_wrapper primary_content_alert_box" style="border: 2px solid <?php echo $primary_content_alert_color; ?>;">
		<div class="primary_content_alert_headline" style="color:<?php echo $primary_content_alert_color; ?>;"><?php echo $primary_content_alert_headline; ?></div>
		<div class="primary_content_alert_text"><?php echo $primary_content_alert_text; ?></div>
	</div> 

<?php endif; ?>