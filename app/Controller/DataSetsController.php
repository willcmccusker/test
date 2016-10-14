<?php
App::uses('AppController', 'Controller');
/**
 * DataSets Controller
 *
 * @property DataSet $DataSet
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DataSetsController extends AppController {

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
		$this->DataSet->recursive = 0;
		$this->set('dataSets', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DataSet->exists($id)) {
			throw new NotFoundException(__('Invalid data set'));
		}
		$this->DataSet->generateValidationRules();
		$validate = $this->DataSet->validate;
		$this->set(compact("validate"));
		$options = array('conditions' => array('DataSet.' . $this->DataSet->primaryKey => $id));
		$this->set('dataSet', $this->DataSet->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DataSet->create();
			if ($this->DataSet->save($this->request->data)) {
				$this->Session->setFlash(__('The data set has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data set could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$this->DataSet->generateValidationRules();
		$this->set("fields", $this->DataSet->validate);

	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->DataSet->exists($id)) {
			throw new NotFoundException(__('Invalid data set'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DataSet->save($this->request->data)) {
				$this->Session->setFlash(__('The data set has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data set could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('DataSet.' . $this->DataSet->primaryKey => $id));
			$this->request->data = $this->DataSet->find('first', $options);
		}
		
		$this->DataSet->generateValidationRules();
		$this->set("fields", $this->DataSet->validate);
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->DataSet->id = $id;
		if (!$this->DataSet->exists()) {
			throw new NotFoundException(__('Invalid data set'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DataSet->delete()) {
			$this->Session->setFlash(__('The data set has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The data set could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
