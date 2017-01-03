<header class="pc--blog__header">

	<?php   
		$thumb_id = get_post_thumbnail_id();
	   	$thumb_url = wp_get_attachment_image_src( $thumb_id,'full', true );
		$thumb_img = thumb_crop_etrange( $thumb_url[0], $thumb_width, $thumb_height );
	?>

	<a title="<?php echo $bc_style__date_pos; ?>" href="<?php the_permalink(); ?>" class="pc--blog__thumb pc--crop__thumb">
		<img src="<?php echo $thumb_img; ?>" alt="<?php the_title(); ?>" class="pc--blog__image">
	</a>

	<?php if ( 
		( 
			$bc_style__date_pos == 'top-left' 
			|| $bc_style__date_pos == 'top-right' 
		) 
		&& $tour_blog_show_date 
	) {
		echo '<div class="pc--blog__date ' . $bc_style__date_pos . '" itemprop="datePublished">' . get_the_date( 'd.m.Y' ) . '</div>';
	}

	if ( $bc_style__title_pos == 'image' ) {
		include( get_stylesheet_directory() . '/includes/primary-content/column/blog-card/blog-components/pc-blog-header-title.php' );
	} ?>

</header>