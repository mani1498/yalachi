<div class="settings view">
<h2><?php echo __('Setting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Name'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['store_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currency'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['currency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit System'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['unit_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Zone'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['time_zone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enquiry Email'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['enquiry_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Name'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['logo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Image'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['logo_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Url'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['logo_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Copy Rights Text'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['copy_rights_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ship From'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['ship_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ship Zone'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['ship_zone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ship Label'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['ship_label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ship Package Dimension'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['ship_package_dimension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published At'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['published_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Setting'), array('action' => 'edit', $setting['Setting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Setting'), array('action' => 'delete', $setting['Setting']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $setting['Setting']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Setting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
