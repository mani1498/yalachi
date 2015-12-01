<?php echo $this->element('view_header'); ?>
    <div class="col-lg-12 addNewButton">
            <?php echo $this->Html->link(__('New Product'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
        </div>
        
        
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-top:15px;">
	<thead>
	<tr>
			<?php /*?><th><?php echo $this->Paginator->sort('id'); ?></th><?php */?>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<?php /*?><th><?php echo $this->Paginator->sort('description'); ?></th><?php */?>
			<th><?php echo $this->Paginator->sort('vendor'); ?></th>
			<?php /*?><th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('tags'); ?></th>
			<th><?php echo $this->Paginator->sort('publish'); ?></th><?php */?>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<?php /*?><th><?php echo $this->Paginator->sort('list_price'); ?></th>
			<th><?php echo $this->Paginator->sort('sku'); ?></th>
			<th><?php echo $this->Paginator->sort('barcode'); ?></th><?php */?>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<?php /*?><th><?php echo $this->Paginator->sort('varients'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('shipping'); ?></th>
			<th><?php echo $this->Paginator->sort('published_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th><?php */?>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<?php /*?><td><?php echo h($product['Product']['id']); ?>&nbsp;</td><?php */?>
		<td><?php echo h($product['Product']['title']); ?>&nbsp;</td>
		<?php /*?><td><?php echo h($product['Product']['description']); ?>&nbsp;</td><?php */?>
		<td><?php echo h($product['Product']['vendor']); ?>&nbsp;</td>
		<?php /*?><td><?php echo h($product['Product']['type']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['tags']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['publish']); ?>&nbsp;</td><?php */?>
		<td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
		<?php /*?><td><?php echo h($product['Product']['list_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['sku']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['barcode']); ?>&nbsp;</td><?php */?>
		<td><?php echo h($product['Product']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['weight']); ?>&nbsp;</td>
		<?php /*?><td><?php echo h($product['Product']['varients']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['tax']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['shipping']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['published_at']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['updated_at']); ?>&nbsp;</td><?php */?>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    
    </div>
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
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
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
</div><?php */?>
<?php echo $this->element('view_footer'); ?>

</div>