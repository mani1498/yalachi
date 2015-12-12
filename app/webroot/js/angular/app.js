var shopping = angular.module('shopping', ['ngRoute','ngResource','angular.filter','simplePagination','ngCookies','simpleAuth','shoppingFlash','shoppingUser','shoppingCart']);

shopping.run(function($rootScope,$cookies,$location) {
    $rootScope.$on('shopservice.stored', function (event, data) {
        console.log("shopservice.stored", data);
    });
	$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        $rootScope.title = current.$$route.title;
		$rootScope.path = current.$$route.originalPath; // Make menu tab active on each
		
    });
	
	
});

shopping.config(function($routeProvider,$httpProvider){
    $routeProvider
        .when('/',{title:'Yalachi Shopping', templateUrl: '/app/webroot/js/angular/page/home.html',controller:'homeController'})
        .when('/about',{title:'About Yalachi Shopping', templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'aboutController'})
        .when('/contact',{title:'Contact Yalachi Shopping', templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'contactController'})
		.when('/catalog',{title:'Yalachi Category', templateUrl: '/app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
        .when('/productdetail/:id',{title:'Yalachi Product', templateUrl: '/app/webroot/js/angular/page/productdetail.html',controller:'productdetailController'})
		.when('/cart',{title:'Yalachi Cart', templateUrl: '/app/webroot/js/angular/page/cart.html',controller:'cartController'})
		.when('/login',{title:'Login Yalachi', templateUrl: '/app/webroot/js/angular/page/login.html',controller:'loginController', controllerAs: 'vm'})
		.when('/register',{title:'Login Yalachi', templateUrl: '/app/webroot/js/angular/page/register.html',controller:'registrationController', controllerAs: 'vm'})
	
	$httpProvider.interceptors.push('httpRequestInterceptor');

});


// Http headers dynamically
shopping.factory('httpRequestInterceptor', function () {
  return {
    request: function (config) {
      config.headers['Authorization'] = 'Basic d2VudHdvcnRobWFuOkNoYW5nZV9tZQ==';
      config.headers['Accept'] = 'application/json;odata=verbose';
      return config;
    }
  };
});

shopping.settings = {host:"http://report.com",page:"/api/"};

