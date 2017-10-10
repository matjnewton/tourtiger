'use strict';
(function(factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }

}(function($) {

	window.bhScript = Tngbh_GetScriptTag();

	if (bhScript != null) {

	    window.tngbhScriptTag = document.getElementById(bhScript);

	    const bh_uniqueId = tngbhScriptTag.getAttribute('uniqueId');
	    const bh_mode = tngbhScriptTag.getAttribute('mode');
	    const bh_opguid = tngbhScriptTag.getAttribute('og');
	    const bh_frameSrc = tngbhScriptTag.getAttribute('fs');
	    const bh_btnTxt = tngbhScriptTag.getAttribute('bt');
	    const bh_css = tngbhScriptTag.getAttribute('cs');
	    const bh_btnImg = tngbhScriptTag.getAttribute('ci');
	    const bh_afId = tngbhScriptTag.getAttribute('af');
	    const bh_fcg = tngbhScriptTag.getAttribute('fcg');
	    const bh_fca = tngbhScriptTag.getAttribute('fca');
	    const bh_fcs = tngbhScriptTag.getAttribute('fcs');

	    let bh_src = bh_frameSrc + "book.aspx?og=" + bh_opguid + "&fcs=" + bh_fcs + "&fca=" + bh_fca + "&fcg=" + bh_fcg + "&af=" + bh_afId + "&uniqueId=" + bh_uniqueId + "&mode=" + bh_mode + "&phref=" + window.location;

	    window.tngbhBtn = document.createElement('button');

	    if (bh_btnImg == null || bh_btnImg == "") {

	        if (bh_btnTxt == null || bh_btnTxt == "")
	            tngbhBtn.innerHTML = "BOOK NOW";
	        else
	            tngbhBtn.innerHTML = bh_btnTxt;

	        tngbhBtn.setAttribute('class', 'tngbh-btn');
	    }
	    else {
	        tngbhBtn.innerHTML = "<img src='" + bh_btnImg + "'></img>";
	    }

	    tngbhBtn.setAttribute('style', 'cursor:pointer;');

	    let bh_windowwidth = screen.width || window.innerWidth
	    || document.documentElement.clientWidth
	    || document.body.clientWidth;

	    let isInIFrame = IsInIframe();

	    if (bh_windowwidth < 800 || isInIFrame || navigator.userAgent.match(/iPad/i)) {
	        bh_src += "&ifstyle=newwindow";
	        tngbhBtn.setAttribute('onclick', "Tngbh_PopupBookingFlow('" + bh_src + "');return false;");
	    }
	    else {
	        bh_src += "&ifstyle=overlay";
	        tngbhBtn.setAttribute('onclick', "Tngbh_OverlayBookingFlow('" + bh_src + "');return false;");
	    }

	    if (bh_css != null) {
	        const bh_date = new Date();
	        let bh_dateStr = bh_date.getFullYear() + bh_date.getDate() + bh_date.getHours() + bh_date.getMinutes() + bh_date.getSeconds();

	        let tngBhStyle = document.createElement('link');
	        tngBhStyle.setAttribute('rel', 'stylesheet');
	        tngBhStyle.setAttribute('href', bh_css + "?" + bh_dateStr);

	        tngbhScriptTag.parentNode.appendChild(tngBhStyle);
	    }

	    tngbhScriptTag.parentNode.appendChild(tngbhBtn);
	}

}));

function Tngbh_GetScriptTag() {
    // get currently executing script
    const divs = document.getElementsByTagName('div');
    var tngbhScriptTag = divs[divs.length - 1];

    // this may not work if host page has dynamically inserted script tags
    // check we have the right one
    if (!IsTngScript(tngbhScriptTag)) {
        tngbhScriptTag = divs[divs.length - 2];

        if (!IsTngScript(tngbhScriptTag)) {
            tngbhScriptTag = document.querySelector('[id^="tngbh-script"]').id;
        }
    }
    
    return tngbhScriptTag;
}

function IsTngScript(tngbhScriptTag) {

    const res = tngbhScriptTag.getAttribute("ID") !== null && tngbhScriptTag.getAttribute("ID").substring(0, 12) || false;

    if (res == "tngbh-script") {
        return true;
    }

    return false;
}

function IsInIframe() {
    try {
        return window.self !== window.top;
    } catch (e) {
        return true;
    }
}

function Tngbh_OverlayBookingFlow(bh_scoped_src) {

    const myframe = document.createElement('iframe');
    myframe.setAttribute('class', 'tngbh-iframe');
    myframe.setAttribute('name', window.location.href);
    myframe.setAttribute('id', 'tngbh-iframe');
    myframe.setAttribute('frameBorder', '0');
    myframe.setAttribute('border', '0');
    myframe.setAttribute('style', 'display:none;');
    myframe.setAttribute('src', bh_scoped_src);
    myframe.setAttribute('iframestyle', "overlay");

    myframe.addEventListener("load", () => tngbhBtn.setAttribute('style', 'display:block;'));

    let myframeWrapper = document.createElement('div');
    myframeWrapper.setAttribute('style', 'overflow:auto;-webkit-overflow-scrolling:touch;');
    myframeWrapper.setAttribute('id', 'tngbh-iframe-wrapper');

    tngbhScriptTag.parentNode.appendChild(myframeWrapper);

    myframeWrapper = document.getElementById("tngbh-iframe-wrapper");
    myframeWrapper.appendChild(myframe);

    const myFrame = document.getElementById("tngbh-iframe");
    myframe.setAttribute('style', '-webkit-overflow-scrolling: touch;display:block;border: 0;opacity: 1;background: rgba(0, 0, 0, 0.6) none repeat scroll 0 0; border: 0 none transparent;height: 100%;left: 0;margin: 0;opacity: 80; overflow-y: auto;padding: 0;position: fixed;top: 0;transition: opacity 0.28s ease 0s;visibility: visible; width: 100%; z-index: 2147483647;');

    return false;
}

function Tngbh_PopupBookingFlow(bh_scoped_src) {

    const myWindow = window.open(bh_scoped_src, 'directories = 0, titlebar = 0, toolbar = 0, location = 0, status = 0, menubar = 0');


    return false;
}

