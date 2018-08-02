<!-- availability checker layout -->

        <?php if( get_row_layout() == 'primary_content_availability_checker'):
	        $our_tours_checker = get_sub_field('our_tours_checker'); ?>
	        <?php //var_dump($our_tours_checker); ?>

	        <div id="availability_checker" class="product_content_wrapper primary_content_availability_checker " ng-cloak>
				<div class="container_availability_checker" ng-controller="wqs_search_controller">	
					
					<input type="hidden" id="wqs_api_url" value="<?php echo getWqsApiUrl(); ?>">
                	<input type="hidden" id="wqs_productcode" value="<?php echo get_field("xola_id", $our_tours_checker); ?>">

					<div class="availability_checker_options_date">
	                    <div class="add-on col-startTime">
	                        <input name="startTime_check" id="startTime_check" class="form-control rezdy_date" type="text" placeholder="Select Your Date" />
	                        <i class="fa fa-calendar cal" aria-hidden="true"></i>
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

	                    	<div id="ajax_preLoading3" class="preLoading3" ng-show="loading"></div>

							<!-- new template checker -->
							<span class="productss" ng-repeat="(keys, api_availability_new) in api_availability_xola[0] track by $index"  ng-if="(keys != 'productCode') && (keys | asDate) == (timearray[0] | asDate)">
								<li class="availability_checker_col checker_date customstyle" ng-repeat="(time, seats) in api_availability_new">
									<span class="availability_checker_col checker_date customstyle">
										{{timearray[0] | asDateTitleYears}}
										<span class="checkertime">{{parseFloat(time)}}</span>
										<span class="checkertime" ng-if="parseFloat(time)>12">PM</span>
										<span class="checkertime" ng-if="parseFloat(time)<=12">AM</span>
									</span>
									<span ng-model="timeSelected" class="availability_checker_col checker_count customstyle" ng-if="seats !=0">{{seats}} Available</span>
									<span class="availability_checker_col checker_avail not customstyle" ng-if="seats ==0">
										<i class="fa fa-close"></i>
										<span class="checker_date_label">Not Available</span>
									</span>
								</li>
							</span>
							<!-- end new template checker -->
	                    </ul>
	                    	<!-- next prev -->
						<div class="availability_checker_check">
							<span class="availability_checker_check_prev" ng-click="changedValuePrev(timearray[0], 1);">Previous Day </span> | <span class="availability_checker_check_next" ng-click="changedValueNext(timearray[0],1);"> Next Day</span>
						</div>

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