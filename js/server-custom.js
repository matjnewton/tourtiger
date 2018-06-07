$(document).ready(function() {
$('img').each(function(){
$(this).attr('width','auto');
$(this).attr('height','auto');
});
if ($("input:text").length > 0) {	
$("input:text").addClass("inputDefault");

$("input:text")
  .focus(function() {
        if (this.value === this.defaultValue) {
            this.value = '';
        }
  })
  .blur(function() {
        if (this.value === '') {
            this.value = this.defaultValue;
        }
});

}

if($('.review-score').length > 0){
    $.fn.raty.defaults.path = 'http://tourtigerdevel.wpengine.com/wp-content/themes/tourtiger/js/img';
    //$.fn.raty.defaults.path = 'http://localhost/wp391/wp-content/themes/tourtiger/js/img';
$('.review-score').raty({readOnly: true, score: function() {
    return $(this).attr('data-score');
  }});
}

if($('.banner-top .c-editor ul').length > 0){
    $('.banner-top .c-editor').find('li').wrapInner('<span></span>');
}

if($('.banner-top .c-editor p').length > 0){
    $('.banner-top .c-editor').find('p').wrapInner('<span></span>');
}

/*if(($('.single-tour').length > 0) && ($('.banner-top').length > 0)){
    $('.single-tour .banner-top .c-editor li').find('span').prepend('<i class="fa fa-chevron-right"></i> ');
}

if(($('.page').length > 0) && ($('.banner-top').length > 0)){
    $('.page .banner-top .c-editor li').find('span').prepend('<i class="fa fa-chevron-right"></i> ');
}*/

/*if($('.main-nav').length > 0){
    $('.main-nav').parent('div').addClass('menu-main-nav-container');
}*/

if($('.banner-top').length > 0){
    $('.banner-top .c-editor li').find('span').prepend('<i class="fa fa-chevron-right"></i> ');
}

if(($('.single-tour').length > 0) && ($('.section-item').length > 0)){
    $('.section-item .c-editor>ul').find('li').prepend('<i class="fa fa-chevron-right"></i> ');
}

if(($('.page-template-default').length > 0) && ($('.section-item').length > 0)){
    $('.section-item .c-editor>ul').find('li').prepend('<i class="fa fa-chevron-right"></i> ');
}

if(($('.single-tour').length > 0) && ($('.right-col').length > 0)){
    $('.right-col .why-list').find('li').prepend('<i class="fa fa-check"></i> ');
}

$(".main-nav li:contains('search')").replaceWith('<li class="search-wrapper"><a><span class="glyphicon glyphicon-search"></span></a></li>');
	
	$('.search-wrapper a').click(function(){
	    var sPanel = $(this).parents('.site-header').siblings('.above-header');
	    
	    if($(sPanel).is(":hidden")){
    	    $(this).find('span').removeClass('glyphicon-search').addClass('glyphicon-remove');
    	    $(sPanel).slideDown('slow');
	    }
	    else
	    {
            $(this).find('span').removeClass('glyphicon-remove').addClass('glyphicon-search');
            $(sPanel).slideUp('slow');
	    }
	    
	    });
	


if($('.tour-nav, .featured-tours, .featured-tours-2').length > 0){
$.scrollIt({
	upKey: 38, 
	downKey: 40,
	easing: 'linear',
	scrollTime: 600,
	activeClass: 'active',
	onPageChange: null
	//topOffset: -93
	});
}

if($('.image-gallery').length > 0){
$('.image-gallery').magnificPopup({
    delegate:'a',
    type:'image',
    gallery:{enabled:true}
});
}

if($('.photo-gallery').length > 0){
$('.photo-gallery').magnificPopup({
    delegate:'a',
    type:'image',
    gallery:{enabled:true}
});
}

if($('.flexslider').length > 0){
$('.flexslider').flexslider({
    animation: "fade",
    controlNav: false
  });
}

if($('.testimonials-slider').length > 0){
$('.testimonials-slider').flexslider({
    animation: "fade",
    controlNav: false
  });
}

if($('#booking').length > 0){
    
    if($('.bear-banner').length > 0){
        $("#booking").affix({
          offset: {
              //top: $('.banner').height()+$('.site-header').height()
               top:409
          }
        });
    }
    if($('.skip-banner').length > 0){
        $("#booking").affix({
          offset: {
              top: $('.site-header').height()
               //top:409
          }
        });
    }
    
    
    $('#booking').on('affixed-top.bs.affix', function () {
        //$("#booking").removeClass('booking-top');
        $("#booking").css('top',0 +'px');
    });
    
    $('#booking').on('affix.bs.affix', function () {
        //$("#booking").addClass('booking-top');
        if($('.sticky').length > 0){
            var areaHeight = $('.header-bar-wrapper').height();
            $("#booking").css('top',areaHeight + 10 +'px');
        }
    });

}/*end #booking*/

if($('#booking2').length > 0){
    
    if($('.bear-banner').length > 0){
        $("#booking2").affix({
          offset: {
               top:409
          }
        });
    }
    if($('.skip-banner').length > 0){
        $("#booking2").affix({
          offset: {
              top: $('.site-header').height()
          }
        });
    }

    $('#booking2').on('affixed-top.bs.affix', function () {
        $("#booking2").css('top',0 +'px');
    });
    
    $('#booking2').on('affix.bs.affix', function () {
        if(($('.sticky').length > 0) && $('.sticky').css('position') == 'fixed'){
            var areaHeight = $('.header-bar-wrapper').height();
            $("#booking2").css('top',areaHeight + 10 +'px');
        }
    });

}/*end #booking2*/

if($('.sticky').length > 0){
    //$("#booking").addClass('booking-bottom');
    var areaHeight = $('.header-bar-wrapper').height();
        
    $('.below-header .banner-wrapper-inner, .no-banner .banner-wrapper-inner').css('margin-top',areaHeight +'px');
    
    $('.under-header .overlay-slider-content').css('margin-top',areaHeight +'px');
    
    //$('.booking-top').css('top',areaHeight + 10 +'px');
} else {
    //$("#booking").addClass('booking-top');
    //$('.booking-top').css('top',0 +'px');
}

if($('.c-editor iframe[src*=youtube]').length > 0){
    
    $('.c-editor iframe[src*=youtube]').wrap('<div class="row video-row"><div class="col-xs-10 col-xs-offset-1"><div class="video-responsive"></div></div></div>');
}

if($('.subcontent iframe[src*=youtube]').length > 0){
    
    $('.subcontent iframe[src*=youtube]').wrap('<div class="row video-row"><div class="col-xs-10 col-xs-offset-1"><div class="video-responsive"></div></div></div>');
}

/*if($("#secondary-nav-wrapper").length > 0){
    $("#secondary-nav-wrapper").affix({
        offset: {
          top: 409 
      }
    });
}*/

if($(".menu-item-has-children").length > 0){
    $(".menu-item-has-children > a").append('<i class="fa fa-chevron-down"></i>');
}

/*if($(".genesis-nav-menu").length > 0){
    $(".genesis-nav-menu .menu-item-has-children > a").append('<i class="fa fa-chevron-down"></i>');
}*/

if($(".mobile-nav")){
    $(".mobile-nav .menu-item-has-children").addClass("dropdown");
    $(".mobile-nav .menu-item-has-children > a").addClass("dropdown-toggle").attr("data-toggle","dropdown");
    
    //<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>'
    $(".mobile-nav .menu-item-has-children > ul").addClass("dropdown-menu");
    //$(".mobile-nav .menu-item-has-children").attr("data-toggle","dropdown");
    
}

/*if($('.left-col h3').length > 0){
    $('.left-col hr').each(function(){
        var parentWidth = $(this).parents('h3').width();
        var textWidth = $(this).siblings('span').width();
        var lineWidth = parentWidth - textWidth - 28;
        $(this).css('width', lineWidth);
    });
}*/

if($('.hidden-xs.hidden-sm .logo').length > 0){
    var logoHeight = $('.hidden-xs.hidden-sm').find('.logo').height();
    //$('.hidden-xs.hidden-sm .logo').parents('.col').siblings('nav').find('.main-nav-wrapper').css('line-height',logoHeight+'px');
    
    if($('.banner-wrapper').css('background-image') != 'none' || $('.banner-wrapper-inner').css('background-image') != 'none'){
        $('.banner-wrapper-inner').css('height',620-logoHeight +'px');
    }
    
    /*if($('.page-template-page-templatesfront-page3-php .banner-wrapper').length > 0){  
        
        if($('.featured-tours-2').css('position')=='absolute'){
        var areaHeight = $('.featured-tours-2').height();
        var colHeight = $('.featured-tours-2').find('.col').height();
        
        $('.margin-spacing').css('margin-top',areaHeight-(colHeight/2)+45 +'px');
        
        }
         
    }*/
    
}

/*$(function() {
    ItemResize();
});
$(window).resize(function() {
    ItemResize();
    });

var ItemResize = function() {
if($('.page-template-page-templatesfront-page3-php .tour-2').length > 0){
    var imgH = $('.page-template-page-templatesfront-page3-php .tour-2').find('img').height();
    $('.page-template-page-templatesfront-page3-php .name-wrapper').css('line-height', imgH + 'px');
    
}
}*/

if($('.visible-xs.visible-sm .mobile-logo').length > 0){
    
    if($('.banner-wrapper').css('background-image') != 'none' || $('.banner-wrapper-inner').css('background-image') != 'none'){
        //$('.banner-wrapper-inner').css('min-height',545 +'px');
    }

}

/*if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
    if (matchMedia('only screen and (max-width: 768px)').matches) {
        $('.banner-top').addClass('banner-top-mobile');
    } else {
        $('.banner-top').removeClass('banner-top-mobile');
    }
    
} else {
    var mq  = matchMedia('only screen and (max-width: 768px)');
    mq.addListener(function(mql) {
        if (mql.matches) {
            $('.banner-top').addClass('banner-top-mobile');
            
        } else {
            $('.banner-top').removeClass('banner-top-mobile');
            
        }
    });
}*/

if ($('.even-grid').length > 0) {
    $('.s-item').matchHeight();
}



if($('.col-eq-height').length > 0){
    //$('.col-eq-height').style.setProperty( 'display', 'none', 'important' );
}

if($('.gfield_select').length > 0){
    $('.gfield_select').selectpicker({style: '', width: '150px'});
}

if ($('.popup-video').length > 0) {
$('.popup-video').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: false
        });
}

if (Modernizr.flexbox) {
    
} else {
    
    
}/*for IE9(works) and IE10 (works)*/

if (!Modernizr.flexbox) {
        //$('.col-eq-height').matchHeight();
    }/*for IE9(works) and IE10 (works)*/
    
/*if(Modernizr.ie8compat){
    alert('ie8');
} else {
    alert('ie8');
}*/

/*if($('html').hasClass('lt-ie9')){
    $('.col-eq-height').css('display','none');
}*/

if ($('.rpwe-ul').length > 0) {
    $('.rpwe-title').find('a').append(' &gt;&gt;');
    $('.rpwe-time').append('<i class="fa fa-calendar"></i>');
}

});