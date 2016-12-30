
		<!--Horizontal Line-->
        <?php if( get_row_layout() == 'primary_content_horizontal_line'):
	        $primary_content_horizontal_line_padding = get_sub_field('primary_content_horizontal_line_padding'); ?>
	        <div class="product_content_wrapper primary_content_horizontal_line">
	        	<hr class="primary_content_content_card_hr_line" style="margin-top: <?php echo $primary_content_horizontal_line_padding; ?>px; margin-bottom: <?php echo $primary_content_horizontal_line_padding; ?>px;">
	        </div>
	        <?php 
	    endif; ?> 