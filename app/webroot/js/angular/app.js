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


shopping.run(function($rootScope,$cookies,$location){
	
	$rootScope.cartCount = function(){
		var cookievar;
		if($cookies.getObject('cart')){
			 cookievar = $cookies.getObject('cart').items.length 
		}else{ 
			 cookievar = 0;
		}
		if(cookievar == 0){
			$cookies.remove('cart');
		}
		return cookievar;
	}

	$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
          $rootScope.title = current.$$route.title;
		  $rootScope.path = current.$$route.originalPath; // Make menu tab active on each
		  $rootScope.isCollapsed = true;
    });
	
});