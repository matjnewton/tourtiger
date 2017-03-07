<?php if ( 
    $integrate_xola 
    && ( $button_type == 'Use as third party integration Link' ) 
) : ?>

    <div 
        id="<?php if ( $book_tours ) echo $book_tours; ?>" 
        class="<?php echo $third_party; ?> xola-custom pc_hero-area__book-btn book-btn" 
        <?php if ( $cta_button_radius ) echo ' style="border-radius:' . $cta_button_radius  .'px"'; ?>>

        <?php echo $cta_button_text; ?>
    </div>
<?php elseif ( 
    $integrate_peek 
    && ( $button_type == 'Use as third party integration Link' ) 
) : ?>
    <a 
        href="http://www.peek.com/purchase/activity/widget/<?php if ( $book_tours ) echo $book_tours; ?>"
        class="peek-book-button-flat pc_hero-area__book-btn book-btn" 
        data-purchase-type="activity" 
        data-button-text="<?php echo $cta_button_text; ?>" 
        data-activity-gid="<?php if ( $book_tours ) echo $book_tours; ?>">
            <?php echo $cta_button_text; ?>
    </a>
<?php else: ?>
    <a 
        <?php if ( $button_type == 'Link to Featured tours' ) echo 'data-scroll-nav="110"'; ?> 
        href="<?php if ( $button_type == 'Link to Featured tours' ) : 
                echo '#.'; 
            else: 
                echo $book_tours;
            endif; ?>" 
        class="pc_hero-area__book-btn book-btn"
        <?php if ( $cta_button_radius ) echo ' style="border-radius:' . $cta_button_radius . 'px"';?>>
        <?php echo $cta_button_text; ?>
    </a>
<?php endif; ?>