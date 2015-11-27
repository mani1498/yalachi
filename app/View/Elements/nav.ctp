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
                                <li>
                                    <?php echo $this->Html->link("Products",array('controller' => 'products','action' => 'index')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link("Place Orders",array('controller' => 'orders','action' => 'index')); ?>
                                </li>
                            </ul>

                        </li>
                        
                        <li>
                        <?php
							echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-dashboard fa-fw')) . "Customers",array('controller' => 'users', 'action' => 'customers'),array('class' => 'active', 'escape' => false));
						?>
                        </li>
                        
                        <?php echo $this->fetch('sidebar'); ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>