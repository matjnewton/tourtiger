<?php
/**
 * Template Name: Search Page Template
 */

$integrate_xola = get_field('integrate_xola_with_this_website', 'option');
$integrate_rezdy = get_field('rezdy', 'option');

if ( $integrate_rezdy && !$integrate_xola ) {
    get_template_part( 'page-templates/search-rezdy-content' );
} else if ( !$integrate_rezdy && $integrate_xola) {
    get_template_part( 'page-templates/search-xola-content' );
} else {
    //get_template_part( 'page-templates/search-xola-content' );
    //get_template_part( 'page-templates/search-rezdy-content' );
}