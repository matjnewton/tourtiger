
<?php $poster = aq_resize( $poster_url, 1440, $$hero_height_n, true ); ?>
<video 
    autoplay 
    loop 
    muted 
    poster="<?php if ( $poster ) echo $poster; ?>" 
    id="video1" 
    class="pc_hero-area__video">

    <source src="<?php echo $hero_video; ?>" type="video/mp4">
    <source src="<?php echo $hero_video_webm; ?>" type="video/webm">
    <source src="<?php echo $hero_video_ogv; ?>" type="video/ogv">
</video>
<div class="flxslider-wrapper" style="position: relative;z-index: 5;">
    <div id="slider">
        <ul class="slides">

                <li>

                    <?php include ( get_stylesheet_directory() . '/includes/primary-content/head/temp/pc-elements.php' ); ?>

                </li>

        </ul>
    </div>
</div>