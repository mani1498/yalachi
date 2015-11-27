<div id="page-wrapper">
    <div class="row">

<div class="categories form">
<?php echo $this->Form->create('Category', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('img_src', array('type' => 'file'));
		echo $this->Form->input('img_alt');
		echo $this->Form->input('publish');
		//echo $this->Form->input('published_at');
		//echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


    </div>
</div>

<?php $this->start('sidebar'); ?>

<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Categories Actions</a>
	<ul class="nav nav-second-level">
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Collects'), array('controller' => 'collects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
	</ul>
</li>

<?php $this->end(); ?>