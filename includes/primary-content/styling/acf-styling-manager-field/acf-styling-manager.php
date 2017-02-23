<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( !class_exists('acf_plugin_styling_manager') ) :

class acf_plugin_styling_manager {
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// vars
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> STYLING_MANAGER_DIR,
			'path'		=> STYLING_MANAGER_DIR
		);
		
		
		// set text domain
		// https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
		load_textdomain( 'acf-styling_manager', false, STYLING_MANAGER_DIR . '/lang' ); 
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field_types')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field_types')); // v4
		
	}
	
	
	/*
	*  include_field_types
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	n/a
	*/
	
	function include_field_types( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// include
		include_once( STYLING_MANAGER_DIR . '/fields/acf-styling-manager-v' . $version . '.php');
		
	}
	
}


// initialize
new acf_plugin_styling_manager();


// class_exists check
endif;
	
?>