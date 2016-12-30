		<!-- special_content layout -->
        <?php if( get_row_layout() == 'primary_content_special_content'):
	        $primary_content_special_content_text = get_sub_field('primary_content_special_content_text'); ?>
	        <div class="product_content_wrapper primary_content_special_content customstyle">
	        	<p><?php echo $primary_content_special_content_text; ?></p>
	        </div>
	        <?php 
	    endif; 