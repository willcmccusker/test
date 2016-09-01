<?php
App::uses('AppModel', 'Model');
/**
 * City Model
 *
 * @property Photo $Photo
 * @property World $World
 * @property Region $Region
 * @property GDP $GDP
 * @property CitySize $CitySize
 * @property DataSet $DataSet
 * @property Download $Download
 */
class City extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public function import($filename = null){
		$row = 0;
		$filename = APP . "/webroot/data/" . $filename;
		if (($handle = fopen($filename, "r")) !== FALSE) {

			$this->query('TRUNCATE cities;', false);
			$this->query('TRUNCATE city_sizes;', false);
			$this->query('TRUNCATE g_d_ps;', false);
			$this->query('TRUNCATE regions;', false);
			$this->query('TRUNCATE worlds;', false);

			$regions = array();

		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $row++;
		    	if($row == 1) continue;

		        $num = count($data);

		        $city = array("City"=>array());

		        for ($c=0; $c < $num; $c++) {
		        	$field = false;
		        	switch($c){
		        		case(0):
		        			//latitude
		        			$field = "latitude";
		        		break;
		        		case(1):
		        			//longitude
		        			$field = "longitude";
		        		break;
		        		case(4):
		        			//country
			        		$field = "country";
		        		break;
		        		case(5):
		        			//name
		        			$field = "name";
		        		break;
		        		case(6):
		        			//region
		        			if(isset($regions[$data[$c]])){
		        				$region_id = $regions[$data[$c]];
		        			}else{
		        				$region = array("Region"=>array("name"=>$data[$c], "slug"=>Inflector::slug($data[$c])));
		        				$this->Region->create();
		        				if(!$this->Region->save($region)){
		        					debug($this->Region->validationErrors);
    								throw new NotFoundException(__('Invalid region'));
		        				}else{
		        					$region_id = $this->Region->getLastInsertID();
		        					$regions[$data[$c]] = $region_id;
		        				}
		        			}
		        		default:
		        	}
		        	if($field){
		        		$city["City"][$field] = $data[$c];
		        	}else{
		        		if(isset($region_id)){
		        			$city["City"]["region_id"] = $region_id;
		        		}
		        	}
		        }
		        $city["City"]["slug"] = Inflector::slug($city["City"]["name"]);
		        $this->create();
		        if(!$this->save($city)){
					debug($this->validationErrors);
					throw new NotFoundException(__('Invalid city'));
		        }
		    }
		    fclose($handle);
		}
	}


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'country' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'latitude' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitude' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_built_up' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'photo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'world_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'region_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'g_d_p_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city_size_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'data_set_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'photo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'World' => array(
			'className' => 'World',
			'foreignKey' => 'world_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
            'counterCache' => true
		),
		'GDP' => array(
			'className' => 'GDP',
			'foreignKey' => 'g_d_p_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
            'counterCache' => true
		),
		'CitySize' => array(
			'className' => 'CitySize',
			'foreignKey' => 'city_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
            'counterCache' => true
		),
		'DataSet' => array(
			'className' => 'DataSet',
			'foreignKey' => 'data_set_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Download' => array(
			'className' => 'Download',
			'foreignKey' => 'city_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
