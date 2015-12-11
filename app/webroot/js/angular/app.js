var shopping = angular.module('shopping', ['ngRoute','ngResource','ngCookies','angular.filter','simplePagination']);

shopping.config(function($routeProvider){
    $routeProvider
        .when('/',{templateUrl: '/app/webroot/js/angular/page/home.html',controller:'homeController'})
        .when('/about',{templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'aboutController'})
        .when('/contact',{templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'contactController'})
		.when('/catalog',{templateUrl: '/app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
        .when('/productdetail/:id',{templateUrl: '/app/webroot/js/angular/page/productdetail.html',controller:'productdetailController'})
		.when('/cart',{templateUrl: '/app/webroot/js/angular/page/cart.html',controller:'cartController'})
    
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
	
});