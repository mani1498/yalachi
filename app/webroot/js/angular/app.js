var shopping = angular.module('shopping', ['ngRoute','ngResource','ngCookies','angular.filter','simplePagination','ui.bootstrap','ngAside','ngTouch','shoppingFlash','simpleAuth','shoppingUserAuth']);

shopping.config(function($routeProvider){console.log('trr');
    $routeProvider
        .when('/',{title:'Home Page',templateUrl: 'app/webroot/js/angular/page/home.html',controller:'homeController'})
        .when('/about',{title:'About Us',templateUrl: 'app/webroot/js/angular/page/pages.html',controller:'aboutController'})
        .when('/contact',{title:'Contact Us',templateUrl: 'app/webroot/js/angular/page/pages.html',controller:'contactController'})
		.when('/search/:id',{title:'Search Page',templateUrl: 'app/webroot/js/angular/page/catalog.html',controller:'searchController'})
		.when('/catalog',{title:'Catalog Page',templateUrl: 'app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
		.when('/catalog/:title',{title:'Catalog Page',templateUrl: 'app/webroot/js/angular/page/catalog.html',controller:'catalogController'})
        .when('/productdetail/:id',{title:'Product Detail Page',templateUrl: 'app/webroot/js/angular/page/productdetail.html',controller:'productdetailController'})
		.when('/cart',{title:'Cart Page',templateUrl: 'app/webroot/js/angular/page/cart.html',controller:'cartController'})
		.when('/login',{title:'Login Yalachi', templateUrl: 'app/webroot/js/angular/page/login.html',controller:'loginController', controllerAs: 'vm'})
		.when('/register',{title:'Login Yalachi', templateUrl: 'app/webroot/js/angular/page/register.html',controller:'registrationController', controllerAs: 'vm'})
		.when('/myaccount',{title:'Yalachi - My Account', templateUrl: 'app/webroot/js/angular/page/myaccount.html',controller:'myaccountController', controllerAs: 'vm'})
    
});

shopping.settings = {host:"http://report.com",page:"/api/"};


shopping.run(function($rootScope,$cookies,$location,$http,$routeParams){
	
	/****   Hide search and other functionality on login/registration process  *****/
	
	$rootScope.navPath = function(){
		if($rootScope.path=='/login' || $rootScope.path=='/register'){
			return true;
		}
	};
	$rootScope.cookieCartItems = $cookies.getObject('cart') || 0;
	
	$rootScope.allProducts = '{}';
	$rootScope.loader = true;
	$http({method: 'GET',url: 'admin/categories/all.json',cache: false
	 }).success(function (data, status, headers, config) {
	    $rootScope.allProducts = data.Category;
		$rootScope.allProductsCopy = data.Category;
		$rootScope.categoryMenu = $rootScope.forSortingMenu($rootScope.allProducts);
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
	    $rootScope.loader = false;
	 }).error(function (data, status, headers, config) {
	   $rootScope.loader = false;
	}); 
	console.log($rootScope);
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
		  console.log('routeChangeSuccess');
          $rootScope.title = current.$$route.title;
		  $rootScope.path = current.$$route.originalPath; // Make menu tab active on each
		  $rootScope.isCollapsed = true;
    });
	
	$rootScope.searchClick = function(val){
			console.log('searchClick');
			//console.log('search/'+val);
			$location.path('search/'+val);
			//console.log($rootScope);
	}
	
	$rootScope.roundOfValue = function(value){
	 return Math.round(value * 100) / 100;	
	}
	
	
	$rootScope.forSortingMenu = function(items){
		//console.log(items);
	   var unique = [],blocked = [],allCategory = {},vendorUnique = [],vendorBlock = [];
       unique.push(items[0].Category.title);
	   blocked.push(items[0].Category.id);
	   
	   vendorUnique.push(items[0].Product.vendor);
	   vendorBlock.push(items[0].Product.id);
	   
	   for (var i = 1; i < items.length; i++) {
		   //console.log(blocked.indexOf(items[i].Category.id))
		if (blocked.indexOf(items[i].Category.id) <= -1) {
		 	unique.push(items[i].Category.title);
		 	blocked.push(items[i].Category.id);
		}
		// home page category lists
		allCategory[items[i].Category.title] = allCategory[items[i].Category.title] || [];
    	allCategory[items[i].Category.title].push( items[i] );
		
		//allCategory.push(unique[i].items[i]);
			if (vendorBlock.indexOf(items[i].Product.id) <= -1) {
			 	vendorUnique.push(items[i].Product.title);
			 	vendorBlock.push(items[i].Product.id);
			}
	   }
	   console.log(vendorUnique);
	   $rootScope.homeCategory= allCategory;
	   $rootScope.vendorList= vendorUnique;
	   
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
	
});