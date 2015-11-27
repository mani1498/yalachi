<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('country');
		echo $this->Form->input('zipcode');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('total_amount_spend');
		echo $this->Form->input('total_orders');
		echo $this->Form->input('photo');
		echo $this->Form->input('privilages');
		echo $this->Form->input('terms_and_cond');
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

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
