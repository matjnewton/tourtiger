/**
 * Manual Gravity Forms submitting.
 * Used in manual scripts
 *
 * @param  {string} url         This URL should be generated
 * @param  {object} values_json Inputs' values
 * @param  {jQuery} $form       Current Form DOM object
 * @return {null}
 */
function submit_gf_through_pc(url, values_json, $form) {

  $.post(url, values_json, function(data){
    console.log(data);

    /**
     * Redirect
     */
    if (data.response.confirmation_type === 'redirect') {
      document.location.href = data.response.confirmation_redirect;
    } else {

      if (data.response.validation_messages) {

        // console.debug(data.response.validation_messages);

        if (data.response.validation_messages[1] === "At least one field must be filled out" ) { //
          const msg = '<h5 class="validation_message">At least one field must be filled out</h5>';
          $form.append(msg);
        }
      }

      else {

        $('.validation_message').remove();

        $form.hide();
        $form.parent().append(data.response.confirmation_message);
      }
    }
  });

  return null;
}

function aload(t){ // not active
  "use strict";
  var e="data-aload";
  return t=t||window.document.querySelectorAll("["+e+"]"),void 0===t.length&&(t=[t]),[].forEach.call(t,function(t){t["LINK"!==t.tagName?"src":"href"]=t.getAttribute(e),t.removeAttribute(e)}),t
}

window.onload = function () {
  aload();
};

