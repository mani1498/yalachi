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
			'fields' => array('Category.title'),
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
