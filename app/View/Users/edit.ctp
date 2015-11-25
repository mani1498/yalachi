<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
 
        <div class="col-lg-12">
		  <?php 
          echo $this->Form->create('User',array('class'=>'form-horizontal','role'=>'form')); 
          echo $this->Form->input('id');
          ?>

          <div class="form-group">
            <div class="col-sm-10">
              <?php  echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Username','readonly')); ?>
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
            <div class="col-sm-10">
               <?php  echo $this->Form->input('role',array('class'=>'form-control','readonly')); ?>
            </div>
          </div>
               
         
         <?php echo $this->Form->submit('Submit',array('class'=>'btn btn-primary')); ?>
         <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
<?php $this->start('sidebar'); ?>

<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Users Actions</a>
	<ul class="nav nav-second-level">
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</li>
<?php $this->end(); ?>