<?php

App::uses('AppModel', 'Model');

/**
 * FeedbackSubject Model
 *
 */
class FeedbackSubject extends AppModel
{
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Feedback' => array(
            'className' => 'Feedback',
            'foreignKey' => 'subject_id',
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
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 254),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
}