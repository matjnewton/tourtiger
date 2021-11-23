<?php
/**
 * background
 */
?>
<?php
    $darray = explode('.', $_SERVER['HTTP_HOST']);
    $narray = array_reverse($darray);
    $domain_name = $narray[1];
    unset($darray, $narray);
?>
.banner-wrapper{
    max-height:620px !important;
}
<?php
    $sticky_menu = get_field('sticky_menu', 'option');
    if($sticky_menu == true): ?>
@media (min-width:481px){
    .banner-wrapper.under-header{
        height:620px !important;

    }
}
<?php endif; ?>
<?php
    if( have_rows('hero_area') && !is_home() ):
    while ( have_rows('hero_area') ) : the_row();
        if( get_row_layout() == 'hero'):
    $hero_image = get_sub_field('hero_image');
    $background_placement = get_sub_field('background_position');
    $hero_video = get_sub_field('hero_video');
    $full_video_poster = get_sub_field('video_poster');
    $poster_url = wp_get_attachment_url( $full_video_poster,'full'); //get img URL
    ?>
<?php if(($hero_image) && ($background_placement=='Under Header')): ?>
<?php $himage = $hero_image['url'];  ?>
<?php $himage_xs = aq_resize( $hero_image['url'], 480, 297, true );  ?>
.banner-wrapper{
    width:100%;
    margin:0 auto;
    background-repeat:no-repeat;
    position:relative;
}
@media (max-width:480px){
    .banner-wrapper{
        background: url(<?php echo $himage_xs; ?>), linear-gradient(0deg,#FFF,#CCC);
        background-size:480px auto;
        background-position: 0% 100%;
    }
}
@media (min-width:481px){
    .banner-wrapper{
        background: url(<?php echo $himage; ?>), linear-gradient(0deg,#FFF,#CCC);
        background-size:1440px auto;
        background-position: 0% 100%;
    }
}

<?php if($himage_xs ): ?>
@media (max-width:480px){
    .banner-wrapper{
       height:296px;
       /*overflow:hidden;*/
    }
}
<?php endif; ?>
<?php if($himage ): ?>
@media (min-width:481px) and (max-width:767px){
    .banner-wrapper{
       height:620px;
       overflow:hidden;
    }
}
<?php endif; ?>
.banner-wrapper-inner{
    min-height:100%;
}
<?php endif; ?>

<?php if(($hero_image) && ($background_placement=='Down Below Header')): ?>
    <?php $himage = aq_resize( $hero_image['url'], 1400, 545, true );   ?>
    <?php $himage_xs = aq_resize( $hero_image['url'], 480, 225, true );   ?>
<?php if($himage_xs ): ?>
@media (max-width:480px){
    .banner-wrapper{
       height:297px;
       /*overflow:hidden;*/
    }
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:480px auto;
        background-image:url(<?php echo $himage_xs; ?>);
    }
}
<?php endif; ?>
<?php if($himage ): ?>

@media (min-width:1441px){
    .banner-wrapper-inner{
    background-repeat:no-repeat;
    background-size:cover;
    background-position: 50%;
    background-image:url(<?php echo $himage; ?>);
    }
}


@media (min-width:481px) and (max-width:1440px){
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:1440px auto;
        background-image:url(<?php echo $himage; ?>);
    }
}
@media (min-width:481px) and (max-width:767px){
    .banner-wrapper{
       height:620px;
       overflow:hidden;
    }
}
.banner-wrapper-inner{
    min-height:545px;
}
<?php endif; ?>
<?php endif; ?>

<?php if($background_placement=='Under Header' && $hero_video): ?>
@media (max-width: 991px) {
    .banner-wrapper{
        background-repeat:no-repeat;
        <?php
        $poster = aq_resize( $poster_url, 1440, 620, true );
        $poster_xs = aq_resize( $poster_url, 480, 297, true );
        ?>
        background-image:url(<?php echo $poster_xs; ?>);
        position:relative;
    }
}
@media (max-width:480px){
    .banner-wrapper{
        background-size:480px auto;
    }
}
@media (min-width: 481px) and (max-width: 991px) {
    .banner-wrapper{
        background-size:1440px auto;
        background-image:url(<?php echo $poster; ?>);
    }
}

<?php endif; ?>
<?php if($background_placement=='Down Below Header' && $hero_video): ?>
    <?php
    $poster = aq_resize( $poster_url, 1440, 545, true );
    $poster_xs = aq_resize( $poster_url, 480, 225, true );
    ?>
