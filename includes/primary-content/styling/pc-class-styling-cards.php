<?php
/* =======================
 * Styling Cards Class
 * ==================== */

abstract class StylingCard {


	public $name = '';
	public $slug = '';
	public $url ='';
	public $version = 1.0;


	function __construct( $name, $version, $multiply = false ){

		$this->name = $name;
		$this->slug = transform_name( $this->name, '_' );
		$this->url = transform_name( $this->name, '-' );
    $this->version  = $version;
    $this->multiply = $multiply;

		/* Create database */
		add_action( 'init', array( $this, 'create_db' ) );

		/* Init ACF Option pages */
		$this->init_acf_option_page();

		/* Init ACF field group  */
		$this->init_local_field_group();

	}

	/**
	 * Return object name
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Return object slug
	 * @return string
	 */
	public function get_slug() {
		return $this->slug;
	}

	/**
	 * Return object url
	 * @return string
	 */
	public function get_url() {
		return $this->url;
	}


	/**
	 * Create table in database
	 * which will keep the styles count.
	 *
	 * @return null
	 */
	public function create_db() {
		global $wpdb;

		$table_name = $wpdb->prefix . $this->slug;
		$charset_collate = $wpdb->get_charset_collate();

		if ( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				PRIMARY KEY ID (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );

			pc_add_style( $this->slug );
		}

		return null;
	}


	/**
	 * Init ACF option pages
	 * @return null
	 */
	protected function init_acf_option_page() {

		/**
		 * Page where will store rows
		 */
		acf_add_options_sub_page( array(
			'page_title' 	=> $this->name . ' Styles',
			'menu_title' 	=> $this->name . ' Styles',
			'parent_slug' 	=> 'acf-options-primary-area-styles',
		) );

	}


	/**
	 * Init ACF Fields
	 * @return array
	 */
	protected function init_acf_fields() {

		$fc_styles = get_pc_styles_count( $this->slug );
		$fc_rows = array();

		for ( $i = 1; $i <= $fc_styles; $i++ ) {
			$c = create_style_prefix($i);

			$fc_rows[] = $this->return_acf_accordion( $i, $c );
			$fc_rows[] = $this->return_acf_group( $i, $c );
		}

		return $fc_rows;

	}


	/**
	 * Return Accordion with style title
	 * @return array
	 */
	protected function return_acf_accordion( $i = '', $c = '' ) {

		$fc_tab_array = array (
			'key' => $this->slug . $i . '_5835b88aa5b47',
			'label' => 'Style ' . $i,
			'name' => 'style_' . $i,
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'icon_class' => 'dashicons-arrow-right',
		);

		return $fc_tab_array;

	}


	/**
	 * Return Fields
	 * Each extended class must rewrite current method
	 * @return array
	 */
	abstract protected function return_acf_group( $i = '', $c = '' );


	/**
	 * Register rows
	 * in ACF Local field group
	 *
	 * @return null
	 */
	protected function init_local_field_group() {

		$fc_rows = $this->init_acf_fields();

		acf_add_local_field_group(array (

			'key' => 'group_optioncss' . $this->slug,
			'title' => $this->name . ' styles',
			'fields' => $fc_rows,
			'location' => array (
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-' . $this->url . '-styles'
					)
				)
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',

		));

		if (!$this->multiply)
		  acf_add_local_field_group(array (
			'key' => 'group_' . $this->slug . '355b9b1',
			'title' => $this->name . ' styles manager',
			'fields' => array (
				array (
					'key' => $this->slug . 'field_58ac165174538',
					'label' => 'Add/remove',
					'name' => $this->url . '-manager',
					'type' => 'styling_manager',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'styling_group' => $this->slug,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-' . $this->url . '-styles',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

		return null;

	}


	/**
	 * Return fonts
	 */
	function get_available_fonts() {
        return null;
	}


	/**
	 * Backfont
	 */
	const BACK_FONTS = array(
		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
		'"Arial Black", Gadget, sans-serif' => '"Arial Black", Gadget, sans-serif',
		'"Bookman Old Style", serif' => '"Bookman Old Style", serif',
		'"Comic Sans MS", cursive' => '"Comic Sans MS", cursive',
		'Courier, monospace' => 'Courier, monospace',
		'Garamond, serif' => 'Garamond, serif',
		'Georgia, serif' => 'Georgia, serif',
		'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
		'"Lucida Console", Monaco, monospace' => '"Lucida Console", Monaco, monospace',
		'"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		'"MS Sans Serif", Geneva, sans-serif' => '"MS Sans Serif", Geneva, sans-serif',
		'"MS Serif", "New York", sans-serif' => '"MS Serif", "New York", sans-serif',
		'"Palatino Linotype", "Book Antiqua", Palatino, serif' => '"Palatino Linotype", "Book Antiqua", Palatino, serif',
		'Tahoma,Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
		'"Times New Roman", Times,serif' => '"Times New Roman", Times, serif',
		'"Trebuchet MS", Helvetica, sans-serif' => '"Trebuchet MS", Helvetica, sans-serif',
		'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif',
	);

}

?>
