<?php 
// Background
$style_sub_tab_product_rgba = get_field('style_sub_tab_product_rgba', 'options');
$style_sub_tab_product_bg_image = get_field('style_sub_tab_product_bg_image', 'options');
$style_sub_tab_product_bg_repeat = get_field('style_sub_tab_product_bg_repeat', 'options');
// content bg
$style_sub_tab_product_rgba_content = get_field('style_sub_tab_product_rgba_content', 'options');
$style_sub_tab_product_bg_image_content = get_field('style_sub_tab_product_bg_image_content', 'options');
$style_sub_tab_product_bg_repeat_content = get_field('style_sub_tab_product_bg_repeat_content', 'options');
//content 
$style_sub_tab_product_content_corner_alias = get_field('style_sub_tab_product_content_corner_alias', 'options');
$style_sub_tab_product_content_area_dropshadow = get_field('style_sub_tab_product_content_area_dropshadow', 'options');
$style_sub_tab_product_content_area_border = get_field('style_sub_tab_product_content_area_border', 'options');
$style_sub_tab_product_content_area_border_color = get_field('style_sub_tab_product_content_area_border_color', 'options');
$style_sub_tab_product_content_area_border_thickness = get_field('style_sub_tab_product_content_area_border_thickness', 'options');
// hr and icon
$style_sub_tab_product_content_area_icon_color = get_field('style_sub_tab_product_content_area_icon_color', 'options');
$style_sub_tab_product_content_area_hr_line_color = get_field('style_sub_tab_product_content_area_hr_line_color', 'options');
$style_sub_tab_product_content_area_hr_line_thickness = get_field('style_sub_tab_product_content_area_hr_line_thickness', 'options');
// font
$style_sub_tab_product_font_headline = get_field('style_sub_tab_product_font_headline', 'options');
$style_sub_tab_product_font_headline_details = get_field('style_sub_tab_product_font_headline_details', 'options');
$style_sub_tab_product_font_sub_headline = get_field('style_sub_tab_product_font_sub_headline', 'options');
$style_sub_tab_product_font_special_content = get_field('style_sub_tab_product_font_special_content', 'options');
$style_sub_tab_product_font_highlights = get_field('style_sub_tab_product_font_highlights', 'options');
$style_sub_tab_product_font_tripdetailslabel = get_field('style_sub_tab_product_font_tripdetailslabel', 'options');
$style_sub_tab_product_font_tripdetails_content = get_field('style_sub_tab_product_font_tripdetails_content', 'options');
$style_sub_tab_product_font_expandablecontent_title = get_field('style_sub_tab_product_font_expandablecontent_title', 'options');
$style_sub_tab_product_font_expandablecontent_label = get_field('style_sub_tab_product_font_expandablecontent_label', 'options');
$style_sub_tab_product_font_paragraph_content = get_field('style_sub_tab_product_font_paragraph_content', 'options');

$style_sub_tab_product_link_color = get_field('style_sub_tab_product_link_color', 'options');
$style_sub_tab_product_link_color_hover = get_field('style_sub_tab_product_link_color_hover', 'options');
$style_sub_tab_product_link_color_visited = get_field('style_sub_tab_product_link_color_visited', 'options');

// Background Color
if ($style_sub_tab_product_rgba != '') : ?>
	<style>
	.single-product .site-inner .content {
		background: <?php echo $style_sub_tab_product_rgba; ?>;
	}
	body.custom-background.single-product {
	    background-color: <?php echo $style_sub_tab_product_rgba; ?>;
	}
	</style>
<?php endif; ?>

<?php // Background image
//var_dump($style_sub_tab_product_bg_image);
if ($style_sub_tab_product_bg_image) : ?>

	<style>
		.single-product .site-inner .content {
			background-image: url("<?php echo $style_sub_tab_product_bg_image['url']; ?>");
			
			<?php if (!$style_sub_tab_product_bg_repeat) { ?>
				background-repeat: no-repeat;
			<?php } ?>
			
		}
		body.custom-background.single-product {
		    
		}
	</style>
<?php endif; ?>


<?php // Content Background Color
if ($style_sub_tab_product_rgba_content != '') : ?>
	<style>
		.product_content_wrapper {
			background-color: <?php echo $style_sub_tab_product_rgba_content; ?>;
		}
	</style>
<?php endif; ?>

