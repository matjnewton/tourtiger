<!-- availability checker layout -->

        <?php if( get_row_layout() == 'primary_content_availability_checker'):
	        $our_tours_checker = get_sub_field('our_tours_checker'); 
	        $rezdy_price_options = get_field('rezdy_price_options', 'options');
	        //var_dump($rezdy_price_options);
	         ?>
	        <?php //var_dump($our_tours_checker); ?>

	        <div class="product_content_wrapper primary_content_availability_checker " ng-app="wqs_3" ng-cloak>
				<div class="container_availability_checker" ng-controller="wqs_search_controller">	
					
					<input type="hidden" id="wqs_api_url" value="<?php echo getWqsApiUrl(); ?>">
                	<input type="hidden" id="wqs_productcode" value="<?php echo get_field("productcode", $our_tours_checker); ?>">

					<div class="availability_checker_options_date">
	                    <div class="add-on col-startTime">
	                        <input name="startTime_check" id="startTime_check" class="form-control rezdy_date" type="text" placeholder="Select Your Date" />
	                        <i class="fa fa-calendar cal" aria-hidden="true"></i>
	                    </div>

	                    <!-- multitime rezdy timeSelected -->
	                    <?php if($rezdy_price_options): ?>
		                    <div class="add-on multitime">
		                    	<span ng-repeat = "products in api_availability track by $index">
		                    		<span ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && (productss.startTimeLocal | asDate) == (timearray | asDate)">
		                    			<select class="form-control rezdy_date timeSelected" ng-init="timeSelected='0'" ng-model="timeSelected" ng-change="changedValue(timeSelected)">
										    <option  ng-selected="$first" ng-repeat="priceOptions in productss.priceOptions track by $index" ng-if="$index==0" value="{{priceOptions.id}}" class="timeSelected_options">{{priceOptions.label}} (${{priceOptions.price}})</option>
										    <!-- <option  ng-selected="$first" ng-repeat="priceOptions in productss.priceOptions track by $index" ng-if="$index!=0"  value="{{priceOptions.id}}" class="timeSelected_options">{{priceOptions.label}} (${{priceOptions.price}})</option> -->
										</select>
									</span>
								</span>
		                    </div>
		                <?php else : ?>
			                <div class="add-on">
		                    	<span ng-repeat = "products in api_availability track by $index">
									<span ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && (productss.startTimeLocal | asDate) == (timearray | asDate)">
										<input class="form-control rezdy_date" value="{{productss.startTimeLocal | asTimeLocal}}">
									</span>
								</span>
		                    </div>
		                <?php endif; ?>

	                    <div class="add-on col-book-btn2-product">
							<span class="book-btn2-product">
	                            <div class="book-btn2-product-title" ng-click="check_availability_angular(); $event.stopPropagation();">
	                                <span>CHECK AVAILABILITY</span>
	                            </div>    
	                        </span>
	                    </div>
	                </div>

	<!-- 				<div class="availability_checker_options_date design2">
	                    <div class="add-on col-startTime-label">
	                    	<span>Select Your Date:</span>
	                    </div>
	                    <div class="add-on col-startTime">
	                        <input name="startTime" id="startTime" class="form-control rezdy_date" type="text" placeholder="Select Your Date" />
	                        <i class="fa fa-calendar cal" aria-hidden="true"></i>
	                    </div>
	                    <div class="add-on col-book-btn2-product">
							<a href="#" class="book-btn2-product">
	                            <div class="book-btn2-product-title">
	                                <span>CHECK AVAILABILITY</span>
	                            </div>    
	                        </a>
	                    </div>
	                </div> -->

	<!-- 				<ul class="availability_checker_options design2">
						<li>
							<span class="availability_checker_col checker_date customstyle">26 September 2016</span>
							<span class="availability_checker_col checker_avail customstyle">
								<i class="fa fa-check"></i>
								<span class="checker_date_label">Available</span>
							</span>
							<span class="availability_checker_col checker_count customstyle">Only 6 Spots Left for this Date</span>
						</li>
						<li>
							<span class="availability_checker_col checker_date customstyle">27 September 2016</span>
							<span class="availability_checker_col checker_avail customstyle">
								<i class="fa fa-check"></i>
								<span class="checker_date_label">Available</span>
							</span>
							<span class="availability_checker_col checker_count customstyle">Only 6 Spots Left for this Date</span>
						</li>
						<li>
							<span class="availability_checker_col checker_date customstyle">28 September 2016</span>
							<span class="availability_checker_col checker_avail not customstyle">
								<i class="fa fa-close"></i>
								<span class="checker_date_label">Not Available</span>
							</span>
							<span class="availability_checker_col checker_count customstyle"></span>
						</li>
					</ul> -->

					<ul class="availability_checker_options">

						<div id="ajax_preLoading3" class="preLoading3" ng-show="loading"></div>
						<li ng-if="productUndefined()!=true" ng-hide="loading" class="notour">No tour on this date</li>	
						<span ng-repeat = "products in api_availability track by $index">

							<li ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && (productss.startTimeLocal | asDate) == (timearray | asDate)">

								<span class="availability_checker_col checker_date customstyle">{{productss.startTimeLocal | asDateTitleYears}}</span>
								<span class="availability_checker_col checker_avail customstyle" ng-if="productss.seatsAvailable !=0">
									<i class="fa fa-check"></i>
									<span class="checker_date_label">Available</span>
								</span>
								<span class="availability_checker_col checker_avail not customstyle" ng-if="productss.seatsAvailable ==0">
									<i class="fa fa-close"></i>
									<span class="checker_date_label">Not Available</span>
								</span>		
								<!-- <span class="availability_checker_col checker_count customstyle" ng-if="productss.seatsAvailable !=0">Only {{productss.seatsAvailable}} spots Left for this Date</span> -->
								<span class="availability_checker_col checker_count customstyle" ng-if="productss.seatsAvailable !=0">Only {{timeSelected}} spots Left for this Date</span>
								<span class="availability_checker_col checker_count customstyle" ng-if="productss.seatsAvailable ==0"></span>
						
