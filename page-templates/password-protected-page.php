<?php
$password_protected_page_title = get_field('password_protected_page_title', 'option');
$password_protected_page_subtitle = get_field('password_protected_page_subtitle', 'option');
$password_protected_page_text_above_password_field = get_field('password_protected_page_text_above_password_field', 'option');
$password_protected_page_field_after_password = get_field('password_protected_page_field_after_password', 'option');

?>


<div class="password-form">
    <h2><?php echo $password_protected_page_title;?></h2>
    <p><?php echo $password_protected_page_subtitle;?></p>
    <form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) ?>" class="post-password-form" method="post">
        <p><?php echo __( $password_protected_page_text_above_password_field ) ?></p>
        <p><label for="<?php echo $label; ?>"><?php echo __( 'Your password:' ); ?>
                <input name="post_password" id="<?php echo $label; ?>" type="password" size="30" /></label>
            <input class="button js-pulsing" type="submit" name="Submit" value="<?php echo esc_attr_x( 'Enter', 'post password form' );?>" />
        </p>
    </form>
    <p><?php echo $password_protected_page_field_after_password;?></p>
</div>

<?php apply_filters( 'the_password_form', $output ); ?>
