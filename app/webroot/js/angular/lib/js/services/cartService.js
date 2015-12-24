var shoppingCart = angular.module('shoppingCart', []);
shoppingCart.service('cartService', function($cookies) {
	var now = new Date();
    now.setDate(now.getDate() + 7);
	this.invoice = {items:[]};
    this.add = function(detailsArray) {
		var val='';
		console.log($cookies.getObject('CartItem'));
		var cookieItems=$cookies.getObject('CartItem');
		if(!cookieItems)	{
			this.invoice.items.push({pid:detailsArray.id,ptitle:detailsArray.title,qty:1,cost: detailsArray.price});
			$cookies.putObject("CartItem", this.invoice.items, {expires: now});
			console.log('New');
		}else{
			this.invoice.items = $cookies.getObject('CartItem');
			//console.log(detailsArray);return false;
			var DupItem = objectFindByKey(cookieItems,detailsArray,this.invoice.items);
			$cookies.putObject("CartItem", DupItem, {expires: now});
			console.log(this.invoice.items);
			function objectFindByKey(array, key, Scopeitems) {
				//console.log(array.length);
				for (var i = 0; i < array.length; i++) {
					console.log('Found');
					//console.log(this);
					if (array[i].pid === key.id) {
						Scopeitems[i].qty=array[i].qty+1;
						console.log(Scopeitems);
						return Scopeitems;
					}
					else{
						if(i == array.length-1) {console.log('Not Found');
							Scopeitems.push({pid:key.id,ptitle:key.title,qty:1,cost: key.price});
							//console.log(Scopeitems);
							return Scopeitems;	
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
		this.invoice.items.splice(index, 1);
		$cookies.putObject("CartItem", this.invoice.items, {expires: now});
	}
	
	this.reduce=function(index){
		var cookieItems=$cookies.getObject('CartItem');
		var i =0;
		angular.forEach(cookieItems, function(item) {
            if (item.pid === index.id && item.qty > 1) {
				cookieItems[i].qty--;
			}
		 i++;
        })
		$cookies.putObject("CartItem", cookieItems, {expires: now});
	}
	
	this.changeName=function(index){
		var cookieItems=$cookies.getObject('CartItem');
		var i =0;
		
		angular.forEach(cookieItems, function(item) {
            if (item.pid === index && item.qty > 1) {
				console.log(index);
				return true;
			}
		 i++;
        })
		$cookies.putObject("CartItem", cookieItems, {expires: now});
	}
	
});