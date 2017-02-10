<?php
/**
 * Add scripts im footer
 */

add_action("wp_footer", "add_primary_area_show_rows", 100);
 
function add_primary_area_show_rows() { ?>

  <script type="text/javascript">
    function aload(t){"use strict";var e="data-aload";return t=t||window.document.querySelectorAll("["+e+"]"),void 0===t.length&&(t=[t]),[].forEach.call(t,function(t){t["LINK"!==t.tagName?"src":"href"]=t.getAttribute(e),t.removeAttribute(e)}),t}

    window.onload = function () {
      aload();
    };

    !(function( $ ){

      $(function(){

        /**
         * Show Primary Content when JQuery was loaded
         */
        $(window).load(function () {
          $('.pc--r').removeClass('hidden-load');
        });

        /**
         * Set thumb size for different types of Image Content
         */
        $('.pc--crop__thumb').each(function(index, thisItem){
          var blog_thumb_w = $(this).width(),
              blog_thumb_h = '';

          if ( $(this).hasClass('pc--c__b-image--tall') ) {
            blog_thumb_h = blog_thumb_w * 1.35;
          } else {
            if ( $(this).hasClass('pc--c__b-image--normal') ) {
              blog_thumb_h = blog_thumb_w / 1.35;
            } else { 
              if ( $(this).hasClass('pc--c__b-image--square') ) {
                blog_thumb_h = blog_thumb_w;
              } else { 
                if ( $(this).hasClass('pc--c__b-image--really-tall') ) {
                  blog_thumb_h = blog_thumb_w * 2;
                } else {
                  blog_thumb_h = blog_thumb_w / 1.35;
                }
              }
            }
          }

          $(this).css( 'min-height', blog_thumb_h );
        });

        /**
         * Set video size
         */
        $('.pc--crop__video').each(function(index, thisItem){
          var blog_thumb_w,
              blog_thumb_h,
              current = $(this),
              parent = current.closest('.pc--c__video');

          if ( parent.hasClass('pc--c__video--full') ) {
            current.width( parent.width() );
          }

          blog_thumb_w = current.width();
          blog_thumb_h = blog_thumb_w / 1.75;

          current.css( 'height', blog_thumb_h );
        });

        /**
         * Add extra scripts
         *
         * @Content Card: Form
         */
        $( '.pc--form__horizontal' ).find('.textarea').closest('.gfield').css('min-width', '100%');
        $( '.pc--form__horizontal' ).find('.gfield_checkbox, .gfield_radio').closest('.gfield').css('flex-grow', '0');
        $( '.pc--form' ).find('.ginput_container_time').closest('.clear-multi').addClass('clear-multi_tel');
        $( '.pc--form' ).find('.ginput_container_time').find('i').detach();
        $( '.pc--form__nowrap' ).find('.gfield_label, .gfield_description').detach();
        $( '.pc--form__hide-labels' ).find('.gfield_label').detach();
        $( '.pc--form__hide-desc' ).find('.gfield_description').detach();
        $( '.pc--form__hide-labels-desc' ).find('.gfield_label, .gfield_description').detach();
        $( '.pc--form__head-title' ).find('.gform_description').detach();
        $( '.pc--form__head-hide' ).find('.gform_heading').detach();

        /**
         * Divider repeater
         */
        
	        $('.pc--s__divider_repeater').find('.js-divider').each(function(){
		        var element = $(this), 
		            href =  element.attr('style'),
		            url = href.match(/http:\/\/[^\s]+/i)[0].split( ');' ),
					img = new Image();

		            img.src = url[0];

		            img.onload = function(){
			            element.height(img.height);
		            }
	        });


      });

      /**
       * Set min-height equvival width
       */
      $(window).load(function () {
        var href,
            match_url,
            img,
            img_percent,
            img_height;

        $('.pc--s__img--eqvival').each(function(){
          href = $(this).attr('style');
          match_url = href.match(/http:\/\/[^\s]+/i)[0].split( ');' );
          img = new Image();

              img.src = match_url[0];

              img_percent = img.height / img.width * 100;
              img_height = screen.width / 100 * img_percent;

              $(this).css('min-height', img_height);
        });
      });
    })( jQuery );

  </script>

<?php } ?>