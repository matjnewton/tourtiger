(function () {
    "use strict";

 //    angular.element('.primary_content_availability_checker').ready(function() {
	//   angular.bootstrap('.primary_content_availability_checker', ['wqs_xola_check']);
	// });


    var wqs_xola_check = angular.module("wqs_xola_check", ['ngAnimate','angular.filter','angular-toArrayFilter','angular-toArrayFilter_']);

// config
    wqs_xola_check.config(['$httpProvider', function( $httpProvider) {
              $httpProvider.defaults.useXDomain = true;
              //$httpProvider.defaults.withCredentials = true;
              delete $httpProvider.defaults.headers.common["X-Requested-With"];
              $httpProvider.defaults.headers.common["Accept"] = "application/json";
              $httpProvider.defaults.headers.common["Content-Type"] = "application/json; charset=UTF-8";
         }
    ]);


// controler
    wqs_xola_check.controller('wqs_search_controller', function ($scope, $http, $q, dataServiceXolaAjax, $timeout, $filter, $window, dataServiceXola, GetUrlParameter, dataServiceAtlas, dataServiceAtlasAjax) {
    	//console.log('load wqs_search_controller');
	// load cpt product
	    var wqs_api_url = jQuery('#wqs_api_url').val(); 
	      $http.get(wqs_api_url)
	        .then(function(response){
	        	var cpt_product ={};
	        	cpt_product = response.data;
	            $scope.cpt_product = response.data;
	            return cpt_product;
	    });



	// var
		var data = {};
        var promises = [];
		var promises_click = [];

	//numpeople
		var people = GetUrlParameter.getURL('num_people');
		$scope.num_people = people;

	// check avalable 
	var wqs_productcode = $('#wqs_productcode').val();
	$scope.wqs_productcode = wqs_productcode;
	
	// multi
	var scopeid = $scope.$id.toString();

	// load api key
        //console.log(js_var.apikey);

    // enable load animations
         $scope.loading = true;
	
	// get XOLA product list 

	//https://silent.xola.com/api/experiences/56098357cf8b9cc6348b45f0/availability?_format=json
	//https://silent.xola.com/api/experiences/56098357cf8b9cc6348b45f0/availability?_format=json&start=2016-11-26&end=2016-11-26
	//https://silent.xola.com/api/availability?_format=json&seller=5605b264926705ac758b45c8&start=2016-11-26&end=2016-11-26

		$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var_atlas.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		            var promiseObj_xola=dataServiceAtlas.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            // check available 
		            if (wqs_productcode == products.id) {
		            	promises.push(promiseObj_xola);
		            }
		            // multi check available 
		            // var scopeid = $scope.$id.toString();
		            var wqs_our_tours_checker_forgroup_ = $('#wqs_our_tours_checker_forgroup_'+scopeid).val();
	            	if (wqs_our_tours_checker_forgroup_ == products.id) {
		            	promises.push(promiseObj_xola);
		            }
		            // promises.push(promiseObj_xola);
		        });
	          
			// promise api_availability
		        $q.all(promises).then(function(e){
		        	//console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);

					// init seats available for first time
					$scope.initAvailable();

					
					
		        });//end promises

		}); //end then
		console.log($scope);

		$scope.initAvailable = function() {
			//console.log('initAvailable xola0');
			// init seats available for first time
				$scope.timeSelected = '';
				angular.forEach($scope.api_availability_xola, function(api_availability, key) {
		        	angular.forEach(api_availability, function(api_availability2, key) {
		        		//console.log(key);
		        		if(key != 'productCode') {
		        			var index = 0;
		        			$scope.api_availability2 = $filter('toArray_')(api_availability2);
		        			angular.forEach(api_availability2, function(seats, key) {
		        				if(index == 0){
		        					$scope.timeSelected = seats;
		        					//console.log(key);
		        				}
		        				//console.log(seats);
		        				index = index + 1;
		        			});
		        			//console.log($filter('objLength')(api_availability2));
		        			var minheight = $filter('objLength')(api_availability2);
		        			if (wqs_productcode == 0) {
		        				$('.availability_checker_options_'+scopeid).css('min-height', 33*minheight);
		        			} else {
		        				$('.availability_checker_options').css('min-height', 33*minheight);
		        			}
		        			// $('.availability_checker_options').css('min-height', 33*minheight);
		        		}
		        	 });
		        });//end init
		        //  $(".timeSelected_options").attr('selected','');
		        //  $(".timeSelected_options").first().attributes('selected').val('selected');
		        // console.log( $(".timeSelected_options").first().attributes('selected').val('selected') );
		}

		$scope.widgetload = function (e) {
		    var data = {
				  seller: $(e.target).data('seller'),
				  version: $(e.target).data('version'),
				  //experience: $(e.target).data('experience')
				};
			xola.checkout(data);
		    //console.log(data);  
		};

		$scope.widgetload_ = function (e) {
			console.log(e);
		    var data = {
				  seller: $(e.target).data('seller'),
				  version: $(e.target).data('version'),
				  experience: $(e.target).data('experience'),
				  term: $(e.target).data('term')
				};

			bookNowCabinById(data.experience, data.term);
		    console.log(data);  
		};

	    $scope.parseFloat = function(value) {
	        return parseFloat(value/100).toFixed(2);
	    }
	    $scope.parseFloatplus = function(value) {
	        return parseFloat((value/100)-12).toFixed(2);
	    }
	    $scope.getTotal = function(time){
		    var total = 0;
		    for(var i = 0; i < $scope.api_availability_xola.length; i++){
		        var product = $scope.api_availability_xola[i];
		        total += (product.seats);
		    }
		    return total;
		}

		$scope.changedValue = function(item){
	    	$scope.loading = true;       
		   console.log(item);
		   $scope.timeSelected = item;
		   //console.log($scope.timeSelected);
			$timeout(function(){
		        $scope.loading = false;
		    },1000);

		   console.log($scope);
		}
	    $scope.changedValueNext = function(item, time){
	       $scope.loading = true;       
		   //console.log(item);
		   	
		   	//update for multi
			if (wqs_productcode == 0) {
				var multiitem = $('.startTime_check_'+scopeid).val();
				var correct = moment.utc(multiitem).add(time, 'days').format('YYYY-MM-DD'); //crosfix
				$('.startTime_check_'+scopeid).data('daterangepicker').setStartDate(correct);
	       		$('.startTime_check_'+scopeid).data('daterangepicker').setEndDate(correct);
			} else {
				var correct = moment.utc(item).add(time, 'days').format('YYYY-MM-DD'); //crosfix
				$('#startTime_check').data('daterangepicker').setStartDate(correct);
	       		$('#startTime_check').data('daterangepicker').setEndDate(correct);
			}

	       //var correct = moment.utc(item).add(time, 'days').format('YYYY-MM-DD'); //crosfix
	       console.log(correct);
	       // $('#startTime_check').data('daterangepicker').setStartDate(correct);
	       // $('#startTime_check').data('daterangepicker').setEndDate(correct);
		   $scope.timeSelected = correct;
		   $scope.check_availability_xola();
			$timeout(function(){
		        $scope.loading = false;
		    },2000);
		   console.log($scope);
		}
		$scope.changedValuePrev = function(item, time){
	       $scope.loading = true;       
		    //console.log(item);
			
			//update for multi
			if (wqs_productcode == 0) {
				var multiitem = $('.startTime_check_'+scopeid).val();
				var correct = moment.utc(multiitem).subtract(time, 'days').format('YYYY-MM-DD'); //crosfix
				$('.startTime_check_'+scopeid).data('daterangepicker').setStartDate(correct);
	       		$('.startTime_check_'+scopeid).data('daterangepicker').setEndDate(correct);
			} else {
				var correct = moment.utc(item).subtract(time, 'days').format('YYYY-MM-DD'); //crosfix
				$('#startTime_check').data('daterangepicker').setStartDate(correct);
	       		$('#startTime_check').data('daterangepicker').setEndDate(correct);
			}

	       //var correct = moment.utc(item).subtract(time, 'days').format('YYYY-MM-DD'); //crosfix
	       console.log(correct);
	       // $('#startTime_check').data('daterangepicker').setStartDate(correct);
	       // $('#startTime_check').data('daterangepicker').setEndDate(correct);
		   $scope.timeSelected = correct;
		   $scope.check_availability_xola();
			$timeout(function(){
		        $scope.loading = false;
		    },2000);
		   console.log($scope);
		}
	    //duration 
	    $scope.duration = function(start, end ) {
			var timestamp1 = new Date(start).getTime();
			var timestamp2 = new Date(end).getTime();
			var diff = timestamp1 - timestamp2
			return $filter('date')(new Date(diff), 'h', 'UTC');
		}
		$scope.duration_to_hours = function(hours ) {
			var hours = hours/60;
			return hours;
		}
		$scope.get_seatrow = function(array) {
			var row_time = [];
			var row_seat = [];
			angular.forEach(array, function(arrays, key) {
				if(arrays !=0) {
					row_time.push(key);
					row_seat.push(arrays);
				}
			});
			//return row_time;
			return row_seat;
		}
		$scope.get_timerow = function(array) {
			var row_time = [];
			var row_seat = [];
			angular.forEach(array, function(arrays, key) {
				if(arrays !=0) {
					row_time.push(key);
					row_seat.push(arrays);
				}
			});
			return row_time;
			//return row_seat;
		}
		$scope.get_all_seat = function(array) {
			var row_time = [];
			var row_seat = [];
			var all_seat = 0;
			angular.forEach(array, function(arrays, key) {
				// key ==0 only for first
				if(arrays !=0) {
					all_seat += parseInt(arrays);
				}
			});
			return all_seat;
			//return row_seat;
		}

    // click availability use factory dataServiceAjax.getData
    $scope.check_availability_xola= function() {
    	console.log('click atlas');
    	$(".timeSelected option:eq(0)").prop('selected', true);
    	var promises_click = [];
		$scope.loading = true;
		//$scope.api_availability_xola = null; // clear
    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var_atlas.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		         	//update for multi 
		         	//var promiseObj_xola=dataServiceXolaAjax.getData(products.id);
		            var promiseObj_xola=dataServiceAtlasAjax.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            
		            //promises_click.push(promiseObj_xola);

		            // check available 
		            if (wqs_productcode == products.id) {
		            	promises_click.push(promiseObj_xola);
		            }
		            // multi check available 
		            var wqs_our_tours_checker_forgroup_ = $('#wqs_our_tours_checker_forgroup_'+scopeid).val();
	            	if (wqs_our_tours_checker_forgroup_ == products.id) {
		            	promises_click.push(promiseObj_xola);
		            }
					

		        });
	          
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);

			        $scope.initAvailable();
			        // $(".timeSelected option:eq(0)").prop('selected', true);
					console.log($scope);
		        });

		}); //end then
		console.log($scope);
	};
	//end click check_availability_xola



    //infinite scroll js
        var scrollLoad = true;
        var scrollindex = 0;
        $scope.scrollindex = 1;
        
        var load = 1;


    });
