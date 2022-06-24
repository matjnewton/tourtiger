
"use strict";

!( function($) {

    // ---- xola adjustments for ios ----

    const theme_url = window['global_vars']['themeurl'];

    ['https://xola.com/checkout.js', theme_url + '/js/crossdomainfix.js'].forEach( script =>{

    })


    const $xolaButtons = $('.xola-checkout.xola-custom');
    if ( $xolaButtons.length ) {
        let scriptLoaded = false;

        let interval = setInterval( ()=>{

        }, 500 );

        const co = document.createElement("script");
        co.type="text/javascript";
        co.async=true;
        const s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(co, s);
        co.onload = function(){
            console.debug("Script loaded");
        };
        co.src="https://xola.com/checkout.js";
    }

    function is_iOS() {
        console.debug("Function", navigator.platform, navigator);
        return [
                'iPad Simulator',
                'iPhone Simulator',
                'iPod Simulator',
                'iPad',
                'iPhone',
                'iPod'
            ].includes( navigator.platform )
            // iPad on iOS 13 detection
            || (navigator.userAgent.includes("Mac") && "ontouchend" in document)
            || navigator.userAgent.includes("iPhone")
    }

} )( jQuery );
