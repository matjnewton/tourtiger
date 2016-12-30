		<!-- primary_content_content_editor layout -->
        <?php if( get_row_layout() == 'primary_content_content_editor'):
	        $primary_content_content_editor_label = get_sub_field('primary_content_content_editor_label'); 
	        $primary_content_content_editor_content = get_sub_field('primary_content_content_editor_content');
	        $primary_content_linked_to_button = get_sub_field('primary_content_linked_to_button'); 
	        $primary_content_content_editor_seo_tag = get_sub_field('primary_content_content_editor_seo_tag'); ?>

	        <div class="product_content_wrapper primary_content_content_editor">
	        	<?php echo '<'.$primary_content_content_editor_seo_tag.' class="primary_content_subhead customstyle">'.$primary_content_content_editor_label.'</'.$primary_content_content_editor_seo_tag.'>';?>
	        	<div class="primary_content_content_editor_content">
	        		<?php echo $primary_content_content_editor_content; ?>
	        	</div>
	        </div>
	        <?php 
	    endif; ?> 