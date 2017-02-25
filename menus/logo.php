<?php /*logo partial*/
            $use_logo = get_field('use_logo_image', 'option');
            if($use_logo == true): ?>
                <div class="col-sm-2 col-md-3 col-lg-3">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php 
                                $logo_url = wp_get_attachment_url( get_field('logo_image', 'option'),'full');
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