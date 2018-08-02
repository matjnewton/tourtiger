<?php

function tourtiger_kirki_configuration() {
    return array( 
        //'url_path'     => get_stylesheet_directory_uri() . '/includes/kirki/',
        'color_accent' => '#00bcd4',
        'color_back'   => '#455a64',
        'textdomain'   => 'tourtiger',
    );
}
add_filter( 'kirki/config', 'tourtiger_kirki_configuration' );


function custom_add_panels_and_sections( $wp_customize ) {

    /**
     * Panels
     */
    
    $wp_customize->add_panel( 'base', array(
        'priority'    => 1,
        'title'       => __( 'Base', 'tourtiger' ),
        'description' => __( 'Base Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'header', array(
        'priority'    => 1,
        'title'       => __( 'Header', 'tourtiger' ),
        'description' => __( 'Header Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'default', array(
        'priority'    => 1,
        'title'       => __( 'Default', 'tourtiger' ),
        'description' => __( 'Default Options', 'tourtiger' ),
    ) );
    
    /*$wp_customize->add_panel( 'header', array(
        'priority'    => 10,
        'title'       => __( 'Header', 'tourtiger' ),
        'description' => __( 'Header Options', 'tourtiger' ),
    ) );*/
    
    $wp_customize->add_panel( 'menu_primary', array(
        'priority'    => 2,
        'title'       => __( 'Primary Menu', 'tourtiger' ),
        'description' => __( 'Primary Menu Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'menu_mobile', array(
        'priority'    => 3,
        'title'       => __( 'Mobile Menu', 'tourtiger' ),
        'description' => __( 'Mobile Menu Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'hero', array(
        'priority'    => 4,
        'title'       => __( 'Hero Area', 'tourtiger' ),
        'description' => __( 'Hero Area Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'featured', array(
        'priority'    => 5,
        'title'       => __( 'Featured Area', 'tourtiger' ),
        'description' => __( 'Common Featured Area Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'featured1', array(
        'priority'    => 6,
        'title'       => __( 'Front-1 Featured Area', 'tourtiger' ),
        'description' => __( 'Front-1 Featured Area Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'featured3', array(
        'priority'    => 7,
        'title'       => __( 'Front-3 Featured Area', 'tourtiger' ),
        'description' => __( 'Front-3 Featured Area Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'testimonials', array(
        'priority'    => 8,
        'title'       => __( 'Testimonials', 'tourtiger' ),
        'description' => __( 'Testimonials Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'gravity_form', array(
        'priority'    => 9,
        'title'       => __( 'Gravity Form', 'tourtiger' ),
        'description' => __( 'Gravity Form Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'subscribe_gravity_form', array(
        'priority'    => 10,
        'title'       => __( 'Subscribe Gravity Form', 'tourtiger' ),
        'description' => __( 'Subscribe Gravity Form Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'entry_content', array(
        'priority'    => 11,
        'title'       => __( 'Content', 'tourtiger' ),
        'description' => __( 'Content Options', 'tourtiger' ),
    ) );
    
    $wp_customize->add_panel( 'footer', array(
        'priority'    => 12,
        'title'       => __( 'Footer', 'tourtiger' ),
        'description' => __( 'Footer Options', 'tourtiger' ),
    ) );
    
    
    
    
    /**
     * Sections
     */
    $wp_customize->add_section( 'base_wrapper', array(
        'title'       => __( 'Base Wrapper', 'tourtiger' ),
        'priority'    => 9,
        'panel'       => 'base'
    ) );
    
    $wp_customize->add_section( 'header_wrapper', array(
        'title'       => __( 'Header Wrapper', 'tourtiger' ),
        'priority'    => 9,
        'panel'       => 'header'
    ) );
    
    $wp_customize->add_section( 'default_text', array(
        'title'       => __( 'Text', 'tourtiger' ),
        'priority'    => 10,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_link', array(
        'title'       => __( 'Hyperlink', 'tourtiger' ),
        'priority'    => 11,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_h1', array(
        'title'       => __( 'Heading 1', 'tourtiger' ),
        'priority'    => 12,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_h2', array(
        'title'       => __( 'Heading 2', 'tourtiger' ),
        'priority'    => 13,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_h3', array(
        'title'       => __( 'Heading 3', 'tourtiger' ),
        'priority'    => 14,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_h4', array(
        'title'       => __( 'Heading 4', 'tourtiger' ),
        'priority'    => 15,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_h5', array(
        'title'       => __( 'Heading 5', 'tourtiger' ),
        'priority'    => 16,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'default_h6', array(
        'title'       => __( 'Heading 6', 'tourtiger' ),
        'priority'    => 17,
        'panel'       => 'default'
    ) );
    
    $wp_customize->add_section( 'hero_image_tint', array(
        'title'       => __( 'Image Tint', 'tourtiger' ),
        'priority'    => 11,
        'panel'       => 'hero'
    ) );
    
    $wp_customize->add_section( 'hero_area_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 12,
        'panel'       => 'hero'
    ) );
    
    $wp_customize->add_section( 'hero_area_content', array(
        'title'       => __( 'Content', 'tourtiger' ),
        'priority'    => 13,
        'panel'       => 'hero'
    ) );
    
    $wp_customize->add_section( 'hero_area_cta', array(
        'title'       => __( 'CTA', 'tourtiger' ),
        'priority'    => 14,
        'panel'       => 'hero'
    ) );
    
    $wp_customize->add_section( 'hero_pod', array(
        'title'       => __( 'POD', 'tourtiger' ),
        'priority'    => 15,
        'panel'       => 'hero',
        'description' => __( 'Point of Difference on Front page', 'tourtiger' )
    ) );
    
    $wp_customize->add_section( 'featured_area_container', array(
        'title'       => __( 'Area Wrapper', 'tourtiger' ),
        'priority'    => 7,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'featured_headline', array(
        'title'       => __( 'Headline', 'tourtiger' ),
        'priority'    => 8,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'featured_tile_container', array(
        'title'       => __( 'Tile Container', 'tourtiger' ),
        'priority'    => 9,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'tile_image_tint', array(
        'title'       => __( 'Image tint', 'tourtiger' ),
        'priority'    => 10,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'featured_area_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 11,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'featured_area_excerpt', array(
        'title'       => __( 'Excerpt', 'tourtiger' ),
        'priority'    => 12,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'featured_button', array(
        'title'       => __( 'Button', 'tourtiger' ),
        'priority'    => 13,
        'panel'       => 'featured'
    ) );
    
    $wp_customize->add_section( 'featured1_tile_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 14,
        'panel'       => 'featured1'
    ) );
    
    $wp_customize->add_section( 'featured3_tile_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 15,
        'panel'       => 'featured3'
    ) );
    
    /*$wp_customize->add_section( 'featured3_spacing', array(
        'title'       => __( 'Spacing', 'tourtiger' ),
        'priority'    => 15,
        'panel'       => 'featured3'
    ) );*/
    
    /*$wp_customize->add_section( 'testimonials_headline', array(
        'title'       => __( 'Headline', 'tourtiger' ),
        'priority'    => 16,
        'panel'       => 'testimonials'
    ) );*/
    
    $wp_customize->add_section( 'testimonial_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 17,
        'panel'       => 'testimonials'
    ) );
    
    $wp_customize->add_section( 'testimonial_excerpt', array(
        'title'       => __( 'Excerpt', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'testimonials'
    ) );
    // This section will not be inside a panel
    /*$wp_customize->add_section( 'layout', array(
        'title'    => __( 'Layout', 'tourtiger' ),
        'priority' => 30
    ) );*/
    $wp_customize->add_section( 'primary_top_links', array(
        'title'       => __( 'Top level links', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'menu_primary'
    ) );
    $wp_customize->add_section( 'primary_sub_links', array(
        'title'       => __( 'Submenu level links', 'tourtiger' ),
        'priority'    => 19,
        'panel'       => 'menu_primary'
    ) );
    $wp_customize->add_section( 'primary_menu_cta', array(
        'title'       => __( 'CTA', 'tourtiger' ),
        'priority'    => 20,
        'panel'       => 'menu_primary'
    ) );
    
    $wp_customize->add_section( 'mobile_top_links', array(
        'title'       => __( 'Top level links', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'menu_mobile'
    ) );
    
    $wp_customize->add_section( 'mobile_toggle_btn', array(
        'title'       => __( 'Toggle Button', 'tourtiger' ),
        'priority'    => 19,
        'panel'       => 'menu_mobile'
    ) );
    
    $wp_customize->add_section( 'mobile_sub_links', array(
        'title'       => __( 'Submenu level links', 'tourtiger' ),
        'priority'    => 20,
        'panel'       => 'menu_mobile'
    ) );
    
    /*$wp_customize->add_section( 'search_social_links', array(
        'title'       => __( 'Social links', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'header'
    ) );*/
    
    $wp_customize->add_section( 'gravity_form_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'gravity_form'
    ) );
    
    $wp_customize->add_section( 'gravity_form_description', array(
        'title'       => __( 'Description', 'tourtiger' ),
        'priority'    => 19,
        'panel'       => 'gravity_form'
    ) );
    
    $wp_customize->add_section( 'gravity_form_label', array(
        'title'       => __( 'Label', 'tourtiger' ),
        'priority'    => 20,
        'panel'       => 'gravity_form'
    ) );
    
    $wp_customize->add_section( 'gravity_form_form', array(
        'title'       => __( 'Form', 'tourtiger' ),
        'priority'    => 21,
        'panel'       => 'gravity_form'
    ) );
    
    $wp_customize->add_section( 'gravity_form_focus', array(
        'title'       => __( 'Form: focus', 'tourtiger' ),
        'priority'    => 22,
        'panel'       => 'gravity_form'
    ) );
    
    $wp_customize->add_section( 'gravity_form_submit', array(
        'title'       => __( 'Submit', 'tourtiger' ),
        'priority'    => 23,
        'panel'       => 'gravity_form'
    ) );
    
    $wp_customize->add_section( 'subscribe_container', array(
        'title'       => __( 'Subscribe Container', 'tourtiger' ),
        'priority'    => 16,
        'panel'       => 'subscribe_gravity_form'
    ) );
    
    $wp_customize->add_section( 'subscribe_form_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'subscribe_gravity_form'
    ) );
    
    $wp_customize->add_section( 'subscribe_form_description', array(
        'title'       => __( 'Description', 'tourtiger' ),
        'priority'    => 19,
        'panel'       => 'subscribe_gravity_form'
    ) );
    
    $wp_customize->add_section( 'subscribe_form_form', array(
        'title'       => __( 'Form', 'tourtiger' ),
        'priority'    => 20,
        'panel'       => 'subscribe_gravity_form'
    ) );

    $wp_customize->add_section( 'subscribe_form_submit', array(
        'title'       => __( 'Submit', 'tourtiger' ),
        'priority'    => 21,
        'panel'       => 'subscribe_gravity_form'
    ) );
    
    $wp_customize->add_section( 'content_area', array(
        'title'       => __( 'Containers Wrapper', 'tourtiger' ),
        'priority'    => 14,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'content_containers', array(
        'title'       => __( 'Containers', 'tourtiger' ),
        'priority'    => 15,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'content_paragraph', array(
        'title'       => __( 'Paragraph', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'content_link', array(
        'title'       => __( 'Hyperlink', 'tourtiger' ),
        'priority'    => 19,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'content_list', array(
        'title'       => __( 'List', 'tourtiger' ),
        'priority'    => 20,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'content_heading3', array(
        'title'       => __( 'Heading 3', 'tourtiger' ),
        'priority'    => 21,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'blog_heading3', array(
        'title'       => __( 'Blog Heading', 'tourtiger' ),
        'priority'    => 22,
        'panel'       => 'entry_content'
    ) );
    
    $wp_customize->add_section( 'footer_bg', array(
        'title'       => __( 'Background', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'footer'
    ) );
    
    $wp_customize->add_section( 'footer_title', array(
        'title'       => __( 'Title', 'tourtiger' ),
        'priority'    => 18,
        'panel'       => 'footer'
    ) );
    
    $wp_customize->add_section( 'footer_content', array(
        'title'       => __( 'Content', 'tourtiger' ),
        'priority'    => 19,
        'panel'       => 'footer'
    ) );
    
    $wp_customize->add_section( 'footer_link', array(
        'title'       => __( 'Hyperlink', 'tourtiger' ),
        'priority'    => 20,
        'panel'       => 'footer'
    ) );
    
}
add_action( 'customize_register', 'custom_add_panels_and_sections' );

function tourtiger_kirki_fields($fields){
    
 
    include_once(dirname(__FILE__).'/panels/base.php');
    
    include_once(dirname(__FILE__).'/panels/default.php');
    
    include_once(dirname(__FILE__).'/panels/header.php');
    
    include_once(dirname(__FILE__).'/panels/menu_primary.php');
    
    include_once(dirname(__FILE__).'/panels/menu_mobile.php');

    include_once(dirname(__FILE__).'/panels/hero_area.php');

    include_once(dirname(__FILE__).'/panels/featured_area.php');
    
    include_once(dirname(__FILE__).'/panels/front1_featured_area.php');
    
    include_once(dirname(__FILE__).'/panels/front3_featured_area.php');
    
    include_once(dirname(__FILE__).'/panels/testimonials.php');
    
    include_once(dirname(__FILE__).'/panels/gravity_form.php');
    
    include_once(dirname(__FILE__).'/panels/subscribe_gravity_form.php');
    
    include_once(dirname(__FILE__).'/panels/entry_content.php');
    
    include_once(dirname(__FILE__).'/panels/footer.php');
    
    
    return $fields;
}
add_filter('kirki/fields', 'tourtiger_kirki_fields');