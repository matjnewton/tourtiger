<?php
/**
 * Template Name: Primary Content Page
 */
get_header( 'pc' );



        if ( ! post_password_required( $post ) ) {


            get_template_part( '/includes/primary-content/primary-content' );

        } else {

            get_template_part( '/page-templates/password-protected-page' );
        }



get_footer( 'pc' ); ?>
