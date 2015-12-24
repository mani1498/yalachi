var shopping = angular.module('shopping', ['ngRoute','ngResource','angular.filter','ngCookies','simpleAuth','shoppingFlash','shoppingUser','shoppingCart','ui.bootstrap', 'ngAside']);
shopping.config(function($routeProvider,$httpProvider,$compileProvider){
    $routeProvider
        .when('/',{title:'Yalachi Shopping', templateUrl: '/app/webroot/js/angular/page/home.html',controller:'homeController'})
        .when('/about',{title:'About Yalachi Shopping', templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'aboutController'})
        .when('/contact',{title:'Contact Yalachi Shopping', templateUrl: '/app/webroot/js/angular/page/pages.html',controller:'contactController'})
		.when('/catalog',{title:'Yalachi Category', templateUrl: '/app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
        .when('/productdetail/:id',{title:'Yalachi Product', templateUrl: '/app/webroot/js/angular/page/productdetail.html',controller:'productdetailController'})
		.when('/cart',{title:'Yalachi Cart', templateUrl: '/app/webroot/js/angular/page/cart.html',controller:'cartController'})
		.when('/login',{title:'Login Yalachi', templateUrl: '/app/webroot/js/angular/page/login.html',controller:'loginController', controllerAs: 'vm'})
		.when('/register',{title:'Login Yalachi', templateUrl: '/app/webroot/js/angular/page/register.html',controller:'registrationController', controllerAs: 'vm'})
		.when('/catalog/:title',{title:'Yalachi Category', templateUrl: '/app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
	
	// check in factory.js
	//$httpProvider.interceptors.push('httpRequestInterceptor');
});
shopping.run(function($rootScope,$cookies,$location,$window,$http,$routeParams) {
	$rootScope.dataLoaded = false;
    $rootScope.$on('shopservice.stored', function (event, data) {
        console.log("shopservice.stored", data);
    });
	$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        $rootScope.title = current.$$route.title;
		$rootScope.path = current.$$route.originalPath; // Make menu tab active on each
		//console.log($rootScope.path);
		//$rootScope.isCollapsed = true;
		$rootScope.navPath = function(){
			if($rootScope.path=='/login' || $rootScope.path=='/register'){
				return true;
			}
		};
    });
	console.log($routeParams.title);
	//console.log($rootScope.path);return false;
	$rootScope.allProducts = '{}';
	var req =  { method: 'GET',url: '/admin/categories/all.json',cache: false}
		$http(req).success(function (data, status, headers, config) {
			console.log('successful in Service');
			$rootScope.allProducts = data.Category;
			$rootScope.forSorting = data.Category;
			$rootScope.forSortingNew = $rootScope.forSortingMenu($rootScope.allProducts);
			console.log($rootScope.forSortingNew);
			
			$routeParams.title = $routeParams.title || 'all';
			$rootScope.catalogTitle = "CATALOG ALL PRODUCTS";
			$rootScope.catalogProductCount = $rootScope.allProducts.length;
			
			$rootScope.allProductsCopy = data.Category;
			if($routeParams.title != 'all'){
				 console.log('B successful');
				 var output = [];
				 var groupCollect = $rootScope.sortByTitle($rootScope.allProducts,$routeParams.title);
				 angular.forEach(groupCollect, function(items) {
					 if(items.Category.title == $routeParams.title){
					   console.log(items.Category.title);
					   output.push(items); 
					 }
				 });
				 console.log(output);
				 $rootScope.catalogTitle = $routeParams.title;
				 $rootScope.catalogProductCount = output.length;
				 $rootScope.allProducts = output;
				
			}
			$rootScope.dataLoaded = true;
		}).error(function (data, status, headers, config) {
		  	console.log('failure');
		  	console.log("Data: " + data);
		  	console.log("Status: " + status);
			$rootScope.allProducts = data.status;
		});
		
	$rootScope.forSortingMenu = function(items){
		var unique = [],blocked = [];
			unique.push(items[0]);
			blocked.push(items[0].Category.id);
			
			for (var i = 1; i < items.length; i++) {
				if (blocked.indexOf(items[i].Category.id) <= -1) {
					unique.push(items[i]);
					blocked.push(items[i].Category.id);
				}
			}
		
		return unique;
    }
	
	$rootScope.sortByTitle = function(items,value){
	   var sortByTitle = [];
	   for (var i=0; i<items.length; i++) {
		    if (items[i].Category.title == value) {
				 sortByTitle = items;
			}
	   }
	   console.log(sortByTitle);
	   return sortByTitle;
    }
		
	var val = $window.innerWidth < 480 ? 'sidebar' : '';
	$rootScope.popupHeight = val;
});

shopping.filter('unique', function() {

 return function(collection, keyname) {
      var output = [], 
          keys = [];	
      angular.forEach(collection, function(item) {
		  console.log(item)
          var key = item[keyname];
          if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
          }
      });
      return output;
   };
})





shopping.settings = {host:"http://report.com",page:"/api/"};