@media (max-width:480px){
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:480px auto;
        background-image:url(<?php echo $poster_xs; ?>);
    }
}
@media (min-width:481px) and (max-width: 991px) {
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:1440px auto;
        background-image:url(<?php echo $poster; ?>);
    }
}
<?php endif; ?>
<?php
        endif;
    endwhile;
endif; /*end hero_area*/
?>

<?php //Blog hero ?>
<?php
    if( have_rows('hero_area', 'option') && is_home() ):
    while ( have_rows('hero_area', 'option') ) : the_row();
        if( get_row_layout() == 'hero'):

    $hero_image = get_sub_field('hero_image');
    $background_placement = get_sub_field('background_position');
    ?>

<?php if(($hero_image) && ($background_placement=='Under Header')): ?>
    <?php $himage = aq_resize( $hero_image['url'], 1440, 620, true ); ?>
    <?php $himage_xs = aq_resize( $hero_image['url'], 480, 297, true ); ?>
.banner-wrapper{
    background-repeat:no-repeat;
    position:relative;
}
@media (max-width: 480px){
    .banner-wrapper{
        background-size:480px auto;
        background-image:url(<?php echo $himage_xs; ?>);
    }
}
@media (min-width:481px){
    .banner-wrapper{
        background-size:1440px auto;
        background-image:url(<?php echo $himage; ?>);
    }
}
<?php if($himage_xs ): ?>
@media (max-width:480px){
    .banner-wrapper{
       height:296px;
       /*overflow:hidden;*/
    }
}
<?php endif; ?>
<?php if($himage ): ?>
@media (min-width:481px) and (max-width:767px){
    .banner-wrapper{
       height:620px;
       overflow:hidden;
    }
}
<?php endif; ?>
.banner-wrapper-inner{
    min-height:100%;
}
<?php endif; ?>

<?php if(($hero_image) && ($background_placement=='Down Below Header')): ?>
    <?php $himage = aq_resize( $hero_image['url'], 1440, 545, true ); ?>
    <?php $himage_xs = aq_resize( $hero_image['url'], 480, 225, true ); ?>

<?php if($himage_xs ): ?>
@media (max-width:480px){
    .banner-wrapper{
       height:297px;
       /*overflow:hidden;*/
    }
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:480px auto;
        background-image:url(<?php echo $himage_xs; ?>);
    }
}
<?php endif; ?>
<?php if($himage ): ?>
@media (min-width:1441px){
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:cover;
        background-position: 50%;
        background-image:url(<?php echo $himage; ?>);
    }
}


@media (min-width:481px) and (max-width:1440px){
    .banner-wrapper-inner{
        background-repeat:no-repeat;
        background-size:1440px auto;
        background-image:url(<?php echo $himage; ?>);
    }
}
@media (min-width:481px) and (max-width:767px){
    .banner-wrapper{
       height:620px;
       overflow:hidden;
    }
}
@media (min-width:481px){
    .banner-wrapper-inner{
        min-height:545px;
    }
}
<?php endif; ?>
<?php endif; ?>


<?php
        endif;
    endwhile;
endif;
?>
<?php //end Blog hero ?>

<?php
if (is_page_template('page-templates/front-page2.php') || is_page_template('page-templates/front-page3.php')) : ?>

<?php
$hero_margin = get_field('hero_headline_top_margin');
    if($hero_margin):
    ?>
@media (max-width:480px){
    .under-header .overlay-slider-content{
        margin-top:0 !important;
    }
    .banner-top .headline-group{
        margin-top:0;
    }
}
@media (min-width:481px){
.banner-top .headline-group{
        top:<?php echo $hero_margin; ?>px;
    }
}
@media (min-width: 768px) {
        .banner-top .headline-group{
        top:<?php echo $hero_margin; ?>px;
    }
}

<?php
    endif;
    ?>
<?php
$featured_margin = get_field('featured_tiles_top_margin');
    if($featured_margin):
    ?>

@media (min-width: 768px) {
    .site-inner{
        margin-top:<?php echo $featured_margin; ?>px;
    }
}
    <?php
    endif;
else:
?>
<?php
$elements_margin = get_field('hero_elements_top_margin');
    if($elements_margin):
?>
@media (min-width:481px){
.banner-top .hero-elements-wrapper{
    margin-top:<?php echo $elements_margin; ?>px;
}
}
<?php endif; ?>


<?php
endif;
?>

