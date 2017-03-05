(function () {
    "use strict";
    var wqs = angular.module("wqs", ['ngAnimate','angular.filter','infinite-scroll']);


// config
    wqs.config(['$httpProvider', function( $httpProvider) {
              $httpProvider.defaults.useXDomain = true;
              //$httpProvider.defaults.withCredentials = true;
              delete $httpProvider.defaults.headers.common["X-Requested-With"];
              $httpProvider.defaults.headers.common["Accept"] = "application/json";
              $httpProvider.defaults.headers.common["Content-Type"] = "application/json; charset=UTF-8";
         }
    ]);


// controler
    wqs.controller('wqs_search_controller', function ($scope, $http, $q, dataService, dataServiceAjax, dataServiceAjaxmore, $timeout, $filter, $window, dataServiceAjaxNext, dataServiceAjaxPrev, GetUrlParameter,TimeArray) {

	// load cpt product
	    var wqs_api_url = jQuery('#wqs_api_url').val();
	    //var wqs_api_url = js_var.wqs_api_url;  
	      $http.get(wqs_api_url)
	        .then(function(response){
	        	var cpt_product ={};
	        	cpt_product = response.data;
	            $scope.cpt_product = response.data;
	            $scope.message();
	            console.log($scope);
	            return cpt_product;
	    });

	// var
		var data = {};
        var promises = [];
		var promises_click = [];

	// load api key
        //console.log(js_var.apikey);

    // enable load animations
         $scope.loading = true;
    
    // load rezdy category
    	//console.log(js_var.rezdy_cat_id);
    	var rezdy_cat_id = js_var.rezdy_cat_id;
    	var rezdy_category = '';
    	if (rezdy_cat_id) {
    		rezdy_category = '/categories/'+rezdy_cat_id;
    	} else {
    		rezdy_category = '';
    	}

	// +get rezdy product list  
	    $http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1'+rezdy_category+'/products?limit=100&apiKey='+js_var.apikey+'')
		// load api_products
	    .then(function(response){
	        var api_products = {};
	        api_products = response.data;
	        $scope.api_products = api_products;
	        return api_products;
		// load available use factory dataService.getData
	    }).then(function(api_products){
	         angular.forEach(api_products.products, function(products, key) {
	            var promiseObj=dataService.getData(products.productCode);
	            promiseObj.then(function(value) { 
	            });
	            promises.push(promiseObj);
	        });
          
		// promise api_availability
	        $q.all(promises).then(function(e){
	          $scope.api_availability = e;
				$timeout(function(){
		            $scope.loading = false;
		        },2000);
		        //$scope.message();
	        });

	    }); //end then
		console.log($scope);
    // end auto load part

    //message  if not tour
    $scope.message = function() {
		var row_seat = [];
		angular.forEach($scope.timearray, function(timearrays, key) {
			angular.forEach($scope.api_availability, function(products) {
				angular.forEach(products , function(productss, key) {
					if( $filter('asDate')(productss.startTimeLocal)  == $filter('asDate')(timearrays) ) {
						var yes = 0;
						angular.forEach($scope.cpt_product , function(cptproducts, key) {
							 if(cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0 && $scope.search_tour_cat == 'all'){
							 	yes = 1;
							 }
							 else if(cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0 && $scope.search_tour_cat != 'all'){
								if( typeof cptproducts.term !== 'undefined'  && cptproducts.term.term_id == $scope.search_tour_cat[0])
								yes = 1;
							 }
						});

						if (yes == 1){
						 	row_seat.push(timearrays);
						 }

					}
				});
			});

		});
		$scope.timearray_seat = row_seat;
	}
    //message  if not tour Loadmore
    $scope.messageLoadmore = function() {
		var row_seat_Loadmore = [];
		angular.forEach($scope.timearrayLoadmore, function(timearrays, key) {
			angular.forEach($scope.api_availability_more, function(products) {
				angular.forEach(products , function(productss, key) {
					if( $filter('asDate')(productss.startTimeLocal)  == $filter('asDate')(timearrays) ) {
						var yes = 0;
						angular.forEach($scope.cpt_product , function(cptproducts, key) {
							 if(cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0 && $scope.search_tour_cat == 'all'){
							 	yes = 1;
							 }
							 else if(cptproducts.productcode ==productss.productCode && cptproducts.productcode != null && productss.seatsAvailable != 0 && $scope.search_tour_cat != 'all'){
								if( typeof cptproducts.term !== 'undefined'  && cptproducts.term.term_id == $scope.search_tour_cat[0])
								yes = 1;
							 }
						});

						if (yes == 1){
						 	row_seat_Loadmore.push(timearrays);
						 }

					}
				});
			});

		});
		$scope.timearrayLoadmore_seat = row_seat_Loadmore;
	}
    //+duration (new Date not fix but works)
    $scope.duration = function(start, end ) {
		var timestamp1 = new Date(start).getTime();
		var timestamp2 = new Date(end).getTime();
		var diff = 0;
		if (timestamp1 > timestamp2) {
			diff = timestamp1 - timestamp2;
		} else {
			diff = timestamp2 - timestamp1;
		}
		return $filter('date')(new Date(diff), 'h', 'UTC');
		//return $filter('date')(new Date(diff), 'h');
	}

    //+ click availability use factory dataServiceAjax.getData
		$scope.check_availability_angular= function() {
		    console.log('click');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1'+rezdy_category+'/products?limit=100&apiKey='+js_var.apikey+'')
			    .then(function(response){
			        var api_products = {};
			        api_products = response.data;
			        $scope.api_products = api_products;
			        return api_products;
			    }).then(function(api_products){
			         angular.forEach(api_products.products, function(products, key) {
			            var promiseObj2=dataServiceAjax.getData(products.productCode);
			            promiseObj2.then(function(value) { 
			            });
			            promises_click.push(promiseObj2);
			        });
		          

			        $q.all(promises_click).then(function(e){
			          $scope.api_availability = e;
						$timeout(function(){
				            $scope.loading = false;
				        },2000);
				        $scope.message();
			        });
			    }); //end then
			console.log($scope);
		}; 
	//end click check_availability_angular

    //+ click availability use factory dataServiceAjaxNext.getData
		$scope.check_availability_angular_next= function() {
		    //console.log('click next 04');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1'+rezdy_category+'/products?limit=100&apiKey='+js_var.apikey+'')
			    .then(function(response){
			        var api_products = {};
			        api_products = response.data;
			        $scope.api_products = api_products;
			        return api_products;
			    }).then(function(api_products){
			         angular.forEach(api_products.products, function(products, key) {
			            var promiseObj2=dataServiceAjaxNext.getData(products.productCode);
			            promiseObj2.then(function(value) { 
			            });
			            promises_click.push(promiseObj2);
			        });
		          

			        $q.all(promises_click).then(function(e){
			          $scope.api_availability = e;
						$timeout(function(){
				            $scope.loading = false;
				        },2000);
				        $scope.message();

					var startTime_next = $("#datepicker-from-input").val();
					startTime_next = moment.utc(startTime_next).add(1, 'days').format('YYYY-MM-DD');
			        jQuery("#datepicker-from-input").data("daterangepicker").setStartDate(startTime_next);
                    jQuery("#datepicker-from-input").data("daterangepicker").setEndDate(startTime_next);
                    //jQuery("#datepicker-from-input").data("daterangepicker").setMinDate(startTime_next);
                    jQuery("#datepicker-to-input").data("daterangepicker").setStartDate(startTime_next);
                    jQuery("#datepicker-to-input").data("daterangepicker").setEndDate(startTime_next);
                    //jQuery("#datepicker-to-input").data("daterangepicker").setMinDate(startTime_next);
                    //console.log('startTime_next');console.log(startTime_next);
			        });
			    }); //end then
			console.log($scope);
		}; 
	//end click check_availability_angular

    // +click availability use factory dataServiceAjaxPrev.getData
		$scope.check_availability_angular_prev= function() {
		    //console.log('click prev 06');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1'+rezdy_category+'/products?limit=100&apiKey='+js_var.apikey+'')
			    .then(function(response){
			        var api_products = {};
			        api_products = response.data;
			        $scope.api_products = api_products;
			        return api_products;
			    }).then(function(api_products){
			         angular.forEach(api_products.products, function(products, key) {
			            var promiseObj2=dataServiceAjaxPrev.getData(products.productCode);
			            promiseObj2.then(function(value) { 
			            });
			            promises_click.push(promiseObj2);
			        });
		          

			        $q.all(promises_click).then(function(e){
			          $scope.api_availability = e;
						$timeout(function(){
				            $scope.loading = false;
				        },2000);
				        $scope.message();

					var startTime_prev = $("#datepicker-from-input").val();
					console.log('startTime_prev from picker');console.log(startTime_prev);
					startTime_prev = moment(startTime_prev).subtract(1, 'days').format('YYYY-MM-DD');
			        jQuery("#datepicker-from-input").data("daterangepicker").setStartDate(startTime_prev);
                    jQuery("#datepicker-from-input").data("daterangepicker").setEndDate(startTime_prev);
                    //jQuery("#datepicker-from-input").data("daterangepicker").setMinDate(startTime_prev);
                    jQuery("#datepicker-to-input").data("daterangepicker").setStartDate(startTime_prev);
                    jQuery("#datepicker-to-input").data("daterangepicker").setEndDate(startTime_prev);
                    //jQuery("#datepicker-to-input").data("daterangepicker").setMinDate(startTime_prev);
                    jQuery("#datepicker-from-input").val(startTime_prev);
                    jQuery("#datepicker-to-input").val(startTime_prev);
                    //console.log('startTime_prev subtract');console.log(startTime_prev);

			        });
			    }); //end then
			console.log($scope);
		}; 
	//end click check_availability_angular

	//+ infinite loadmore availability use factory dataServiceAjaxmore.getData
		$scope.check_availability_angular_more= function() {
		    console.log('check_availability_angular_more');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1'+rezdy_category+'/products?limit=100&apiKey='+js_var.apikey+'')
			    .then(function(response){
			        var api_products = {};
			        api_products = response.data;
			        $scope.api_products = api_products;
			        return api_products;
			    }).then(function(api_products){
			         angular.forEach(api_products.products, function(products, key) {
			            var promiseObj2=dataServiceAjaxmore.getData(products.productCode);
			            promiseObj2.then(function(value) { 
			            });
			            promises_click.push(promiseObj2);
			        });
		          

			        $q.all(promises_click).then(function(e){
			          $scope.api_availability_more = e;
						$timeout(function(){
				            $scope.loading = false;
				        },2000);
						$scope.messageLoadmore();
	            		console.log($scope);
			        });
			    }); //end then
			//console.log($scope);
			scrollLoad = true;
		}; 
	//end infinite check_availability_angular_more

    //+infinite scroll js
        var scrollLoad = true;
        var scrollindex = 0;
        $scope.scrollindex = 1;
        
        var load = 1;

        $(window).scroll(function (){

		//var type_search= getUrlParameter('type_search');
		var type_search = GetUrlParameter.getURL('type_search');
        	//console.log(type_search);

        $timeout(function(){

        	//console.log(scrollLoad && $(window).scrollTop());
        	//console.log($('#mainContentAng').height() -400);

		      if ( (scrollLoad && $(window).scrollTop() >=  $('#mainContentAng').height() -400 && load ) && (type_search != 'one_date') ) {
			      	console.log('infinite js');

			      	$scope.loading = true;
			        scrollLoad = false;

			        $scope.check_availability_angular_more(); // check available 
			        var start = $scope.timearrayLoadmore[0];
			        var next = $scope.timearrayLoadmore[0];
			        start = moment.utc(start);
			        next = moment(next).add(10*$scope.scrollindex, 'days')
					var new_timearrayLoadmore = [];
					//console.log('start');console.log(start);
					//console.log('next');console.log(next);
					new_timearrayLoadmore = TimeArray.EnumerateDaysBetweenDates(start,next);
					//console.log('new_timearrayLoadmore');console.log(new_timearrayLoadmore);
					$scope.timearrayLoadmore = new_timearrayLoadmore;

					scrollindex = $scope.scrollindex + 1;
			        $scope.scrollindex = scrollindex;
			        //console.log('scrollindex');console.log(scrollindex);
			        console.log($scope);
		       }

        },10000);
		

        });
    // end infinite js
	    
    });
//end controler

/*factory*/

//+GetUrlParameter
wqs.factory('GetUrlParameter', function () {
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
//+TimeArray
wqs.factory('TimeArray', function () {
	return{
		EnumerateDaysBetweenDates : function(startDate, endDate) {
		    var now = startDate, dates = [];
		      
		    while (now.isBefore(endDate) || now.isSame(endDate)) {
		            dates.push(now.format('YYYY-MM-DD'));
		            now.add('days', 1);
		        }
		    return dates;
		}
    }
});

//+dataService starttime and endtime get URLparametr
    wqs.factory('dataService', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        		//console.log('dataService 1001');
				
				//tour_cat
				var search_tour_cat = [];
			    search_tour_cat.push(GetUrlParameter.getURL('search_tour_cat'));
			    //var search_tour_cat = getUrlParameter('search_tour_cat')
			    // console.log(getUrlParameter('search_tour_cat'));
			    // console.log('search_tour_cat');console.log(search_tour_cat);
			    if (search_tour_cat[0] ) {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = search_tour_cat;
			    }else {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
			    }
			    // startTime
			    var startTime = GetUrlParameter.getURL('startTime');
				var startTime_minus1 = moment(startTime).subtract(1, 'days').format('YYYY-MM-DD'); //crossfix

			    // endTime
			    var endTime = GetUrlParameter.getURL('endTime');
			    
			    //for one_date
			    var typesearch = GetUrlParameter.getURL('type_search');
			    if (typesearch =='one_date') {
			    	endTime = startTime;
			    }
 				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD'); //crosfix
				
 				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime);
				var toDate = moment.utc(endTime);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);

				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

				// load timearray for Loadmore 
				var daysOfYearMore = [];
				daysOfYearMore.push( endTime_plus1 );
				angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;

				// get
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime_minus1+'&endTime='+endTime_plus1+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }

        }
    });

