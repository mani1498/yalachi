<?php
App::uses('AppController', 'Controller');
/**
 * Imgfiles Controller
 *
 * @property Imgfile $Imgfile
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ImgfilesController extends AppController {

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
		$this->Imgfile->recursive = 0;
		$this->set('imgfiles', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Imgfile->exists($id)) {
			throw new NotFoundException(__('Invalid imgfile'));
		}
		$options = array('conditions' => array('Imgfile.' . $this->Imgfile->primaryKey => $id));
		$this->set('imgfile', $this->Imgfile->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Imgfile->create();
			if ($this->Imgfile->save($this->request->data)) {
				$this->Flash->success(__('The imgfile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The imgfile could not be saved. Please, try again.'));
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
		if (!$this->Imgfile->exists($id)) {
			throw new NotFoundException(__('Invalid imgfile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Imgfile->save($this->request->data)) {
				$this->Flash->success(__('The imgfile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The imgfile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Imgfile.' . $this->Imgfile->primaryKey => $id));
			$this->request->data = $this->Imgfile->find('first', $options);
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
		$this->Imgfile->id = $id;
		if (!$this->Imgfile->exists()) {
			throw new NotFoundException(__('Invalid imgfile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Imgfile->delete()) {
			$this->Flash->success(__('The imgfile has been deleted.'));
		} else {
			$this->Flash->error(__('The imgfile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
