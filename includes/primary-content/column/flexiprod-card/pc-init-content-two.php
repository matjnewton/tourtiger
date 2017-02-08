<?php 

if ( get_sub_field( 'fc_style__ct_color' ) ) {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--second {position: relative;background-color:' . get_sub_field( "fc_style__ct_color" ) . ';}';
} else {
	echo '#pc_wrap .' . $fc_style . ' .fc_style--second {position: relative;background-color:transparent;}';
}

if ( in_array( 'top-border', $show_ct ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-two-top-border.php' );

if ( in_array( 'title', $show_ct ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-two-title.php' );

if ( in_array( 'desc', $show_ct ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-two-desc.php' );

if ( in_array( 'price', $show_ct ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-two-price.php' );

if ( in_array( 'button', $show_ct ) )
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-content-two-button.php' );

?>

