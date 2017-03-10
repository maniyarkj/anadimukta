<?php

App::uses('AppModel', 'Model');

/**
 * Quote Model
 *
 */
class Quote extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'quote';

    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'deleteOnUpdate' => true,
                'path' => '{ROOT}{DS}webroot{DS}files{DS}{model}{DS}{field}{DS}',
            ),
        ),
        'Search.Searchable', // For plugin search
        'Translate' => array(
            'quote' => 'quoteTranslation',
            'by' => 'byTranslation',
        ),
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'quote' => array(
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

    public function afterFind($results, $primary = false)
    {
        $results = parent::afterFind($results, $primary);

        foreach ($results as $idx => $result) {
            if (!isset($result['Quote'])) {
                continue;
            }

            // Set title image path
            $results[$idx]['Quote']['image_url'] = '';
            if (isset($result['Quote']['image'])) {
                $results[$idx]['Quote']['image_url'] = '/files/quote/image/'
                        . $result['Quote']['id']
                        . '/'
                        . $result['Quote']['image'];;
            }
        }
        return $results;
    }
}
