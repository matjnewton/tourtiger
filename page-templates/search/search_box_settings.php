<!-- search box settings -->
<?php global $search_content; ?>

<?php

if(get_post_meta($post->ID,'hero_area_0_button_link_type',true)!=''){
    if(get_post_meta($post->ID,'hero_area_0_button_link_type',true)=='Search Box'){
      if(get_post_meta($post->ID,'hero_area_0_an_search_box_view',true)!=''){
        $search_aviliable = get_post_meta($post->ID,'hero_area_0_an_search_box_view',true);
      }
    }
    else{
      $search_aviliable = '';
    }
} 

$search_tour_cat = get_the_terms( $post->ID, 'tour_cat' )[0]->slug;
$search_settings_type = get_sub_field('search_settings_type');
$search_settings_type_category_select = get_sub_field('search_settings_type_category_select');
$search_settings_type_category = get_sub_field('search_settings_type_category');
$search_settings_type_category_hide_option = get_sub_field('search_settings_type_category_hide_option');
$search_settings_type_special_message = get_sub_field('search_settings_type_special_message');
// position
$search_settings_type_datepicker_position = get_sub_field('search_settings_type_datepicker_position');
$datepicker_position = '';
$datepicker_style = '';
if( $search_settings_type_datepicker_position ):
     foreach( $search_settings_type_datepicker_position as $position ): 
        if ($position =='drop-up') {
            $datepicker_position .= ' dropup ';
            $datepicker_style = '
            <style>
                #vinetrekker_piker.daterangepicker {
                    margin-top: -8px;
                }
                #vinetrekker_piker.daterangepicker:after {
                    border-left: 10px solid transparent;
                    border-right: 10px solid transparent;
                    border-top: 10px solid #fff;
                    border-bottom: none;
                    top: initial;
                    bottom: -10px;   
                }
                #vinetrekker_piker.daterangepicker:before {
                    border-right: 10px solid transparent;
                    border-top: 10px solid #ccc;
                    border-bottom: none;
                    top: initial;
                    bottom: -10px;
                }
            </style>';
        }
        // if ($position =='left') {
        //     $datepicker_position .= ' pull-right ';
        // }
     endforeach; 
endif; 
 
if ($search_settings_type =='Search by one date') {
    $search_by_onedate = true; 
    $type_search= '<input type="hidden" name="type_search" id="type_search" value="one_date"/>';
    
    ?>
    <script>
        jQuery(function() {
            $(".endTime-wrap").hide();
            $(".one_date_hide").hide();
            // var startt = $('#startTime').val();
            // startt = moment(startt).format('YYYY-MM-DD');

            // $('#startTime').change(function(event) {
            //     // $start = $('#startTime').val();
            //     $('#endTime').val(startt);
            // });

           
        });
    </script>
    <?php 
    $block = '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_box"></div>'; ?>
<?php } else {
    $block = '';
    $type_search = '';
}


if ($search_settings_type_category) {
    if ($search_settings_type_category_select) {
        $category_list = array();
        foreach ($search_settings_type_category_select as $key => $value) {
            //$category_list[] = $value->slug;
            $category_list[] = $value->term_id;
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


if ($search_settings_type_category && $search_settings_type_category_hide_option) {
    $hide_option = '<input type="hidden" name="hide_option" id="hide_option" value="true"/>';
} else {
    $hide_option ='';
}

if ($search_settings_type_special_message != null) {
    $special_message = '<input type="hidden" name="special_message" id="special_message" value="'.$post->ID.'"/>';
    update_post_meta( $post->ID, 'special_message', $search_settings_type_special_message );
} else {
    $special_message ='';
}

$search_content = null; 

// margin for serch box
$hero_margin = get_field('hero_headline_top_margin');
$home_page_search_margin = '';
if ($hero_margin) {
   $home_page_search_margin = 'margin-top:'. ($hero_margin+20) .'px;';
} else {
   $home_page_search_margin = '';
}

        if($search_aviliable != ''){
            $search_content = '
            '.$datepicker_style.'
            <style>
              div.book-btn-wrapper{
                 display:none !important;
              }
              .home_page_search {
                '. $home_page_search_margin .'
              }
            </style>

            <div class="home_page_search">
                <div class="container">
                    <div class="row">
                        <form class="form-horizontal" action="/search/" method="get">
                            '. $block .'
                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 rezdy_box one_date_hide">
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_box ">
                                <div class="add-on">
                                    <input name="startTime" id="startTime" class="form-control rezdy_date '.$datepicker_position.'" type="text" placeholder="Start Day" />
                                    <i class="fa fa-calendar cal" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 rezdy_box endTime-wrap">
                                <div class="add-on">
                                    <input name="endTime" id="endTime" class="form-control rezdy_date '.$datepicker_position.'" type="text" placeholder="End Day" />
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
                            '.$search_tour_for_category.$type_search.$hide_option.$special_message.'
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(function() {

                    jQuery("#startTime").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                    });

                    var startplus = moment().startOf("day");
                    startplus = new Date(startplus);
                    startplus.setDate(startplus.getDate() + 1);

                    jQuery("#endTime").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                            startDate: startplus,
                            minDate: startplus,
                    });

                    //jQuery("#startTime").change(function(event) {
                            // var start = $("#startTime").val();
                            // start = new Date(start);
                            // start.setDate(start.getDate() + 1);
                            // jQuery("#endTime").data("daterangepicker").setStartDate(start);
                            // jQuery("#endTime").data("daterangepicker").setEndDate(start);
                            // jQuery("#endTime").data("daterangepicker").setMinDate(start);
                    //});
                    jQuery("#startTime").on("apply.daterangepicker", function(ev, picker) {
                            //console.log(picker.startDate.format("YYYY-MM-DD"));
                            var start = picker.startDate;
                            start = new Date(start);
                            start.setDate(start.getDate() + 1);
                            //console.log(start);
                            jQuery("#endTime").data("daterangepicker").setStartDate(start);
                            jQuery("#endTime").data("daterangepicker").setEndDate(start);
                            jQuery("#endTime").data("daterangepicker").setMinDate(start);
                    });

                });
            </script>';
        }
