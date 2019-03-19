<?php
/**
 * Template Name: Primary Content Page
 */
get_header( 'pc' );



        if ( ! post_password_required( $post ) ) {


            get_template_part( '/includes/primary-content/primary-content' );

        } else {
            ?>
            <div class="password-form">
                <?php echo get_the_password_form_custom(); ?>
            </div>
            <?php
        }



get_footer( 'pc' ); ?>