//end controler

/*factory*/

//+GetUrlParameter
wqs_xola_check.factory('GetUrlParameter', function () {
	return{
        getURL: function (sParam) {
		        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		            sURLVariables = sPageURL.split('&'),
		            sParameterName,
		            i;

		        for (i = 0; i < sURLVariables.length; i++) {
		            sParameterName = sURLVariables[i].split('=');

		            if (sParameterName[0] === sParam) {
		                return sParameterName[1] === undefined ? true : sParameterName[1];
		            }
		        }
		}
    }
});

//dataService starttime and endtime get URLparametr Xola
    wqs_xola_check.factory('dataServiceAtlas', function($http, $q, $filter, GetUrlParameter){
        return{
            getData: function(productCode){
                var deferred = $q.defer();

			    // startTime
			    var startTime = GetUrlParameter.getURL('check_date');
			    
			    var num_people = GetUrlParameter.getURL('num_people');

			    if (!num_people) {
			    	num_people = $('#num_people_val').val();
			    	angular.element('[ng-controller=wqs_search_controller]').scope().num_people = num_people;
			    }

			    
			    if(!startTime){
			    	//console.log('startTime undefined');
			    	startTime = $('#startTime_check').val();
			    } else {
			    	//$('#startTime_check').val(startTime);
			    	$('#startTime_check').data('daterangepicker').setStartDate(startTime);
			    }

 				// load timearray
				var daysOfYear = [];
				daysOfYear.push( startTime ); //crossfix
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

				// get
                //$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+startTime+''}).
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/http://customxolareports.azurewebsites.net/northwood/ziplineavailability/'+productCode+'/'+startTime+'/'+num_people+''}).
                 success(function(data, status, headers, config) {
                 	var code = {productCode:productCode}
                 	data = angular.extend({}, data, code);
                    deferred.resolve(data);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }

        }
    });
//dataService starttime and endtime get URLparametr Xola
    wqs_xola_check.factory('dataServiceXola', function($http, $q, $filter){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        
		        // helper getUrlParameter 
			    var getUrlParameter = function getUrlParameter(sParam) {
			        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			            sURLVariables = sPageURL.split('&'),
			            sParameterName,
			            i;

			        for (i = 0; i < sURLVariables.length; i++) {
			            sParameterName = sURLVariables[i].split('=');

			            if (sParameterName[0] === sParam) {
			                return sParameterName[1] === undefined ? true : sParameterName[1];
			            }
			        }
			    };
			    //search_tour_cat
			    var search_tour_cat = getUrlParameter('search_tour_cat');
			    if (search_tour_cat) {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = search_tour_cat;
			    }else {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
			    }

			    // new startTime
			    var startTime = getUrlParameter('check_date');
			    
			    if(!startTime){
			    	//console.log('startTime undefined');
			    	startTime = $('#startTime_check').val();
			    } else {
			    	//$('#startTime_check').val(startTime);
			    	$('#startTime_check').data('daterangepicker').setStartDate(startTime);
			    }

			    var type_search = getUrlParameter('type_search');

			    // endTime
			    var endTime = startTime;
 				var endTime_plus1 = moment(endTime).add(1, 'days').format('YYYY-MM-DD'); //crossfix

 				// load timearray
				var daysOfYear = [];
				daysOfYear.push( startTime ); //crossfix
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

				// load timearray for Loadmore 
				var daysOfYearMore = [];
				daysOfYearMore.push( endTime_plus1 );
				angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;

				// get
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+startTime+''}).
                 success(function(data, status, headers, config) {
                 	var code = {productCode:productCode}
                 	data = angular.extend({}, data, code);
                    deferred.resolve(data);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }

        }
    });

