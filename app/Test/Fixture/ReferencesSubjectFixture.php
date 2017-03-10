<?php

/**
 * ReferencesSubjectFixture
 *
 */
class ReferencesSubjectFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'reference_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'subject_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB', 'comment' => 'related table for references its subjects')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'reference_id' => 1,
            'subject_id' => 1
        ),
    );

}
