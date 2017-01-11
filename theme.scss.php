$wbgc: <?php echo get_option('wbgc', 'none'); ?>;
$ahabgc: <?php echo get_option('ahabgc', 'none'); ?>;
$hbgc: <?php echo get_option('hbgc', 'none'); ?>;
$smbg: <?php echo get_option('smbg', 'rgba(187,173,154,1)'); ?>;
$pmsbgc: <?php echo get_option('pmsbgc', 'none'); ?>;
$mnhctabgc: <?php echo get_option('mnhctabgc', 'none'); ?>;
$bwsmbgc: <?php echo get_option('bwsmbgc', 'none'); ?>;
$smsbgc: <?php echo get_option('smsbgc', 'none'); ?>;
$mtbbgc: <?php echo get_option('mtbbgc', 'none'); ?>;
$mtbhbgc: <?php echo get_option('mtbhbgc', 'none'); ?>;
$himgt: <?php echo get_option('himgt', 'none'); ?>;
$timgt: <?php echo get_option('timgt', 'none'); ?>;
$htbgc: <?php echo get_option('htbgc', 'none'); ?>;
$hcbgc: <?php echo get_option('hcbgc', 'none'); ?>;
$hctabgc: <?php echo get_option('hctabgc', 'none'); ?>;
$sctabgc: <?php echo get_option('sctabgc', 'rgba(194,39,47,1)'); ?>;
$podfbgc: <?php echo get_option('podfbgc', 'none'); ?>;
$podtbgc: <?php echo get_option('podtbgc', 'none'); ?>;
$ftabgc: <?php echo get_option('ftabgc', 'rgba(194,39,47,1)'); ?>;
$fbsbbgc: <?php echo get_option('fbsbbgc', 'rgba(194,39,47,1)'); ?>;
$eabgc: <?php echo get_option('eabgc', 'rgba(51,137,215,1)'); ?>;
<?php $facbgcbs = get_option('facbgcbs', '0'); ?>
<?php $scbxshdw = get_option('scbxshdw', '0'); ?>
<?php $hctabgcfill = get_option('hctabgcfill', '0'); ?>
<?php $ftabgcfill = get_option('ftabgcfill', '0'); ?>
<?php $fbsbbgcfill = get_option('fbsbbgcfill', '0'); ?>
$cabgc: <?php echo get_option('cabgc', 'none'); ?>;
$facbgc: <?php echo get_option('facbgc', 'none'); ?>;
$ccbgc: <?php echo get_option('ccbgc', 'none'); ?>;
$cctabgc: <?php echo get_option('cctabgc', 'none'); ?>;
$scbgc: <?php echo get_option('scbgc', 'none'); ?>;
$fbgc: <?php echo get_option('fbgc', 'none'); ?>;
$tlib: <?php echo get_option('tlib', 'rgba(245,245,245,1)'); ?>;
$fbbcv1: <?php echo get_option('fbbcv1', 'rgba(255,255,255,1)'); ?>;
$fbbcv2: <?php echo get_option('fbbcv2', 'rgba(255,255,255,1)'); ?>;
$tlbb: <?php echo get_option('tlbb', 'rgba(70,117,206,1)'); ?>;

