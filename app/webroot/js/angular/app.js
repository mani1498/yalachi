var shopping = angular.module('shopping', ['ngRoute','ngResource','angular.filter','simplePagination']);

shopping.config(function($routeProvider){
    $routeProvider
        .when('/',{templateUrl: '/app/webroot/js/angular/page/home.html',controller:'homeController'})
        .when('/about',{templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'aboutController'})
        .when('/contact',{templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'contactController'})
		.when('/catalog',{templateUrl: '/app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
        .when('/productdetail/:id',{templateUrl: '/app/webroot/js/angular/page/productdetail.html',controller:'productdetailController'})
    
});

shopping.settings = {host:"http://report.com",page:"/api/"};

