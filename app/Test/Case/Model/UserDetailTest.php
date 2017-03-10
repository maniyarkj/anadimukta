<?php

App::uses('UserDetail', 'Model');

/**
 * UserDetail Test Case
 *
 */
class UserDetailTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.user_detail',
        'app.user',
        'app.user_type',
        'app.country',
        'app.state',
        'app.district',
        'app.taluka',
        'app.city',
        'app.zone',
        'app.center'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->UserDetail = ClassRegistry::init('UserDetail');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserDetail);

        parent::tearDown();
    }

}
