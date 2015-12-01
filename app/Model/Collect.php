<?php
App::uses('AppModel', 'Model');
/**
 * Collect Model
 *
 * @property Category $Category
 * @property Product $Product
 */
class Collect extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'category_id';
	public $recursive = 2;

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => array('Category.id','Category.title'),
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => array('Product.id','Product.title','Product.description','Product.vendor','Product.type','Product.tags','Product.publish','Product.price','Product.list_price','Product.sku','Product.barcode','Product.quantity','Product.weight','Product.varients','Product.tax','Product.shipping'),
			'order' => ''
		)
	);
}
