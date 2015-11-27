<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class SettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
	public $layout = 'admin';

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->checkadmin();
		if (!$this->Setting->exists(1)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Setting->save($this->request->data)) {//echo '<pre>';print_r($this->request->data);exit;
				$this->Flash->success(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {echo 'no';exit;
				$this->Flash->error(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => 1));
			$this->request->data = $this->Setting->find('first', $options);
		}
		//$this->set('settings', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
		$this->set('setting', $this->Setting->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				$this->Flash->success(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The setting could not be saved. Please, try again.'));
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
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Setting->save($this->request->data)) {
				$this->Flash->success(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
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
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Setting->delete()) {
			$this->Flash->success(__('The setting has been deleted.'));
		} else {
			$this->Flash->error(__('The setting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
