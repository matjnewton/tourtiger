'use strict';

!( function($){ $( function() {

    setTimeout( init, 500 );

    function init() {

        const $items = $('#menu-main-nav .sub-menu_inline')

        $items.each(id => {
            const $item = $($items[id]);
            const position = Math.round($item.offset().left);
            const $sub_menu = $item.find('.sub-menu');
            const $title = $item.find('[itemprop="url"]');
            const title_width = Math.round($title.width());

            $sub_menu.css({left: '-' + position + 'px'});

            $sub_menu.append($(`<style style="width:0;height:0">
                .main-nav-wrapper .genesis-nav-menu>.menu-item>.sub-menu:before {
                    right: calc( 100vw - ${ position + title_width - 7 }px );
                }            
                </style>`))
        });
    }

}); } )( jQuery );
