$(document).ready(function() {

if (!Modernizr.flexbox) {
        $('.col-eq-height').matchHeight();
    }/*for IE9(works) and IE10 (works)*/
    
});