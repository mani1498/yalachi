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

<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'First Name'));
		echo $this->Form->input('last_name',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Last Name'));
		//echo $this->Form->input('address1');
		//echo $this->Form->input('address2');
		//echo $this->Form->input('city');
		//echo $this->Form->input('province');
		//echo $this->Form->input('country');
		//echo $this->Form->input('zipcode');
		echo $this->Form->input('phone',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Phone'));
		echo $this->Form->input('email',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'E-mail'));
		echo $this->Form->input('password',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Password'));
		///echo $this->Form->input('total_amount_spend',array('type'=>'hidden','value'=>0));
		//echo $this->Form->input('total_orders',array('type'=>'hidden','value'=>0));
		//echo $this->Form->input('photo',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','type'=>'file'));
		//echo $this->Form->input('privilages');
		echo $this->Form->input('terms_and_cond',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>'));
		//echo $this->Form->input('publish');
		//echo $this->Form->input('published_at');
		//echo $this->Form->input('updated_at');
	?>
	</fieldset>
     <?php echo $this->Form->submit(__('Submit'),array('div'=>false, 'class'=>'btn btn-lg btn-success btn-block')); echo $this->Form->end();	?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>

 </div>
    </div>
    </div>