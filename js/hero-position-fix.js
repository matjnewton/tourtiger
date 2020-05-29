;(function(){
    setTimeout( function() {

        const href = window.location.href;
        const $el = $('.blog-content-wrapper');

        if ($( window ).width()<768 && !$('body').hasClass('blog')) {
            var paddingTop = $('.header-bar').height();
            $el.css( "padding-top", paddingTop );
        }

        if ($el.css("margin-top") < 20) {
            $el.css("margin-top", 20);
        }

        $('.wp-caption').css('max-width', '100%');
    }, 20);
})();


