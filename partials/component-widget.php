<?php
/**
 * Component Widget
 */

/**
* Check whether current sidear block 
* has any content fields
*/
if ( have_rows( 'components', $post->ID ) ) :
?>

<div class="product-sidebar--block">
	
	<?php
	/**
	 * Loop block's components
	 */
	while ( have_rows( 'components', $post->ID ) ) :
		the_row();
		$layout    = get_row_layout();
		$magin_top = get_sub_field( 'margin_top' ) ? 'margin-top:' . get_sub_field( 'margin_top' ) . 'px;' : false;
		$magin_bottom = get_sub_field( 'margin_bottom' ) ? 'margin-bottom:' . get_sub_field( 'margin_bottom' ) . 'px;' : false;

		$style = ( $magin_top !== false || $magin_bottom !== false ) ? "style='{$magin_top}{$magin_bottom}'" : '';
		?>

		<div class="product-sidebar--block__item" <?=$style;?>>

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