// Atlas dataServiceAjax for click 
    wqs_xola_check.factory('dataServiceAtlasAjax', function($http, $q, $filter){
        return{
            getData: function(productCode){
                var deferred = $q.defer();
        

	        //var datepicker_from = $("#datepicker-from-input").val();
	        var datepicker_from = $('#startTime_check').val();
	        var num_people = $('#num_people_val').val();
	        angular.element('[ng-controller=wqs_search_controller]').scope().num_people = num_people;

			var startTime = datepicker_from;
			var endTime = startTime;
			
			//update for multi

			console.log('startTime:');console.log(startTime);

				var daysOfYear = [];
				daysOfYear.push( startTime ); //crossfix
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

                //$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/http://customxolareports.azurewebsites.net/northwood/ziplineavailability/'+productCode+'/'+startTime+'/'+num_people+''}).
                 success(function(data, status, headers, config) {
                    //deferred.resolve(data.sessions);

                    // xola update
                    var code = {productCode:productCode}
                 	data = angular.extend({}, data, code);
                    deferred.resolve(data);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }
        }
    });

// Xola dataServiceAjax for click Xola
    wqs_xola_check.factory('dataServiceXolaAjax', function($http, $q, $filter){
        return{
            getData: function(productCode,scopeid,wqs_productcode){
                var deferred = $q.defer();
        

	        //var datepicker_from = $("#datepicker-from-input").val();
	        var datepicker_from = $('#startTime_check').val();
	        

	        //multi 
	        console.log(scopeid);
	        var startTime_check_id = $('.startTime_check_'+scopeid).val();
	        console.log('startTime_check_id');console.log(startTime_check_id);

	        var datepicker_to = $("#datepicker-to-input").val();
	        var tour_cat_arr = $(".checkbox_term:checked").map(function() {
	            return $(this).val();         
	        }).get();

	        //console.log(tour_cat_arr);
		    //var search_tour_cat = getUrlParameter('search_tour_cat');
		    if (tour_cat_arr && tour_cat_arr != 0) {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = tour_cat_arr;
		    }else {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
		    }

			// var startTime = datepicker_from;
			// var endTime = startTime;
			
			//update for multi
			if (wqs_productcode == 0) {
				var startTime = startTime_check_id; //multi enable
				var endTime = startTime;
			} else {
				var startTime = datepicker_from;
				var endTime = startTime;				
			}
			console.log('startTime:');console.log(startTime);

 				var endTime_plus1 = moment(endTime).add(1, 'days').format('YYYY-MM-DD'); //crossfix
				var daysOfYear = [];
				daysOfYear.push( startTime ); //crossfix
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).
                 success(function(data, status, headers, config) {
                    //deferred.resolve(data.sessions);

                    // xola update
                    var code = {productCode:productCode}
                 	data = angular.extend({}, data, code);
                    deferred.resolve(data);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }
        }
    });



/* filters */

	wqs_xola_check.filter("asDate", function ($filter) {
	    return function (input) {
	    	//console.log(input);
	        //return $filter('date')(new Date(input), 'yyyy-MM-dd', 'UTC');
	        if(input != 'productCode') {
	        	return moment.utc(input).format('YYYY-MM-DD');
	        }
	        //return moment.utc(input).format('YYYY-MM-DD');
	    }
	});
 	wqs_xola_check.filter("asTime", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'hh:mm a', 'UTC');
	        return moment.utc(input).format('hh:mm A');
	    }
	});
	wqs_xola_check.filter("asDateTitle", function ($filter) {
	    return function (input) {
	        return $filter('date')(new Date(input), 'dd MMMM', 'UTC');
	    }
	});
	wqs_xola_check.filter("asDateTitleYears", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'dd MMMM yyyy', 'UTC');
	        return moment.utc(input).format('DD MMMM YYYY');
	    }
	});
	wqs_xola_check.filter("trust", ['$sce', function($sce) {
	  return function(htmlCode){
	    return $sce.trustAsHtml(htmlCode);
	  }
	}]);
	wqs_xola_check.filter('objLength', function() {
		 return function(object) {
		  var count = 0;

		  for(var i in object){
		   count++;
		  }
		  return count;
		 }
	});


})();

