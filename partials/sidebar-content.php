<?php
/**
 * Sidebar component: Content
 */

$d            = array();
$d['content'] = get_sub_field( 'editor' );

echo "<div class='wysiwyg'>{$d['content']}</div>";