<?php
/* ===========================
 * Testimonial Page Class Extend
 * ======================== */

class Core extends StylingCard {

	/**
	 * Return Fields
	 * @return array
	 */
	function return_acf_group( $i = '', $c = '' ) {

		$fc_options_array = array (
			'key' => $this->slug . '_style-' . $c,
			'label' => 'Styles group',
			'name' => $this->slug . '_style-' . $c,
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 1,
			'layout' => 'row',
			'button_label' => 'Add Row',
			'sub_fields' => array(

        array (
          'key' => 'fc_' . $i . '_iI_58312',
          'label' => 'Base Wrapper',
          'name' => 'base_wrapper_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_67403',
          'label' => 'Base Wrapper Box-shadow',
          'name' => 'base_wrapper_bs',
          'type' => 'true_false',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_49214',
          'label' => 'Above Header Area',
          'name' => 'above_header_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_41239214',
          'label' => 'Above Header Area Text',
          'name' => 'above_split_bar',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_48305',
          'label' => 'Header Background Color',
          'name' => 'header_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
            'key' => 'fc_' . $i . '_iI_48yegdh5',
            'label' => 'Header Background Gradient',
            'name' => 'header_bg_gradient',
            'type' => 'text',
            'required' => 0,
            'instructions' => 'Please visit <a href="https://cssgradient.io/" target="_blank">CSS Gradient</a>, create gradient and paste its css here. 
                <a href="'.get_site_url() . '/wp-content/themes/tourismtiger/images/linear-gradient-tip.jpeg" target="_blank">
                <i class="fa fa-question-circle-o"></i></a>',
            'placeholder'=>'linear-gradient(0deg, rgba(136,196,64,1) 0%, rgba(255,241,0,1) 100%)',
             'prepend' => 'background:',
             'append' => ';',
        ),
        array (
          'key' => 'fc_' . $i . '_iI_3z396',
          'label' => 'Secondary menu',
          'name' => 'secondary_menu_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_3z396',
          'label' => 'Submenu item',
          'name' => 'sub_menu_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iMI_3z396',
          'label' => 'Submenu item Darken version',
          'name' => 'sub_menu_darken_bg',
          'type' => 'rgba_color',
          'required' => 0,
          'instructions' => 'Usually it is 7% darkener than Submenu item'
        ),
        array (
          'key' => 'fc_' . $i . '_iI_2x487',
          'label' => 'CTA Button',
          'name' => 'cta_button_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_3c578',
          'label' => 'Secondary Bar',
          'name' => 'se_bar_wrapper_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_5v669',
          'label' => 'Secondary Submenu',
          'name' => 'se_sub_menu_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),

        array (
            'key' => 'fc_' . $i . '_iI_6b77eh',
            'label' => 'Social Icons On Mobile',
            'name' => 'social_icons_on_mobile',
            'type' => 'rgba_color',
            'required' => 0,
        ),

        array (
          'key' => 'fc_' . $i . '_iI_5v669',
          'label' => 'Mobile Toggle button',
          'name' => 'mob_tog_btn_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_6b750',
          'label' => 'Mobile Toggle button hover',
          'name' => 'mob_tog_btn_bg_h',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_7nwe851',
          'label' => 'Hero CTA Button',
          'name' => 'hero_cta_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
		array (
			'key' => 'fc_' . $i . '_iI_7sd76ey51',
			'label' => 'Hero CTA Button on Mouseover',
			'name' => 'hero_cta_hover_bg',
			'type' => 'rgba_color',
			'required' => 0,
		),
		array (
			'key' => 'fc_' . $i . '_CH_7ween851',
			'label' => 'Hero CTA Lighten Button',
			'name' => 'hero_cta_lighten_bg',
			'type' => 'rgba_color',
			'required' => 0,
			'instruction' => 'Usually it is 10% lightener than Hero CTA Lighten Button'
		),
        array (
          'key' => 'fc_' . $i . '_iI_7n851',
          'label' => 'Content CTA Button',
          'name' => 'hero_cta_content_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_DI_7n851',
          'label' => 'Content CTA Darken Button',
          'name' => 'hero_cta_darken_content_bg',
          'type' => 'rgba_color',
          'required' => 0,
          'instructions' => 'Usually it is 10% darkener than Content CTA Button'
        ),
        array (
          'key' => 'fc_' . $i . '_LI_7n851',
          'label' => 'Content CTA Lighten Button',
          'name' => 'hero_cta_lighten_content_bg',
          'type' => 'rgba_color',
          'required' => 0,
          'instructions' => 'Usually it is 10% lightener than Content CTA Button'
        ),

        array (
          'key' => 'fc_' . $i . '_iI_8a033',
          'label' => 'Hero Image Tint',
          'name' => 'hero_image_tint',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key' => 'fc_' . $i . '_iI_9s124',
          'label' => 'Hero Title',
          'name' => 'hero_title_bg',
          'type' => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_0d215',
          'label' => 'Hero Content',
          'name'  => 'hero_content_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_0d215',
          'label' => 'Point of Difference Background on Front page',
          'name'  => 'point_of_diff_bg_fe',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_1f306',
          'label' => 'Secondary Menu Background on Tour pages',
          'name'  => 'se_menu_bg_tp',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_2g497',
          'label' => 'Button background',
          'name'  => 'tn_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_BI_2g497',
          'label' => 'Button lighten background',
          'name'  => 'tn_lighten_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_3h588',
          'label' => 'Button background fill',
          'name'  => 'btn_fill',
          'type'  => 'true_false',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_3h579',
          'label' => 'Elements accent',
          'name'  => 'el_accent_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_3h150',
          'label' => 'Content Area',
          'name'  => 'content_area_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_4j241',
          'label' => 'Content Containers',
          'name'  => 'content_containers_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_5k132',
          'label' => 'Featured Area Container Background',
          'name'  => 'featured_area_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_6l223',
          'label' => 'Featured Area Container Box-shadow',
          'name'  => 'featured_area_bs',
          'type'  => 'true_false',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6l214',
          'label' => 'Tile image tint',
          'name'  => 'tile_image_tint',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6l215',
          'label' => 'CTA Container',
          'name'  => 'cta_container_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_6q306',
          'label' => 'Subscribe Container',
          'name'  => 'subscribe_container_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_6q397',
          'label' => 'Trip list item',
          'name'  => 'trip_list_item_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iD_6q397',
          'label' => 'Trip list item',
          'name'  => 'trip_list_item_darken_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_7w488',
          'label' => 'Fluid Box Background-Color Variation-1',
          'name'  => 'fl_box_bg_1',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_7w579',
          'label' => 'Fluid Box Background-Color Variation-2',
          'name'  => 'fl_box_bg_2',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
          'key'   => 'fc_' . $i . '_iI_7w560',
          'label' => 'Trip Link Button',
          'name'  => 'trip_link_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_iI_7w551',
          'label' => 'Footer background',
          'name'  => 'footer_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_bu_7w121_t0n',
          'label' => 'Navigation button background',
          'name'  => 'nav_button_bg',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_bu_7w121_t9n',
          'label' => 'Navigation button background Mouseover',
          'name'  => 'nav_button_bg_hover',
          'type'  => 'rgba_color',
          'required' => 0,
        ),

        array (
          'key'   => 'fc_' . $i . '_bu_7w121_t1n',
          'label' => 'Navigation button color',
          'name'  => 'nav_button_color',
          'type'  => 'rgba_color',
          'required' => 0,
        ),
        array (
            'key'   => 'fc_' . $i . '_bu_7w121_bas',
            'label' => 'Linked text color',
            'name'  => 'linked_text_color',
            'type'  => 'rgba_color',
            'required' => 0,
        ),

        array (
            'key'   => 'fc_' . $i . '_bu_7w121_wqe8',
            'label' => 'Linked text color - mouse over',
            'name'  => 'linked_text_color_hover',
            'type'  => 'rgba_color',
            'required' => 0,
        ),
      ),
    );

		return $fc_options_array;

	}

	/**
	 * Get styles
	 *
	 * @var    string   $style       style number
	 * @var    string   $component   name of component
	 * @return string
	 */
	public static function get_styles( $style = 'core_style-one' ) {
		$css = '';

		if ( have_rows( $style, 'option' ) ) {
			while ( have_rows( $style, 'option' ) ) {
				the_row();

        $base_wrapper_bg = get_sub_field('base_wrapper_bg');
        $base_wrapper_bs = get_sub_field('base_wrapper_bs');

        $above_header_bg   = get_sub_field('above_header_bg');
        $above_split_bar   = get_sub_field('above_split_bar');
        $header_bg_color    = get_sub_field('header_bg');
        $header_bg_gradient = get_sub_field('header_bg_gradient');
        $secondary_menu_bg = get_sub_field('secondary_menu_bg');

        $sub_menu_bg        = get_sub_field('sub_menu_bg');
        $sub_menu_darken_bg = get_sub_field('sub_menu_darken_bg');
        $cta_button_bg      = get_sub_field('cta_button_bg');

        $se_bar_wrapper_bg = get_sub_field('se_bar_wrapper_bg');
        $se_sub_menu_bg    = get_sub_field('se_sub_menu_bg');

        $social_icons_on_mobile = get_sub_field('social_icons_on_mobile');

        $mob_tog_btn_bg   = get_sub_field('mob_tog_btn_bg');
        $mob_tog_btn_bg_h = get_sub_field('mob_tog_btn_bg_h');

        $hero_cta_bg         = get_sub_field('hero_cta_bg');
		$hero_cta_hover_bg   = get_sub_field('hero_cta_hover_bg');
        $hero_cta_lighten_bg = get_sub_field('hero_cta_lighten_bg');
        $hero_cta_content_bg = get_sub_field('hero_cta_content_bg');
        $hero_cta_darken_content_bg  = get_sub_field('hero_cta_darken_content_bg');
        $hero_cta_lighten_content_bg = get_sub_field('hero_cta_lighten_content_bg');

        $hero_image_tint = get_sub_field('hero_image_tint');
        $hero_title_bg   = get_sub_field('hero_title_bg');
        $hero_content_bg = get_sub_field('hero_content_bg');

        $point_of_diff_bg_fe = get_sub_field('point_of_diff_bg_fe');
        $se_menu_bg_tp       = get_sub_field('se_menu_bg_tp');

        $tn_bg         = get_sub_field('tn_bg');
        $tn_lighten_bg = get_sub_field('tn_lighten_bg');
        $btn_fill      = get_sub_field('btn_fill');

        $el_accent_bg = get_sub_field('el_accent_bg');

        $content_area_bg       = get_sub_field('content_area_bg');
        $content_containers_bg = get_sub_field('content_containers_bg');
        $featured_area_bg      = get_sub_field('featured_area_bg');

        $featured_area_bs = get_sub_field('featured_area_bs');
        $tile_image_tint  = get_sub_field('tile_image_tint');
        $cta_container_bg = get_sub_field('cta_container_bg');

        $subscribe_container_bg    = get_sub_field('subscribe_container_bg');
        $trip_list_item_bg         = get_sub_field('trip_list_item_bg');
        $trip_list_item_darken_bg  = get_sub_field('trip_list_item_darken_bg');

        $fl_box_bg_1  = get_sub_field('fl_box_bg_1');
        $fl_box_bg_2  = get_sub_field('fl_box_bg_2');
        $trip_link_bg = get_sub_field('trip_link_bg');

        $footer_bg = get_sub_field('footer_bg');

        $nav_btn_bg = get_sub_field('nav_button_bg');
        $nav_btn_bg_h = get_sub_field('nav_button_bg_hover');
        $nav_btn_color = get_sub_field('nav_button_color');

        $linked_text_color = get_sub_field('linked_text_color');
        $linked_text_color_hover = get_sub_field('linked_text_color_hover');

        //$css .= '<style>';

        $css .= $linked_text_color ? "a > * {color:{$linked_text_color}!important;}" : '';

        $css .= $linked_text_color_hover ? "a:hover > * {color:{$linked_text_color_hover}!important;}" : '';



          if ($nav_btn_bg) {
            $css .= ".book-btn > *, #menu-main-nav .xola-book-btn > *, #menu-main-nav .peek-book-btn > *, #menu-main-nav .book-btn > * {background-color:{$nav_btn_bg}!important;}";
          }

          if ($nav_btn_bg_h) {
            $css .= ".book-btn > *, #menu-main-nav .xola-book-btn > *, #menu-main-nav .peek-book-btn > *, #menu-main-nav .book-btn > *:hover {background-color:{$nav_btn_bg_h}!important;}";
          }

          if ($nav_btn_color) {
            $css .= ".book-btn > *, #menu-main-nav .xola-book-btn > *, #menu-main-nav .peek-book-btn > *, #menu-main-nav .book-btn > * {color:{$nav_btn_color}!important;}";
          }

          $css .= $base_wrapper_bs ? ".site-container{max-width:1440px;margin-left:auto;margin-right:auto;box-shadow:0 1px 4px rgba(0,0,0,0.45);}" : '';
          $css .= $base_wrapper_bg ? ".site-container{background:{$base_wrapper_bg}}" : '';


          $css .= $above_header_bg ? ".above-header{background:{$above_header_bg}}" : '';

          $css .= $above_split_bar ? ".above-split-bar{color:{$above_split_bar}}" : '';

          $css .= $header_bg_color ? "body .site-container .site-header .header-bar-wrapper{background-color:$header_bg_color}" : '';

          $css .= $header_bg_gradient ? "body .site-container .site-header .header-bar-wrapper{background:$header_bg_gradient}" : '';

          $css .= $secondary_menu_bg ? ".site-container .site-header .secondary-menu-wrapper{background:{$secondary_menu_bg};}" : '';

          $css .= $sub_menu_bg ? ".main-nav-wrapper .genesis-nav-menu .sub-menu .megamenu .sub-menu a,.main-nav-wrapper .genesis-nav-menu > .megamenu > .sm-container > .sm-inner,.main-nav-wrapper .genesis-nav-menu .sub-menu a{background:{$sub_menu_bg};}" : '';

            $css .= ".main-nav-wrapper .genesis-nav-menu .megamenu > .sm-container a{background:none;}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .megamenu:hover .megalink-wrap > a:after{border-color: transparent transparent {$sub_menu_bg} transparent;}";
            $css .= ".main-nav-wrapper .genesis-nav-menu > .menu-item > .sub-menu:before{border-color: transparent transparent {$sub_menu_darken_bg} transparent;}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .sub-menu .menu-item:first-child:before{background:{$sub_menu_bg};border-width:0 0 1px 1px;border-style: solid;border-color:{$sub_menu_darken_bg}}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .sub-menu .menu-item:first-child:hover:before{background:white}";
            $css .= ".main-nav-wrapper .genesis-nav-menu > .menu-item > .sub-menu > .menu-item:first-child{border-top:5px solid {$sub_menu_darken_bg}}";
            $css .= ".main-nav-wrapper .genesis-nav-menu > .menu-item > .sub-menu{border-bottom:4px solid {$sub_menu_darken_bg}}";
            $css .= ".main-nav-wrapper .genesis-nav-menu > .megamenu.menu-item > .sm-container > .sm-inner .menu-item a:hover{background:none}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .menu-item a:hover{background:#fff}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .sub-menu .menu-item:first-child{border-top:0px solid {$sub_menu_darken_bg}}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .sub-menu .menu-item a:hover{background:#fff}";
            $css .= ".main-nav-wrapper .genesis-nav-menu > .megamenu.menu-item > .sm-container a{border-width:0}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu a{border-width:0 1px 1px 1px;border-style:solid;border-color:{$sub_menu_darken_bg}}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .sub-menu{border-width:1px 1px 1px 1px;border-style:solid;border-color:{$sub_menu_darken_bg}}";
            $css .= ".main-nav-wrapper .genesis-nav-menu .sub-menu .sub-menu a{border-width:1px 0px 0px 0px;}";
          $css .= ".site-container .genesis-nav-menu .giso-book-btn a{background:none}";
          $css .= ".site-container .genesis-nav-menu .regiondo-book-btn a, .site-container .genesis-nav-menu .rezdy-book-btn a, .site-container .genesis-nav-menu .trekksoft-book-btn a, .site-container .genesis-nav-menu .fareharbor-book-btn a, .site-container .genesis-nav-menu .xola-book-btn div, .site-container .genesis-nav-menu .peek-book-btn a, .site-container .genesis-nav-menu .giso-book-btn a, .site-container .genesis-nav-menu .book-btn a, .site-container li.btn a {background:{$cta_button_bg}}";

          $css .= ".secondary-nav-wrapper .container{background:{$se_bar_wrapper_bg}}";
          $css .= ".secondary-nav-wrapper .genesis-nav-menu .sub-menu a{background:{$se_sub_menu_bg}}";

          $css .= ".navbar .social-media-mobile ul li a{color:{$social_icons_on_mobile}}";

          $css .= ".navbar .navbar-toggle{background:{$mob_tog_btn_bg}}";
          $css .= ".navbar .navbar-toggle:hover,.navbar .navbar-toggle:focus{background:{$mob_tog_btn_bg_h}}";

          $css .= ".tint{background:{$hero_image_tint}}";
          $css .= ".banner-top h1 span,.banner-top h2 span,.tour-2 .name{background:{$hero_title_bg}}";
          $css .= ".banner-top li span,.banner-top p span{background:{$hero_content_bg}}";

          $css .= ".tile-tint{background:{$tile_image_tint}}";

            $css .= ".site-container .book-tour-wrapper .btn-default.book-btn, .site-container .tour-page-content .book-btn{background:{$hero_cta_content_bg}}";
            $css .= ".site-container .book-tour-wrapper .book-btn2, .site-container .book-btn-wrapper .btn-default.book-btn2{background-color:{$hero_cta_lighten_content_bg}}";
            $css .= ".site-container .book-tour-wrapper .book-btn2:hover{background-color:{$hero_cta_darken_content_bg}}";
            $css .= ".booking-sidebar .arrow-left{border-right: 10px solid {$hero_cta_darken_content_bg}}";
            $css .= ".booking-sidebar .arrow-right{border-left: 10px solid {$hero_cta_darken_content_bg}}";

			$css .= $hero_cta_bg ? ".site-container .book-btn-wrapper .btn-default.book-btn, .site-container .banner .book-btn{background:$hero_cta_bg;transition:.3s}" : "";
			$css .= $hero_cta_hover_bg  ? ".site-container .book-btn-wrapper .btn-default.book-btn:hover, .site-container .banner .book-btn:hover{background:$hero_cta_hover_bg}" : "";

          $css .= ".booking-sidebar .trigger-txt{color:#000}";
          $css .= ".book-btn-wrapper .dropdown-menu > li > .regiondo-button, .site-container .book-btn-wrapper .dropdown-menu, .book-btn-wrapper .dropdown-menu > li > a.zaui-embed-button, .book-btn-wrapper .dropdown-menu > li > a.giso_btn{background-color:rgba({$hero_cta_bg}, 1)}";
          $css .= ".book-tour-wrapper .dropdown-menu > li > .orioly-booknow button,.site-container .book-tour-wrapper .dropdown-menu, .book-tour-wrapper .dropdown-menu > li > a.regiondo-button, .book-tour-wrapper .dropdown-menu > li > a.zaui-embed-button, .book-tour-wrapper .dropdown-menu > li > a.giso_btn{background-color: {$hero_cta_content_bg}}";

          $css .= ".book-btn-wrapper .dropdown-menu > li > .xola-custom, .book-btn-wrapper .dropdown-menu > li > a:hover {background:{$hero_cta_lighten_bg}}";
          $css .= ".book-btn-wrapper .dropdown-menu > li > .xola-custom, .book-btn-wrapper .dropdown-menu > li > a:focus {background:{$hero_cta_lighten_bg}}";
          $css .= ".book-tour-wrapper .dropdown-menu > li > .orioly-booknow button,.book-tour-wrapper .dropdown-menu > li > .xola-custom, .book-tour-wrapper .dropdown-menu > li > a:hover{background: {$hero_cta_lighten_content_bg}}";
          $css .= ".book-tour-wrapper .dropdown-menu > li > .orioly-booknow button,.book-tour-wrapper .dropdown-menu > li > .xola-custom, .book-tour-wrapper .dropdown-menu > li > a:focus{background: {$hero_cta_lighten_content_bg}}";
          $css .= ".home .banner-bottom .container{background:{$point_of_diff_bg_fe}}";
          $css .= ".banner-bottom .container{background:{$se_menu_bg_tp}}";
          $css .= ".site-inner .content{background:{$content_area_bg}}";
          $css .= ".front-page-section .featured-tours-2, .featured-tours-section, .featured-tours .container, .featured-tours-2 .position-wrapper, .featured-section .container{background:{$featured_area_bg}}";
          $css .= ".front-page-section .container, .multi-column-area .container, .featured-tours .container.no-bg .col-sm-8.left-col, .testimonials .container, .reasons .container, .single-tour .left-col, .page-template-default .left-col, .page-template-page-templatestestimonials-php .left-col, .page-template-page-templatestours-php .left-col, .blog-left-col, .faq-page-content .container, .team-members .container, .single-tour .right-col>div, .page-template-default .right-col>div, .page-template-page-templatestestimonials-php .right-col>div, .page-template-page-templatestours-php .right-col>div, .single-tour .right-col .testimonials, .page-template-default .right-col .testimonials, .blog-right-col>div, .classic-itinerary-list .num-wrapper .itinery-num{background:{$content_containers_bg}}";
          $css .= ".site-container .book-tour-wrapper{background:{$cta_container_bg}}";
          $css .= ".subscribe{background:{$subscribe_container_bg}}";
          $css .= ".site-footer{background:{$footer_bg}}";

          $css .= ".trip-list .trip-item{background:{$trip_list_item_bg};border:1px solid {$trip_list_item_darken_bg}}";
          $css .= ".trip-item li{border-top:1px solid {$trip_list_item_darken_bg}}";
          $css .= ".trip-item li:first-child{border-top:none}";

          if ( $tn_bg ):
              $css .= ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a{border:3px solid {$tn_bg}}";
              $css .= ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:hover{background:{$tn_bg}}";

              $css .= $btn_fill ? ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a{background:none;color:{$tn_bg}}" : ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a{background:{$tn_bg};color:#fff;}";
              $css .= $btn_fill ? ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:link{color:{$tn_bg}}" : ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:link{color:#fff}";
              $css .= $btn_fill ? ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:active{color:{$tn_bg}}" : ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:active{color:#fff}";
              $css .= $btn_fill ? ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:visited{color:{$tn_bg}}" : ".site-container .featured-tours .view-tour-btn .regiondo-button, .site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a:visited{color:#fff}";

              $css .= ".site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .open .btn-default{background:{$tn_bg}}";
              $css .= ".site-container .view-dropdown-wrapper .dropdown-menu{background-color:{$tn_bg}}";

              $css .= ".view-dropdown-wrapper .dropdown-menu > li > .xola-custom, .view-dropdown-wrapper .dropdown-menu > li > a:hover{background:{$tn_lighten_bg}}";
              $css .= ".view-dropdown-wrapper .dropdown-menu > li > .xola-custom, .view-dropdown-wrapper .dropdown-menu > li > a:focus{background:{$tn_lighten_bg}}";

              $css .= $featured_area_bs ? ".front-page-section .featured-tours-2, .featured-tours-2 .position-wrapper, .featured-tours-section{box-shadow: rgba(0, 0, 0, 0.09) 0px 0px 15px 0px}" : '';

              $css .= ".tour-2 .btn-tour{border: 3px solid {$tn_bg}}";
              $css .= $btn_fill ? ".tour-2 .btn-tour{background:{$tn_bg}}" : '';
              $css .= ".tour-2 .hover-button-tour{background-color:{$tn_bg}}";

              $css .= ".site-container .fluid-boxes .view-tour-btn a{border:3px solid {$tn_bg};color:{$tn_bg}}";
              $css .= $btn_fill ? ".site-container .fluid-boxes .view-tour-btn a{background:{$tn_bg}}" : ".site-container .fluid-boxes .view-tour-btn a{background:none";

              $css .= ".site-container .fluid-boxes .view-tour-btn a:link,.site-container .fluid-boxes .view-tour-btn a:active,.site-container .fluid-boxes .view-tour-btn a:visited{color:{$tn_bg}}";
              $css .= ".site-container .fluid-boxes .view-tour-btn a:hover{background:{$tn_bg}}";

              $css .= $el_accent_bg ? ".widget-item .tagcloud a:link,.widget-item .tagcloud a:hover,.widget-item .tagcloud a:active,.widget-item .tagcloud a:visited{background: {$el_accent_bg}}" : '';

              $css .= ".gform_footer input[type='submit']{border: 3px solid {$tn_bg}}";
              $css .= $btn_fill ? ".gform_footer input[type='submit']{color:#fff;background:{$tn_bg}}" : ".gform_footer input[type='submit']{color:{$tn_bg}}";
              $css .= ".gform_footer input[type='submit']:hover{color:#fff;background:{$tn_bg}}";
          endif;

          $css .= $fl_box_bg_1 ? ".fluid-boxes .color-variation-1{background-color:{$fl_box_bg_1}}" : '';
          $css .= $fl_box_bg_2 ? ".fluid-boxes .color-variation-2{background-color:{$fl_box_bg_2}}" : '';
          $css .= $trip_link_bg ? ".link-tours .link-tour-wrapper a{background-color:{$trip_link_bg}}" : '';

        // $css .= '</style>';

			}
		} else {
			$css .= "<!-- There are not styles for this style group. -->";
		}

		return $css;
	}

}

new Core( 'Core', 1, true );
