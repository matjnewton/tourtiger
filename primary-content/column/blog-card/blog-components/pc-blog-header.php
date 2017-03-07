<header class="pc--blog__header">

	<a 
		title="<?php echo $bc_style__date_pos; ?>" 
		href="<?php the_permalink(); ?>" 
		class="pc--blog__thumb pc--crop__thumb">
		<?php pc_image( get_post_thumbnail_id(), $thumb_width, $thumb_height, false, array( 'class' => 'pc--blog__image' ) ); ?>
	</a>

	<?php if ( $bc_style__title_pos == 'image-top' ) {
		echo '<div class="pc--blog__wrap pc--blog__wrap_top">';

		include( get_stylesheet_directory() . '/includes/primary-content/column/blog-card/blog-components/pc-blog-header-title.php' );

		echo '</div>';
	}

	if ( 
		( 
			(
				$bc_style__date_pos == 'top-left' 
				|| $bc_style__date_pos == 'top-right' 
			)

			&& $bc_style__title_pos != 'image-top'
		) 
		&& $tour_blog_show_date 
	) {
		echo '<div class="pc--blog__date ' . $bc_style__date_pos . '" itemprop="datePublished">' . get_the_date( 'd.m.Y' ) . '</div>';
	}

	if ( $bc_style__title_pos == 'image' ) {
		echo '<div class="pc--blog__wrap pc--blog__wrap_bottom">';

		include( get_stylesheet_directory() . '/includes/primary-content/column/blog-card/blog-components/pc-blog-header-title.php' );

		echo '</div>';
	} ?>

</header>