(function(factory) {
  'use strict';
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports !== 'undefined') {
    module.exports = factory(require('jquery'));
  } else {
    factory(jQuery);
  }

}(function($) {
  'use strict';

  var pc_field_post_id = global_vars.postid;
  var pc_field_offset = 1;
  var pc_field_nonce = global_vars.nonce;
  var pc_ajax_url = global_vars.ajaxurl;
  var pc_more = true;
  var pc_field_total = $('#pc_wrap').attr('data-total');

  function pc_show_more_js() {

    // make ajax request
    $.post(
      pc_ajax_url, {
        'action': 'pc_show_more_sections',
        'post_id': pc_field_post_id,
        'offset': pc_field_offset,
        'nonce': pc_field_nonce
      },
      function (json) {

        if (json['debug'] === 'ajax-error') {
          document.location.href = global_vars.permalink + '?ajaxload=false';
        } else {
          $('#pc_wrap').append(json['content']);
        }


        pc_field_offset = json['offset'];

        $(document).primaryContent( 'init' );

        if (json['more']) {
          pc_show_more_js();
        } else {
          $(document).primaryContent( 'onFinish' );
        }
      },
      'json'
    );

  }

  /**
   * Run conditional logic statement
   * for primary area gravity forms
   *
   * @todo: allow multiply conditionals
   */
  $.fn.conditionalizeForm = function() {
    var $form          = $(this);
    var $conditionaled = $form.find('[data-conditional-type]');

    $conditionaled.each(function () {
      var $field       = $(this);
      var type         = $field.attr('data-conditional-type');
      var fieldId      = $field.closest('[data-id]').attr('data-id');
      var $fieldWrap   = $form.find('[data-id="' + fieldId + '"]');
      var id           = $field.attr('data-conditional-id');
      var operator     = $field.attr('data-conditional-operator');
      var value        = $field.attr('data-conditional-value');
      var $related     = $form.find('[data-id="' + id + '"]');
      var relatedValue = $related.find('input, textarea, select').val();

      switch (operator) {
        case 'is':
          operator = true;
          break;
        default:
          operator = true;
          break;
      }

      var conditional = (relatedValue == value) === operator;

      if (conditional) {
        $fieldWrap.show().removeClass('js-hidden');
      } else {
        $fieldWrap.hide().addClass('js-hidden');
        $field.val('');
      }
    });
  };

  //$(window).load(pc_show_more_js());

  var methods = {

    /**
     * Run each time when loads a new row
     */
    init: function () {

      var $flyBookScheldule = $('[data-flybook-embeddable-button]').not('[data-flybook-inited="1"]');

      if ($flyBookScheldule.length > 0) {
        $flyBookScheldule.each(function(){
          var $wrapper  = $(this);
          var targetID  = $wrapper.attr('data-flybook-embeddable-button');
          var accountID = $wrapper.attr('data-flybook-account');

          new FbBookNowButton({entityId:targetID,entityType:'tickets',accountId:accountID,targetId:'FlybookButton'+targetID+'-'+accountID+'-tickets',domain:'go.theflybook.com',protocol:'https'});

          $wrapper.attr('data-flybook-inited', 1);
        });
      }

      /**
       * Activate cover-video-popup in content cards
       */
      var $videoPopup = $('.video-popup').not('[data-handled="1"]');
      if ( $videoPopup.length > 0 ) {
        $('.video-popup').on('click', '.video-popup--cover', function(){
          var $cover = $(this);
          var $block = $cover.closest('.video-popup');
          var $popup = $block.find('.video-popup--frame');

          /**
           * Popup script chain
           */
          $popup
          .clone()
          .prepend('<a href="javascript:" class="close-popup"></a>')
          .appendTo('body')
          .fadeIn()
          .on(
            'click',
            function (e) {
              var target = e.currentTarget;
              if (!target.closest('.pc--crop__video')) {
                $('body').children('.video-popup--frame').fadeOut(300, function () {
                  $(this).detach();
                });
              }
            }
          )
          .closest('.pc--r').css('z-index', 50);
        });

        $videoPopup.attr('data-handled', 1);
      }

      if ( $('.pc--c').find('form').not('[data-inited]') ) {
        $('.pc--c').find('form').conditionalizeForm();
        $('.pc--c').find('form').attr('data-inited', 1);
      }

      if ( $(".pc--date").not('[data-inited]') ) {
        $(".pc--date").each(function(){
          let dateFormat = $(this)[0].dataset.dateFormat;
          console.debug(dateFormat.toLowerCase().replace('yyyy', 'yy'));
          dateFormat = dateFormat.toLowerCase().replace('yyyy', 'yy');
          $(this).datepicker({dateFormat});
        });
      }

      $(document).bind('gform_confirmation_loaded', function(event, formId){
        console.log(formId);
      });


      /**
       * Init slick carousel
       */
      $('.slider-pro--preview').not('[data-inited]').on('click', function(){
        $(this).tourismTiger('initGallery');
      });

      /**
       * Close carousel
       */
      $('.slider-pro__close-link, .slider-pro__close-bg').not('[data-inited]').on('click', function(){
        $(this).tourismTiger('destroyGallery');
      });

      $('.slider-pro--preview, .slider-pro__close-link, .slider-pro__close-bg').attr('data-inited', 1);

      var $sliderCarucel = $('.js-new-slider').not('[data-inited="1"]');

      if ( $sliderCarucel.length > 0 ) {
        var $rowScroll = $('.pc--r__scroll').filter('.js-new-slider');

        $rowScroll.on('init', function(slick){
          var $slider = $rowScroll.filter('.pc-custom-arrow');

          if ($slider.length > 0) {
            var $arrows = $slider.find('.slick-arrow');
            var color   = $slider.attr('data-color');

            $arrows.find('img').detach().end().css('color',color);
          }

          $rowScroll.removeClass('js-new-slider');
        });

        //setTimeout(function(){
        $('.pc--r__scroll').not('.slick-slider').slick({
          prevArrow: '<div class="pc__c--arrow-p"><img width="20" src="'+global_vars.themeurl+'/includes/primary-content/assets/img/slider/arrow-left.png" /></div>',
          nextArrow: '<div class="pc__c--arrow-n"><img width="20" src="'+global_vars.themeurl+'/includes/primary-content/assets/img/slider/arrow-right.png" /></div>',

          adaptiveHeight: true
        });

        $('.pc--c__testimonial--slider.js-new-slider').not('.slick-slider').slick({
          swipe: false,
          arrows: false,
          dots: true,
          adaptiveHeight: true,
          fade: true,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 5000,
        });

        $('#slider .slides').not('.slick-slider').slick({
          swipe: false,
          arrows: false,
          adaptiveHeight: true,
          fade: true,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 5000,
        });

        setTimeout(function(){
          $('.pc--r__scroll').slick('setOption', 'height', null, true);
          $('.pc--r__scroll.js-new-slider').fadeIn();
        }, 500);

        //setTimeout(function(){
        $('.slick-slider').removeClass('js-new-slider').attr('data-inited', 1);
        //}, 200);
      }

      if ( global_vars.googlemaps && $('.js-new-map').length > 0 ) {
        $('.acf-map.js-new-map').each(function(){

          var map = new_map( $(this) );

          $(this).removeClass('js-new-map');

        });
      }

      if ( $('.pc_circle-image--wrapper.js-new-circle').length > 0 ) {

        var numb = 0; // good for debugging

        $('.pc_circle-image--wrapper.js-new-circle').each(function(){

          var item = $(this);
          var img = item.find('img');
          var img_w = img.attr('width');
          var img_h = img.attr('height');
          var img_href = item.find('a').attr('href');
          var item_w = item.width();
          var item_h = item.height();

          var ver1, ver2;
          ver1 = 1;

          numb++;

          var cond = img_href === "https://www.gyu-kaku.com/times-square/" || img_href=== 'http://www.outlatinfood.net/' || img_href === "https://www.wotif.com/";


          if(cond) {
            console.debug(numb + ")", img_href);
            console.debug("item_w:", item_w, "item_h:", item_h, "img_h:", img_h, "img_w:", img_w);
          }



          if ( item.width() == 0 || item.height() == 0 ) {

            item.css('width', '100%');
            item.css('height', item.width());

          } else {

            if ( item.find('img').width() == 0 || item.find('img').height() == 0 ) { // @todo: check

              if ( item_w < item_h ) {
                item.height(item_w);
              } else {
                item.width(item_h);
              }

            } else {

              if ( img_w > img_h ) {

                if ( img_h > item_w ) {
                  /**item.find('img').height(item_w); former code */

                  if(ver1) img.height(item_w).width(item_w);
                  if (ver2) img.height(item_w);
                  img.removeAttr('width').removeAttr('height');
                  if(cond) console.debug("1. img_w > img_h && img_h > item_w");
                } else if ( img_h <= item_w ) {
                  /**
                   * item.height(img_h);
                   item.width(img_h); - former thing */

                  img.removeAttr('width').removeAttr('height');
                  if (ver2) img.css({'height':item_w});
                  if (ver1) img.css({'height':item_w, 'width':item_w});

                  if(cond) console.debug("2. img_w > img_h && img_h <= item_w");
                }
              } else if ( img_w <= img_h ) {
                if ( img_w > item_w ) {
                  item.find('img').width(item_w);
                  item.height(item_w);
                  if(cond) console.debug("3. img_w <= img_h && img_w > item_w");
                } else if ( img_w <= item_w ) {
                  item.height(img_w);
                  item.width(img_w);
                  if(cond) console.debug("4. img_w <= img_h && img_w <= item_w");
                }
              }

            }

            item.removeClass('js-new-circle');

          }

        });

      }

      /**
       * Set thumb size for different types of Image Content
       */
      if ( $('.pc--r').find('.pc--crop__thumb').length > 0 ) {

        $('.pc--r').find('.pc--crop__thumb').each(function(index, thisItem){

          var item = $(this);
          var blog_thumb_w = item.width();
          var blog_thumb_h = '';
          var parent = item.closest('.pc--r');

          if ( parent.hasClass('pc--r__col-2') || parent.hasClass('pc--r__col-1') || parent.hasClass('pc--r__col-3') ) {
            if ( item.hasClass('pc--c__b-image--tall') ) {
              blog_thumb_h = blog_thumb_w * 0.7;
            } else {
              if ( item.hasClass('pc--c__b-image--normal') ) {
                blog_thumb_h = blog_thumb_w * 0.5;
              } else {
                if ( item.hasClass('pc--c__b-image--square') ) {
                  blog_thumb_h = blog_thumb_w;
                } else {
                  if ( item.hasClass('pc--c__b-image--really-tall') ) {
                    blog_thumb_h = blog_thumb_w * 0.8;
                  } else {
                    if ( item.hasClass('pc--c__b-image--especially-tall') ) {
                      blog_thumb_h = blog_thumb_w * 1.5;
                    } else {
                      blog_thumb_h = blog_thumb_w * 0.5;
                    }
                  }
                }
              }
            }
          } else {
            if ( item.hasClass('pc--c__b-image--tall') ) {
              blog_thumb_h = blog_thumb_w * 1.35;
            } else {
              if ( item.hasClass('pc--c__b-image--normal') ) {
                blog_thumb_h = blog_thumb_w / 1.35;
              } else {
                if ( item.hasClass('pc--c__b-image--square') ) {
                  blog_thumb_h = blog_thumb_w;
                } else {
                  if ( item.hasClass('pc--c__b-image--really-tall') ) {
                    blog_thumb_h = blog_thumb_w * 2;
                  } else {
                    if ( item.hasClass('pc--c__b-image--especially-tall') ) {
                      blog_thumb_h = blog_thumb_w * 2.35;
                    } else {
                      blog_thumb_h = blog_thumb_w * 1.25;
                    }
                  }
                }
              }
            }
          }

          item.animate( {'min-height': blog_thumb_h}, 50 );

          var $image = item.find('img');
          if ( $image.width() > item.width() && $image.height() > item.height() ) {
            if ( $image.width() > $image.height() ) {
              $image.css({
                'width': 'auto',
                'height': item.height()
              });
            } else {
              $image.css({
                'height': 'auto',
                'width': item.width()
              });
            }
          }
        });



      }

      /**
       * Set video size
       */
      if ( $('.pc--crop__video').length > 0 ) {
        $('.pc--crop__video').each(function(index, thisItem){
          var current = $(this);
          var parent = current.closest('.pc--c__video');

          if ( parent.hasClass('pc--c__video--full') ) {
            current.width( parent.width() );
          }

          var blog_thumb_w = current.width();
          var blog_thumb_h = blog_thumb_w / 1.75;

          current.animate( { 'height' : blog_thumb_h }, 500 );
        });
      }

      /**
       * Add extra scripts
       *
       * @Content Card: Form
       */
      if ( $( '.pc--form' ).length > 0 ) {

        var $form = $( '.pc--form' );
        var $horizontal = $( '.pc--form__horizontal' );

        $horizontal.find('.textarea').closest('.gfield').animate({'width' : '100%'}, 500);
        $horizontal.find('.gfield_checkbox, .gfield_radio').closest('.gfield').animate({'flex-grow' : '0'}, 500);

        $form.find('.ginput_container_time').closest('.clear-multi').addClass('clear-multi_tel');
        $form.find('.ginput_container_time').find('i').detach();

        $( '.pc--form__head-hide' ).find('.gform_heading').detach();
        $( '.pc--form__nowrap' ).find('.gfield_label, .gfield_description').detach();
        $( '.pc--form__hide-labels' ).find('.gfield_label').detach();
        $( '.pc--form__hide-desc' ).find('.gfield_description').detach();
        $( '.pc--form__hide-labels-desc' ).find('.gfield_label, .gfield_description').detach();
        $( '.pc--form__head-title' ).find('.gform_description').detach();

      }

      /**
       * Divider repeater
       */
      if ( $('.js-divider').length > 0 ) {

        $('.pc--s__divider_repeater').find('.js-divider').each(function(){
          var element = $(this);
          var url =  element.attr('data-bg');
          var img = new Image();

          img.onload = function(){
            element.height(img.height);
          }

          img.src = url;

          element.css('background-image', 'url(' + url + ')' );
        });

      }

      /**
       * Set min-height equvival width
       */
      $('.pc--s__img--eqvival').each(function(){
        var $item = $(this);

        var match_url = $item.attr('data-expanded');
        var img = new Image();

        img.onload = function(){
          var img_percent = img.height / img.width * 100;
          var img_height = screen.width / 100 * img_percent;

          $item.css('background-image', 'url(' + match_url + ')');

          $item.animate({
            'min-height': img_height,
          }, 100);
        };

        img.src = match_url;
      });

      /**
       * Ratio image in safari fix
       * Make images same height
       */
      if ($(window).width() > 768) {
        var $ratioRows = $('.pc--r__col-2__ratio-right, .pc--r__col-2__ratio-left').filter('.pc--r_pos-stretch');

        $ratioRows.each(function(){
          var $row   = $(this);
          var height = $row.height();

          $row.find('.pc--c__b-image').css('height', height).end().find('.pc--c__b-image img').css('height', height);
        });
      }

      /**
       * Handle fields
       */
      var $formField = $('.pc--form').find('input, textarea, select, button').not('[data-handled]');

      if ($formField.length > 0) {
        $formField.each(function(){
          var $field   = $(this);
          var maskReg  = $field.attr('data-field-mask');
          var isSelect = $field.hasClass('gfield_select');

          if (maskReg) {
            $field.mask(maskReg);
          }

          if (isSelect) {
            var selectBackground = $field.css('background-color');

            $field
            .selectpicker()
            .closest('.bootstrap-select')
            .removeClass('gfield_select')
            .find('.dropdown-toggle')
            .css('background-color', selectBackground);
          }

          /**
           * Handle input typing
           */
          $field.on('keydown', function(e){
            var $field    = $(this);
            var maxLength = $field.attr('data-field-length');

            if (maxLength) {
              if ($field.val().length >= maxLength) {
                e.preventDefault();
                e.stopPropagation();
              }
            }
          });

          $field.removeAttr('disabled').attr('data-handled', 1);
        });
      }

    },


    /**
     * Run after the last field was loaded
     */
    onFinish: function () {


      /**
       * Load reCaptch lib
       */
      if ( $('.g-recaptcha').length > 0 ) {
        $.getScript("//www.google.com/recaptcha/api.js?onload=onloadCallback");
      }

      $('.pc--c').on('change', 'input, select, textarea', function(){
        $(this).closest('form').conditionalizeForm();
      });

      /**
       * Handle forms functions
       */
      $('.pc--form form').submit(function(e){

        /**
         * Prevent page refreshing
         * and setting name=value 's into URL
         */
        e.preventDefault();

        /**
         * DOM Objects
         */
        var $form         = $(this);
        var $field        = $form.find('input, textarea, select');
        var $userFields   = $form.find('[data-field-input], textarea, select');
        var $choiceGroups = $form.find('.gchoices_list');
        var $commonFields = $form.find('.gform_footer').find('input, textarea, select');
        var $reCaptcha    = $form.find('.g-recaptcha');
        var $notifyGroups = $form.find('.gform_notify_group');
        var $userMail     = $form.find('[data-user-email]');


        /**
         * Data variable is used
         * for AJAX requests in Wordpress
         */
        var data        = { action: 'pc_gform_notification' };
        var valid       = true;
        var values      = {};
        var inputValues = {};
        var formId      = $form.attr('id').split('_')[1];


        /**
         * Loop user fields
         */
        if ($userFields.length > 0) {
          $userFields.each(function(){
            var $item    = $(this);
            var name     = $item.attr('name');
            var value    = $item.val();
            var label    = $item.attr('data-field-label');
            var required = $item.attr('data-field-required');
            var mask     = $item.attr('data-field-mask');
            var $gfield  = $item.closest('.gfield');

            /**
             * Check required fields
             */
            if ( value != null && required == '1' ) {
              if (value.length == 0 && !$gfield.hasClass('js-hidden')) {
                $item.css('color', '#f44336').after('<div style="color:#f44336">This field is required.</div>');
                valid = false;
                console.warn('False field: ' + name);
              } else {
                $item.attr('style', '').parent().find('div').detach();
              }
            }

            inputValues[name] = value;

            /**
             * Update row height
             */
            $('.pc--r__scroll').slick('setOption', 'height', null, true);
          });
        }

        /**
         * Loop fields which have choices
         */
        if ($choiceGroups.length > 0) {
          $choiceGroups.map(function(){
            var $list       = $(this);
            var is_required = ($list.attr('data-field-required') == 1);
            var has_more    = ($list.attr('data-form-other-choice') == 1);
            var $checked    = $list.find('input:checked');
            var is_checked  = ($checked.length > 0);

            if (has_more && is_checked) {
              var is_more = ($checked.attr('data-form-more') == 1);

              if (is_more) {
                var $checked = $list.find('[data-form-more-field]');

                /**
                 * Validate text input
                 */
                if ($checked.val().length < 1 && is_required) {
                  $checked.css('color', '#f44336').after('<div style="color:#f44336">This field is required.</div>');
                  valid = false;
                } else {
                  $checked.attr('style', '').parent().find('div').detach();
                }

                /**
                 * Update row height
                 */
                $('.pc--r__scroll').slick('setOption', 'height', null, true);
              }
            }

            /**
             * Get variables
             */
            var label = $checked.attr('data-field-label');

            /**
             * Validation
             */
            if (is_required) {
              if (!is_checked) {
                $list.append('<div style="color:#f44336">This field is required.</div>');
                valid = false;
                console.warn('False checkbox: ' + label);
              } else {
                $list.children('div').detach();
              }

              /**
               * Update row height
               */
              $('.pc--r__scroll').slick('setOption', 'height', null, true);
            }

            if (typeof $checked !== 'object') {
              inputValues[$checked.attr('name')] = $checked.val();
            } else {
              var arrSize = $checked.length;

              /**
               * Get variables of each DOM item
               */
              for (var c = 0; c < arrSize; c++) {
                inputValues[$checked.eq(c).attr('name')] = $checked.eq(c).val();
              }
            }
          });
        }

        console.log(inputValues);


        /**
         * Check reCaptcha is it's exist
         */
        if ($reCaptcha.length > 0) {
          var captcha = grecaptcha.getResponse();

          if(!captcha.length){
            valid = false;
            console.warn('False captcha');
          }
        }

        /**
         * Input values for submitting
         */
        values.input_values = inputValues;
        var values_json     = JSON.stringify(values);
        data.values         = values;


        /**
         * Stop script if one of fields is false
         */
        if (!valid) {

          /**
           * Prevent page refreshing
           * and setting name=value 's into URL
           */
          e.preventDefault();
          console.warn('Form ain\'t valid');
          return false;
        }

        var CalculateSig = function CalculateSig(stringToSign, privateKey){
          //calculate the signature needed for authentication
          var hash = CryptoJS.HmacSHA1(stringToSign, privateKey);
          var base64 = hash.toString(CryptoJS.enc.Base64);
          return encodeURIComponent(base64);
        }

        if (global_vars.is_admin && !global_vars.gf_public && !global_vars.gf_private) {
          $form.hide();
          $form.parent().append('<h3 style="color: red;">Public or private key isn\'t exist.</h3>');
          return false;

        }

        //set variables
        var d = new Date;
        var expiration = 3600; // 1 hour,
        var unixtime = parseInt(d.getTime() / 1000);
        var future_unixtime = unixtime + expiration;
        var publicKey = global_vars.gf_public;
        var privateKey = global_vars.gf_private;
        var method = "POST";
        var route = "/gravityformsapi/forms/"+formId+"/submissions";

        var stringToSign = publicKey + ":" + method + ":" + route + ":" + future_unixtime;
        var sig = CalculateSig(stringToSign, privateKey);
        var url = global_vars.siteurl + route + '?api_key=' + publicKey + '&signature=' + sig + '&expires=' + future_unixtime;

        submit_gf_through_pc(url, values_json, $form);

        return false;
      });


      /**
       * Click event of show more button.
       * Load rows via AJAX.
       *
       * @return false
       */
      $('.pc-section--btn-more').on('click', '.js-more', function() {

        var $self    = $(this);
        var $moreBtn = $self.parent().find('.js-more');
        var $lessBtn = $self.parent().find('.js-less');
        var $root    = $self.closest('.pc-section--btn-more');
        var $section = $self.closest('.pc--s');

        /* Get actuall section data */
        var loadOffset  = $self.attr('data-load-offset');
        var totalRows   = $self.attr('data-total-rows');
        var initRows    = $self.attr('data-load-init');
        var lackRows    = totalRows - initRows;
        var is_more_btn = true;
        var section_id  = $section.attr('id').split('pc--s_id-')[1];
        var $rows       = $self.closest('.pc--s').find('.pc--r');
        var original    = $moreBtn.attr('data-original');


        /**
         * If there are any hadn't been loaded rows,
         * Load them through AJAX
         */
        if (lackRows > 0 ) {
          $.post(global_vars.ajaxurl, {
              'action':     'show_more_rows',
              'post_id':    global_vars.postid,
              'offset':     loadOffset,
              'total_rows': totalRows,
              'init_rows':  initRows,
              'lack_rows':  lackRows,
              'nonce':      global_vars.nonce,
              'section_id': section_id
            },
            function (json) {
              $root.before(json['content']);
              $self.attr('data-load-init', json['rows']);
              console.log(json['message']);

              if (!json['more']) {
                $moreBtn.hide();
                $lessBtn.show();
              }

              $(document).primaryContent( 'init' );
            },
            'json'
          );


          /**
           * Else if all rows were loaded,
           * just show them
           */
        } else {
          var counter = 1;

          if (loadOffset === 'all') {
            loadOffset = 999;
          }

          $rows.each(function(index){
            var $that      = $(this);
            var is_hidden  = $that.css('display') == 'none';
            var isnt_first = (index >= original);
            var is_more    = (loadOffset >= counter);

            if (is_hidden && isnt_first && is_more) {
              $that.show();
              is_hidden = false;
              counter++;

              if ((index+1) == totalRows && !is_hidden) {
                $moreBtn.hide();
                $lessBtn.show();
              }
            }
          });
        }

        return;
      });


      /**
       * Click event of show more button.
       * Load rows via AJAX.
       *
       * @return false
       */
      $('.pc-section--btn-more').on('click', '.js-less', function() {
        var $self     = $(this);
        var $moreBtn  = $self.parent().find('.js-more');
        var $lessBtn  = $self.parent().find('.js-less');
        var $root     = $self.closest('.pc-section--btn-more');
        var $rows     = $self.closest('.pc--s').find('.pc--r');
        var original  = $moreBtn.attr('data-original');

        $rows.each(function(index){
          if (index >= original) {
            $(this).hide();
          }
        });

        $moreBtn.show();
        $lessBtn.hide();

        return;
      });

    }

  };

  $.fn.primaryContent = function( method ) {

    if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method named ' +  method + ' isn\'t exist within jQuery.primaryContent' );
    }

  };

  $(document).primaryContent( 'init' );
  $(document).primaryContent( 'onFinish' );

  $('.go_to').click( function(){
    var scroll_el = $(this).attr('href');
    if ($(scroll_el).length != 0) {
      $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500);
    }
    return false;
  });


  /*
  *  new_map
  *
  *  This function will render a Google Map onto the selected jQuery element
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $el (jQuery element)
  *  @return  n/a
  */

  function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
      zoom    : 16,
      center    : new google.maps.LatLng(0, 0),
      mapTypeId : google.maps.MapTypeId.ROADMAP
    };


    // create map
    var map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function(){

      add_marker( $(this), map );

    });


    // center map
    center_map( map );


    // return
    return map;

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $marker (jQuery element)
  *  @param map (Google Map object)
  *  @return  n/a
  */

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position  : latlng,
      map     : map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content   : $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }

  /*
  *  center_map
  *
  *  This function will center the map, showing all markers attached to this map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param map (Google Map object)
  *  @return  n/a
  */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
      // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  /*
  *  document ready
  *
  *  This function will render each map when the document is ready (page has loaded)
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 5.0.0
  *
  *  @param n/a
  *  @return  n/a
  */
  // global var
  var map = null;

  $(function(){

    $('.acf-map.js-new-map').each(function(){

      var map = new_map( $(this) );

      $(this).removeclass('js-new-map');

    });

  });

}));
