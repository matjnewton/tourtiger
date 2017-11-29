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
    $sticky_menu = get_option( 'options_sticky_menu' );
    if($sticky_menu == true): ?>
@media (min-width:481px){
    .banner-wrapper.under-header{
        height:620px !important;
        
    }
}
<?php endif; ?>

<?php
    $bha_rows = get_post_meta( get_the_ID(), 'hero_area', true );
    if($bha_rows && !is_home()):
    foreach( (array) $bha_rows as $bha_count => $bha_row ):
            switch( $bha_row ):
                case 'hero':
                    $img = (int) get_post_meta( get_the_ID(), 'hero_area_' . $bha_count . '_hero_image', true );
                    $hero_image = wp_get_attachment_url( $img,'full');
                    $background_placement = get_post_meta( get_the_ID(), 'hero_area_' . $bha_count . '_background_position', true );
                    $hero_video = get_post_meta( get_the_ID(), 'hero_area_' . $bha_count . '_hero_video', true );
                    $full_video_poster = get_post_meta( get_the_ID(), 'hero_area_' . $bha_count . '_video_poster', true );
                    $poster_url = wp_get_attachment_url( $full_video_poster,'full'); //get img URL
    ?>
<?php if(($hero_image) && ($background_placement=='Under Header')): ?>
<?php $himage = aq_resize( $hero_image, 1440, 620, true );  ?>
<?php $himage_xs = aq_resize( $hero_image, 480, 297, true );  ?>
.banner-wrapper{
    width:100%;
    max-width:1440px;
    margin:0 auto;
    background-repeat:no-repeat;
    position:relative;
}
@media (max-width:480px){
    .banner-wrapper{
        background: url(<?php echo $himage; ?>), linear-gradient(0deg,#FFF,#CCC);
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
    <?php $himage = aq_resize( $hero_image, 1400, 545, true );   ?>
    <?php $himage_xs = aq_resize( $hero_image, 480, 225, true );   ?>
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
@media (min-width:481px){
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
        break;
            endswitch;
    endforeach;
    endif; /*end hero_area*/
?>   

<?php //Blog hero ?>
<?php
/*$bha_rows = get_post_meta( get_the_ID(), 'hero_area', true );
    if($bha_rows && !is_home()):
    foreach( (array) $bha_rows as $bha_count => $bha_row ):
            switch( $bha_row ):
                case 'hero':*/    
?>
<?php 
    $bhaop_rows = get_option( 'options_hero_area' );
    
    if( $bhaop_rows && is_home() ):
    foreach( (array) $bhaop_rows as $bhaop_count => $bhaop_row ):
            switch( $bhaop_row ):
                case 'hero':
                
                $img = (int) get_post_meta( get_the_ID(), 'options_hero_area_' . $bhaop_count . '_hero_image', true );
                $hero_image = wp_get_attachment_url( $img,'full');
                $background_placement = get_option( 'options_hero_area_' . $bhaop_count . '_background_position' );
                
    ?> 

<?php if(($hero_image) && ($background_placement=='Under Header')): ?>
    <?php $himage = aq_resize( $hero_image, 1440, 620, true ); ?>
    <?php $himage_xs = aq_resize( $hero_image, 480, 297, true ); ?>
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
    <?php $himage = aq_resize( $hero_image, 1440, 545, true ); ?>
    <?php $himage_xs = aq_resize( $hero_image, 480, 225, true ); ?>

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
@media (min-width:481px){
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
        break;
    endswitch;
    endforeach;
endif;
?>
<?php //end Blog hero ?>

<?php
if (is_page_template('page-templates/front-page2.php') || is_page_template('page-templates/front-page3.php')) : ?>

<?php
    $hero_margin = get_post_meta( get_the_ID(), 'hero_headline_top_margin', true );
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
    $featured_margin = get_post_meta( get_the_ID(), 'featured_tiles_top_margin', true );
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
    $elements_margin = get_post_meta( get_the_ID(), 'hero_elements_top_margin', true );
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

