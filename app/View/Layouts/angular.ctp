<!DOCTYPE html>
<html ng-app="shopping">
    <head>
        <?php
			echo $this->Html->css('bootstrap.min.css'); 
			//echo $this->Html->css('/js/angular/lib/css/sidebar.css');
			echo $this->Html->css('/js/angular/lib/css/aside.css'); 
			echo $this->Html->css('/js/angular/lib/css/animate.css'); 
			echo $this->Html->css('/js/angular/lib/css/bootstrap-theme.min.css'); 
			//echo $this->Html->css('/js/angular/lib/css/font-awesome.min.css'); 
			
			echo $this->Html->script('angular/lib/js/angular.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-cookies.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-route.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-filter.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-resource.min.js');
			echo $this->Html->script('angular/lib/js/simplePagination.js');
			echo $this->Html->script('angular/lib/js/angular-aside.min.js');
			
			echo $this->Html->script('angular/lib/js/services/authentication.service.js'); 
			echo $this->Html->script('angular/lib/js/services/flash.service.js');
			echo $this->Html->script('angular/lib/js/services/user.service.local-storage.js');
			echo $this->Html->script('angular/lib/js/services/cartService.js');
			
			
		?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title ng-bind="title" ng-class="title"></title>
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
		.preloader {
			padding: 50px;
			background: url('/app/webroot/img/preloader.gif') no-repeat 50% 50% transparent;
		}
		.preloader h4 {
			width:100%;
			position:relative;
			top:100px;
		}
		</style>
    </head>
    <body ng-cloak>
    
    <div ng-hide="dataLoaded" class="preloader">
        <h4>Yalachi is Loading Please Wait ....</h4>
    </div>
    <div  ng-show="dataLoaded" >
    <nav class="navbar navbar-default {{popupHeight}}" ng-hide="navPath()" ng-controller="SidebarController">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="navigation-toggle" ng-click="openAside('left')">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Shopping</a>
        </div>
        <div class="navbar-collapse collapse">
        <!--/.nav-collapse -->
       <aside-directive></aside-directive>
      </div>
    </nav>
    
     <div ng-class="{ 'alert': flash, 'alert-success': flash.type === 'success', 'alert-danger': flash.type === 'error' }" ng-if="flash" ng-bind="flash.message" style="margin-top:50px;"></div>  
    <div class="container"  ng-view >

    </div>
      

       

    <footer class="footer" ng-hide="navPath()">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>
    </div>     
    <?php 
		echo $this->Html->script('ui-bootstrap-tpls-0.14.3.min.js'); 
		echo $this->Html->script('angular/app.js'); 
		echo $this->Html->script('angular/controller.js'); 
		echo $this->Html->script('angular/service.js');
		echo $this->Html->script('angular/directives.js'); 
		echo $this->Html->script('angular/script.js'); ?>
    </body>
</html>