<?php
/**
 * header
 */
?>

<?php
$custom_header = get_field('include_custom_header', 'option');
if($custom_header == true): ?>
        <div class="hidden-xs custom-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php
                                $ch_url = wp_get_attachment_url( get_field('custom_header_image', 'option'),'full');
                                $chimg = aq_resize( $ch_url, 278, 70, true );
                                ?>
                            <?php if($ch_url): ?>
                            <img src="<?=$chimg?>" alt="<?=$chimg?>" />
                            <?php endif; ?>
                        </a>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
    if( have_rows('hero_area') ):
    while ( have_rows('hero_area') ) : the_row();
        if( get_row_layout() == 'hero'):
        $background_placement = get_sub_field('background_position');
        $slides_images = get_sub_field('hero_slides');
        $hero_video = get_sub_field('hero_video');
        $hero_video_webm = get_sub_field('hero_video_webm');
        $hero_video_ogv = get_sub_field('hero_video_ogv');
        $full_video_poster = get_sub_field('video_poster');
        $poster_url = wp_get_attachment_url( $full_video_poster,'full'); //get img URL
    endif;
    endwhile;
    endif;
?>
<div class="banner-wrapper<?php if($background_placement=='Under Header'): echo " under-header"; elseif($background_placement=='Down Below Header'): echo " below-header"; else: echo " no-banner"; endif;?>"<?php if($background_placement=='Under Header' && $hero_video): ?> style="max-width:1440px; max-height:620px; margin-left:auto; margin-right:auto;"<?php endif; ?><?php if($background_placement=='Down Below Header' && $hero_video): ?> style="max-width:1440px; max-height:545px; margin-left:auto; margin-right:auto;"<?php endif; ?>>
<div class="tint under-header-tint"></div>
<div class="banner-wrapper-mobile"></div>
<?php $sticky_menu = get_field('sticky_menu', 'option');
    $all_caps = get_field('all_caps_on_menu', 'option');
?>
<?php if($background_placement=='Under Header' && $hero_video): ?>
<?php
    $poster = aq_resize( $poster_url, 1440, 620, true );
    ?>
<video autoplay loop muted poster="<?php if($poster): echo $poster; endif; ?>" id="video1" style="width:100%; height:auto; position:absolute; z-index:0;">
                <source src="<?php echo $hero_video; ?>" type="video/mp4">
                <source src="<?php echo $hero_video_webm; ?>" type="video/webm">
                <source src="<?php echo $hero_video_ogv; ?>" type="video/ogv">
            </video>
<?php endif; ?>
    <div class="header-bar-wrapper<?php if($sticky_menu == true): ?> sticky<?php endif; ?><?php if($background_placement=='Under Header' && $slides_images && !$sticky_menu): ?> pos-abs<?php endif; ?>">
    <div class="header-bar">
        <?php
        $logo_covers_both_menus = get_field('logo_covers_both_menus', 'option');
        $secondary_menu = get_field('include_secondary_menu', 'option');
        if(($secondary_menu == true) && ($logo_covers_both_menus == false)): ?>
        <div class="secondary-menu-wrapper">
            <div class="<?php if(!function_exists('icl_object_id')): ?>hidden-xs <?php endif; ?>container">
            <?php include(locate_template('menus/secondary_menu.php' )); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php $menu_type = get_field('menu_type', 'option'); ?>
        <?php if($menu_type == 'Regular'): ?>
            <div class="hidden-xs hidden-sm container">
            <?php if($logo_covers_both_menus): ?>
            <div class="row">
                <?php include(locate_template('menus/logo.php' )); ?>
                <div class="col-sm-10 col-md-9 col-lg-9">
                    <?php if($secondary_menu == true): ?>
                    <div class="secondary-menu-wrapper">
                    <?php include(locate_template('menus/secondary_menu.php' )); ?>
                    </div>
                    <?php endif; ?>
                    <?php include(locate_template('menus/regular_menu.php' )); ?>
                </div>
            </div>
            <?php else: ?>
                <?php include(locate_template('menus/regular_menu.php' )); ?>
            <?php endif; ?>
        </div>
        <?php elseif($menu_type == 'Split by Logo in center'):?>
            <?php if($logo_covers_both_menus): ?>
                <?php include(locate_template('menus/cover_split_menu.php' )); ?>
            <?php else: ?>
                <?php include(locate_template('menus/split_menu.php' )); ?>
            <?php endif; ?>
        <?php elseif($menu_type == 'Logo Centered & Above Menu'):?>
            <?php include(locate_template('menus/above_menu.php' )); ?>
        <?php endif; ?>

        <div class="visible-xs visible-sm container">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-default nav-panel" role="navigation">

                            <div class="navbar-header">

                				<div class="row">

                				<div class="col-xs-9" style="text-align:left;">

                                    <a class="navbar-brand" id="brand-name" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php
                                    $logo_url = wp_get_attachment_url( get_field('logo_image', 'option'),'full');
                                    $logo = aq_resize( $logo_url, 362, 64, false );
                                    ?>
                                <?php if($logo_url): ?>
                                <div class="logo-container" style="background-image: url(<?=$logo_url?>);"></div>
                                <!--<img class="mobile-logo img-responsive" src="<?=$logo_url?>" alt="<?=$logo?>" /> -->
                                <?php endif; ?>
                                    </a>

                				</div>

                				<div class="col-xs-3">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex1-collapse">
                    					<span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                    				</button>
                				</div>

                				</div><!-- end row-->

                            </div>

                    		<div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                                    <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_class' => 'nav navbar-nav mobile-nav', 'fallback_cb'    => false, 'walker'  => new Wpse8170mobile_Menu_Walker() ) ); ?>
                    		</div><!-- end .navbar-ex1-collapse-->
                    </nav>
                </div>
            </div>
        </div>
    </div><!-- end .header-bar-->
    </div><!-- end .header-bar-wrapper-->

<div class="banner-wrapper-inner">
    <?php if($background_placement=='Down Below Header' && $hero_video): ?>
    <?php
    $poster = aq_resize( $poster_url, 1440, 545, true );
    ?>
<video autoplay loop muted poster="<?php if($poster): echo $poster; endif; ?>" id="video1" style="width:100%; height:auto; position:absolute; z-index:0;">
                <source src="<?php echo $hero_video; ?>" type="video/mp4">
            </video>
<?php endif; ?>
<div class="tint below-header-tint"<?php if($background_placement=='Down Below Header' && $hero_video): ?> style="height:545px;"<?php endif; ?>></div>
<?php
$queried_post_type = get_query_var('post_type');

if (is_page_template('page-templates/front-blog.php')) :
    get_template_part( 'content', 'front_hero' );
elseif (is_home()):
    get_template_part( 'content', 'blog_hero' );
elseif (is_page_template('page-templates/front-page.php')) :
    get_template_part( 'content', 'front_hero' );
elseif (is_page_template('page-templates/front-page2.php')):
    get_template_part( 'content', 'front2_hero' );
elseif (is_page_template('page-templates/front-page3.php')):
    get_template_part( 'content', 'front3_hero' );
elseif(is_single() && 'tour' ==  $queried_post_type):
    get_template_part( 'content', 'tour_hero' );
else:
    get_template_part( 'content', 'default_hero' );
endif; ?>
</div><!-- .banner-wrapper-inner-->
</div><!-- end .banner-wrapper-->
