<?php
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_archive_xola');
function tourtiger_archive_xola(){
    //echo 'xola';
    $startTime = null;
    $endTime = null;

    if(isset($_GET["search"])){

            // offset
            if(isset($_GET["off"])){
                $offset = $_GET["off"];
            }
            else{
                $offset = 0;
            }

            // limit
            if(isset($_GET["limit"])){
                $limit = $_GET["limit"];
            }
            else{
                $limit = 100;
            }
            //startTime
            $startTime = $_GET["startTime"];

            //endTime
            $endTime = $_GET["endTime"];

            // category
            if(isset($_GET["search_tour_cat"])){
                $search_tour_cat = $_GET["search_tour_cat"];
            }
            else{
                $search_tour_cat = '';
            }

            //product_id 
            if(isset($_GET["product_id"])){
                $product_id = $_GET["product_id"];
            }
            else{
                $product_id = null;
            }

            // response
            //$rezdy = get_check_product( $offset, $limit, $startTime, $endTime);
            //$rezdy_availiability = get_check_availiability( $offset, $limit, $startTime, $endTime, $rezdy, $search_tour_cat, $product_id);
         
    }  //end if search  ?>

    <section class="tour-page-content" ng-app="wqs_xola" ng-cloak>
        <div class="container" ng-controller="wqs_search_controller">
            <input type="hidden" id="wqs_api_url" value="<?php echo getWqsApiUrl();?>">
<!--                 <div class="row">
                  <div class="pull-right">
                      <button class="view_type" id="list_view"><i class="fa fa-list"></i> List View</button>
                      <button class="view_type" id="grid_view"><i class="fa fa-th"></i> Grid View</button>
                  </div>
                </div> -->
            
            <div class="row">
                  <div class="col-md-3 search-sidebar-wrap" id="searchfilter" >
                      <?php get_template_part( 'page-templates/search/search_box_sidebar_xola' ); ?>
                  </div>

                <div class="col-md-9 search-content-wrap" id="mainContentAng">

                    <div id="ajax_preLoading" class="preLoading2" ng-show="loading"></div>
                    
                    <!-- xola  template -->
                    <div ng-repeat = "timearrays in timearray track by $index | unique:'timearray'" class="timearray">
                        
                        <p class="cDate2" >{{timearrays | asDateTitle }}</p>
                        
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false && xola_group_tours == false">No tours scheduled for this date for your search</span>
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false && xola_group_tours == true && timearray_seat_group.indexOf(timearrays) == -1">No tours scheduled for this date for your search</span>

                        <div ng-repeat = "(key, products) in api_products_xola.products track by $index">
                                <span ng-repeat="(key, api_availability) in api_availability_xola[$index]" ng-if="(key | asDate) == (timearrays | asDate) &&  get_all_seat(api_availability) !=0">
                                    <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.xola_id == products.id && cptproducts.xola_id != null" class="cptproducts">
                                        <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                                <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                                <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                            </div> <!-- end search-tumb-wrap -->
                                            <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                                <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{cptproducts.integration_price}}
                                                </span>
                                                <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{products.price}}
                                                </span>
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)<10">Only {{get_all_seat(api_availability)}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)>=10">Still available on this date.</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <span class="search-descript-departure-xola" ng-repeat="(key, api_availability2) in api_availability track by $index" ng-if="key !=0 && $index==0 && !cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                        <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{parseFloat(key)}}</span>
                                                        <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>
                                                    

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->

                                        <!-- for carrent category -->
                                        <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat"> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                                <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                                <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                            </div> <!-- end search-tumb-wrap -->
                                            <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                                <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{cptproducts.integration_price}}
                                                </span>
                                                <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{products.price}}
                                                </span>
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)<10">Only {{get_all_seat(api_availability)}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)>=10">Still available on this date.</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <!-- <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span> -->
                                                    <span class="search-descript-departure-xola" ng-repeat="(key, api_availability2) in api_availability track by $index" ng-if="key !=0 && $index==0 && !cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                         <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{parseFloat(key)}}</span>
                                                        <!--  <span class="search-descript-departure-label">Seats</span> <span class="search-descript-departure-text">{{api_availability2}}</span> -->
                                                         <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>
                                                    

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->
                                    </div> <!-- end repeat cptproducts -->


                                </span> <!-- end api_availability_xola[$index] -->
                        </div> <!--  end api_products_xola.products -->
                        
                        <!-- group tours -->
                        <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.enable_group_product == true && group_available_seat(cptproducts.id, timearrays) > 0" class="cptproducts">
                            <div ng-repeat = "group_xola in groupxola track by $index" ng-if="(group_xola.time | asDate) == (timearrays | asDate) && group_xola.cpt_id == cptproducts.id">
                                
                                <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                    <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                        <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                        <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                        <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                    </div> <!-- end search-tumb-wrap -->
                                    <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                        <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                        <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                            $ {{cptproducts.integration_price}}
                                        </span>
                                        <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                            $ {{group_xola.price[0].price[0].price}}
                                        </span>

                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seat(cptproducts.id, timearrays)<10">Only {{group_available_seat(cptproducts.id, timearrays)}} available for this date</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seat(cptproducts.id, timearrays)>=10">Still available on this date.</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                            <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                            
                                            <span class="search-descript-departure-xola" ng-if="!cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{group_xola.price[0].departure}}</span>
                                                <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{ duration_to_hours(group_xola.price[0].price[0].duration) }} hours</span>
                                            </span>
                                            

                                            <div class="search-descript-departure-custom">
                                                <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                    <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                </span>
                                            </div>
                                            <div class="search-descript-button">
                                                <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                            </div>
                                    </div> <!-- end search-descript-wrap -->
                                </div> <!-- end anrow2 -->

                                <!-- for carrent category -->
                                <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat"> 
                                    <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                        <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                        <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                        <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                    </div> <!-- end search-tumb-wrap -->
                                    <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                        <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                        <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                            $ {{cptproducts.integration_price}}
                                        </span>
                                        <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                            $ {{group_xola.price[0].price[0].price}}
                                        </span>
                                         
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seat(cptproducts.id, timearrays)<10">Only {{group_available_seat(cptproducts.id, timearrays)}} available for this date</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seat(cptproducts.id, timearrays)>=10">Still available on this date.</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                            <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                            
                                            <span class="search-descript-departure-xola" ng-if="!cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{group_xola.price[0].departure}}</span>
                                                <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{ duration_to_hours(group_xola.price[0].price[0].duration) }} hours</span>
                                            </span>
                                            

                                            <div class="search-descript-departure-custom">
                                                <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                    <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                </span>
                                            </div>
                                            <div class="search-descript-button">
                                                <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                            </div>
                                    </div> <!-- end search-descript-wrap -->
                                </div> <!-- end anrow2 -->
                            </div>
                        </div>
                        <!-- end group tours -->

                    </div> 
                    <!--  end xola  template -->

 
                    <!-- xola  LoadMore -->
                    <div ng-repeat = "timearrays in timearrayLoadmore track by $index | unique:'timearrayLoadmore'" ng-hide="scrollindex == 1" class="timearrayLoadmore">
                        
                        <p class="cDate2" >{{timearrays | asDateTitle }}</p>
                        
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false && xola_group_tours == false">No tours scheduled for this date for your search</span>
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false && xola_group_tours == true && timearray_seat_group_more.indexOf(timearrays) == -1">No tours scheduled for this date for your search</span>
                        
                        <div ng-repeat = "(key, products) in api_products_xola.products track by $index">
                                <span ng-repeat="(key, api_availability) in api_availability_xola_more[$index]" ng-if="(key | asDate) == (timearrays | asDate) &&  get_all_seat(api_availability) !=0">
                                    <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.xola_id == products.id && cptproducts.xola_id != null" class="cptproducts">
                                        <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                                <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                                <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                            </div> <!-- end search-tumb-wrap -->
                                            <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                                <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{cptproducts.integration_price}}
                                                </span>
                                                <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{products.price}}
                                                </span>
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)<10">Only {{get_all_seat(api_availability)}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)>=10">Still available on this date.</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                   
                                                    <span class="search-descript-departure-xola" ng-repeat="(key, api_availability2) in api_availability track by $index" ng-if="key !=0 && $index==0 && !cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                         <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{parseFloat(key)}}</span>
                                                         <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>
                                                    

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0  && cptproducts.integration_details !=1">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->

                                        <!-- for carrent category -->
                                        <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat"> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                                <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                                <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                            </div> <!-- end search-tumb-wrap -->
                                            <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                                <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{cptproducts.integration_price}}
                                                </span>
                                                <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                                    $ {{products.price}}
                                                </span>
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)<10">Only {{get_all_seat(api_availability)}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && get_all_seat(api_availability)>=10">Still available on this date.</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <!-- <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span> -->
                                                    <span class="search-descript-departure-xola" ng-repeat="(key, api_availability2) in api_availability track by $index" ng-if="key !=0 && $index==0 && !cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                         <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{parseFloat(key)}}</span>
                                                        <!--  <span class="search-descript-departure-label">Seats</span> <span class="search-descript-departure-text">{{api_availability2}}</span> -->
                                                         <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>
                                                    

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->
                                    </div> <!-- end repeat cptproducts -->


                                </span> <!-- end api_availability_xola[$index] -->
                        </div> <!--  end api_products_xola.products -->

                        <!-- group tours -->

                        <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.enable_group_product == true && group_available_seatMore(cptproducts.id, timearrays) > 0" class="cptproducts">
                            
                            <div ng-repeat = "group_xola in groupxolaMore track by $index" ng-if="(group_xola.time | asDate) == (timearrays | asDate) && group_xola.cpt_id == cptproducts.id">
                                
                                <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                    <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                        <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                        <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                        <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                    </div> <!-- end search-tumb-wrap -->
                                    <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                        <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                        <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                            $ {{cptproducts.integration_price}}
                                        </span>
                                        <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                            $ {{group_xola.price[0].price[0].price}}
                                        </span>

                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seatMore(cptproducts.id, timearrays)<10">Only {{group_available_seatMore(cptproducts.id, timearrays)}} available for this date</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seatMore(cptproducts.id, timearrays)>=10">Still available on this date.</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                            <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                            
                                            <span class="search-descript-departure-xola" ng-if="!cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{group_xola.price[0].departure}}</span>
                                                <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{ duration_to_hours(group_xola.price[0].price[0].duration) }} hours</span>
                                            </span>
                                            

                                            <div class="search-descript-departure-custom">
                                                <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                    <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                </span>
                                            </div>
                                            <div class="search-descript-button">
                                                <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                            </div>
                                    </div> <!-- end search-descript-wrap -->
                                </div> <!-- end anrow2 -->

                                <!-- for carrent category -->
                                <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat"> 
                                    <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                        <img ng-if="cptproducts.image2" src="{{cptproducts.image2}}">
                                        <img ng-if="!cptproducts.image2" src="<?php echo  CORE_URL .'/css/images/image_305_205.png';?>">
                                        <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                    </div> <!-- end search-tumb-wrap -->
                                    <div class="col-xs-12 col-sm-6 col-md-8 search-descript-wrap">
                                        <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                        <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                            $ {{cptproducts.integration_price}}
                                        </span>
                                        <span  ng-if="!cptproducts.integration_price" class="search-tumb-price">
                                            $ {{group_xola.price[0].price[0].price}}
                                        </span>
                                         
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seatMore(cptproducts.id, timearrays)<10">Only {{group_available_seatMore(cptproducts.id, timearrays)}} available for this date</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && group_available_seatMore(cptproducts.id, timearrays)>=10">Still available on this date.</div>
                                            <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                            <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                            
                                            <span class="search-descript-departure-xola" ng-if="!cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{group_xola.price[0].departure}}</span>
                                                <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{ duration_to_hours(group_xola.price[0].price[0].duration) }} hours</span>
                                            </span>
                                            

                                            <div class="search-descript-departure-custom">
                                                <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0 && cptproducts.integration_details !=1">
                                                    <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                </span>
                                            </div>
                                            <div class="search-descript-button">
                                                <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                            </div>
                                    </div> <!-- end search-descript-wrap -->
                                </div> <!-- end anrow2 -->
                            </div>
                        </div>
                        <!-- end group tours -->
                    </div> 
                    <!--  end xola  LoadMore -->

                </div> <!-- end mainContentAng -->

            </div> <!-- end row -->

        </div> <!-- end controller -->
    </section> <!-- end app -->

<?php } // end tourtiger_archive()

remove_action('genesis_sidebar', 'genesis_do_sidebar');

genesis();

?>

<!-- include custom style -->
<?php get_template_part( 'page-templates/search/result-page-style' ); ?>

<script>
jQuery(document).ready(function($){

}) //end document.ready 
</script>


