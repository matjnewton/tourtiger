<?php while ( have_rows( $fc_style, 'option' ) ) : the_row();

	$show_image = get_sub_field( 'fc_style__imdis' );
	$show_co = get_sub_field( 'fc_style__co' ); 
	$show_ct = get_sub_field( 'fc_style__ct' ); 

	if ( get_sub_field( 'fc_style__co_butt_pos' ) == 'left' ) {
		$fc_style__co_butt_pos = 'left';
	} elseif ( get_sub_field( 'fc_style__co_butt_pos' ) == 'center' ) {
		$fc_style__co_butt_pos = 'center';
	} elseif ( get_sub_field( 'fc_style__co_butt_pos' ) == 'right' ) {
		$fc_style__co_butt_pos = 'right';
	} elseif ( get_sub_field( 'fc_style__co_butt_pos' ) == 'rigt-d' ) {
		$fc_style__co_butt_pos = 'rigt-d';
	}

	if ( get_sub_field( 'fc_style__ct_butt_pos' ) == 'left' ) {
		$fc_style__ct_butt_pos = 'left';
	} elseif ( get_sub_field( 'fc_style__ct_butt_pos' ) == 'center' ) {
		$fc_style__ct_butt_pos = 'center';
	} elseif ( get_sub_field( 'fc_style__ct_butt_pos' ) == 'right' ) {
		$fc_style__ct_butt_pos = 'right';
	} elseif ( get_sub_field( 'fc_style__ct_butt_pos' ) == 'rigt-d' ) {
		$fc_style__ct_butt_pos = 'rigt-d';
	}
endwhile; ?>