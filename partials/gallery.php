<?php
/**
 * Gallery component
 *
 * @var $gallery - acf gallery field
 * @var $label - acf text field
 */

$label = $label ? $label : 'Click to view gallery';
$display_caption = $display_caption ? $display_caption : 0;

/**
 * Check whether the gallery has any images
 */
if ( $gallery ) :
  if ($type !== 'grid') :
    $gallery_id = generateRandomString(5);
    ?>

    <div class="slider-pro">
      <div class="slider-pro__cover">
        <a href="javascript:" class="slider-pro--preview">
          <div class="slider-pro--preview__image">
            <img src="<?=$gallery[0]['url'];?>" alt="">
              <?php if($display_caption && $gallery[0]['caption']) : ?>
                  <div class="slider-pro__img-caption first-caption" data-img-src="<?=$gallery[0]['url'];?>">
                      <span><?=$gallery[0]['caption']?></span>
                  </div>
              <?php endif; ?>
          </div>
        </a>
        <div class="slider-pro--panel">
          <span class="slider-pro--panel__btn"><?=$label;?></span>
        </div>
      </div>
      <div class="slider-pro__carousel" style="display:none;">
        <a href="javascript:" class="slider-pro__close-bg"></a>
        <a href="javascript:" class="slider-pro__close-link"></a>
        <div class="slider-pro__slider">
          <?php
          foreach ( $gallery as $key => $image ) :
            $the_image = "<img class=\"slider-image\" data-lazy='{$image['sizes']['large']}' data-img-width=\"{$image['width']}\" alt='' />";
            ?>
                <div>
                    <div class='slider-pro__item'>
                        <?=$the_image?>
                        <?php if($display_caption && $image['caption']) : ?>
                        <div class="slider-pro__img-caption">
                            <span class="slider-pro--panel__btn"><?=$image['caption']?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>

  <?php
  else :
    ?>

    <div class="gallery">

      <div class="gallery--wrapper gallery--count__<?php echo $columns; ?> gallery--onclick__<?php echo $onclick; ?>">
        <?php
        foreach ( $gallery as $key => $image ) :
          if ($onclick === 'source' || $onclick === 'popup') :
            ?>

            <a href="<?php echo $image['url']; ?>" class="gallery--item" title="<?php echo $image['alt']; ?>">
              <img data-aload='<?=$image['sizes']['large']?>' alt='<?php echo $image['alt']; ?>' />
            </a>

          <?php
          else :
            ?>

            <div class="gallery--item">
              <img data-aload='<?=$image['sizes']['large']?>' alt='<?php echo $image['alt']; ?>' />
            </div>

          <?php
          endif;
        endforeach;
        ?>
      </div>

    </div>

  <?php
  endif;
endif;
?>
