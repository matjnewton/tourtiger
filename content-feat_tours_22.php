<?php
$button_label = get_sub_field('button_label');
?>
<div class="tour-2">

    <?php if (has_post_thumbnail()) {
        $thumb = get_post_thumbnail_id();
        $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL

        if($col==6):
            $image = str_contains($img_url, '.gif') ? $img_url : aq_resize( $img_url, 568, 377, true );
        else:
            $image = str_contains($img_url, '.gif') ? $img_url : aq_resize( $img_url, 377, 377, true ); //resize & crop img
        endif;
        ?>
        <a href="<?php the_permalink() ?>" class="tile-image">
            <img alt="<?=$image?>" src="<?=$image?>" class="img-responsive" />
            <div class="tile-tint"></div>
            <div class="tile-tint2"></div>
            <div class="name-wrapper">
                <div class="name">
                    <strong>
                        <?php the_title(); ?>
                    </strong>
                </div>
            </div>
            <div class="btn-tour">
                <div class="txt-button-tour"><?php if($button_label): echo $button_label; else: echo "View Tour"; endif; ?></div>
                <div class="hover-button-tour"></div>
            </div>
        </a>
        <?php
    }
    ?>


</div>
