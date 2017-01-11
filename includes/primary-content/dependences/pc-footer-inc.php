<?php add_action("wp_footer", "add_primary_area_show_rows", 100);
 
function add_primary_area_show_rows() { ?>

  <style>
    [data-aload] { background-image: none !important; }

    .banner-top .flxslider-wrapper {
      min-height: auto!important;
    }
  </style>

  <script type="text/javascript">
    jQuery(window).load(function () {
      jQuery('.pc--r').removeClass('hidden-load');
    });

    function aload(t){"use strict";var e="data-aload";return t=t||window.document.querySelectorAll("["+e+"]"),void 0===t.length&&(t=[t]),[].forEach.call(t,function(t){t["LINK"!==t.tagName?"src":"href"]=t.getAttribute(e),t.removeAttribute(e)}),t}

    window.onload = function () {
      aload();
    };

    jQuery(function(){
      jQuery('.pc--crop__thumb').each(function(index, thisItem){
        var blog_thumb_w = jQuery(this).width();
        var blog_thumb_h = '';

        if ( jQuery(this).hasClass('pc--c__b-image--tall') ) {
          blog_thumb_h = blog_thumb_w * 1.35;
        } else {
          if ( jQuery(this).hasClass('pc--c__b-image--normal') ) {
            blog_thumb_h = blog_thumb_w / 1.35;
          } else { 
            if ( jQuery(this).hasClass('pc--c__b-image--square') ) {
              blog_thumb_h = blog_thumb_w;
            } else { 
              if ( jQuery(this).hasClass('pc--c__b-image--really-tall') ) {
                blog_thumb_h = blog_thumb_w * 2;
              } else {
                blog_thumb_h = blog_thumb_w / 1.35;
              }
            }
          }
        }

        jQuery(this).css( 'min-height', blog_thumb_h );
      });

      jQuery('.pc--crop__video').each(function(index, thisItem){
        var blog_thumb_w,
            blog_thumb_h,
            current = jQuery(this),
            parent = current.closest('.pc--c__video');

        if ( parent.hasClass('pc--c__video--full') ) {
          current.width( parent.width() );
        }

        blog_thumb_w = current.width();
        blog_thumb_h = blog_thumb_w / 1.75;

        current.css( 'height', blog_thumb_h );
      });
    });

    !(function(){
        jQuery(function(){
            var section = jQuery('.pc--s__img--eqvival'),
                href,
                match_url,
                img,
                img_percent,
                img_height;

            section.each(function(){
              href = jQuery(this).attr('style');
              match_url = href.match(/http:\/\/[^\s]+/i)[0].split( ');' );
              img = new Image();

                  img.src = match_url[0];

                  img_percent = img.height / img.width * 100;
                  img_height = screen.width / 100 * img_percent;

                  $(this).css('min-height', img_height);
                  console.log(img_height);
                  console.log(match_url[0]);
            });
        });
    })();
  </script>

<?php } ?>