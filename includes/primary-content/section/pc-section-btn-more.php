<?php
/**
 * Show more/less button
 */
?>

<div id="<?=$load_more_id;?>" class="pc-section--btn-more <?=$load_style;?>">
	<div class="pc-section--btn-more__box">
		<a 
			href="javascript:"
			class="pc-section--btn-more__button js-more" 
			data-load-offset="<?=$load_offset;?>"
			data-load-init="<?=$initial_rows;?>"
			data-original="<?=$initial_rows;?>"
			data-total-rows="<?=$rows_count;?>"><?=$more_label;?></a>

		<a 
			href="javascript:"
			class="pc-section--btn-more__button js-less" 
			data-total-rows="<?=$rows_count;?>"
			style="display:none;"><?=$less_label;?></a>
	</div>
</div>