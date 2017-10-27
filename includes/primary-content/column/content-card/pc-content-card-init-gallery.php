<?php 

/**
* Gallery panel bg
*/
$gallery_style = get_sub_field('gallery-panel-bg');
if ( $gallery_style ) {
	$css = '#pc_wrap .' . $cc_style . ' .slider-pro--panel  {';

		$css .= "background-color: $gallery_style;";

	$css .= '}'; 

	echo $css;
}
        
/**
* Gallery panel color
*/
$gallery_style = get_sub_field('gallery-panel-font');
if ( $gallery_style ) { 
	$css = '#pc_wrap .' . $cc_style . ' .slider-pro--panel__btn {';

		$css .= "color: $gallery_style!important;";

	$css .= '}';    

	echo $css;
}
        
/**
* Gallery panel border
*/
$gallery_style = get_sub_field('gallery-panel-border');
if ( $gallery_style ) {   
	$css = '#pc_wrap .' . $cc_style . ' .product-sidebar--button {';

		$css .= "border: 1px solid $gallery_style;";
		$css .= "padding: 9px 18px;";
		$css .= "display:inline-block;";

	$css .= '}';

	echo $css;
}