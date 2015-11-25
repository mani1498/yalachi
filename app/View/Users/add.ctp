<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
 
        <div class="col-lg-12">
         <?php echo $this->Form->create('User',array('class'=>'form-horizontal','role'=>'form')); ?>

          <div class="form-group">
            <div class="col-sm-10">
              <?php  echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Username')); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">

              <?php  echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Password')); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <?php  echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Email')); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label" style="text-align:left;">Role</label>
            <div class="col-sm-10">
              <p class="form-control-static">admin</p>
              <?php  echo $this->Form->input('role',array('type'=>'hidden','value'=>'admin')); ?>
            </div>
          </div>
               <a href="http://jeevanfootwear.in">Jeevan</a>
         
         <?php echo $this->Form->submit('Submit',array('class'=>'btn btn-primary')); ?>
         <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
<?php $this->start('sidebar'); ?>

<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Users Actions</a>
	<ul class="nav nav-second-level">
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</li>
<?php $this->end(); ?>