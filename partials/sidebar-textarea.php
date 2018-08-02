<?php
/**
 * Sidebar component: Content
 */

$d             = array();
$d['textarea'] = get_sub_field( 'textarea' );

echo "<div class='child-full-width'>{$d['textarea']}</div>";