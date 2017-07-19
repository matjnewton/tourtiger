<?php
/**
 * Sidebar component: Button
 */

$d                = array();
$d['is_dropdown'] = get_sub_field( 'is_dropdown' );
$d['label']       = get_sub_field( 'label' );
$d['type']        = get_sub_field( 'type' );
$d['action']      = get_sub_field( 'action' );

/**
 * Multiply options
 */
if ( $d['is_dropdown'] ) :
	if ( have_rows( 'dropdown' ) ) :
		$d['action'] = array ();
		$count = 1;

		while ( have_rows( 'dropdown' ) ) :
			the_row();
			$array = array(
				'label'  => get_sub_field( 'label' ),
				'type'   => get_sub_field( 'type' ),
				'action' => get_sub_field( 'action' )
			);

			$d['action'][$count] = $array;
			$count++;
		endwhile;
	endif;
endif;