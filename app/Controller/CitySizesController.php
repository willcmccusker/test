<?php
App::uses('AppController', 'Controller');
/**
 * CitySizes Controller
 *
 * @property CitySize $CitySize
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CitySizesController extends AppController {

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
		$this->CitySize->recursive = 0;
		$this->set('citySizes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CitySize->exists($id)) {
			throw new NotFoundException(__('Invalid city size'));
		}
		$options = array('conditions' => array('CitySize.' . $this->CitySize->primaryKey => $id));
		$this->set('citySize', $this->CitySize->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CitySize->create();
			if ($this->CitySize->save($this->request->data)) {
				$this->Flash->success(__('The city size has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The city size could not be saved. Please, try again.'));
			}
		}
		$dataSets = $this->CitySize->DataSet->find('list');
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
		if (!$this->CitySize->exists($id)) {
			throw new NotFoundException(__('Invalid city size'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CitySize->save($this->request->data)) {
				$this->Flash->success(__('The city size has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The city size could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CitySize.' . $this->CitySize->primaryKey => $id));
			$this->request->data = $this->CitySize->find('first', $options);
		}
		$dataSets = $this->CitySize->DataSet->find('list');
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
		$this->CitySize->id = $id;
		if (!$this->CitySize->exists()) {
			throw new NotFoundException(__('Invalid city size'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CitySize->delete()) {
			$this->Flash->success(__('The city size has been deleted.'));
		} else {
			$this->Flash->error(__('The city size could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
