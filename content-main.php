<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<li class="post">
    <div class="gdl-blog-full gdl-border-x bottom">
        <div class="blog-content-wrapper">
            <h2 class="blog-title entry-title" style="visibility: visible;">
                <a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
            </h2>

            <?php if ( '' != get_the_post_thumbnail() ):
              $thumb = get_post_thumbnail_id();
              $img_url = wp_get_attachment_url( $thumb ); //get img URL
              echo "<div class='featured-wrapper article-image'><img src='$img_url' class='center-block' alt='$img_url' /></div>";
            endif; ?>

            <div class="blog-info-wrapper">
                <div class="blog-date">
                    <i class="fa fa-calendar"></i>
                    <a href="http://www.labicicletaverde.com/2015/10/06/"><?php the_time('j M Y'); ?></a>
                </div>
                <div class="blog-tag"><?php

                $posttags = get_the_tags();

                if (isset($posttags) && $posttags && is_array($posttags)) {
	                $len = count($posttags);
	                $count=0;

                    ?>
                    <i class="fa fa-tags"></i>
                    <?php foreach($posttags as $tag) {
                        $count++;
                        echo '<a rel="tag" href="'.get_tag_link($tag->term_id).'">' .$tag->name . '</a>';
                        if($count == $len): echo ' '; else: echo ', '; endif;
                      }
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <!--<span class="entry-date"><?php echo get_the_date(); ?></span>-->

            <?php

            $additional_content = get_field('additional_content_to_display_in_blog_feed');

            $excerpt = ( isset($post) && strlen( $post->post_content ) < 400 )
                ? preg_replace('/<img.*?>/', '', $post->post_content)
                : get_the_excerpt();
            ?>
            <div class="blog-content excerpt-container">
                <?php echo $additional_content ?>
                <?php echo do_shortcode($excerpt); ?>
            </div>

        </div>
    </div>
</li>

