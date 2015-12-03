<?php echo $this->element('view_header');?>
<div class="addNewButton" style="float:none;">
         <?php echo $this->Html->link(__('Back to User'), array('action' => 'index'),array('class' => 'btn btn-primary','type'=>'button')); ?>
         <?php echo $this->Html->link(__('Delete User'), array('action' => 'delete', $this->Form->value('User.id')),array('class' => 'btn btn-primary','type'=>'button'), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?>
         <?php echo $this->Html->link(__('Add to User'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
</div>
<div class="products form">
<?php echo $this->Form->create('Product',array('type' => 'file','role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Edit Product'); ?></legend>
	<div class="row">
    	<div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">Products</div>              
                <div class="panel-body">           
                <?php 
                  echo $this->Form->input('title',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                  echo $this->Form->input('description',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
                ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Visibility</div>              
                <div class="panel-body"> 
                <?php 
                    echo $this->Form->input('publish',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>'));
                ?>
                </div>
            </div>
		</div>
    </div>
    
     <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
            	<div class="panel-heading">Price</div>              
                <div class="panel-body">           
                 <?php
					echo $this->Form->input('price',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('list_price',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('sku',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('barcode',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('quantity',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('weight',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('tax',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>'));
					echo $this->Form->input('shipping',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>'));
				?>	
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Organization</div>              
                <div class="panel-body"> 
                <?php			
					
					echo $this->Form->input('vendor',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('type',array('div'=>false,'error'=>false,'before' => '<div class="form-group">', 'after' => '</div>' ,'multiple'=>'', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('tags',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('Collect.category_id',array('div'=>false,'error'=>false, 'name'=>'Collect[category_id][]', 'type'=>'select','multiple', 'options'=>$category, 'before' => '<div class="form-group">', 'after' => '</div>' , 'class'=>'validate[required]' ,'id'=>'multiple-select-box-edit'));
				?>
                </div>
            </div>
		</div>
    </div>
    
     <div class="row">
     	<div class="col-lg-6">
            <div class="panel panel-default">
            	<div class="panel-heading">Images</div>              
                <div class="panel-body">           
                 <?php
						echo $this->Form->input('ProductImage.img_src.',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','type'=>'file','multiple'));
						//echo $this->Form->input('ProductImage.img_alt',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
						foreach($this->request->data['ProductImage'] as $photo){
						 	echo $this->Html->image('product/small/'.$photo['img_src'], array('alt' => 'CakePHP'));
							echo $this->Form->input('ProductImage.id',array('value'=>$photo['id'],'type'=>'hidden'));
						}
				 ?>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Meta</div>              
                <div class="panel-body"> 
                  <?php
						
						echo $this->Form->input('Metafield.title',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
						echo $this->Form->input('Metafield.description',array('div'=>false,'error'=>false, 'before' => '<div class="form-group ">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
						echo $this->Form->input('Metafield.url_handle',array('div'=>false,'error'=>false,'label'=>false, 'type'=>'text', 'before' => '<label>URL Handle</label><div class="form-group input-group"><span class="input-group-addon">http://newshop/product/</span>', 'after' => '</div>','id'=>'urlHandleProduct', 'class'=>'validate[required] form-control','style'=>'margin-left:0px;'));
						echo $this->Form->input('Metafield.type',array('value'=>'product','type'=>'hidden'));
				 ?>
                </div>
            </div>
		</div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
            	<div class="panel-heading">Add Varients <span class="varient-enable">+</span></div>              
                <div class="panel-body" id="varient_body">           
                 <?php
						echo $this->Form->input('Option.options_name',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					    //echo $this->Html->tag('span', '', array('class' => 'selectivity-input','id'=>'emails-input' ,'name'=>'Option[options_values][]'));
				 ?>
                 <div id='TextBoxesGroup'>
	
</div>
                </div>
            </div>
        </div>
    </div>
	<?php
		echo $this->Form->input('id');
		
		//echo $this->Form->input('title');
		//echo $this->Form->input('description');
		//echo $this->Form->input('vendor');
		//echo $this->Form->input('type');
		//echo $this->Form->input('tags');
		//echo $this->Form->input('publish');
		//echo $this->Form->input('price');
		//echo $this->Form->input('list_price');
		//echo $this->Form->input('sku');
		//echo $this->Form->input('barcode');
		//echo $this->Form->input('quantity');
		//echo $this->Form->input('weight');
		//echo $this->Form->input('varients');
		//echo $this->Form->input('tax');
		//echo $this->Form->input('shipping');
		//echo $this->Form->input('published_at');
		//echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php  echo $this->Form->submit(__('Submit'),array('div'=>false, 'class'=>'btn btn-lg btn-success btn-block' )); echo $this->Form->end(); ?>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Product.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Product.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Collects'), array('controller' => 'collects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Options'), array('controller' => 'options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Option'), array('controller' => 'options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Images'), array('controller' => 'product_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Image'), array('controller' => 'product_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Varients'), array('controller' => 'product_varients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Varient'), array('controller' => 'product_varients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('controller' => 'reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wishlists'), array('controller' => 'wishlists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wishlist'), array('controller' => 'wishlists', 'action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
<?php echo $this->element('view_footer'); ?>
