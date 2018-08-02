<?php

define('CORE_PATH', get_stylesheet_directory() . '/inc');
define('CORE_URL', get_stylesheet_directory_uri()  . '/inc');
define( 'CORE_PLUGINS_PATH', CORE_PATH . '/plugins' );
define( 'CORE_PLUGINS_URL', CORE_URL . '/plugins' );


/* load plugins */

// acf- font-awesome icon
require_once CORE_PLUGINS_PATH.'/advanced-custom-fields-font-awesome/acf-font-awesome.php';

// acf_accordion
// include_once( CORE_PLUGINS_PATH.'/acf-accordion/acf-accordion-v5.php' );
// add_filter( 'acf/accordion/dir', 'acf_accordion_dir_' );
// function acf_accordion_dir_( $dir ) {
//     $dir = get_stylesheet_directory_uri() . '/inc/plugins/acf-accordion/';
//     return $dir;
// }

// acf-rgba-color
//include_once( CORE_PLUGINS_PATH.'/acf-rgba-color/acf-rgba-color-v5.php' );

// acf-typography
//include_once( CORE_PLUGINS_PATH.'/acf-typography/acf-typography-v5.php' );

// acf-advanced_taxonomy_selector
include_once( CORE_PLUGINS_PATH.'/acf-advanced-taxonomy-selector/acf-advanced_taxonomy_selector.php' );

// add plugins bfi tumb
require_once CORE_PLUGINS_PATH.'/BFI_Thumb.php';

/* autoload functions */

$dirs = array(
    CORE_PATH . '/post_types/',
    CORE_PATH . '/functions/',
    CORE_PATH . '/acf/',
);
foreach ($dirs as $dir) {
    $other_inits = array();
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (false !== ($file = readdir($dh))) {
                if ($file != '.' && $file != '..' && stristr($file, '.php') !== false) {
                    list($nam, $ext) = explode('.', $file);
                    if ($ext == 'php')
                        $other_inits[] = $file;
                }
            }
            closedir($dh);
        }
    }
    asort($other_inits);
    foreach ($other_inits as $other_init) {
        if (file_exists($dir . $other_init))
            include_once $dir . $other_init;
    }
} 

/* load integrate api functions */

$integrate_xola = get_field('integrate_xola_with_this_website', 'option');
$integrate_rezdy = get_field('rezdy', 'option');
$integrate_api = true;
$integrate_atlasx = get_field('integrate_atlasx_with_this_website', 'option');

// enable integrate, load cpt, angularjs
if ($integrate_api) {
   require_once CORE_PATH.'/init_api/post_type_api.php';
   require_once CORE_PATH.'/init_api/init_angular.php';  
}

// redzy api function + angular
if ($integrate_rezdy) {
   require_once CORE_PATH.'/rezdy_api/init.php';
}

// xola api function + angular
if ($integrate_xola) {
   require_once CORE_PATH.'/xola_api/init.php';
}

//atlasx api function 
if (!$integrate_xola && $integrate_atlasx) {
   require_once CORE_PATH.'/atlasx_api/init.php';
}