<?php 
    if(get_field('customize', 'option')): 
    if( have_rows('customize', 'option') ):
    while ( have_rows('customize', 'option') ) : the_row();
        if( get_row_layout() == 'logo_image'):
        $custom_options = get_sub_field('custom_options');
        $top = get_sub_field('top_pos');
        ?>
        <?php if( is_array($custom_options) && in_array('Positioned Image', $custom_options)): ?>
        .site-header .logo{
            position:relative;
        }
        .site-header .logo img{
            position:absolute;
            width:auto;
            top: <?php echo $top; ?>px;
        }
        .site-header .logo .logo-container{
            position:absolute;
            min-height: 90px;
            top: <?php echo $top; ?>px;
        }
        <?php else: ?>
        .site-header .split-menu .logo{
            text-align:center;
        }
        .site-header .logo img{
            max-height:64px;
        }
        <?php endif; 
        endif; /*end logo_image*/    
        ?>
        <?php
        if( get_row_layout() == 'hero_area'):
        $title_font_weight = get_sub_field('title_font_weight');
        $content_font_weight = get_sub_field('content_font_weight');
        $cta_button_font_weight = get_sub_field('cta_button_font_weight');
        $cta_button_padding = get_sub_field('cta_button_padding');
        ?>
    $title_font_weight: <?php echo $title_font_weight; ?>;
    $content_font_weight: <?php echo $content_font_weight; ?>;
    $cta_button_font_weight: <?php echo $cta_button_font_weight; ?>;
    $cta_button_padding: <?php echo $cta_button_padding; ?>;
        <?php if($cta_button_padding): ?>
        .banner-top .btn-default.book-btn, .banner-top .book-btn{
        	padding:$cta_button_padding !important;
        }
        <?php endif; ?>
    <?php
        endif; /*end hero_area*/
        if( get_row_layout() == 'menu_primary'):
        $desktop_mw_top_margin = get_sub_field('desktop_menu_wrapper_top_margin');
        $logo_height = get_sub_field('logo_height');
        $ipad_mw_top_margin = get_sub_field('ipad_menu_wrapper_top_margin');
        $top_item_font_weight = get_sub_field('top_item_font_weight');
        $submenu_item_font_weight = get_sub_field('submenu_item_font_weight');
        $cta_button_font_weight = get_sub_field('cta_button_font_weight');
        $ipad_top_item_text = get_sub_field('ipad_top_item_text');
        $ipad_submenu_item_text = get_sub_field('ipad_submenu_item_text');
        ?>
    $desktop_mw_top_margin: <?php echo $desktop_mw_top_margin; ?>;
    $logo_height: <?php echo $logo_height; ?>;
    $ipad_mw_top_margin: <?php echo $ipad_mw_top_margin; ?>;
    $top_item_font_weight: <?php echo $top_item_font_weight; ?>;
    $submenu_item_font_weight: <?php echo $submenu_item_font_weight; ?>;
    $cta_button_font_weight: <?php echo $cta_button_font_weight; ?>;
    $ipad_top_item_text: <?php echo $ipad_top_item_text; ?>;
    $ipad_submenu_item_text: <?php echo $ipad_submenu_item_text; ?>;   
        <?php
        endif; /*end menu_primary*/
        if( get_row_layout() == 'featured_tour'):
            $title_dropshadow = get_sub_field('title_dropshadow');
            ?>
            .featured-tours-2 .name strong{
            <?php if($title_dropshadow == 'Light'): ?>
                text-shadow: rgba(0, 0, 0, 0.09) 0px 0px 5px;
            <?php elseif($title_dropshadow == 'Medium'): ?>
                text-shadow: rgba(0, 0, 0, 0.14) 0px 0px 8px;
            <?php elseif($title_dropshadow == 'Strong'): ?>
                text-shadow: rgba(0, 0, 0, 0.34) 0px 0px 12px;
            <?php elseif($title_dropshadow == 'Extra Strong'): ?>
                text-shadow: rgba(0, 0, 0, 0.77) 3px 3px 12px;
            <?php elseif($title_dropshadow == 'None'): ?>
                text-shadow: none;
            <?php endif; ?>
            }
        <?php
        endif; /*end featured_tour*/
    endwhile;
    endif;
    endif; 
?>

