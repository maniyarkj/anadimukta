<?php

App::uses('AppModel', 'Model');

/**
 * Prasang Model
 *
 * @property Section $Section
 * @property With $With
 * @property DonorZone $DonorZone
 * @property DonorCenter $DonorCenter
 * @property Author $Author
 * @property DtpUser $DtpUser
 * @property User $published_by
 * @property Subject $Subject
 */
class Prasang extends AppModel
{
    /** Status Constants * */
    const STATUS_UPLOADED = 1;
    const STATUS_WRITING = 2;
    const STATUS_DISCARDED = 3;
    const STATUS_DTP = 4;
    const STATUS_PROOFING = 5;
    const STATUS_PASSED_BY_SLV = 6;
    const STATUS_APPROVED = 7;
    // If this stage is set on prasang, it will on display on front-end if scheduled date is < today
    const STATUS_PUBLISHED = 8;

    /** Language Constants * */
    const LANGUAGE_ENGLISH = 1;
    const LANGUAGE_HINDI = 2;
    const LANGUAGE_GUJARATI = 3;

    /** Status Constants String */
    const STATUS_UPLOADED_STR = 'Submitted';
    const STATUS_WRITING_STR = 'Writing';
    const STATUS_DISCARDED_STR = 'Discarded';
    const STATUS_DTP_STR = 'DTP';
    const STATUS_PROOFING_STR = 'Proofing';
    const STATUS_PASSED_BY_SLV_STR = 'Passed By SLV';
    const STATUS_APPROVED_STR = 'Approved';
    // If this stage is set on prasang, it will on display on front-end if scheduled date is < today
    const STATUS_PUBLISHED_STR = 'Published';
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';
    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'deleteOnUpdate' => true,
                'path' => '{ROOT}{DS}webroot{DS}files{DS}{model}{DS}{field}{DS}',
            ),
        ),
        'Translate' => array(
            'content' => 'contentTranslation',
            'title' => 'titleTranslation',
            'place' => 'placeTranslation',
            'event' => 'eventTranslation',
            'donor_name' => 'donor_nameTranslation',
        ),
    );

    // Use a different model
    public $translateModel = 'PrasangI18n';

    // Use a different table for translateModel
    public $translateTable = 'i18n_prasangs';

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
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'with_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 254),
                'message' => 'Maximum 254 characters are allowed',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'place' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'event' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donor_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donor_phone' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter number',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donor_email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter valid email address',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donor_zone_id' => array(
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
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donor_center_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'author_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status' => array(
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
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'created_by_user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'published_by_user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//        'title_image' => array(
//            'filetype' => array(
//                'rule' => array('isValidMimeType', array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png'),
//                    false),
//                'message' => 'Please upload image'
//            ),
//            'isBelowMaxSize' => array(
//                'rule' => array('isBelowMaxSize', 3145728, false),
//                'message' => 'Upload image size should be less than 3 MB'
//            ),
//            'extension' => array(
//                'rule' => array('isValidExtension', array('jpg', 'jpeg', 'png', 'gif')),
//                'message' => 'Image extension is not valid'
//            ),
//        )
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
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
        'Author' => array(
            'className' => 'Author',
            'foreignKey' => 'author_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'CreatedByUser' => array(
            'className' => 'User',
            'foreignKey' => 'created_by_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'PublishedByUser' => array(
            'className' => 'User',
            'foreignKey' => 'published_by_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Prasangrequest' => array(
            'className' => 'Prasangrequest',
            'foreignKey' => 'prasangrequest_id',
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
        'UserType' => array(
            'className' => 'UserType',
            'joinTable' => 'prasangs_user_types',
            'foreignKey' => 'prasang_id',
            'associationForeignKey' => 'user_type_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Media' => array(
            'className' => 'Media',
            'foreignKey' => 'prasang_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
    );

    // Set sql date format before save
    private $_dateFields = array(
        'date',
        'rewrite_date',
        'proof_date',
        'x_publish_date',
        'published_date',
    );

    public function getStatusOptions($user = array(), $prasang = array())
    {
        if (empty($user) || empty($prasang) || User::isAdmin($user)) {
            return array(
                //self::STATUS_UPLOADED => self::STATUS_UPLOADED_STR,
                self::STATUS_WRITING => self::STATUS_WRITING_STR,
                self::STATUS_DISCARDED => self::STATUS_DISCARDED_STR,
                self::STATUS_DTP => self::STATUS_DTP_STR,
                self::STATUS_PROOFING => self::STATUS_PROOFING_STR,
                self::STATUS_PASSED_BY_SLV => self::STATUS_PASSED_BY_SLV_STR,
                self::STATUS_APPROVED => self::STATUS_APPROVED_STR,
                self::STATUS_PUBLISHED => self::STATUS_PUBLISHED_STR,
            );
        }
        if (User::isSlvAdmin($user) && $prasang['status'] == Prasang::STATUS_UPLOADED) {
            return array(
                Prasang::STATUS_WRITING => Prasang::STATUS_WRITING_STR,
                Prasang::STATUS_DISCARDED => Prasang::STATUS_DISCARDED_STR,
            );
        }
        if (User::isSlvAdmin($user) && $prasang['status'] == Prasang::STATUS_WRITING) {
            return array(
                Prasang::STATUS_DTP => Prasang::STATUS_DTP_STR,
                Prasang::STATUS_DISCARDED => Prasang::STATUS_DISCARDED_STR,
            );
        }
        if (User::isSlvAdmin($user) && $prasang['status'] == Prasang::STATUS_PROOFING) {
            return array(
                Prasang::STATUS_DTP => Prasang::STATUS_DTP_STR,
                Prasang::STATUS_PASSED_BY_SLV => Prasang::STATUS_PASSED_BY_SLV_STR,
            );
        }
        if (User::isDtpAdmin($user) && $prasang['status'] == Prasang::STATUS_DTP) {
            return array(
                Prasang::STATUS_PROOFING => Prasang::STATUS_PROOFING_STR,
            );
        }
        if (User::isPrasangAdmin($user) && $prasang['status'] == Prasang::STATUS_PASSED_BY_SLV) {
            return array(
                Prasang::STATUS_APPROVED => Prasang::STATUS_APPROVED_STR,
                Prasang::STATUS_PROOFING => Prasang::STATUS_PROOFING_STR,
            );
        }
        return array();
    }

    public function getLanguageOptions()
    {
        return array(
            self::LANGUAGE_ENGLISH => 'English',
            self::LANGUAGE_HINDI => 'Hindi',
            self::LANGUAGE_GUJARATI => 'Gujarati',
        );
    }

    public function beforeValidate($options = array())
    {
        foreach ($this->_dateFields as $field) {
            if (!empty($this->data['Prasang'][$field])) {
                $this->data['Prasang'][$field] = $this->toSqlDateFormat(
                        $this->data['Prasang'][$field]
                );
            }
        }

        // save published by user id if status is published
        if (!empty($this->data['Prasang']['status']) && $this->data['Prasang']['status'] == self::STATUS_PUBLISHED) {
            $uid = CakeSession::read("Auth.User.id");
            $this->data['Prasang']['published_by'] = $uid;
        }

        if ($this->data['Prasang']['is_personal']) {
            // Remove donor validation if is_personal is true
            unset($this->validate['donor_name']);
            unset($this->validate['donor_email']);
            unset($this->validate['donor_zone_id']);
            unset($this->validate['donor_center_id']);
            unset($this->validate['donor_phone']);
        }
        return true;
    }

    public function beforeSave($options = array())
    {
        if (empty($this->data['Prasang']['id'])) {
            $this->data['Prasang']['created_by_user_id'] = CakeSession::read("Auth.User.id");
        }
        return true;
    }

    public function afterFind($results, $primary = false)
    {
        $results = parent::afterFind($results, $primary);

        foreach ($results as $idx => $result) {
            if (!isset($result['Prasang']) || !isset($result['Prasang']['id'])) {
                continue;
            }
            // Change date fields to readable
            foreach ($this->_dateFields as $field) {
                if (!empty($result['Prasang'][$field])) {
                    $results[$idx]['Prasang']['sql_'.$field] = $results[$idx]['Prasang'][$field];
                    $results[$idx]['Prasang'][$field] = $this->toDateReadable(
                            $result['Prasang'][$field]
                    );
                }
            }

            // Set title image path
            $results[$idx]['Prasang']['image_url'] = '';
            if (isset($result['Prasang']['image'])) {
                $results[$idx]['Prasang']['image_url'] = '/files/' . strtolower($this->name)
                        . '/image/' . $result['Prasang']['id']
                        . '/' . $result['Prasang']['image'];
            }

            $results[$idx]['Prasang']['frontViewUrl'] = Router::url(array(
                'controller' => 'prasangs',
                'action' => 'view',
                $result['Prasang']['id']
            ));

            // Prepare prasang string
            $results[$idx]['Prasang']['subjectTitles'] = array();
            if (isset($result['Subject']) && is_array($result['Subject'])) {
                foreach ($result['Subject'] as $subject) {
                    $results[$idx]['Prasang']['subjectTitles'][] = $subject['title'];
                }
            }
        }
        return $results;
    }

    public function renameFile($field, $currentName, $field)
    {
        // replace space with under score in file name, to fix the display error
        return preg_replace('/[^A-Za-z0-9\-\.]/', '', str_replace(' ', '-', $currentName));
    }

    public function changeStatus($id, $data, $prasang)
    {
        if (!$data['status']) {
            return false;
        }
        $Prasangstatus = ClassRegistry::init('Prasangstatus');
        $Prasangstatus->save(array(
            'user_id' => $data['user_id'],
            'prasang_id' => $id,
            'note' => $data['note'],
            'status' => $data['status'],
        ));
        if (isset($data['published_date']) && $data['published_date']) {
            $this->updateAll(
                array('Prasang.published_date' => "'".$this->toSqlDateTimeFormat($data['published_date'])."'"),
                array('Prasang.id' => $id)
            );
        }
        return $this->updateAll(
            array('Prasang.status' => $data['status']),
            array('Prasang.id' => $id)
        );
    }

    /**
     * This should be used to get prasangs on front end website, this will filter the
     * retults by user
     *
     * @param type $type
     * @param type $query
     */
    public function find($type = 'first', $query = array())
    {
        // If not general user do normal find
        if ($this->_currentUser && User::isBackendUser($this->_currentUser)
                && Configure::read('Routing.isAdmin')) {
            return parent::find($type, $query);
        }

        // For general user only fetch pransag for which they have access to
        $conditions = array(
            'Prasang.status' => Prasang::STATUS_PUBLISHED,
            "Prasang.published_date <= '" . date('Y-m-d H:i:s') . "'",
        );
        if ($this->_currentUser && $this->_currentUser['UserDetail']['user_type_id']) {
            $conditions[] = array("(PrasangUserType.user_type_id IS NULL OR PrasangUserType.user_type_id = "
                .  $this->_currentUser['UserDetail']['user_type_id'] . ')');
        }
        else {
           $conditions[] = array('PrasangUserType.user_type_id IS NULL');
        }
        if (!isset($query['conditions'])) {
            $query['conditions'] = array();
        }
        $query['conditions'] = array_merge($conditions, $query['conditions']);

        $join = array(
            'table' => 'prasangs_user_types',
            'alias' => 'PrasangUserType',
            'type' => 'LEFT',
            'conditions' => array('PrasangUserType.prasang_id = Prasang.id'),
        );
        if (!isset($query['joins'])) {
            $query['joins'] = array();
        }
        array_push($query['joins'], $join);

        $group = array('Prasang.id');
        if (isset($query['group'])) {
            $query['group'] = is_array($query['group'])
                ? array_merge($query['group'], $group)
                : array_merge(array($query['group']), $group);
        }
        else {
            $query['group'] = $group;
        }
        return parent::find($type, $query);
    }
}