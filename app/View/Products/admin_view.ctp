<div class="products view">
<h2><?php echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
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
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($product['Product']['publish']); ?>
			&nbsp;
		</dd>
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
		<dt><?php echo __('Varients'); ?></dt>
		<dd>
			<?php echo h($product['Product']['varients']); ?>
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
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($product['Product']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
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
</div>
<div class="related">
	<h3><?php echo __('Related Collects'); ?></h3>
	<?php if (!empty($product['Collect'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['Collect'] as $collect): ?>
		<tr>
			<td><?php echo $collect['id']; ?></td>
			<td><?php echo $collect['category_id']; ?></td>
			<td><?php echo $collect['product_id']; ?></td>
			<td><?php echo $collect['created_at']; ?></td>
			<td><?php echo $collect['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'collects', 'action' => 'view', $collect['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'collects', 'action' => 'edit', $collect['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'collects', 'action' => 'delete', $collect['id']), array('confirm' => __('Are you sure you want to delete # %s?', $collect['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Collect'), array('controller' => 'collects', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Options'); ?></h3>
	<?php if (!empty($product['Option'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Options Name'); ?></th>
		<th><?php echo __('Options Values'); ?></th>
		<th><?php echo __('Img Src'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['Option'] as $option): ?>
		<tr>
			<td><?php echo $option['id']; ?></td>
			<td><?php echo $option['product_id']; ?></td>
			<td><?php echo $option['options_name']; ?></td>
			<td><?php echo $option['options_values']; ?></td>
			<td><?php echo $option['img_src']; ?></td>
			<td><?php echo $option['created_at']; ?></td>
			<td><?php echo $option['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'options', 'action' => 'view', $option['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'options', 'action' => 'edit', $option['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'options', 'action' => 'delete', $option['id']), array('confirm' => __('Are you sure you want to delete # %s?', $option['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Option'), array('controller' => 'options', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($product['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Bill Date'); ?></th>
		<th><?php echo __('Required Date'); ?></th>
		<th><?php echo __('Shipped Date'); ?></th>
		<th><?php echo __('Ship Via'); ?></th>
		<th><?php echo __('Ship Name'); ?></th>
		<th><?php echo __('Ship Address'); ?></th>
		<th><?php echo __('Ship Phone'); ?></th>
		<th><?php echo __('Ship Email'); ?></th>
		<th><?php echo __('Order Status'); ?></th>
		<th><?php echo __('Payment Status'); ?></th>
		<th><?php echo __('Unit Price'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Fullfilled'); ?></th>
		<th><?php echo __('Published At'); ?></th>
		<th><?php echo __('Modified At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['product_id']; ?></td>
			<td><?php echo $order['customer_id']; ?></td>
			<td><?php echo $order['bill_date']; ?></td>
			<td><?php echo $order['required_date']; ?></td>
			<td><?php echo $order['shipped_date']; ?></td>
			<td><?php echo $order['ship_via']; ?></td>
			<td><?php echo $order['ship_name']; ?></td>
			<td><?php echo $order['ship_address']; ?></td>
			<td><?php echo $order['ship_phone']; ?></td>
			<td><?php echo $order['ship_email']; ?></td>
			<td><?php echo $order['order_status']; ?></td>
			<td><?php echo $order['payment_status']; ?></td>
			<td><?php echo $order['unit_price']; ?></td>
			<td><?php echo $order['discount']; ?></td>
			<td><?php echo $order['quantity']; ?></td>
			<td><?php echo $order['fullfilled']; ?></td>
			<td><?php echo $order['published_at']; ?></td>
			<td><?php echo $order['modified_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Product Images'); ?></h3>
	<?php if (!empty($product['ProductImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Img Src'); ?></th>
		<th><?php echo __('Img Alt'); ?></th>
		<th><?php echo __('Published At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['ProductImage'] as $productImage): ?>
		<tr>
			<td><?php echo $productImage['id']; ?></td>
			<td><?php echo $productImage['product_id']; ?></td>
			<td><?php echo $productImage['img_src']; ?></td>
			<td><?php echo $productImage['img_alt']; ?></td>
			<td><?php echo $productImage['published_at']; ?></td>
			<td><?php echo $productImage['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'product_images', 'action' => 'view', $productImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'product_images', 'action' => 'edit', $productImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'product_images', 'action' => 'delete', $productImage['id']), array('confirm' => __('Are you sure you want to delete # %s?', $productImage['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Image'), array('controller' => 'product_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Product Varients'); ?></h3>
	<?php if (!empty($product['ProductVarient'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('List Price'); ?></th>
		<th><?php echo __('Sku'); ?></th>
		<th><?php echo __('Barcode'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Tax'); ?></th>
		<th><?php echo __('Shipping'); ?></th>
		<th><?php echo __('Published At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['ProductVarient'] as $productVarient): ?>
		<tr>
			<td><?php echo $productVarient['id']; ?></td>
			<td><?php echo $productVarient['product_id']; ?></td>
			<td><?php echo $productVarient['price']; ?></td>
			<td><?php echo $productVarient['list_price']; ?></td>
			<td><?php echo $productVarient['sku']; ?></td>
			<td><?php echo $productVarient['barcode']; ?></td>
			<td><?php echo $productVarient['quantity']; ?></td>
			<td><?php echo $productVarient['weight']; ?></td>
			<td><?php echo $productVarient['tax']; ?></td>
			<td><?php echo $productVarient['shipping']; ?></td>
			<td><?php echo $productVarient['published_at']; ?></td>
			<td><?php echo $productVarient['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'product_varients', 'action' => 'view', $productVarient['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'product_varients', 'action' => 'edit', $productVarient['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'product_varients', 'action' => 'delete', $productVarient['id']), array('confirm' => __('Are you sure you want to delete # %s?', $productVarient['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Varient'), array('controller' => 'product_varients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reviews'); ?></h3>
	<?php if (!empty($product['Review'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Publish'); ?></th>
		<th><?php echo __('Published At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['Review'] as $review): ?>
		<tr>
			<td><?php echo $review['id']; ?></td>
			<td><?php echo $review['customer_id']; ?></td>
			<td><?php echo $review['product_id']; ?></td>
			<td><?php echo $review['rating']; ?></td>
			<td><?php echo $review['title']; ?></td>
			<td><?php echo $review['comments']; ?></td>
			<td><?php echo $review['publish']; ?></td>
			<td><?php echo $review['published_at']; ?></td>
			<td><?php echo $review['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reviews', 'action' => 'view', $review['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reviews', 'action' => 'edit', $review['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reviews', 'action' => 'delete', $review['id']), array('confirm' => __('Are you sure you want to delete # %s?', $review['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Wishlists'); ?></h3>
	<?php if (!empty($product['Wishlist'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['Wishlist'] as $wishlist): ?>
		<tr>
			<td><?php echo $wishlist['id']; ?></td>
			<td><?php echo $wishlist['customer_id']; ?></td>
			<td><?php echo $wishlist['product_id']; ?></td>
			<td><?php echo $wishlist['created_at']; ?></td>
			<td><?php echo $wishlist['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'wishlists', 'action' => 'view', $wishlist['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'wishlists', 'action' => 'edit', $wishlist['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wishlists', 'action' => 'delete', $wishlist['id']), array('confirm' => __('Are you sure you want to delete # %s?', $wishlist['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Wishlist'), array('controller' => 'wishlists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