.site-container{
    background: $wbgc;
}
.above-header {
    background: $ahabgc;
}
.site-container .site-header .header-bar-wrapper{
    background: $hbgc;
}
.site-container .site-header .secondary-menu-wrapper{
    background: $smbg;
}
.main-nav-wrapper .genesis-nav-menu .sub-menu .megamenu .sub-menu a,
.main-nav-wrapper .genesis-nav-menu > .megamenu > .sm-container > .sm-inner,
.main-nav-wrapper .genesis-nav-menu .sub-menu a{
    background: $pmsbgc;
}
.main-nav-wrapper .genesis-nav-menu .megamenu > .sm-container a{
    background:none;
}
.main-nav-wrapper{
    .genesis-nav-menu .megamenu:hover .megalink-wrap > a:after{
        border-color: transparent transparent $pmsbgc transparent;
    }
    .genesis-nav-menu > .menu-item > .sub-menu{
        &:before{
            border-color: transparent transparent darken($pmsbgc, 7%) transparent; 
        }
    }
    .genesis-nav-menu .sub-menu .sub-menu{
        .menu-item{
            &:first-child{
                &:before{
                    background:$pmsbgc;
                    border-width:0 0 1px 1px;
                    border-style: solid;
                    border-color:darken($pmsbgc, 7%);
                }
                &:hover{
                    &:before{
                        background:white;
                    }
                }   
            }
        }
    }
    .genesis-nav-menu > .menu-item > .sub-menu{
        > .menu-item{
            &:first-child{
                border-top:5px solid darken($pmsbgc, 7%);
            }
        }
        border-bottom:4px solid darken($pmsbgc, 7%);
    }
    .genesis-nav-menu > .megamenu.menu-item > .sm-container > .sm-inner{
        .menu-item{
            a{
                &:hover{
                    background:none; 
                }
            }
        }
    }
    .genesis-nav-menu .sub-menu{
        .menu-item{
            a{
                &:hover{
                    background:#fff;
                }
            }
        }
    }
    .genesis-nav-menu .sub-menu .sub-menu{
        .menu-item{
            &:first-child{
                border-top:0px solid darken($pmsbgc, 7%);
            }
            a{
                &:hover{
                    background:#fff;
                }
            }
        }
    }
    .genesis-nav-menu > .megamenu.menu-item > .sm-container a{
        border-width:0;
    }
    .genesis-nav-menu .sub-menu a{
        border-width:0 1px 1px 1px;
        border-style:solid;
        border-color:darken($pmsbgc, 7%);
    }
    .genesis-nav-menu .sub-menu .sub-menu{
        border-width:1px 1px 1px 1px;
        border-style:solid;
        border-color:darken($pmsbgc, 7%);
    }
    .genesis-nav-menu .sub-menu .sub-menu a{
        border-width:1px 0px 0px 0px;
    }
    
}
.site-container .genesis-nav-menu .giso-book-btn a{
    background:none;
}
.site-container .genesis-nav-menu .rezdy-book-btn a, .site-container .genesis-nav-menu .trekksoft-book-btn a, .site-container .genesis-nav-menu .fareharbor-book-btn a, .site-container .genesis-nav-menu .xola-book-btn div, .site-container .genesis-nav-menu .peek-book-btn a, .site-container .genesis-nav-menu .giso-book-btn a, .site-container .genesis-nav-menu .book-btn a{
    background: $mnhctabgc;
}
.secondary-nav-wrapper .container{
    background: $bwsmbgc;
}
.secondary-nav-wrapper .genesis-nav-menu .sub-menu a{
    background: $smsbgc;
}
.navbar .navbar-toggle{
    background: $mtbbgc;
}
.navbar .navbar-toggle:hover, .navbar .navbar-toggle:focus{
    background: $mtbhbgc;
}
.tint{
    background: $himgt;
}
.tile-tint{
    background: $timgt;
}
.banner-top h1 span, .banner-top h2 span, .tour-2 .name{
    background: $htbgc;
}
.banner-top li span, .banner-top p span{
    background: $hcbgc;
}
.site-container .book-btn-wrapper .btn-default.book-btn, .site-container .banner .book-btn{
    <?php if (empty($hctabgcfill) || $hctabgcfill == '0'): ?>
    background:none;
    border-width:3px;
    &:hover{
        background: $hctabgc;
    }
    <?php endif; ?>
    <?php if (!empty($hctabgcfill) || !$hctabgcfill == '0'): ?>
    background: $hctabgc;
    <?php endif; ?>
}
.site-container .book-tour-wrapper .btn-default.book-btn, .site-container .tour-page-content .book-btn{
    background: $sctabgc;
}
.site-container .book-tour-wrapper .book-btn2, .site-container .book-btn-wrapper .btn-default.book-btn2{
    background-color: lighten($sctabgc, 3%);
}
.site-container .book-tour-wrapper .book-btn2:hover{
    background-color: darken($sctabgc, 3%);
}
.booking-sidebar .arrow-left{
    border-right: 10px solid darken($sctabgc, 10%);
}
.booking-sidebar .arrow-right{
    border-left: 10px solid darken($sctabgc, 10%);
}
.booking-sidebar .trigger-txt{
    color:#000;
}
.site-container .book-btn-wrapper .dropdown-menu, .book-btn-wrapper .dropdown-menu > li > a.zaui-embed-button, .book-btn-wrapper .dropdown-menu > li > a.giso_btn{
    background-color: rgba($hctabgc, 1);
}
.site-container .book-tour-wrapper .dropdown-menu, .book-tour-wrapper .dropdown-menu > li > a.zaui-embed-button, .book-tour-wrapper .dropdown-menu > li > a.giso_btn{
    background-color: rgba($sctabgc, 1);
}
.book-btn-wrapper .dropdown-menu > li > .xola-custom, .book-btn-wrapper .dropdown-menu > li > a {
  &:hover,
  &:focus {
    background: lighten($hctabgc, 10%);
  }
}
.book-tour-wrapper .dropdown-menu > li > .xola-custom, .book-tour-wrapper .dropdown-menu > li > a{
    &:hover,
    &:focus {
        background: lighten($sctabgc, 10%);
    }
}
.home .banner-bottom .container{
    background: $podfbgc;
}
.banner-bottom .container{
    background: $podtbgc;
}
.site-inner .content{
    background: $cabgc;
}
.front-page-section .featured-tours-2, .featured-tours-section, .featured-tours .container, .featured-tours-2 .position-wrapper, .featured-section .container{
    background: $facbgc;
}
.front-page-section .container, .multi-column-area .container, .featured-tours .container.no-bg .col-sm-8.left-col, .testimonials .container, .reasons .container, .single-tour .left-col, .page-template-default .left-col, .page-template-page-templatestestimonials-php .left-col, .page-template-page-templatestours-php .left-col, .blog-left-col, .faq-page-content .container, .team-members .container, .single-tour .right-col>div, .page-template-default .right-col>div, .page-template-page-templatestestimonials-php .right-col>div, .page-template-page-templatestours-php .right-col>div, .single-tour .right-col .testimonials, .page-template-default .right-col .testimonials, .blog-right-col>div, .classic-itinerary-list .num-wrapper .itinery-num{
    background:$ccbgc;
}
.site-container .book-tour-wrapper{
    background: $cctabgc;
}
.subscribe{
    background: $scbgc;
}
.site-footer{
    background: $fbgc;
}
.banner-top h1, .banner-top h2{
    font-weight:$title_font_weight;
}
.banner-top li, .banner-top p{
    font-weight:$content_font_weight;
}
.banner-top .book-btn-wrapper, .banner-bottom .book-tour-wrapper, .site-container .book-tour-wrapper{
    font-weight:$cta_button_font_weight;
}
@media (max-width: 991px) {
    .main-nav-wrapper{
        margin-top: $ipad_mw_top_margin + px;
     }
}
@media (min-width: 992px) {
    .main-nav-wrapper{
        margin-top: $desktop_mw_top_margin + px;
     }
}
.site-header, .main-nav-wrapper .genesis-nav-menu a{
    font-weight:$top_item_font_weight;
    @media (max-width: 991px) {
        font-size: $ipad_top_item_text + px !important;
    }
}
.main-nav-wrapper .genesis-nav-menu .sub-menu a{
    font-weight:$submenu_item_font_weight;
    @media (max-width: 991px) {
        font-size: $ipad_submenu_item_text + px !important;
    }
}
.navbar-collapse .mobile-nav .sub-menu.dropdown-menu a{
    font-weight:$submenu_item_font_weight;
}
.main-nav-wrapper .genesis-nav-menu .rezdy-book-btn a, .main-nav-wrapper .genesis-nav-menu .trekksoft-book-btn a, .main-nav-wrapper .genesis-nav-menu .fareharbor-book-btn a, .main-nav-wrapper .genesis-nav-menu .xola-book-btn div, .main-nav-wrapper .genesis-nav-menu .peek-book-btn a, .main-nav-wrapper .genesis-nav-menu .giso-book-btn a, .main-nav-wrapper .genesis-nav-menu .book-btn a, .navbar-collapse .mobile-nav .book-btn a{
    font-weight:$cta_button_font_weight !important;
}
.trip-list .trip-item{
    background:$tlib;
    border: 1px solid darken($tlib, 20%);
}
.trip-item li{
    border-top:1px solid darken($tlib, 30%);
}
.trip-item li:first-child{
    border-top:none;
}
.site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .btn-default, .site-container .featured-tours .view-tour-btn .xola-custom, .site-container .featured-tours .view-tour-btn a{
    border:3px solid $ftabgc;
    <?php if (empty($ftabgcfill) || $ftabgcfill == '0'): ?>
    background:none;
    color: $ftabgc;
    &:link, &:active, &:visited{
        color: $ftabgc;
    }
    <?php endif; ?>
    <?php if (!empty($ftabgcfill) || !$ftabgcfill == '0'): ?>
    background: $ftabgc;
    color: #fff;
    &:link, &:active, &:visited{
        color: #fff;
    }
    <?php endif; ?>
    &:hover{
        background: $ftabgc;
    } 
}

