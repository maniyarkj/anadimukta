<?php

App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.user',
        'app.group',
        'app.feedback',
        'app.subject',
        'app.prasang',
        'app.section',
        'app.with',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.prasangs_subject',
        'app.user_type',
        'app.user_detail',
        'app.country',
        'app.state',
        'app.district',
        'app.taluka',
        'app.city',
        'app.zone',
        'app.center',
        'app.prasangs_user_type',
        'app.reference',
        'app.reference_type',
        'app.references_subject'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->User = ClassRegistry::init('User');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->User);

        parent::tearDown();
    }

}
