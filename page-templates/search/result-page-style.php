<?php
$style_sub_tab_results_page_flag = get_field('style_sub_tab_results_page_flag', 'options');
$style_sub_tab_results_page_booking_button = get_field('style_sub_tab_results_page_booking_button', 'options'); 
$style_sub_tab_results_page_view_tour_button = get_field('style_sub_tab_results_page_view_tour_button', 'options'); 
$style_sub_tab_results_text_color = get_field('style_sub_tab_results_text_color', 'options');  
$style_sub_tab_results_available_color = get_field('style_sub_tab_results_available_color', 'options');
$style_sub_tab_results_font_all = get_field('style_sub_tab_results_font_all', 'options');

// flag Color
if ($style_sub_tab_results_page_flag != '') : ?>
	<style>
	.most_popular {
    	background-color: <?php echo $style_sub_tab_results_page_flag; ?>;
	}
	</style>
<?php endif; 

// booking_button Color
if ($style_sub_tab_results_page_booking_button != '') : ?>
	<style>
	.button-viewtour.button-book {
    	background-color: <?php echo $style_sub_tab_results_page_booking_button; ?>;
	}
	</style>
<?php endif; 

// button-viewtour Color
if ($style_sub_tab_results_page_view_tour_button != '') : ?>
	<style>
	.button-viewtour,
	#searchfilter .btn-datepicker {
    	background-color: <?php echo $style_sub_tab_results_page_view_tour_button; ?>;
	}
	.search-tumb-price {
		color: <?php echo $style_sub_tab_results_page_view_tour_button; ?>;
	}
	</style>
<?php endif; 

// available Color
if ($style_sub_tab_results_available_color != '') : ?>
	<style>
	.search-descript-available {
    	color: <?php echo $style_sub_tab_results_available_color; ?>;
	}
	</style>
<?php endif; 

// available Color
if ($style_sub_tab_results_font_all != '') : ?>
	<style>
	<?php if ($style_sub_tab_product_font_headline['font-family'] != 'Roboto') {
		echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_results_font_all['font-family']."';";
	} ?>
	body.custom-background.page-template-rezdy_search,
	.styles .content .search-descript-wrap h3,
	.styles .site-inner .content p.cDate2 {
	    font-family: <?php echo $style_sub_tab_results_font_all['font-family']; ?>, sans-serif;
	}
	</style>
<?php endif; 


// available Color
if ($style_sub_tab_results_text_color != '') : ?>
	<style>
	.styles .site-inner .content p.cDate2,
	.styles .content .search-descript-wrap h3,
	#searchfilter .datepicker-instructions,
	.search-descript-descript,
	.search-descript-departure-text {
    	color: <?php echo $style_sub_tab_results_text_color; ?>;
	}
	.page-template-rezdy_search .cDate2 {
	    border-bottom: 2px solid <?php echo $style_sub_tab_results_text_color; ?>;
	}
	.styles .content .search-descript-wrap h3 {
	    border-bottom: solid 1px <?php echo $style_sub_tab_results_text_color; ?>;
	}
	</style>
<?php endif; 