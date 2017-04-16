<?php  
/**
 * Additional Font Includer
 *
 * This Class allows you upload new fonts 
 * and use them with ACF Typography
 */


/**
 * Allows to upload fonts sources
 */
function afi_add_myme_types($mime_types){
    $mime_types['svg']   = 'image/svg+xml'; 
    $mime_types['eot']   = 'application/octet-stream'; 
    $mime_types['ttf']   = 'application/octet-stream'; 
    $mime_types['woff']  = 'application/font-woff'; 
    $mime_types['woff2'] = 'application/octet-stream'; 
    return $mime_types;
}

add_filter('upload_mimes', 'afi_add_myme_types', 1, 1);


/**
 * Root
 */
$additional_font_includer_path = get_stylesheet_directory() . '/includes/plugins/additional-fonts-includer';
define( 'ADI_PATH', $additional_font_includer_path ); 


/**
 * Root URI
 */
$additional_font_includer_path_uri = get_stylesheet_directory_uri() . '/includes/plugins/additional-fonts-includer';
define( 'ADI_PATH_URI', $additional_font_includer_path_uri ); 


/**
 * Include classes
 */
include_once ( ADI_PATH . '/class-aifont.php' );
include_once ( ADI_PATH . '/class-afincluder.php' );


/**
 * Put font in fonts storage
 * @param  [type] $acf_available_fonts [description]
 * @return [type]                      [description]
 */
function get_aifonts_from_dir( $font = '', $include = false ) {
	$available_fonts = array();
	$uploads_dir     = wp_upload_dir(); 
	$root            = $uploads_dir['basedir'] . '/aif';
	$uri             = $uploads_dir['baseurl'] . '/aif';
	$items           = scandir($root);

	foreach ( $items as $key => $value ) : 
		if ( substr($value, -3) === 'css' ): 
			$value = explode('.', $value);
			$name = $value[0];
			$available_fonts['aif_'.$name] = $name;
		endif;
	endforeach;

	if ( $font === '' ) {
		return $available_fonts;
	} elseif ( in_array( $font, $available_fonts ) ) {
		if (!$include) {
			return $available_fonts['aif_'.$font];
		} else {
			return "<link rel='stylesheet' href='{$uri}/{$name}.css' type='text/css'>";
		}
	} else {
		return false;
	}
} 


function is_aifont_exist( $font = '' ) {
	$uploads_dir = wp_upload_dir(); 
	$root        = $uploads_dir['basedir'] . '/aif';
	$file        = $root . '/' . $font . '.css'; 

	if (file_exists($file)) {
		return true;
	} else {
		return false;
	}
} 


/**
 * Delete font
 * @return [type] [description]
 */
function aif_delete_font( $font = '' ) {
	$available_fonts = array();
	$uploads_dir     = wp_upload_dir(); 
	$directory       = $uploads_dir['basedir'];
	$file            = $directory . '/aif/' . $font . '.css';

	if ( file_exists($file) ) :
		update_fonts_in_json($font);
		unlink($file);
		echo "<p style='color:green;'>Font {$font} was successful deleted!:D</p>";
	endif;

	return true;
}


/**
 * Delete unnessesary fonts
 */
function clear_unnessesarily_fonts_in_json() {
	$cleanJsonPath  = get_stylesheet_directory() . '/includes/plugins/acf-typography/gf_restore.json';
	$cleanJsonFile  = file_get_contents( $cleanJsonPath );

	$jsonPath  = get_stylesheet_directory() . '/includes/plugins/acf-typography/gf.json';

	$handle = fopen($jsonPath, 'w');

	fwrite($handle, $cleanJsonFile);
	fclose($handle);

	return true;
} 

/**
 * Update GF JSON file
 */
function update_fonts_in_json( $font = '' ) {
	clear_unnessesarily_fonts_in_json();

	$jsonPath  = get_stylesheet_directory() . '/includes/plugins/acf-typography/gf.json';
	$jsonFile  = file_get_contents( $jsonPath );
	$jsonArray = json_decode( $jsonFile, true );
	$jsonItems = $jsonArray['items'];
	$jsonCount = count($jsonItems);

	$existFonts = get_aifonts_from_dir();

	foreach ( $existFonts as $key => $family ) :
		$valid = true;

		for ( $i = 0; $i <= $jsonCount; $i++ ) :
			$ii = $jsonItems[$i];

			if ( $ii['family'] == $family ) :
				$valid = false;
			endif;	

			if ( $font != '' && $font == $ii['family'] ) :
				unset($jsonItems[$i]);
			endif;
		endfor;

		if ($valid) :
			$jsonItems[$jsonCount] = array( 'family' => $family );
			$jsonCount++;
		endif;
	endforeach;

	$jsonArray['items'] = $jsonItems;
	$jsonArray = json_encode($jsonArray);

	$handle = fopen($jsonPath, 'w');

	fwrite($handle, $jsonArray);
	fclose($handle);

	return $jsonArray;
}
add_action( 'upgrader_process_complete', 'update_fonts_in_json', 10, 2 );

?>