<?php // content Background image
if ($style_sub_tab_product_bg_image_content) : ?>
	<style>
		.product_content_wrapper {
			background-image: url("<?php echo $style_sub_tab_product_bg_image_content['url']; ?>");
			<?php if (!$style_sub_tab_product_bg_repeat_content) { ?>
				background-repeat: no-repeat;
			<?php } ?>
		}
	</style>
<?php endif; ?>

<?php // content 
// $style_sub_tab_product_content_corner_alias 
// $style_sub_tab_product_content_area_dropshadow 
// $style_sub_tab_product_content_area_border
// $style_sub_tab_product_content_area_border_color
// $style_sub_tab_product_content_area_border_thickness

if ($style_sub_tab_product_content_corner_alias) : ?>
	<style>
		.product_content_wrapper {
			border-radius: <?php echo $style_sub_tab_product_content_corner_alias; ?>px;
		}
	</style>
<?php endif; ?>
<?php if ($style_sub_tab_product_content_area_dropshadow) : ?>
	<style>
		.product_content_wrapper {
			<?php if($style_sub_tab_product_content_area_dropshadow == 'none') { ?>
				box-shadow: none;
			<?php } else { ?>
				/*box-shadow: 0 0 <?php echo $style_sub_tab_product_content_area_dropshadow; ?>px rgba(0,0,0,0.1);*/
	
				/*box-shadow: 0 9px 0px 0px white, 0 -9px 0px 0px white, 12px 0 15px -4px rgba(31, 73, 125, 0.8), -12px 0 15px -4px rgba(31, 73, 125, 0.8);*/

			<?php } ?>
		}

	</style>
<?php endif; ?>
<?php if ($style_sub_tab_product_content_area_border) : ?>
	<style>
		.product_content_wrapper {
			<?php if($style_sub_tab_product_content_area_border_color) { ?>
				border-color:<?php echo $style_sub_tab_product_content_area_border_color; ?>;
				/*border-style: solid;*/
				border-left-style: solid;
				border-right-style: solid;

			<?php }  ?>
			<?php if($style_sub_tab_product_content_area_border_thickness) { ?>
				/*border-width:<?php echo $style_sub_tab_product_content_area_border_thickness; ?>px;*/
				border-left-width:<?php echo $style_sub_tab_product_content_area_border_thickness; ?>px;
				border-right-width:<?php echo $style_sub_tab_product_content_area_border_thickness; ?>px;
				/*border-style: solid;*/
				border-left-style: solid;
				border-right-style: solid;
			<?php }  ?>
		}
		.product_content_wrapper.product_content_wrapper_first,
		.product_content_wrapper.product_content_wrapper_header {
			<?php if($style_sub_tab_product_content_area_border_color) { ?>
				border-color:<?php echo $style_sub_tab_product_content_area_border_color; ?>;
				border-top-style: solid;
			<?php }  ?>
			<?php if($style_sub_tab_product_content_area_border_thickness) { ?>
				border-top-width:<?php echo $style_sub_tab_product_content_area_border_thickness; ?>px;
				border-top-style: solid;
			<?php }  ?>			
		}
		.product_content_wrapper.product_content_wrapper_end,
		.product_content_wrapper.product_content_wrapper_footer {
			<?php if($style_sub_tab_product_content_area_border_color) { ?>
				border-color:<?php echo $style_sub_tab_product_content_area_border_color; ?>;
				border-bottom-style: solid;
			<?php }  ?>
			<?php if($style_sub_tab_product_content_area_border_thickness) { ?>
				border-bottom-width:<?php echo $style_sub_tab_product_content_area_border_thickness; ?>px;
				border-bottom-style: solid;
			<?php }  ?>			
		}
	</style>
<?php endif; ?>

<?php // content elements
// $style_sub_tab_product_content_area_icon_color 
// $style_sub_tab_product_content_area_hr_line_color
// $style_sub_tab_product_content_area_hr_line_thickness
if ($style_sub_tab_product_content_area_icon_color) : ?>
	<style>
		.product_content_wrapper i {
		    color: <?php echo $style_sub_tab_product_content_area_icon_color; ?>;
		}
	</style>
<?php endif; ?>
<?php if ($style_sub_tab_product_content_area_hr_line_thickness) {
      		$style_sub_tab_product_content_area_hr_line_thickness_size = $style_sub_tab_product_content_area_hr_line_thickness.'px';
      } else {
      		$style_sub_tab_product_content_area_hr_line_thickness_size = '1px';
      } ?>

