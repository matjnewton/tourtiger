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
    wqs.controller('wqs_search_controller', function ($scope, $http, $q, dataService, dataServiceAjax, dataServiceAjaxmore, $timeout, $filter, $window, dataServiceAjaxNext, dataServiceAjaxPrev) {

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

	// load api key
        //console.log(js_var.apikey);

    // enable load animations
         $scope.loading = true;
	
	// get rezdy product list  
	    $http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey='+js_var.apikey+'')
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
	        });

	    }); //end then
		console.log($scope);
    // end auto load part

    //duration 
    $scope.duration = function(start, end ) {
		var timestamp1 = new Date(start).getTime();
		var timestamp2 = new Date(end).getTime();
		var diff = timestamp1 - timestamp2
		return $filter('date')(new Date(diff), 'h', 'UTC');
	}

    // click availability use factory dataServiceAjax.getData
		$scope.check_availability_angular= function() {
		    console.log('click');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey='+js_var.apikey+'')
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
			        });
			    }); //end then
			console.log($scope);
		}; 
	//end click check_availability_angular

    // click availability use factory dataServiceAjaxNext.getData
		$scope.check_availability_angular_next= function() {
		    console.log('click next');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey='+js_var.apikey+'')
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

					var startTime_next = $("#datepicker-from-input").val();
					startTime_next = new Date(startTime_next);
					startTime_next.setDate(startTime_next.getDate() + 1);
					startTime_next = $filter('date')(new Date(startTime_next), 'yyyy-MM-dd');
					$("#datepicker-from-input").val(startTime_next);
					$("#datepicker-to-input").val(startTime_next);

			        });
			    }); //end then
			console.log($scope);
		}; 
	//end click check_availability_angular

    // click availability use factory dataServiceAjaxPrev.getData
		$scope.check_availability_angular_prev= function() {
		    console.log('click prev');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey='+js_var.apikey+'')
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

					var startTime_next = $("#datepicker-from-input").val();
					startTime_next = new Date(startTime_next);
					startTime_next.setDate(startTime_next.getDate() - 1);
					startTime_next = $filter('date')(new Date(startTime_next), 'yyyy-MM-dd');
					$("#datepicker-from-input").val(startTime_next);
					$("#datepicker-to-input").val(startTime_next);

			        });
			    }); //end then
			console.log($scope);
		}; 
	//end click check_availability_angular

	// infinite loadmore availability use factory dataServiceAjaxmore.getData
		$scope.check_availability_angular_more= function() {
		    console.log('check_availability_angular_more');
		    var promises_click = [];

		    $scope.loading = true;

			$http.get('https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/categories/924/products?limit=100&apiKey='+js_var.apikey+'')
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
			        });
			    }); //end then
			//console.log($scope);
			scrollLoad = true;
		}; 
	//end infinite check_availability_angular_more

    //infinite scroll js
        var scrollLoad = true;
        var scrollindex = 0;
        $scope.scrollindex = 1;
        
        var load = 1;

        // $scope.scrollPos = 0;

        // $window.onscroll = function(){
        //     $scope.scrollPos = document.body.scrollTop || document.documentElement.scrollTop || 0;
        //     $scope.$apply(); //or simply $scope.$digest();
        // };


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
			    }

        $(window).scroll(function (){

		var type_search= getUrlParameter('type_search');
        	//console.log(type_search);

        $timeout(function(){

        	//console.log(scrollLoad && $(window).scrollTop());
        	//console.log($('#mainContentAng').height() -400);

		      if ( (scrollLoad && $(window).scrollTop() >=  $('#mainContentAng').height() -400 && load ) && (type_search != 'one_date') ) {
			      	console.log('infinite js');
			      	
			      	//show loadmore block
			      	//$('.timearrayLoadmore').show();

			      	$scope.loading = true;
			        scrollLoad = false;

			        $scope.check_availability_angular_more(); // check available 
			        $('#ang_moreloading').trigger('click'); // load template



			        //setup next start and end time
			        //$scope.timearrayLoadmore.push();

			        var start = $scope.timearrayLoadmore[0];
			        var next = $scope.timearrayLoadmore[0];
			        next = new Date(next);
			        next.setDate(next.getDate() + 10*$scope.scrollindex);
			        //next =  $filter('date')(new Date(next), 'yyyy-MM-dd');
					var new_timearrayLoadmore = [];
					for (var d = new Date(start); d <= next; d.setDate(d.getDate() + 1)) {
					    new_timearrayLoadmore.push( $filter('date')(new Date(d), 'yyyy-MM-dd') );
					}
					$scope.timearrayLoadmore = new_timearrayLoadmore;

					scrollindex = $scope.scrollindex + 1;
			        $scope.scrollindex = scrollindex;

			        console.log($scope);
		       }

        },3000);
		

        });



    // end infinite js
	    
	// load template for infinite   
	    var searchtemplate = [
	      "search_result_list.php.html"
	    ];
	    
	   $scope.displayedtemplate = [];
	    
	   $scope.addTemplate = function(formIndex) {
	      $scope.displayedtemplate.push(searchtemplate[formIndex]);
		    $timeout(function(){
	            $scope.loading = false;
	        },2000);
	    }
	// end template


    });
