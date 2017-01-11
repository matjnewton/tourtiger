<?php 

$fc_style__fcc_css = '';

if ( 
	in_array( 'top-border', get_sub_field( 'fc_style__co' ) ) 
	&& get_sub_field( 'fc_style__co_tobo-w' ) 
	&& get_sub_field( 'fc_style__co_tobo-c' ) 
	&& get_sub_field( 'fc_style__co_tobo-t' ) 
) {

	$fc_style__fcc_css .= 'content: ""';

	/* Border Width */
	if ( get_sub_field( 'fc_style__co_tobo-w' ) == 'full' ) {
		$fc_style__fcc_css .= 'width:100%;';
	} elseif ( get_sub_field( 'fc_style__co_tobo-w' ) == 'half' ) {
		$fc_style__fcc_css .= 'width:50%;';
	}

	/* Border color */
	if ( get_sub_field( 'fc_style__co_tobo-c' ) ) {
		$fc_style__fcc_css .= 'border-color:' . get_sub_field( 'fc_style__co_tobo-c' ) . ';';
	} else {
		$fc_style__fcc_css .= 'border-color:transparent;';
	}

	/* Border thickness */
	if ( get_sub_field( 'fc_style__co_tobo-t' ) ) {
		$fc_style__fcc_css .= 'border-width:' . get_sub_field( 'fc_style__co_tobo-c' ) . 'px;';
	} else {
		$fc_style__fcc_css .= 'border-width:0px;';
	}
} 

echo '#pc_wrap .' . $fc_style . ' .fc_style--first:before {' . $fc_style__fcc_css . '}';

?>