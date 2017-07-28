<?php
/**
 * Component Widget
 */

/**
* Check whether current sidear block 
* has any content fields
*/
if ( have_rows( 'components' ) ) :
?>

<div class="product-sidebar--block">
	
	<?php
	/**
	 * Loop block's components
	 */
	while ( have_rows( 'components' ) ) :
		the_row();
		$layout = get_row_layout();
		?>

		<div class="product-sidebar--block__item">

			<?php
			/**
			 * Get component
			 */
			get_template_part( 'partials/sidebar', $layout );
			?>

		</div>

		<?php
	endwhile;
	?>

</div>

<?php
endif;

?>