<?php

	if ( $bc_style__date_pos == 'above' ) {
		echo '<div style="padding-left: 0; padding-right: 0;" class="pc--blog__date ' . $bc_style__date_pos . '" itemprop="datePublished">' . get_the_date( 'd.m.Y' ) . '</div>';
	}

	the_title( '<a href="' . get_permalink() . '" class="pc--blog__title" itemprop="name">', '</a>' ); 

?>