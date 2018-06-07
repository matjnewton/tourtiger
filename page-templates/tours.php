<?php
/**
 * Template Name: Tours Page Template
 */

//* This file handles single entries, but only exists for the sake of child theme forward compatibility.

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_archive');
function tourtiger_archive(){ ?>
<?php $site_layout = genesis_site_layout(); ?>
<section class="tour-page-content">
        <div class="container">
            <div class="row">
                <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?> left-col">
                    <section class="tours-list">
                    
                    <?php //while ( have_posts() ) : the_post(); ?>
                    <?php //get_template_part( 'content', 'tours' ); ?>
                    <?php //endwhile; ?>
                    <?php                    	global $post;
 
// arguments, adjust as needed
$args = array(
'post_type' => 'tour',
'posts_per_page' => -1,
'post_status' => 'publish',
'paged' => get_query_var( 'paged' )
);
 

global $wp_query;
$wp_query = new WP_Query( $args );
 
if ( have_posts() ) :

while ( have_posts() ) : the_post();
 
get_template_part( 'content', 'tours' );
 
endwhile;

do_action( 'genesis_after_endwhile' );
endif;
 
wp_reset_query();
?>
                    </section>
                </div>
                <?php if ( 'content-sidebar' == $site_layout ): ?>
                <div class="col-sm-4 right-col">
                
                
                </div>
                <?php endif; ?>
            </div>
        </div>
</section>

<?php //get_sidebar('subscribe'); ?>
    
<? }

remove_action('genesis_sidebar', 'genesis_do_sidebar');

genesis();