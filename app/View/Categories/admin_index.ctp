<?php echo $this->element('view_header'); ?>

 <div class="col-lg-12 addNewButton">
            <?php echo $this->Html->link(__('New Category'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
        </div>
<div class="panel-body">
        <div class="dataTable_wrapper">
	<h2><?php echo __('Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-top:15px;">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('No'); ?></th>
			<th><?php echo $this->Paginator->sort('Title'); ?></th>
			<th><?php echo $this->Paginator->sort('Description'); ?></th>
			<th><?php echo $this->Paginator->sort('Image'); ?></th>
			<th><?php echo $this->Paginator->sort('Status'); ?></th>
			<?php /*?>
			<th><?php echo $this->Paginator->sort('img_alt'); ?></th>
			<th><?php echo $this->Paginator->sort('published_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th><?php */?>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $i =1; foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($i); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
		<td><?php echo html_entity_decode($category['Category']['description']); ?>&nbsp;</td>
        <td><img src="/app/webroot/img/Category/small/<?php echo h($category['Category']['img_src']); ?>" height="70" width="70" />&nbsp;</td>
		<td><?php echo h($category['Category']['publish'] == true ? 'Active' : 'Inactive'); ?>&nbsp;</td>
		<?php /*?><td><?php echo h($category['Category']['published_at']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['img_alt']); ?>&nbsp;</td>
		
		<td><?php echo h($category['Category']['updated_at']); ?>&nbsp;</td><?php */?>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?>
		</td>
	</tr>
<?php $i++; endforeach; ?>
	</tbody>
	</table> </div>
    </div>
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
    </div><?php */?>
</div>


    </div>
</div>

<?php echo $this->element('view_footer'); ?>

</div>