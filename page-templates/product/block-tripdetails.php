<!-- trip_details layout -->
        <?php
        	$random_key = generateRandomString(5);

         if( get_row_layout() == 'primary_content_trip_details'):
	        $primary_content_columns = get_sub_field('primary_content_columns');
	        $primary_content_trip_details_title = get_sub_field('primary_content_trip_details_title'); ?>
	        
	        <div class="product_content_wrapper primary_content_trip_details">
	        	
	        	<?php if ($primary_content_trip_details_title) : ?>
	        		<h3 class="primary_content_subhead"><?php echo $primary_content_trip_details_title; ?></h3>
	        	<?php endif; ?>

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
									

									<?php if ($row['primary_content_additional_detail'] && $row['primary_content_additional_detail_full_width'] ) : ?>
										<!-- additional_detail full-->
										<span class="primary_trip_details_detail customstyle">
										   <?php echo $row['primary_trip_details_detail']; ?>
												<a href="javascript:" class="primary_content_additional_link_label" type="button" data-toggle="collapse" data-target="#primary_content_additional_content_<?php echo $random_key; ?>" aria-expanded="false" aria-controls="primary_content_additional_content">
												   <?php echo $row['primary_content_additional_link_label']; ?>
												</a>
										</span>
										<div class="collapse primary_trip_details_detail_collapse_full_width customstyle" id="primary_content_additional_content_<?php echo $random_key; ?>">
										  <div class="">
										    <?php echo $row['primary_content_additional_content']; ?>
										  </div>
										</div>
									<?php else: ?>
										<!-- additional_detail one col-->
										<span class="primary_trip_details_detail customstyle">
										   <?php echo $row['primary_trip_details_detail']; ?>
										   <?php if ($row['primary_content_additional_detail']) : ?>
												<a href="javascript:" class="primary_content_additional_link_label" type="button" data-toggle="collapse" data-target="#primary_content_additional_content_<?php echo $random_key; ?>" aria-expanded="false" aria-controls="primary_content_additional_content">
												   <?php echo $row['primary_content_additional_link_label']; ?>
												</a>

												<div class="collapse" id="primary_content_additional_content_<?php echo $random_key; ?>">
												  <div class="">
												    <?php echo $row['primary_content_additional_content']; ?>
												  </div>
												</div>
											<?php endif; ?>
										</span>
									<?php endif; ?>

								</li>
							<?php } ?>
						</ul>
					<?php endif; //end repeter ?>
	        </div>

	        <?php 
	    endif;?> 