<?php echo $this->element('view_header'); ?>
<div class="addNewButton" style="float:none;">
         <?php echo $this->Html->link(__('Back to Category'), array('action' => 'index'),array('class' => 'btn btn-primary','type'=>'button')); ?>
         <?php echo $this->Html->link(__('Delete Category'), array('action' => 'delete', $this->Form->value('User.id')),array('class' => 'btn btn-primary','type'=>'button'), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?>
         <?php echo $this->Html->link(__('Add Category'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
    </div>
<style>
.panel{
	overflow:auto;
}
</style>
    
<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo html_entity_decode($category['Category']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img Src'); ?></dt>
		<dd>
			<?php echo h($category['Category']['img_src']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img Alt'); ?></dt>
		<dd>
			<?php echo h($category['Category']['img_alt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($category['Category']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published At'); ?></dt>
		<dd>
			<?php echo h($category['Category']['published_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($category['Category']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


<div class="related">
	<h3><?php echo __('Related Collects'); ?></h3>
	<?php if (!empty($category['Collect'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Collect'] as $collect): ?>
		<tr>
			<td><?php echo $collect['id']; ?></td>
			<td><?php echo $collect['category_id']; ?></td>
			<td><?php echo $collect['product_id']; ?></td>
			<td><?php echo $collect['created_at']; ?></td>
			<td><?php echo $collect['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'collects', 'action' => 'view', $collect['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'collects', 'action' => 'edit', $collect['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'collects', 'action' => 'delete', $collect['id']), array('confirm' => __('Are you sure you want to delete # %s?', $collect['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<?php /*?><div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
		</ul>
	</div><?php */?>
</div>
</div>
</div>






<?php echo $this->element('view_footer'); ?>

</div>