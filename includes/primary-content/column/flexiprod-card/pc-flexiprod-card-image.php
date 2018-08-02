<?php 
/**
 * Flexi prod card: Image 
 */

/* Common */
$tour_flexiprod_image_url      = $tour_flexi_content == 'tour_pc-flexi' ? get_sub_field( 'tour_pc-flexi--image-add' ) : '';
$tour_flexiprod_image_height   = get_sub_field( $tour_flexi_content . '--image-height' );
$tour_flexiprod_image_align    = get_sub_field( $tour_flexi_content . '--image-aligment' );
$title                         = get_sub_field( 'tour_pc-flexi--image-row__title' );
$desc                          = get_sub_field( 'tour_pc-flexi--image-row__description' );
$price                         = get_sub_field( 'tour_pc-flexi--image-row__price' );
$label                         = get_sub_field( 'tour_pc-flexi--image-row__label' );
$padding_top                   = $price && in_array( 'price', $flexi_attr['image'] ) ? 'padding-top-mob' : '';

/* Url */
if ( $tour_flexiprod_tag_url ) {
	$image_tag_open = 'a href="' . $tour_flexiprod_tag_url . '"';
	$image_tag_close = 'a';
} else {
	$image_tag_open = 'div';
	$image_tag_close = 'div';
}

/* Set image sizes */
switch ($tour_flexiprod_image_height) :
	case 'pc--c__b-image--tall':
	case 'pc--c__b-image--really-tall':
		$thumb_height = $thumb_width * 1.4;
		$thumb_width = $thumb_width * 1.4;
		break;
	default:
		$thumb_height = $thumb_height_normal;
		break;
endswitch;

/* Classes */
$tour_flexiprod_image_classes  = 'pc--c__b-image fc_style--image pc--crop__thumb';
$tour_flexiprod_image_classes .= ' ' . $tour_flexiprod_image_height;
$tour_flexiprod_image_classes .= ' ' . $tour_flexiprod_image_classes;

/* Tags */
$open  = "<{$image_tag_open} class='{$tour_flexiprod_image_classes}'>";
$close = "</{$image_tag_close}>";

/**
 * Open tag
 */
echo $open;

	/**
	 * Print image
	 */
	pc_image( $tour_flexiprod_image_url, $thumb_width, $thumb_height, false, array( 'class' => 'pc--c__b-image_thumb' ) );

	/**
	 * Print content
	 */
	$key = 'image';
	include get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-image-content.php';
	

	/**
	 * Print hover content
	 */
	if ( have_rows( 'hover-content' ) && ! wp_is_mobile() ) :
		while ( have_rows( 'hover-content' ) ) :
			the_row();

			/**
			 * Print hover content
			 */
			$key   = 'hover';
			$title = get_sub_field( 'title' );
			$desc  = get_sub_field( 'description' );
			$price = get_sub_field( 'price' );
			$label = get_sub_field( 'label' );

			echo '<div class="pc--c__flexicard--hover">';
				include get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-flexiprod-card-image-content.php';
			echo '</div>';
		endwhile;
	endif;

/**
 * Close tag image
 */
echo $close; 
