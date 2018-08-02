<?php

if ( $count == false || $count === null ) $count = 0;

$paddings = get_sub_field( 'tour_pc-section_pad' ); 

if ( count( $paddings ) > 0 && is_array( $paddings ) ) {
	$paddings_css = '';

	foreach ( $paddings as $id => $class ) {
		$paddings_css .= ' ' . $class;
	}
} else {
	$paddings_css = ' pc--s__no-paddings';
}

$tour_section_bg = get_sub_field( 'tour_pc-bg__select' );
$tour_section_classes = 'pc--s pc--s_id-' . $section_count . $paddings_css;
$tour_section_styles = '';
$tour_section_attr = '';
$tour_selection_id = 'pc--s_id-' . $section_count;

$is_more      = get_sub_field('is-load-more');
$more_label   = get_sub_field('load-more-more-label') ? get_sub_field('load-more-more-label') : 'Show more';
$less_label   = get_sub_field('load-more-less-label') ? get_sub_field('load-more-less-label') : 'Show less';
$initial_rows = get_sub_field('load-more-show');
$load_offset  = get_sub_field('load-more-offset');
$load_style   = get_sub_field('load-more-style');
$load_more_id = "{$tour_selection_id}__btn-more";
$rows_count   = count( get_sub_field( 'tour_pc-rows' ) );

$paddings_css = null;

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

	if ( have_rows( 'tour_pc-rows' ) ) : 
		$self_row_id = 0;

		while ( have_rows( 'tour_pc-rows' ) ) :
			the_row();

			$self_row_id++;
 
			if ( $is_more && $self_row_id > $initial_rows ) 
				break;

			include( PCA_DIR . '/row/pc-row-loop.php' );

		endwhile;
	endif;

	if ( $is_more ) 
		include( PCA_DIR . '/section/pc-section-btn-more.php' );

	$section_count++; 

	?>

</section> 