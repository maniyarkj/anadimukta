<?php

App::uses('AppModel', 'Model');

/**
 * ReferenceType Model
 *
 * @property Reference $Reference
 */
class ReferenceType extends AppModel
{
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'type';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Reference' => array(
            'className' => 'Reference',
            'foreignKey' => 'reference_type_id',
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