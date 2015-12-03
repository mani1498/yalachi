<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Yalachi</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>favicon.ico" type="image/x-icon" />
    <!--<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php 
	echo $this->Html->css('bootstrap.min'); 
	echo $this->Html->css('plugins/metisMenu/metisMenu.min'); 
	echo $this->Html->css('plugins/timeline'); 
	echo $this->Html->css('sb-admin-2'); 
	echo $this->Html->css('plugins/morris'); 
	echo $this->Html->css('font-awesome-4.1.0/css/font-awesome.min');
	?>
  </head>
  <body>
  	<div class="container">
		<?php echo $this->fetch('content'); ?>
    </div>
  </body>
</html>