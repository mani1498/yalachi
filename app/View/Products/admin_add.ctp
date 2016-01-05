<div id="page-wrapper">

<?php echo $this->Html->css('selectivity-full.css');
 echo $this->Form->create('Product',array('id'=>'userAdd','type' => 'file','role'=>'form')); ?>
    <legend><?php echo __('Add Product'); ?></legend>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            	<div class="panel-heading">Products</div>              
                <div class="panel-body">           
                <?php 
                  echo $this->Form->input('title',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Title','id'=>'pTitle','onChange'=>'toggle(this.value)'));
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
					echo $this->Form->input('price',array('div'=>false,'error'=>false,'type'=>'text', 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('list_price',array('div'=>false,'error'=>false,'type'=>'text', 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('sku',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('barcode',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('quantity',array('div'=>false,'error'=>false,'type'=>'text', 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					echo $this->Form->input('weight',array('div'=>false,'error'=>false,'type'=>'text', 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
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
					//echo $this->Html->tag('label', 'Tags');
					//echo $this->Html->tag('ul', '', array('id'=>'removeConfirmationTags','name'=>''));
					
					echo $this->Form->input('Collect.category_id',array('div'=>false,'error'=>false, 'name'=>'Collect[category_id][]', 'type'=>'select','multiple', 'options'=>$category, 'before' => '<div class="form-group">', 'after' => '</div>' , 'class'=>'validate[required]' ,'id'=>'multiple-select-box'));
				?><input type="hidden" name="data[Product][tags]" id="tagProduct" />
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
						echo $this->Form->input('ProductImage.img_alt',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
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
            	<div class="panel-heading">Add Varients <span class="varient-enable glyphicon glyphicon-plus"></span></div>              
                <div class="panel-body" id="varient_body">           
                 <?php
						echo $this->Form->input('Option.options_name',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control'));
					    //echo $this->Html->tag('span', '', array('class' => 'selectivity-input','id'=>'emails-input' ,'name'=>'Option[options_values][]'));
						echo $this->Html->tag('label', 'Option Values');
						echo $this->Html->tag('ul', '', array('id'=>'eventTags'));
				 ?>
                 
                 <div id='TextBoxesGroup'>	</div>
                </div>
            </div>
        </div>
    </div>
    <div id="varient-wrapper"></div>
    
    <?php echo $this->Form->submit(__('Submit'),array('div'=>false, 'class'=>'btn btn-lg btn-success btn-block' ,'id' => 'getVarientValue')); echo $this->Form->end();	?>
</div>
<script type="text/javascript">
function toggle(element) {
        document.getElementById('urlHandleProduct').value = element;
}
</script>