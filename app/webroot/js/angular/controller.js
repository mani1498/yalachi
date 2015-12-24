//homeController 
shopping.controller("homeController", ["$scope","$log","$timeout","$http", function ($scope, $log, $timeout, $http) {
    //$scope.title = "Home Page";
}]);

shopping.controller('SidebarController', function($scope, $aside) {
	$scope.state = true;
    $scope.openAside = function(position) {
            $aside.open({
              templateUrl: '/app/webroot/js/angular/page/aside.html',
              placement: position,
              backdrop: true,
              controller: function($scope, $modalInstance) {
                $scope.ok = function(e) {
                  $modalInstance.close();
                 // e.stopPropagation();
                };
                $scope.cancel = function(e) {
                  $modalInstance.dismiss();
                  e.stopPropagation();
                };
              }
            })
     }
});


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
	console.log($rootScope);
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
	$scope.addItem = function(res) {
		detailsArray = {items:[]};
		detailsArray.items.push({id:res.pid,title:res.ptitle,qty:res.qty,price: res.cost});
		$scope.answeraddItem = cartService.add(detailsArray.items[0]);	
		$scope.cartItem = $cookies.getObject('CartItem');
	}
	$scope.reduceItem = function(res){
		detailsArray = {items:[]};
		detailsArray.items.push({id:res.pid,title:res.ptitle,qty:res.qty,price: res.cost});
		$scope.answerreduceItem = cartService.reduce(detailsArray.items[0]);
		$scope.cartItem = $cookies.getObject('CartItem');
		
	}
	$scope.cartQuantity = function(key){
		return $scope.cartItem[key].qty;
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
shopping.controller('catalogController',['$scope','$rootScope','$routeParams','$http','$cookies','shopservice','cartService',function($scope,$rootScope,$routeParams,$http,$cookies,shopservice,cartService){
	var title = $routeParams.title || 'all';
	console.log(title);
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
					angular.forEach(collection, function(item) {
						  if(item.Category.title == title)
						  output.push(item);   
				   });
				   titleText = title;
				   catlogCount  = output.length;
			   }
			  $rootScope.allProducts = output;  
			  $rootScope.catalogTitle = titleText;
			  $rootScope.catalogProductCount = catlogCount;
		  } 
		  
	  }
	 
	$scope.cartText = function(key){
		  return "ADD TO CART";
	}
	
	$scope.addItem = function(detailsArray,$event) {
		$event.target.innerText="check to cart"
		$scope.answeraddItem = cartService.add(detailsArray);	
		return false;
	}

	$rootScope.cartItem = function() {
        return cartService.totalItem();
    }
	
	$rootScope.cartTotal = function() {
        return cartService.totalCost();
    }
	
	shopservice.store('catalogController', $cookies.getObject('CartItem'));
	
	/* The below function for sorting categories
		1) From all categories to specific Category on click
		2) 	
	*/
	$scope.sortByCat = function(id){
		console.log(id);
		 var output = [];
		 collection=$scope.forSorting;
		 if(id == false){
			 output  = $scope.forSorting;
		 }else{
		  angular.forEach(collection, function(item) {
			if(item.Category.title == id)
			   output.push(item);   
		  });
	     }
		  $rootScope.allProducts = output;
	}
	//$scope.shopservice = $scope.invoice.items;
}]);


//productdetailController
shopping.controller('productdetailController',['$scope','$rootScope','$routeParams','$http','$cookies','cartService',function($scope, $rootScope, $routeParams, $http, $cookies,cartService){
	
	$scope.loader = false;
    $scope.id = $routeParams.id;
    console.log($scope.id);
	console.log($rootScope);
    $scope.details = {};
	/*var req =  { method: 'GET',url: '/products/details/'+ $scope.id+'.json'}
	$http(req).success(function (result, status, headers, config) {
		$scope.details = result.Product;
		console.log($scope.details);
		$scope.loader = false;
	})
	.error(function (result, status, headers, config) {
		console.log("Data: " + result);
		console.log("Status: " + status);
		$scope.loader = false;
	})*/
	
	console.log($rootScope.allProducts[$scope.id]);
	$scope.details = $rootScope.allProducts[$scope.id];
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

/*shopping.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});*/

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