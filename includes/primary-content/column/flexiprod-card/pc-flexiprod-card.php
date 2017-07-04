<?php 
/**
 * Name: Flexi Card
 * One of content types which can be added to column. 
 */

$fc_style = get_sub_field( 'tour_flexiprod-style' );
$tour_column_content_classes .= ' ' . $fc_style;

$flexi_attr = array ();

while ( have_rows( $fc_style, 'option' ) ) : the_row();
	
	/**
	 * $flexi_attr['image'] -> array can contain these strings: title, desc, price, label
	 * $flexi_attr['co'] and $flexi_attr['ct'] -> array can contain these strings: title, desc, price, label
	 * $flexi_attr['co_btn'] and $flexi_attr['ct_btn'] -> can be one of strings: left, center, right, right-d
	 * 
	 * @var array
	 */
	$flexi_attr = array(
		'image'  => get_sub_field( 'fc_style__imdis' ),
		'hover'  => get_sub_field( 'fc_style__imdish' ),
		'co'     => get_sub_field( 'fc_style__co' ),
		'ct'     => get_sub_field( 'fc_style__ct' ),
		'co_btn' => get_sub_field( 'fc_style__co_butt_pos' ),
		'ct_btn' => get_sub_field( 'fc_style__ct_butt_pos' ),
		'prefix' => '',
		'name' => ''
	); 

endwhile;

/**
 * Define content type. Can be Flexi or Product card
 * Set variables.
 *
 * $tour_flexi_content variable will help us to get necessarily fields
 */

if ( get_row_layout() == 'tour_pc-flexi' ) {

	$tour_flexi_content = 'tour_pc-flexi';

	$tour_column_content_classes .= ' pc--c__flexi'; 
	$tour_flexiprod_image_url = get_sub_field( 'tour_pc-flexi--image-add' );
	$tour_flexiprod_tag_url = get_sub_field( 'tour_pc-flexi--url' );

} elseif ( get_row_layout() == 'tour_pc-product' ) {

	$tour_flexi_content = 'tour_pc-product';

	$tour_column_content_classes .= ' pc--c__product'; 

	if( get_sub_field( 'tour_pc-product--object' ) ) : 
		$post = get_sub_field( 'tour_pc-product--object' );
		setup_postdata( $post ); 

		$tour_flexiprod_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'full', true);
		$tour_flexiprod_tag_url = get_permalink();

		$title = get_the_title();
		$desc  = the_excerpt_max_charlength();
		$price = '$199';
		$label = 'View more';

		wp_reset_postdata();
	endif;

}

?>

<div
	class="<?php echo $tour_column_content_classes; ?>" 
	style="<?php echo $tour_column_content_styles; ?>">
	
		<?php if ( have_rows( $tour_flexi_content . '--content' ) ) :
		
			if ( !in_array( $fc_style, $fc_styles_arr ) && !defined('PCA_AJAX_LOADING_ROW') ) {
				$fc_styles_arr[] = $fc_style;
				get_pc_flexiprod_card_style( $fc_style );
			}
		
			while ( have_rows( $tour_flexi_content . '--content' ) ) : 
				the_row();

				if ( get_row_layout() == $tour_flexi_content . '--content--image' ) {
				
					/**
					 * Get Image template
					 */
					include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-image.php' );

				} else { 

					if ( get_row_layout() == $tour_flexi_content . '--content_first' ) {

						$flexi_attr['prefix'] = 'co';
						$prefix = 'co';
						$flexi_attr['name'] = 'first';

					} elseif ( get_row_layout() == $tour_flexi_content . '--content_second' ) {

						$flexi_attr['prefix'] = 'ct';
						$prefix = 'ct';
						$flexi_attr['name'] = 'second';

					}

					$flexi_attr['button'] = $flexi_attr[$prefix . '_btn'];

					/**
					 * Get First and Second Content type template
					 */
					include( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-content.php' );

				}

			endwhile;

		endif; ?>

</div>
