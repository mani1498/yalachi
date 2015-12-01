<?php echo $this->element('view_header'); ?>
<div class="imgfiles form">
<?php echo $this->Form->create('Imgfile',array('id'=>'adminAdd','type' => 'file','role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Imgfile'); ?></legend>
	<?php
		echo $this->Form->input('image',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','type'=>'file'));
		echo $this->Form->input('url',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'URL'));
		echo $this->Form->input('publish',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>'));
		//echo $this->Form->input('published_at');
		//echo $this->Form->input('updated_at');
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
<?php echo $this->element('view_footer'); ?>