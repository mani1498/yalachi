<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <?php 
	echo $this->Html->css('bootstrap.min'); 
	echo $this->Html->css('plugins/metisMenu/metisMenu.min'); 
	echo $this->Html->css('plugins/timeline'); 
	echo $this->Html->css('sb-admin-2'); 
	echo $this->Html->css('plugins/morris'); 
	echo $this->Html->css('font-awesome-4.1.0/css/font-awesome.min');
	echo $this->Html->css('dataTables/dataTables.responsive.css'); 
	echo $this->Html->css('dataTables/dataTables.responsive.css'); 
	?>
    <?php /*?><?php 
	echo $this->Html->script('jquery.min'); 
	echo $this->Html->script('yalachi');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('sb-admin-2');
	echo $this->Html->script('plugins/metisMenu/metisMenu.min');
	echo $this->Html->script('plugins/morris/raphael.min');
	echo $this->Html->script('tinymce/tinymce.min');
	//echo $this->Html->script('plugins/morris/morris.min');
	//echo $this->Html->script('plugins/morris/morris-data');
	?><?php */?>
    <style>
	#page-wrapper{
	padding-bottom:20px;
	}
	</style>
</head>

<body>
    <div id="wrapper">
        <?php echo $this->element('nav'); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <!-- /#wrapper -->
	<?php 
	echo $this->Html->script('jquery.min');
	echo $this->Html->script('selectivity-full.js');
	echo $this->Html->script('yalachi');
	echo $this->Html->script('bootstrap.min');
	
	echo $this->Html->script('plugins/metisMenu/metisMenu.min');
	//echo $this->Html->script('plugins/morris/raphael.min');
	//echo $this->Html->script('plugins/morris/morris.min');
	//echo $this->Html->script('plugins/morris/morris-data');
	echo $this->Html->script('dataTables/jquery.dataTables.min.js'); 
	echo $this->Html->script('dataTables/dataTables.bootstrap.min.js'); 
	echo $this->Html->script('sb-admin-2');
	?>
	
	 <script>
		$(document).ready(function() {
			 $('#varient_body').hide();
			$('#multiple-select-box').selectivity();
			$('#multiple-select-box-edit').selectivity();
			$('#emails-input').selectivity({
					inputType: 'Email',
                    placeholder: 'Enter option',
             }); 
			 var counter = 1;
			 $('#emails-input').on('keyup',function(e){
				 //console.log(e.keyCode);
				 if(e.keyCode == 8){
					counter--;
					console.log(counter);
        			$("#TextBoxDiv" + counter).remove();
					 console.log('backspace trapped');
				 }
				 
				  if(e.keyCode == 188){
					if(counter>10){
							alert("Only 10 textboxes allow");
							return false;
					}   
						
					var newTextBoxDiv = $(document.createElement('div'))
						 .attr("id", 'TextBoxDiv' + counter);
								
					newTextBoxDiv.after().html('<div class="varient-group"><label>price</label><input type="text" id="price' + counter + '" value=""  ></div><div class="varient-group"><label>SKU</label><input type="text" id="sku' + counter + '" value=""  ></div><div class="varient-group"><label>BarCode</label><input type="text" id="barcode' + counter + '" value=""  ></div>');
							
					newTextBoxDiv.appendTo("#TextBoxesGroup");
					counter++;
				  }
					
					//console.log(counter);
             });
			 var varenb;
			 $(".varient-enable").click(function () {
				 if(!varenb){
				  $('#varient_body').show();
				  varenb=1;
				 }
				 else{
					 varenb=0;
				 $('#varient_body').hide();
				 }
			 });
			 
			  $("#getVarientValue").click(function () {
				 var arr = [];
					var price,sku,barcode,Varoptions,newDiv;
					for(i=1; i<counter; i++){
						arr.push({
							price: $('#price' + i).val(),
							sku:  $('#sku' + i).val(),
							barcode:  $('#barcode' + i).val(),
							Varoptions: $('span[class="selectivity-multiple-selected-item"]').eq(i-1).attr('data-item-id')
						});
					}
					console.log(arr);
					//return false;
					$.each(arr, function (index, value) {
						console.log(index);
						//return false;
							newDiv = $(document.createElement('div')).attr("id", 'ProductVarientPrice' + index);
							newDiv.after().html('<input type="hidden" name="data[ProductVarient][val]['+index+'][price]" value="'+value.price+'"><input type="hidden" name="data[ProductVarient][val]['+index+'][sku]" value="'+value.sku+'"><input type="hidden" name="data[ProductVarient][val]['+index+'][barcode]" value="'+value.barcode+'"><input type="hidden" name="data[Option][val]['+index+'][options_values]" value="'+value.Varoptions+'">');
							newDiv.appendTo("#varient-wrapper");
					});
					//return false;
			});
			 
			 
			$('#dataTables-example').DataTable({
					responsive: true
			});
		});
	
		function initMCEexact(e){
			  tinymce.init({
			  selector: e,
			  theme: "modern",
			  width: 900,
			  height: 150,
			  plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			  ],
			  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
			 });
		}
	
		initMCEexact("#CategoryDescription");

   </script>

</body>
</html>