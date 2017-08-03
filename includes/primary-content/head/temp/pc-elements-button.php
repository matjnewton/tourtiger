<div class="pc_hero-area__action">
	<?php $iframe_popup = get_sub_field( 'pc_button_link_type' ) == 'iframe-popup' ? 'data-iframe-popup="' . get_sub_field( 'pc_cta_button_url' ) . '"' : ''; ?>
	<a href="<?php echo get_sub_field( 'pc_cta_button_url' ) ? get_sub_field( 'pc_cta_button_url' ) : '#.'; ?>" <?=$iframe_popup;?> class="pc_hero-area__action-btn">
		<?php echo get_sub_field( 'pc_cta_button_text' ); ?>
	</a>
</div>