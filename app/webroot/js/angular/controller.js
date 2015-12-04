//homeController 
shopping.controller("homeController", ["$scope","$log","$timeout","$http", function ($scope, $log, $timeout, $http) {
    $scope.title = "Home Page";
}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$routeParams','$http',function($scope, $routeParams, $http){
	
	$scope.title = "Product Detail";
    $scope.id = $routeParams.id;
    console.log($scope.id);
    $scope.details = {};
	var req =  { method: 'GET',url: '/products/details/'+ $scope.id+'.json'}
	$http(req).success(function (result, status, headers, config) {
		$scope.details = result.Product;
		console.log($scope.details);
	})
	.error(function (result, status, headers, config) {
		console.log("Data: " + result);
		console.log("Status: " + status);
	})
        
}]);

//aboutController
shopping.controller('aboutController',['$scope',function($scope){
    $scope.title = "About US";
    $scope.description = "This is Testing content";
}]);

//contactController
shopping.controller('contactController',['$scope',function($scope){
    $scope.title = "Contact";
    $scope.description = "This is Testing content";
    $scope.phone = "+1 23-234-2135";
}]);


//catalogController
shopping.controller('catalogController',['$scope','$http','Pagination','titleService',function($scope,$http,Pagination,titleService){
	
	$scope.title = titleService.getTitle();
	console.log($scope.title);
	$scope.allProducts = '{}';
	$http({method: 'GET',url: '/admin/categories/all.json',cache: false
	 }).success(function (data, status, headers, config) {
      console.log('successful');
	  console.log(data.Category);
	  $scope.allProducts = data.Category;
	 }).error(function (data, status, headers, config) {
	  console.log('failure');
	  console.log("Data: " + data);
	  console.log("Status: " + status);
	}); 
	
	 $scope.currentPage = 0;
     $scope.pageSize = 6;
	 $scope.numberOfPages = function(){
		//console.log(Object.keys($scope.allProducts).length);
        return Math.ceil(Object.keys($scope.allProducts).length/$scope.pageSize);                
    }
	
}]);

shopping.service('titleService',function($location){
	this.getTitle = function(){
		return $location.url();
	}
});

shopping.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});
