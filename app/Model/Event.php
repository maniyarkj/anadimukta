<?php

App::uses('AppModel', 'Model');

/**
 * Event Model
 *
 */
class Event extends AppModel
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
            'place' => 'placeTranslation',
            'details' => 'detailsTranslation',
        ),
    );

    // Set sql date format before save
    private $_dateFields = array(
        'startdate',
        'enddate',
    );

    private $_timeFields = array(
        'starttime',
        'endtime',
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
                'message' => 'Title is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'details' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Details is required',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public function beforeValidate($options = array())
    {
        foreach ($this->_dateFields as $field) {
            if (!empty($this->data['Event'][$field])) {
                $this->data['Event'][$field] = $this->toSqlDateFormat(
                        $this->data['Event'][$field]
                );
            }
        }

        return true;
    }

    public function afterFind($results, $primary = false)
    {
        $results = parent::afterFind($results, $primary);

        foreach ($results as $idx => $result) {
            if (!isset($result['Event'])) {
                continue;
            }
            // Change date fields to readable
            foreach ($this->_dateFields as $field) {
                if (!empty($result['Event'][$field])) {
                    $results[$idx]['Event']['sql_'.$field] = $results[$idx]['Event'][$field];
                    $results[$idx]['Event'][$field] = $this->toDateReadable(
                            $result['Event'][$field]
                    );
                }
            }
            // Change time fields to readable
            foreach ($this->_timeFields as $field) {
                if (!empty($result['Event'][$field])) {
                    $results[$idx]['Event']['sql_'.$field] = $results[$idx]['Event'][$field];
                    $results[$idx]['Event'][$field] = $this->toTimeReadable(
                            $result['Event'][$field]
                    );
                }
            }

            // Set title image path
            $results[$idx]['Event']['image_url'] = '';
            if (isset($result['Event']['image'])) {
                $results[$idx]['Event']['image_url'] = '/files/event/image/'
                        . $result['Event']['id']
                        . '/'
                        . $result['Event']['image'];;
            }

            $results[$idx]['Event']['frontViewUrl'] = Router::url(array(
                'controller' => 'events',
                'action' => 'view',
                $result['Event']['id']
            ));
        }
        return $results;
    }

    public function getTimeOptions()
    {
        $starttime = '00:00:00';
        $time = new DateTime($starttime);
        $interval = new DateInterval('PT30M');
        $temptime = $time->format('H:i:s');

        do {
            $options[$time->format('H:i:s')] = $time->format('h:i A');
            $time->add($interval);
            $temptime = $time->format('H:i:s');
        } while ($temptime !== $starttime);

        return $options;
    }
}
