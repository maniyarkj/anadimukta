<?php

/**
 * UserDetailFixture
 *
 */
class UserDetailFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique', 'comment' => 'id from users table'),
        'user_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'Front end user type id'),
        'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'middle_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'mobile' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'country_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'district_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'taluka_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'dob' => array('type' => 'date', 'null' => false, 'default' => null),
        'gender' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'comment' => 'Male, Female', 'charset' => 'latin1'),
        'referral_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'photo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'zone_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'center_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => '0 = InActive, 1 = Active'),
        'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
            'user_id' => array('column' => 'user_id', 'unique' => 1),
            'email' => array('column' => 'email', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB', 'comment' => 'this details is filled by front end users')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'user_id' => 1,
            'user_type_id' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'middle_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'mobile' => 'Lorem ipsum dolor ',
            'country_id' => 1,
            'state_id' => 1,
            'district_id' => 1,
            'taluka_id' => 1,
            'city_id' => 1,
            'dob' => '2015-06-20',
            'gender' => 'Lorem ip',
            'referral_name' => 'Lorem ipsum dolor sit amet',
            'photo' => 'Lorem ipsum dolor sit amet',
            'zone_id' => 1,
            'center_id' => 1,
            'status' => 1,
            'created' => '2015-06-20 08:46:24',
            'modified' => '2015-06-20 08:46:24'
        ),
    );

}
