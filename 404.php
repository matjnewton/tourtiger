<?php
/**
 * 404
 */

get_header();

$phone = get_option( 'options_phone_number' );
$mail  = get_bloginfo('admin_email');

echo ProductPage::get_styles();

?>

<div class="content-404" align="center">
    <h1>Hey! We’re <?php echo get_bloginfo('name'); ?></h1>

    <?php if (is_410()) : ?>
        <p><strong>Sorry to inform you, but the page you’re looking for has been permanently removed.</strong></p>
    <?php else : ?>
        <p><strong>Sorry to inform you, but the page you’re looking for no longer exists.</strong></p>
    <?php endif;?>

    <p>Use the menu to navigate through our experiences or visit our <a href="/">homepage</a>.<br/>
    You can also get in contact with us at <a href="tel:<?php echo preg_replace('/\D+/', '', $phone); ;?>"><?=$phone;?></a> or by email at <a href="mailto:<?=$mail;?>"><?=$mail;?></a>.</p>
</div>

<?php
get_footer();
