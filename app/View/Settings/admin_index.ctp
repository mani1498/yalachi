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
                    echo $this->Form->input('store_name');
                    echo $this->Form->input('email');
                    echo $this->Form->input('enquiry_email');
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
                     echo $this->Form->input('company_name');
            		 echo $this->Form->input('phone');
             		 echo $this->Form->input('address');
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
                    echo $this->Form->input('time_zone');
					echo $this->Form->input('currency');
					echo $this->Form->input('unit_system');
					echo $this->Form->input('weight');
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
                    echo $this->Form->input('logo_name');
					echo $this->Form->input('logo_image');
					echo $this->Form->input('logo_url');
					echo $this->Form->input('copy_rights_text');
					echo $this->Form->input('ship_from');
					echo $this->Form->input('ship_zone');
					echo $this->Form->input('ship_label');
					echo $this->Form->input('ship_package_dimension');
                ?>
            </div>
 		</div>
	</div>       
    
    </div>
    
    </fieldset>
         <?php echo $this->Form->submit(__('Submit'),array('div'=>false, 'class'=>'btn btn-lg btn-success btn-block')); echo $this->Form->end();	?>

    </div>
    </div>