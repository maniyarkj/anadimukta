<?php

App::uses('AppModel', 'Model');

/**
 * Subject Model
 *
 * @property Subject $self
 * @property Prasang $Prasang
 * @property Reference $Reference
 */
class Subject extends AppModel
{
    const TYPE_MAIN = 1;
    const TYPE_SECONDARY = 2;
    const TYPE_THIRD = 3;

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    var $actsAs = array(
        'Search.Searchable', // For plugin search
        'Translate' => array(
            'title' => 'titleTranslation',
        ),
    );

    /**
     * Filter args for search
     *
     * @var array
     */
    public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        ),
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'id' => array(
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
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Main' => array(
            'className' => 'Subject',
            'foreignKey' => 'main_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Secondary' => array(
            'className' => 'Subject',
            'foreignKey' => 'secondary_id',
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
        'Prasang' => array(
            'className' => 'Prasang',
            'joinTable' => 'prasangs_subjects',
            'foreignKey' => 'subject_id',
            'associationForeignKey' => 'prasang_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
    );

    public function getSubjectTree()
    {
        $subjects = $this->find('all', array('recursive' => -1));
        $subjectsByParent = array();
        foreach ($subjects as $subject) {
            $parent_id = (int)$subject['Subject']['main_id'];
            if ($subject['Subject']['secondary_id']) {
                $parent_id = (int)$subject['Subject']['secondary_id'];
            }
            $subjectsByParent[$parent_id][] = $subject['Subject'];
        }
        return $this->createTree($subjectsByParent, $subjectsByParent[0]); // changed
    }

    public function createTree(&$list, $parent)
    {
        $tree = array();
        foreach ($parent as $k=>$l) {
            if(isset($list[$l['id']])){
                $l['children'] = $this->createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }

    public function getSelectOptions()
    {
        $subjects = $this->getSubjectTree();
        $options = array();
        foreach ($subjects as $subject) {
            if (!isset($subject['children'])) {
                continue;
            }
            foreach ($subject['children'] as $childSubject) {
                $groupName = sprintf('%s (%s)', $childSubject['title'], $subject['title']);
                $options[$groupName] = array();
                if (!isset($childSubject['children'])) {
                    continue;
                }
                foreach ($childSubject['children'] as $subjectLevel3) {
                    $options[$groupName][$subjectLevel3['id']] = sprintf(
                            '%s', $subjectLevel3['title']
                        );
                }
            }
        }
        return $options;
    }

    public function getSubjectTypeOptions()
    {
        return array(
            1 => 'Main Subject',
            2 => 'Secondary Subject',
            3 => 'Subject'
        );
    }

    public function beforeDelete($cascade = true)
    {
        $count = $this->find("count", array(
            "conditions" => array("(Subject.main_id = " . $this->id
                . ' OR Subject.secondary_id = ' . $this->id . ')'),
        ));

        $prasangCount = $this->Prasang->find("count", array(
            "conditions" => array(
                "Subjects.id = " . $this->id,
            ),
            'recursive' => 0,
            'joins' => array(
                array(
                    'table' => 'prasangs_subjects',
                    'alias' => 'PrasangSubject',
                    'type' => 'LEFT',
                    'conditions' => array('PrasangSubject.prasang_id = Prasang.id'),
                ),
                array(
                    'table' => 'subjects',
                    'alias' => 'Subjects',
                    'type' => 'LEFT',
                    'conditions' => array('Subjects.id = PrasangSubject.subject_id'),
                ),
            ),
        ));

        if (!$count && !$prasangCount) {
            return true;
        }
        return false;
    }
    /*
    public function paginate($conditions, $fields, $order, $limit, $page, $recursive, $extra)
    {
        $parameters = compact('conditions', 'fields', 'order', 'limit', 'page');
        if ($recursive != $this->recursive) {
                $parameters['recursive'] = $recursive;
        }
        $type = isset($extra['type']) ? $extra['type'] : 'all';

        // Fetch all the prasangs
        unset($parameters['limit']);
        $results = $this->find($type, array_merge($parameters, $extra));

        $this->onBeforeReturnPaginateResults($results);

        return $results;
    }

    public function onBeforeReturnPaginateResults(&$results)
    {
        foreach ($results as $idx => $row) {

        }
    } */
}