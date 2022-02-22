!( function($){ $( function() {

    const buttonData = window['side_buttons_data'];

    if ( buttonData ) {
        buttonData.forEach( (el) => {
            switch ( el['link-to'] ) {
                case 'book-now' :
                    renderBookNowButton( el );
                    break;
            }
        } )
    }

    function renderBookNowButton( el ){
        let $existing_button = $('#booking [data-button-id]');

        if ( !$existing_button.length )
            $existing_button = $('#booking [data-iframe-popup]');

        if ( !$existing_button.length )
            $existing_button = $('#booking2');

        if ( $existing_button.length ) {

            // const $icon = el['icon'];

            const $new_button = $(`<div class="featured-tours">
                            <div class="view-tour-btn">
                                <a href="#" class="link">
                                    ${el['icon']}${el['text']}</a>
                            </div>
                        </div>`);

            const $wrapper = $('.side-buttons-wrapper');

            $wrapper.append( $new_button );

            $new_button.on( 'click', ( e )=>{
                e.preventDefault();
                $existing_button.trigger('click');
            } )
        }
    }


}); } )( jQuery );
