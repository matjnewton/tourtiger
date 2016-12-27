<?php 

	$tour_section_bg_image_url      = get_sub_field( 'tour_pc-bg__select-image--image' );
	$tour_section_bg_image_fixed    = get_sub_field( 'tour_pc-bg__select-image--fixed' );
    $tour_section_bg_image_expanded = get_sub_field( 'tour_pc-bg__select-image--expanded' );

	$tour_section_bg_image = mr_image_resize( $tour_section_bg_image_url, 1920 );

	$tour_section_classes .= ' pc--s__img';

    if ( $tour_section_bg_image != 'image_not_specified' ) {
        if ( $tour_section_bg_image_fixed == 'yep' && $tour_section_bg_image ) { 
        	$tour_section_classes .= ' pc--s__img_fixed';
        	$tour_section_styles .= ' background: url(' . $tour_section_bg_image . ') center center no-repeat; background-attachment: fixed;background-size: cover;';
        } elseif ( $tour_section_bg_image_fixed != 'yep' && $tour_section_bg_image ) {
        	$tour_section_styles .= ' background-image: url(' . $tour_section_bg_image . ');';
        }

        if ( $tour_section_bg_image_expanded == 'yep' ) {
            $tour_section_classes .= ' pc--s__img--eqvival';
        }
    } else{
    	$tour_section_classes .= ' pc--s__img_empty';
        $tour_section_styles .= ' background-color: #f3f3f3;';
    }
?>

