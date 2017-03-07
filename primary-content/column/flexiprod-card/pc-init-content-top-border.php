<?php 

if ( 
	get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-w' ) 
	&& get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-c' ) 
	&& get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-t' ) 
) {

	$fc_style__fcc_css = '';

	$fc_style__fcc_css .= 'content: "";';

	/* Border Width */
	if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-w' ) == 'full' ) {
		$fc_style__fcc_css .= 'width:100%;';
	} elseif ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-w' ) == 'half' ) {
		$fc_style__fcc_css .= 'width:50%;';
	}

	/* Border color */
	if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-c' ) ) {
		$fc_style__fcc_css .= 'border-color:' . get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-c' ) . ';';
	} else {
		$fc_style__fcc_css .= 'border-color:transparent;';
	}

	/* Border thickness */
	if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-t' ) ) {
		$fc_style__fcc_css .= 'border-width:' . get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_tobo-t' ) . 'px;';
	} else {
		$fc_style__fcc_css .= 'border-width:0px;';
	}

	echo '#pc_wrap .' . $fc_style . ' .fc_style--' . $flexi_attr['name'] . ':before {' . $fc_style__fcc_css . '}';
} 

?>