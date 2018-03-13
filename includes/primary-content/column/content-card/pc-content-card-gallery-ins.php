<?php
/**
 * Instagram component
 */
$d = [
    'type'         => get_sub_field('inst_type'),
    'count'        => get_sub_field('inst_count'),
    'columns'      => get_sub_field('inst_columns'),
    'rest'         => get_sub_field('inst_rest'),
    'onclick'      => get_sub_field('inst_onclick'),
    'user-details' => get_sub_field('inst_user-details'),
    'img-resolution' => get_sub_field('inst_img-resolution') ? get_sub_field('inst_img-resolution') : 'thumbnail',
    'token'          => get_field('insta_token','apikey'),
];

$root = 'https://api.instagram.com/v1';
$endpoint = '';
$params = [];

// set endpoint
switch ($d['type']) :
  default:
    $endpoint = 'users/self/media/recent';

    // pass params
    if ($d['count'])
      $params['count'] = $d['count'];

    if ($d['token'])
      $params['access_token'] = $d['token'];

    $params = http_build_query($params);

    // requesting
    $response = json_decode(get( "$root/$endpoint/?$params" ), true);
    break;
endswitch;

if ($d['rest']) :
  switch ($d['rest']) :
    case 'instagram':
      $d['rest-button'] = get_button(
        ['type' => 'url', 'url' => '#.', 'label' => __('See more')],
        ['button', 'instagram--see-more']
      );
      break;
  endswitch;
endif;

if ( $d['token'] && isset($response['data']) ) :

  $attrs = convert_html_attributes([
    convert_html_attributes([
      'instagram',
      "instagram_{$d['type']}",
      $d['columns'] ? "columns_{$d['columns']}" : '',
      $d['rest'] ? "rest_{$d['rest']}" : '',
    ], 'class')
  ]);
  ?>

  <div <?=$attrs;?>>

    <?php if ($d['user-details']) : ?>

      <div class="instagram--user">
        <a
            href='<?="https://instagram.com/{$response['data'][0]['user']['username']}";?>'
            class='instagram--user__picture'
            target='_blank'>
          <img src='data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' data-aload='<?=$response['data'][0]['user']['profile_picture'];?>'
               alt='Instagram | Username: <?=$response['data'][0]['user']['username'];?>' />
        </a>
        <p class="instagram--user__name">
          <a href="<?="https://instagram.com/{$response['data'][0]['user']['username']}";?>"
             target='_blank'>
            <?=$response['data'][0]['user']['username'];?>
          </a>
        </p>
      </div>

    <?php endif; ?>

    <div class="instagram--items">
      <?php
      if ( $d['onclick'] === 'instagram' ) :
        foreach ($response['data'] as $item) :
          ?>

          <a href="<?=$item['link'];?>" target="_blank" class="instagram--item instagram--item_link">
            <?=get_instagram_image_temp($item['images'][$d['img-resolution']]['url']);?>
            <span class="instagram--item__meta">
            <span class="instagram--item__meta-item">
              <i class="fa fa-heart"></i> <?=$item['likes']['count'];?>
            </span>

            <span class="instagram--item__meta-item">
              <i class="fa fa-comment"></i> <?=$item['comments']['count'];?>
            </span>
          </span>
          </a>

        <?php
        endforeach;
      else :
        foreach ($response['data'] as $item) :
          ?>

          <div class="instagram--item">
            <?=get_instagram_image_temp($item['images'][$d['img-resolution']]['url']);?>
          </div>

        <?php
        endforeach;
      endif;
      ?>
    </div>

    <?=isset($d['rest-button']) ? str_replace( '#.' , "https://instagram.com/{$response['data'][0]['user']['username']}"
      , $d['rest-button']) : '';?>

  </div>

  <?php
endif;
?>