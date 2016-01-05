<?php
App::uses('AppModel', 'Model');
/**
 * Metafield Model
 *
 */
class Metafield extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $validate = array(
        'url_handle' => array(
            'rule' => 'notBlank',
        ),
	); 
	public $displayField = 'title';
	
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'key_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'key_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
