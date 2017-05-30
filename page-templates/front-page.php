<?php
/**
 * Template Name: Front Page Template
 */

//add_action('genesis_after_header', 'tourtiger_after_header');


/*add_action('genesis_before_content', 'tourtiger_before_content');
function tourtiger_before_content(){ ?>
    
<?php }*/

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'be_landing_page_content');
function be_landing_page_content(){ ?>

    <?php //get_template_part('includes/front1_sections'); ?>
    <?php get_template_part('includes/front1_sections'); ?>
    <?php get_sidebar('subscribe'); ?>
    
<?php }
//add_action( 'be_content_area', 'be_landing_page_content' );

remove_action('genesis_sidebar', 'genesis_do_sidebar');

// Remove 'site-inner' from structural wrap
//add_theme_support( 'genesis-structural-wraps', array( 'header', 'site-inner', 'footer-widgets', 'footer' ) );

genesis();

// Build the page
/*get_header();
do_action( 'be_content_area' );
get_footer();*/