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
<!-- 
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../css/plugins/timeline.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/plugins/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
   

    

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
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>