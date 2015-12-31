//homeController 
shopping.controller("homeController", ["$scope","$log","$timeout","$http",'$rootScope', function ($scope, $log, $timeout, $http,$rootScope) {
    $scope.title = "Home Page";
	console.log('asfadsddf sdfasdf a');
	console.log($rootScope);
	  $scope.myInterval = 3500;
	  $scope.noWrapSlides = false;
	  var slides = $scope.slides = [];
	  console.log($scope);
	  $scope.addSlide = function(i) {
		var newWidth = 600 + slides.length + 1;
		slides.push({
		  image: '/app/webroot/img/slider/carausol' + i,
		 /* text: ['More','Extra','Lots of','Surplus'][slides.length % 4] + ' ' +
			['Cats', 'Kittys', 'Felines', 'Cutes'][slides.length % 4]*/
		});
	  };
	  for (var i=1; i<4; i++) {
		$scope.addSlide(i);
	  }
	  //$scope.homeCategory=$rootScope.homeCategory
	  
	  
}]);

//aboutController
shopping.controller('aboutController',['$scope',function($scope){
    //$scope.title = "About US";
    $scope.description = "This is Testing content";
}]);

//contactController
shopping.controller('contactController',['$scope',function($scope){
    //$scope.title = "Contact";
    $scope.description = "This is Testing content";
    $scope.phone = "+1 23-234-2135";
}]);


//catalogController
shopping.controller('catalogController',['$scope','$http','Pagination','$cookies','cartService','$location','$rootScope','$routeParams','$filter',function($scope,$http,Pagination,$cookies,cartService,$location,$rootScope,$routeParams,$filter){
	console.log('catalogController');
	 var title = $routeParams.title || 'all';
	 /*if(title == 'search'){  $location.path( '/catalog/search/notfound' ); return false; }*/
	 if(title){
		  if(typeof($rootScope.allProductsCopy)!== 'undefined'){
			   var output = [];
			   var titleText,catlogCount;
			   if(title == 'all'){
				output  = $rootScope.allProductsCopy;
				titleText = "CATALOG ALL PRODUCTS";
				catlogCount  = output.length;
			   }else{
				    collection=$rootScope.allProductsCopy;
					angular.forEach(collection, function(items) {
						  if(items.Category.title == title)
						  output.push(items);   
				   });
				   titleText = title;
				   catlogCount  = output.length;
			   }
			  $rootScope.allProducts = output;  
			  $rootScope.catalogTitle = titleText;
			  $rootScope.catalogProductCount = catlogCount;
		  }
	  }
	 $scope.searchClick = function(searchItems){
		 if(searchItems){
		 // $rootScope.searchItemsflag = 'true';
		  console.log('searchController A');
			  if(typeof($rootScope.allProductsCopy) !== 'undefined'){
				   var output = [];
				   var productTitle;
				   var titleText,catlogCount;
				   console.log('searchController B');
				   if(searchItems != ''){
						collection=$rootScope.allProductsCopy;
						console.log(collection.length);
						console.log(searchItems);
						output =  $filter('filter')(collection,{Product:{title:searchItems}},false);
					    titleText = searchItems;
					    catlogCount  = output.length;
				   }else{
					   titleText = 'SEARCH EMPTY NOT FOUND';
					   catlogCount  = 0
				  }
				  $rootScope.allProducts = output;  
				  $rootScope.catalogTitle = "Search Keyword: "+'"'+titleText+'"';
				  $rootScope.catalogProductCount = catlogCount;
			  }
	  	}
	 }
	 $scope.cartItem = cartService.getCartItems();
	 $scope.addCart = function(a,b,c,d,e,eve){ //a - id b - title c - price  d - qty - e - img
     	$scope.addData = {id: a, title:b, price:c, qty:d, img:e};
	 	eve.target.innerHTML = 'ADD MORE';
		cartService.addCart($scope.addData);
	 }
	 
}]);

