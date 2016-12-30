		<!-- highlights layout -->
        <?php if( get_row_layout() == 'primary_content_highlights'):
	        $primary_content_columns = get_sub_field('primary_content_columns'); ?>
	        <div class="product_content_wrapper primary_content_highlights">
	        	<h3 class="primary_content_subhead">Highlights</h3>

	        	<?php $highlights_options = get_sub_field('highlights_options');
					if($highlights_options) : ?>
						<ul class="highlights_options customstyle">
							<?php foreach($highlights_options as $row) { ?>
								<li style="<?php if ($primary_content_columns == 2) { echo 'width:49%;'; } else { echo 'width:100%;'; } ?>">
									<i class="fa fa-certificate"></i>
									<i class="fa fa-check"></i>
									<span><?php echo $row['primary_content_highlights_text']; ?></span>
								</li>
							<?php } ?>
						</ul>
					<?php endif; //end repeter ?>


	        </div>
	        <?php 
	    endif; ?> 