//homeController 
shopping.controller("homeController", ["$scope","$log","$timeout","$http", function ($scope, $log, $timeout, $http) {
    //$scope.title = "Home Page";
}]);


//loginController 
shopping.controller("loginController", ["$scope","$log","$timeout","$http","$location","AuthenticationService","FlashService", function ($scope, $log, $timeout, $http,$location,AuthenticationService,FlashService) {
    //$scope.title = "Home Page";
	var vm = this;
    vm.login = login;
	(function initController() {
            // reset login status
            AuthenticationService.ClearCredentials();
     })();
	function login() { console.log('a');
            vm.dataLoading = true;
            AuthenticationService.Login(vm.username, vm.password, function (response) {
                if (response.success) { console.log('s');
                    AuthenticationService.SetCredentials(vm.username, vm.password);
                    $location.path('/');
                } else { console.log('f');
                    FlashService.Error(response.message);
                    vm.dataLoading = false;
                }
            });
      };
	
}]);

//loginController 
shopping.controller('registrationController', ['$scope','$log','$timeout','$http','$location', 'UserService','FlashService', function ($scope, $log, $timeout, $http,$location, UserService,FlashService) {
	var vm = this;
	vm.register = register;
	
	function register() {
            //vm.dataLoading = true;
            UserService.Create(vm.user)
                .then(function (response) {
                    if (response.success) {console.log('s');
                        FlashService.Success('Registration successful', true);
                        $location.path('/login');
                    } else {console.log('f');
                        FlashService.Error(response.message);
                        //vm.dataLoading = false;
                    }
                });
        }
	
}]);


//cartController 
shopping.controller("cartController", ["$scope",'$rootScope',"$log","$cookies", "$timeout","$http",'shopservice','cartService', function ($scope,$rootScope, $log, $cookies, $timeout, $http, shopservice, cartService) {
	
	$scope.cartItem = $cookies.getObject('CartItem');
	
	$scope.cartUpdate = function(index,pqty) {
        $scope.answercartUpdate = cartService.cartUpdate(index,pqty);
    }
	$scope.total = function() {
        $scope.answerTotal = cartService.totalCost();
    }
	$scope.removeItem = function(index) {console.log('before' +$cookies.getObject('CartItem'));
        $scope.answerremoveItem = cartService.itemRemove(index);
		$scope.cartItem = $cookies.getObject('CartItem');
    }
	$rootScope.cartItem = function() {
        return cartService.totalItem();
    }
	
	$rootScope.cartTotal = function() {
        return cartService.totalCost();
    }
	
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
shopping.controller('catalogController',['$scope','$rootScope','$http','$cookies','Pagination','shopservice','cartService',function($scope,$rootScope,$http,$cookies,Pagination,shopservice,cartService){
	var now = new Date();
    now.setDate(now.getDate() + 7);
	//$scope.title = "Product Page";
	//Scopes.store('OneController', $scope);
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
	
	$scope.addItem = function(detailsArray) {
		$scope.answeraddItem = cartService.add(detailsArray);	
	}

	$rootScope.cartItem = function() {
        return cartService.totalItem();
    }
	
	$rootScope.cartTotal = function() {
        return cartService.totalCost();
    }
	
	shopservice.store('catalogController', $cookies.getObject('CartItem'));
	
	//$scope.shopservice = $scope.invoice.items;
}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$rootScope','$routeParams','$http','$cookies','cartService',function($scope, $rootScope, $routeParams, $http, $cookies,cartService){
	
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
	
	
	$scope.addItem = function(detailsArray) {
		$scope.answeraddItem = cartService.add(detailsArray);	
	}
	
	$rootScope.cartItem = function() {
        return cartService.totalItem();
    }
	
	$rootScope.cartTotal = function() {
        return cartService.totalCost();
    }
	    
}]);

shopping.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});
shopping.service('shopservice', function($rootScope) {
     var mem = {};
    return {
        store: function (key, value) {
            mem[key] = value;
        },
        get: function (key) {
            return mem[key];
        }
    };
});