// include xola js widget
(function() {
    var co=document.createElement("script");
    co.type="text/javascript";
    co.async=true;
    co.src="https://xola.com/checkout.js";
    var s=document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(co, s);
})();



$(window).on("message", function (e) {
    if (e.originalEvent.data == 'bookingfinished') {
        bookingFinished();
    }
});

function bookingFinished() {
    $('#booknowmodal').hide();
    $('#booknowframe').attr({ src: 'about:blank' });

}

function bookNow() {
    // user will start at an empty cart if no parameters are passed
    $('#booknowframe').attr({ src: 'https://northwoodszipline.azurewebsites.net/dist/index.html' });

    //for Mobile devices consider opening in a new tab instead of in modal/iframe
    $('#booknowmodal').show();
}


function bookNowStaff() {
    // user will start at an empty cart if no parameters are passed
    //staff can book with "Other" payment
    $('#booknowframe').attr({ src: 'https://northwoodszipline.azurewebsites.net/dist/index.html?staffbooking=1' });
    $('#booknowmodal').show();
}

function bookNowCabinById(id, resource, isStaff) {
    // example of passing in the id for a specific experience, so that the booking workflow will open directly to
    // the options for that particular experience rather than starting at an empty cart
    var staffstring = "";
    if (!!isStaff) {
        staffstring = "staffbooking=1&";
    }
    $('#booknowframe').attr({ src: 'https://northwoodszipline.azurewebsites.net/dist/index.html?' + staffstring + '&id=' + id + '&resource=' + resource });

    //for Mobile devices consider opening in a new tab instead of in modal/iframe
    //console.log(window.mobilecheck());
    if(window.mobilecheck()) {
		window.open($("#booknowframe").attr("src"));
    } else {
    	$('#booknowmodal').show();
    }
    
    

}

window.mobilecheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};