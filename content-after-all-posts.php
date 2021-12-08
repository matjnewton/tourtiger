<?php

if( have_rows('after_all_posts_content', 'options' ) ):

    // Loop through rows.
    while ( have_rows('after_all_posts_content', 'options') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'button' ):

            $button_text = get_sub_field('cta_button_text');
            $button_link = get_sub_field('cta_button_link');

            ?>
            <div class="book-tour-wrapper text-center">
                <a href="<?=$button_link?>" class="book-btn"><?=$button_text?></a>
            </div><?php

        endif;
    endwhile;
endif;
