<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php //echo $this->Html->link(__('New User'), array('action' => 'add','type'=>'button','class'=>'btn btn-primary')); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo __('Users'); ?>
        </div>


<div class="settings form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('store_name');
		echo $this->Form->input('company_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('currency');
		echo $this->Form->input('unit_system');
		echo $this->Form->input('weight');
		echo $this->Form->input('time_zone');
		echo $this->Form->input('enquiry_email');
		echo $this->Form->input('logo_name');
		echo $this->Form->input('logo_image');
		echo $this->Form->input('logo_url');
		echo $this->Form->input('copy_rights_text');
		echo $this->Form->input('ship_from');
		echo $this->Form->input('ship_zone');
		echo $this->Form->input('ship_label');
		echo $this->Form->input('ship_package_dimension');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Setting.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Setting.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?></li>
	</ul>
</div>

 </div>
    </div>
    </div>