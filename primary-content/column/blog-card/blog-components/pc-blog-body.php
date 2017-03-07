<div class="pc--blog__content">
	<?php if ( ( $bc_style__date_pos == 'above' ) && $tour_blog_show_date ) { ?>
		<div class="pc--blog__wrap">
			<div class="pc--blog__date <?php echo $bc_style__date_pos; ?>" itemprop="datePublished">
				<?php echo get_the_date( 'd.m.Y' ); ?>
			</div>
		</div>
	<?php }

	if ( $bc_style__title_pos == 'normal' ) 
		the_title( 
			'<div class="pc--blog__wrap"><a href="' . get_permalink() . '" class="pc--blog__title" itemprop="name">', 
			'</a></div>' 
		);

	if ( $tour_blog_show_excerpt ) { ?>
		<p class="pc--blog__excerpt pc--blog__wrap">
			<?php the_excerpt_max_charlength(100); ?>
		</p>
	<?php } 

	if ( $bc_style__date_pos == 'beneath' && $tour_blog_show_date ) { ?>
		<div class="pc--blog__wrap">
			<div class="pc--blog__date <?php echo $bc_style__date_pos; ?>" itemprop="description">
				<?php echo get_the_date( 'd.m.Y' ); ?>
			</div>
		</div>
	<?php }

	if ( $tour_blog_show_button ) { ?>
		<a href="<?php the_permalink(); ?>" class="pc--blog__button" itemprop="url"><?php echo $bc_style__button_text; ?></a>
	<?php } ?>
</div>