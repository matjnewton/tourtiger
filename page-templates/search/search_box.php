<?php

        // add search
        if(get_post_meta($post->ID,'hero_area_0_button_link_type',true)!=''){
            if(get_post_meta($post->ID,'hero_area_0_button_link_type',true)=='Search Box'){
              if(get_post_meta($post->ID,'hero_area_0_an_search_box_view',true)!=''){
                //$search_settings_type_category = get_post_meta($post->ID,'search_settings_type_category',true);
                $search_aviliable = get_post_meta($post->ID,'hero_area_0_an_search_box_view',true);
              }
            }
            else{
              $search_aviliable = '';
            }
        }
        //var_dump($search_settings_type_category);

		$search_tour_cat = get_the_terms( $post->ID, 'tour_cat' )[0]->slug;
		//var_dump($search_tour_cat);
        
        $search_settings_type = get_sub_field('search_settings_type');
        $search_settings_type_category_select = get_sub_field('search_settings_type_category_select');
        $search_settings_type_category = get_sub_field('search_settings_type_category');

        //var_dump($search_settings_type);
        if ($search_settings_type =='Search by one date') {
            $search_by_onedate = true; 
            $type_search= '<input type="hidden" name="type_search" id="type_search" value="one_date"/>';
            ?>
            <script>
                jQuery(function() {
                    $(".endTime-wrap").hide();
                    $(".one_date_hide").hide();
                    $('#startTime').change(function(event) {
                        $start = $('#startTime').val();
                        $('#endTime').val($start);
                    });
                   
                });
            </script>
            <?php 
            $block = '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_box"></div>'; ?>
        <?php } else {
            $block = '';
            $type_search = '';
        }
        //var_dump($search_settings_type_category);
        //var_dump($search_settings_type_category_select);

		// if ($search_tour_cat != '') {
		// 	$search_tour_for_category =  '<input type="hidden" name="search_tour_cat" id="search_tour_cat" value="'.$search_tour_cat.'"/>';
		// } else {
		// 	$search_tour_for_category ='';
		// }

        // $category_list = array();
        // foreach ($search_settings_type_category_select as $key => $value) {
        //     $category_list[] = $value->slug;
        // }
        //var_dump(implode(",", $category_list));


        if ($search_settings_type_category) {
            if ($search_settings_type_category_select) {
                $category_list = array();
                foreach ($search_settings_type_category_select as $key => $value) {
                    $category_list[] = $value->slug;
                }
                $category = implode(",", $category_list);

                $search_tour_for_category =  '<input type="hidden" name="search_tour_cat" id="search_tour_cat" value="'. $category.'"/>';
            } else if ($search_tour_cat != '') {
                $search_tour_for_category =  '<input type="hidden" name="search_tour_cat" id="search_tour_cat" value="'.$search_tour_cat.'"/>';
            } else {
                $search_tour_for_category =  '<input type="hidden" name="search_tour_cat" id="search_tour_cat" value=""/>';
            } 
            
        } else {
            $search_tour_for_category ='';
        }

        $single_search = false; // search only for one tour - Disable now
        $queried_post_type = get_query_var('post_type');
        if(is_single() && 'tour' ==  $queried_post_type && $single_search) {
            //var_dump( get_field('productcode', $post->ID) );
            $this_product_id = '<input type="hidden" name="product_id" id="product_id" value="'.$post->ID.'"/>';
        } else {
            $this_product_id = '';
        }




        $search_content = null;

        // available angular app for search box - disable now
            // <div class="home_page_search" ng-app="wqs_2">
            //     <div class="container" ng-controller="wqs_search_controller">

        if($search_aviliable != ''){
            $search_content = '
            <style>
              div.book-btn-wrapper{
                 display:none !important;
              }
            </style>

            <div class="home_page_search">
                <div class="container">
                <input type="hidden" id="wqs_api_url" value="' .getWqsApiUrl().'">
                <input type="hidden" id="wqs_productcode" value="'.get_field("productcode", $post->ID).'">
                    <div class="row">
                        <form class="form-horizontal" action="/search/" method="get">
                            '. $block .'
                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 rezdy_box one_date_hide">

                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_box ">
                                <div class="add-on">
                                    <input name="startTime" id="startTime" class="form-control rezdy_date" type="text" placeholder="Start Day" />
                                    <i class="fa fa-calendar cal" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_box endTime-wrap">
                                <div class="add-on">
                                    <input name="endTime" id="endTime" class="form-control rezdy_date" type="text" placeholder="End Day" />
                                    <i class="fa fa-calendar cal" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_search-submit-wrap">
                                <div class="add-on">
                                    <input type="submit" class="btn btn-success rezdy_search" name="search" value="Search" style="width:100%;">
                                    <i class="fa fa-search sear" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 rezdy_box">
                            </div>
                            <input type="hidden" name="view_type" id="view_type" value="'.$search_aviliable.'"/>
                            '.$search_tour_for_category.$this_product_id.$type_search.'
                        </form>
                    </div>




            <script type="text/javascript">
                jQuery(function() {

                    // angular.element(document.getElementById("wqs_search_controller")).scope().select;
                    //var s = angular.element("[ng-controller=wqs_search_controller]").scope().select;
                    //console.log(s);

                    jQuery("#startTime").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                            select :  {

                             
                            }
                            
                    });

                    jQuery("#endTime").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                    });

                });
            </script>

    <div otc-scripts scripts="scripts">
    </div>


    </div>
</div>';
        }
    echo $search_content;



?>

<!--                <div ng-repeat = "products in api_availability track by $index">
                          <span ng-repeat="productss in products" class="productss" ng-if="wqs_productcode == productss.productCode && productss.seatsAvailable != 0">
                              date: {{productss.startTime | asDate}}
                             avail : {{productss.seatsAvailable}}
                          </span>
                    </div> -->

             <script>
                jQuery(function($) {

                    // jQuery("#startTime").daterangepicker({
                    //         locale: {
                    //           format: "YYYY-MM-DD"
                    //         },
                    //         singleDatePicker: true,
                    //         select :  {
                    //                  //100 : "2016-11-13"
                    //             <?php           //available 
                    //                 $ii = 0;
                    //                     foreach (check_available_single_tour($post->ID) as $key => $this_available) :
                    //                         if($this_available) : 
                    //                             //echo 'date: '.$key.' availabile: '.$this_available.'</br>';
                    //                             echo $this_available.': "' .$key.'",'; 
                    //                             $ii++;
                    //                         endif;
                    //                     endforeach;     
                    //             ?>
                    //     }
                    // });

                    // jQuery("#endTime").daterangepicker({
                    //         locale: {
                    //           format: "YYYY-MM-DD"
                    //         },
                    //         singleDatePicker: true,
                    //         select :  {
                    //                  //100 : "2016-11-13"
                    //             <?php           //available 
                    //                 $ii = 0;
                    //                     foreach (check_available_single_tour($post->ID) as $key => $this_available) :
                    //                         if($this_available) : 
                    //                             //echo 'date: '.$key.' availabile: '.$this_available.'</br>';
                    //                             echo $this_available.': "' .$key.'",'; 
                    //                             $ii++;
                    //                         endif;
                    //                     endforeach;     
                    //             ?>
                    //     }
                    // });               


                });
            </script>