.site-container .featured-tours .view-dropdown-wrapper .view-dropdown-tour-btn .open .btn-default{
    background: $ftabgc;
}

.site-container .view-dropdown-wrapper .dropdown-menu{
    background-color: rgba($ftabgc, 1);
}
.view-dropdown-wrapper .dropdown-menu > li > .xola-custom, .view-dropdown-wrapper .dropdown-menu > li > a {
  &:hover,
  &:focus {
    background: lighten($ftabgc, 10%);
  }
}
<?php if (!empty($scbxshdw) || !$scbxshdw == '0'): ?>
.site-container{
    max-width:1440px; 
    margin-left:auto; 
    margin-right:auto;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.45);    
}
<?php endif; ?>
<?php if (!empty($facbgcbs) || !$facbgcbs == '0'): ?>
.front-page-section .featured-tours-2, .featured-tours-2 .position-wrapper, .featured-tours-section{ 
    box-shadow: rgba(0, 0, 0, 0.09) 0px 0px 15px 0px;      
}
<?php endif; ?>
.tour-2{
    .btn-tour{
        border: 3px solid $ftabgc;
        <?php if (!empty($ftabgcfill) || !$ftabgcfill == '0'): ?>
        background: $ftabgc;
        <?php endif; ?>
    }
    .hover-button-tour{
        background-color:$ftabgc;
    }
}
.site-container .fluid-boxes .view-tour-btn a{
    background:none;
    border:3px solid $fbsbbgc;
    <?php if (!empty($fbsbbgcfill) || !$fbsbbgcfill == '0'): ?>
    background: $fbsbbgc;
    <?php endif; ?>
    color: $fbsbbgc;
    &:link, &:active, &:visited{
        color: $fbsbbgc;
    }
    &:hover{
        background: $fbsbbgc;
    }
}
.widget-item .tagcloud a{
    &:link, &:hover, &:active, &:visited{
        background: $eabgc;
    }
}
.gform_footer{
    input[type='submit']{
        border: 3px solid $ftabgc;
        <?php if (empty($ftabgcfill) || $ftabgcfill == '0'): ?>
        color: $ftabgc;
        <?php endif; ?>
        <?php if (!empty($ftabgcfill) || !$ftabgcfill == '0'): ?>
        background: $ftabgc;
        color:#fff;
        <?php endif; ?>
        &:hover{
            background:$ftabgc;
            color:#fff;
        }
    }
}
.fluid-boxes{
    .color-variation-1{
        background-color:$fbbcv1;
        }
    .color-variation-2{
        background-color:$fbbcv2;
        }    
}
.link-tours{
    .link-tour-wrapper{
        a{
            background-color:$tlbb;
        }
    }
}

<?php if (!empty($logo_height)): ?>

.site-header .logo .logo-container {
    min-height: $logo_height + px !important;
}

<?php endif; ?>
