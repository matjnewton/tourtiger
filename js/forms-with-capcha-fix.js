



setTimeout(()=>$('#jivo-iframe-container').remove(), 5000); // DELETE THIS AFTER EDIDING!!!!


var onloadCallback = function() {

    var checkForm = ($('.ginput_container_text').length>0 && $('.ginput_container_email').length>0 && $('.ginput_container_captcha').length>0 && !window.location.href.includes('contact-us'));

    if (checkForm) {

        if ($(window).width() > 768) {

            var recaptcha = $('.g-recaptcha');
            recaptcha.remove();
            $('.gform_footer').prepend(recaptcha);


            $('.ginput_container_text').css('padding-left', '0px');
            $('.ginput_container_email').css('padding-left', '0px');
            $('.ginput_container_captcha').parent().remove();
            var block = $('.gform_body').parent().parent();


            var leftOffset = block.offset()['left'], mtext, mr, ml,
                screenWIdth = $(window).width();
            block.css({'width': screenWIdth - leftOffset, "margin-left": leftOffset / 2 * (-1)});

            if (screenWIdth > 900) {
                mtext = '0 10px'
            }
            if (screenWIdth < 901) {
                mtext = '0 10px 0 3px'
            }

            $('.ginput_container_text > input').css({'max-width': '240px', 'margin': mtext});
            $('.ginput_container_email > input').css({'max-width': '240px', 'margin': '0 10px'});
            $('.gform_body').css('max-width', '500px');
            $('.gform_button').css('width', '240px');

            $('.gform_body').parent().css("justify-content", "center");

            if (screenWIdth > 1179) {
                mr = '-48px';
                ml = '-30px'
            }
            if (screenWIdth < 1180 && screenWIdth > 720) {
                mr = '-24px';
                ml = '-20px'
            }

            $('div.g-recaptcha > div').css("transform", "scale(0.69)");
            $('div.g-recaptcha').css({"top": '-13px', "position": "relative", "margin-left": ml, "margin-right": mr});

            $('.gform_fields').css("flex-direction", "row");

            var block = $('.gform_body').parent().parent();
            block.css({"display": "flex", "justify-content": "center", "flex-wrap": "wrap"});

            $(".gform_footer").css({"display": "flex", "justify-content": "center", "flex-wrap": "wrap"});

        }

        if ($(window).width() < 768) {
            $('.ginput_container_captcha').css({"display": "flex", "justify-content": "space-around"});
        }
    }
};
