<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Collect $Collect
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
   
    /*public $actsAs = array(
        'Upload.Upload' => array(
            'img_src' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        )
    );*/
	
	public $displayField = 'title';
	public $recursive = 2;
	
	public $validate = array(
        'title' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long'
        ),
		'description' => array(
            'rule' => 'notBlank',
        ),
		'img_src' => array(
			'rule' => array(
				'extension',
				array('gif', 'jpeg', 'png', 'jpg')
			),
			'message' => 'Please supply a valid image.'
		),
		'publish' => array(
			'rule' => array('boolean'),
			'message' => 'Incorrect value for myCheckbox'
		)
    );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Collect' => array(
			'className' => 'Collect',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('product_id'),
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
            'conditions' => array('Metafield.type' => 'category'),
			'fields' =>  array('id','key_id','title', 'description', 'url_handle'),
            'order' => '',
            'limit' => '',
            'dependent' => false
        )
	);

}
