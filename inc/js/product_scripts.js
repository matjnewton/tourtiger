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

	// $('.bxslider').bxSlider({
	//   pagerCustom: '#bx-pager'
	// });

	$('.primary_content_expandable_content_toggle').click(function(){ 
		var close = $(this).attr('data-close');
		var open = $(this).attr('data-open');

	    $(this).children('span').text(function(i,old){
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

$(document).ready(function(){
	// bxslider
	var realSlider= $("ul#bxslider").bxSlider({
	      speed:1000,
	      pager:false,
	      nextText:'<i class="fa fa-angle-right"></i>',
	      prevText:'<i class="fa fa-angle-left"></i>',
	      infiniteLoop:false,
	      hideControlOnEnd:true,
	      onSlideBefore:function($slideElement, oldIndex, newIndex){
	        changeRealThumb(realThumbSlider,newIndex);
	        
	      }
	      
	    });
	    
	    var realThumbSlider=$("ul#bxslider-pager").bxSlider({
	      minSlides: 4,
	      maxSlides: 7,
	      slideWidth: 110,
	      slideMargin: 0,
	      moveSlides: 1,
	      pager:false,
	      speed:1000,
	      infiniteLoop:false,
	      hideControlOnEnd:true,
	      nextText:'<span></span>',
	      prevText:'<span></span>',
	      controls: false,
	      onSlideBefore:function($slideElement, oldIndex, newIndex){
	        /*$j("#sliderThumbReal ul .active").removeClass("active");
	        $slideElement.addClass("active"); */

	      }
	    });
	    
	    linkRealSliders(realSlider,realThumbSlider);

	    if($("#bxslider-pager li").length<5){
	      $("#bxslider-pager .bx-next").hide();
	    }

	// sincronizza sliders realizzazioni
	function linkRealSliders(bigS,thumbS){
	  
	  $("ul#bxslider-pager").on("click","a",function(event){
	    event.preventDefault();
	    var newIndex=$(this).parent().attr("data-slideIndex");
	        bigS.goToSlide(newIndex);
	  });
	}

	//slider!=$thumbSlider. slider is the realslider
	function changeRealThumb(slider,newIndex){
	  
	  var $thumbS=$("#bxslider-pager");
	  $thumbS.find('.active').removeClass("active");
	  $thumbS.find('li[data-slideIndex="'+newIndex+'"]').addClass("active");
	  
	  if(slider.getSlideCount()-newIndex>=1)slider.goToSlide(newIndex);
	  else slider.goToSlide(slider.getSlideCount()-1);

	}

}); //end ready 