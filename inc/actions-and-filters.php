<?php
// =====================================================================================================================
function bgmpShortcodeCalled()
{
    global $post;

    $shortcodePageSlugs = array(
        'contact-us',
        'about-us'
    );

    $queried_post_type = get_query_var('post_type');
    if ( (is_single() && 'tour' ==  $queried_post_type) || is_page_template('page-templates/front-page.php') || is_page_template('page-templates/front-page3.php') ) {
        add_filter( 'bgmp_map-shortcode-called', '__return_true' );
    }

    if( $post )
        if( in_array( $post->post_name, $shortcodePageSlugs ) )
            add_filter( 'bgmp_map-shortcode-called', '__return_true' );
}
add_action( 'wp', 'bgmpShortcodeCalled' );

// =====================================================================================================================
function regiondo_script_loader_tag( $tag, $handle ){
    if ( $handle == 'regiondo_btn' ) {
        return str_replace( '<script', '<script id="regiondo-button-js" async defer', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'regiondo_script_loader_tag', 10 ,2 );

// =====================================================================================================================

function orioly_script_loader_tag( $tag, $handle ){
    if ( $handle == 'orioly' ) {
        return str_replace( '<script', '<script async', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'orioly_script_loader_tag', 10 ,2 );


// =====================================================================================================================

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'jptweak_remove_share' );

// =====================================================================================================================

//adding snippets
add_action('wp_head', 'head_snippets');
function head_snippets(){
    require(CHILD_DIR.'/head-snippets.php');
}

// =====================================================================================================================

//adding snippets and bg element
add_action('genesis_before', 'base_background');
function base_background(){
    require(CHILD_DIR.'/body-snippets.php');
    //echo '<div class="base-background"></div>';
}

// =====================================================================================================================

//adding snippets
add_action('genesis_after', 'footer_snippets');
function footer_snippets(){
    require(CHILD_DIR.'/footer-snippets.php');
}

// =====================================================================================================================

add_action('genesis_before_header', 'above_header');
function above_header(){
    require(CHILD_DIR.'/above-header.php');
}

// =====================================================================================================================

//remove_action('genesis_site_title','tourtiger_header');
remove_action('genesis_header', 'genesis_do_header');
add_action('genesis_header', 'tourtiger_header');
function tourtiger_header(){
    require(CHILD_DIR.'/tourtiger-header_gpm.php');
}

// =====================================================================================================================

remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_header', 'genesis_do_nav' );

// =====================================================================================================================

remove_action('genesis_footer', 'genesis_do_footer');
add_action('genesis_footer', 'tourtiger_footer');
function tourtiger_footer(){
    require(CHILD_DIR.'/tourtiger-footer_gpm.php');
}

// =====================================================================================================================

add_action('genesis_after_footer', function(){
    include THEME_PATH . '/includes/class-side-buttons.php';
});


// =====================================================================================================================

// Add Read More Link to Excerpts
add_filter('excerpt_more', 'get_read_more_link');
add_filter( 'the_content_more_link', 'get_read_more_link' );
function get_read_more_link() {
    return '<div class="clear"><a href="' . get_permalink()
        . '" class="blog-continue-reading" target="_blank">Continue Reading</a></div>';
}

// =====================================================================================================================

function acf_load_third_party_field_choices( $field ) {

    // reset choices
    $field['choices'] = array();

    // get the textarea value from options page without any formatting
    $integrate_xola = get_field('integrate_xola_with_this_website','option');
    $integrate_peek = get_field('integrate_peek_with_this_website','option');
    $integrate_fareharbor = get_field('fareharbor','option');
    $integrate_getinsellout = get_field('getinsellout','option');
    $integrate_trekksoft = get_field('trekksoft','option');
    $integrate_rezdy = get_field('rezdy','option');
    $integrate_regiondo = get_field('regiondo','option');
    $integrate_orioly = get_field('orioly','option');
    $integrate_zozi = get_field('zozi','option');

    if($integrate_xola):
        $choices = get_field('xola_values', 'option', false);
    elseif($integrate_peek):
        $choices = get_field('peek_values', 'option', false);
    elseif($integrate_fareharbor):
        $choices = get_field('fareharbor_values', 'option', false);
    elseif($integrate_getinsellout):
        $choices = get_field('getinsellout_values', 'option', false);
    elseif($integrate_trekksoft):
        $choices = get_field('trekksoft_values', 'option', false);
    elseif($integrate_rezdy):
        $choices = get_field('rezdy_values', 'option', false);
    elseif($integrate_regiondo):
        $choices = get_field('regiondo_values', 'option', false);
    elseif($integrate_orioly):
        $choices = get_field('orioly_values', 'option', false);
    elseif($integrate_zozi):
        $choices = get_field('zozi_values', 'option', false);
    endif;
    // explode the value so that each line is a new array piece
    $choices = explode("\n", $choices??'');

    // remove any unwanted white space
    $choices = array_map('trim', $choices);

    // loop through array and add to field 'choices'
    if( is_array( $choices ) ) {
        foreach( $choices as $choice ) {
            $field['choices'][ $choice ] = $choice;
        }
    }

    // return the field
    return $field;
}

add_filter('acf/load_field/name=third_party', 'acf_load_third_party_field_choices');

// =====================================================================================================================

add_action( 'customize_register', 'tourtiger_customize_register' );
function tourtiger_customize_register( $wp_customize ) {
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'background_image' );
}

// =====================================================================================================================

add_filter('acf/compatibility/field_wrapper_class', '__return_true');

// =====================================================================================================================

add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' ) {
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
}

// =====================================================================================================================

add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
function wrap_gform_cdata_close( $content = '' ) {
    $content = ' }, false );';
    return $content;
}

// =====================================================================================================================

function my_acf_format_value( $value, $post_id, $field ) {
    // run do_shortcode on all textarea values
    $value = do_shortcode($value);

    // return
    return $value;
}
add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);

