<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php //echo $this->Html->link(__('New User'), array('action' => 'add','type'=>'button','class'=>'btn btn-primary')); ?>
        
        <!-- /.col-lg-12 -->
    
<?php echo $this->Form->create('Setting'); ?>
<fieldset>
		<legend><?php echo __('Admin Edit Setting'); ?></legend>
    <div class="row">
    
    <div class="col-lg-6">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Store address'); ?>
            </div>
            <div class="settings form">
                <?php  echo $this->Form->input('id');
                    echo $this->Form->input('store_name',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                    echo $this->Form->input('email',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                    echo $this->Form->input('enquiry_email',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                ?>
            </div>
 		</div>
    </div>
    
    
    <div class="col-lg-6">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Store address'); ?>
            </div>
            <div class="settings form">
                <?php
                     echo $this->Form->input('company_name',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
            		 echo $this->Form->input('phone',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
             		 echo $this->Form->input('address',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                ?>
            </div>
 		</div>
	</div>
    
 	<div class="col-lg-12">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Standards and formats'); ?>
            </div>
            <div class="settings form">
                <?php
                    echo $this->Form->input('time_zone',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('currency',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('unit_system',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('weight',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                ?>
            </div>
 		</div>
	</div>
    
	<div class="col-lg-12">
    
    	<div class="panel panel-default" style="overflow:hidden">
            <div class="panel-heading">
                <?php echo __('Standards and formats'); ?>
            </div>
            <div class="settings form">
                <?php
                    echo $this->Form->input('logo_name',array('div'=>false,'error'=>false, 'before' => '<div style="float:left;width:40%"><div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('logo_image',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('logo_url',array('div'=>false,'error'=>false, 'type'=>'text', 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('copy_rights_text',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div></div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('ship_from',array('div'=>false,'error'=>false, 'before' => '<div style="float:left;width:40%"><div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('ship_zone',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('ship_label',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('ship_package_dimension',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div></div>', 'class'=>'validate[required] form-control'));
                ?>
            </div>
 		</div>
	</div>       
    
    </div>
    
    </fieldset>
         <?php echo $this->Form->submit(__('Submit'),array('div'=>false, 'class'=>'btn btn-lg btn-success btn-block')); echo $this->Form->end();	?>

    </div>
    </div>