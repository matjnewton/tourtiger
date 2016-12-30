		<!-- primary_content_content_card layout -->
        <?php if( get_row_layout() == 'primary_content_content_card'):
	        $primary_content_content_card_style = get_sub_field('primary_content_content_card_style'); 
	        $primary_content_content_card_image = get_sub_field('primary_content_content_card_image');
	        $primary_content_content_card_headline = get_sub_field('primary_content_content_card_headline'); 
	        $primary_content_content_card_seo_tag = get_sub_field('primary_content_content_card_seo_tag');
	        $primary_content_content_card_hr_line = get_sub_field('primary_content_content_card_hr_line');
	        $primary_content_content_card_editor = get_sub_field('primary_content_content_card_editor');
	        $params_card_image = array( 'width' => 757, 'height' => 162 );
	        //var_dump($primary_content_content_card_style);
	        ?>
	        <?php if ($primary_content_content_card_style == 'Style 1') : ?>
	        	<div class="product_content_wrapper primary_content_content_card style1">
	        		<div class="primary_content_content_card_wrap">
	        			<<?php echo $primary_content_content_card_seo_tag; ?> class="primary_content_subhead primary_content_content_card_headline <?php echo $hr_line;?>"><?php echo $primary_content_content_card_headline; ?></<?php echo $primary_content_content_card_seo_tag; ?>>
	        		</div>
	        		<?php if ($primary_content_content_card_hr_line) {  ?>
						<hr class="primary_content_content_card_hr_line">
	        		<?php } ?>
	        		<div class="primary_content_content_card_wrap">
	        			<img src="<?php echo bfi_thumb( $primary_content_content_card_image['url'], $params_card_image ); ?>" class="img-responsive"/>
	        		</div>
	        		<?php if ( $primary_content_content_card_editor) : ?>
		        		<div class="primary_content_content_card_wrap">
		        			<?php echo $primary_content_content_card_editor; ?>
		        		</div>
		        	<?php endif; ?>
	        		<div class="primary_content_content_card_wrap">
	        		</div>
	        	</div>
	        <?php elseif ($primary_content_content_card_style == 'Style 2') : ?>
		        <div class="product_content_wrapper primary_content_content_card style2">
		        	<div class="primary_content_content_card_headline_wrap" style="background-image: url('<?php echo bfi_thumb( $primary_content_content_card_image['url'], $params_card_image ); ?>');">
		        		<<?php echo $primary_content_content_card_seo_tag; ?> class="primary_content_subhead primary_content_content_card_headline"><?php echo $primary_content_content_card_headline; ?></<?php echo $primary_content_content_card_seo_tag; ?>>
		        	</div>
		        	<div class="primary_content_content_card_editor">
		        		<?php echo $primary_content_content_card_editor; ?>
		        	</div>
		        </div>
		    <?php elseif ($primary_content_content_card_style == 'Style 3') : ?>
		    	<?php $params_card_image_style3 = array( 'width' => 300, 'height' => 200 ); ?>
		    	<?php if ($primary_content_content_card_hr_line) { $hr_line = 'hr_line'; } else { $hr_line = ''; } ?>
		    	<div class="product_content_wrapper primary_content_content_card style3">

				    <div class="row">
		               <div class="col-md-5">
		               		<img src="<?php echo bfi_thumb( $primary_content_content_card_image['url'], $params_card_image_style3 ); ?>" class="img-responsive"/>
		               	</div>
		                <div class="col-md-7">
		                	<<?php echo $primary_content_content_card_seo_tag; ?> class="primary_content_subhead primary_content_content_card_headline <?php echo $hr_line;?>"><?php echo $primary_content_content_card_headline; ?></<?php echo $primary_content_content_card_seo_tag; ?>>

		               		<div class="primary_content_content_card_editor">
		               			<?php echo $primary_content_content_card_editor; ?>
		               		</div>
		               	</div>
		            </div>

		        </div>
		    <?php endif; ?>

	        <?php 
	    endif;?> 