// =====================================================================================================================

function rem_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'rem_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js', 9999 );

// =====================================================================================================================

function add_noindex_metatag(){
    $single_testimonial = get_field( 'is_single_testimonial', 'option' );

    if ( is_page_template( 'page-templates/testimonials.php' ) && $single_testimonial ) :
        echo '<meta name="robots" content="noindex">';
    endif;
}
add_action('wp_head', 'add_noindex_metatag');

// =====================================================================================================================

/**
 * A pulsing directive
 */
function inject_pulsing_directive() {
    $elements  = get_field('pulsing_elements', 'option');
    $selectors = array();

    if ($elements) :
        foreach ($elements as $el) :
            if (isset($el['element'])) :
                switch ($el['element']) :
                    case 'product-booking-btn':
                        $selectors[] = '.single-tour .book-btn2';
                        $selectors[] = '.single-product .book-btn2-product';
                        break;

                    case 'heroarea-booking-btn':
                        $selectors[] = '.pc_hero-area__action';
                        $selectors[] = '.banner .book-btn-wrapper';
                        break;
                endswitch;
            endif;
        endforeach;

        $selector = implode(",", $selectors);

        if ($selector) :
            ?>

            <script>
                !(function(){
                    var elems = document.querySelectorAll('<?=$selector;?>');
                    elems.forEach(function(el){
                        el.classList.add('js-pulsing');
                    });
                })();
            </script>

        <?php
        endif;
    endif;
}
add_action( 'wp_footer', 'inject_pulsing_directive' );

// =====================================================================================================================


function set_third_party_assets() {
    $the_fly_book_account_id = get_field('the_fly_book_account_id','apikey');

    if ($the_fly_book_account_id) :
        echo "<link rel='stylesheet' href='https://go.theflybook.com/content/bootstrapper/flybookbootstrap.css' />";
        echo "<script src='https://go.theflybook.com/custom/bootstrapper/flybookbootstrap.js' defer></script>";
    endif;
}

add_action('wp_head', 'set_third_party_assets', 49);

// =====================================================================================================================


// Remove Yoast SEO plugin columns from posts table

add_filter ( 'manage_edit-post_columns', function ( $columns ) {

    // remove the Yoast SEO columns
    unset( $columns['wpseo-score'] );
    unset( $columns['wpseo-title'] );
    unset( $columns['wpseo-metadesc'] );
    unset( $columns['wpseo-focuskw'] );

    return $columns;

} );

// =====================================================================================================================


/**
 * Peek integration
 */
function add_peek_integration() {

    $key = get_field( 'peek_key', 'apikey' );

    if ( $key ) :
        ?>

        <script type="text/javascript">
            var _peekConfigFunction = function () {(function(config) {
                window._peekConfig = config || {};
                var idPrefix = 'peek-book-button';
                var id = idPrefix+'-js'; if (document.getElementById(id)) return;
                var head = document.getElementsByTagName('head')[0];
                var el = document.createElement('script'); el.id = id;
                var date = new Date; var stamp = date.getMonth()+"-"+date.getDate();
                var basePath = "https://js.peek.com";
                el.src = basePath + "/widget_button.js?ts="+stamp;
                el.setAttribute('defer', 'defer');
                head.appendChild(el); id = idPrefix+'-css'; el = document.createElement('link'); el.id = id;
                el.href = basePath + "/widget_button.css?ts="+stamp;
                el.rel="stylesheet"; el.type="text/css"; head.appendChild(el);

                window._peekConfigFunction = false;
            })({key:'<?=$key?>'})};
        </script>

    <?php
    endif;

}

add_action('wp_head', 'add_peek_integration');

// =====================================================================================================================


// Where to display protected posts
function exclude_protected_action($query) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'exclude_protected' );
    }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

// =====================================================================================================================


// =====================================================================================================================


// =====================================================================================================================


// =====================================================================================================================


// =====================================================================================================================


// =====================================================================================================================


// =====================================================================================================================
