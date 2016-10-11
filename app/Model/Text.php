<?php
App::uses('AppModel', 'Model');
/**
 * Text Model
 *
 */
class Text extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'slug';

	public function dynam($texts = array(), $key = array()){
		$newTexts = array();
		foreach($texts as $text){
			$newTexts[$text["Text"]["slug"]] = $this->convertText($text, $key);
		}
		return $newTexts;
	}

	public function convertText($text = array(), $key = array()){
		$content = $text["Text"]["content"];
		$pattern = '/<%(.*?)%>/';

		preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE, 3);
		$matches = Set::classicExtract($matches[1], "{n}.0");

		foreach($matches as $match){
			$value = false;
			if(substr($match, 0, 1) == "="){
				$value = substr($match, 1);
				$valueCat = explode("-", $value);
				switch($valueCat[0]){
					case("increasing"):
						$first = $this->pathToValue($valueCat[1], $key);
						$value = (float)$first < 0 ? "decreasing" : "increasing";
					break;
					case("calcincrease"):
						$first = $this->pathToValue($valueCat[1], $key);
						$second = $this->pathToValue($valueCat[2], $key);
						$value = (float) $second < ((float) $first + 0.00001) ? "a decreasing" : "an increasing";
					break;
					case("calc"):
						$first = $this->pathToValue($valueCat[1], $key);
						$second = $this->pathToValue($valueCat[2], $key);
						$value = (((float) $second / ((float) $first + 0.00001) ) - 1) * 100;
					break;
					case("popavg"):
						$first = $this->pathToValue($valueCat[1], $key);
						$second = $this->pathToValue($valueCat[2], $key);
						$third = $this->pathToValue($valueCat[3], $key);
						$fourth = $this->pathToValue($valueCat[4], $key);
						$value = ((float) $first / (float) $second)  / ( (int) $third - (int) $fourth ) * 100;
					break;
					default:
						die("unrecognized formula");
				}

			}else{
				$value = $this->pathToValue($match, $key);
			}
			if($value === false){
				debug($value);
				debug($match);
				die(" convert text error");
			}
			$value = DateTime::createFromFormat('Y-m-d', $value) ? 
				substr($value, 0, 4) : (is_numeric($value) ? str_replace(".00", "", number_format($value, 2) ) : $value);
			$text["Text"]["content"] = str_replace("<%".$match."%>", $value, $text["Text"]["content"]);
		}
		return $text;
	}

	public function pathToValue($match, $key){
		$path = explode(".", $match);
		// debug($path);
		switch(count($path)){
			case(3):
				$value = $key[$path[0]][$path[1]][$path[2]];
			break;
			case(2):


				if(!isset($key[$path[0]][$path[1]])){
					debug($match);
					debug($path);
					debug($key);
					die();
				}else{
					$value = $key[$path[0]][$path[1]];
				}
			break;
			case(1):
				$value = $key[$path[0]];
			break;
			default:
				return false;
		}
		return $value;
	}


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'content' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
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
		'type' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
