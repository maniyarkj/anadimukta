<?php

App::uses('Center', 'Model');

/**
 * Center Test Case
 *
 */
class CenterTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.center',
        'app.zone',
        'app.user_detail',
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
        'app.prasangs_user_type',
        'app.reference',
        'app.reference_type',
        'app.references_subject',
        'app.country',
        'app.state',
        'app.district',
        'app.taluka',
        'app.city'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Center = ClassRegistry::init('Center');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Center);

        parent::tearDown();
    }

}
