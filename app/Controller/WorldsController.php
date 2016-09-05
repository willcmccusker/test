<?php
App::uses('AppController', 'Controller');
/**
 * Worlds Controller
 *
 * @property World $World
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class WorldsController extends AppController {

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
		$this->World->recursive = 0;
		$this->set('worlds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->World->exists($id)) {
			throw new NotFoundException(__('Invalid world'));
		}
		$options = array('conditions' => array('World.' . $this->World->primaryKey => $id));
		$this->set('world', $this->World->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->World->create();
			if ($this->World->save($this->request->data)) {
				$this->Session->setFlash(__('The world has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The world could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$dataSets = $this->World->DataSet->find('list');
		$this->set(compact('dataSets'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->World->exists($id)) {
			throw new NotFoundException(__('Invalid world'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->World->save($this->request->data)) {
				$this->Session->setFlash(__('The world has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The world could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('World.' . $this->World->primaryKey => $id));
			$this->request->data = $this->World->find('first', $options);
		}
		$dataSets = $this->World->DataSet->find('list');
		$this->set(compact('dataSets'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->World->id = $id;
		if (!$this->World->exists()) {
			throw new NotFoundException(__('Invalid world'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->World->delete()) {
			$this->Session->setFlash(__('The world has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The world could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
