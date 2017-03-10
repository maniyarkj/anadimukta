<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Group $Group
 * @property Feedback $Feedback
 * @property UserDetail $UserDetail
 */
class User extends AppModel
{
    const TYPE_ADMIN = 1;
    const TYPE_PRASANG = 2;
    const TYPE_REFERENCE = 3;
    const TYPE_DTP = 4;
    const TYPE_SLV = 5;
    const TYPE_GENERAL = 6;

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This username has already been taken.'
            )
        ),
        // TODO: Enable this when we live this project
//        'password' => array(
//            'length' => array(
//                'rule'      => array('between', 8, 40),
//                'message'   => 'Your password must be between 8 and 40 characters.',
//                'allowEmpty' => true,
//            ),
//        ),
        'confirm_password' => array(
//            'length' => array(
//                'rule'      => array('between', 8, 40),
//                'message'   => 'Your password must be between 8 and 40 characters.',
//            ),
            'compare' => array(
                'rule'      => array('validate_passwords'),
                'message' => 'The passwords you entered do not match.',
            )
        ),
        'group_id' => array(
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
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasOne = array(
        'UserDetail' => array(
            'className' => 'UserDetail',
            'foreignKey' => 'user_id',
            'dependent' => true,
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        
    );

    var $actsAs = array(
        'Acl' => array('type' => 'requester', 'enabled' => false),
        'Search.Searchable', // For plugin search
    );

    /**
     * Filter args for search
     *
     * @var array
     */
    public $filterArgs = array(
        'username' => array(
            'type' => 'like',
            'field' => 'username'
        ),
        'group_id' => array(
            'type' => 'value',
            'field' => 'group_id'
        ),
    );

    public function validate_passwords()
    {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
    }

    function parentNode()
    {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        }
        else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }

    public function bindNode($user)
    {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    public function beforeSave($options = array())
    {
        if ($this->data['User']['password']) {
            $this->data['User']['password'] = AuthComponent::password(
                $this->data['User']['password']
            );
        }
        elseif ($this->data['User']['id']) {
            $options = array('conditions' => array('User.' . $this->primaryKey => $this->data['User']['id']));
            $userData = $this->find('first', $options);
            $this->data['User']['password'] = $userData['User']['password'];
        }
        return true;
    }

    public function beforeValidate($options = array())
    {
        // Set group id from type
        if (isset($this->data['User']['type'])) {
            $this->data['User']['group_id'] = $this->getGroupIdByType(
                    $this->data['User']['type']
                );
        }
        return true;
    }

    /**
     * Return group option manual, we have implemented ACL but not using pure acl, we use
     * role based access control
     *
     * @return array
     */
    public function getGroupOptions()
    {
        return array(
            self::TYPE_ADMIN => 'Super Admin',
            self::TYPE_PRASANG => 'Prasang Admin',
            self::TYPE_REFERENCE => 'Reference Admin',
            self::TYPE_DTP => 'DTP Admin',
            self::TYPE_SLV => 'SLV Admin',
        );
    }

    /**
     * This return correct group id in table, we are currently setting is manually
     *
     * @param int $type
     */
    public function getGroupIdByType($type)
    {
        $typeToGroup = array(
            self::TYPE_ADMIN => 5,
            self::TYPE_PRASANG => 6,
            self::TYPE_REFERENCE => 7,
            self::TYPE_DTP => 8,
            self::TYPE_SLV => 9,
            self::TYPE_GENERAL => 10,
        );
        return $typeToGroup[$type];
    }

    public static function isAdmin($user)
    {
        if (!$user) {
            return false;
        }
        return isset($user['group_id']) && $user['group_id'] == 5;
    }

    public static function isPrasangAdmin($user)
    {
        if (!$user) {
            return false;
        }
        return isset($user['group_id']) && $user['group_id'] == 6;
    }

    public static function isReferenceAdmin($user)
    {
        if (!$user) {
            return false;
        }
        return isset($user['group_id']) && $user['group_id'] == 7;
    }

    public static function isDtpAdmin($user)
    {
        if (!$user) {
            return false;
        }
        return isset($user['group_id']) && $user['group_id'] == 8;
    }

    public static function isSlvAdmin($user)
    {
        if (!$user) {
            return false;
        }
        return isset($user['group_id']) && $user['group_id'] == 9;
    }
    public static function isGeneralUser($user)
    {
        if (!$user) {
            return false;
        }
        return (isset($user['group_id']) && $user['group_id'] == 10);
    }

    public static function isBackendUser($user)
    {
        if (!$user) {
            return false;
        }
        $adminRoles = array(5, 6, 7, 8, 9);
        return (isset($user['group_id']) && in_array($user['group_id'], $adminRoles));
    }

    public function isUsernameAvailable($username)
    {
        $username = trim($username);
        $user = $this->find('first', array(
            'conditions' => array("User.username" => $username),
        ));

        return empty($user);
    }
}