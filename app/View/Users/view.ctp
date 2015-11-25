<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Profile</h1>
        </div>
 
        <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <?php  echo ucfirst($user['User']['username'])." Profile"; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered"  width="100%">
                        <tr><td style="color:#000;">Id</td><td><?php echo h($user['User']['id']); ?></td></tr>
                        <tr><td style="color:#000;">Username</td><td><?php echo h($user['User']['username']); ?></td></tr>
                        <tr><td style="color:#000;">Password</td><td><?php echo '****';//h($user['User']['password']); ?></td></tr>
                        <tr><td style="color:#000;">Email</td><td><?php echo h($user['User']['email']); ?></td></tr>
                        <tr><td style="color:#000;">Role</td><td><?php echo h($user['User']['role']); ?></td></tr>
                        <tr><td style="color:#000;">Created</td><td><?php echo h($user['User']['created']); ?></td></tr>
                        <tr><td style="color:#000;">Modified</td><td><?php echo h($user['User']['modified']); ?></td></tr>
                        </table>
                       </div>
                    </div> 
                </div>
            </div>
            <!-- /.panel-body -->
         </div>        
        </div>   
    </div>
 <div class="row">
  <div class="col-lg-12">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($user['Order'])): ?>
	<table class="table table-condensed" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['category_id']; ?></td>
			<td><?php echo $order['product_id']; ?></td>
			<td><?php echo $order['price']; ?></td>
			<td><?php echo $order['description']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id']),array('class'=>'glyphicon glyphicon-eye-open')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id']),array('class'=>'glyphicon glyphicon-pencil')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']),array('class'=>'glyphicon glyphicon-remove-circle'), __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
        <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	    </div>
    </div>
  </div>
</div>



<?php $this->start('sidebar'); ?>

<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Users Actions</a>
	<ul class="nav nav-second-level">
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</li>
<?php $this->end(); ?>