<?php
App::uses('AppController', 'Controller');
/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeFilter() {
			parent::beforeFilter();
			//$this->Auth->loginRedirect = array('controller' => '', 'action' => '');
			$this->Auth->allow(
				'API_index', 
				'index');
	}



	public function API_index(){
		$conditions = array();
		$order = null;
		$orders = array("name", "country");
		$limit = null;
		$offset = null;
		if(!empty($this->request->query)){
			foreach($this->request->query as $param=>$val){
				switch($param){
					case("id"):
						$conditions["City.id"] = $val;
					break;
					case("name"):
						$conditions["City.name LIKE"] = $val;
					break;
					case("country"):
						$conditions["City.country LIKE"] = $val;
					break;
					case("order"):
						if(in_array($val, $orders)){
							$direction = isset($this->request->query["direction"]) ? $this->request->query["direction"] : "DESC";
							$order = array($val=>$direction);
						}
					break;
					case("limit"):
						$limit = $val;
					break;
					case("offset"):
						$offset = $val;
					break;
				}
			}
		}

		$cities = $this->City->find("all", array(
			"conditions"=>$conditions,
			"order"=>$order,
			"limit"=>$limit,
			"offset"=>$offset,
			"recursive"=>1
			));
		$this->set("data", $cities);
		$this->render(false);
	}
	public function API_id($id = null){
		$city = $this->City->find("first", array(
			"conditions"=>array(
				"City.id"=>$id
				),
			"recursive"=>0
			));
		$this->set("data", $city);
		$this->render(false);
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$cities = $this->City->find("all", array(
			"recursive"=>0
			));
		$this->set(compact("cities"));
	}


/**
 * admin_import method
 *
 * @return void
 */
	public function admin_import() {
		$this->City->import("cities.csv");
		$this->render(false);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		// $this->layout = "admin";
		$this->City->recursive = 0;
		$this->set('cities', $this->Paginator->paginate());
	}
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
		$this->set('city', $this->City->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Flash->success(__('The city has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The city could not be saved. Please, try again.'));
			}
		}
		$photos = $this->City->Photo->find('list');
		$worlds = $this->City->World->find('list');
		$regions = $this->City->Region->find('list');
		$gDPs = $this->City->GDP->find('list');
		$citySizes = $this->City->CitySize->find('list');
		$dataSets = $this->City->DataSet->find('list');
		$this->set(compact('photos', 'worlds', 'regions', 'gDPs', 'citySizes', 'dataSets'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->City->save($this->request->data)) {
				$this->Flash->success(__('The city has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The city could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
			$this->request->data = $this->City->find('first', $options);
		}
		$photos = $this->City->Photo->find('list');
		$worlds = $this->City->World->find('list');
		$regions = $this->City->Region->find('list');
		$gDPs = $this->City->GDP->find('list');
		$citySizes = $this->City->CitySize->find('list');
		$dataSets = $this->City->DataSet->find('list');
		$this->set(compact('photos', 'worlds', 'regions', 'gDPs', 'citySizes', 'dataSets'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->City->delete()) {
			$this->Flash->success(__('The city has been deleted.'));
		} else {
			$this->Flash->error(__('The city could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
