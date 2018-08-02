<?php

$iframe = get_sub_field('tour_pc-bg__select-videoembed');
$type   = get_sub_field('videoembed-type');

	preg_match('/src="(.+?)"/', $iframe, $matches);
	$src = $matches[1];

  $params = array(
    'controls'    => 0,
    'autoplay'    => 1,
    'rel'         => 0,
    'showinfo'    => 0,
    'controls'	  => 0,
    'loop'        => 1,
  );

	if ($type && $type != 'auto') :
    $params['autoplay'] = 0;
	else:
    $params['autoplay'] = 1;
  endif;

	$new_src = add_query_arg($params, $src);

	$iframe = str_replace($src, $new_src, $iframe);

	$attributes = 'frameborder="0" class="pc--s__bg-embed pc--s__bg-embed_' . $type . '"';

	$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

	echo $iframe;

?>