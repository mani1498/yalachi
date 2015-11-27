<?php echo $this->element('view_header'); ?>
    <div class="col-lg-12">
            <?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?>
        </div>
        
        
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
            <?php /*?><th><?php //echo $this->Paginator->sort('id'); ?></th><?php */?>
            <th><?php echo $this->Paginator->sort('first_name'); ?></th>
            <th><?php echo $this->Paginator->sort('last_name'); ?></th>
            <?php /*?><th><?php //echo $this->Paginator->sort('address1'); ?></th>
            <th><?php //echo $this->Paginator->sort('address2'); ?></th>
            <th><?php //echo $this->Paginator->sort('city'); ?></th>
            <th><?php //echo $this->Paginator->sort('province'); ?></th>
            <th><?php //echo $this->Paginator->sort('country'); ?></th>
            <th><?php //echo $this->Paginator->sort('zipcode'); ?></th><?php */?>
            <th><?php echo $this->Paginator->sort('phone'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
           <?php /*?> <th><?php //echo $this->Paginator->sort('password'); ?></th>
            <th><?php //echo $this->Paginator->sort('total_amount_spend'); ?></th>
            <th><?php //echo $this->Paginator->sort('total_orders'); ?></th><?php */?>
            <th><?php echo $this->Paginator->sort('photo'); ?></th>
            <th><?php echo $this->Paginator->sort('privilages'); ?></th>
           <?php /*?> <th><?php //echo $this->Paginator->sort('terms_and_cond'); ?></th>
            <th><?php //echo $this->Paginator->sort('publish'); ?></th>
            <th><?php //echo $this->Paginator->sort('published_at'); ?></th>
            <th><?php //echo $this->Paginator->sort('updated_at'); ?></th><?php */?>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <?php /*?><td><?php //echo h($user['User']['id']); ?>&nbsp;</td><?php */?>
        <td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
        <?php /*?><td><?php //echo h($user['User']['address1']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['address2']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['city']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['province']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['country']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['zipcode']); ?>&nbsp;</td><?php */?>
        <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
        <?php /*?><td><?php //echo h($user['User']['password']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['total_amount_spend']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['total_orders']); ?>&nbsp;</td><?php */?>
        <td><?php echo h($user['User']['photo']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['privilages']); ?>&nbsp;</td>
        <?php /*?><td><?php //echo h($user['User']['terms_and_cond']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['publish']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['published_at']); ?>&nbsp;</td>
        <td><?php //echo h($user['User']['updated_at']); ?>&nbsp;</td><?php */?>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'customer_view', $user['User']['id'])); ?>
            <?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
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
    
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
</div>

<?php echo $this->element('view_footer'); ?>

</div>