//end controler

/*factory*/

//dataService starttime and endtime get URLparametr
    wqs.factory('dataService', function($http, $q, $filter){
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

			    var search_tour_cat = getUrlParameter('search_tour_cat');
			    if (search_tour_cat) {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = search_tour_cat;
			    }else {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
			    }
			    // startTime
			    var startTime = getUrlParameter('startTime');
			    


			    startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');
			    


			    // endTime
			    var endTime = getUrlParameter('endTime');

			    
			    // endTime + 1
			    var endTime_plus1 = new Date(endTime);
			    endTime_plus1.setDate(endTime_plus1.getDate() + 1);
 				endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');

 				// load timearray
			    var now = new Date(endTime);
				var daysOfYear = [];
				for (var d = new Date(startTime); d <= now; d.setDate(d.getDate() + 1)) {
				    daysOfYear.push( $filter('date')(new Date(d), 'yyyy-MM-dd') );
				}
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;

				// load timearray for Loadmore 
				var daysOfYearMore = [];
				var endTime_plus2 = new Date(endTime_plus1);
				endTime_plus2.setDate(endTime_plus2.getDate() + 1);
				//daysOfYearMore.push( endTime );
				daysOfYearMore.push( endTime_plus1 );
				angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;

				//hide loadmore
				//$('.timearrayLoadmore').hide();

				// get
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime+'&endTime='+endTime_plus1+'&apiKey='+js_var.apikey}).
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

// dataServiceAjax for click (!not cleare)
    wqs.factory('dataServiceAjax', function($http, $q, $filter){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        

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

			    
			    //var startTime = getUrlParameter('startTime');
			    var startTime = datepicker_from;
			    //console.log(startTime);
			    startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');

			    
			    //var endTime = getUrlParameter('endTime');
				var endTime = datepicker_to;
				//console.log(endTime);
			    
			    var endTime_plus1 = new Date(endTime);
			    endTime_plus1.setDate(endTime_plus1.getDate() + 1);
 				endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');

			    var now = new Date(endTime);
				var daysOfYear = [];
				for (var d = new Date(startTime); d <= now; d.setDate(d.getDate() + 1)) {
				    daysOfYear.push( $filter('date')(new Date(d), 'yyyy-MM-dd') );
				}




                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime+'&endTime='+endTime_plus1+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });
				// angular.element('[ng-controller=wqs_search_controller]').scope().start = startTime;
				// angular.element('[ng-controller=wqs_search_controller]').scope().end = endTime;
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;
                return deferred.promise;
            }
        }
    });

