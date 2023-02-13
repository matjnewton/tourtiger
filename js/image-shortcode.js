!( function($){ $( function() {

    console.debug("Connected!");

    $('.media-frame-content').on('click', '.attachment', (e)=>{
        const $target = $(e.target);
        let id = $target.closest('.attachment').data('id');
        const $input = $('[data-name="image_shortcode"]').find('input');

        if ( !id && location.search!==undefined  ) {
            id = location.search.replace('?item=', '');
        }

        if ( !$input.attr('value') )
            $input.attr('value','[image id=' + id + ']');
        copyShortcodeToClipboard();
    })


    wp.media.view.Modal.prototype.on('open', function() {
        const $input = $("#acf-field_attachment-details-shortcode");

        if ( !$input.attr('value') && location.search!==undefined ) {
            const id = location.search.replace('?item=', '');
            $input.attr('value','[image id=' + id + ']');
        }
        copyShortcodeToClipboard();
    });


    function copyShortcodeToClipboard() {
        let clipboard = new ClipboardJS( '.copy-shortcode' ),
            successTimeout;

        clipboard.on( 'success', function( event ) {

            const triggerElement = $( event.trigger ),
                $description = triggerElement.closest('.description'),
                successElement = $( '.success', $description );

            // Clear the selection and move focus back to the trigger.
            event.clearSelection();
            // Handle ClipboardJS focus bug, see https://github.com/zenorocha/clipboard.js/issues/680
            triggerElement.trigger( 'focus' );

            // Show success visual feedback.
            clearTimeout( successTimeout );
            $description.addClass('copy-to-clipboard-container');
            successElement.removeClass( 'hidden' );

            // Hide success visual feedback after 3 seconds since last success.
            successTimeout = setTimeout( function() {
                successElement.addClass( 'hidden' );
                $description.removeClass('copy-to-clipboard-container');
            }, 3000 );
        } );
    }

}); } )( jQuery );
