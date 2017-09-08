<?php 
/**
 * Gallery component
 * 
 * @var $gallery - acf gallery field
 * @var $label - acf text field
 */

$label         = $label ? $label : 'Click to view gallery';

/**
 * Check whether the gallery has any images
 */
if ( $gallery ) :
	$gallery_id = generateRandomString(5);
	?>

	<div class="slider-pro">
		<div class="slider-pro__cover">
			<a href="javascript:" class="slider-pro--preview">
				<div class="slider-pro--preview__image">
					<img src="<?=$gallery[0]['url'];?>" alt="">
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
					$the_image = "<img data-lazy='{$image['sizes']['large']}' alt='' />";
					echo "<div><div class='slider-pro__item'>{$the_image}</div></div>";
				endforeach; 
				?>
			</div>
		</div>
	</div>

	<?php
endif;
?>