<div class="imgfiles view">
<h2><?php echo __('Imgfile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imgfile['Imgfile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($imgfile['Imgfile']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($imgfile['Imgfile']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($imgfile['Imgfile']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published At'); ?></dt>
		<dd>
			<?php echo h($imgfile['Imgfile']['published_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($imgfile['Imgfile']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Imgfile'), array('action' => 'edit', $imgfile['Imgfile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Imgfile'), array('action' => 'delete', $imgfile['Imgfile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $imgfile['Imgfile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Imgfiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Imgfile'), array('action' => 'add')); ?> </li>
	</ul>
</div>
