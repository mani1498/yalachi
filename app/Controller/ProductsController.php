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
	public $components = array('RequestHandler','Paginator', 'Flash', 'Session','ImageResize');
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
		
			$this->request->data['Product']=array('');
			$config = mysqli_connect('localhost','root','','health_oct17');
			$query = mysqli_query($config,"SELECT * FROM `product_details` WHERE  `id` BETWEEN 1 AND 100");
			$n=0;
			while($row = mysqli_fetch_assoc($query)) {
				//debug($row); exit;
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
				
				$this->request->data['Collect']['category_id'] = ($n == 0)? 1 : ($n == 1)? 2 :  ($n == 2)? 3 :  ($n == 3)? 4 :  ($n == 4)? 5 :  ($n == 5)? 6 :  ($n == 6)? 7 :  ($n == 7)? 8 :  ($n == 8)? 9 : 10;
				$this->request->data['Collect']['product_id'] = $product_id;
				$this->Collect->create();
				$this->Collect->save($this->request->data);
				
				$this->request->data['Option']['product_id'] = $product_id;
				$this->request->data['Option']['options_name'] = $row['category_name'];
				$this->request->data['Option']['options_values'] = $row['title'];
				$this->Option->create();
				$this->Option->save($this->request->data);
							
				$this->request->data['ProductVarient']['product_id'] = $product_id;
				$this->request->data['ProductVarient']['price'] = $row['listprice'];
				$this->request->data['ProductVarient']['sku'] = $row['asin'];
				$this->request->data['ProductVarient']['barcode'] = $row['asin'].time();
				$this->ProductVarient->create();
				$this->ProductVarient->save($this->request->data);
				
				$this->request->data['Metafield']['key_id'] = $product_id;
				$this->request->data['Metafield']['title'] = $row['title'];
				$this->request->data['Metafield']['description'] = $row['title'];
				$this->request->data['Metafield']['url_handle'] = $row['asin'].time();
				$this->request->data['Metafield']['type'] = $row['asin'].time();
				$this->Metafield->create();
				$this->Metafield->save($this->request->data);
				
				$this->request->data['ProductImage']['product_id'] = $product_id;
				$this->request->data['ProductImage']['img_alt'] = $row['image_url'];
				$this->request->data['ProductImage']['img_src'] = $row['title'];
				$this->ProductImage->create();
				$this->ProductImage->save($this->request->data);

				$this->Flash->success(__('The product has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			}
			 else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
			$n++;
		  }
	}
	
	public function imagestore(){

		$ProductImages = $this->ProductImage->find('all');
		//debug($ProductImages); exit;
		foreach($ProductImages as $ProductImage){
			
			$path_parts = pathinfo($ProductImage['ProductImage']['img_alt']);
			
			$ProductImage_id = $ProductImage['ProductImage']['id'];
			$product_id = $ProductImage['ProductImage']['product_id'];
			
			$filename = $path_parts['filename'].'.'.$path_parts['extension'];
			
			$image = file_get_contents($ProductImage['ProductImage']['img_alt']);
			file_put_contents(WWW_ROOT.'/img/server/'.$filename, $image); //Where to save the image on your server
			
			$this->ProductImage->id = $ProductImage_id;
			if(file_exists('WWW_ROOT."img/server/')){
				$ProductImage['ProductImage']['img_src'] = $filename;
			}else{
				$ProductImage['ProductImage']['img_src'] = 'empty';
			}
			$this->ProductImage->save($ProductImage);

			$this->ImageResize->prepare(WWW_ROOT."img/server/".$filename);
			$this->ImageResize->resize(160,120);
			$this->ImageResize->save(WWW_ROOT."img/small/".$filename);
			
			$this->ImageResize->prepare(WWW_ROOT."img/server/".$filename);
			$this->ImageResize->resize(300,200);
			$this->ImageResize->save(WWW_ROOT."img/medium/".$filename);
			
			$this->ImageResize->prepare(WWW_ROOT."img/server/".$filename);
			$this->ImageResize->resize(600,400);
			$this->ImageResize->save(WWW_ROOT."img/large/".$filename);
		}
		exit;
	}
	
	public function imagestoredb(){

		$ProductImages = $this->ProductImage->find('all');
		foreach($ProductImages as $ProductImage){
			$path_parts = pathinfo($ProductImage['ProductImage']['img_alt']);
			$filterfilename =  str_replace('%','',$path_parts['filename']);
			if(isset($path_parts['extension'])){
			  $filename = $filterfilename.'.'.$path_parts['extension']; 
			  $ProductImage['ProductImage']['img_src'] = $filename;
			}else{
			  $ProductImage['ProductImage']['img_src'] = 'NA';
			}
		}
		$this->ProductImage->id = $ProductImage['ProductImage']['id'];
		$this->ProductImage->save($ProductImage);
		exit;
	}
	
	
	public function changefilename(){
		
		$ProductImages = $this->ProductImage->find('all');
		
		foreach($ProductImages as $ProductImage){
			
			$path_parts = pathinfo($ProductImage['ProductImage']['img_alt']);
			
			
			if(isset($path_parts['extension'])){
				$filenameold = $path_parts['filename'].'.'.$path_parts['extension'];			
				$filenamenew = $ProductImage['ProductImage']['img_src'];
				
				$oldpath_s = WWW_ROOT."img/small/".$filenameold;
				$newpath_s = WWW_ROOT."img/small/".$filenamenew;
				rename($oldpath_s, $newpath_s);
				
				$oldpath_m = WWW_ROOT."img/medium/".$filenameold;
				$newpath_m = WWW_ROOT."img/medium/".$filenamenew;
				rename($oldpath_m, $newpath_m);
				
				$oldpath_l = WWW_ROOT."img/large/".$filenameold;
				$newpath_l = WWW_ROOT."img/large/".$filenamenew;
				rename($oldpath_l, $newpath_l);
			}
			
			
		}
		exit;
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
				if(isset($this->request->data['ProductVarient']['val'])){
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
				self::categoryList();
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		else{
			self::categoryList();
		}
	}
	
	private function categoryList(){
		$this->Category->unBindModel(array('hasOne' => array('Metafield'),'hasMany' => array('Collect')));
		$options = array('conditions' => array('Category.publish' => 1),'fields'=> array('Category.id','Category.title'));
		$category= $this->Category->find('all', $options);
		foreach($category as $key => $values) {
			$value[$values['Category']['id']]= $values['Category']['title'];
		}
		$this->set('category', $value);
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
	
	public function index(){
		$this->layout='angular';
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
