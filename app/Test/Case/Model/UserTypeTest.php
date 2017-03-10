<?php

App::uses('UserType', 'Model');

/**
 * UserType Test Case
 *
 */
class UserTypeTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.user_type',
        'app.user_detail',
        'app.user',
        'app.country',
        'app.state',
        'app.district',
        'app.taluka',
        'app.city',
        'app.zone',
        'app.center',
        'app.prasang',
        'app.section',
        'app.with',
        'app.donor_zone',
        'app.donor_center',
        'app.author',
        'app.dtp_user',
        'app.subject',
        'app.prasangs_subject',
        'app.reference',
        'app.reference_type',
        'app.references_subject',
        'app.prasangs_user_type'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->UserType = ClassRegistry::init('UserType');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserType);

        parent::tearDown();
    }

}
