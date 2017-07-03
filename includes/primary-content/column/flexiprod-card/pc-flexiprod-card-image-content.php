<?php 
/**
 * Flexi prod card: Image content
 */


/**
 * Print price
 */
if ( $padding_top != '' ) : 
	?>

	<div class="pc--c__b-image_price fc_style--image_price"><?php echo $price; ?></div>
	
	<?php 
endif;


/**
 * Print title and description
 */
if ( 
	( 
		in_array( 'title', $flexi_attr[$key] ) 
		|| in_array( 'desc', $flexi_attr[$key] ) 
	) 
	&& ( $title || $desc ) 
) : 
	?>

	<div class="fc_style--image_text <?=$padding_top;?>">
		<?php 
		/**
		 * Print title
		 */
		if ( $title && in_array( 'title', $flexi_attr[$key] ) ) : 
			?>
			<div class="pc--c__b-image_title fc_style--image_title"><?=$title;?></div>
			<?php
		endif; 

		/**
		 * Print description
		 */
		if ( $desc && in_array( 'desc', $flexi_attr[$key] )  ) : 
			?>
			<div class="pc--c__b-image_description fc_style--image_desc"><?=$desc;?></div>
			<?php 
		endif; 
		?>

	</div>
	
	<?php 
endif; 

/**
 * Print label
 */
if ( $label && in_array( 'label', $flexi_attr[$key] ) ) : 
	?>
	<div class="pc--c__b-wrap-image_label">
		<div class="pc--c__b-image_label fc_style--image_label">
			<?php echo $label; ?>
		</div>
	</div>
	<?php 
endif; 
