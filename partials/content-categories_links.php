                        <?php 
                            $heading = get_sub_field('heading');
                            $button_label = get_sub_field('button_label'); 
                            $link = get_sub_field('link');
                        ?>
                        <li class="col-sm-6 col-md-4">
                            <div class="link-tour-wrapper">
                                <div class="link-tour-name">
                                    <span><?php if($heading): echo $heading; endif; ?></span>
                                </div>
                                <a href="<?php if($link): echo $link; else: ?>#<?php endif; ?>"><?php if($button_label): ?><span><?php echo $button_label; ?></span><?php endif; ?></a>
                            </div>
                        </li>