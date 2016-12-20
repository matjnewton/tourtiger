<?php

	add_action("wp_footer", "add_primary_area_cache_top", 1);
	add_action("wp_footer", "add_primary_area_cache_bottom", 1);

	function add_primary_area_cache_top() {

		$url = $_SERVER["SCRIPT_NAME"];
		$break = Explode('/', $url);
		$file = $break[count($break) - 1];
		$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
		$cachetime = 18000;

		if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
		    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
		    include($cachefile);
		    exit;
		}
		ob_start();

	}

	function add_primary_area_cache_bottom() {

		$cached = fopen($cachefile, 'w');
		fwrite($cached, ob_get_contents());
		fclose($cached);
		ob_end_flush();

	}

?>