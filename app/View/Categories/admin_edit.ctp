<?php echo $this->element('view_header'); ?>
<div class="addNewButton" style="float:none;">
         <?php echo $this->Html->link(__('Back to User'), array('action' => 'index'),array('class' => 'btn btn-primary','type'=>'button')); ?>
         <?php echo $this->Html->link(__('Delete User'), array('action' => 'delete', $this->Form->value('User.id')),array('class' => 'btn btn-primary','type'=>'button'), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?>
         <?php echo $this->Html->link(__('Add to User'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
    </div>
    
<div class="categories form">
<?php echo $this->Form->create('Category', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'First Name'));
		echo $this->Form->input('description',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'First Name'));
		echo $this->Form->input('img_src',array('div'=>false,'error'=>false,'type' => 'file', 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'E-mail'));
		if(!empty(strip_tags($this->Form->input('img_src'))))	echo $this->Html->image('Category/small/'.strip_tags($this->Form->input('img_src')), array('name'=>false,'div'=>false,'label'=>false,'alt' => 'CakePHP'));
		echo $this->Form->input('img_alt',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
		echo $this->Form->input('publish',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>'));
		//echo $this->Form->input('published_at');
		//echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>



<?php echo $this->element('view_footer'); ?>
