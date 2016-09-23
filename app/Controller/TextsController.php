<?php
App::uses('AppController', 'Controller');
/**
 * Texts Controller
 *
 * @property Text $Text
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TextsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Text->recursive = 0;
		$this->set('texts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Text->exists($id)) {
			throw new NotFoundException(__('Invalid text'));
		}
		$options = array('conditions' => array('Text.' . $this->Text->primaryKey => $id));
		$this->set('text', $this->Text->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Text->create();
			$this->request->data["Text"]["slug"] = strtolower(Inflector::slug($this->request->data["Text"]["title"]));
			if ($this->Text->save($this->request->data)) {
				$this->Flash->success(__('The text has been saved.'));
				// $this->Session->setFlash(__('The text has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The text could not be saved.'));
				// $this->Session->setFlash(__('The text could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Text->exists($id)) {
			throw new NotFoundException(__('Invalid text'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Text->save($this->request->data)) {
				$this->Flash->success(__('The text has been saved.'));
				// $this->Session->setFlash(__('The text has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The text could not be saved.'));
				// $this->Session->setFlash(__('The text could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Text.' . $this->Text->primaryKey => $id));
			$this->request->data = $this->Text->find('first', $options);
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
		$this->Text->id = $id;
		if (!$this->Text->exists()) {
			throw new NotFoundException(__('Invalid text'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Text->delete()) {
			$this->Flash->success(__('The text has been deleted.'));
			// $this->Session->setFlash(__('The text has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Flash->error(__('The text could not be deleted.'));
			// $this->Session->setFlash(__('The text could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
