<div class="pc_hero-area__action">
	<?php
  $iframe_popup = get_sub_field( 'pc_button_link_type' ) == 'iframe-popup' ? 'data-iframe-popup="' . get_sub_field( 'pc_cta_button_url' ) . '"' : '';
  $new_tab = get_sub_field( 'pc_button_link_type' ) == 'new-tab' ? 'target="_blank"' : '';
  ?>
	
	<a href="<?php echo get_sub_field( 'pc_cta_button_url' ) ? get_sub_field( 'pc_cta_button_url' ) : '#.'; ?>" <?=$iframe_popup;?> <?=$new_tab;?> class="pc_hero-area__action-btn">
		<?php echo get_sub_field( 'pc_cta_button_text' ); ?>
	</a>

	<?php if ( $cta_button_text_addt ) : ?>
		<?php
    $iframe_popup = get_sub_field( 'pc_button_link_type_addt' ) == 'iframe-popup' ? 'data-iframe-popup="' . get_sub_field( 'pc_cta_button_url_addt' ) . '"' : '';
    $new_tab = get_sub_field( 'pc_button_link_type_addt' ) == 'new-tab' ? 'target="_blank"' : '';
    ?>
		
		<a href="<?php echo get_sub_field( 'pc_cta_button_url_addt' ) ? get_sub_field( 'pc_cta_button_url_addt' ) : '#.'; ?>" <?=$iframe_popup;?> <?=$new_tab;?> class="pc_hero-area__action-btn">
			<?php echo get_sub_field( 'pc_cta_button_text_addt' ); ?>
		</a>
	<?php endif; ?>
</div>