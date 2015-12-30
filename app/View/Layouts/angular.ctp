<!DOCTYPE html>
<html ng-app="shopping">
    <head>
        <?php
			echo $this->Html->css('bootstrap.min.css'); 
			echo $this->Html->css('/js/angular/lib/css/bootstrap-theme.min.css'); 
			echo $this->Html->css('/js/angular/lib/css/aside.css'); 
			echo $this->Html->css('/js/angular/lib/css/animate.css'); 
			echo $this->Html->script('angular/lib/js/jquery-1.11.3.min.js');
			echo $this->Html->script('angular/lib/js/angular.min.js'); 
			echo $this->Html->script('angular/lib/js/ui-bootstrap-tpls.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-route.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-filter.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-resource.min.js');
			echo $this->Html->script('angular/lib/js/angular-cookies.min.js');
			echo $this->Html->script('angular/lib/js/simplePagination.js');
			echo $this->Html->script('angular/lib/js/angular-aside.min.js');
			echo $this->Html->script('angular/lib/js/angular-touch.min.js');
		?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title ng-bind="title"></title>
        <style>
		/* Sticky footer styles
		-------------------------------------------------- */
		html {
		  position: relative;
		  min-height: 100%;
		}
		body {
		  /* Margin bottom by footer height */
		  margin-bottom: 60px;
		}
		.footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 60px;
		  background-color: #f5f5f5;
		}
		
		
		/* Custom page CSS
		-------------------------------------------------- */
		/* Not required for template or sticky footer method. */
		
		body > .container {
		  padding: 60px 15px 0;
		}
		.container .text-muted {
		  margin: 20px 0;
		}
		
		.footer > .container {
		  padding-right: 15px;
		  padding-left: 15px;
		}
		
		code {
		  font-size: 80%;
		}
		</style>
        <style>	 
		 .cataglog .col-xs-12 {
			padding-bottom: 2%;
			text-align:center;
		 }
		 .cataglog h3 {
			 font-size: 13px;
			  height: 30px;
		 }
		</style>

    </head>
    <body>
    
    <nav class="navbar navbar-default" ng-controller="SidebarController">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="navigation-toggle" ng-click="openAside('left')">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#/">Shopping <a href="#cart" ng-cloak style="float:right; padding-top: 15px;    padding-right: 10px;"><span  class="glyphicon glyphicon-shopping-cart">{{ getTotalQty() }} CART ${{ getTotalSum() }}</span></a>
        </div>
        <div class="navbar-collapse collapse">
        <!--/.nav-collapse -->
       <aside-directive></aside-directive>
      </div>
    </nav>
    
       
    <div class="container"  style="padding: 0px;" ng-view>

    </div>
      

       

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>
         
    <?php 
		echo $this->Html->script('angular/app.js'); 
		echo $this->Html->script('angular/service.js');
		echo $this->Html->script('angular/controller.js'); 
		echo $this->Html->script('angular/directives.js'); 
		echo $this->Html->script('angular/script.js'); 
	?>
    </body>
</html>