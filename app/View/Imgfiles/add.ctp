<div class="imgfiles form">
<?php echo $this->Form->create('Imgfile'); ?>
	<fieldset>
		<legend><?php echo __('Add Imgfile'); ?></legend>
	<?php
		echo $this->Form->input('image');
		echo $this->Form->input('url');
		echo $this->Form->input('publish');
		echo $this->Form->input('published_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Imgfiles'), array('action' => 'index')); ?></li>
	</ul>
</div>
