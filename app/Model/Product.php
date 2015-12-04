<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Collect $Collect
 * @property Option $Option
 * @property Order $Order
 * @property ProductImage $ProductImage
 * @property ProductVarient $ProductVarient
 * @property Review $Review
 * @property Wishlist $Wishlist
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $recursive = 2;
	//public $fields = array('id','price','list_price','sku','barcode','quantity','weight','tax','shipping');

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Collect' => array(
			'className' => 'Collect',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('category_id'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ProductImage' => array(
			'className' => 'ProductImage',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('id','img_src', 'img_alt'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Wishlist' => array(
			'className' => 'Wishlist',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public $hasOne = array(
        'Metafield' => array(
            'className' => 'Metafield',
            'foreignKey' => 'key_id',
            'conditions' => array('Metafield.type' => 'product'),
			'fields' =>  array('title', 'description', 'url_handle'),
            'order' => '',
            'limit' => '',
			'recursive'=>'1',
            'dependent' => false
        ),
		'Option' => array(
			'className' => 'Option',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('options_name', 'options_values', 'img_src'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
    );
	
	

}
