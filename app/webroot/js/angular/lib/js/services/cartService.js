var shoppingCart = angular.module('shoppingCart', []);
shoppingCart.service('cartService', function($cookies) {
	var now = new Date();
    now.setDate(now.getDate() + 7);
	$scope=this;
	$scope.invoice = {items: []	};
    this.add = function(detailsArray) {
		var val='';
		console.log($cookies.getObject('CartItem'));
		var cookieItems=$cookies.getObject('CartItem');
		if(!cookieItems)	{
			$scope.invoice.items.push({pid:detailsArray.id,ptitle:detailsArray.title,qty:1,cost: detailsArray.price});
			$cookies.putObject("CartItem", $scope.invoice.items, {expires: now});
			console.log('New');
		}else{
			var DupItem = objectFindByKey(cookieItems,detailsArray);
			$cookies.putObject("CartItem", DupItem, {expires: now});
			console.log($scope.invoice.items);
			function objectFindByKey(array, key) {
				console.log(array.length);
				for (var i = 0; i < array.length; i++) {console.log('Found');
					if (array[i].pid === key.id) {
						$scope.invoice.items[i].qty=array[i].qty+1;
						console.log($scope.invoice.items);
						return $scope.invoice.items;
					}
					else{console.log('Not Found');
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
	};
	
	this.totalItem=function(){
		var totalitem = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
			totalitem +=item.qty;
        })
		return totalitem;
	}
	
	this.totalCost=function(){
		var totalcost = 0;
		var cookieItems=$cookies.getObject('CartItem');
        angular.forEach(cookieItems, function(item) {
            totalcost += item.qty * item.cost;
        })
        return totalcost;
	}
	
	this.itemRemove=function(index){
		var cookieItems=$cookies.getObject('CartItem');
		$scope.invoice.items.splice(index, 1);
		$cookies.putObject("CartItem", $scope.invoice.items, {expires: now});
	}
	
});