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
class TilesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
  // public $helpers = array('Cache');
  // public $cacheAction = array(
  //     'show' => 36000,
  // );

  public function beforeFilter() {
			parent::beforeFilter();
			//$this->Auth->loginRedirect = array('controller' => '', 'action' => '');
			$this->Auth->allow('show');
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function show($city = null, $map = null, $layer = null, $z = null, $x = null, $y = null) {
    $this->autoRender = false;
		$this->log('city= '.$city);
		$this->log('map= '.$map);
		$this->log('layer= '.$layer);
    $this->log('zoom level= '.$z);
    $this->log('tile column (x)= '.$x);
    $this->log('tile row (y)= '.$y);
    $path =  "/" . $city . "/" . $map . "/" . $layer;
    $name = $z."_".$x."_".$y.'.png';
    $mbtile = APP."webroot/file-manager/userfiles/mbtiles/".$path .'.mbtiles';
    

    // $this->response->sharable(true, 60 * 60);

    Cache::config('default', array('path' => CACHE . "/tiles/" . $path . "/"));

    //uncomment these to turn cache on
    $cached = Cache::read($name);
    if($cached !== false){
          $this->response->type('png');
          $this->response->body($cached);
    }else{
      try
      {

        // Open the database
        $db = new PDO('sqlite:' . $mbtile);
        if(!isset($db)) {
          $this->log('Incorrect db name');
        }else {
          $this->log("OKAY");
        }
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        // $result = $db->query('select tile_data as from tiles where zoom_level=11 and tile_column=1244 and tile_row=1075');
        // debug($result->fetchColumn());
        // die();
        $result = $db->query('select tile_data as t from tiles where zoom_level=' . $z . ' and tile_column=' . $x . ' and tile_row=' . $y);
        $data = $result->fetchColumn();

        if(!isset($data) || $data === FALSE) {
          // $this->log('NO DATA');
          // die("no data");
          $this->response->type('png');
          $this->response->body(file_get_contents(APP . "webroot/img/empty.png"));

        } else {
  				$this->log('BOOM');
          $this->response->type('png');
          Cache::write($name, $data);
          $this->response->body($data);
        }

      }
      catch(PDOException $e)
      {
  			$this->log($e->getMessage());
        echo 'Exception : '.$e->getMessage();
      }

    }
    //$result = $db->query('select tile_data as t from tiles where zoom_level=' . $z . ' and tile_column=' . $x . ' and tile_row=' . $y);
    //$data = $result->fetchColumn();

  }
}
