<?php
/**
 * Sidebar component: Button
 */

$d                = array();
$d['is_dropdown'] = get_sub_field( 'is_dropdown' );
$d['label']       = get_sub_field( 'label' ) ? get_sub_field( 'label' ) : 'Book now';
$d['type']        = get_sub_field( 'type' ) ? get_sub_field( 'type' ) : 'link';
$d['action']      = get_sub_field( 'action' ) ? get_sub_field( 'action' ) : '#.';

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

// echo '<pre style="font-size:12px;">';
// print_r($d);
// echo '</pre>';


/**
 * According to type of the button
 * Generate the button component
 */
$d['html'] = '';

/**
 * If it's muliply-dropdown
 */
if ( is_array( $d['action'] ) ) :
	$d['html'] .= "<a href='javascript:' data-type='dropdown' class='product-sidebar--button product-sidebar--button_dropdown'>{$d['label']}</a>";
	$d['html'] .= '<div class="product-sidebar--button__dropdown">';

	foreach ( $d['action'] as $a ) :
		$d['html'] .= "<a href='{$a['action']}' data-type='{$a['type']}' class='product-sidebar--button__sub'>{$a['label']}</a>";
	endforeach;

	$d['html'] .= '</div>';

/**
 * If it's simple button
 */
else:
	$d['html'] .= "<a href='{$d['action']}' data-type='{$d['type']}' class='product-sidebar--button'>{$d['label']}</a>";	
endif;

echo $d['html'];