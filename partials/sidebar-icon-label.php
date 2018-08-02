<?php
/**
 * Sidebar component: Icon label
 */


$align = get_sub_field( 'align' );

if ( have_rows( 'icons-list' ) ) :

	echo '<div class="product-sidebar--list__wrap align_' . $align . '">';

	while ( have_rows( 'icons-list' ) ) :
		the_row();

		$d              = array();
		$d['icon-type'] = get_sub_field( 'icon-type' );
		$d['icon']      = get_sub_field( 'icon' );
		$d['size']      = get_sub_field( 'size' ) ? 'style="font-size:' . get_sub_field( 'size' ) . 'px;"' : '';
		$d['font_size'] = get_sub_field( 'font_size' ) ? $d['size'] : '';
		$d['textarea']  = get_sub_field( 'textarea' );
		$d['default']   = '<div class="product-sidebar__icongroup"><i class="fa fa-certificate"></i><i class="fa fa-check"></i></div>';
		$d['type']      = get_sub_field( 'type' ) ? get_sub_field( 'type' ) : 'text';
		$d['target']    = get_sub_field( 'target' ) ? get_sub_field( 'target' ) : '#.';
		$d['open']      = 'div';
		$d['close']     = 'div';

		if ( $d['type'] != 'text' ) :
			$d['open']  = "a href='{$d['target']}'";
			$d['close'] = 'a';

			if ( $d['type'] = 'link-blank' ) :
				$d['open'] .= ' target="_blank"';
			elseif ( $d['type'] == 'link-popup' ) :
				$d['open'] .= " data-iframe-popup='{$d['target']}'";
			endif;
		endif;

		/**
		 * Generate icon
		 */
		if ( $d['icon-type'] == 'checklist' ) :
			$d['icon'] = $d['default'];
		elseif ( $d['icon-type'] == 'custom' ) :
			$d['icon'] = $d['icon'] ? "<i class='fa {$d['icon']} product-sidebar--list__custom-icon' {$d['size']}></i>" : $d['default'];
		endif;
		?>

			<<?=$d['open'];?> class="product-sidebar--list">
				<div class="product-sidebar--list__icon"><?=$d['icon'];?></div>
				<div class="product-sidebar--list__label" <?=$d['font_size'];?>><?=$d['textarea'];?></div>
			</<?=$d['close'];?>>
	
		<?php
	endwhile;

	echo '</div>';

endif;
?>
