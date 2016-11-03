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
.banner-wrapper.under-header{
    height:620px !important;
    
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
.banner-wrapper{

<?php $himage = aq_resize( $hero_image['url'], 1440, 620, true );  ?>


width:100%;
max-width:1440px;
margin:0 auto;

background: url(<?php echo $himage; ?>), linear-gradient(0deg,#FFF,#CCC);
background-repeat:no-repeat;
background-size:1440px auto;
background-position: 0% 100%; 

/*
    background-image:url(<?php echo $himage; ?>);
*/
    position:relative;
}
<?php if($himage ): ?>
@media (max-width: 767px) {
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
.banner-wrapper-inner{
    background-repeat:no-repeat;
    background-size:1440px auto;
    <?php $himage = aq_resize( $hero_image['url'], 1400, 545, true );   ?>

    background-image:url(<?php echo $himage; ?>);
}
<?php if($himage ): ?>
@media (max-width: 767px) {
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
    background-size:1440px auto;
    <?php
    $poster = aq_resize( $poster_url, 1440, 620, true );
    ?>
    background-image:url(<?php echo $poster; ?>);
    position:relative;
}
}
<?php endif; ?>
<?php if($background_placement=='Down Below Header' && $hero_video): ?>
@media (max-width: 991px) {
.banner-wrapper-inner{
    background-repeat:no-repeat;
    background-size:1440px auto;
    <?php
    $poster = aq_resize( $poster_url, 1440, 545, true );
    ?>
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
.banner-wrapper{
    background-repeat:no-repeat;
    background-size:1440px auto;
    <?php $himage = aq_resize( $hero_image['url'], 1440, 620, true ); ?>
    background-image:url(<?php echo $himage; ?>);
    position:relative;
}
<?php if($himage ): ?>
@media (max-width: 767px) {
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
.banner-wrapper-inner{
    background-repeat:no-repeat;
    background-size:1440px auto;
    <?php $himage = aq_resize( $hero_image['url'], 1440, 545, true ); ?>
    background-image:url(<?php echo $himage; ?>);
}
<?php if($himage ): ?>
@media (max-width: 767px) {
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

.banner-top .headline-group{        
        top:<?php echo $hero_margin; ?>px;
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
.banner-top .hero-elements-wrapper{
    margin-top:<?php echo $elements_margin; ?>px;
}
<?php endif; ?>


<?php
endif;

?>
