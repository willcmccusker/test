<?php
App::uses('AppController', 'Controller');
/**
 * GDPs Controller
 *
 * @property GDP $GDP
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class GDPsController extends AppController {

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
		$this->GDP->recursive = 0;
		$this->set('gDPs', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->GDP->exists($id)) {
			throw new NotFoundException(__('Invalid g d p'));
		}
		$options = array('conditions' => array('GDP.' . $this->GDP->primaryKey => $id));
		$this->set('gDP', $this->GDP->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->GDP->create();
			if ($this->GDP->save($this->request->data)) {
				$this->Flash->success(__('The g d p has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The g d p could not be saved. Please, try again.'));
			}
		}
		$dataSets = $this->GDP->DataSet->find('list');
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
		if (!$this->GDP->exists($id)) {
			throw new NotFoundException(__('Invalid g d p'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GDP->save($this->request->data)) {
				$this->Flash->success(__('The g d p has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The g d p could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GDP.' . $this->GDP->primaryKey => $id));
			$this->request->data = $this->GDP->find('first', $options);
		}
		$dataSets = $this->GDP->DataSet->find('list');
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
		$this->GDP->id = $id;
		if (!$this->GDP->exists()) {
			throw new NotFoundException(__('Invalid g d p'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GDP->delete()) {
			$this->Flash->success(__('The g d p has been deleted.'));
		} else {
			$this->Flash->error(__('The g d p could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
