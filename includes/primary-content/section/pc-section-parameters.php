<?php

if ( $count == false || $count === null ) $count = 0;

$paddings = get_sub_field( 'tour_pc-section_pad' ); 

if ( count( $paddings ) > 0 ) {
	$paddings_css = '';

	foreach ( $paddings as $id => $class ) {
		$paddings_css .= ' ' . $class;
	}
} else {
	$paddings_css = ' pc--s__no-paddings';
}

$tour_section_bg = get_sub_field( 'tour_pc-bg__select' );
$tour_section_classes = 'pc--s pc--s_id-' . $count . $paddings_css;
$tour_section_styles = '';
$tour_section_attr = '';
$tour_selection_id = 'pc--s_id-' . $count;

if ( $tour_section_bg == 'image' ) {
	include( PCA_DIR . '/section/pc-section-define-image.php' );
} elseif ( $tour_section_bg == 'texture' ) {
	include( PCA_DIR . '/section/pc-section-define-texture.php' );
} elseif ( $tour_section_bg == 'color' ) {
	include( PCA_DIR . '/section/pc-section-define-color.php' );
} elseif ( $tour_section_bg == 'map' ) {
	include( PCA_DIR . '/section/pc-section-define-map.php' );
} elseif ( $tour_section_bg == 'video' ) {
	include( PCA_DIR . '/section/pc-section-define-video.php' );
} elseif ( $tour_section_bg == 'video-embed' ) {
	include( PCA_DIR . '/section/pc-section-define-embed.php' );
}

if ( get_sub_field( 'tour_pc-td--select' ) != 'none' ) {
	include( PCA_DIR . '/section/pc-section-define-top-divider.php' );
}

if ( get_sub_field( 'tour_pc-bd--select' ) != 'none' ) {
	include( PCA_DIR . '/section/pc-section-define-bottom-divider.php' );
}

?>

<section 
	id="<?php echo $tour_selection_id; ?>"
	class="<?php echo $tour_section_classes; ?>"
	style="<?php echo $tour_section_styles; ?>"
	<?php echo $tour_section_attr; ?>>

	<?php 

	if ( get_sub_field( 'tour_pc-td--select' ) != 'none' ) {
		include( PCA_DIR . '/section/pc-section-insert-top-divider.php' );
	}

	if ( get_sub_field( 'tour_pc-bd--select' ) != 'none' ) {
		include( PCA_DIR . '/section/pc-section-insert-bottom-divider.php' );
	}

	if ( $tour_section_bg == 'map' ) {
		include( PCA_DIR . '/section/pc-section-insert-map.php' );
	} elseif ( $tour_section_bg == 'video' ) {
		include( PCA_DIR . '/section/pc-section-insert-video.php' );
	} elseif ( $tour_section_bg == 'video-embed' ) {
		include( PCA_DIR . '/section/pc-section-insert-embed.php' );
	}

	if ( have_rows( 'tour_pc-rows' ) ) { 
		include( PCA_DIR . '/row/pc-row-loop.php' );
	}

	$section_count++; 

	?>

</section> 