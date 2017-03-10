<?php

/**
 * PrasangsUserTypeFixture
 *
 */
class PrasangsUserTypeFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'prasang_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'user_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB', 'comment' => 'Relation table for which front end user type can access the prasang')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'prasang_id' => 1,
            'user_type_id' => 1
        ),
    );

}
