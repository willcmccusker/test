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
			$this->Auth->allow('API_index','API_id', 'index','map','view', 'data', 'admin_import');
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
			"recursive"=>2
			));
		$this->set("data", $cities);
		$this->render(false);
	}
	public function API_id($id = null){
		$city = $this->City->find("first", array(
			"conditions"=>array(
				"City.id"=>$id
				),
			"contain"=>array(
				"World"=>array("DataSet"),
				"DataSet",
				"Region"=>array("DataSet"),
				"GDP"=>array("DataSet"),
				"CitySize"=>array("DataSet")
				)
			));
		$this->set("data", $city);
		$this->render(false);
	}


/**
 * index method
 *
 * @return void
 */
	public function index($render = "index") {
		$cities = $this->City->find("all", array(
			"recursive"=>0
			));
		switch($render){
			case("map"):

			break;
			case("data"):

			break;
			default:
			usort($cities, function($a, $b) {
				if($a["Region"]["name"] == $b["Region"]["name"]){
				    return strcasecmp($a["City"]["name"], $b["City"]["name"]);
				}else{
				    return strcasecmp($a["Region"]["name"], $b["Region"]["name"]);
				}
			});
		}

		// $cities = Hash::sort($cities, '{n}.Region.name', 'asc');
		$this->set(compact("cities"));
		$this->render($render);
	}

	public function map(){
		$points = new File(APP."webroot/file-manager/userfiles/json/all/all.geojson");
		$points_json = $points->read(true, 'r');
		$this->set('points', $points_json);

		$regions = new File(APP."webroot/file-manager/userfiles/json/all/simple-regions.geojson");
		$regions_json = $regions->read(true, 'r');
		$this->set('regions', $regions_json);
		$this->index("map");
	}

	public function data(){
		$this->index("data");
	}



/**
 * index method
 *
 * @return void
 */
	public function view($slug = null) {
		$city = $this->City->find("first", array(
			"conditions"=>array(
				"City.slug"=>$slug
				),
			// "recursive"=>2,
			"contain"=>array(
				"World"=>array("DataSet"),
				"DataSet",
				"Region"=>array("DataSet"),
				"GDP"=>array("DataSet"),
				"CitySize"=>array("DataSet")
				)
			));
		if(empty($city)){
			throw new NotFoundException(__('Invalid city'));
		}
		$this->set(compact("city"));
	}


/**
 * admin_import method
 *
 * @return void
 */
	public function admin_import() {
		$this->City->DataSet->import();
		$this->redirect(array('action' => 'index'));
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
		$worlds = $this->City->World->find('list');
		$regions = $this->City->Region->find('list');
		$gDPs = $this->City->GDP->find('list');
		$citySizes = $this->City->CitySize->find('list');
		$dataSets = $this->City->DataSet->find('list');
		$this->set(compact( 'worlds', 'regions', 'gDPs', 'citySizes', 'dataSets'));
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
		$worlds = $this->City->World->find('list');
		$regions = $this->City->Region->find('list');
		$gDPs = $this->City->GDP->find('list');
		$citySizes = $this->City->CitySize->find('list');
		$dataSets = $this->City->DataSet->find('list');
		$this->set(compact( 'worlds', 'regions', 'gDPs', 'citySizes', 'dataSets'));
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
