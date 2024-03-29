'use strict';

!( function($){ $( function() {

    setTimeout( init, 500 );

    $(window).on('resize', init);

    function init() {

        if ( $(window).width() > 991 ) {
            const $items = $('#menu-main-nav .sub-menu_inline')

            $items.each(id => {
                const $item = $($items[id]);
                const position = Math.round($item.offset().left);
                const $sub_menu = $item.find('.sub-menu');
                const $title = $item.find('[itemprop="url"]');
                const title_width = Math.round($title.width());

                $sub_menu.css({left: '-' + position + 'px'});
                const nav_wrapper_height = $('.main-nav-wrapper').height();

                $sub_menu.append($(`<style>
                .main-nav-wrapper .genesis-nav-menu>.menu-item.sub-menu_inline>.sub-menu:before {
                    right: calc( 100vw - ${ position + title_width - 7 }px );
                } 
                #menu-main-nav .sub-menu_inline:hover > .sub-menu {
                    top: calc(${nav_wrapper_height + 'px'} - 2rem);
                }           
                </style>`))
            });
        }
    }

}); } )( jQuery );
