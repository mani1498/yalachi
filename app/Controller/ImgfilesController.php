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
			if(isset($this->request->data['Imgfile']['image']['name'])){
			$this->request->data['Imgfile']['image'] = $this->request->data['Imgfile']['image']['name']!='' ? $this->Image->upload_image_and_thumbnail($this->request->data['Imgfile']['image'],573,380,180,110, "Imgfile") : '';
			$this->request->data['Imgfile']['image_url']=BASE_URL.'/Imgfile/'.$this->request->data['Imgfile']['image'];
			$this->Imgfile->create();
			if ($this->Imgfile->save($this->request->data)) {
				$this->Flash->success(__('The imgfile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The imgfile could not be saved. Please, try again.'));
			}
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
			$change = $this->Imgfile->read(null, $id);
			$this->request->data['Imgfile']['image']['name']!='' && $change['Imgfile']['image']!='' ? $this->Image->delete_image($change['Imgfile']['image'],"Imgfile") : '';
			$this->request->data['Imgfile']['image'] = $this->request->data['Imgfile']['image']['name']!='' ? $this->Image->upload_image_and_thumbnail($this->request->data['Imgfile']['image'],573,380,180,110, "Imgfile") : $change['Imgfile']['image'];
			
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
