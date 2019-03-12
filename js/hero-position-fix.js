;(function(){
    setTimeout( function() {

        var href = window.location.href;
        console.log(href.includes('/blog/'));

        if ($( window ).width()<768 && !href.includes('/blog/')) {
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


