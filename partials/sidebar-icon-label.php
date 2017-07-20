<?php
/**
 * Sidebar component: Icon label
 */

$d             = array();
$d['type']     = get_sub_field( 'icon-type' );
$d['icon']     = get_sub_field( 'icon' );
$d['size']     = get_sub_field( 'size' ) ? 'style="font-size:' . get_sub_field( 'size' ) . 'px;"' : '';
$d['textarea'] = get_sub_field( 'textarea' );
$d['default']  = '<div class="product-sidebar__icongroup"><i class="fa fa-certificate"></i><i class="fa fa-check"></i></div>';

if ( $d['type'] == 'checklist' ) :
	$d['icon'] = $d['default'];
elseif ( $d['type'] == 'custom' ) :
	$d['icon'] = $d['icon'] ? "<i class='fa {$d['icon']}' {$d['size']}></i>" : $d['default'];
endif;
?>

<div class="product-sidebar--list">
	<div class="product-sidebar--list__icon"><?=$d['icon'];?></div>
	<div class="product-sidebar--list__label"><?=$d['textarea'];?></div>
</div>