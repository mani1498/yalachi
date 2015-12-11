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
shopping.controller('catalogController',['$scope','$http','Pagination','$cookies',function($scope,$http,Pagination,$cookies){
	
	$scope.allProducts = '{}';
	$scope.loader = true;
	$http({method: 'GET',url: '/admin/categories/all.json',cache: false
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
     $scope.pageSize = 20;
	 $scope.numberOfPages = function(){
        return Math.ceil(Object.keys($scope.allProducts).length/$scope.pageSize);                
     }
	 

}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$routeParams','$http','$cookies',function($scope, $routeParams, $http,$cookies){

	$scope.loader = true;
    $scope.id = $routeParams.id;
    console.log($scope.id);
    $scope.details = {};
	var req =  { method: 'GET',url: '/products/details/'+ $scope.id+'.json'}
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
        
}]);

shopping.controller('cartController',['$scope','$routeParams','$http','$cookies','$filter','$rootScope','$log',function($scope, $routeParams, $http,$cookies,$filter,$rootScope,$log){
	
    /*var list = {items:[{pid: 1, ptitle:"Test1", qty:1, price: 10},{pid: 2, ptitle:"Test2", qty:2, price: 20},{pid: 3, ptitle:"Test3", qty:3, price: 30},{pid: 4, ptitle:"Test4", qty:1, price: 40}]};
	$scope.cartList = list;*/
	
	$scope.cartItem = {};
	$scope.cartItem.items = [];
	if($cookies.getObject('cart')){
		$scope.cartItem.items = $cookies.getObject('cart').items;
	}
	$scope.errorMessage = "";
	
	$scope.expiresTime = function(){
		var now = new Date();
    	now.setDate(now.getDate() + 7);	
		$log.debug("fun: expiresTime - "+ now);
		return now;
	};

	$scope.addCart = function(index,pid,title,price,qty){
		$scope.addData = {id: pid, title:title, price:price, qty:qty}; //internal func var process only
		var data = $scope.checkData(pid);	
		if(data){
		  $scope.errorMessage = "";
	  	  $scope.cartItem.items.push($scope.addData);
		  $rootScope.cartCount();
		  $cookies.putObject('cart', $scope.cartItem,{ expires:$scope.expiresTime() });
		  $log.debug("fun: addCart - ");console.log($scope.cartItem.items);
		}else{
		  $scope.errorMessage = "Product already available in the cart";
		  $log.debug('fun: addCart - Product already available in the cart')
		}
	}
	
	$scope.updateCart = function(qty,sum){
		$scope.cartItem["qtyTotal"] = qty;
		$scope.cartItem["sumTotal"] = sum;
		$rootScope.cartCount();
		$cookies.putObject('cart', $scope.cartItem,{ expires:$scope.expiresTime() });
		console.log($scope.cartItem);
	}
	
	$scope.removeCart = function(removeId){
		$scope.cartItem.items.splice(removeId, 1);
		$rootScope.cartCount();
		$cookies.putObject('cart', $scope.cartItem,{ expires:$scope.expiresTime() });
		$log.debug("fun: removeCart - "+ $scope.cartItem);
	}
	
	$scope.checkData = function(checkId){
		var found = $filter('getById')($scope.cartItem.items, checkId);
		if(found === null){
		  console.log('available');
		  return true;	
		}else {
			 console.log('Not available');
		  return false;
		}
	}
	
	$scope.getTotalSum = function(){
		var totalSum = 0;
		$scope.errorMessage = '';
		for(var i=0; i<$scope.cartItem.items.length; i++){
			var items = $scope.cartItem.items[i];
			if(isNaN(items.qty)){
				return 0;
			}
			totalSum += parseInt(items.qty) * parseFloat(items.price);
			//console.log(typeof totalSum);
			if(typeof totalSum !== 'number'){
				  $scope.errorMessage = "invalid Sum";
				  return 0;
			}
		}
		return totalSum;
	}
	
	$scope.getTotalQty = function(){
		var totalQty = 0;
		$scope.errorMessage = '';
		for(var i=0; i<$scope.cartItem.items.length; i++){
			var items = $scope.cartItem.items[i];
			totalQty += parseInt(items.qty);
		}
		console.log(totalQty);
		return totalQty;
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

