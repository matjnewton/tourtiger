<!-- trip_details layout -->
        <?php if( get_row_layout() == 'primary_content_trip_details'):
	        $primary_content_columns = get_sub_field('primary_content_columns'); ?>
	        
	        <div class="product_content_wrapper primary_content_trip_details">
	        	
	        	<h3 class="primary_content_subhead">Essential info</h3>

	        	<?php $trip_details_options = get_sub_field('trip_details_options');
					if($trip_details_options) : ?>
						<ul class="trip_details_options">
							<?php foreach($trip_details_options as $key=>$row) { ?>
								<li>

									<?php if ($row['primary_content_include_icon']) : ?>
										<?php $include_icon = 'include_icon'; ?>
										<i class="fa <?php echo $row['primary_content_include_icon_icon']; ?>"></i>
									<?php else: ?>
										<?php $include_icon = ''; ?>
									<?php endif; ?>
									<span class="primary_trip_details_label <?php echo $include_icon; ?> customstyle"><?php echo $row['primary_trip_details_label']; ?></span>
									<span class="primary_trip_details_detail customstyle"><?php echo $row['primary_trip_details_detail']; ?></span>
								    
								   <?php if ($row['primary_content_additional_detail']) : ?>
										<div class="primary_content_additional_link_label" type="button" data-toggle="collapse" data-target="#primary_content_additional_content_<?php echo $key; ?>" aria-expanded="false" aria-controls="primary_content_additional_content">
										   <?php echo $row['primary_content_additional_link_label']; ?>
										</div>

										<div class="collapse" id="primary_content_additional_content_<?php echo $key; ?>">
										  <div class="">
										    <?php echo $row['primary_content_additional_content']; ?>
										  </div>
										</div>
									<?php endif; ?>

								</li>
							<?php } ?>
						</ul>
					<?php endif; //end repeter ?>
	        </div>

	        <?php 
	    endif;?> 