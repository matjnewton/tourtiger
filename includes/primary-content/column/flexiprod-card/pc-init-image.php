<?php
/**
 * Static
 */
include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-text.php' );

if ( isset($flexi_attr['image']) && is_array($flexi_attr['image']) ) :

	if ( in_array( 'title', $flexi_attr['image'] ) )
		include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-title.php' );

	if ( in_array( 'desc', $flexi_attr['image'] ) )
		include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-desc.php' );

	if ( in_array( 'price', $flexi_attr['image'] ) )
		include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-price.php' );

	if ( in_array( 'label', $flexi_attr['image'] ) )
		include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/pc-init-image-label.php' );

endif;


/**
 * Hover
 */
if ( ! wp_is_mobile() ) :
	include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/hover/pc-init-image-text.php' );

	if ( isset($flexi_attr['hover']) && is_array($flexi_attr['hover']) ) :

		if ( in_array( 'title', $flexi_attr['hover'] ) )
			include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/hover/pc-init-image-title.php' );

		if ( in_array( 'desc', $flexi_attr['hover'] ) )
			include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/hover/pc-init-image-desc.php' );

		if ( in_array( 'price', $flexi_attr['hover'] ) )
			include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/hover/pc-init-image-price.php' );

		if ( in_array( 'label', $flexi_attr['hover'] ) )
			include ( get_stylesheet_directory() . '/includes/primary-content/column/flexiprod-card/hover/pc-init-image-label.php' );

	endif;
endif;
