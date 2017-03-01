<?php

if ( $count == false ) $count = 0;

$tour_section_bg = get_sub_field( 'tour_pc-bg__select' );
$tour_section_classes = 'pc--s pc--s_id-' . $count . ' ' . get_sub_field( 'tour_pc-section_pad' );
$tour_section_styles = '';

if ( $tour_section_bg == 'image' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-image.php' );
} elseif ( $tour_section_bg == 'texture' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-texture.php' );
} elseif ( $tour_section_bg == 'color' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-color.php' );
} elseif ( $tour_section_bg == 'map' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-map.php' );
} elseif ( $tour_section_bg == 'video' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-video.php' );
} elseif ( $tour_section_bg == 'video-embed' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-embed.php' );
}

if ( get_sub_field( 'tour_pc-td--select' ) != 'none' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-top-divider.php' );
}

if ( get_sub_field( 'tour_pc-bd--select' ) != 'none' ) {
	include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-define-bottom-divider.php' );
}

?>

<section 
	id="pc--s_id-<?php echo $count; ?>"
	class="<?php echo $tour_section_classes; ?>"
	style="<?php echo $tour_section_styles; ?>">

	<?php 

	if ( get_sub_field( 'tour_pc-td--select' ) != 'none' ) {
		include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-top-divider.php' );
	}

	if ( get_sub_field( 'tour_pc-bd--select' ) != 'none' ) {
		include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-bottom-divider.php' );
	}

	if ( $tour_section_bg == 'map' ) {
		include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-map.php' );
	} elseif ( $tour_section_bg == 'video' ) {
		include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-video.php' );
	} elseif ( $tour_section_bg == 'video-embed' ) {
		include( get_stylesheet_directory() . '/includes/primary-content/section/pc-section-insert-embed.php' );
	}

	if ( have_rows( 'tour_pc-rows' ) ) { 
		include( get_stylesheet_directory() . '/includes/primary-content/row/pc-row-loop.php' );
	}

	$section_count++; 

	?>

</section> 