//searchController
shopping.controller('searchController',['$scope','$http','$cookies','cartService','$location','$rootScope','$routeParams','$filter',
function($scope,$http,$cookies,cartService,$location,$rootScope,$routeParams,$filter){
	
	
	 console.log('searchController');
	 $scope.id = $routeParams.id || '';
	 $scope.searchClick = function(){
		console.log('s');
		var searchItems = $scope.id;
		console.log(searchItems);
		 if(searchItems){
		  console.log(searchItems);
			  if(typeof($rootScope.allProductsCopy) !== 'undefined'){
				   var output = [];
				   var productTitle;
				   var titleText,catlogCount;
				   console.log('searchController B');
				   if(searchItems != ''){
						collection=$rootScope.allProductsCopy;
						console.log(collection.length);
						console.log(searchItems);
						output =  $filter('filter')(collection,{Product:{title:searchItems}},false);
					    titleText = searchItems;
					    catlogCount  = output.length;
				   }else{
					   titleText = 'SEARCH EMPTY NOT FOUND';
					   catlogCount  = 0
				  }
				  $rootScope.allProducts = output; 
				  $rootScope.search = ''; 
				  $rootScope.catalogTitle = "Search Keyword: "+'"'+titleText+'"';
				  $rootScope.catalogProductCount = catlogCount;
			  }
	  	}
	 }();
	
	
}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$routeParams','$http','$cookies','cartService',function($scope, $routeParams, $http,$cookies,cartService){

	$scope.loader = true;
    $scope.id = $routeParams.id;
    $scope.details = {};
	var req =  { method: 'GET',url: 'products/details/'+ $scope.id+'.json'}
	$http(req).success(function (result, status, headers, config) {
		$scope.details = result.Product;
		$scope.loader = false;
	})
	.error(function (result, status, headers, config) {
		console.log("Data: " + result);
		console.log("Status: " + status);
		$scope.loader = false;
	})
	
	 $scope.id = $routeParams.id;    
	 $scope.cartItem = cartService.getCartItems();
	 //$scope.cartSingleItem = $filter('getById')($scope.cartItem, $scope.id);
	
	
	 $scope.addCart = function(a,b,c,d,e){ //a - id b - title c - price  d - qty - e - img
     	$scope.addData = {id: a, title:b, price:c, qty:d, img:e};
		cartService.addCart($scope.addData);
	 }
	 
	 $scope.addMoreQty = function(itm,index){
		 cartService.addMoreQty(itm,index);
	 }
	 
	 $scope.removeMoreQty = function(itm,index){
		 cartService.removeMoreQty(itm,index);
	 }
        
}]);

shopping.controller('cartController',['$scope','$routeParams','$http','$cookies','$filter','$rootScope','$log','cartService',function($scope, $routeParams, $http,$cookies,$filter,$rootScope,$log,cartService){
	
	 $scope.cartItem = cartService.getCartItems();
	 
	 $scope.addCart = function(a,b,c,d,e){ //a - id b - title c - price  d - qty - e - img
     	$scope.addData = {id: a, title:b, price:c, qty:d, img:e};
		cartService.addCart($scope.addData);
	 }
	 
	 $scope.updateCart = function(a,b){ // a - qty_sum  b - toal_sum
		 cartService.updateCart(a,b);
	 }
	
	 $scope.removeCart = function(a){ // a - remove id;
		 cartService.removeCart(a);
	 }
	 $scope.roundOfValue = function(a){ // a - row sum of price and qty
		  return cartService.roundOfValue(a);
	 }
	 $scope.cartTotalSum = function(){
		 return cartService.cartTotalSum();
	 }
	
	$scope.cartTotalQty = function(){
		return cartService.cartTotalQty();
	 }
	 
	 $scope.addMoreQty = function(itm,index){
		 cartService.addMoreQty(itm,index);
	 }
	 
	 $scope.removeMoreQty = function(itm,index){
		 cartService.removeMoreQty(itm,index);
	 }
}]);


shopping.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});


shopping.filter('getById', function() {
  return function(input, id) {
    var i=0, len=input.length;
    for (; i<len; i++) {
      if (+input[i].id == +id) {
        return input[i];
      }
    }
    return null;
  }
});

shopping.filter('sortByDetails',function($filter){
    return function(items,value){
			 var filtered = [];
			 if(typeof value === 'undefined' ||  value == ''){
				 return items;
			 }
			 for (var i=0; i<items.length; i++) {
				 items[i].Product.price = Number(items[i].Product.price);
			 }
		 return $filter('orderBy')(items,value,false);
    }
});

shopping.controller('SidebarController', function($scope, $aside,$location) {
	$scope.state = true;
    $scope.openAside = function(position) {
            $aside.open({
              templateUrl: 'app/webroot/js/angular/page/aside.html',
              placement: position,
              backdrop: true,
              controller: function($scope, $uibModalInstance) {
                $scope.ok = function(e) {
                  $uibModalInstance.close();
				  e.stopPropagation();
                };
                $scope.cancel = function(url) {
                  	$uibModalInstance.dismiss();
					$location.path(url);
                  return false;
                };
              }
            })
     }
});