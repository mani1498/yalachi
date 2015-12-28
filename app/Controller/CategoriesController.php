<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CategoriesController extends AppController {
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
		
		$this->Category->unBindModel(array('hasOne' => array('Metafield'),'hasMany' => array('Collect')));
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate('Category',array('Category.publish' => 1)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}
	
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		}
	}
	

	public function admin_all() {
	    header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		$this->layout = '';
 		$this->Collect->Product->unBindModel(array('hasMany' => array('Order','Wishlist','ProductVarient','Collect','Review')));
		$this->Collect->Product->unBindModel(array('hasOne' => array('Option','Metafield')));
		$this->Collect->Category->unBindModel(array('hasMany' => array('Collect')));
		$this->Collect->Category->unBindModel(array('hasOne' => array('Metafield')));
		$category = $this->Collect->find('all',array('conditions'=>array('not' => array('Product.price' => 0.00))));
		$this->set(array('Category' => $category,'_serialize' => array('Category')));
		
	}
	
	public function admin_product($title = null) {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		$this->layout = '';
		$this->Collect->Product->unBindModel(array('hasMany' => array('Order','Wishlist','ProductVarient','Collect','Review')));
		$this->Collect->Product->unBindModel(array('hasOne' => array('Option','Metafield')));
		$this->Collect->Category->unBindModel(array('hasMany' => array('Collect')));
		$this->Collect->Category->unBindModel(array('hasOne' => array('Metafield')));
		
		$categories = $this->Collect->find('all',array('conditions' => array('Category.title'=> $title)));
		foreach($categories as $category){
			$categorygroup[$category['Category']['title']][] = $category;
		}
		$this->set(array('Category' => $categorygroup,'_serialize' => array('Category')));
		
	}
	
	public function admin_details($id = null) {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		$this->layout = '';
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		
		$this->Collect->unBindModel(array('belongsTo' => array('Category')));
		$this->Metafield->unBindModel(array('belongsTo' => array('Product','Category')));
		
		$options = array('conditions' => array('Category.' .$this->Category->primaryKey => $id));
		$category = $this->Category->find('first', $options);
		$this->set(array('Category' => $category,'_serialize' => array('Category')));		
		
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			
			if(isset($this->request->data['Category']['img_src']['name'])){
				$this->request->data['Category']['img_src'] = $this->request->data['Category']['img_src']['name']!='' ? $this->Image->upload_image_and_thumbnail($this->request->data['Category']['img_src'],573,380,180,110, "Category") : '';
				$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
			}
		}

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}
	
	
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$change = $this->Category->read(null, $id);
			$this->request->data['Category']['img_src']['name']!='' && $change['Category']['img_src']!='' ? $this->Image->delete_image($change['Category']['img_src'],"Category") : '';
			$this->request->data['Category']['img_src'] = $this->request->data['Category']['img_src']['name']!='' ? $this->Image->upload_image_and_thumbnail($this->request->data['Category']['img_src'],573,380,180,110, "Category") : $change['Category']['img_src'];
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Flash->success(__('The category has been deleted.'));
		} else {
			$this->Flash->error(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
