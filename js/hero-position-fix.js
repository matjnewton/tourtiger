;(function(){
    setTimeout( function() {

        var href = window.location.href;

        if ($( window ).width()<768 && !$('body').hasClass('blog')) {
            var paddingTop = $('.header-bar').height();
            $('.blog-content-wrapper').css( "padding-top", paddingTop );
        }

        if ($('.blog-content-wrapper').css("margin-top") < 20) {
            $('.blog-content-wrapper').css("margin-top", 20);
            console.log('Height:', height);
        }

        $('.wp-caption').css('max-width', '100%');
    }, 20);
})();


