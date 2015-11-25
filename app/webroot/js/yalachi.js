// JavaScript Document

function OrderCategory(cat){
	if(cat != ""){
		$.get("/jeevan/products/ajaxProductsList/"+cat,function(data,status){
																alert(data);
		$('#ajaxProductsList').html(data);
		alert(status);
	  });
	}else{
	return false;	
	}
	
}

function OrderProduct(prod){
	if(prod != ""){
		$.get("/jeevan/products/ajaxProductdetails/"+prod,function(data,status){
		$('#ajaxProductdetails').html(data);
		alert(status);
	  });
	}else{
	return false;	
	}
	
}