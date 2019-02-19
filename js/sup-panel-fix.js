;(function(){
    setTimeout( function() {
    var item = document.getElementsByClassName('secondary-menu-wrapper')[0];
    item.setAttribute('id', 'deleting-xs-hidding');
    $('#deleting-xs-hidding').find('*').each(function(){
        $(this).removeClass('hidden-xs');
    });
    // item.firstElementChild.firstElementChild.firstElementChild.firstElementChild.remove();
    }, 20);
})();
