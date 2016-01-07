<?php echo $this->element('view_header');//echo '<pre>';print_r($product); ?>
<div class="addNewButton" style="float:none;">
         <?php echo $this->Html->link(__('Back to Product'), array('action' => 'index'),array('class' => 'btn btn-primary','type'=>'button')); ?>
         <?php echo $this->Html->link(__('Delete Product'), array('action' => 'delete', $this->Form->value('User.id')),array('class' => 'btn btn-primary','type'=>'button'), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?>
         <?php echo $this->Html->link(__('Add Product'), array('action' => 'add'),array('class' => 'btn btn-primary','type'=>'button')); ?>
    </div>
<style>
.panel{
	overflow:auto;
}
</style>
<div class="products view">
<?php echo $this->Form->create('Product',array('type' => 'file','role'=>'form')); ?>
<fieldset>
		<legend><?php echo __('View Product'); ?></legend>

	<div class="row">
    	<div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">Products</div>              
                   <div class="panel-body">           
					<dl>
                        <dt><?php echo __('Title'); ?></dt>
                        <dd>
                            <?php echo h($product['Product']['title']); ?>
                            &nbsp;
                        </dd>
                        <dt><?php echo __('Description'); ?></dt>
                        <dd>
                            <?php echo h($product['Product']['description']); ?>
                            &nbsp;
                        </dd>
               		</dl>
    				</div>
            </div>
        </div>   
       
        <div class="col-lg-4">
         <div class="panel panel-default">
           <div class="panel-heading">Visibility</div>              
              <div class="panel-body"> 
              <dl>
                <dt><?php echo __('Publish'); ?></dt>
                <dd>
                    <?php echo h($product['Product']['publish']); ?>
                    &nbsp;
                </dd>
                
                <dt><?php echo __('Published At'); ?></dt>
                <dd>
                    <?php echo h($product['Product']['published_at']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Updated At'); ?></dt>
                <dd>
                    <?php echo h($product['Product']['updated_at']); ?>
                    &nbsp;
                </dd>
               </dl>
         	   </div>
            </div>
		  </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
            	<div class="panel-heading">Price</div>              
                <div class="panel-body"> 
                <dl> 
                <dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('List Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['list_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sku'); ?></dt>
		<dd>
			<?php echo h($product['Product']['sku']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barcode'); ?></dt>
		<dd>
			<?php echo h($product['Product']['barcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($product['Product']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($product['Product']['weight']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($product['Product']['tax']); ?>
			&nbsp;
		</dd>
          <dt><?php echo __('Shipping'); ?></dt>
		<dd>
			<?php echo h($product['Product']['shipping']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published At'); ?></dt>
		<dd>
			<?php echo h($product['Product']['published_at']); ?>
			&nbsp;
		</dd>      
               </dl>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Organization</div>              
                <div class="panel-body">
                <dl> 
                <dt><?php echo __('Vendor'); ?></dt>
                <dd>
                    <?php echo h($product['Product']['vendor']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Type'); ?></dt>
                <dd>
                    <?php echo h($product['Product']['type']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Tags'); ?></dt>
                <dd>
                    <?php echo h($product['Product']['tags']); ?>
                    &nbsp;
                </dd>
                <?php			
					 foreach($product['Collect'] as $categry){
				?>
                <span class="peditCategoryList"><?php echo $categry['Category']['title']; ?> <a>x</a></span>
                <?php 
				 }?>
                 </dl>
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
						
						foreach($product['ProductImage'] as $photo){
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
                 	<dl> 
                    <dt><?php echo __('title'); ?></dt>
                    <dd>
                        <?php echo h($product['Metafield']['title']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('description'); ?></dt>
                    <dd>
                        <?php echo h($product['Metafield']['description']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('url_handle'); ?></dt>
                    <dd>
                        <?php echo h($product['Metafield']['url_handle']); ?>
                        &nbsp;
                    </dd>
                    </dl>
                </div>
            </div>
		</div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
            	<div class="panel-heading"> Varients </div>              
                <div class="panel-body">          
                 <dl> 
                    <dt><?php echo __('Option'); ?></dt>
                    <dd>
                        <?php echo h($product['Option'][0]['options_name']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Option Varient'); ?></dt>
                    <dd>
                         <ul>
						<?php  foreach($product['Option'] as $optlist){
                        ?>
                        <li><?php echo $optlist['options_values']; ?> </li>
                        <?php 
                         }?>
                    </ul>
                    </dd>
                   
                    </dl>
				
                 	<div id='TextBoxesGroup'>
                    <?php $var =1; foreach($product['ProductVarient'] as $varlist){ ?>
                    <div id="TextBoxDiv<?php echo $var;?>">
						<div class="varient-group"><label>price</label><input type="text" id="price<?php echo $var;?>" value="<?php echo $varlist['price'];?>"  ></div><div class="varient-group"><label>SKU</label><input type="text" id="sku<?php echo $var;?>" value="<?php echo $varlist['sku'];?>"  ></div><div class="varient-group"><label>BarCode</label><input type="text" id="barcode<?php echo $var;?>" value="<?php echo $varlist['barcode'];?>"  ></div>
                     </div> 
                    <?php $var++;} ?>   
					</div>
                </div>
            </div>
        </div>
    </div>
</div>




</fieldset>



</div>
</div>
</div>






<?php echo $this->element('view_footer'); ?>

</div>