<?php if ($style_sub_tab_product_content_area_hr_line_color) : ?>
	<style>
		.primary_content_content_card_hr_line,
		.product_content_wrapper hr {
		    border-top: <?php echo $style_sub_tab_product_content_area_hr_line_thickness_size; ?> solid <?php echo $style_sub_tab_product_content_area_hr_line_color; ?>;
		}
	</style>
<?php elseif ( $style_sub_tab_product_content_area_hr_line_thickness && (!$style_sub_tab_product_content_area_hr_line_color)) : ?>
	<style>
		.primary_content_content_card_hr_line,
		.product_content_wrapper hr {
		    border-top: <?php echo $style_sub_tab_product_content_area_hr_line_thickness; ?>px solid #abc545;
		}
	</style>
<?php endif; ?>

<?php
// headline
if ($style_sub_tab_product_font_headline) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_headline['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_headline['font-family']."';";
		} ?>
		.styles .content .product_title_area.customstyle h1,
		.styles .content .product_title_area.customstyle h2,
		.styles .content .product_title_area.customstyle h3,
		.styles .content .product_title_area.customstyle h4,
		.styles .content .product_title_area.customstyle h5,
		.styles .content .product_title_area.customstyle h6 {
		  font-family: '<?php echo $style_sub_tab_product_font_headline['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_headline['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_headline['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_headline['text-color']; ?>;
		}
	</style>
<?php endif; ?>

<?php
// headline details
if ($style_sub_tab_product_font_headline_details) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_headline_details['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_headline_details['font-family']."';";
		} ?>
		.styles .site-inner .content .product_content_wrapper ul.primary_content_headline_details_options.customstyle span {
		  font-family: '<?php echo $style_sub_tab_product_font_headline_details['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_headline_details['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_headline_details['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_headline_details['text-color']; ?>;
		}
	</style>
<?php endif; ?>


<?php
// sub_headline
if ($style_sub_tab_product_font_sub_headline) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_sub_headline['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_sub_headline['font-family']."';";
		} ?>
.styles .content h1.primary_content_subhead.customstyle,
.styles .content h2.primary_content_subhead.customstyle,
.styles .content h3.primary_content_subhead.customstyle,
.styles .content h4.primary_content_subhead.customstyle,
.styles .content h5.primary_content_subhead.customstyle,
.styles .content h6.primary_content_subhead.customstyle {
		  font-family: '<?php echo $style_sub_tab_product_font_sub_headline['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_sub_headline['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_sub_headline['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_sub_headline['text-color']; ?>;
		}
	</style>
<?php endif; ?>

<?php
// special_content
if ($style_sub_tab_product_font_special_content) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_special_content['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_special_content['font-family']."';";
		} ?>

.styles .site-inner .content .product_content_wrapper.primary_content_special_content.customstyle p {
		  font-family: '<?php echo $style_sub_tab_product_font_special_content['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_special_content['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_special_content['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_special_content['text-color']; ?>;
		}
	</style>
<?php endif; ?>


<?php
// highlights
if ($style_sub_tab_product_font_highlights) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_highlights['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_highlights['font-family']."';";
		} ?>
		.styles .site-inner .content .product_content_wrapper .highlights_options.customstyle span {
		  font-family: '<?php echo $style_sub_tab_product_font_highlights['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_highlights['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_highlights['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_highlights['text-color']; ?>;
		}
	</style>
<?php endif; ?>

<?php
//trip details label
if ($style_sub_tab_product_font_tripdetailslabel) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_tripdetailslabel['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_tripdetailslabel['font-family']."';";
		} ?>
		.styles .site-inner .content .product_content_wrapper span.primary_trip_details_label.customstyle {
		  font-family: '<?php echo $style_sub_tab_product_font_tripdetailslabel['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_tripdetailslabel['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_tripdetailslabel['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_tripdetailslabel['text-color']; ?>;
		}
	</style>
<?php endif; ?>


<?php
//trip details content
if ($style_sub_tab_product_font_tripdetails_content) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_tripdetails_content['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_tripdetails_content['font-family']."';";
		} ?>
		.styles .site-inner .content .product_content_wrapper span.primary_trip_details_detail.customstyle {
		  font-family: '<?php echo $style_sub_tab_product_font_tripdetails_content['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_tripdetails_content['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_tripdetails_content['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_tripdetails_content['text-color']; ?>;
		}
	</style>
<?php endif; ?>


<?php
// expandable content_title
if ($style_sub_tab_product_font_expandablecontent_title) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_expandablecontent_title['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_expandablecontent_title['font-family']."';";
		} ?>
.styles .content .primary_content_expandable_content_options_li h1.primary_content_subhead.customstyle,
.styles .content .primary_content_expandable_content_options_li h2.primary_content_subhead.customstyle,
.styles .content .primary_content_expandable_content_options_li h3.primary_content_subhead.customstyle,
.styles .content .primary_content_expandable_content_options_li h4.primary_content_subhead.customstyle,
.styles .content .primary_content_expandable_content_options_li h5.primary_content_subhead.customstyle,
.styles .content .primary_content_expandable_content_options_li h6.primary_content_subhead.customstyle {
		  font-family: '<?php echo $style_sub_tab_product_font_expandablecontent_title['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_expandablecontent_title['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_expandablecontent_title['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_expandablecontent_title['text-color']; ?>;
		}
/*.styles .site-inner .content a.primary_content_expandable_content_toggle.collapsed::after,
.styles .site-inner .content a.primary_content_expandable_content_toggle::after {
		  color: <?php echo $style_sub_tab_product_font_expandablecontent_title['text-color']; ?>;
}
.styles .site-inner .content a.primary_content_expandable_content_toggle.customstyle {
		font-size: <?php echo $style_sub_tab_product_font_expandablecontent_title['font_size'] - 2; ?>px;
} */
	</style>
<?php endif; ?>


<?php
// expandable content_label
if ($style_sub_tab_product_font_expandablecontent_label) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_expandablecontent_label['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_expandablecontent_label['font-family']."';";
		} ?>
.styles .site-inner .content a.primary_content_expandable_content_toggle.collapsed::after,
.styles .site-inner .content a.primary_content_expandable_content_toggle::after {
		  color: <?php echo $style_sub_tab_product_font_expandablecontent_label['text-color']; ?>;
}
.styles .site-inner .content a.primary_content_expandable_content_toggle.customstyle {
		  font-family: '<?php echo $style_sub_tab_product_font_expandablecontent_label['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_expandablecontent_label['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_expandablecontent_label['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_expandablecontent_label['text-color']; ?>;
} 
	</style>
<?php endif; ?>


<?php
// paragraph_content
if ($style_sub_tab_product_font_paragraph_content) : ?>
	<style>
		<?php if ($style_sub_tab_product_font_paragraph_content['font-family'] != 'Roboto') {
			echo "@import 'https://fonts.googleapis.com/css?family=".$style_sub_tab_product_font_paragraph_content['font-family']."';";
		} ?>

.styles .site-inner .content .product_content_wrapper p,
.product_content_wrapper ul li {
		  font-family: '<?php echo $style_sub_tab_product_font_paragraph_content['font-family']; ?>', sans-serif;
		  font-size: <?php echo $style_sub_tab_product_font_paragraph_content['font_size']; ?>px;
		  font-weight: <?php echo $style_sub_tab_product_font_paragraph_content['font-weight']; ?>;
		  color: <?php echo $style_sub_tab_product_font_paragraph_content['text-color']; ?>;
} 
	</style>
<?php endif; ?>

<?php
// link_color
if ($style_sub_tab_product_link_color) : ?>
	<style>
		.styles .site-inner .content .product_content_wrapper a {
			color: <?php echo $style_sub_tab_product_link_color; ?>;
		} 
	</style>
<?php endif; ?>

<?php
// color_hover
if ($style_sub_tab_product_link_color_hover) : ?>
	<style>
		.styles .site-inner .content .product_content_wrapper a:hover,
		.styles .site-inner .content .product_content_wrapper a:focus,
		.styles .site-inner .content .product_content_wrapper a:active {
			color: <?php echo $style_sub_tab_product_link_color_hover; ?>;
		} 
	</style>
<?php endif; ?>

<?php
// color_visited
if ($style_sub_tab_product_link_color_visited) : ?>
	<style>
		.styles .site-inner .content .product_content_wrapper a:visited {
			color: <?php echo $style_sub_tab_product_link_color_visited; ?>;
		} 
	</style>
<?php endif; ?>