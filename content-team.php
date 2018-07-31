                <?php
                    $image_url = wp_get_attachment_url( get_sub_field('image'),'full'); 
                    $image = aq_resize( $image_url, 366, 235, true );
                    $name = get_sub_field('name');
                    $position = get_sub_field('position');
                    $about = get_sub_field('about');
                ?>
                    <div class="team">
                        <?php if ($image_url): ?>
                <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
                        <?php endif; ?>
                        
                        <div class="title-excerpt">
                            <strong><?php echo $name; ?>, <?php echo $position; ?></strong>
                            <p><?php echo $about; ?></p>
                        </div>
                        
                    </div>
