<?php
/**
 * Template Name: Search Page Template
 */

$integrate_xola = get_field('integrate_xola_with_this_website', 'option');
$integrate_rezdy = get_field('rezdy', 'option');
$integrate_atlasx_with_this_website = get_field('integrate_atlasx_with_this_website', 'option');

if ( $integrate_rezdy && !$integrate_xola ) {
    get_template_part( 'page-templates/search-rezdy-content' );
} else if ( !$integrate_rezdy && $integrate_xola) {
    get_template_part( 'page-templates/search-xola-content' );
} else if ( !$integrate_rezdy && !$integrate_xola && $integrate_atlasx_with_this_website) {
	get_template_part( 'page-templates/search-atlasx-content' );
} else {
    //get_template_part( 'page-templates/search-xola-content' );
    //get_template_part( 'page-templates/search-rezdy-content' );
}