<!-- 									productss.startTime: {{productss.startTime | asDateTitleYears}}
									productss.startTime asTime: {{productss.startTime | asTime}}
									productss.seatsAvailable {{productss.seatsAvailable}} -->
							 <!-- {{productss.startTime | asTime}} -->
							</li>
						</span>
					</ul>

<!-- 					<ul class="availability_checker_options">
						<li>
							<span class="availability_checker_col checker_date customstyle">26 September 2016</span>
							<span class="availability_checker_col checker_avail customstyle">
								<i class="fa fa-check"></i>
								<span class="checker_date_label">Available</span>
							</span>
							<span class="availability_checker_col checker_count customstyle">Only 6 Spots Left for this Date</span>
						</li>
						<li>
							<span class="availability_checker_col checker_date customstyle">27 September 2016</span>
							<span class="availability_checker_col checker_avail customstyle">
								<i class="fa fa-check"></i>
								<span class="checker_date_label">Available</span>
							</span>
							<span class="availability_checker_col checker_count customstyle">Only 6 Spots Left for this Date</span>
						</li>
						<li>
							<span class="availability_checker_col checker_date customstyle">28 September 2016</span>
							<span class="availability_checker_col checker_avail not customstyle">
								<i class="fa fa-close"></i>
								<span class="checker_date_label">Not Available</span>
							</span>
							<span class="availability_checker_col checker_count customstyle"></span>
						</li>
					</ul> -->

				</div>
	        </div>

            <script type="text/javascript">
                jQuery(function() {

    // search page timepiker 
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    var check_date = getUrlParameter('check_date');
    
                    jQuery("#startTime_check").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                            startDate: check_date
                    });

                });
            </script>

	        <?php 
	    endif;?> 