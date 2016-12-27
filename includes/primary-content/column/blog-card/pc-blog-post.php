<?php if ( has_post_thumbnail() ) {
    $thumb_id = get_post_thumbnail_id();
   	$thumb_url = wp_get_attachment_image_src( $thumb_id,'full', true );
	$thumb_img = thumb_crop_etrange( $thumb_url[0], $thumb_width, $thumb_height );
} ?>

<article 
	id="blog-post-id-<?php echo get_the_ID(); ?>" 
	class="pc--c pc--blog pc--blog__post blog-post-id-<?php echo get_the_ID(); ?>" 
	itemscope
	itemtype="http://schema.org/BlogPosting">

	<?php if ( $tour_blog_show_image ) { ?>
		<header class="pc--blog__header">

			<a title="<?php echo $bc_style__date_pos; ?>" href="<?php the_permalink(); ?>" class="pc--blog__thumb pc--crop__thumb">
				<img src="<?php echo $thumb_img; ?>" alt="<?php the_title(); ?>" class="pc--blog__image">
			</a>

			<?php if ( ( $bc_style__date_pos == 'top-left' || $bc_style__date_pos == 'top-right' ) && $tour_blog_show_date ) {
				echo '<div class="pc--blog__date ' . $bc_style__date_pos . '" itemprop="datePublished">' . get_the_date( 'd.m.Y' ) . '</div>';
			} ?>

		</header>
	<?php } ?>

	<div class="pc--blog__content">

		<?php if ( ( $bc_style__date_pos == 'above' ) && $tour_blog_show_date ) { ?>
			<div class="pc--blog__wrap">
				<div class="pc--blog__date <?php echo $bc_style__date_pos; ?>" itemprop="datePublished">
					<?php echo get_the_date( 'd.m.Y' ); ?>
				</div>
			</div>
		<?php } ?>

		<?php the_title( '<div class="pc--blog__wrap"><a href="' . get_permalink() . '" class="pc--blog__title" itemprop="name">', '</a></div>' );

		if ( $tour_blog_show_excerpt ) { ?>
			<p class="pc--blog__excerpt pc--blog__wrap">
				<?php the_excerpt_max_charlength(100); ?>
			</p>
		<?php } 

		if ( ( $bc_style__date_pos == 'beneath' ) && $tour_blog_show_date ) { ?>
			<div class="pc--blog__wrap">
				<div class="pc--blog__date <?php echo $bc_style__date_pos; ?>" itemprop="description">
					<?php echo get_the_date( 'd.m.Y' ); ?>
				</div>
			</div>
		<?php } ?>
		<?php if ( $tour_blog_show_button ) { ?>
			<a href="<?php the_permalink(); ?>" class="pc--blog__button" itemprop="url">Read Article</a>
		<?php } ?>
	</div>
</article>