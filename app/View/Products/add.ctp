<div id="page-wrapper">

<?php echo $this->Form->create('Product'); ?>
    <legend><?php echo __('Add Product'); ?></legend>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">Products</div>              
                <div class="panel-body">           
                <?php 
                  echo $this->Form->input('title',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Title'));
                  echo $this->Form->input('description');
                ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Visibility</div>              
                <div class="panel-body"> 
                <?php 
                    echo $this->Form->input('publish');
                ?>
                </div>
            </div>
		</div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">Price</div>              
                <div class="panel-body">           
                 <?php
					echo $this->Form->input('price');
					echo $this->Form->input('list_price');
					echo $this->Form->input('sku');
					echo $this->Form->input('barcode');
					echo $this->Form->input('quantity');
					echo $this->Form->input('weight');
					echo $this->Form->input('tax');
					echo $this->Form->input('shipping');
				?>	
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Organization</div>              
                <div class="panel-body"> 
                <?php
					echo $this->Form->input('vendor');
					echo $this->Form->input('type');
					echo $this->Form->input('tags');
					echo $this->Form->input('Collect.name',array('value'=>1));
				?>
                </div>
            </div>
		</div>
    </div>
    
     <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">varients</div>              
                <div class="panel-body">           
                 <?php
						echo $this->Form->input('varients');
						echo $this->Form->input('Option.options_name');
						echo $this->Form->input('Option.options_values');
						echo $this->Form->input('ProductVarient.price');
						echo $this->Form->input('ProductVarient.sku');
						echo $this->Form->input('ProductVarient.barcode');
				 ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Meta</div>              
                <div class="panel-body"> 
                 Coming Soon.
                </div>
            </div>
		</div>
    </div>
    
    
    
     <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
            	<div class="panel-heading">Images</div>              
                <div class="panel-body">           
                 <?php
						echo $this->Form->input('ProductImage.img_src');
						echo $this->Form->input('ProductImage.img_alt');
				 ?>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<?php $this->start('sidebar'); ?>
<li>
 <a href="#"><i class="fa fa-files-o fa-fw"></i>Product Actions</a>
	<ul class="nav nav-second-level">

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
</li>
<?php $this->end(); ?>