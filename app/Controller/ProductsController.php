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
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Product']=array('');
			
			if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='shopping.com'){
				$config = mysqli_connect('localhost','root','','health');
			}
			$query = mysqli_query($config,"SELECT * FROM `product_details` WHERE  `amazon_rank` <= 1500 and `competitorcount` <= 3 and `id` BETWEEN 61 AND 300");
			//echo '<pre>';print_r($query);exit;
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
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
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
