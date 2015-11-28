<?php echo $this->element('view_header'); ?>
<div class="addNewButton" style="float:none;">
         <?php echo $this->Html->link(__('Back to Customer'), array('action' => 'index'),array('class' => 'btn btn-primary','type'=>'button')); ?>
         <?php echo $this->Html->link(__('Delete Customer'), array('action' => 'delete', $this->Form->value('User.id')),array('class' => 'btn btn-primary','type'=>'button'), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?>
    </div>
<style>
.panel{
	overflow:auto;
}
</style>
<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($user['User']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($user['User']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($user['User']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($user['User']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($user['User']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zipcode'); ?></dt>
		<dd>
			<?php echo h($user['User']['zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Amount Spend'); ?></dt>
		<dd>
			<?php echo h($user['User']['total_amount_spend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Orders'); ?></dt>
		<dd>
			<?php echo h($user['User']['total_orders']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($user['User']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Privilages'); ?></dt>
		<dd>
			<?php echo h($user['User']['privilages']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terms And Cond'); ?></dt>
		<dd>
			<?php echo h($user['User']['terms_and_cond']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($user['User']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published At'); ?></dt>
		<dd>
			<?php echo h($user['User']['published_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
<?php echo $this->element('view_footer'); ?>

</div>
