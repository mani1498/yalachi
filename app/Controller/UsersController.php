<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler','Paginator', 'Flash', 'Session');
	public $layout = 'admin';
	public $uses = array('Product','Category','Collect','Option','ProductImage','ProductVarient','Metafield','Review');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'site';
		/*$this->Collect->Product->unBindModel(array('hasMany' => array('Order','Wishlist','ProductVarient','Collect','Review')));
		$this->Collect->Product->unBindModel(array('hasOne' => array('Option','Metafield')));
		$this->Collect->Category->unBindModel(array('hasMany' => array('Collect')));
		$this->Collect->Category->unBindModel(array('hasOne' => array('Metafield')));
		$category = $this->Collect->find('all');
		$this->set(array('Category' => $category,'_serialize' => array('Category')));*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		//$this->checkadmin();
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate('User',array('User.privilages' => 'subadmin')));
	}
	
	
	public function admin_customers() {
		//$this->checkadmin();
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate('User',array('User.privilages' => 'cutomers')));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
	
	public function admin_customer_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$photo='';
		$photo1=array('');
		if ($this->request->is('post')) {
			if(isset($this->request->data['User']['photo'])){
				foreach($this->request->data['User']['photo'] as $photo){
					$photo1[] = $photo!='' ? $this->Image->upload_image_and_thumbnail($photo,573,380,180,110, "admin") : '';
				}
		        $this->request->data['User']['photo']=implode(',',$photo1);
			}
			$this->User->create($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_login() {
		
		$this->layout = 'adminlogin';
		//
		if($this->request->is('post')){
			if(!empty($this->request->data['User']['email'])){
				
			}
			else{
				
				$options = array('conditions' => array('User.email'=>$this->request->data['User']['username']));
		        $check = $this->User->find('first', $options);
				if(!empty($check)){
					if($check['User']['password'] == $this->request->data['User']['password']){
						if($check['User']['privilages'] == 'admin'){
							$this->Session->write($check);
							
							$this->redirect(array('controller'=>'users','action'=>'index','admin'=>true));
						}
						else
							$this->Session->setFlash("<div class='error msg'>Account suspended.</div>,Sorry. Your account has been suspended by site admin.",'');
					}
					else
						$this->Session->setFlash("<div class='error msg'>Invalid Password.</div>,You entered an incorrect password. Please try again.",'');
				}
				else
					$this->Session->setFlash("<div class='error msg'>Invalid Username.</div>,You entered an incorrect username. Please try again.",'');
				$this->set('result','login');
			}
		}
		else
			$this->set('result','login');
	}
	
/**
 * admin_logout method
 *
 * @return void
 */	
	public function admin_logout() {
		$this->Session->delete('User');
		$this->redirect(array('controller'=>'users','action'=>'login'));
	}
	
	public function admin_dashboard() {
		$this->layout = 'admin';
	}
	
	public function login() {
		$this->layout = ''; 
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		if($this->request->is('post')){
				$options = array('conditions' => array('User.email'=>$this->request->data['User']['username']));
		        $check = $this->User->find('first', $options);
				if(!empty($check)){
					if($check['User']['password'] == $this->request->data['User']['password']){
					 $this->Session->write($check);
					 $session_id = $this->Session->id();
					 $responseLogin = array('userInfo'=>array('email'=>$check['User']['email'],'sessionId'=>$session_id,'firstName'=>$check['User']['first_name']),'message'=>'Login Success','Response'=>'S');
					}
					else
					 $responseLogin = array('message'=>'Invalid Password','Response'=>'E');
				}
				else
					$responseLogin = array('message'=>'Invalid Username','Response'=>'E');
		}else{
			$responseLogin = array('message'=>'Invalid methods','Response'=>'E');
		}
		$this->set(array('userLogin' => $responseLogin,'_serialize' => array('userLogin')));
	}

	public function registration() {
		$this->layout = ''; 
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		if ($this->request->is('post')) {
			$options = array('conditions' => array('User.email'=>$this->request->data['User']['email']));
		     $check = $this->User->find('first', $options);
			if(empty($check)){
				$this->User->create($this->request->data);
				if ($this->User->save($this->request->data)) {
					$responseRegistration = array('message'=>'Registration Success','Response'=>'S');
				} else {
					$responseRegistration = array('message'=>'The user could not be saved. Please, try again.','Response'=>'E');
				}
			}else{
					$responseRegistration = array('message'=>'Email already exists. Please, try another email.','Response'=>'E');
			}
		}else{
				$responseRegistration = array('message'=>'Invalid methods','Response'=>'E');
		}
		$this->set(array('userRegistration' => $responseRegistration,'_serialize' => array('userRegistration')));
	}
	

		

}
