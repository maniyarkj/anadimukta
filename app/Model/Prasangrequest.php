<?php

App::uses('AppModel', 'Model');

/**
 * Prasangrequest Model
 *
 */
class Prasangrequest extends AppModel
{
    const STATUS_CREATED = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_DISCARDED = 3;

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Section' => array(
            'className' => 'Section',
            'foreignKey' => 'section_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'With' => array(
            'className' => 'With',
            'foreignKey' => 'with_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'DonorZone' => array(
            'className' => 'Zone',
            'foreignKey' => 'donor_zone_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'DonorCenter' => array(
            'className' => 'Center',
            'foreignKey' => 'donor_center_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'SubmittedByUser' => array(
            'className' => 'User',
            'foreignKey' => 'submitted_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Subject' => array(
            'className' => 'Subject',
            'joinTable' => 'prasangs_subjects',
            'foreignKey' => 'prasang_id',
            'associationForeignKey' => 'subject_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'section_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is Required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Section must be numeric',
            ),
        ),
        'with_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 254),
                'message' => 'Maximum 254 characters are allowed',
            ),
        ),
        'place' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
        ),
        'event' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
        ),
        'donor_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
        ),
        'donor_phone' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter number',
            ),
        ),
        'donor_email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter valid email address',
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
        ),
        'donor_zone_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
        ),
        'donor_center_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'submitted_user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

    // Set sql date format before save
    private $_dateFields = array(
        'date',
        'created',
    );

    public function beforeValidate($options = array())
    {
        foreach ($this->_dateFields as $field) {
            if (!empty($this->data['Prasangrequest'][$field])) {
                $this->data['Prasangrequest'][$field] = $this->toSqlDateFormat(
                        $this->data['Prasangrequest'][$field]
                );
            }
        }

        if (isset($this->data['Prasangrequest']['is_personal'])) {
            // Remove donor validation if is_personal is true
            unset($this->validate['donor_name']);
            unset($this->validate['donor_email']);
            unset($this->validate['donor_zone_id']);
            unset($this->validate['donor_center_id']);
            unset($this->validate['donor_phone']);
        }
        return true;
    }

    public function afterFind($results, $primary = false)
    {
        foreach ($results as $idx => $result) {
            if (!isset($result['Prasangrequest'])) {
                continue;
            }

            // Change date fields to readable
            foreach ($this->_dateFields as $field) {
                if (!empty($result['Prasangrequest'][$field])) {
                    $results[$idx]['Prasangrequest'][$field .'_readable'] = $this->toDateReadable(
                            $result['Prasangrequest'][$field]
                    );
                }
            }

            $results[$idx]['Prasangrequest']['is_personal_text']
                = $result['Prasangrequest']['is_personal']
                ? 'Yes'
                : 'No';
        }
        return $results;
    }

    public function getStatusOptions()
    {
        return array(
            self::STATUS_CREATED => __('Created'),
            self::STATUS_ACCEPTED => __('Accepted'),
            self::STATUS_DISCARDED => __('Discarded'),
        );
    }
}