//+ dataServiceAjax for click 
    wqs.factory('dataServiceAjax', function($http, $q, $filter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        
            //console.log('dataServiceAjax 02');

	        var startTime = $("#datepicker-from-input").val();
	        var endTime = $("#datepicker-to-input").val();
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
			    
				//startTime
			    //var startTime = datepicker_from;

			    //startTime_minus1
			    var startTime_minus1 = moment(startTime).subtract(1, 'days').format('YYYY-MM-DD'); 
			    
			    //endTime
				//var endTime = datepicker_to;
			    
			    //endTime_plus1
			    var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');

				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime);
				var toDate = moment.utc(endTime);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

				// load timearray for Loadmore 
				var daysOfYearMore = [];
				daysOfYearMore.push( endTime_plus1 );
				angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;


                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime_minus1+'&endTime='+endTime_plus1+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });
				
                return deferred.promise;
            }
        }
    });

//+ dataServiceAjax for click NEXT 
    wqs.factory('dataServiceAjaxNext', function($http, $q, $filter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();

        	//console.log('dataServiceAjaxNext 04');

	        var datepicker_from = $("#datepicker-from-input").val();
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

			    var startTime = datepicker_from;
				var startTime_plus1 = moment.utc(startTime).add(1, 'days').format('YYYY-MM-DD');
				//console.log('startTime_plus1');console.log(startTime_plus1);
			    var startTime_minus1 = moment(startTime).subtract(1, 'days').format('YYYY-MM-DD');
			    //console.log('startTime_minus1');console.log(startTime_minus1);

				var endTime = datepicker_to;
				//console.log('endTime '+endTime);
  				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');
				var endTime_plus2 = moment.utc(endTime_plus1).add(1, 'days').format('YYYY-MM-DD');
				//console.log('endTime_plus1');console.log(endTime_plus1);
				//console.log('endTime_plus2');console.log(endTime_plus2);

				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime_plus1);
				var toDate = moment.utc(startTime_plus1);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;
				//console.log('daysOfYear '+daysOfYear);

				$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime_minus1+'&endTime='+endTime_plus2+'&apiKey='+js_var.apikey}).
                // $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime_minus1+'&endTime='+endTime_plus11+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }
        }
    });

