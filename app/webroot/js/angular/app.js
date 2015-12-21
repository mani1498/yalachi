var shopping = angular.module('shopping', ['ngRoute','ngResource','ngCookies','angular.filter','simplePagination','ui.bootstrap']);

shopping.config(function($routeProvider){
    $routeProvider
        .when('/',{title:'Home Page',templateUrl: 'app/webroot/js/angular/page/home.html',controller:'homeController'})
        .when('/about',{title:'About Us',templateUrl: 'app/webroot/js/angular/page/pages.html',controller:'aboutController'})
        .when('/contact',{title:'Contact Us',templateUrl: 'app/webroot/js/angular/page/pages.html',controller:'contactController'})
		.when('/catalog',{title:'Catalog Page',templateUrl: 'app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
        .when('/productdetail/:id',{title:'Product Detail Page',templateUrl: 'app/webroot/js/angular/page/productdetail.html',controller:'productdetailController'})
		.when('/cart',{title:'Cart Page',templateUrl: 'app/webroot/js/angular/page/cart.html',controller:'cartController'})
    
});

shopping.settings = {host:"http://report.com",page:"/api/"};


shopping.run(function($rootScope,$cookies,$location,$http){
	
	$rootScope.cookieCartItems = $cookies.getObject('cart') || 0;
	
	$rootScope.allProducts = '{}';
	$rootScope.loader = true;
	$http({method: 'GET',url: 'admin/categories/all.json',cache: false
	 }).success(function (data, status, headers, config) {
        console.log('successful');
	    $rootScope.allProducts = data.Category;
	    $rootScope.loader = false;
	 }).error(function (data, status, headers, config) {
	   $rootScope.loader = false;
	}); 
	
	$rootScope.getTotalQty = function(){
		var totalQty = 0;
		var cookievar;
		if($cookies.getObject('cart')){
			for(var i=0; i<$cookies.getObject('cart').items.length ; i++){
				var items = $cookies.getObject('cart').items[i];
				totalQty += parseInt(items.qty);
			}
			cookievar = totalQty;
		}else{ 
			cookievar = 0;
		}
		if(cookievar == 0){
			$cookies.remove('cart');
		}
		return cookievar;
	}
	
	$rootScope.getTotalSum = function(){
		var totalSum = 0;
		var cookievar;
		if($cookies.getObject('cart')){
			for(var i=0; i<$cookies.getObject('cart').items.length; i++){
				var items = $cookies.getObject('cart').items[i];
				totalSum += parseInt(items.qty) * parseFloat(items.price).toFixed(2);
			}
			cookievar = parseFloat($rootScope.roundOfValue(totalSum)).toFixed(2);
		}else{ 
			cookievar = '0.00';
		}
		if(cookievar == '0.00'){
			$cookies.remove('cart');
		}
		return cookievar;
	}
	
	$rootScope.buttonText = function(id,index){
		var buttonText;
		if($cookies.getObject('cart')){
			for(var i=0; i<$cookies.getObject('cart').items.length ; i++){
				var item_id = $cookies.getObject('cart').items[i].id;
				var item_qty = $cookies.getObject('cart').items[i].qty;
				if(item_id == id && item_qty >= 1){
					return 'ADD MORE';
				}
			}
			return 'ADD TO CART';
		}else{ 
			return 'ADD TO CART';
		}

	}
	 

	$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
          $rootScope.title = current.$$route.title;
		  $rootScope.path = current.$$route.originalPath; // Make menu tab active on each
		  $rootScope.isCollapsed = true;
    });
	
	$rootScope.roundOfValue = function(value){
	 return Math.round(value * 100) / 100;	
	}
	
});