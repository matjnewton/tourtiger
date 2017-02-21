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

		                <div class="add-on">
	                    	<span ng-repeat = "products in api_availability track by $index">
								<span ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && (productss.startTimeLocal | asDate) == (timearray[0] | asDate)">
									<input class="form-control rezdy_date" value="{{productss.startTimeLocal | asTimeLocal}}">
								</span>
							</span>
	                    </div>

	                    <div class="add-on col-book-btn2-product">
							<span class="book-btn2-product">
	                            <div class="book-btn2-product-title" ng-click="check_availability_angular(); $event.stopPropagation();">
	                                <span>CHECK AVAILABILITY</span>
	                            </div>    
	                        </span>
	                    </div>
	                </div>

					<ul class="availability_checker_options">

						<div id="ajax_preLoading3" class="preLoading3" ng-show="loading"></div>
						<li ng-if="productUndefined()!=true" ng-hide="loading" class="notour">No tour on this date</li>	
						
						<?php if($rezdy_price_options): ?>
							<!-- new template checker -->
							<span ng-repeat = "products in api_availability track by $index">
								<span ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && (productss.startTimeLocal | asDate) == (timearray[0] | asDate)">
									<li ng-repeat="priceOptions in productss.priceOptions track by $index" class="">
										<span class="availability_checker_col checker_date customstyle">{{productss.startTimeLocal | asDateTitleYears}} <span class="checkertime">{{priceOptions.label}}</span></span>

										<span class="availability_checker_col checker_count customstyle" ng-if="productss.seatsAvailable !=0"><span ng-show="timeSelected/priceOptions.seatsUsed">{{timeSelected/priceOptions.seatsUsed}} Available</span></span>
										<span class="availability_checker_col checker_count checker_avail not customstyle" ng-if="productss.seatsAvailable ==0">
											<i class="fa fa-close"></i>
											<span class="checker_date_label">Not Available</span>
										</span>
									</li>
								</span>
							</span>
							<!-- end new template checker -->
						<?php else : ?>
							<span ng-repeat = "products in api_availability track by $index">
								<li ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && (productss.startTimeLocal | asDate) == (timearray[0] | asDate)">
									<span class="availability_checker_col checker_date customstyle">{{productss.startTimeLocal | asDateTitleYears}}</span>
									<span class="availability_checker_col checker_avail customstyle" ng-if="productss.seatsAvailable !=0">
										<i class="fa fa-check"></i>
										<span class="checker_date_label">Available</span>
									</span>
									<span class="availability_checker_col checker_avail not customstyle" ng-if="productss.seatsAvailable ==0">
										<i class="fa fa-close"></i>
										<span class="checker_date_label">Not Available</span>
									</span>		
									<span class="availability_checker_col checker_count customstyle" ng-if="productss.seatsAvailable !=0"><span ng-show="productss.seatsAvailable">{{productss.seatsAvailable}}</span> Available</span>
									<span class="availability_checker_col checker_count customstyle" ng-if="productss.seatsAvailable ==0"></span>
								</li>
							</span>
						<?php endif; ?>
						<!-- next prev -->
						<div class="availability_checker_check">
							<span class="availability_checker_check_prev" ng-click="changedValuePrev(timearray[0], 1);">Previous Day </span> | <span class="availability_checker_check_next" ng-click="changedValueNext(timearray[0],1);"> Next Day</span>
						</div>
					</ul>


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
    // if (!check_date){
    // 	check_date = moment.utc().add(1, 'days');
    // }
    
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