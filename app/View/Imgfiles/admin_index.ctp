<?php echo $this->element('view_header'); ?>

<div class="col-lg-12 addNewButton">
   <?php echo $this->Html->link(__('New File'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
</div>
<div class="panel-body">
        <div class="dataTable_wrapper">
<div class="imgfiles index">
	<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('publish'); ?></th>
			<th><?php echo $this->Paginator->sort('published_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($imgfiles as $imgfile): ?>
	<tr>
		<td><?php echo h($imgfile['Imgfile']['id']); ?>&nbsp;</td>
		<td><?php echo h($imgfile['Imgfile']['image']); ?>&nbsp;</td>
		<td><?php echo h($imgfile['Imgfile']['url']); ?>&nbsp;</td>
		<td><?php echo h($imgfile['Imgfile']['publish']); ?>&nbsp;</td>
		<td><?php echo h($imgfile['Imgfile']['published_at']); ?>&nbsp;</td>
		<td><?php echo h($imgfile['Imgfile']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imgfile['Imgfile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imgfile['Imgfile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imgfile['Imgfile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $imgfile['Imgfile']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<?php /*?><p>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Imgfile'), array('action' => 'add')); ?></li>
	</ul>
</div><?php */?>
</div></div>
<?php echo $this->element('view_footer'); ?>
