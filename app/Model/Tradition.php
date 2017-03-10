<?php

App::uses('AppModel', 'Model');

/**
 * Tradition Model
 *
 */
class Tradition extends AppModel
{

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
        'Search.Searchable', // For plugin search
        'Translate' => array(
            'title' => 'titleTranslation',
            'content' => 'contentTranslation',
        ),
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
        ),
        'content' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'is_visible' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public function afterFind($results, $primary = false)
    {
        $results = parent::afterFind($results, $primary);

        foreach ($results as $idx => $result) {
            if (!isset($result[$this->alias])) {
                continue;
            }

            // Set title image path
            $results[$idx][$this->alias]['image_url'] = '';
            if (isset($result[$this->alias]['image'])) {
                $results[$idx][$this->alias]['image_url'] = '/files/tradition/image/'
                        . $result[$this->alias]['id']
                        . '/'
                        . $result[$this->alias]['image'];;
            }

            $results[$idx][$this->alias]['frontViewUrl'] = Router::url(array(
                'controller' => 'spiritual-succession',
                'action' => 'view',
                $result[$this->alias]['id']
            ));
        }

        return $results;
    }
}
