<?php 
$fc_style = get_sub_field( 'tour_flexiprod-style' );
$tour_column_content_classes .= ' ' . $fc_style . ' ';

while ( have_rows( $fc_style, 'option' ) ) : the_row();

	$show_image = get_sub_field( 'fc_style__imdis' );
	$show_co = get_sub_field( 'fc_style__co' ); 
	$show_ct = get_sub_field( 'fc_style__ct' ); 

	$fc_style__co_butt_pos = get_sub_field( 'fc_style__co_butt_pos' );
	$fc_style__ct_butt_pos = get_sub_field( 'fc_style__ct_butt_pos' );

endwhile;

if ( get_row_layout() == 'tour_pc-flexi' ) {

	include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-flexi-card.php' );

} elseif ( get_row_layout() == 'tour_pc-product' ) {

	include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-product-card.php' );

}

?>

<div
	class="<?php echo $tour_column_content_classes; ?>" 
	style="<?php echo $tour_column_content_styles; ?>">
	
		<?php  if ( have_rows( $tour_flexi_content . '--content' ) ) :
		
			if ( !in_array( $fc_style, $fc_styles_arr ) ) {
				$fc_styles_arr[] = $fc_style;
				get_pc_flexiprod_card_style( $fc_style );
			}
		
			while ( have_rows( $tour_flexi_content . '--content' ) ) : the_row();

				if ( get_row_layout() ==  $tour_flexi_content . '--content--image' ) :
				
					include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-image.php' );

				elseif ( get_row_layout() ==  $tour_flexi_content . '--content_first' ) : 

					include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-first.php' );

				elseif ( get_row_layout() ==  $tour_flexi_content . '--content_second' ) : 

					include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-second.php' );

				endif;

			endwhile;

		endif; ?>

</div>
