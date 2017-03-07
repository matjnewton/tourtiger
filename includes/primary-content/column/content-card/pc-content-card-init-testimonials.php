<?php 

/**
 * Testimonials Title 
 */
$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__test_title_f' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__test_title_c' ) ? 'color:' . get_sub_field( 'cc_style__test_title_c' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--title {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Testimonials Exerpt 
 */
$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__test_excerpt_f' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__test_excerpt_c' ) ? 'color:' . get_sub_field( 'cc_style__test_excerpt_c' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--description {' . $cc_style__ccc_css[1] . '}' : '';

/**
 * Testimonials Link 
 */
$cc_style__ccc_css = pc_init_font_css( get_sub_field( 'cc_style__test_link_f' ) );
$cc_style__ccc_css[1] .= get_sub_field( 'cc_style__test_link_c' ) ? 'color:' . get_sub_field( 'cc_style__test_link_c' ) . ';' : '';

echo $cc_style__ccc_css[0] ? $cc_style__ccc_css[0] : '';
echo $cc_style__ccc_css[1] ? '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--link {' . $cc_style__ccc_css[1] . '}' : '';
echo $cc_style__ccc_css[1] && get_sub_field( 'cc_style__test_link_c-h' ) ? '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--link:hover {color:' . get_sub_field( 'cc_style__test_link_c-h' ) . '}':''; 


if ( in_array( 'quotes', get_sub_field( 'cc_style__test_show' ) ) ) {
	$cc_style__ccc_css = 'color:' . get_sub_field( 'cc_style__test_quotes_c' ) . ';';

	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider:before {' . $cc_style__ccc_css . ';}';
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider:after {' . $cc_style__ccc_css . ';}';

	 echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider .slick-dots .slick-active button {' . get_sub_field( 'cc_style__test_quotes_c' ) . ';}';
} else {
	echo '#pc_wrap .' . $cc_style . ' .pc--c__testimonial--slider .slick-dots .slick-active button {background-color:#666;}';
}



