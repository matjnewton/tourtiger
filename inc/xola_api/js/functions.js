(function () {
    "use strict";
    var wqs_xola = angular.module("wqs_xola", ['ngAnimate','angular.filter','infinite-scroll']);


// config
    wqs_xola.config(['$httpProvider', function( $httpProvider) {
              $httpProvider.defaults.useXDomain = true;
              //$httpProvider.defaults.withCredentials = true;
              delete $httpProvider.defaults.headers.common["X-Requested-With"];
              $httpProvider.defaults.headers.common["Accept"] = "application/json";
              $httpProvider.defaults.headers.common["Content-Type"] = "application/json; charset=UTF-8";
         }
    ]);


// controler
    wqs_xola.controller('wqs_search_controller', function ($scope, $http, $q, dataServiceXola, dataServiceXolaAjax, dataServiceXolaAjaxMore, dataServiceXolaAjaxMoreNext, dataServiceXolaAjaxMorePrev, $timeout, $filter, $window, GetUrlParameter, TimeArray) {
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

	// load option
	$scope.integrate = {};
	$scope.integrate.integrate_rezdy = js_var.integrate_rezdy;
	$scope.integrate.integrate_xola = js_var.integrate_xola;

	// var
		var data = {};
        var promises = [];
		var promises_click = [];

	// load api key
        //console.log(js_var.apikey);

    // enable load animations
         $scope.loading = true;
	
	// get XOLA product list 

	//https://silent.xola.com/api/experiences/56098357cf8b9cc6348b45f0/availability?_format=json
	//https://silent.xola.com/api/experiences/56098357cf8b9cc6348b45f0/availability?_format=json&start=2016-11-26&end=2016-11-26
	//https://silent.xola.com/api/availability?_format=json&seller=5605b264926705ac758b45c8&start=2016-11-26&end=2016-11-26

		$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		            var promiseObj_xola=dataServiceXola.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            
		            promises.push(promiseObj_xola);
		        });
	          
			// promise api_availability
		        $q.all(promises).then(function(e){
		        	//console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					
		        });

		}); //end then
		console.log($scope);

	    $scope.parseFloat = function(value) {
	        return parseFloat(value/100).toFixed(2);
	    }
	    $scope.getTotal = function(time){
		    var total = 0;
		    for(var i = 0; i < $scope.api_availability_xola.length; i++){
		        var product = $scope.api_availability_xola[i];
		        total += (product.seats);
		    }
		    return total;
		}
	    //-duration 
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

    //+ click availability use factory dataServiceAjax.getData
    $scope.check_availability_xola= function() {
    	console.log('click xola check_availability_xola');
    	var promises_click = [];
		$scope.loading = true;
		//$scope.api_availability_xola = null; // clear
    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		            var promiseObj_xola=dataServiceXolaAjax.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            
		            promises_click.push(promiseObj_xola);
		        });
	          
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					
		        });

		}); //end then
		console.log($scope);
	};
	//end click check_availability_xola

	//+ click availability use factory dataServiceAjaxMore.getData
    $scope.check_availability_xola_more= function() {
    	console.log('load more');
    	var promises_click = [];
		$scope.loading = true;
		//$scope.api_availability_xola = null; // clear
    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		            var promiseObj_xola=dataServiceXolaAjaxMore.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            
		            promises_click.push(promiseObj_xola);
		        });
	          
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola_more = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					
		        });

		}); //end then
		console.log($scope);
	};
	//end click check_availability_xola

    //+ next xola click availability use factory dataServiceAjaxNext.getData
		$scope.check_availability_angular_next_xola= function() {
		    console.log('click next xola');
		    var promises_click = [];

		    $scope.loading = true;

			    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		            var promiseObj_xola=dataServiceXolaAjaxMoreNext.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            
		            promises_click.push(promiseObj_xola);
		        });
	          
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					

					var startTime_next = $("#datepicker-from-input").val();
					startTime_next = moment.utc(startTime_next).add(1, 'days').format('YYYY-MM-DD');
			        jQuery("#datepicker-from-input").data("daterangepicker").setStartDate(startTime_next);
                    jQuery("#datepicker-from-input").data("daterangepicker").setEndDate(startTime_next);
                    jQuery("#datepicker-to-input").data("daterangepicker").setStartDate(startTime_next);
                    jQuery("#datepicker-to-input").data("daterangepicker").setEndDate(startTime_next);

			        });
			    }); //end then
			console.log($scope);
		}; 
	//end next xola click check_availability_angular

    //+ prev xola click availability use factory dataServiceAjaxNext.getData
		$scope.check_availability_angular_prev_xola= function() {
		    console.log('click prev xola');
		    var promises_click = [];

		    $scope.loading = true;

			    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};
		        
		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	}).then(function(api_products_xola){
		         angular.forEach(api_products_xola, function(products, key) {
		            var promiseObj_xola=dataServiceXolaAjaxMorePrev.getData(products.id);
		            promiseObj_xola.then(function(value, products) { 

		            });
		            
		            promises_click.push(promiseObj_xola);
		        });
	          
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					

					var startTime_prev = $("#datepicker-from-input").val();
					//console.log('startTime_prev from picker');console.log(startTime_prev);
					startTime_prev = moment(startTime_prev).subtract(1, 'days').format('YYYY-MM-DD');
			        jQuery("#datepicker-from-input").data("daterangepicker").setStartDate(startTime_prev);
                    jQuery("#datepicker-from-input").data("daterangepicker").setEndDate(startTime_prev);
                    jQuery("#datepicker-to-input").data("daterangepicker").setStartDate(startTime_prev);
                    jQuery("#datepicker-to-input").data("daterangepicker").setEndDate(startTime_prev);
                    jQuery("#datepicker-from-input").val(startTime_prev);
                    jQuery("#datepicker-to-input").val(startTime_prev);


			        });
			    }); //end then
			console.log($scope);
		}; 
	//end prev xola click check_availability_angular


    //+infinite scroll js
        var scrollLoad = true;
        var scrollindex = 0;
        $scope.scrollindex = 1;
        var load = 1;

        $(window).scroll(function (){

		var type_search= GetUrlParameter.getURL('type_search');
        	//console.log('scroll type_search');console.log(type_search);

        $timeout(function(){

        	// console.log($(window).scrollTop());
        	// console.log($('#mainContentAng').height() -400);

		      if ( ( $(window).scrollTop() >=  $('#mainContentAng').height() -400 && load ) && (type_search != 'one_date') ) {
			      	console.log('infinite js 01');
			      	
			      	$scope.loading = true;
			        scrollLoad = false;

			        $scope.check_availability_xola_more(); // check available 

			        var start = $scope.timearrayLoadmore[0];
			        var next = $scope.timearrayLoadmore[0];

			        start = moment.utc(start);
			        next = moment(next).add(10*$scope.scrollindex, 'days')
					var new_timearrayLoadmore = [];
					//console.log('start');console.log(start);
					//console.log('next');console.log(next);
					new_timearrayLoadmore = TimeArray.EnumerateDaysBetweenDates(start,next);
					$scope.timearrayLoadmore = new_timearrayLoadmore;

					scrollindex = $scope.scrollindex + 1;
			        $scope.scrollindex = scrollindex;

			        console.log($scope);
		       }

        },3000);
		

        });



    // end infinite js
	    
    });
