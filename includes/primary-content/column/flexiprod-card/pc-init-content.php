<?php 

if ( get_sub_field( 'fc_style__' . $flexi_attr['prefix'] . '_color' ) ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--' . $flexi_attr['name'] . ' {position: relative;background-color:' . get_sub_field( "fc_style__" . $flexi_attr['prefix'] . "_color" ) . ';}';
} else {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--' . $flexi_attr['name'] . ' {position: relative;background-color:transparent;}';
}

if ( in_array( 'top-border', $flexi_attr[$prefix] ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-top-border.php' );

if ( in_array( 'title', $flexi_attr[$prefix] ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-title.php' );

if ( in_array( 'desc', $flexi_attr[$prefix] ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-desc.php' );

if ( in_array( 'price', $flexi_attr[$prefix] ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-price.php' );

if ( in_array( 'button', $flexi_attr[$prefix] ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-button.php' );

?>