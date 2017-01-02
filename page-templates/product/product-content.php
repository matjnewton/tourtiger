
<?php global $primary_content_options_count; ?>
<?php 
	$integrate_xola_with_this_website = get_field('integrate_xola_with_this_website', 'option');
	$integrate_rezdy_with_this_website = get_field('rezdy', 'option');
?>
<!-- primary_content_special_content -->
<?php if( have_rows('primary_content_options') ): $primary_content_options_count = 0; ?>
	<?php while ( have_rows('primary_content_options') ) : the_row(); $primary_content_options_count++; ?>
		<?php get_template_part( 'page-templates/product/block-headline' ); ?>
		<?php get_template_part( 'page-templates/product/block-headlinedetails' ); ?>
		<?php get_template_part( 'page-templates/product/block-gallery-slider' ); ?>
		<?php get_template_part( 'page-templates/product/block-spacebreak' ); ?>
		<?php get_template_part( 'page-templates/product/block-specialcontent' ); ?>
		<?php get_template_part( 'page-templates/product/block-highlights' ); ?>
		<?php get_template_part( 'page-templates/product/block-tripdetails' ); ?>
		<?php get_template_part( 'page-templates/product/block-contenteditor' ); ?>
		<?php get_template_part( 'page-templates/product/block-contentcard' ); ?>
		<?php get_template_part( 'page-templates/product/block-expandablecontent' ); ?>
		<?php get_template_part( 'page-templates/product/block-imagesvideo' ); ?>
		<?php get_template_part( 'page-templates/product/block-testimonials' ); ?>
		<?php get_template_part( 'page-templates/product/block-alert' ); ?>
		<?php get_template_part( 'page-templates/product/block-subheadline' ); ?>
		<?php get_template_part( 'page-templates/product/block-horizontalline' ); ?>
		<?php //get_template_part( 'page-templates/product/block-availabilitychecker' ); ?>
		<?php 
			if ($integrate_rezdy_with_this_website) {
				get_template_part( 'page-templates/product/block-availabilitychecker' );
			}
			else if ($integrate_xola_with_this_website) {
				get_template_part( 'page-templates/product/block-availabilitychecker_xola' );
			}
		?>
    <?php endwhile; ?>
<?php endif; ?>

<!-- include custom style -->
<?php get_template_part( 'page-templates/product/global-style' ); ?>



<!-- test -->




