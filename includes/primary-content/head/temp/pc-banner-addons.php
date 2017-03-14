<?php

if ( get_sub_field( 'pc_ha_downward_arrow' ) ) {
	$arrow_down = get_sub_field( 'pc_ha_downward_image' ) ? get_sub_field( 'pc_ha_downward_image' ) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAyNSAxNSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48dGl0bGU+Nzc1ODkzNkQtQ0YxOC00RUNGLUI4QTEtM0NCNjJCQTNFQTU1PC90aXRsZT48cGF0aCBkPSJNMjMuMTA3IDEuNUwxMi41IDEyLjEwNyAxLjg5MyAxLjUiIHN0cm9rZS13aWR0aD0iMyIgc3Ryb2tlPSIjRkZGIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4=';

	echo '<a href="#pc_wrap" id="pc_hero-area_skip-arrow" class="go_to"><img src="' . $arrow_down . '" /></a>'; 
}

$banner_ol = get_sub_field( 'pc_ha_overlay' );

if ( $banner_ol == 'color' ) {
    echo '<div id="pc_ha_overlay_' . $banner_ol . '" style="background-color: ' . get_sub_field( 'pc_ha_overlay_color' ) . ';"></div>';
} elseif ( $banner_ol == 'texture' ) {
    echo '<div id="pc_ha_overlay_' . $banner_ol . '" style="background: url(' . get_sub_field( 'pc_ha_overlay_texture' ) . ') 50% 50%;"></div>';
} ?> 