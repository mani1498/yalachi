var Mshopping = angular.module('Mshopping',['ngRoute']);

	
	Mshopping.config(function($routeProvider){
    $routeProvider
		.when('#',{templateUrl: '/js/mani/pages/home.html',controller:'homeController'})
        .when('/',{templateUrl: '/js/mani/pages/home.html',controller:'homeController'})
        .when('/cart',{templateUrl: '/js/mani/pages/cart.html',controller:'homeController'})
	});
	
Mshopping.controller('homeController',['$scope','$http',function($scope,$http){
console.log('a');
	$http.get('/admin/categories/all.json').success(function(result){
		
		console.log(result);
		$scope.repos=result.Category;
		//console.log(result.Category[0].Category.title);
	})
	.error(function(data,status){ 
		console.log("Data: " + data);
		console.log("Status: " + status);
	})
	 $scope.invoice = {
		items: [{
		  qty: 0,
		  cost: 0,
		  pid: '',
		  title:''
		}]
	  };
	$scope.addItem = function (price,quantity,prid,prtitle) {
		
      $scope.invoice.items.push({
        qty: quantity,
        cost: price,
		pid:prid,
		title:prtitle
      });
	  console.log($scope.invoice.items);
    },
	$scope.total = function () {
      var total = 0;
      angular.forEach($scope.invoice.items, function (item) {
        total += item.qty * item.cost;
      })
      return total;
    }
	$scope.totalQty = function () {
      var totalQty = 0;
      angular.forEach($scope.invoice.items, function (item) {
        totalQty += item.qty;
      })
	  console.log($scope.invoice.items);
      return totalQty;
    }
	
}]);

Mshopping.controller('cartController',['$scope','$routeParams','$http',function($scope, $routeParams, $http){
     $scope.title = "Contact";
    $scope.description = "This is Testing content";
    $scope.phone = "+1 23-234-2135";
}]);
//contactController
Mshopping.controller('contactController',['$scope',function($scope){
    $scope.title = "Contact";
    $scope.description = "This is Testing content";
    $scope.phone = "+1 23-234-2135";
}]);