<?php 
	if ( have_rows( 'tour_pc-bg__select-video--video-links' ) ) {
		while ( have_rows( 'tour_pc-bg__select-video--video-links' ) ) {
			the_row();

			$section_web = get_sub_field( 'tour_pc-bg__select-video--video-links--webm' );
			$section_ogv = get_sub_field( 'tour_pc-bg__select-video--video-links--ogv' );
			$section_mp4 = get_sub_field( 'tour_pc-bg__select-video--video-links--mp4m' );
		}
	}
?>

<video autoplay loop muted class="pc--s__bg-video">
	<?php if ( $section_web ) { ?>
 		<source src="<?php echo $section_web; ?>" type="video/webm"></source>
	<?php } ?>

	<?php if ( $section_ogv ) { ?>
		<source src="<?php echo $section_ogv; ?>" type="video/ogv"></source>
	<?php } ?>

	<?php if ( $section_mp4 ) { ?>
		<source src="<?php echo $section_mp4; ?>" type="video/mp4"></source>
	<?php } ?>
</video>