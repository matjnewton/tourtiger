$(document).ready(function(){

	$("#booking_product").sticky({
		topSpacing:130,
		bottomSpacing:251,
		getWidthFrom:'.book-tour-wrapper_product'
	});

	$('.book-tour-title_product').hide();
	$('#booking_product').on('sticky-start', function() { 
		$('.book-tour-title_product').show();
	});

	$('.bxslider').bxSlider({
	  pagerCustom: '#bx-pager'
	});

	$('.primary_content_expandable_content_toggle').click(function(){ 
		var close = $(this).attr('data-close');
		var open = $(this).attr('data-open');

	    $(this).text(function(i,old){
	        return old==close ?  open : close;
	    });
	});

	$('#scroll_to_form').click(function(e) {
		e.preventDefault();
		$('.gform_wrapper').scrollTo(500); 
	});

	$('.primary_content_separation_grey_gap').next('.product_content_wrapper').addClass('product_content_wrapper_first');
	$('.primary_content_separation_grey_gap').prev('.product_content_wrapper').addClass('product_content_wrapper_end');
	$('.product_content_wrapper').first().addClass('product_content_wrapper_header');
	$('.product_content_wrapper').last().addClass('product_content_wrapper_footer');
}); //end ready 

jQuery.fn.extend(
{
  scrollTo : function(speed, easing)
  {
    return this.each(function()
    {
      var targetOffset = $(this).offset().top;
      $('html,body').animate({scrollTop: targetOffset-200}, speed, easing);
    });
  }
});