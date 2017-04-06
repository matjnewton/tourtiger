<?php /*logo partial*/
            $use_logo = get_option( 'options_use_logo_image' );
            if($use_logo == true): ?>
                <div class="col-sm-2 col-md-3 col-lg-3">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php 
                                $logo_image = get_option( 'options_logo_image' );
                                $logo_url = wp_get_attachment_url( $logo_image,'full');
                                $logo = aq_resize( $logo_url, 362, 64, false );
                                ?>
                            <?php if($logo_url): ?>
                            <div class="logo-container" style="background-image: url(<?=$logo_url?>);"></div>
                            <!--<img src="<?=$logo_url?>" alt="<?=$logo?>" />-->
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>