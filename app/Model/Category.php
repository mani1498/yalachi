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
				'thumbnailSizes' => array(
                    'xvga' => '1024x768',
                    'vga' => '640x480',
                    'thumb' => '80x80'
                ),
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        )
    );*/
	
	/*public $actsAs = array(
        'Upload.Upload' => array(
			'resume',
            'img_src' => array(
                'thumbnailSizes' => array(
                    'xvga' => '1024x768',
                    'vga' => '640x480',
                    'thumb' => '80x80'
                )
            )
        )
    );*/

   //public $actsAs = array('Upload.Upload' => array('img_src'));
   
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
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
