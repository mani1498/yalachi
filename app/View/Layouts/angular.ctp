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
		
		 .cataglog .col-xs-12 {
			padding-bottom: 2%;
			text-align:center;
		 }
		 .cataglog h3 {
			 font-size: 13px;
			  height: 30px;
		 }
		 .navbar-header{
			 /*background-color:#e4755a;*/
		 }
		 .navbar-header button span{
			 /*color:#fff; */
			 color:#ddd;
		 }
		 .navbar-default .navbar-toggle {
				/*border-color: #fff;*/
				color:#ddd;
		  }
		  .navbar-default .navbar-toggle .icon-bar {
				/*background-color: #fff;*/
				color:#ddd;
			}
		/* .accountButton {
			float: left;
			height: 18px;
			width: 18px;
			margin-left: 24px;
			background: url('/app/webroot/img/accountButtonBg.png') 0 0 no-repeat;
			margin-top: 18px;
		}*/
		.glyphicon-chevron-left:before {
			content: "\e079";
			background: #e4755a;
			padding: 5px;
			margin-left:-30px;
		}
		.glyphicon-chevron-right:before {
			content: "\e080";
			background: #e4755a;
			padding: 5px;
			margin-right:-30px;
		}
		.footerWrapper {
			padding-left: 24px;
			padding-right: 24px;
			/*background-color: #e4755a;*/
			height: 60px;
			overflow: visible;
		}
		.footerWrapper > .copyright {
			float: left;
			/*color: #fff;*/
			color:#000;
			margin-top: 18px;
		}
		.footerLinksWrapper {
			float: right;
			display: block;
			margin-top: 18px;
		}
		.footerLinksWrapper > .footerLink {
			float: left;
			margin-left: 12px;
			padding-right: 9px;
			margin-top: 0px;
			/*border-right: 1px solid rgba(255,255,255,0.12);*/
			border-right: 1px solid #000;
		}
		.footerWrapper a {
			/*color: #fff;*/
			color:#000;
			margin-top: 18px;
		}
		span > a {
			display: inline;
		}
		.carousel-indicators li {
			background-color:#e4755a;
		}
		.carousel-indicators .active {
			background-color: #f00;
		}
		</style>

    </head>
    <body id="shoppingApp">
    

    <nav class="navbar navbar-default" ng-controller="SidebarController" style="position:fixed; width:100%;z-index:10000; top:0; left:0; height:50px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="navigation-toggle" ng-click="openAside('left')">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand glyphicon glyphicon-user"  href="/#/"></a><a href="#cart" ng-cloak style="float:left; padding: 18px 10px 0px 20px;"><span  class="glyphicon glyphicon-shopping-cart">{{ getTotalQty() }} CART ${{ getTotalSum() }}</span></a>
        </div>
        <div class="navbar-collapse collapse">
        <!--/.nav-collapse -->
       <aside-directive></aside-directive>
      </div>
    </nav>
    <div class="container"  ng-hide="navPath()" style="padding: 0px; margin-top:20%;">
       <div class="row">
      <!--<form ng-submit="submit()">-->
   	   <div class="col-xs-8 col-md-8">
        <div class="form-group" style="text-align:center;">
          <input type="text" class="form-control"  autocorrect="off" ng-model="search" placeholder="search" > 
        </div> 
  	   </div> 
       <div class="col-xs-4 col-md-4">
     	<button type="button" class="btn btn-primary btn-sm" ng-click="searchClick(search)">SEARCH</button>
       <!--<input type="submit" class="btn btn-primary btn-sm" value="SUBMIT" />-->
       </div>
     <!-- </form> -->
	 </div>
     </div>
   <div ng-controller="VendorController"  ng-hide="navPath()"><a ng-click="openAside('bottom')">Vendor</a></div>
    <div ng-class="{ 'alert': flash, 'alert-success': flash.type === 'success', 'alert-danger': flash.type === 'error' }" ng-if="flash" ng-bind="flash.message" style="margin-top:50px;"></div>  
    <div class="container"  style="padding: 0px;" ng-view>
    </div>
       

    <footer class="footer">
      <div class="footerWrapper"> <span class="copyright">© copyright yalachi.</span> <span class="footerLinksWrapper"><a href="" class="footerLink">Help</a><a href="" class="footerLink">Terms</a></span> </div>
    </footer>
         
    <?php 
		echo $this->Html->script('angular/app.js'); 
		echo $this->Html->script('angular/service.js');
		echo $this->Html->script('angular/lib/js/services/flash.service.js');
		echo $this->Html->script('angular/controller.js'); 
		echo $this->Html->script('angular/directives.js'); 
		echo $this->Html->script('angular/filter.js'); 
		echo $this->Html->script('angular/script.js'); 
	?>
    </body>
</html>