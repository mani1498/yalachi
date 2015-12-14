//homeController 
shopping.controller("homeController", ["$scope","$log","$timeout","$http", function ($scope, $log, $timeout, $http) {
    //$scope.title = "Home Page";
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
shopping.controller('catalogController',['$scope','$http','Pagination','$cookies','cartService','$location',function($scope,$http,Pagination,$cookies,cartService,$location){
	
	$scope.allProducts = '{}';
	$scope.loader = true;
	$http({method: 'GET',url: 'admin/categories/all.json',cache: false
	 }).success(function (data, status, headers, config) {
        console.log('successful');
	    console.log(data.Category);
	    $scope.allProducts = data.Category;
	    $scope.loader = false;
	 }).error(function (data, status, headers, config) {
	   console.log('failure');
	   console.log("Data: " + data);
	   console.log("Status: " + status);
	   $scope.loader = false;
	}); 
	
	 $scope.currentPage = 0;
     $scope.pageSize = 50;
	 $scope.numberOfPages = function(){
        return Math.ceil(Object.keys($scope.allProducts).length/$scope.pageSize);                
     }

	 $scope.addCart = function(a,b,c,d,e){ //a - id b - title c - price  d - qty - e - img
     	$scope.addData = {id: a, title:b, price:c, qty:d, img:e};
		cartService.addCart($scope.addData);
	 }
	 
	 $scope.cartDisable = function(cartId){ 
		$scope.cartItem = cartService.getCartItems();
		for(var c =0; c < $scope.cartItem.items.length; c++){
			if($scope.cartItem.items[c].id === cartId){
				return true;
			}
		}
		return false;
	 }

}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$routeParams','$http','$cookies','cartService',function($scope, $routeParams, $http,$cookies,cartService){

	$scope.loader = true;
    $scope.id = $routeParams.id;
    console.log($scope.id);
    $scope.details = {};
	var req =  { method: 'GET',url: 'products/details/'+ $scope.id+'.json'}
	$http(req).success(function (result, status, headers, config) {
		$scope.details = result.Product;
		console.log($scope.details);
		$scope.loader = false;
	})
	.error(function (result, status, headers, config) {
		console.log("Data: " + result);
		console.log("Status: " + status);
		$scope.loader = false;
	})
	
	$scope.addCart = function(a,b,c,d,e){ //a - id b - title c - price  d - qty - e - img
     	$scope.addData = {id: a, title:b, price:c, qty:d, img:e};
		cartService.addCart($scope.addData);
	 }
	 
	$scope.cartDisable = function(cartId){ 
		$scope.cartItem = cartService.getCartItems();
		for(var c =0; c < $scope.cartItem.items.length; c++){
			if($scope.cartItem.items[c].id === cartId){
				return true;
			}
		}
		return false;
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
	 $scope.getTotalSum = function(){
		 return cartService.getTotalSum();
	 }
	 $scope.getTotalQty = function(){
		 return cartService.getTotalQty();
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

