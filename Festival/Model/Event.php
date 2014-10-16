<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Stage $Stage
 */
class Event extends AppModel {

	public $virtualFields = array(
		'event_name' => 'CONCAT(Event.city, " - ", Event.location, " - ", Event.event_date)'
	);




/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'event_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'city' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'location' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'capacity' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Stage' => array(
			'className' => 'Stage',
			'foreignKey' => 'event_id',
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
	
	
	public $findMethods = array(
		'upcoming' =>  true,
		'upcomingList' =>  true,
	);
	
	public function _findUpcoming($state, $query, $results = array()) {
		if ($state === 'before') {
			$query['conditions']['Event.event_date >= '] = date("Y-m-d");
			return $query;
		}
		return $results;
	}
	
	public function _findUpcomingList($state, $query, $results = array()) {
		if ($state === 'before') {
			$query['recursive'] = 0;
			$query['fields'] = array('Event.id', 'Event.event_name');
			$query['conditions']['Event.event_date >= '] = date("Y-m-d");
			return $query;
		}
		if ($state === 'after') {
			$comp = array();
			foreach ($results as $result){
				foreach ($result as $event){
					$comp[$event['id']] = $event['event_name'];
				}
			}
			return $comp;
		}
		return $results;
	}

}
