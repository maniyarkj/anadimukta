<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');
App::uses('User', 'Model');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model
{
    /**
     * Current user data
     *
     * @var null|array
     */
    protected $_currentUser = null;

    /**
     * Whether we are in admin domain
     *
     * @var type
     */
    public $isAdmin = false;

    public $actsAs = array('Containable');

    public function __construct($id = false, $table = null, $ds = null)
    {
        if (CakeSession::read("Auth.User")) {
            $this->_currentUser = CakeSession::read("Auth.User");
            $this->isAdmin = !empty($this->params['admin']);
        }

        // Set the locale in model
        if (User::isBackendUser($this->_currentUser) && $this->isAdmin) {
            $this->locale = 'eng';
        }
        else {
            $this->locale = Configure::read('Config.language');
        }

        parent::__construct($id, $table, $ds);
    }

    public static function getGradeOptions()
    {
        return array(
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
        );
    }

    public function toSqlDateFormat($dateString)
    {
        return date('Y-m-d', strtotime($dateString));
    }

    public function toSqlTimeFormat($timeString)
    {
        $time = new DateTime($timeString);
        return $time->format('H:i:s');
    }

    public function toSqlDateTimeFormat($dateString)
    {
        return date('Y-m-d H:i:s', strtotime($dateString));
    }

    public function toDateReadable($dateString)
    {
        return date('d-M-Y', strtotime($dateString));
    }

    public function toTimeReadable($timeString)
    {
        $time = new DateTime($timeString);
        return $time->format('h:i A');
    }

    public function getTranslatedModelField($id = 0, $field)
    {
        $locale = Configure::read('Config.language');

        $res = false;
        $translateTable = (isset($this->translateTable)) ? $this->translateTable : "i18n";

        $db = $this->getDataSource();
        $tmp = $db->fetchAll(
                "SELECT content from {$translateTable} "
                . "WHERE model = '" . $this->alias . "' "
                . "AND locale = '" . $locale . "' "
                . "AND foreign_key = " . $id . " "
                . "AND field = '" . $field . "' LIMIT 1"
        );

        if (!empty($tmp)) {
            $res = $tmp[0][$translateTable]['content'];
        }
        return $res;
    }

    public function afterFind($results, $primary = false)
    {
        if ($primary == false && array_key_exists('Translate', $this->actsAs)) {
            foreach ($results as $key => $val) {
                if (isset($val[$this->name]) && isset($val[$this->name]['id'])) {
                    foreach ($this->actsAs['Translate'] as $k => $translationfield) {
                        $results[$key][$this->name][$translationfield]
                            = $this->getTranslatedModelField($val[$this->name]['id'], $k);
                        $results[$key][$this->name][$k] = $results[$key][$this->name][$translationfield];
                    }
                }
                else if ($key == 'id' && is_numeric($val)) {
                    foreach ($this->actsAs['Translate'] as $k => $translationfield) {
                        $results[$translationfield] = $this->getTranslatedModelField($val, $k);
                        $results[$key][$this->name][$k] = $results[$translationfield];
                    }
                }
            }
        }

        return $results;
    }

    /**
     * Overriding delete function on model to implement the soft delete. To hard delete use
     * hardDelete set param harddelete to true
     *
     * @param int $id
     * @param boolean $cascade
     * @param boolean $hardDelete
     */
    public function delete($id = null, $cascade = true, $hardDelete = false)
    {
        if ($hardDelete) {
            return parent::delete($id, $cascade);
        }

        return $this->softDelete($id, false);
    }

    /**
     * Sets the is_enabled in database to false
     * @param type $id
     * @param type $cascade
     * @return boolean
     */
    public function softDelete($id = null, $cascade = false)
    {
        if (!empty($id)) {
            $this->id = $id;
        }

        $id = $this->id;

        $event = new CakeEvent('Model.beforeDelete', $this, array($cascade));
        list($event->break, $event->breakOn) = array(true, array(false, null));
        $this->getEventManager()->dispatch($event);
        if ($event->isStopped()) {
            return false;
        }

        if (!$this->exists()) {
            return false;
        }

//        $this->_deleteDependent($id, $cascade);
//        $this->_deleteLinks($id);
        $this->id = $id;

        if (!empty($this->belongsTo)) {
            foreach ($this->belongsTo as $assoc) {
                if (empty($assoc['counterCache'])) {
                    continue;
                }

                $keys = $this->find('first',
                        array(
                    'fields' => $this->_collectForeignKeys(),
                    'conditions' => array($this->alias . '.' . $this->primaryKey => $id),
                    'recursive' => -1,
                    'callbacks' => false
                ));
                break;
            }
        }

        if (!$this->saveField('is_enabled', 0)) {
            return false;
        }

        if (!empty($keys[$this->alias])) {
            $this->updateCounterCache($keys[$this->alias]);
        }

        $this->getEventManager()->dispatch(new CakeEvent('Model.afterDelete', $this));
        $this->_clearCache();
        $this->id = false;

        return true;
    }

    /**
     * Fetches data for model
     * @param type $type
     * @param array $query
     * @return array
     */
    public function find($type = 'first', $query = array())
    {
        if (!isset($query['conditions'])) {
            $query['conditions'] = array();
        }
        $columns = $this->schema();
        if (array_key_exists('is_enabled', $columns)) {
            $query['conditions'] += array($this->alias . '.is_enabled' => 1);
        }

        return parent::find($type, $query);
    }

}
