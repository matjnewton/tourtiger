<?php if(have_rows('sitewide_sections')): ?>
<?php while(have_rows('sitewide_sections')): the_row(); ?>
    <?php 
                                $headline = get_sub_field('section_headline');
                            ?>
                            
                            <section class="section-item">
                            <?php if($headline): ?>
                        <h2>
                            <span><?php echo $headline; ?></span><!--<hr />-->
                        </h2>
                    <?php endif; ?>
                    
    <?php if(have_rows('section_elements')): ?>
        <?php while(have_rows('section_elements')): the_row(); ?>
                        
                        <?php if( get_row_layout() == 'section_subheadline'): ?>
                                <?php $subheadline = get_sub_field('subheadline'); ?>
                                    <?php if($subheadline): ?>
                        <h3>
                            <?php echo $subheadline; ?>
                        </h3>
                                    <?php endif; ?>   
                        <?php endif; ?>
                        
                        <?php if( (get_row_layout() == 'image') || (get_row_layout() == 'content_editor')): ?>
                                <div>
                                <?php
                                $img_embed = get_sub_field('image_embed_options'); 
                                $img_url = wp_get_attachment_url( get_sub_field('image'),'full');
                                $image = aq_resize( $img_url, 279, 158, true );
                                $content = get_sub_field('content');
                                $linked_to_button = get_sub_field('linked_to_button');
                                ?>
                                <?php if($img_url && ($img_embed == 'embed on the Side')): ?>
                                <img src="<?=$image?>" alt="<?=$image?>" class="side-embed img-responsive" />
                                <?php elseif($img_url && ($img_embed == 'embed to the full width')): ?>
                                <img src="<?=$img_url?>" alt="<?=$img_url?>" class="full-embed img-responsive" />
                                <?php endif; ?>
                                <div class="c-editor"<?php if($linked_to_button): ?> data-scroll-index='100'<?php endif; ?>>
                                <?php if($content): echo $content; endif; ?>
                                </div>
                                </div>
                        <?php endif; ?>
                        
                        <?php if( get_row_layout() == 'subsection'): ?>
                            <?php
                                $subheadline = get_sub_field('headline');
                                $subcontent = get_sub_field('content_editor');
                            ?>
                            <div class="item">
                                <?php if($subheadline): ?>
                                <h3>
                                <?php echo $subheadline; ?>
                                </h3>
                                <?php endif; ?>
                                <?php
                                $img_embed = get_sub_field('image_embed_options'); 
                                $img_url = wp_get_attachment_url( get_sub_field('image'),'full');
                                $image = aq_resize( $img_url, 279, 158, true );
                                
                                ?>
                                <?php if($img_url && ($img_embed == 'embed on the Side')): ?>
                                <img src="<?=$image?>" alt="<?=$image?>" class="side-embed img-responsive" />
                                <?php elseif($img_url && ($img_embed == 'embed to the full width')): ?>
                                <img src="<?=$img_url?>" alt="<?=$img_url?>" class="full-embed img-responsive" />
                                <?php endif; ?>
                                
                                <div class="c-editor">
                                <?php if($subcontent): echo $subcontent; endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                            
                            
        <?php endwhile; ?>
    <?php endif; ?>

                            </section>
<?php endwhile; ?>
<?php endif; ?>
                        