//end controler

/*factory*/

//+GetUrlParameter
wqs_xola.factory('GetUrlParameter', function () {
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
wqs_xola.factory('TimeArray', function () {
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

//+dataService starttime and endtime get URLparametr Xola
    wqs_xola.factory('dataServiceXola', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        		
        		//console.log('dataServiceXola 03');

			    //var search_tour_cat = getUrlParameter('search_tour_cat');
			    var search_tour_cat = GetUrlParameter.getURL('search_tour_cat');
			    //console.log('search_tour_cat');console.log(search_tour_cat);

			    if (search_tour_cat) {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = search_tour_cat;
			    }else {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
			    }
			    // startTime
			    // var startTime = getUrlParameter('startTime');
			    // var type_search = getUrlParameter('type_search');
			    var startTime = GetUrlParameter.getURL('startTime');
			    var type_search = GetUrlParameter.getURL('type_search');
				//console.log('startTime');console.log(startTime);
				//console.log('type_search');console.log(type_search);

			    // endTime
			    //var endTime = getUrlParameter('endTime');
			    var endTime = GetUrlParameter.getURL('endTime');
			    //console.log('endTime');console.log(endTime);

			    //for one_date
			    var typesearch = GetUrlParameter.getURL('type_search');
			    if (typesearch =='one_date') {
			    	endTime = startTime;
			    }

 				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');

				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime);
				var toDate = moment.utc(endTime);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

				// Loadmore 
				var daysOfYearMore = [];
				daysOfYearMore.push( endTime_plus1 );
				angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;

				// get
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).
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

//+ Xola dataServiceAjax for click Xola
    wqs_xola.factory('dataServiceXolaAjax', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        	//console.log('dataServiceXolaAjax 01');

	        var datepicker_from = $("#datepicker-from-input").val();
	        var datepicker_to = $("#datepicker-to-input").val();
	        var tour_cat_arr = $(".checkbox_term:checked").map(function() {
	            return $(this).val();         
	        }).get();


		    if (tour_cat_arr && tour_cat_arr != 0) {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = tour_cat_arr;
		    }else {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
		    }

		    var startTime = datepicker_from;
		    //console.log(startTime);
			var endTime = datepicker_to;
			//console.log(endTime);
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
//+ dataServiceAjaxmore for infinite Xola
    wqs_xola.factory('dataServiceXolaAjaxMore', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        	
        	//console.log('factory dataServiceAjaxmore xola 02');

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
			    console.log('startTime');console.log(startTime);
			    //startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');

			// load endtime
			    var length = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore.length;
				var endTime = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore[length-1];
				console.log('endTime');console.log(endTime);
			    
			  //   var endTime_plus1 = new Date(endTime);
			  //   endTime_plus1.setDate(endTime_plus1.getDate() + 1);
 				// endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');
 				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');

			// get
                
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
//+ dataServiceAjax for click NEXT Xola
    wqs_xola.factory('dataServiceXolaAjaxMoreNext', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        
            //console.log('dataServiceXolaAjaxMoreNext 02');
	        var datepicker_from = $("#datepicker-from-input").val();
	        var datepicker_to = $("#datepicker-to-input").val();
	        var tour_cat_arr = $(".checkbox_term:checked").map(function() {
	            return $(this).val();         
	        }).get();

		    if (tour_cat_arr && tour_cat_arr != 0) {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = tour_cat_arr;
		    }else {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
		    }
				//startTime
			    var startTime = datepicker_from;
			    var startTime_plus1 = moment.utc(startTime).add(1, 'days').format('YYYY-MM-DD');
			    //endTime
				var endTime = datepicker_to;
				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');
				var endTime_plus2 = moment.utc(endTime_plus1).add(1, 'days').format('YYYY-MM-DD');

				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime_plus1);
				var toDate = moment.utc(startTime_plus1);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime_plus2+''}).
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
//+ dataServiceAjax for click  PREV Xola
    wqs_xola.factory('dataServiceXolaAjaxMorePrev', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        
            //console.log('dataServiceXolaAjaxMorePrev 02');

	        var datepicker_from = $("#datepicker-from-input").val();
	        var datepicker_to = $("#datepicker-to-input").val();
	        var tour_cat_arr = $(".checkbox_term:checked").map(function() {
	            return $(this).val();         
	        }).get();

		    if (tour_cat_arr && tour_cat_arr != 0) {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = tour_cat_arr;
		    }else {
		    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
		    }

			    var startTime = datepicker_from;
				var startTime_minus1 = moment(startTime).subtract(1, 'days').format('YYYY-MM-DD');
			    var startTime_minus2 = moment(startTime_minus1).subtract(1, 'days').format('YYYY-MM-DD');
				var endTime = datepicker_to;
				//console.log('endTime '+endTime);
			    
				// load timearray
				var daysOfYear = [];
				var fromDate = moment.utc(startTime_minus1);
				var toDate = moment.utc(startTime_minus1);
				daysOfYear = TimeArray.EnumerateDaysBetweenDates(fromDate, toDate);
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;


                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime_minus1+'&end='+endTime+''}).
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


/* +filters */

	wqs_xola.filter("asDate", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'yyyy-MM-dd', 'UTC');
	        return moment.utc(input).format('YYYY-MM-DD');
	    }
	});
 	wqs_xola.filter("asTime", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'hh:mm a', 'UTC');
	        return moment.utc(input).format('hh:mm A');
	    }
	});
	wqs_xola.filter("asDateTitle", function ($filter) {
	    return function (input) {
	        //return $filter('date')(new Date(input), 'dd MMMM', 'UTC');
	        return moment.utc(input).format('DD MMMM');
	    }
	});
	wqs_xola.filter("trust", ['$sce', function($sce) {
	  return function(htmlCode){
	    return $sce.trustAsHtml(htmlCode);
	  }
	}]);


})();

