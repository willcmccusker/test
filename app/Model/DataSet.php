<?php
App::uses('AppModel', 'Model');
/**
 * DataSet Model
 *
 * @property City $City
 * @property CitySize $CitySize
 * @property Region $Region
 * @property World $World
 */
class DataSet extends AppModel {





	public function import(){


		$this->generateValidationRules();

		$row = 0;
		$filename = APP . "/webroot/build_data/data.csv";
		if (($handle = fopen($filename, "r")) !== FALSE) {
			// $this->query('DROP TABLE IF EXISTS data_sets;', false);
			// $this->query('DROP TABLE IF EXISTS cities;', false);
			// $this->query('DROP TABLE IF EXISTS city_sizes;', false);
			// $this->query('DROP TABLE IF EXISTS g_d_ps;', false);
			// $this->query('DROP TABLE IF EXISTS regions;', false);
			// $this->query('DROP TABLE IF EXISTS worlds;', false);
			
			$sql = file_get_contents( APP . '/webroot/build_data/atlas.sql');
			$this->query($sql, false);
	        $this->User = ClassRegistry::init('User');
			$this->User->begin();

			$citySizes = array();
			$GDPs = array();
			$regions = array();			

			$_n = 11;

		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $row++;
		    	if($row < 7) continue;

		        $offset = 20;

		        $dataset = array("DataSet"=>array());
		        $i = 0;
		        foreach($this->validate as $field=>$bs){

		        	$key = $i + $offset;
	        		$data[$key] = $data[$key] == "-" ? 0 : $data[$key];
	        		$data[$key] = $data[$key] == "" ? 0 : $data[$key];
		        	if(isset($bs["decimal"])){
		        		$data[$key] = (float) str_replace("N/A", "", $data[$key]);
		        		$data[$key] = (float) str_replace("%", "", $data[$key]);
		        	}else{
		        		$data[$key] = (int) str_replace(",", "", $data[$key]);
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


		        switch($data[0]){
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
		        	case("REGION"):
			        	$foo = $data[$_n];
						preg_match('#\((.*?)\)#', $foo, $match);

						$name = trim(str_replace($match[0], "", $foo));
						$abbrev = $match[1];
						// $data[$_n] = $name;

						$region = array("Region"=>array("name"=>$name, "slug"=>Inflector::slug($name), "abbreviation"=>$abbrev, "data_set_id"=>$dataset_id));
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
		        	default:
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
			        				$col = 12;
		        				break;
		        				case("latitude"):
			        				$col = 1;
		        				break;
		        				case("longitude"):
			        				$col = 2;
		        				break;
		        				case("population"):
			        				$col = 14;
			        				$city["City"]["population"] = str_replace(",", "", $data[$col]);
			        				$col = false;
		        				break;
		        				case("photo_path"):
			        				$col = 9;
		        				break;
		        				case("flag_path"):
			        				$col = 10;
		        				break;
		        				case("areas_and_densities_p_d_f_path"):
			        				$col = 3;
		        				break;
		        				case("areas_and_densities_g_i_s_path"):
			        				$col = 4;
		        				break;
		        				case("blocks_and_roads_p_d_f_path"):
			        				$col = 5;
		        				break;
		        				case("blocks_and_roads_g_i_s_path"):
			        				$col = 6;
		        				break;
		        				case("historical_data_p_d_f_path"):
			        				$col = 7;
		        				break;
		        				case("historical_data_g_i_s_path"):
			        				$col = 8;
		        				break;
		        				case("extent"):
			        				$col = 15;
		        				break;
		        				case("density"):
			        				$col = 16;
		        				break;
		        				case("t1"):
			        				$col = 17;
		        				break;
		        				case("t2"):
			        				$col = 18;
		        				break;
		        				case("t3"):
			        				$col = 19;
		        				break;
		        				case("world_id"):
			        				$col = false;
			        				$city["City"][$field] = $world_id;
		        				break;
		        				case("region_id"):
			        				$col = false;
			        				if(!isset($regions[$data[13]])){
			        					debug($data[13]);
			        					debug($regions);
			        					debug($data);
										throw new NotFoundException(__('Invalid region'));
			        				}
			        				$region_id = $regions[$data[13]];
			        				$city["City"][$field] = $region_id;
		        				break;
		        				/*case("g_d_p_id"):
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
		        				break;*/
		        				case("data_set_id"):
		        					$col = false;
		        					$city["City"][$field] = $dataset_id;
	        					break;
	        					default:
	        						$col = false;
		        			}
		        			if($col !== false){
		        				$foo = str_replace(',', '', $data[$col]);
								if(is_numeric($foo)){
								    $data[$col] = $foo;
								}
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
		        }
		    }
		    fclose($handle);
		}
	}

	public function beforeValidate($options = array()) {
		$this->generateValidationRules();
		return true;
	}
	public function beforeFind($query) {
		$this->generateValidationRules();
		return true;
	}


	public function generateValidationRules(){
		$columns = array_keys($this->getColumnTypes());
		$this->validate = array();
		foreach($columns as $column){
			if($column == "id"){
				continue;
			}
			$this->validate[$column] = array("numeric"=>array("rule"=> array("numeric")));
		}
	}


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'population_t1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population_t2' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population_t3' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population_change_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'population_change_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_urban_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_urban_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_urban_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_suburban_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_suburban_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_suburban_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_rural_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_rural_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_rural_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_open_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_open_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_composition_open_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_change_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urban_extent_change_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_built_up_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_built_up_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_built_up_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_built_up_change_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_built_up_change_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_urban_extent_t1' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_urban_extent_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_urban_extent_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_urban_extent_change_t1_t2' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'density_urban_extent_change_t2_t3' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_in_built_up_area_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_in_built_up_area_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_average_width_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_average_width_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_under_4m_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_under_4m_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_4_8m_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_4_8m_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_8_12m_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_8_12m_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_12_16m_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_12_16m_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_over_16m_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roads_width_over_16m_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_density_all_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_density_all_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_density_wide_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_density_wide_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_density_narrow_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_density_narrow_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_walking_all_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_walking_all_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_walking_wide_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_walking_wide_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_walking_narrow_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_walking_narrow_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_beeline_all_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_beeline_all_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_beeline_wide_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_beeline_wide_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_beeline_narrow_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'arterial_roads_beeline_narrow_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_plots_average_block_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_plots_average_block_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_plots_average_informal_plot_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_plots_average_informal_plot_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_plots_average_formal_plot_pre_1990' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_plots_average_formal_plot_1990_2015' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_atomistic_pre_1990' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_atomistic_1990_2015' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_informal_pre_1990' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_informal_1990_2015' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_formal_pre_1990' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_formal_1990_2015' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_housing_pre_1990' => array(
			'decimal' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blocks_and_plots_composition_housing_1990_2015' => array(
			'decimal' => array(
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
