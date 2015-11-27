<div id="page-wrapper">
    <div class="row">
    

<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('img_src'); ?></th>
			<th><?php echo $this->Paginator->sort('img_alt'); ?></th>
			<th><?php echo $this->Paginator->sort('publish'); ?></th>
			<th><?php echo $this->Paginator->sort('published_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
		<td><?php echo html_entity_decode($category['Category']['description']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['img_src']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['img_alt']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['publish']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['published_at']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?>
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
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    </div>
</div>


    </div>
</div>

<?php $this->start('sidebar'); ?>

<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Categories Actions</a>
	<ul class="nav nav-second-level">
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Collects'), array('controller' => 'collects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
	</ul>
</li>

<?php $this->end(); ?>