// dataServiceAjax for click NEXT 
    wqs.factory('dataServiceAjaxNext', function($http, $q, $filter){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        

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

			    
			    //var startTime = getUrlParameter('startTime');
			    var startTime = datepicker_from;
			    var startTime11 = datepicker_from;
			    //console.log(startTime);
			    startTime = new Date(startTime);
				startTime.setDate(startTime.getDate() + 1);
				startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');
				console.log('startTime '+startTime);
			    
			    //var endTime = getUrlParameter('endTime');
				var endTime = datepicker_to;
				console.log('endTime '+endTime);
			    
			    var endTime_plus1 = new Date(endTime);
			    endTime_plus1.setDate(endTime_plus1.getDate() + 2);
 				endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');
 				//console.log(endTime_plus1);

 				var endTime_plus11 = new Date(endTime);
			    endTime_plus11.setDate(endTime_plus11.getDate() + 1);
 				endTime_plus11 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');
 				console.log('endTime_plus11 '+endTime_plus11);

			    var now = new Date(startTime);
				var daysOfYear = [];
				for (var d = new Date(startTime); d <= now; d.setDate(d.getDate() + 1)) {
				    daysOfYear.push( $filter('date')(new Date(d), 'yyyy-MM-dd') );
				}
				console.log('daysOfYear '+daysOfYear);

				// $("#datepicker-from-input").val(startTime);
	   //      	$("#datepicker-to-input").val(endTime_plus11);


                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime11+'&endTime='+endTime_plus11+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });
				// angular.element('[ng-controller=wqs_search_controller]').scope().start = startTime;
				// angular.element('[ng-controller=wqs_search_controller]').scope().end = endTime;
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;
                return deferred.promise;
            }
        }
    });

// dataServiceAjax for click  PREV
    wqs.factory('dataServiceAjaxPrev', function($http, $q, $filter){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        

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

			    
			    //var startTime = getUrlParameter('startTime');
			    var startTime = datepicker_from;
			    var startTime11 = datepicker_from;
			    //console.log(startTime);
			    startTime = new Date(startTime);
				startTime.setDate(startTime.getDate() - 1);
				startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');
				console.log('startTime '+startTime);
			    
			    //var endTime = getUrlParameter('endTime');
				var endTime = datepicker_to;
				console.log('endTime '+endTime);
			    
			    var endTime_plus1 = new Date(endTime);
			    endTime_plus1.setDate(endTime_plus1.getDate() + 2);
 				endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');
 				//console.log(endTime_plus1);

 				var endTime_plus11 = new Date(endTime);
			    endTime_plus11.setDate(endTime_plus11.getDate() + 1);
 				endTime_plus11 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');
 				//console.log('endTime_plus11 '+endTime_plus11);

			    var now = new Date(startTime);
				var daysOfYear = [];
				for (var d = new Date(startTime); d <= now; d.setDate(d.getDate() + 1)) {
				    daysOfYear.push( $filter('date')(new Date(d), 'yyyy-MM-dd') );
				}
				console.log('daysOfYear '+daysOfYear);

				// $("#datepicker-from-input").val(startTime);
	   //      	$("#datepicker-to-input").val(endTime_plus11);


                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime+'&endTime='+endTime+'&apiKey='+js_var.apikey}).
                 success(function(data, status, headers, config) {
                    deferred.resolve(data.sessions);
                }).
                error(function(data, status, headers, config) {
                    deferred.reject(status);
                });
				// angular.element('[ng-controller=wqs_search_controller]').scope().start = startTime;
				// angular.element('[ng-controller=wqs_search_controller]').scope().end = endTime;
				angular.element('[ng-controller=wqs_search_controller]').scope().timearray = daysOfYear;
                return deferred.promise;
            }
        }
    });

// dataServiceAjaxmore for infinite
    wqs.factory('dataServiceAjaxmore', function($http, $q, $filter){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        	
        	console.log('factory dataServiceAjaxmore');

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
			    console.log(startTime);
			    //startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');

			// load endtime
			    var length = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore.length;
				var endTime = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore[length-1];
				console.log(endTime);
			    
			    var endTime_plus1 = new Date(endTime);
			    endTime_plus1.setDate(endTime_plus1.getDate() + 1);
 				endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');

			// get
                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://api.rezdy.com/v1/availability?limit=100&offset=0&productCode='+productCode+'&startTime='+startTime+'&endTime='+endTime_plus1+'&apiKey='+js_var.apikey}).
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

	wqs.filter("asDate", function ($filter) {
	    return function (input) {
	        return $filter('date')(new Date(input), 'yyyy-MM-dd', 'UTC');
	    }
	});
 	wqs.filter("asTime", function ($filter) {
	    return function (input) {
	        return $filter('date')(new Date(input), 'hh:mm a', 'UTC');
	    }
	});
	wqs.filter("asDateTitle", function ($filter) {
	    return function (input) {
	        return $filter('date')(new Date(input), 'dd MMMM', 'UTC');
	    }
	});
	wqs.filter("trust", ['$sce', function($sce) {
	  return function(htmlCode){
	    return $sce.trustAsHtml(htmlCode);
	  }
	}]);


})();

