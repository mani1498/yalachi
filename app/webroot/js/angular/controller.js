//homeController 
shopping.controller("homeController", ["$scope","$log","$timeout","$http",'$rootScope', function ($scope, $log, $timeout, $http,$rootScope) {
	  console.log('homeController');
      $scope.title = "Home Page";
	  $scope.myInterval = 3500;
	  $scope.noWrapSlides = false;
	  var slides = $scope.slides = [];
	  $scope.addSlide = function(i) {
		var newWidth = 600 + slides.length + 1;
		slides.push({
		  image: 'app/webroot/img/slider/carausol' + i + '.jpg',
		 /* text: ['More','Extra','Lots of','Surplus'][slides.length % 4] + ' ' +
			['Cats', 'Kittys', 'Felines', 'Cutes'][slides.length % 4]*/
		});
	  };
	  for (var i=1; i<4; i++) {
		$scope.addSlide(i);
	  }
	  //$scope.homeCategory=$rootScope.homeCategory
	  
	  
}]);

//catalogController
shopping.controller('catalogController',['$scope','$http','Pagination','$cookies','cartService','$location','$rootScope','$routeParams','$filter','$anchorScroll',function($scope,$http,Pagination,$cookies,cartService,$location,$rootScope,$routeParams,$filter,$anchorScroll){
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
			  //$location.hash('shoppingApp');
			  $anchorScroll();
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
				   var output1 = [];
				    var output2 = [];
				   var productTitle;
				   var titleText,catlogCount;
				   console.log('searchController B');
				   if(searchItems != ''){
						collection=$rootScope.allProductsCopy;
						console.log(collection.length);
						console.log(searchItems);
						console.log(collection);
						///console.log(collection[0].$$hashKey);
						
						//output1 =  $filter('filter')(collection,{Product:{title:searchItems}});
						output2 = $filter('filter')(collection,{Product:{tags:searchItems}});
						//console.log(output1)
						console.log(output2)
						//output = output1.concat(output2);
						output = output2;
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
	
	 $scope.cartItem = cartService.getCartItems();
	 $scope.addCart = function(a,b,c,d,e,eve){ //a - id b - title c - price  d - qty - e - img
     	$scope.addData = {id: a, title:b, price:c, qty:d, img:e};
	 	eve.target.innerHTML = 'ADD MORE';
		cartService.addCart($scope.addData);
	 }
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

shopping.controller('VendorController', function($scope, $aside,$location) {
 $scope.state = true;
    $scope.openAside = function(position) {
            $aside.open({
              templateUrl: 'app/webroot/js/angular/page/vendor.html',
              placement: position,
              backdrop: true,
              controller: function($scope, $uibModalInstance,$rootScope,cartService) {
                $scope.ok = function(e) {
                  $uibModalInstance.close();
      				e.stopPropagation();
                };
                $scope.cancel = function(url) {
                   $uibModalInstance.dismiss();
     				$location.path(url);
                  return false;
                };
				var chkven=[];
				$scope.checkVendor = function(list) {
                  chkven.push(list);
                };
				$scope.vendorok = function(){
					console.log(chkven);
					angular.forEach(chkven, function(value, key) {
						if(field == value){
							isInArrayNgForeach(field, arr);
						}
					});
					
				}
				/*function isInArrayNgForeach(field, arr) {
					var result = false;
					angular.forEach(arr, function(value, key) {
						if(field == value)
							result = true;
					});
					return result;
				}*/
				
              }
            })
     }
});

//loginController 
shopping.controller("loginController", ["$scope","$log","$timeout","$http","$location","AuthenticationService","FlashService", function ($scope, $log, $timeout, $http,$location,AuthenticationService,FlashService) {
   var vm = this;
    vm.login = login;
	(function initController() {
            // reset login status
            AuthenticationService.ClearCredentials();
     })();
	function login() { console.log(vm);
            vm.dataLoading = true;
            AuthenticationService.Login(vm, function (response) {
                if (response.success) { console.log('s'); console.log(response);
                    AuthenticationService.SetCredentials(vm.username, vm.password);
                    $location.path('/myaccount');
                } else { console.log('f'); console.log(response);
                    FlashService.Error(response.message);
                    vm.dataLoading = false;
                }
            });
      };
}]);

//loginController 
shopping.controller('registrationController', ['$scope','$log','$timeout','$http','$location','UserService','FlashService', function ($scope, $log, $timeout, $http,$location,UserService,FlashService) {
	var vm = this;
	vm.register = register;
	
	function register() {
            //vm.dataLoading = true;
            UserService.Create(vm.user)
                .then(function (response) {
                    if (response.userRegistration.Response == 'S') {console.log('s' + response);
                        FlashService.Success('Registration successful', true);
                        $location.path('/login');
                    } else {console.log('f');
                        FlashService.Error(response.message);
                        //vm.dataLoading = false;
                    }
                });
        }
	
}]);


shopping.controller('myaccountController', ['$scope','$log','$timeout','$http','$location','$cookieStore', function ($scope, $log, $timeout, $http, $location,$cookieStore) {
	$cookieStore.get('globals');
	console.log($cookieStore.get('globals'));
	if(!$cookieStore.get('globals'))
		$location.path('/login');
	else
		console.log('You Fuck');
		
}]);