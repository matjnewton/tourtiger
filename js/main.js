"use strict";function checkDisplay(){var e=$(".header-bar-wrapper").height(),n=$(".header-bar-wrapper").find(".hidden-xs");n.is(":visible")?$(".banner-wrapper-inner").css("margin-top",e+"px"):n.is(":hidden")&&$(".banner-wrapper-inner").css("margin-top","0px")}function checkSticky(){var e=$(".header-bar-wrapper").height();"fixed"===$(".sticky").css("position")?$(".under-header .overlay-slider-content").css("margin-top",e+"px"):$(".under-header .overlay-slider-content").css("margin-top","0px")}$(window).resize(function(){$(".sticky").length>0&&($(".below-header").length>0||$(".no-banner").length>0)&&checkDisplay(),$(".sticky").length>0&&$(".under-header").length>0&&checkSticky()}),$(document).ready(function(){if($("input:text").length>0&&($("input:text").addClass("inputDefault"),$("input:text").focus(function(){this.value===this.defaultValue&&(this.value="")}).blur(function(){""===this.value&&(this.value=this.defaultValue)})),$(".banner-top .c-editor ul").length>0&&$(".banner-top .c-editor").find("li").wrapInner("<span></span>"),$(".banner-top .c-editor p").length>0&&$(".banner-top .c-editor").find("p").wrapInner("<span></span>"),$(".banner-top").length>0&&$(".banner-top .c-editor li").find("span").prepend('<i class="fa fa-chevron-right"></i> '),$(".single-tour").length>0&&$(".section-item").length>0&&$(".section-item .c-editor>ul").find("li").prepend('<i class="fa fa-chevron-right"></i> '),$(".page-template-default").length>0&&$(".section-item").length>0&&$(".section-item .c-editor>ul").find("li").prepend('<i class="fa fa-chevron-right"></i> '),$(".single-tour").length>0&&$(".right-col").length>0&&$(".right-col .why-list").find("li").prepend('<i class="fa fa-check"></i> '),$('.main-nav li:contains("search")').replaceWith('<li class="search-wrapper"><a><span class="glyphicon glyphicon-search"></span></a></li>'),$(".search-wrapper a").click(function(){var e=$(this).parents(".site-header").siblings(".above-header");$(e).is(":hidden")?($(this).find("span").removeClass("glyphicon-search").addClass("glyphicon-remove"),$(e).slideDown("slow")):($(this).find("span").removeClass("glyphicon-remove").addClass("glyphicon-search"),$(e).slideUp("slow"))}),$(".front-page-section, .tour-nav, .featured-tours, .featured-tours-2").length>0&&$.scrollIt({upKey:38,downKey:40,easing:"linear",scrollTime:600,activeClass:"active",onPageChange:null}),$(".image-gallery").length>0&&$(".image-gallery").magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}}),$(".page").length>0&&$(".photo-gallery").length>0&&$(".photo-gallery").magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}}),$(".single-tour").length>0&&$(".photo-gallery").length>0&&($(".photo-gallery").hasClass("gallery-one")&&$(".photo-gallery").each(function(e){$(".gallery-"+e).magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}})}),$(".photo-gallery").hasClass("gallery-two")&&$(".photo-gallery").each(function(e){$(".gallery2-"+e).magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}})})),$(".flexslider").length>0&&$(".flexslider").flexslider({animation:"fade",controlNav:!1}),$(".testimonials-slider").length>0&&$(".testimonials-slider").flexslider({animation:"fade",controlNav:!1}),$("#booking").length>0&&($(".bear-banner").length>0&&$("#booking").affix({offset:{top:409}}),$(".skip-banner").length>0&&$("#booking").affix({offset:{top:$(".site-header").height()}}),$("#booking").on("affixed-top.bs.affix",function(){$("#booking").css("top","0px")}),$("#booking").on("affix.bs.affix",function(){if($(".sticky").length>0){var e=$(".header-bar-wrapper").height();$("#booking").css("top",e+10+"px")}})),$("#booking2").length>0&&($("#booking2").on("affixed-top.bs.affix",function(){$("#booking2").css("top","0px")}),$("#booking2").on("affix.bs.affix",function(){if($(".sticky").length>0&&"fixed"===$(".sticky").css("position")){var e=$(".header-bar-wrapper").height();$("#booking2").css("top",e+10+"px")}})),$("#booking2").length>0&&$(".bear-banner").length>0&&$("#booking2").affix({offset:{top:409}}),$("#booking2").length>0&&$(".skip-banner").length>0){var e=$(".header-bar-wrapper").height();$("#booking2").affix({offset:{top:e+10}})}if($(".sticky").length>0&&($(".below-header").length>0||$(".no-banner").length>0)&&checkDisplay(),$(".sticky").length>0&&$(".under-header").length>0&&checkSticky(),$(".c-editor iframe[src*=youtube]").length>0&&$(".c-editor iframe[src*=youtube]").wrap('<div class="row video-row"><div class="col-xs-10 col-xs-offset-1"><div class="video-responsive"></div></div></div>'),$(".subcontent iframe[src*=youtube]").length>0&&$(".subcontent iframe[src*=youtube]").wrap('<div class="row video-row"><div class="col-xs-10 col-xs-offset-1"><div class="video-responsive"></div></div></div>'),$(".menu-item-has-children").length>0&&($(".mobile-nav > .menu-item-has-children > a, .mobile-nav > .menu-item-has-children .menu-item-has-children > a, .main-nav > .menu-item-has-children > a").append('<i class="fa fa-angle-down"></i>'),$(".main-nav > .menu-item-has-children > ul > .menu-item-has-children > a").append('<i class="fa fa-angle-right"></i>'),$(".main-nav .menu-item-has-children > a").each(function(){var e=$(this);e.length>0&&"#"===e.attr("href")&&(console.log(e),$(this).click(function(e){e.preventDefault()}))}),$(".main-nav .menu-item-has-children > a").click(function(){var e=$(this).attr("href");return"#"!==e?(console.log(e),window.location.href=e,!1):void 0})),$(".megamenu").length>0&&$(".megamenu.menu-item-has-children > .megalink-wrap > a").append('<i class="fa fa-angle-down"></i>'),$(".mobile-nav")&&($(".mobile-nav .menu-item-has-children").addClass("dropdown"),$(".mobile-nav .menu-item-has-children > a").addClass("dropdown-toggle").attr("data-toggle","dropdown"),$(".mobile-nav .menu-item-has-children > ul").addClass("dropdown-menu"),$(".mobile-nav a.dropdown-toggle").each(function(){var e=$(this);e.length>0&&"#"!==e.attr("href")&&($(this).addClass("disabled"),$(this).siblings("ul").addClass("stay-open"))}),$(".sub-menu > .menu-item-has-children > a").on("click",function(e){var n=$(this).next(),i=$(this).parent().parent();i.find(".sub-menu:visible").not(n).hide(),n.toggle(),$(this).parent().hasClass("menu-item-has-children")&&!$(this).hasClass("disabled")&&e.preventDefault(),e.stopPropagation()}),$(".sub-menu > li > a:not(.dropdown-toggle)").on("click",function(){var e=$(this).closest(".dropdown");e.find(".sub-menu:visible").hide()})),$(".split-menu").length>0){var n=$(".split-menu .mnws>.menu-languages-container");$(n).clone().appendTo(".split-menu .right-menu-part")}$(".even-grid").length>0&&$(".s-item").matchHeight(),$(".gfield_select").length>0&&!($(".keep-dropdown-unstyled").length>0)&&$(".gfield_select").selectpicker({style:"",width:"150px"}),$(".popup-video").length>0&&$(".popup-video").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),$(".rpwe-ul").length>0&&($(".rpwe-title").find("a").append(" &gt;&gt;"),$(".rpwe-time").append('<i class="fa fa-calendar"></i>'))});

/**
 * Make properly marging between top and site-inner
 */

!(function ($) {
	$(function() {
		var $header = $('.site-header');
		var $sticky = $header.find('.sticky');
		var is_home = $('body').hasClass('home');
		var is_tour = $('body').hasClass('tour-template-default');

		if ( !is_tour && !is_home && $sticky.length === 1 && $(window).width() >= 768 ) {
			var $unessesarily = $('.banner-wrapper-inner'); 
			var headerWrapper = $sticky.height() || 0;
			var secondary     = $('.secondary-menu-wrapper').height() || 0;
			var newMarginTop  = headerWrapper - secondary;

			$('.site-inner').css( 'margin-top', newMarginTop );
			$unessesarily.css('margin-top', 0);
		}

		$('.js-navigated-gallery__front').slick({
		  infinite: false,
		  arrows: true,
		  dots: false,
		  adaptiveHeight: true,
		  speed: 1000,
		  prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></button>',
		  nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></button>'
		});

		$('.js-navigated-gallery__navigation').slick({
		  infinite: false,
		  arrows: false,
		  dots: false,
		  speed: 1000,
		  slidesToShow: 5,
		  variableWidth: true,
  		  focusOnSelect: true
		});
	});
})(jQuery);