//- dataServiceAjax for click  PREV
    wqs.factory('dataServiceAjaxPrev', function($http, $q, $filter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        
                console.log('dataServiceAjaxPrev 02');

	        var datepicker_from = $("#datepicker-from-input").val();
	        var datepicker_to = $("#datepicker-to-input").val();
	        var tour_cat_arr = $(".checkbox_term:checked").map(function() {
	            return $(this).val();         
	        }).get();

	        //console.log(tour_cat_arr);
		    if (tour_cat_arr && tour_cat_arr != 0) {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = tour_cat_arr;
		    }else {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
		    }

			    // startTime
			    var startTime = datepicker_from;
			    var startTime_minus1 = moment(startTime).subtract(1, 'days').format('YYYY-MM-DD');
			    var startTime_minus2 = moment(startTime_minus1).subtract(1, 'days').format('YYYY-MM-DD');

				//endTime
				var endTime = datepicker_to;
 				//var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');
 				//var endTime_plus2 = moment.utc(endTime_plus1).add(1, 'days').format('YYYY-MM-DD');

				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime_minus1);
				var toDate = moment.utc(startTime_minus1);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime_minus2+'&endTime='+endTime+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });
                return deferred.promise;
            }
        }
    });

//+ dataServiceAjaxmore for infinite
    wqs.factory('dataServiceAjaxmore', function($http, $q, $filter){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        	
        	//console.log('factory dataServiceAjaxmore');

        	// load category
		        var tour_cat_arr = $(".checkbox_term:checked").map(function() {
		            return $(this).val();         
		        }).get();

			    if (tour_cat_arr && tour_cat_arr != 0) {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = tour_cat_arr;
			    }else {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
			    }
			// end category

			// load start time
			    var startTime = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore[0];
			    //console.log('startTime');console.log(startTime);

			//startTime_minus1
				var startTime_minus1 = moment(startTime).subtract(1, 'days').format('YYYY-MM-DD'); 

			// load endtime
			    var length = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore.length;
				var endTime = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore[length-1];
				//console.log('endTime');console.log(endTime);
 				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');

			// get
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime_minus1+'&endTime='+endTime_plus1+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });

                return deferred.promise;
            }
        }
    });

/* filters */
//all fix
	wqs.filter("asDate", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'yyyy-MM-dd', 'UTC');
	        return moment.utc(input).format('YYYY-MM-DD');
	    }
	});
 	wqs.filter("asTime", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'hh:mm a');
	        return moment.utc(input).format('hh:mm A');
	    }
	});
	wqs.filter("asDateTitle", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'dd MMMM', 'UTC');
	        return moment.utc(input).format('DD MMMM');
	    }
	});
	wqs.filter("trust", ['$sce', function($sce) {
	  return function(htmlCode){
	    return $sce.trustAsHtml(htmlCode);
	  }
	}]);


})();

