<article 
	id="blog-post-id-<?php echo get_the_ID(); ?>" 
	class="pc--c pc--blog pc--blog__post blog-post-id-<?php echo get_the_ID(); ?>" 
	itemscope
	itemtype="http://schema.org/BlogPosting">

	<?php if ( $tour_blog_show_image && has_post_thumbnail() ) { 

		include( get_stylesheet_directory() . '/includes/primary-content/column/blog-card/blog-components/pc-blog-header.php' );

	}

	if ( 
		$bc_style__title_pos == 'normal'
		|| ( 
			$tour_blog_show_date 
			&& ( 
				$bc_style__date_pos == 'beneath' 
				|| ( 
					$bc_style__date_pos == 'above' 
					&& $bc_style__title_pos == 'normal' 
				)
			) 
		) 
		|| $tour_blog_show_excerpt 
		|| $tour_blog_show_button 
	) {

		include( get_stylesheet_directory() . '/includes/primary-content/column/blog-card/blog-components/pc-blog-body.php' );

	} ?>


</article>