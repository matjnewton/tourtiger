(function () {
    "use strict";
    var wqs_xola = angular.module("wqs_atlas", ['ngAnimate','angular.filter','infinite-scroll']);


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
    wqs_xola.controller('wqs_search_controller', function ($scope, $http, $q, dataServiceXola, dataServiceXolaAjax, dataServiceXolaAjaxMore, dataServiceXolaAjaxMoreNext, dataServiceXolaAjaxMorePrev, $timeout, $filter, $window, GetUrlParameter, TimeArray, dataServiceAtlas, dataServiceAtlasAjax) {
    	//console.log('load wqs_search_controller');
	// load cpt product
	    var wqs_api_url = jQuery('#wqs_api_url').val();
	      $http.get(wqs_api_url)
	        .then(function(response){
	        	var cpt_product ={};
	        	cpt_product = response.data;
	            $scope.cpt_product = response.data;

	            // only for local
	            //$scope.message();
	            //$scope.SetGroupAvailableSeats();
	            //$scope.messageGroup();
	            console.log($scope);

	            return cpt_product;
	    });


	// var
		var data = {};
        var promises = [];
		var promises_click = [];
		$scope.search_tour_cat = {};

	//numpeople
		var people = GetUrlParameter.getURL('num_people');
		$scope.num_people = people;

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

		   			//atlas
		   			var start = GetUrlParameter.getURL('startTime');
		         	var finish = GetUrlParameter.getURL('endTime');
		         	var type_search = GetUrlParameter.getURL('type_search');
		         	if(type_search && type_search == 'one_date') {
		         		finish = start;
		         	}
		         	var start_finish = [];
					var fromStart = moment.utc(start);
					var toFinish = moment.utc(finish);
					start_finish = TimeArray.EnumerateDaysBetweenDates(fromStart, toFinish);
		         	//console.log(start);console.log(finish);
		         	//console.log(start_finish);
		         	var finish_plus1 = moment.utc(finish).add(1, 'days').format('YYYY-MM-DD');
					$scope.timearray = start_finish;
					// Loadmore
					var start_finish_more = [];
					start_finish_more.push( finish_plus1 );
					$scope.timearrayLoadmore = start_finish_more;



		         angular.forEach(api_products_xola, function(products, key) {

		         	var promiseObj_atlas = {};

		         	angular.forEach(start_finish, function(atlas_date, key) {

			            promiseObj_atlas=dataServiceAtlas.getData(products.id,atlas_date);
			            promiseObj_atlas.then(function(value, products) {
			            });

			        	promises.push(promiseObj_atlas);

		            });

		        });

			// promise api_availability
		        $q.all(promises).then(function(e){
		        	//console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					$scope.message();
					//$scope.SetGroupAvailableSeats();
		            //$scope.messageGroup();
		            console.log($scope);
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
			var reshours = hours/60;
			if ( hours ==1 ) {
				return '1';
			} else {
				return reshours;
			}
			return hours.toFixed(1);
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

		$scope.SetGroupAvailableSeats = function() {
			var sum = 0;
			var priceGroup = [];
			var AllSetGroup = [];
			angular.forEach($scope.timearray, function(timearrays) {
				angular.forEach($scope.cpt_product, function(cptproducts, key) {
					sum = 0;
					if(cptproducts.enable_group_product == true) {
						angular.forEach(cptproducts.productcode_group, function(array_xola_ids, key) {
							// console.log('------');
							// console.log($filter('asDate')(timearrays));
							// console.log(array_xola_ids);
							angular.forEach($scope.api_availability_xola, function(xolaproduct, keyy) {
								if(array_xola_ids == xolaproduct.productCode ){
									//console.log(xolaproduct[$filter('asDate')(timearrays)]);
									var seats_array = xolaproduct[$filter('asDate')(timearrays)];
									var departure = 0;
									if(seats_array){
										//console.log(Object.keys(seats_array)[0]);
										departure = $scope.parseFloat(Object.keys(seats_array)[0]);
									}

									sum += parseInt($scope.get_all_seat(seats_array));
									if(departure !=0) {
										priceGroup.push({ price: $scope.get_price(xolaproduct.productCode), departure: departure });
									}
									// priceGroup.push({ price: $scope.get_price(xolaproduct.productCode), departure: departure });
								}

							});
						});
					AllSetGroup.push({ cpt_id : cptproducts.id, time: $filter('asDate')(timearrays), sumseat: sum, price: priceGroup });
					}
				});
			});
			$scope.groupxola = AllSetGroup;
		}
		$scope.group_available_seat = function(cptproducts_id, timearrays){
			var available = 0;
			angular.forEach($scope.groupxola, function(groupxola, key) {
				if( $filter('asDate')(groupxola.time) == $filter('asDate')(timearrays) && groupxola.cpt_id == cptproducts_id ){
					available = groupxola.sumseat;
				}

			});
			return available;
		}
		$scope.SetGroupAvailableSeatsMore = function() {
			var sum = 0;
			var priceGroup = [];
			var AllSetGroup = [];
			angular.forEach($scope.timearrayLoadmore, function(timearrays) {
				angular.forEach($scope.cpt_product, function(cptproducts, key) {
					sum = 0;
					if(cptproducts.enable_group_product == true) {
						angular.forEach(cptproducts.productcode_group, function(array_xola_ids, key) {
							//console.log('more------');
							//console.log($filter('asDate')(timearrays));
							//console.log(array_xola_ids);
							angular.forEach($scope.api_availability_xola_more, function(xolaproduct, keyy) {
								if(array_xola_ids == xolaproduct.productCode ){
									//console.log(xolaproduct[$filter('asDate')(timearrays)]);
									var seats_array = xolaproduct[$filter('asDate')(timearrays)];
									var departure = 0;
									if(seats_array){
										//console.log(Object.keys(seats_array)[0]);
										departure = $scope.parseFloat(Object.keys(seats_array)[0]);
									}

									sum += parseInt($scope.get_all_seat(seats_array));
									if(departure !=0) {
										priceGroup.push({ price: $scope.get_price(xolaproduct.productCode), departure: departure });
									}
									// priceGroup.push({ price: $scope.get_price(xolaproduct.productCode), departure: departure });
								}

							});
						});
					AllSetGroup.push({ cpt_id : cptproducts.id, time: $filter('asDate')(timearrays), sumseat: sum, price: priceGroup });
					}
				});
			});
			$scope.groupxolaMore = AllSetGroup;
		}
		$scope.group_available_seatMore = function(cptproducts_id, timearrays){
			var available = 0;
			angular.forEach($scope.groupxolaMore, function(groupxola, key) {
				if( $filter('asDate')(groupxola.time) == $filter('asDate')(timearrays) && groupxola.cpt_id == cptproducts_id ){
					available = groupxola.sumseat;
				}

			});
			return available;
		}
		$scope.get_price = function(code) {
			var price = [];
			angular.forEach($scope.api_products_xola.products, function(products, key) {
				if(products.id == code){
					price.push({price: products.price, duration: products.duration });
				}
			});
			return price;
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
		$scope.available_seat = function(api_availability, people) {
			var is_available = {available:false,time:'0', people:'0'};
			var keepGoing = true;
			angular.forEach(api_availability, function(availability, key) {
				//console.log(availability);
				if(keepGoing) {
					if(availability !=0 && availability >=people) {
						is_available.available = true;
						is_available.people = availability;
						is_available.time = $scope.parseFloat(key);
						keepGoing = false;
					}
				}
			});
			return is_available;
		}
		$scope.messageGroup = function() {
			var row_seat_group = [];
			angular.forEach($scope.timearray, function(timearrays, key) {
				var yes = 0;
				angular.forEach($scope.cpt_product , function(cptproducts, keyss) {
					var group_available_seat = $scope.group_available_seat(cptproducts.id, timearrays);
					//console.log(group_available_seat);
					if( group_available_seat && group_available_seat>0  && $scope.search_tour_cat == 'all') {
						yes = 1;
					} else if( group_available_seat && group_available_seat>0 && $scope.search_tour_cat != 'all' && typeof cptproducts.term !== 'undefined' && cptproducts.term.term_id == $scope.search_tour_cat){
						yes = 1;
					} else {
						yes = 0;
					}
					if (yes == 1){
					 	row_seat_group.push(timearrays);
					 }
				});
			});
			$scope.timearray_seat_group = row_seat_group;
		}
		$scope.messageGroupMore = function() {
			var row_seat_group = [];
			angular.forEach($scope.timearrayLoadmore, function(timearrays, key) {
				var yes = 0;
				angular.forEach($scope.cpt_product , function(cptproducts, keyss) {
					var group_available_seat = $scope.group_available_seatMore(cptproducts.id, timearrays);
					//console.log(group_available_seat);
					if( group_available_seat && group_available_seat>0  && $scope.search_tour_cat == 'all') {
						yes = 1;
					} else if( group_available_seat && group_available_seat>0 && $scope.search_tour_cat != 'all' && typeof cptproducts.term !== 'undefined' && cptproducts.term.term_id == $scope.search_tour_cat){
						yes = 1;
					} else {
						yes = 0;
					}
					if (yes == 1){
					 	row_seat_group.push(timearrays);
					 }
				});
			});
			$scope.timearray_seat_group_more = row_seat_group;
		}
	    $scope.message = function() {
			var row_seat = [];
			angular.forEach($scope.timearray, function(timearrays, key) {
				angular.forEach($scope.api_products_xola.products, function(products, index) {
					angular.forEach($scope.api_availability_xola , function(api_availability, keys) {
						if ( $filter('asDate')(api_availability.atlas_date) == $filter('asDate')(timearrays) && products.id == api_availability.productCode && $scope.available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).available ) {
							var yes = 0;
							angular.forEach($scope.cpt_product , function(cptproducts, keyss) {
								if( (cptproducts.xola_id == products.id) && (cptproducts.xola_id != null) && $scope.search_tour_cat == 'all') {
									yes = 1;
								} else if( (cptproducts.xola_id == products.id) && (cptproducts.xola_id != null) && $scope.search_tour_cat != 'all' && typeof cptproducts.term !== 'undefined' && cptproducts.term.term_id == $scope.search_tour_cat){
									yes = 1;
								} else {
									yes = 0;
								}
								if (yes == 1){
								 	row_seat.push(timearrays);
								 }
							});
						}
					});
				});

			});
			$scope.timearray_seat = row_seat;
		}
	    $scope.messageLoadmore = function() {
			var row_seat_Loadmore = [];
			angular.forEach($scope.timearrayLoadmore, function(timearrays, key) {
				angular.forEach($scope.api_products_xola.products, function(products, index) {
					angular.forEach($scope.api_availability_xola_more , function(api_availability, keys) {

						if ( $filter('asDate')(api_availability.atlas_date) == $filter('asDate')(timearrays) && products.id == api_availability.productCode && $scope.available_seat( api_availability[api_availability.atlas_date], api_availability.query_people ).available ) {
							var yes = 0;
							angular.forEach($scope.cpt_product , function(cptproducts, keyss) {
								if( (cptproducts.xola_id == products.id) && (cptproducts.xola_id != null) && $scope.search_tour_cat == 'all') {
									yes = 1;
								} else if( (cptproducts.xola_id == products.id) && (cptproducts.xola_id != null) && $scope.search_tour_cat != 'all' && typeof cptproducts.term !== 'undefined' && cptproducts.term.term_id == $scope.search_tour_cat){
									yes = 1;
								} else {
									yes = 0;
								}
								if (yes == 1){
								 	row_seat_Loadmore.push(timearrays);
								 }
							});
						}
					});
				});

			});
			$scope.timearrayLoadmore_seat = row_seat_Loadmore;
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
			//console.log(e);
		    var data = {
				  seller: $(e.target).data('seller'),
				  version: $(e.target).data('version'),
				  experience: $(e.target).data('experience'),
				  term: $(e.target).data('term')
				};

			bookNowCabinById(data.experience, data.term);
		    console.log(data);
		};

    //+ click availability use factory dataServiceAjax.getData
    $scope.check_availability_xola= function() {
    	console.log('click check_availability_xola ATLAS');
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

		   			//atlas
		   			var numpeople_ajax = $("#num_people_val").val();
		   			if(numpeople_ajax) {
		   				$scope.num_people = numpeople_ajax;
		   			}
		   			var start = $("#datepicker-from-input").val();
		         	var finish = $("#datepicker-to-input").val();
				    var tour_cat_arr = $(".checkbox_term:checked").map(function() {
			            return $(this).val();
			        }).get();
			        //console.log(tour_cat_arr);
				    if (tour_cat_arr && tour_cat_arr != 0) {
				    	$scope.search_tour_cat = tour_cat_arr;
				    }else {
				    	$scope.search_tour_cat = 'all';
				    }

		         	var start_finish = [];
					var fromStart = moment.utc(start);
					var toFinish = moment.utc(finish);
					start_finish = TimeArray.EnumerateDaysBetweenDates(fromStart, toFinish);
		         	//console.log(start);console.log(finish);
		         	//console.log(start_finish);
		         	var finish_plus1 = moment.utc(finish).add(1, 'days').format('YYYY-MM-DD');
					$scope.timearray = start_finish;
					// Loadmore
					var start_finish_more = [];
					start_finish_more.push( finish_plus1 );
					$scope.timearrayLoadmore = start_finish_more;



		         angular.forEach(api_products_xola, function(products, key) {

		         	var promiseObj_atlas = {};

		         	angular.forEach(start_finish, function(atlas_date, key) {

			            promiseObj_atlas=dataServiceAtlasAjax.getData(products.id,atlas_date,$scope.num_people);
			            promiseObj_atlas.then(function(value, products) {
			            });

			        	promises_click.push(promiseObj_atlas);

		            });

		        });

			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					$scope.message();
					//$scope.SetGroupAvailableSeats();
		            //$scope.messageGroup();
		            console.log($scope);
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
		            var promiseObj_xola=dataServiceXolaAjaxMore.getData(products.id,$scope.num_people);
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
					$scope.messageLoadmore();
					//$scope.SetGroupAvailableSeatsMore();
					//$scope.messageGroupMore();
		        });

		}); //end then
		console.log($scope);
	};
	$scope.check_availability_atlas_more= function() {
    	console.log('load more atlas');
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

		   			//atlas
		   			var start = $scope.timearrayLoadmore[0];
		   			var lmlength = $scope.timearrayLoadmore.length;
		         	var finish = $scope.timearrayLoadmore[lmlength-1];

		         	var start_finish = [];
					var fromStart = moment.utc(start);
					var toFinish = moment.utc(finish);
					start_finish = TimeArray.EnumerateDaysBetweenDates(fromStart, toFinish);
		         	//console.log(start);console.log(finish);
		         	//console.log(start_finish);

		         angular.forEach(api_products_xola, function(products, key) {

		         	var promiseObj_atlas = {};

		         	angular.forEach(start_finish, function(atlas_date, key) {

			            promiseObj_atlas=dataServiceAtlas.getData(products.id,atlas_date);
			            promiseObj_atlas.then(function(value, products) {
			            });

			        	promises_click.push(promiseObj_atlas);

		            });

		        });
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	//console.log(e);
		          $scope.api_availability_xola_more = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					$scope.messageLoadmore();
					//$scope.SetGroupAvailableSeatsMore();
					//$scope.messageGroupMore();
		        });

		}); //end then
		console.log($scope);
	};
	//end click check_availability_xola

    //+ next xola click availability use factory dataServiceAjaxNext.getData
		$scope.check_availability_angular_next_xola= function() {
		    console.log('click next atlas');
		    var promises_click = [];

		    $scope.loading = true;

			    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var_atlas.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};

		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;

		   	}).then(function(api_products_xola){

		   			//atlas
		   			var numpeople_ajax = $("#num_people_val").val();
		   			if(numpeople_ajax) {
		   				$scope.num_people = numpeople_ajax;
		   			}
		   			var start = $("#datepicker-from-input").val();
		   			var start_plus1 = moment.utc(start).add(1, 'days').format('YYYY-MM-DD');
		   			start = start_plus1;
		         	var finish = start;
				    var tour_cat_arr = $(".checkbox_term:checked").map(function() {
			            return $(this).val();
			        }).get();
			        //console.log(tour_cat_arr);
				    if (tour_cat_arr && tour_cat_arr != 0) {
				    	$scope.search_tour_cat = tour_cat_arr;
				    }else {
				    	$scope.search_tour_cat = 'all';
				    }

		         	var start_finish = [];
					var fromStart = moment.utc(start);
					var toFinish = moment.utc(finish);
					start_finish = TimeArray.EnumerateDaysBetweenDates(fromStart, toFinish);
		         	//console.log(start);console.log(finish);
		         	//console.log(start_finish);
		         	var finish_plus1 = moment.utc(finish).add(1, 'days').format('YYYY-MM-DD');
					$scope.timearray = start_finish;
					// Loadmore
					var start_finish_more = [];
					start_finish_more.push( finish_plus1 );
					$scope.timearrayLoadmore = start_finish_more;



		         angular.forEach(api_products_xola, function(products, key) {

		         	var promiseObj_atlas = {};

		         	angular.forEach(start_finish, function(atlas_date, key) {

			            promiseObj_atlas=dataServiceAtlasAjax.getData(products.id,atlas_date,$scope.num_people);
			            promiseObj_atlas.then(function(value, products) {
			            });

			        	promises_click.push(promiseObj_atlas);

		            });

		        });

			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					$scope.message();
					//$scope.SetGroupAvailableSeats();
		            //$scope.messageGroup();
		            console.log($scope);

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

			    	$http.get('https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences?_format=json&seller='+js_var_atlas.userid_key+'')
			// load api_products_xola
		    .then(function(response){
		        var api_products_xola = {};
		        $scope.api_products_xola = {};

		        api_products_xola = response.data.data;
		        $scope.api_products_xola.products = api_products_xola;
		        return api_products_xola;
		   	// }).then(function(api_products_xola){
		    //      angular.forEach(api_products_xola, function(products, key) {
		    //         var promiseObj_xola=dataServiceXolaAjaxMorePrev.getData(products.id);
		    //         promiseObj_xola.then(function(value, products) {

		    //         });

		    //         promises_click.push(promiseObj_xola);
		    //     });
		   	}).then(function(api_products_xola){

		   			//atlas
		   			var numpeople_ajax = $("#num_people_val").val();
		   			if(numpeople_ajax) {
		   				$scope.num_people = numpeople_ajax;
		   			}
		   			var start = $("#datepicker-from-input").val();
		   			var start_minus1 = moment.utc(start).subtract(1, 'days').format('YYYY-MM-DD');
		   			start = start_minus1;
		         	var finish = start;
				    var tour_cat_arr = $(".checkbox_term:checked").map(function() {
			            return $(this).val();
			        }).get();
			        //console.log(tour_cat_arr);
				    if (tour_cat_arr && tour_cat_arr != 0) {
				    	$scope.search_tour_cat = tour_cat_arr;
				    }else {
				    	$scope.search_tour_cat = 'all';
				    }

		         	var start_finish = [];
					var fromStart = moment.utc(start);
					var toFinish = moment.utc(finish);
					start_finish = TimeArray.EnumerateDaysBetweenDates(fromStart, toFinish);
		         	//console.log(start);console.log(finish);
		         	//console.log(start_finish);
		         	var finish_plus1 = moment.utc(finish).add(1, 'days').format('YYYY-MM-DD');
					$scope.timearray = start_finish;
					// Loadmore
					var start_finish_more = [];
					start_finish_more.push( finish_plus1 );
					$scope.timearrayLoadmore = start_finish_more;



		         angular.forEach(api_products_xola, function(products, key) {

		         	var promiseObj_atlas = {};

		         	angular.forEach(start_finish, function(atlas_date, key) {

			            promiseObj_atlas=dataServiceAtlasAjax.getData(products.id,atlas_date,$scope.num_people);
			            promiseObj_atlas.then(function(value, products) {
			            });

			        	promises_click.push(promiseObj_atlas);

		            });

		        });
			// promise api_availability

		        $q.all(promises_click).then(function(e){
		        	console.log(e);
		          $scope.api_availability_xola = e;
					$timeout(function(){
			            $scope.loading = false;
			        },2000);
					$scope.message();
					//$scope.SetGroupAvailableSeats();
		            //$scope.messageGroup();
		            console.log($scope);

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

			        $scope.check_availability_atlas_more(); // check available

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
    wqs_xola.factory('dataServiceAtlas', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,atlas_date){
                var deferred = $q.defer();

			    var search_tour_cat = GetUrlParameter.getURL('search_tour_cat');
			    var search_tour_cat_obj = [];
			    //console.log('search_tour_cat');console.log(search_tour_cat);

			    if (search_tour_cat) {
			    	search_tour_cat_obj.push(search_tour_cat);
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = search_tour_cat_obj;
			    }else {
			    	angular.element('[ng-controller=wqs_search_controller]').scope().search_tour_cat = 'all';
			    }



				// numpeople
				var num_people = GetUrlParameter.getURL('num_people');

				// get
				//http://customxolareports.azurewebsites.net/northwood/ziplineavailability/{experienceid}/{date yyyy-MM-dd}/{guests}
                // $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).



	                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/http://customxolareports.azurewebsites.net/northwood/ziplineavailability/'+productCode+'/'+atlas_date+'/'+num_people+''}).
	                 success(function(data, status, headers, config) {
	                 	var code = {productCode:productCode};
	                 	var thistime = {atlas_date:atlas_date};
	                 	var query_people = {query_people:num_people};
	                 	data = angular.extend({}, data, code);
	                 	data = angular.extend({}, data, thistime);
	                 	data = angular.extend({}, data, query_people);
	                    deferred.resolve(data);
	                }).
	                error(function(data, status, headers, config) {
	                    deferred.reject(status);
	                });

                return deferred.promise;
            }

        }
    });

    wqs_xola.factory('dataServiceAtlasAjax', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,atlas_date,num_people){
                var deferred = $q.defer();

	                $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/http://customxolareports.azurewebsites.net/northwood/ziplineavailability/'+productCode+'/'+atlas_date+'/'+num_people+''}).
	                 success(function(data, status, headers, config) {
	                 	var code = {productCode:productCode};
	                 	var thistime = {atlas_date:atlas_date};
	                 	var query_people = {query_people:num_people};
	                 	data = angular.extend({}, data, code);
	                 	data = angular.extend({}, data, thistime);
	                 	data = angular.extend({}, data, query_people);
	                    deferred.resolve(data);
	                }).
	                error(function(data, status, headers, config) {
	                    deferred.reject(status);
	                });

                return deferred.promise;
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
				//console.log(daysOfYear);

				// Loadmore
				var daysOfYearMore = [];
				daysOfYearMore.push( endTime_plus1 );
				angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;

				// numpeople
				var num_people = GetUrlParameter.getURL('num_people');

				// get
				//http://customxolareports.azurewebsites.net/northwood/ziplineavailability/{experienceid}/{date yyyy-MM-dd}/{guests}
                // $http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).



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

//+ Xola dataServiceAjax for click Xola
    wqs_xola.factory('dataServiceXolaAjax', function($http, $q, $filter, GetUrlParameter, TimeArray){
        return{
            getData: function(productCode,startTime,endTime){
                var deferred = $q.defer();
        	//console.log('dataServiceXolaAjax 02');

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

			//set scrollindex
			angular.element('[ng-controller=wqs_search_controller]').scope().scrollindex = 1;

			// load timearray for Loadmore
			var daysOfYearMore = [];
			daysOfYearMore.push( endTime_plus1 );
			angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore = daysOfYearMore;

			// numpeople
			var num_people = $("#num_people_val").val();
			angular.element('[ng-controller=wqs_search_controller]').scope().num_people = num_people;

            	$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/http://customxolareports.azurewebsites.net/northwood/ziplineavailability/'+productCode+'/'+startTime+'/'+num_people+''}).
                //$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).
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
            getData: function(productCode,startTime,endTime,num_people){
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
			    //console.log('startTime');console.log(startTime);
			    //startTime = $filter('date')(new Date(startTime), 'yyyy-MM-dd');

			// load endtime
			    var length = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore.length;
				var endTime = angular.element('[ng-controller=wqs_search_controller]').scope().timearrayLoadmore[length-1];
				//console.log('endTime');console.log(endTime);

			  //   var endTime_plus1 = new Date(endTime);
			  //   endTime_plus1.setDate(endTime_plus1.getDate() + 1);
 				// endTime_plus1 = $filter('date')(new Date(endTime_plus1), 'yyyy-MM-dd');
 				var endTime_plus1 = moment.utc(endTime).add(1, 'days').format('YYYY-MM-DD');

			// get
				$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/http://customxolareports.azurewebsites.net/northwood/ziplineavailability/'+productCode+'/'+startTime+'/'+num_people+''}).
                //$http({method: 'GET', url: 'https://cors-anywhere.herokuapp.com/https://silent.xola.com/api/experiences/'+productCode+'/availability?_format=json&start='+startTime+'&end='+endTime+''}).
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
