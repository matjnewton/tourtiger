jQuery(document).ready(function($){

// search page timepiker 
	// var getUrlParameter = function getUrlParameter(sParam) {
	//     var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	//         sURLVariables = sPageURL.split('&'),
	//         sParameterName,
	//         i;

	//     for (i = 0; i < sURLVariables.length; i++) {
	//         sParameterName = sURLVariables[i].split('=');

	//         if (sParameterName[0] === sParam) {
	//             return sParameterName[1] === undefined ? true : sParameterName[1];
	//         }
	//     }
	// };

	// var startTime = getUrlParameter('startTime');
	// var endTime = getUrlParameter('endTime');

 //    jQuery("#datepicker-from-input").daterangepicker({
 //            locale: {
 //              format: "YYYY-MM-DD"
 //            },
 //            singleDatePicker: true,
 //            showDropdowns: true,
 //            startDate: startTime
 //    });
 //    jQuery("#datepicker-to-input").daterangepicker({
 //            locale: {
 //              format: "YYYY-MM-DD"
 //            },
 //            singleDatePicker: true,
 //            showDropdowns: true,
 //            startDate: endTime
 //    });

   	// console.log($("#datepicker-from-input").val());

	// $('#datepicker-from-input').on('apply.daterangepicker', function(ev, picker) {
	//     console.log( $(this).val() );
	// });


	$("#check_availability").click(function(){
	
		var datepicker_from = $("#datepicker-from-input").val();
		var datepicker_to = $("#datepicker-to-input").val();
		var tour_cat_arr = $(".checkbox_term:checked").map(function() {
		    return $(this).val();         
		}).get();
		var product_id = $('#product_id:checked').val();

		$('#mainContent').animate({opacity: 0.5}, 500);
		$('#ajax_preLoading').animate({opacity: 0.5}, 500);

		jQuery.ajax({
			url     : localize_var.ajaxurl,
			type    : "POST",
			dataType: 'json',
			data    : {
				'action'			: 'check_availability',
				'datepicker_from'	: datepicker_from,
				'datepicker_to'		: datepicker_to,
				'tour_cat_arr'		: tour_cat_arr,
				'product_id'		: product_id
			},
			success : function (response) {
				console.log(response);
				$('#ajax_preLoading').animate({opacity: 0}, 500);
				$('#mainContent').html(response.get_check_availiability).animate({opacity: 1}, 500);

			}
		});

	
	});//end click




	// var scrollLoad = true;

	// $(window).scroll(function () { 

	//     console.log($(window).scrollTop());
	//     console.log( $('#mainContent') );

	//   if (scrollLoad && $(window).scrollTop() >=  $('#mainContent').height() -170 ) {
	//     //scrollLoad = false;

	//     console.log($(window).scrollTop());
	//     console.log( $('#mainContent').height() );
	//     console.log('load');

	//     //$("#check_availability").trigger('click');
	//   }
	// });





}) //end document.ready 

