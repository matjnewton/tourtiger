<!-- availability checker layout -->

        <?php if( get_row_layout() == 'primary_content_availability_checker'):
	        $our_tours_checker = get_sub_field('our_tours_checker'); ?>
	        <?php //var_dump($our_tours_checker); ?>

	        <div class="product_content_wrapper primary_content_availability_checker " ng-app="wqs_xola_check">
				<div class="container_availability_checker" ng-controller="wqs_search_controller">	
					
					<input type="hidden" id="wqs_api_url" value="<?php echo getWqsApiUrl(); ?>">
                	<input type="hidden" id="wqs_productcode" value="<?php echo get_field("xola_id", $our_tours_checker); ?>">

					<div class="availability_checker_options_date">
	                    <div class="add-on col-startTime">
	                        <input name="startTime_check" id="startTime_check" class="form-control rezdy_date" type="text" placeholder="Select Your Date" />
	                        <i class="fa fa-calendar cal" aria-hidden="true"></i>
	                    </div>

						<!-- timeSelected -->
	                    <div class="add-on">
                            <span ng-repeat="(key, api_availability) in api_availability_xola track by $index" >
                            	<span class="_search-descript-departure-xola" ng-repeat="(key, api_availability2) in api_availability track by $index" >
                            		<span ng-if="key != 'productCode'">
                            			<select ng-init="timeSelected=0" ng-model="timeSelected" ng-change="changedValue(timeSelected)" class="form-control rezdy_date timeSelected" >
										    <option ng-selected="$first" ng-repeat="(key, value) in api_availability2" value="{{value}}" class="timeSelected_options">{{parseFloat(key)}}</option>
										</select>
                            		</span>
                            	</span>
                            </span>
	                    </div>

	                    <div class="add-on col-book-btn2-product">
							<span class="book-btn2-product">
	                            <div class="book-btn2-product-title" ng-click="check_availability_xola(); $event.stopPropagation();">
	                                <span>CHECK AVAILABILITY</span>
	                            </div>    
	                        </span>
	                    </div>
	                </div>


					<!-- seats -->
	                    <ul class="availability_checker_options">
	                    	<li class="productss" ng-repeat="(key, api_availability_) in api_availability_xola[0] track by $index" ng-if="(key | asDate) == (timearray[0] | asDate) ">
	                    		
		                    	<span class="availability_checker_col checker_date customstyle">{{timearray[0] | asDateTitleYears}}</span>
		                    	<span class="availability_checker_col checker_avail customstyle" ng-if="timeSelected !=0">
									<i class="fa fa-check"></i>
									<span class="checker_date_label">Available</span>
								</span>
								<span class="availability_checker_col checker_avail not customstyle" ng-if="timeSelected ==0">
									<i class="fa fa-close"></i>
									<span class="checker_date_label">Not Available</span>
								</span>
								<span ng-model="timeSelected" class="availability_checker_col checker_count customstyle" ng-if="timeSelected !=0">Only {{timeSelected}} Spots Left for this Date</span>	
		                    	<span ng-model="timeSelected" class="availability_checker_col checker_count customstyle" ng-if="timeSelected ==0"></span>	
		                    </li>
	                    </ul>

				</div>
	        </div>

            <script type="text/javascript">
                jQuery(function() {

                    jQuery("#startTime_check").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                    });

                });
            </script>

	        <?php 
	    endif;?> 