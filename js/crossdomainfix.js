!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', fbID);
fbq('track', "PageView");  //tracking all urls

(function() {
  var original = window.onmessage;
  var style = 'new';
  window.onmessage = function(e) {
    if (original && typeof original == 'function') {
      original.apply(original, arguments);
    }

    var data = e.data;
    try {
      data = JSON.parse(e.data);
    } catch(e) {
      return;
    }
    if (data.msg == 'xolaCheckout') {
      if (data.trip) {
          var trip = data.trip;
          var style = data.style;
          xola.checkout(data.id, data.params);
          
          if (mixpanel){
            mixpanel.track('Start Transaction', {
              boat_name: trip.exp.boat_name,
              duration: trip.exp.duration,
              price: trip.price,
              style: style
            });
          }
      }
    } else if (data.msg == 'iframeResize') {
      var el = document.getElementById('idTripsAutoResizeFrame');
      if (el) {
        el.height = parseInt(data.height) + 30;
      }
    }
  }
  
  var originalCheckout = xola.checkoutSuccess;
  xola.checkoutSuccess = function(a) {
    originalCheckout.apply(xola, arguments);
    if (a.order) {
      a.order.style = style;
      if (mixpanel){
        mixpanel.track('Complete Transaction', a.order);
      }
      
    window._mTrack = window._mTrack || [];
    window._mTrack.push(['addTrans', {
        currency: 'USD',
        total: a.order.amount,
        orderId: a.order.id
    }]);
    window._mTrack.push(['processOrders']);

     
     fbq('track',"Purchase",{
        currency: 'USD',
        content_type: 'product',
        value: [ a.order.amount ],
        content_ids: a.order.id
     });
    }
  }

  var originalClose = xola.checkoutClose;
  xola.checkoutClose = function(a) {
    originalClose.apply(xola, arguments);
    if (mixpanel){
      mixpanel.track('Close Transaction', {
        style: style
      });
    }
  }
})();