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

$search_content = null; 

        if($search_aviliable != ''){
            $search_content = '
            <style>
              div.book-btn-wrapper{
                 display:none !important;
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
                            '.$search_tour_for_category.$type_search.'
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

                    jQuery("#endTime").daterangepicker({
                            locale: {
                              format: "YYYY-MM-DD"
                            },
                            singleDatePicker: true,
                    });

                });
            </script>';
        }
