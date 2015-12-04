<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {
	public $uses = array('Product','Category','Collect','Option','ProductImage','ProductVarient','Metafield','Review');
/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler','Paginator', 'Flash', 'Session');
	public $layout = 'admin';
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Product->unBindModel(array('hasOne' => array('Metafield','Option'),'hasMany' => array('Collect','ProductImage','Order','Review','Wishlist')));
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate('Product',array('Product.publish' => 1)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function admin_dbadd() {
		if ($this->request->is('post')) {
			$this->request->data['Product']=array('');
			$config = mysqli_connect('localhost','root','','health');
			$query = mysqli_query($config,"SELECT * FROM `product_details` WHERE  `amazon_rank` <= 1500 and `competitorcount` <= 3 and `id` BETWEEN 61 AND 300");
			$n=0;
			while($row = mysqli_fetch_assoc($query)) {
				$this->request->data['Product']['title']=$row['title'];
				$this->request->data['Product']['description']=$row['category_name'];
				$this->request->data['Product']['publish']=1;
				$this->request->data['Product']['price']=$row['listprice'];
				$this->request->data['Product']['list_price']=$row['lowestprice'];
				$this->request->data['Product']['sku']=$row['asin'];
				$this->request->data['Product']['barcode']=$row['asin'].time();
				$this->request->data['Product']['quantity']=10;
				$this->request->data['Product']['weight']=2;
				$this->request->data['Product']['tax']=1;
				$this->request->data['Product']['shipping']=1;
				$this->request->data['Product']['varients']=1;
				$this->request->data['Product']['vendor']=$row['sold_by'];
				$this->request->data['Product']['type']=$row['brand'];
				$this->request->data['Product']['tags']=$row['title'];
			
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				
				$product_id = $this->Product->getLastInsertId();
				//debug($product_id); exit;
				
				$this->request->data['Collect']['category_id'] = $this->request->data['Collect']['name'];
				$this->request->data['Collect']['product_id'] = $product_id;
				$this->request->data['Option']['product_id'] = $product_id;
				$this->request->data['ProductImage']['product_id'] = $product_id;
				$this->request->data['ProductVarient']['product_id'] = $product_id;
				
				$this->request->data['Option']['options_name'] = $row['category_name'];
				$this->request->data['Option']['options_values'] = $row['title'];
				
				$this->request->data['ProductVarient']['price'] = $row['listprice'];
				$this->request->data['ProductVarient']['sku'] = $row['asin'];
				$this->request->data['ProductVarient']['barcode'] = $row['asin'].time();
				
				$this->request->data['Metafield']['title'] = $row['title'];
				$this->request->data['Metafield']['description'] = $row['category_name'];
				$this->request->data['Metafield']['url_handle'] = $row['asin'].time();
				$this->request->data['Metafield']['type'] = $row['asin'].time();
				
				$this->request->data['ProductImage']['img_alt'] = $row['title'];
				$this->request->data['ProductImage']['img_src'] = $row['title'];
				
				$this->Collect->create();
				$this->Collect->save($this->request->data);
				
				$this->Option->create();
				$this->Option->save($this->request->data);
				
				$this->ProductImage->create();
				$this->ProductImage->save($this->request->data);
				
				$this->ProductVarient->create();
				$this->ProductVarient->save($this->request->data);
				
				$this->Metafield->create();
				$this->Metafield->save($this->request->data);
				
				$this->ProductImage->create();
				$this->ProductImage->save($this->request->data);

				$this->Flash->success(__('The product has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			}
			 else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		  }
		}
	}
	
	/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
				
			if(isset($this->request->data['ProductVarient']))
			$this->request->data['Product']['varients'] = true;
			//echo '<pre>';print_r($this->request->data);exit;
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$product_id = $this->Product->getLastInsertId();
				$this->request->data['Option']['product_id'] = $product_id;
				$this->request->data['ProductVarient']['product_id'] = $product_id;
				if(!empty($this->request->data['Collect']['category_id'])){	
				  foreach($this->request->data['Collect']['category_id'] as $cid){
					$this->request->data['Collect']['product_id'] = $product_id;
					$this->request->data['Collect']['category_id'] = $cid;
					$this->Collect->create();
					$this->Collect->save($this->request->data);
				  }
				}
				
				
				if($this->request->data['ProductImage']['img_src'][0]['name'] != ''){
				  foreach($this->request->data['ProductImage']['img_src'] as $photo){
					$this->request->data['ProductImage']['img_src'] = $photo!='' ? $this->Image->upload_image_and_thumbnail($photo,573,380,180,110, "product") : '';
					$this->request->data['ProductImage']['product_id'] = $product_id;
					$this->ProductImage->create();
					$this->ProductImage->save($this->request->data);
				  }
				}
				else
				$this->request->data['ProductImage']['img_src']=0;
				
				if(!empty($this->request->data['Option']['options_name'])){	
				  foreach($this->request->data['Option']['val'] as $oid){
					$this->request->data['Option']['options_values'] = $oid['options_values'];
					$this->Option->create();
					$this->Option->save($this->request->data);
				  }
				}
				if(isset($this->request->data['ProductVarient'])){
				  foreach($this->request->data['ProductVarient']['val']  as  $value){
					$this->request->data['ProductVarient']['price'] = $value['price'];
					$this->request->data['ProductVarient']['sku'] = $value['sku'];
					$this->request->data['ProductVarient']['barcode'] = $value['barcode'];
					
					$this->request->data['ProductVarient']['list_price'] = $this->request->data['Product']['list_price'];
					$this->request->data['ProductVarient']['quantity'] = $this->request->data['Product']['quantity'];
					$this->request->data['ProductVarient']['weight'] = $this->request->data['Product']['weight'];
					$this->request->data['ProductVarient']['tax'] = $this->request->data['Product']['tax'];
					$this->request->data['ProductVarient']['shipping'] = $this->request->data['Product']['shipping'];
					$this->request->data['ProductVarient']['price'] = $this->request->data['Product']['price'];
					
					$this->ProductVarient->create();
					$this->ProductVarient->save($this->request->data);
				  }
				  
				}
				$this->request->data['Metafield']['key_id'] = $product_id;
				$this->Metafield->create();
				$this->Metafield->save($this->request->data);
				
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		else{
			$this->Category->unBindModel(array('hasOne' => array('Metafield'),'hasMany' => array('Collect')));
			$options = array('conditions' => array('Category.publish' => 1),'fields'=> array('Category.id','Category.title'));
			$category= $this->Category->find('all', $options);
			foreach($category as $key => $values) {
				$value[$values['Category']['id']]= $values['Category']['title'];
			}
			$this->set('category', $value);
		}
	}


	public function details($id = null) {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		$this->layout='';
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->Product->unBindModel(array('hasMany' => array('Order','Wishlist')));
		$this->Collect->unBindModel(array('belongsTo' => array('Product')));
		$this->ProductImage->unBindModel(array('belongsTo' => array('Product')));
		$this->ProductVarient->unBindModel(array('belongsTo' => array('Product','Option')));
		$this->Metafield->unBindModel(array('belongsTo' => array('Product','Category')));
		$this->Review->unBindModel(array('belongsTo' => array('Product')));
		$this->Option->unBindModel(array('belongsTo' => array('Product')));
		$this->Option->unBindModel(array('hasMany' => array('ProductVarient')));

		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id),'fields'=> array('Product.title','Product.description','Product.vendor','Product.type','Product.tags','Product.publish','Product.price','Product.list_price','Product.sku','Product.barcode','Product.quantity','Product.weight','Product.varients','Product.tax','Product.shipping'));
		
		$product = $this->Product->find('first', $options);
		$this->set(array('Product' => $product,'_serialize' => array('Product')));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//echo '<pre>';print_r($this->request->data);exit;
			if ($this->Product->save($this->request->data)) {
				 if($this->request->data['ProductImage']['img_src'][0]['name'] != ''){
				  foreach($this->request->data['ProductImage']['img_src'] as $photo){
					$this->request->data['ProductImage']['img_src'] = $photo!='' ? $this->Image->upload_image_and_thumbnail($photo,573,380,180,110, "product") : '';
					$this->request->data['ProductImage']['product_id'] = $id;
					$this->ProductImage->create();
					$this->ProductImage->save($this->request->data);
				  }
				}
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this->Product->unBindModel(array('hasMany' => array('Order','Wishlist')));
			$this->Collect->unBindModel(array('belongsTo' => array('Product')));
			$this->ProductImage->unBindModel(array('belongsTo' => array('Product')));
			$this->ProductVarient->unBindModel(array('belongsTo' => array('Product','Option')));
			$this->Metafield->unBindModel(array('belongsTo' => array('Product','Category')));
			$this->Review->unBindModel(array('belongsTo' => array('Product')));
			$this->Option->unBindModel(array('belongsTo' => array('Product')));
			$this->Option->unBindModel(array('hasMany' => array('ProductVarient')));
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
			$this->Category->unBindModel(array('hasOne' => array('Metafield'),'hasMany' => array('Collect')));
			$options = array('conditions' => array('Category.publish' => 1),'fields'=> array('Category.id','Category.title'));
			$category= $this->Category->find('all', $options);
			foreach($category as $key => $values) {
				$value[$values['Category']['id']]= $values['Category']['title'];
			}
			$this->set('category', $value);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Flash->success(__('The product has been deleted.'));
		} else {
			$this->Flash->error(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
