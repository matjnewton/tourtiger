<?php 

// include script and css for product cpt
add_action( 'wp_enqueue_scripts', 'product_scripts_method' ); 
function product_scripts_method() {

    $template = array('page-templates/rezdy_search.php');

    if(  is_front_page() || is_page_template( $template ) || is_singular('product')) :
        wp_register_style('product_css', CORE_URL .'/css/product.css', array(),null, 'all');
        wp_enqueue_style('product_css');
    endif;
    if( is_page_template( $template ) || is_singular('product')) :

    	wp_localize_script( 'product_scripts', 'localize_var', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    	// wp_register_style('product_css', CORE_URL .'/css/product.css', array(),null, 'all');
    	// wp_enqueue_style('product_css');
    	wp_register_script('jquerystickyjs', CORE_URL . '/js/jquery.sticky.js', array('jquery'), '', true);
    	wp_enqueue_script( 'jquerystickyjs' );
    	wp_register_script('bxslider_min_js', CORE_URL . '/js/jquery.bxslider.min.js', array('jquery'), '', true);
    	wp_enqueue_script( 'bxslider_min_js' );
        wp_register_script( 'product_scripts', CORE_URL . '/js/product_scripts.js', array('jquery', 'bxslider_min_js'), '', true );
        wp_enqueue_script( 'product_scripts');
    	wp_register_style('bxslider_css', CORE_URL .'/css/jquery.bxslider.css', array(),'', 'all');
    	wp_enqueue_style('bxslider_css');
        wp_register_style('product_css_adaptive', CORE_URL .'/css/adaptive.css', array(),null, 'all');
        wp_enqueue_style('product_css_adaptive');

    endif;
} 

function custom_admin_theme_style() {
    wp_enqueue_style('custom-admin-style', CORE_URL .'/css/custom_admin_style.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_theme_style');

function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	//$title = '';

	if( $text = get_sub_field('primary_content_content_editor_label') ) {
		
		$title .= ' - ' . $text . '';
	} else if( $text = get_sub_field('primary_content_content_card_headline') ) {
		
		$title .= ' - ' . $text . '';
	} else if( $text = get_sub_field('primary_content_expandable_content_label') ) {
		
		$title .= ' - ' . $text . '';
	}
	return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=primary_content_options', 'my_acf_flexible_content_layout_title', 10, 4);




add_action('registered_post_type', 'product_rewrite', 10, 2);
function product_rewrite($post_type, $args) {
    global $wp_rewrite;
    $general_product_rewrite = get_field('general_product_rewrite', 'option');
    if (($post_type == 'product') && ($general_product_rewrite != '')) {

        $args->rewrite['slug'] = $general_product_rewrite; //write your new slug here

        if ( $args->has_archive ) {
                $archive_slug = $args->has_archive === true ? $args->rewrite['slug'] : $args->has_archive;
                if ( $args->rewrite['with_front'] )
                        $archive_slug = substr( $wp_rewrite->front, 1 ) . $archive_slug;
                else
                        $archive_slug = $wp_rewrite->root . $archive_slug;

                add_rewrite_rule( "{$archive_slug}/?$", "index.php?post_type=$post_type", 'top' );
                if ( $args->rewrite['feeds'] && $wp_rewrite->feeds ) {
                        $feeds = '(' . trim( implode( '|', $wp_rewrite->feeds ) ) . ')';
                        add_rewrite_rule( "{$archive_slug}/feed/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
                        add_rewrite_rule( "{$archive_slug}/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
                }
                if ( $args->rewrite['pages'] )
                        add_rewrite_rule( "{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type=$post_type" . '&paged=$matches[1]', 'top' );
        }

        $permastruct_args = $args->rewrite;
        $permastruct_args['feed'] = $permastruct_args['feeds'];
        add_permastruct( $post_type, "{$args->rewrite['slug']}/%$post_type%", $permastruct_args );
    }
}



add_action('registered_post_type', 'testimonial_rewrite', 10, 2);
function testimonial_rewrite($post_type, $args) {
    global $wp_rewrite;
    $general_testimonial_rewrite = get_field('general_testimonial_rewrite', 'option');
    if (($post_type == 'testimonial') && ($general_testimonial_rewrite != '')) {

        $args->rewrite['slug'] = $general_testimonial_rewrite; //write your new slug here

        if ( $args->has_archive ) {
                $archive_slug = $args->has_archive === true ? $args->rewrite['slug'] : $args->has_archive;
                if ( $args->rewrite['with_front'] )
                        $archive_slug = substr( $wp_rewrite->front, 1 ) . $archive_slug;
                else
                        $archive_slug = $wp_rewrite->root . $archive_slug;

                add_rewrite_rule( "{$archive_slug}/?$", "index.php?post_type=$post_type", 'top' );
                if ( $args->rewrite['feeds'] && $wp_rewrite->feeds ) {
                        $feeds = '(' . trim( implode( '|', $wp_rewrite->feeds ) ) . ')';
                        add_rewrite_rule( "{$archive_slug}/feed/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
                        add_rewrite_rule( "{$archive_slug}/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
                }
                if ( $args->rewrite['pages'] )
                        add_rewrite_rule( "{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type=$post_type" . '&paged=$matches[1]', 'top' );
        }

        $permastruct_args = $args->rewrite;
        $permastruct_args['feed'] = $permastruct_args['feeds'];
        add_permastruct( $post_type, "{$args->rewrite['slug']}/%$post_type%", $permastruct_args );
    }
}