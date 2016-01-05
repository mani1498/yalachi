<?php
App::uses('AppModel', 'Model');
/**
 * ProductImage Model
 *
 * @property Product $Product
 */
class ProductImage extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

	public $validate = array(
       'img_src' => array(
			'rule' => array(
				'extension',
				array('gif', 'jpeg', 'png', 'jpg')
			),
			'message' => 'Please supply a valid image.'
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
