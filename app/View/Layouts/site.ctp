<!DOCTYPE html>
<html lang="en" ng-app="Mshopping">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yalachi</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>favicon.ico" type="image/x-icon" />
    <!--<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php	echo $this->Html->css('bootstrap.min'); 	?>
  </head>
  <body>
    <?php echo $this->element('site-nav'); 
	echo $this->fetch('content'); 	?>
   
    
    <?php echo $this->Html->script('angular/lib/js/angular.min.js'); 
		  echo $this->Html->script('angular/lib/js/angular-route.min.js'); 
		  echo $this->Html->script('mani/script');?>
    </div>
  </body>
</html>