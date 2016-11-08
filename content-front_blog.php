<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
  <div class="front-blog">
	
<div class="title-excerpt">
                            <strong>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </strong>
</div>
<!--<hr />-->

<?php if (has_post_thumbnail()) {
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
            $image = aq_resize( $img_url, 450, 263, true ); //resize & crop img
            
            ?>
            <a href="<?php the_permalink() ?>">
                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive center-block" />
            </a>
            <?php
        }
        ?>
                            
<div class="title-excerpt">                        
<?php the_excerpt(); ?>
</div>

</div>
  	
	