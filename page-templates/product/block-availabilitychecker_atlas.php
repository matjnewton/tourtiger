<!-- availability checker layout -->

        <?php if( get_row_layout() == 'primary_content_availability_checker'):
	        $our_tours_checker = get_sub_field('our_tours_checker');
	        $availability_checker_special_message = get_sub_field('availability_checker_special_message');
	        $check_user_id_xola = get_field('check_user_id_xola', 'options');
	        //var_dump($check_user_id_xola);
	        ?>
	        <?php //var_dump($availability_checker_special_message); ?>
			<?php 
			if (isset($_GET["num_people"])) {
			   $num_people = $_GET["num_people"];
			} else {
			   $num_people = 1;
			}?>

	        <div id="availability_checker" class="product_content_wrapper primary_content_availability_checker availability_checker_atlas" ng-app="wqs_xola_check" ng-cloak>
				<div class="container_availability_checker" ng-controller="wqs_search_controller">	
					
					<input type="hidden" id="wqs_api_url" value="<?php echo getWqsApiUrl(); ?>">
                	<input type="hidden" id="wqs_productcode" value="<?php echo get_field("xola_id", $our_tours_checker); ?>">

					<div class="availability_checker_options_date">
	                    <div class="add-on col-startTime">
	                        <input name="startTime_check" id="startTime_check" class="form-control rezdy_date" type="text" placeholder="Select Your Date" />
	                        <i class="fa fa-calendar cal" aria-hidden="true"></i>
	                    </div>

					  	<div id="number_of_people" class="add-on col-num_people">
					    	<span class="number_of_people-label">Guests</span>
					    	<input ng-model="num_people_val_model" ng-init="num_people_val_model =<?php echo $num_people; ?>" type="number" size="1" id="num_people_val" name="num_people" min="1" max="50" value="<?php echo $num_people; ?>" class="datepicker-input form-control"  required placeholder="Number of People" />
					  	</div>

	                    <div class="add-on col-book-btn2-product">
							<span class="book-btn2-product">
	                            <button ng-disabled="!num_people_val_model" class="btn book-btn2-product-title" ng-click="check_availability_xola(); $event.stopPropagation();">
	                                <span>CHECK AVAILABILITY</span>
	                            </button>    
	                        </span>
	                    </div>
	                </div>

	                <!-- special message -->
	                <?php if($availability_checker_special_message): ?>
					<p class="availability_checker_special_message">
						<?php echo $availability_checker_special_message; ?>
					</p>
	                <?php endif; ?>

					<!-- seats -->
	                    <ul class="availability_checker_options">

	                    	<div id="ajax_preLoading3" class="preLoading3" ng-show="loading"></div>

							<!-- new template checker -->
							<span class="productss" ng-repeat="(keys, api_availability_new) in api_availability_xola[0]"  ng-if="(keys != 'productCode') && (keys | asDate) == (timearray[0] | asDate)">
<!-- 								<li class="availability_checker_col availability_checker_col_atlas checker_date customstyle" ng-repeat="(time, seats) in api_availability_new  track by $index | orderBy:time "> -->
								<li class="availability_checker_col availability_checker_col_atlas checker_date customstyle" ng-repeat="item in api_availability2 | orderBy : item.$key track by $index">
									<span class="availability_checker_col availability_checker_col_atlas checker_date customstyle">
										{{timearray[0] | asDateTitleYears}}
										<span class="checkertime" ng-if="parseFloat(item.$key)>=13">{{parseFloatplus(item.$key)}}</span>
										<span class="checkertime" ng-if="parseFloat(item.$key)<13">{{parseFloat(item.$key)}}</span>
										<span class="checkertime" ng-if="parseFloat(item.$key)>12">PM</span>
										<span class="checkertime" ng-if="parseFloat(item.$key)<=12">AM</span>
									</span>
									<span ng-model="timeSelected" class="availability_checker_col availability_checker_col_atlas checker_count customstyle" ng-if="item.$value !=0 && item.$value>=num_people">{{item.$value}} Available</span>
									<span ng-model="timeSelected" class="availability_checker_col availability_checker_col_atlas checker_count not_numpeople customstyle" ng-if="item.$value !=0 && item.$value<num_people">{{item.$value}} Available</span>
									<span ng-model="timeSelected" class="availability_checker_col availability_checker_col_atlas checker_count not customstyle" ng-if="item.$value ==0">{{item.$value}} Available</span>
									<span class="availability_checker_col availability_checker_col_atlas checker_avail not customstyle" ng-if="item.$value ==0">
										<!-- <i class="fa fa-close"></i> -->
										<span class="checker_date_label">SOLD OUT</span>
									</span>
									<span ng-if="item.$value !=0 && item.$value>=num_people" ng-click="widgetload($event)" class="xola-checkout availability_checker_col availability_checker_col_atlas book_atlas customstyle" data-seller="<?php echo $check_user_id_xola; ?>" data-version="2" data-experience="{{wqs_productcode}}" data-button-productcode="{{wqs_productcode}}" data-button-date="{{timearray[0]}}" data-button-time="{{item.$key}}" data-button-numpeople="{{num_people}}">Book Now</span>
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

