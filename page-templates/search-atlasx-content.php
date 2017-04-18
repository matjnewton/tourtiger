<?php
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'tourtiger_archive_atlasx');
function tourtiger_archive_atlasx() { ?>

        <?php    //special_message
            if(isset($_GET["special_message"])){
                $special_message_id = $_GET["special_message"];
                $special_message_id = intval($special_message_id);
                $search_settings_special_message = get_field('special_message',$special_message_id);
                $search_settings_special_message_content = '<div id="search_settings_special_message_content">'.$search_settings_special_message.'</div>';
            }
            else{
                $search_settings_special_message_content = '';
            }
        ?>

    <section class="tour-page-content" ng-app="wqs_atlas" ng-cloak>
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
                      <?php get_template_part( 'page-templates/search/search_box_sidebar_atlasx' ); ?>
                  </div>

                <div class="col-md-9 search-content-wrap" id="mainContentAng">

                    <?php echo $search_settings_special_message_content; ?>

                    <div id="ajax_preLoading" class="preLoading2" ng-show="loading"></div>
                    
                    <!-- atlas  template -->
                    <div ng-repeat = "timearrays in timearray track by $index | unique:'timearray'" class="timearray">
                        
                        <p class="cDate2" >{{timearrays | asDateTitle }}</p>
                        
                        <span class="search_noavailable_message" ng-if="timearray_seat.indexOf(timearrays) == -1 && loading == false">No tours scheduled for this date for your search</span>

                        <div ng-repeat = "(key, products) in api_products_xola.products track by $index">
                                
                                <span ng-repeat="(key_availability, api_availability) in api_availability_xola track by $index"  ng-if="(timearrays | asDate) == (api_availability.atlas_date | asDate) && products.id == api_availability.productCode && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).available" >
                                    <!-- {{num_people_val_model}} -->
                                    <!-- {{api_availability.productCode}} -->
                                    <!-- {{api_availability.atlas_date}} -->
                                    <!-- {{api_availability[api_availability.atlas_date]}} -->
                                    <!-- {{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people )}} -->
                                    <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.xola_id == products.id && cptproducts.xola_id != null" class="cptproducts">
                                        
                                        <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img src="{{cptproducts.image2}}">
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
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people==1">Only {{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people>1">Available on this date!</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date!</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <span class="search-descript-departure-xola">
                                                        <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).time}}</span>
                                                        <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}&num_people={{num_people}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->

                                        <!-- for carrent category -->
                                        <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat[0]"> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img src="{{cptproducts.image2}}">
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
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people==1">Only {{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people>1">Available on this date!</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date!</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <span class="search-descript-departure-xola">
                                                        <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).time}}</span>
                                                        <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>                                                   

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}&num_people={{num_people}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->
                                    </div> <!-- end repeat cptproducts -->

                                </span> <!-- end api_availability_xola -->
                        </div> <!--  end api_products_xola.products -->
                        
                        <!-- group tours -->

                        <!-- end group tours -->

                    </div> 
                    <!--  end atlas  template -->

 
                    <!-- atlas LoadMore -->
                    <div ng-repeat = "timearrays in timearrayLoadmore track by $index | unique:'timearrayLoadmore'" ng-hide="scrollindex == 1" class="timearrayLoadmore">
                        
                        <p class="cDate2" >{{timearrays | asDateTitle }}</p>
                        
                        <span class="search_noavailable_message" ng-if="timearrayLoadmore_seat.indexOf(timearrays) == -1 && loading == false">No tours scheduled for this date for your search</span>
                        
                        <div ng-repeat = "(key, products) in api_products_xola.products track by $index">

                                <span ng-repeat="(key_availability, api_availability) in api_availability_xola_more track by $index"  ng-if="(timearrays | asDate) == (api_availability.atlas_date | asDate) && products.id == api_availability.productCode && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).available" >
                                    <!-- {{api_availability.productCode}} -->
                                    <!-- {{api_availability.atlas_date}} -->
                                    <!-- {{api_availability[api_availability.atlas_date]}} -->
                                    <!-- {{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people )}} -->
                                    <div ng-repeat = "cptproducts in cpt_product track by $index" ng-if="cptproducts.xola_id == products.id && cptproducts.xola_id != null" class="cptproducts">
                                        
                                        <div class="anrow2" ng-if="search_tour_cat == 'all' "> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img src="{{cptproducts.image2}}">
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
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people==1">Only {{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people>1">Available on this date!</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date!</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <span class="search-descript-departure-xola">
                                                        <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).time}}</span>
                                                        <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}&num_people={{num_people}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->

                                        <!-- for carrent category -->
                                        <div class="anrow2" ng-if="search_tour_cat != 'all' && cptproducts.term.term_id == search_tour_cat[0]"> 
                                            <div class="col-xs-12 col-sm-6 col-md-4 search-tumb-wrap">
                                                <img src="{{cptproducts.image2}}">
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
                                                 
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people==1">Only {{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people}} available for this date</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Full Availability' && available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).people>1">Available on this date!</div>
                                                    <div class="search-descript-available" ng-if="cptproducts.integration_availability =='Show Available'">Available on this date!</div>
                                                    <div class="search-descript-descript" ng-bind-html="cptproducts.descript | trust"></div>
                                                    
                                                    <span class="search-descript-departure-xola">
                                                        <span class="search-descript-departure-label">Departure</span>  <span class="search-descript-departure-text departure-text-{{$index}}">{{available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).time}}</span>
                                                        <span class="search-descript-departure-label">Duration</span> <span class="search-descript-departure-text">{{duration_to_hours(products.duration)}} hours</span>
                                                    </span>                                                   

                                                    <div class="search-descript-departure-custom">
                                                        <span class="search-descript-departure-custom-element" ng-repeat="details in cptproducts.details track by $index" ng-if="cptproducts.details.length >0">
                                                            <span class="search-descript-departure-label">{{details.label }}</span> <span class="search-descript-departure-text">{{details.text}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="search-descript-button">
                                                        <a href="{{cptproducts.link}}?check_date={{timearrays | asDate}}&num_people={{num_people}}" class="viewtour button-viewtour">View Tour</a>
                                                        <a href="{{cptproducts.custom_button_link}}" class="viewtour button-viewtour button-book">Book now</a>
                                                    </div>
                                            </div> <!-- end search-descript-wrap -->
                                        </div> <!-- end anrow2 -->
                                    </div> <!-- end repeat cptproducts -->

                                </span> <!-- end api_availability_xola -->                                

                        </div> <!--  end api_products_xola.products -->

                        <!-- group tours -->
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


