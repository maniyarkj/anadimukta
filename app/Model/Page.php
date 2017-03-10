<?php

App::uses('AppModel', 'Model');

/**
 * Page Model
 *
 */
class Page extends AppModel
{

    // Some constant for default pages
    const PAGE_ABOUT_US = 1;
    const PAGE_HHD_BAPJI = 2;
    const PAGE_HH_SWAMISHREE = 3;

    const LOCATION_MENU_ANADIMUKTA_ITEM_1 = 1;
    const LOCATION_MENU_ANADIMUKTA_ITEM_2 = 2;
    const LOCATION_MENU_ANADIMUKTA_ITEM_3 = 3;
    const LOCATION_CHARACTERISTICS_1 = 4;
    const LOCATION_CHARACTERISTICS_2 = 5;
    const LOCATION_CHARACTERISTICS_3 = 6;
    const LOCATION_CHARACTERISTICS_4 = 7;

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
            'description' => 'descriptionTranslation',
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
    );

    public function afterFind($results, $primary = false)
    {
        $results = parent::afterFind($results, $primary);

        foreach ($results as $idx => $result) {
            if (!isset($result['Page'])) {
                continue;
            }
            // Set title image path
            $results[$idx]['Page']['image_url'] = '';
            if (isset($result['Page']['image'])) {
                $results[$idx]['Page']['image_url'] = '/files/page/image/'
                        . $result['Page']['id']
                        . '/'
                        . $result['Page']['image'];;
            }

            $results[$idx]['Page']['frontViewUrl'] = Router::url(array(
                'controller' => 'pages',
                'action' => 'view',
                $result['Page']['id']
            ));
        }
        return $results;
    }

    /**
     * Returns options for locations
     *
     * @return array
     */
    public static function getLocationOptions()
    {
        return array(
            self::LOCATION_MENU_ANADIMUKTA_ITEM_1 => 'Front Menu > Anadimukta > First Item',
            self::LOCATION_MENU_ANADIMUKTA_ITEM_2 => 'Front Menu > Anadimukta > Third Item',
            self::LOCATION_MENU_ANADIMUKTA_ITEM_3 => 'Front Menu > Anadimukta > Fourth Item',
            self::LOCATION_CHARACTERISTICS_1 => 'Home > Characteristics > First',
            self::LOCATION_CHARACTERISTICS_2 => 'Home > Characteristics > Second',
            self::LOCATION_CHARACTERISTICS_3 => 'Home > Characteristics > Third',
            self::LOCATION_CHARACTERISTICS_4 => 'Home > Characteristics > Fourth',
        );
    }
}
