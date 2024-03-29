<?php
 /**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * The template used for displaying page content in single.php
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="gdl-blog-full gdl-border-x bottom">
            <div class="blog-post-content-wrapper">

                <h1 class="blog-title entry-title"><a href="#"><?php the_title(); ?></a></h1>

                <?php
                $posttags = get_the_tags();

                if (  isset($posttags) && $posttags && is_array($posttags) ) :
	                $count=0;
	                $len = count($posttags);

                    ?>
                <div class="blog-info-wrapper">
                    <div class="blog-date">
                        <i class="fa fa-calendar"></i>
                            <a href="http://www.labicicletaverde.com/2015/10/06/"><?php the_time('j M Y'); ?></a>
                    </div>
                    <div class="blog-tag">
                        <i class="fa fa-tags"></i>
                        <?php
                            foreach ($posttags as $tag) :
                                $count++;
                                echo '<a rel="tag" href="'.get_tag_link($tag->term_id).'">' .$tag->name . '</a>';
                                if ($count == $len) :
                                    echo ' ';
                                else :
                                    echo ', ';
                                endif;
                            endforeach; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php  endif; ?>

            </div>
		</div>

    <?php if ( '' != get_the_post_thumbnail() ):
      $thumb = get_post_thumbnail_id();
      $img_url = wp_get_attachment_url( $thumb ); //get img URL
      echo "<div class='featured-wrapper article-image'><img src='{$img_url}' class='center-block' /></div>";
    endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php if ( function_exists( 'sharing_display' ) ): ?>
			<div class="sharethis">
                <strong>Share this:</strong>
				<div class="sharethis-buttons-wrapper">
				<?php sharing_display( '', true ); ?>
				</div>
            </div>
            <?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tourtiger' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
        <?php if (false) : // todo: what was this for??? ?>
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'tourtiger' ), '<span class="edit-link">', '</span>' );?>
		</footer><!-- .entry-meta -->
        <?php endif; ?>
	</article><!-- #post -->

<?php


if( have_rows('after_post_content_on_post_page', 'options' ) ):

    // Loop through rows.
    while ( have_rows('after_post_content_on_post_page', 'options') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'button' ):

            $button_text = get_sub_field('cta_button_text');
            $button_link = get_sub_field('cta_button_link');

            ?>
            <div class="after_post_content_on_post_page">
                <div class="book-tour-wrapper text-center">
                    <a href="<?=$button_link?>" class="book-btn" target="_blank"><?=$button_text?></a>
                </div>
            </div><?php
        endif;
    endwhile;
endif;
