<!DOCTYPE html>
<html ng-app="shopping">
    <head>
        <?php
			echo $this->Html->css('bootstrap.min.css'); 
			echo $this->Html->css('/js/angular/lib/css/bootstrap-theme.min.css'); 
			echo $this->Html->script('angular/lib/js/angular.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-route.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-filter.min.js'); 
			echo $this->Html->script('angular/lib/js/angular-resource.min.js');
			echo $this->Html->script('angular/lib/js/simplePagination.js');
		?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title ng-cloak>Angular - {{title}}</title>
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
    
   <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">YALACHI</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#/">Home</a></li>
            <li><a href="#catalog">Catalog</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown 
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>-->
          </ul>
          
           <ul class="nav navbar-nav">
            <li><a href="#contact">Vitamins</a></li>
            <li><a href="#about">Minerals</a></li>
            <li><a href="#contact">Herbal</a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>  
    
       
    <div class="container"  ng-view>

    </div>
      

       

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>
         
    <?php 
		echo $this->Html->script('angular/app.js'); 
		echo $this->Html->script('angular/controller.js'); 
		echo $this->Html->script('angular/service.js');
		echo $this->Html->script('angular/directives.js'); 
		echo $this->Html->script('angular/script.js'); 
	?>
    </body>
</html>