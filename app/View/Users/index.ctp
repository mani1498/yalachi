<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
      <div class="col-lg-12"><?php echo $this->Session->flash(); ?> </div>
      <div class="col-lg-12">
        <table class="table table-condensed" cellpadding="0" cellspacing="0" width="100%">
        <thead>
        <tr>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('role'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr <?php if($user['User']['username'] == $userdetail['User']['username']){ ?>class="active"<?php } ?>>
            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View '), array('action' => 'view', $user['User']['id']),array('class'=>'glyphicon glyphicon-eye-open')); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']),array('class'=>'glyphicon glyphicon-pencil')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class'=>'glyphicon glyphicon-remove-circle'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
            </td>
        </tr>
         <?php endforeach; ?>
        </tbody>
        </table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <a href="http://jeevanfootwear.in">Jeevan</a>
	<ul class="pagination">
	<li><?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?></li>
	</ul>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php $this->start('sidebar'); ?>
<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Users Actions</a>
	<ul class="nav nav-first-level">
		<li><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>	
    </ul>
</li>
<?php $this->end(); ?>
