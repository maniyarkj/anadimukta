<?php
App::uses('AppModel', 'Model');
/**
 * Prasangstatus Model
 *
 * @property User $User
 * @property Prasang $Prasang
 */
class Prasangstatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Prasang' => array(
			'className' => 'Prasang',
			'foreignKey' => 'prasang_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
