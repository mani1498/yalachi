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
shopping.controller('catalogController',['$scope','$http','$cookieStore','Pagination',function($scope,$http,$cookieStore,Pagination){
	
	//$scope.title = "Product Page";
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
		//console.log(Object.keys($scope.allProducts).length);
        return Math.ceil(Object.keys($scope.allProducts).length/$scope.pageSize);                
    }
	
	if(!$cookieStore.get('CartItem'))	{
		$scope.invoice = {
			items: []
		};
	}
	else{
		$scope.invoice = {
			items: []
		};
		$scope.invoice.items=$cookieStore.get('CartItem');
		console.log($cookieStore.get('CartItem'));	
	}
	
    $scope.addItem = function(pid,ptitle,pprice) {
        $scope.invoice.items.push({
			pid:pid,
			ptitle:ptitle,
            qty: 1,
            cost: pprice
        });
		$cookieStore.put("CartItem", $scope.invoice.items);
		console.log($cookieStore.get('CartItem'));
    },

    $scope.removeItem = function(index) {
        $scope.invoice.items.splice(index, 1);
    }
	
	$scope.cartItem = function() {
		var cookieItems=$cookieStore.get('CartItem');
        angular.forEach(cookieItems, function(item) {
			$scope.carts=item;
			console.log($scope.carts);
        })
	}
	
 
    $scope.total = function() {
        var total = 0;
		var cookieItems=$cookieStore.get('CartItem');
        angular.forEach(cookieItems, function(item) {
            total += item.qty * item.cost;
        })

        return total;
   
	console.log($cookieStore.get($scope.invoice.items));	
}
	
}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$routeParams','$http',function($scope, $routeParams, $http){
	
	//$scope.title = "Product Detail";
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

shopping.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});
