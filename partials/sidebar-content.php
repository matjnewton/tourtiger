<?php
/**
 * Sidebar component: Content
 */

$d            = array();
$d['content'] = get_sub_field( 'content' );

echo "<div class='wysiwyg'>{$d['content']}</div>";