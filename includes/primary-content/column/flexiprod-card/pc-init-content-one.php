<?php 

if ( get_sub_field( 'fc_style__co_color' ) ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--first {position: relative;background-color:' . get_sub_field( "fc_style__co_color" ) . ';}';
} else {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--first {position: relative;background-color:transparent;}';
}

if ( in_array( 'top-border', $show_co ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-one-top-border.php' );

if ( in_array( 'title', $show_co ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-one-title.php' );

if ( in_array( 'desc', $show_co ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-one-desc.php' );

if ( in_array( 'price', $show_co ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-one-price.php' );

if ( in_array( 'button', $show_co ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-one-button.php' );

?>