<?php
App::uses('AppModel', 'Model');
/**
 * City Model
 *
 * @property World $World
 * @property Region $Region
 * @property GDP $GDP
 * @property CitySize $CitySize
 * @property DataSet $DataSet
 */
class City extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public function import($filename = "cities.csv"){
		$row = 0;
		$filename = APP . "/webroot/data/" . $filename;
		if (($handle = fopen($filename, "r")) !== FALSE) {

			$this->query('TRUNCATE cities;', false);
			// $this->query('TRUNCATE city_sizes;', false);
			$this->query('TRUNCATE g_d_ps;', false);
			$this->query('TRUNCATE regions;', false);
			// $this->query('TRUNCATE worlds;', false);

			$regions = array();
			$GDPs = array();

		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $row++;
		    	if($row == 1) continue;

		        $num = count($data);

		        $city = array("City"=>array());

		        for ($c=0; $c < $num; $c++) {
			        
			        $GDP_id = false;
			        $region_id = false;

		        	$field = false;
		        	switch($c){
		        		case(6):
		        			//latitude
		        			$field = "latitude";
		        		break;
		        		case(7):
		        			//longitude
		        			$field = "longitude";
		        		break;
		        		case(0):
		        			//country
			        		$field = "country";
		        		break;
		        		case(1):
		        			//name
		        			$field = "name";
		        		break;
		        		case(2):
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
	        			break;
	        			case(3):
	        				//GDP
		        			if(isset($GDPs[$data[$c]])){
		        				$GDP_id = $GDPs[$data[$c]];
		        			}else{
		        				$GDP = array("GDP"=>array("name"=>$data[$c], "slug"=>Inflector::slug($data[$c])));
		        				$this->GDP->create();
		        				if(!$this->GDP->save($GDP)){
		        					debug($GDP);
		        					debug($this->GDP->validationErrors);
    								throw new NotFoundException(__('Invalid GDP'));
		        				}else{
		        					$GDP_id = $this->GDP->getLastInsertID();
		        					$GDPs[$data[$c]] = $GDP_id;
		        				}
		        			}
	        			break;
	        			case(4):
	        				//population
	        				$field = "population";
	        				$data[$c] = (int) str_replace(",", "", $data[$c]);
	        			break;
		        	}
		        	if($field){
		        		$city["City"][$field] = $data[$c];
		        	}elseif($region_id){
	        			$city["City"]["region_id"] = $region_id;
	        		}elseif($GDP_id){
	        			$city["City"]["g_d_p_id"] = $GDP_id;	
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
		'cityid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'photo_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'p_d_f_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'g_i_s_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_t1_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_t2_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_t3_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_layout_arterial_roads_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_layout_medians_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_layout_locales_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_layout_blocks_path' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
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


}
