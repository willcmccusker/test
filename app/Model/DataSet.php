<?php
App::uses('AppModel', 'Model');
/**
 * DataSet Model
 *
 * @property City $City
 * @property CitySize $CitySize
 * @property GDP $GDP
 * @property Region $Region
 * @property World $World
 */
class DataSet extends AppModel {




	public function import(){


		$sql = file_get_contents( APP . '/webroot/sql/atlas.sql');
		$this->query($sql);
         
        $this->User = ClassRegistry::init('User');
		$this->User->begin();

		$row = 0;
		$filename = APP . "/webroot/data/data.csv";
		if (($handle = fopen($filename, "r")) !== FALSE) {

			$this->query('TRUNCATE data_sets;');

			$this->query('TRUNCATE cities;');

			$this->query('TRUNCATE city_sizes;');
			$this->query('TRUNCATE g_d_ps;');
			$this->query('TRUNCATE regions;');
			$this->query('TRUNCATE worlds;');

			$citySizes = array();
			$GDPs = array();
			$regions = array();			

			$_n = 6;

		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $row++;
		    	if($row < 3) continue;

		        $offset = 20;

		        $dataset = array("DataSet"=>array());
		        $i = 0;
		        foreach($this->validate as $field=>$bs){
		        	$key = $i + $offset;
		        	if(isset($bs["decimal"])){
		        		$data[$key] = (float) str_replace("N/A", "", $data[$key]);
		        	}
		        	$dataset["DataSet"][$field] = $data[$key];
		        	$i++;
		        }
		        $this->create();
		        if(!$this->save($dataset)){
		        	debug($dataset);
		        	debug($this->validationErrors);
					throw new NotFoundException(__('Invalid dataset'));
		        }else{
		        	$dataset_id = $this->getLastInsertID();
		        }

		        $city = array("City"=>array());



		        switch($data[1]){
		        	case("WORLD"):
		        		$world = array("World"=>array(
		        			"year"=>2016,
		        			"data_set_id"=>$dataset_id
		        			));
		        		$this->World->create();
		        		if(!$this->World->save($world)){
		        			debug($world);
		        			debug($this->World->validationErrors);
							throw new NotFoundException(__('Invalid world'));
		        		}else{
		        			$world_id = $this->World->getLastInsertID();
		        		}
		        	break;
		        	case("REGIONS"):
			        	$foo = $data[$_n];
						preg_match('#\((.*?)\)#', $foo, $match);

						$name = trim(str_replace($match[0], "", $foo));
						$abbrev = $match[1];
						$data[$_n] = $name;

						$region = array("Region"=>array("name"=>$data[$_n], "slug"=>Inflector::slug($data[$_n]), "abbreviation"=>$abbrev, "data_set_id"=>$dataset_id));
		        		$this->Region->create();
		        		if(!$this->Region->save($region)){
		        			debug($region);
		        			debug($this->Region->validationErrors);
							throw new NotFoundException(__('Invalid region'));
		        		}else{
		        			$region_id = $this->Region->getLastInsertID();
		        			$regions[$data[$_n]] = $region_id;
		        		}
		        	break;
		        	case("CITY SIZE"):
						$foo = $data[$_n];
						preg_match('#\((.*?)\)#', $foo, $match);

						$name = trim(str_replace($match[0], "", $foo));
						$number = $match[1];
						$data[$_n] = $name;

						$citySize = array("CitySize"=>array("name"=>$data[$_n], "number"=>$number, "slug"=>Inflector::slug($data[$_n]), "data_set_id"=>$dataset_id));
		        		$this->CitySize->create();
		        		if(!$this->CitySize->save($citySize)){
		        			debug($citySize);
		        			debug($this->CitySize->validationErrors);
							throw new NotFoundException(__('Invalid citySize'));
		        		}else{
		        			$citySize_id = $this->CitySize->getLastInsertID();
		        			$citySizes[$number] = $citySize_id;
		        		}
		        	break;
		        	case("GDP"):

						$GDP = array("GDP"=>array("name"=>$data[$_n], "slug"=>Inflector::slug($data[$_n]), "data_set_id"=>$dataset_id));
		        		$this->GDP->create();
		        		if(!$this->GDP->save($GDP)){
		        			debug($GDP);
		        			debug($this->GDP->validationErrors);
							throw new NotFoundException(__('Invalid GDP'));
		        		}else{
		        			$GDP_id = $this->GDP->getLastInsertID();
		        			$GDPs[$data[$_n]] = $GDP_id;
		        		}
		        	break;
		        	case("CITY"):
			        	$city = array("City"=>array());
		        		foreach($this->City->validate as $field=>$bs){
		        			switch($field){
		        				case("name"):
			        				$col = false;
			        				$city["City"]["name"] = Inflector::humanize($data[$_n]);
			        				$city["City"]["slug"] = Inflector::slug($data[$_n]);
		        				break;
		        				case("cityid"):
			        				$col = 0;
		        				break;
		        				case("country"):
			        				$col = 8;
		        				break;
		        				case("latitude"):
			        				$col = 2;
		        				break;
		        				case("longitude"):
			        				$col = 3;
		        				break;
		        				case("population"):
			        				$col = 10;
			        				$city["City"]["population"] = str_replace(",", "", $data[$col]);
			        				$col = false;
		        				break;
		        				case("photo_path"):
			        				$col = 9;
		        				break;
		        				case("p_d_f_path"):
			        				$col = 4;
		        				break;
		        				case("g_i_s_path"):
			        				$col = 5;
		        				break;
		        				case("world_id"):
			        				$col = false;
			        				$city["City"][$field] = $world_id;
		        				break;
		        				case("region_id"):
			        				$col = false;
			        				if(!isset($regions[$data[7]])){
			        					debug($data[7]);
			        					debug($regions);
			        					debug($data);
										throw new NotFoundException(__('Invalid region'));
			        				}
			        				$region_id = $regions[$data[7]];
			        				$city["City"][$field] = $region_id;
		        				break;
		        				case("g_d_p_id"):
			        				$col = false;
			        				if(!isset($GDPs[$data[12]])){
			        					debug($data[12]);
			        					debug($GDPs);
			        					debug($data);
										throw new NotFoundException(__('Invalid GDP'));
			        				}
			        				$GDP_id = $GDPs[$data[12]];
			        				$city["City"][$field] = $GDP_id;
		        				break;
		        				case("city_size_id"):
			        				$col = false;
			        				if(!isset($citySizes[$data[11]])){
			        					debug($data[11]);
			        					debug($citySizes);
			        					debug($data);
										throw new NotFoundException(__('Invalid CitySize'));
			        				}
			        				$citySize_id = $citySizes[$data[11]];
			        				$city["City"][$field] = $citySize_id;
		        				break;
		        				case("data_set_id"):
		        					$col = false;
		        					$city["City"][$field] = $dataset_id;
	        					break;
	        					case("urban_extent_t1_path"):
	        						$col = 13;
	        					break;
	        					case("urban_extent_t2_path"):
	        						$col = 14;
	        					break;
	        					case("urban_extent_t3_path"):
	        						$col = 15;
	        					break;
	        					case("urban_layout_arterial_roads_path"):
	        						$col = 16;
	        					break;
	        					case("urban_layout_medians_path"):
	        						$col = 17;
	        					break;
	        					case("urban_layout_locales_path"):
	        						$col = 18;
	        					break;
	        					case("urban_layout_blocks_path"):
	        						$col = 19;
	        					break;
	        					default:
	        						$col = false;
		        			}
		        			if($col !== false){
	        					$city["City"][$field] = $data[$col];
		        			}
		        		}
		        		$this->City->create();
		        		if(!$this->City->save($city)){
		        			debug($city);
		        			debug($this->City->validationErrors);
		        			throw new NotFoundException("Invalid City");
		        		}
		        	break;
		        	default:
			        	debug("INVALID TYPE");
		        		die($data[1]);
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
		'density_change_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_change_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fragmentation_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fragmentation_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population_growth_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population_growth_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_expansion_a_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_expansion_a_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'average_block_size_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'average_block_size_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gridded_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gridded_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_and_boulevards_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_and_boulevards_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'residential_planned_before_development_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'residential_planned_before_development_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'streets_less_than_4m_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'streets_less_than_4m_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'walking_distance_of_arterial_road_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'walking_distance_of_arterial_road_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_built_up_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'suburban_built_up_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'suburban_built_up_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'suburban_built_up_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_built_up_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_built_up_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'data_set_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CitySize' => array(
			'className' => 'CitySize',
			'foreignKey' => 'data_set_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'GDP' => array(
			'className' => 'GDP',
			'foreignKey' => 'data_set_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'data_set_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'World' => array(
			'className' => 'World',
			'foreignKey' => 'data_set_id',
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
