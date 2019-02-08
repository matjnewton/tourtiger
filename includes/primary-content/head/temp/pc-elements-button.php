<?php
// 3rd party
$the_fly_book_account_id = get_field('the_fly_book_account_id','apikey');
$button_one_type = get_sub_field( 'pc_button_link_type' );
$button_two_type = get_sub_field( 'pc_button_link_type_addt' );
?>

<div class="pc_hero-area__action">
  <?php if ($button_one_type === 'the_fly_booking' && $the_fly_book_account_id) : ?>
    <button
      class='
        flybook-book-now-button
        fb-widget-type-frontend
        fb-default-category-id-0
        fb-account-id-<?=$the_fly_book_account_id?>
        fb-entity-config-id-
        fb-domain-go.theflybook.com
        fb-protocol-https
        pc_hero-area__action-btn
      '><?php echo get_sub_field( 'pc_cta_button_text' ); ?></button>
  <?php else : ?>
    <?php
    $iframe_popup = get_sub_field( 'pc_button_link_type' ) == 'iframe-popup' ? 'data-iframe-popup="' . get_sub_field( 'pc_cta_button_url' ) . '"' : '';
    $new_tab = get_sub_field( 'pc_button_link_type' ) == 'new-tab' ? 'target="_blank"' : '';
    ?>

    <a href="<?php echo get_sub_field( 'pc_cta_button_url' ) ? get_sub_field( 'pc_cta_button_url' ) : '#.'; ?>" <?=$iframe_popup;?> <?=$new_tab;?> class="pc_hero-area__action-btn">
      <?php echo get_sub_field( 'pc_cta_button_text' ); ?>
    </a>
  <?php endif; ?>

	<?php if ( $cta_button_text_addt ) : ?>
    <?php $cta_button_url_addt = get_sub_field( 'pc_cta_button_url_addt' ) ? get_sub_field( 'pc_cta_button_url_addt' ) : '#.'; ?>
    <?php if ($button_two_type === 'the_fly_booking' && $the_fly_book_account_id) : ?>
      <button
          class='
          flybook-book-now-button
          fb-widget-type-frontend
          fb-default-category-id-0
          fb-account-id-<?=$the_fly_book_account_id?>
          fb-entity-config-id-
          fb-domain-go.theflybook.com
          fb-protocol-https
          pc_hero-area__action-btn
        '><?php echo get_sub_field( 'pc_cta_button_text_addt' ); ?></button>
    <?php elseif ($button_two_type === 'xola') : ?>
        <div
          class="xola-checkout xola-custom pc_hero-area__action-btn"
          data-button-id="<?php echo $cta_button_url_addt; ?>"><?php echo get_sub_field( 'pc_cta_button_text_addt' ); ?></div>
    <?php else : ?>
      <?php
      $iframe_popup = get_sub_field( 'pc_button_link_type_addt' ) == 'iframe-popup' ? 'data-iframe-popup="' . get_sub_field( 'pc_cta_button_url_addt' ) . '"' : '';
      $new_tab = get_sub_field( 'pc_button_link_type_addt' ) == 'new-tab' ? 'target="_blank"' : '';
      ?>

      <a href="<?php echo get_sub_field( 'pc_cta_button_url_addt' ) ? get_sub_field( 'pc_cta_button_url_addt' ) : '#.'; ?>" <?=$iframe_popup;?> <?=$new_tab;?> class="pc_hero-area__action-btn">
        <?php echo get_sub_field( 'pc_cta_button_text_addt' ); ?>
      </a>
	  <?php endif; ?>
	<?php endif; ?>
</div>