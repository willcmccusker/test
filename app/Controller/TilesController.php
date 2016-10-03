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
	public function show($layer = null, $z = null, $x = null, $y = null) {
    $this->autoRender = false;
    $this->log('zoom level= '.$z);
    $this->log('tile column (x)= '.$x);
    $this->log('tile row (y)= '.$y);

    $path = APP."webroot/file-manager/userfiles/mbtiles/". $layer .'.mbtiles';
    //$db = new PDO('sqlite:' . $path);

    try
    {

      // Open the database
      $db = new PDO('sqlite:' . $path);
      if(!isset($db)) {
        $this->log('Incorrect db name');
      }else {
        $this->log("OKAY");
      }
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

      $result = $db->query('select tile_data as t from tiles where zoom_level=' . $z . ' and tile_column=' . $x . ' and tile_row=' . $y);
      $data = $result->fetchColumn();

      if(!isset($data) || $data === FALSE) {
        $this->log('NO DATA');
      } else {
        $this->response->type('png');
        $this->response->body($data);
      }

    }
    catch(PDOException $e)
    {
      echo 'Exception : '.$e->getMessage();
    }

    //$result = $db->query('select tile_data as t from tiles where zoom_level=' . $z . ' and tile_column=' . $x . ' and tile_row=' . $y);
    //$data = $result->fetchColumn();

  }
}
