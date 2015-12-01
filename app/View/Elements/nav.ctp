<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Panel V1.0</a>
            </div>
            <?php echo $this->element('nav_right'); ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                        <li>
                        <?php
							echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-dashboard fa-fw')) . "Dashboard",array('controller' => 'users', 'action' => 'dashboard'),array('class' => 'active', 'escape' => false));
						?>
                        </li>
                        
                        <li>
                        <?php
							echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-dashboard fa-fw')) . "Admin Users",array('controller' => 'users', 'action' => 'index'),array('class' => 'active', 'escape' => false));
						?>
                        </li>
                        
                      
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Settings</a>
                            <ul class="nav nav-second-level">
                               <li>
									<?php
                                        echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-dashboard fa-fw')) . "General",array('controller' => 'settings', 'action' => 'index'),array('class' => 'active', 'escape' => false));
                                    ?>
                                </li>
                                <li>
                                    <?php
                                        echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-dashboard fa-fw')) . "Files",array('controller' => 'imgfiles', 'action' => 'index'),array('class' => 'active', 'escape' => false));
                                    ?>
                                </li>
                               
                            </ul>

                        </li>
                        
                        <li>
                        <?php
							echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-dashboard fa-fw')) . "Customers",array('controller' => 'users', 'action' => 'customers'),array('class' => 'active', 'escape' => false));
						?>
                        </li>
                        <li>
                         	<a href="#"><i class="fa fa-files-o fa-fw"></i>Categories Actions</a>
                            <ul class="nav nav-second-level">
                                <li><?php echo $this->Html->link(__('List Category'), array('controller' => 'categories', 'action' => 'index')); ?></li>
                                <li><?php echo $this->Html->link(__('List Collects'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
                            </ul>
                        </li>
                        
                        <li>
                         <a href="#"><i class="fa fa-files-o fa-fw"></i>Product Actions</a>
                            <ul class="nav nav-second-level">
                        
                                <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products','action' => 'index')); ?></li>
                                <li><?php echo $this->Html->link(__('List Collects'), array('controller' => 'collects', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Options'), array('controller' => 'options', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Option'), array('controller' => 'options', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Product Images'), array('controller' => 'product_images', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Product Image'), array('controller' => 'product_images', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Product Varients'), array('controller' => 'product_varients', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Product Varient'), array('controller' => 'product_varients', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Reviews'), array('controller' => 'reviews', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Wishlists'), array('controller' => 'wishlists', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Wishlist'), array('controller' => 'wishlists', 'action' => 'add')); ?> </li>
                            </ul>
                        </li>
                        
                        <?php //echo $this->fetch('sidebar'); ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>