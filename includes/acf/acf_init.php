<?php 

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyBPKkzpIMMXwxRMfArXDyzKZiRqdBVsfu0');
}

add_action('acf/init', 'my_acf_init'); 