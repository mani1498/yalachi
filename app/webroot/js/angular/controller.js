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
shopping.controller("cartController", ["$scope",'$rootScope',"$log","$cookies", "$timeout","$http",'shopservice', function ($scope,$rootScope, $log, $cookies, $timeout, $http, shopservice) {
	var now = new Date();
    now.setDate(now.getDate() + 7);
    //$scope.title = "Home Page";
	//$scope.cartItem = shopservice.get('catalogController');
	$scope.cartItem = $cookies.getObject('CartItem');
	 $scope.total = function() {
        var total = 0;
        angular.forEach($scope.cartItem, function(item) {
            total += item.qty * item.cost;
        })
        return total;
	}
	$scope.removeItem = function(index) {
		$scope.cartItem = $cookies.getObject('CartItem');
		$scope.cartItem.splice(index, 1);
		$cookies.putObject("CartItem", $scope.cartItem, {expires: now});
		console.log($scope.cartItem);
    }
	
	$scope.cartUpdate = function(index,pqty) {
		if(pqty>0){
			$scope.cartItem = $cookies.getObject('CartItem');
			$scope.cartItem[index].qty=pqty;
			$cookies.putObject("CartItem", $scope.cartItem, {expires: now});
			console.log($scope.cartItem);
		}
    }
	$rootScope.cartItem = function() {
		var total = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
			total +=item.qty;
        })
		return total;
	}
	
	$rootScope.cartTotal = function() {
        var total = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
            total += item.qty * item.cost;
        })
        return total;
	}
	
	console.log($scope.cartItem);  
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
shopping.controller('catalogController',['$scope','$rootScope','$http','$cookies','Pagination','shopservice',function($scope,$rootScope,$http,$cookies,Pagination,shopservice){
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
	$scope.invoice = {items: []	};
	
	if($cookies.get('CartItem'))	{
		$scope.invoice.items=$cookies.getObject('CartItem');
	}
	$scope.addItem = function(detailsArray) {
		var val='';
		console.log($cookies.getObject('CartItem'));
		var cookieItems=$cookies.getObject('CartItem');
		if(!cookieItems)	{
			$scope.invoice.items.push({pid:detailsArray.id,ptitle:detailsArray.title,qty:1,cost: detailsArray.price});
			$cookies.putObject("CartItem", $scope.invoice.items, {expires: now});
			console.log($scope.invoice.items);
		}else{
			var DupItem = objectFindByKey(cookieItems,detailsArray);
			$cookies.putObject("CartItem", DupItem, {expires: now});
			console.log($scope.invoice.items);
			function objectFindByKey(array, key) {
				console.log(array.length);
				for (var i = 0; i < array.length; i++) {
					if (array[i].pid === key.id) {
						$scope.invoice.items[i].qty=array[i].qty+1;
						console.log($scope.invoice.items);
						return $scope.invoice.items;
					}
					else{
						if(i == array.length-1) {
							$scope.invoice.items.push({pid:key.id,ptitle:key.title,qty:1,cost: key.price});
							console.log($scope.invoice.items);
							return $scope.invoice.items;	
						}
					}
				}
				return null;
			}
		}
	}
	
	$scope.removeItem = function(index) {
        $scope.invoice.items.splice(index, 1);
    }
	
	$rootScope.cartItem = function() {
		var total = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
			total +=item.qty;
        })
		return total;
	}
	$rootScope.cartTotal = function() {
        var total = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
            total += item.qty * item.cost;
        })
        return total;
	}
	shopservice.store('catalogController', $scope.invoice.items);
	
	//$scope.shopservice = $scope.invoice.items;
}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$rootScope','$routeParams','$http','$cookies',function($scope, $rootScope, $routeParams, $http, $cookies){
	var now = new Date();
    now.setDate(now.getDate() + 7);
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
	$scope.invoice = {items: []	};
	if($cookies.get('CartItem'))	{
		$scope.invoice.items=$cookies.getObject('CartItem');
	}
	
	$scope.addItem = function(detailsArray) {
		var val='';
		console.log($cookies.getObject('CartItem'));
		var cookieItems=$cookies.getObject('CartItem');
		if(!cookieItems)	{
			$scope.invoice.items.push({pid:detailsArray.id,ptitle:detailsArray.title,qty:1,cost: detailsArray.price});
			$cookies.putObject("CartItem", $scope.invoice.items, {expires: now});
			console.log($scope.invoice.items);
		}else{
			var DupItem = objectFindByKey(cookieItems,detailsArray);
			$cookies.putObject("CartItem", DupItem, {expires: now});
			console.log($scope.invoice.items);
			function objectFindByKey(array, key) {
				console.log(array.length);
				for (var i = 0; i < array.length; i++) {
					if (array[i].pid === key.id) {
						$scope.invoice.items[i].qty=array[i].qty+1;
						console.log($scope.invoice.items);
						return $scope.invoice.items;
					}
					else{
						if(i == array.length-1) {
							$scope.invoice.items.push({pid:key.id,ptitle:key.title,qty:1,cost: key.price});
							console.log($scope.invoice.items);
							return $scope.invoice.items;	
						}
					}
				}
				return null;
			}
		}
	}
	
	$rootScope.cartTotal = function() {
        var total = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
            total += item.qty * item.cost;
        })
        return total;
	}
    $rootScope.cartItem = function() {
		var total = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
			total +=item.qty;
        })
		return total;
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