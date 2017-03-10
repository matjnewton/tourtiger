<?php
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_archive');
function tourtiger_archive(){

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

            //special_message
            if(isset($_GET["special_message"])){
                $special_message_id = $_GET["special_message"];
                $special_message_id = intval($special_message_id);
                $search_settings_special_message = get_field('special_message',$special_message_id);
                $search_settings_special_message_content = '<div id="search_settings_special_message_content">'.$search_settings_special_message.'</div>';
            }
            else{
                $search_settings_special_message_content = '';
            }

            // response
            //$rezdy = get_check_product( $offset, $limit, $startTime, $endTime);
            //$rezdy_availiability = get_check_availiability( $offset, $limit, $startTime, $endTime, $rezdy, $search_tour_cat, $product_id);
         
    }  //end if search  ?>

<section class="tour-page-content" ng-app="wqs" ng-cloak>
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
              <?php get_template_part( 'page-templates/search/search_box_sidebar' ); ?>
            </div>

                <div class="col-md-9 search-content-wrap" id="mainContentAng">
                
                    <?php echo $search_settings_special_message_content; ?>

                    <div id="ajax_preLoading" class="preLoading2" ng-show="loading"></div>

                    <div ng-repeat = "timearrays in timearray track by $index | unique:'timearray'" class="timearray">
                        
                        <p class="cDate2" >{{timearrays | asDateTitle }}</p>
                        
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false && rezdy_group_tours == false">No tours scheduled for this date for your search</span>
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false && rezdy_group_tours == true && timearray_seat_group.indexOf(timearrays) == -1">No tours scheduled for this date for your search</span>

                        <!-- single tours -->
                        <div ng-repeat = "products in api_availability track by $index">
                                <span ng-repeat="productss in products" class="productss">
                                    <span ng-if="(productss.startTimeLocal | asDate) == (timearrays | asDate) " class="productss-startTime">
                                        
                                        <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0" ng-class="{'cpt-avail' :  cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0}" class="cptproducts">
                                             
                                            <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                                <div class="col-md-4 search-tumb-wrap">
                                                    <img src="{{cptproducts.image2}}">
                                                    <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                                </div>

                                                <div class="col-md-8 search-descript-wrap">
                                                    <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                    <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{cptproducts.integration_price}}
                                                    </span>
                                                    <span  ng-repeat = "price in productss.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{price.price}}
                                                    </span>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable<10">Only {{productss.seatsAvailable}} available for this date</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable>=10">Still available on this date.</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                        <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
   
                                                        <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                             <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{productss.startTimeLocal  | asTime }}</span>
                                                             <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(productss.startTimeLocal,productss.endTimeLocal)}} hours</span>
                                                        </div>
                                                        <div class="search-descript-departure-custom">
                                                            <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                                <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                            </span>
                                                        </div>
                                                        <div class="search-descript-button">
                                                            <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                            <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat[0]"> 
                                                <div class="col-md-4 search-tumb-wrap">
                                                    <img src="{{cptproducts.image2}}">
                                                    <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                                </div>

                                                <div class="col-md-8 search-descript-wrap">
                                                    <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                    <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{cptproducts.integration_price}}
                                                    </span>                                                    
                                                    <span  ng-repeat = "price in productss.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{price.price}}
                                                    </span>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable<10">Only {{productss.seatsAvailable}} available for this date</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable>=10">Still available on this date.</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                        <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
   
                                                        <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                             <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{productss.startTimeLocal  | asTime }}</span>
                                                             <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(productss.startTimeLocal,productss.endTimeLocal)}} hours</span>
                                                        </div>
                                                        <div class="search-descript-departure-custom">
                                                            <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                                <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                            </span>
                                                        </div>
                                                        <div class="search-descript-button">
                                                            <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                            <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                        </div>
                                                </div>
                                                
                                            </div>                                                

                                        </div>

                                    </span>
                                </span>
                        </div> 

                        <!-- group tours -->
                        <span ng-repeat="groups in groupsTimeArray_[(timearrays | asDate)] track by $index" ng-if="rezdy_group_tours == true" class="groups">
                                <div ng-repeat = "cptproducts in cpt_product " ng-if="cptproducts.enable_group_product == true && inCodeArray(groups.code, cptproducts.productcode_group) == 0" class="cptproducts">
                                            
                                    <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                        <div class="col-md-4 search-tumb-wrap">
                                            <img src="{{cptproducts.image2}}">
                                            <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                        </div>

                                        <div class="col-md-8 search-descript-wrap">
                                            <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                            <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                $ {{cptproducts.integration_price}}
                                            </span>
                                            <span  ng-repeat = "price in groups.product.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                $ {{price.price}} 
                                            </span> 
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeats(groups.cpt_id,(timearrays | asDate))<10">Only {{getGroupSeats(groups.cpt_id,(timearrays | asDate))}} available for this date</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeats(groups.cpt_id,(timearrays | asDate))>=10">Still available on this date.</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>

                                                <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                     <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{groups.product.startTimeLocal  | asTime }}</span>
                                                     <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(groups.product.startTimeLocal,groups.product.endTimeLocal)}} hours</span>
                                                </div>
                                                <div class="search-descript-departure-custom">
                                                    <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                        <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                    </span>
                                                </div>
                                                <div class="search-descript-button">
                                                    <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                    <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat[0]"> 
                                        <div class="col-md-4 search-tumb-wrap">
                                            <img src="{{cptproducts.image2}}">
                                            <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                        </div>

                                        <div class="col-md-8 search-descript-wrap">
                                            <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                            <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                $ {{cptproducts.integration_price}}
                                            </span>                                                    
                                            <span  ng-repeat = "price in groups.product.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                $ {{price.price}} 
                                            </span> 
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeats(groups.cpt_id,(timearrays | asDate))<10">Only {{getGroupSeats(groups.cpt_id,(timearrays | asDate))}} available for this date</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeats(groups.cpt_id,(timearrays | asDate))>=10">Still available on this date.</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>

                                                <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                     <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{groups.product.startTimeLocal  | asTime }}</span>
                                                     <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(groups.product.startTimeLocal,groups.product.endTimeLocal)}} hours</span>
                                                </div>
                                                <div class="search-descript-departure-custom">
                                                    <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                        <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                    </span>
                                                </div>
                                                <div class="search-descript-button">
                                                    <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                    <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                </div>
                                        </div>
                                        
                                    </div>  

                                </div>
                        </span>

                    </div> <!-- timearray -->

                    <!-- loadmore -->
                    <div ng-repeat = "timearrays in timearrayLoadmore track by $index | unique:'timearrayLoadmore'"  ng-hide="scrollindex == 1" class="timearrayLoadmore">

                        <p class="cDate2" >{{timearrays | asDateTitle }}</p>

                        <span class="search_noavailable_message" ng-if="timearrayLoadmore_seat.indexOf(timearrays) == -1 && loading == false && rezdy_group_tours == false">No tours scheduled for this date for your search</span>
                        <span class="search_noavailable_message" ng-if="timearrayLoadmore_seat.indexOf(timearrays) == -1 && loading == false && rezdy_group_tours == true && timearray_seat_group_more.indexOf(timearrays) == -1">No tours scheduled for this date for your search</span>

                        <!-- single tours -->
                        <div ng-repeat = "products in api_availability_more track by $index">
                                <span ng-repeat="productss in products" class="productss">
                                    <span ng-if="(productss.startTimeLocal | asDate) == (timearrays | asDate) " class="productss-startTime">
                                        
                                        <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0" ng-class="{'cpt-avail' :  cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0}" class="cptproducts">
                                            
                                            <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                                <div class="col-md-4 search-tumb-wrap">
                                                    <img src="{{cptproducts.image2}}">
                                                    <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                                </div>

                                                <div class="col-md-8 search-descript-wrap">
                                                    <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                    <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{cptproducts.integration_price}}
                                                    </span>
                                                    <span  ng-repeat = "price in productss.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{price.price}}
                                                    </span>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable<10">Only {{productss.seatsAvailable}} available for this date</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable>=10">Still available on this date.</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                        <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
   
                                                        <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                             <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{productss.startTimeLocal  | asTime }}</span>
                                                             <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(productss.startTimeLocal,productss.endTimeLocal)}} hours</span>
                                                        </div>
                                                        <div class="search-descript-departure-custom">
                                                            <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                                <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                            </span>
                                                        </div>
                                                        <div class="search-descript-button">
                                                            <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                            <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat[0]"> 
                                                <div class="col-md-4 search-tumb-wrap">
                                                    <img src="{{cptproducts.image2}}">
                                                    <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                                </div>

                                                <div class="col-md-8 search-descript-wrap">
                                                    <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                                    <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{cptproducts.integration_price}}
                                                    </span>                                                    
                                                    <span  ng-repeat = "price in productss.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                        $ {{price.price}}
                                                    </span>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable<10">Only {{productss.seatsAvailable}} available for this date</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && productss.seatsAvailable>=10">Still available on this date.</div>
                                                        <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                        <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
   
                                                        <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                             <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{productss.startTimeLocal  | asTime }}</span>
                                                             <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(productss.startTimeLocal,productss.endTimeLocal)}} hours</span>
                                                        </div>
                                                        <div class="search-descript-departure">
                                                            <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                                <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                            </span>
                                                        </div>
                                                        <div class="search-descript-button">
                                                            <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                            <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                        </div>
                                                </div>
                                                
                                            </div>                                                
                                                
                                        </div>
                                    </span>
                                </span>
                        </div> 

                        <!-- group tours -->
                        <span ng-repeat="groups in groupsTimeArrayMore_[(timearrays | asDate)] track by $index" ng-if="rezdy_group_tours == true" class="groups">
                                <div ng-repeat = "cptproducts in cpt_product " ng-if="cptproducts.enable_group_product == true && inCodeArray(groups.code, cptproducts.productcode_group) == 0" class="cptproducts">
                                            
                                    <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                        <div class="col-md-4 search-tumb-wrap">
                                            <img src="{{cptproducts.image2}}">
                                            <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                        </div>

                                        <div class="col-md-8 search-descript-wrap">
                                            <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                            <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                $ {{cptproducts.integration_price}}
                                            </span>
                                            <span  ng-repeat = "price in groups.product.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                $ {{price.price}} 
                                            </span> 
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeatsMore(groups.cpt_id,(timearrays | asDate))<10">Only {{getGroupSeatsMore(groups.cpt_id,(timearrays | asDate))}} available for this date</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeatsMore(groups.cpt_id,(timearrays | asDate))>=10">Still available on this date.</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>

                                                <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                     <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{groups.product.startTimeLocal  | asTime }}</span>
                                                     <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(groups.product.startTimeLocal,groups.product.endTimeLocal)}} hours</span>
                                                </div>
                                                <div class="search-descript-departure-custom">
                                                    <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                        <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                    </span>
                                                </div>
                                                <div class="search-descript-button">
                                                    <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                    <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat[0]"> 
                                        <div class="col-md-4 search-tumb-wrap">
                                            <img src="{{cptproducts.image2}}">
                                            <span class="most_popular" ng-if="cptproducts.integration_flag.length >0">Most Popular</span>
                                        </div>

                                        <div class="col-md-8 search-descript-wrap">
                                            <h3 ng-bind-html="cptproducts.title | trust" class=""></h3>
                                            <span  ng-if="cptproducts.integration_price" class="search-tumb-price">
                                                $ {{cptproducts.integration_price}}
                                            </span>                                                    
                                            <span  ng-repeat = "price in groups.product.priceOptions track by $index" ng-if="price.label=='Adult' && !cptproducts.integration_price" class="search-tumb-price">
                                                $ {{price.price}} 
                                            </span> 
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeatsMore(groups.cpt_id,(timearrays | asDate))<10">Only {{getGroupSeatsMore(groups.cpt_id,(timearrays | asDate))}} available for this date</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && getGroupSeatsMore(groups.cpt_id,(timearrays | asDate))>=10">Still available on this date.</div>
                                                <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date</div>
                                                <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>

                                                <div class="search-descript-departure" ng-if="!cptproducts.details.length >0">
                                                     <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text">{{groups.product.startTimeLocal  | asTime }}</span>
                                                     <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration(groups.product.startTimeLocal,groups.product.endTimeLocal)}} hours</span>
                                                </div>
                                                <div class="search-descript-departure-custom">
                                                    <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                        <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                    </span>
                                                </div>
                                                <div class="search-descript-button">
                                                    <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}" class="viewtour button-viewtour">View Tour</a>
                                                    <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                </div>
                                        </div>
                                        
                                    </div>  

                                </div>
                        </span>

                    </div> <!-- timearrayLoadmore -->
                    <!-- end loadmore -->

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
