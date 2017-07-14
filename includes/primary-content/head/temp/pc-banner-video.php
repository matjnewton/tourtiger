
<?php if ( !wp_is_mobile() ) : ?>
    <video 
        autoplay 
        loop 
        muted 
        poster="<?php if ( $poster_url ) echo $poster_url; ?>" 
        id="video1" 
        class="pc_hero-area__video">
            <source src="<?php echo $hero_video; ?>" type="video/mp4">
            <source src="<?php echo $hero_video_webm; ?>" type="video/webm">
            <source src="<?php echo $hero_video_ogv; ?>" type="video/ogv">
    </video>
<?php endif;
$mobile_styles = wp_is_mobile() ? "background: url({$poster_url}) 50% 50% no-repeat; background-size: cover;" : ''; ?>

<div class="flxslider-wrapper" style="position: relative;z-index: 5;<?=$mobile_styles;?>">
    <div id="slider">
        <ul class="slides">

                <li>

                    <?php include ( get_stylesheet_directory() . '/includes/primary-content/head/temp/pc-elements.php' ); ?>

                </li>

        </ul>
    </div>
</div>