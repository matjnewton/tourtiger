<?php 

if ( $custom_header == true ) : ?>
    <div class="hidden-xs custom-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php 
                                $ch_url = wp_get_attachment_url( get_field('custom_header_image', 'option'),'full');
                                $chimg = aq_resize( $ch_url, 278, 70, true );
                            
                                if ( $ch_url ) : ?>

                                    <img src="<?=$chimg?>" alt="<?=$chimg?>" />

                            <?php endif; ?>
                        </a>
                </div>
            </div>
        </div>
    </div>
<?php endif;

include ( get_stylesheet_directory() . '/includes/primary-content/head/pc-panel-bar.php' );

?>