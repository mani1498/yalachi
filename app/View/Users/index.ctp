 <div class="jumbotron" id="id01">
        <h1>List of products</h1>
       
 </div>
<script>
var xmlhttp = new XMLHttpRequest();
var url = "http://newshop.com/admin/categories/all.json";
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();
function myFunction(response) {
    var arr1 = JSON.parse(response);
	var arr = arr1.Category;
	console.log(arr);
    var i;
    var out = "<table border='1' cellpadding='5'>";
    for(i = 0; i < arr.length; i++) {
		console.log();
        out += "<tr><td>" + 
        arr[i].Product.title +
        "</td><td>" +
        arr[i].Product.sku +
		"</td><td><img src='<?php echo BASE_URL.'img/product/small/'; ?>" + arr[i].Product.ProductImage[0].img_src +
        "'></td><td>" +
        arr[i].Product.price +
        "</td></tr>";
    }
    out += "</table>";
    document.getElementById("id01").innerHTML = out;
}
</script>
